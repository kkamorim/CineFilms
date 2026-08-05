<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('is_gm'); // user, admin, coordenador
            $table->date('data_nascimento')->nullable()->after('role');
            $table->string('cpf')->nullable()->after('data_nascimento');
            $table->string('telefone')->nullable()->after('cpf');
            $table->string('cep')->nullable()->after('telefone');
            $table->string('endereco')->nullable()->after('cep');
            $table->string('bairro')->nullable()->after('endereco');
            $table->string('cidade')->nullable()->after('bairro');
            $table->string('estado')->nullable()->after('cidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'data_nascimento',
                'cpf',
                'telefone',
                'cep',
                'endereco',
                'bairro',
                'cidade',
                'estado'
            ]);
        });
    }
};
