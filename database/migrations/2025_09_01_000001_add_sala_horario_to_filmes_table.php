<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->string('sala')->nullable()->after('classificacao');
            $table->string('horario')->nullable()->after('sala');
            $table->integer('duracao')->nullable()->after('horario');
            $table->date('data_inicio')->nullable()->after('duracao');
            $table->date('data_fim')->nullable()->after('data_inicio');
        });
    }

    public function down(): void
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->dropColumn(['sala', 'horario', 'duracao', 'data_inicio', 'data_fim']);
        });
    }
};
