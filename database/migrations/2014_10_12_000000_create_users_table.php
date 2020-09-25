<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('document')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('username')->unique()->nullable();
            $table->dateTime('data_nascimento')->nullable();
            $table->char("sexo")->nullable();
            $table->string("avatar")->nullable();


            /*** Informações sobre o preenchimento do perfil **/
            $table->boolean("is_completo")->default(false);

            $table->boolean("preencheu_areas")->default(false);
            $table->boolean("preencheu_avaliacao")->default(false);
            $table->boolean("preencheu_configuracao")->default(false);
            $table->boolean("preencheu_dados_pessoais")->default(false);
            $table->boolean("preencheu_experiencias")->default(false);
            $table->boolean("preencheu_formacao")->default(false);
            $table->boolean("preencheu_foto")->default(false);
            $table->boolean("preencheu_habilidades")->default(false);
            $table->boolean("preencheu_redes_sociais")->default(false);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
