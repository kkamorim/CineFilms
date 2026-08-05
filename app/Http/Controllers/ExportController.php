<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    /**
     * Exportar relatório em CSV
     */
    public function exportCSV()
    {
        $filmes = Filme::all();
        $usuarios = User::all();

        $fileName = 'relatorio_cinefilms_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function() use ($filmes, $usuarios) {
            $file = fopen('php://output', 'w');
            
            // BOM para UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // SEÇÃO DE ESTATÍSTICAS
            fputcsv($file, ['ESTATÍSTICAS GERAIS'], ';');
            fputcsv($file, [''], ';');
            fputcsv($file, ['Total de Filmes', $filmes->count()], ';');
            fputcsv($file, ['Total de Usuários', $usuarios->count()], ';');
            fputcsv($file, ['Data do Relatório', date('d/m/Y H:i:s')], ';');
            fputcsv($file, [''], ';');
            fputcsv($file, [''], ';');

            // FILMES POR GÊNERO
            fputcsv($file, ['FILMES POR GÊNERO'], ';');
            fputcsv($file, [''], ';');
            fputcsv($file, ['Gênero', 'Quantidade'], ';');
            
            $filmesPorGenero = Filme::select('genero', DB::raw('COUNT(*) as total'))
                ->groupBy('genero')
                ->get();
            
            foreach ($filmesPorGenero as $item) {
                fputcsv($file, [$item->genero, $item->total], ';');
            }
            
            fputcsv($file, [''], ';');
            fputcsv($file, [''], ';');

            // FILMES POR CLASSIFICAÇÃO
            fputcsv($file, ['FILMES POR CLASSIFICAÇÃO ETÁRIA'], ';');
            fputcsv($file, [''], ';');
            fputcsv($file, ['Classificação', 'Quantidade'], ';');
            
            $filmesPorClassificacao = Filme::select('classificacao', DB::raw('COUNT(*) as total'))
                ->groupBy('classificacao')
                ->orderBy('classificacao')
                ->get();
            
            foreach ($filmesPorClassificacao as $item) {
                fputcsv($file, ['PG-' . $item->classificacao, $item->total], ';');
            }
            
            fputcsv($file, [''], ';');
            fputcsv($file, [''], ';');

            // USUÁRIOS POR MÊS
            fputcsv($file, ['USUÁRIOS CADASTRADOS POR MÊS'], ';');
            fputcsv($file, [''], ';');
            fputcsv($file, ['Mês', 'Quantidade'], ';');
            
            $usuariosPorMes = User::select(
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
            
            $meses = [
                1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
                5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
                9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
            ];
            
            foreach ($usuariosPorMes as $item) {
                fputcsv($file, [$meses[$item->mes], $item->total], ';');
            }
            
            fputcsv($file, [''], ';');
            fputcsv($file, [''], ';');

            // LISTA COMPLETA DE FILMES
            fputcsv($file, ['LISTA COMPLETA DE FILMES'], ';');
            fputcsv($file, [''], ';');
            fputcsv($file, ['ID', 'Título', 'Gênero', 'Classificação', 'Data de Cadastro'], ';');
            
            foreach ($filmes as $filme) {
                fputcsv($file, [
                    $filme->id,
                    $filme->titulo,
                    $filme->genero,
                    'PG-' . $filme->classificacao,
                    $filme->created_at->format('d/m/Y')
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Exportar relatório em PDF
     */
    public function exportPDF()
    {
        try {
            $filmes = Filme::all();
            $totalFilmes = $filmes->count();
            $totalUsuarios = User::count();

            // Estatísticas por Gênero
            $filmesPorGenero = Filme::select('genero', DB::raw('COUNT(*) as total'))
                ->groupBy('genero')
                ->get();

            // Estatísticas por Classificação
            $filmesPorClassificacao = Filme::select('classificacao', DB::raw('COUNT(*) as total'))
                ->groupBy('classificacao')
                ->orderBy('classificacao')
                ->get();

            $data = [
                'totalFilmes' => $totalFilmes,
                'totalUsuarios' => $totalUsuarios,
                'filmes' => $filmes,
                'filmesPorGenero' => $filmesPorGenero,
                'filmesPorClassificacao' => $filmesPorClassificacao,
                'dataRelatorio' => date('d/m/Y H:i:s')
            ];

            $pdf = Pdf::loadView('exports.relatorio-pdf', $data);
            $pdf->setPaper('A4', 'portrait');
            $pdf->setOption('isRemoteEnabled', true);
            $pdf->setOption('isHtml5ParserEnabled', true);

            return $pdf->download('relatorio_cinefilms_' . date('Y-m-d_His') . '.pdf');
        } catch (\Exception $e) {
            Log::error('Erro no ExportPDF: ' . $e->getMessage());
            return back()->withErrors(['export' => 'Erro ao gerar PDF: ' . $e->getMessage()]);
        }
    }
}