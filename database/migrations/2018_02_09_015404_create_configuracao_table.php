<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracaoTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('configuracao');

        Schema::create('configuracao', function (Blueprint $table)
        {
            $table->uuid('id');

            $table->uuid('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users');

            # Privacity
            $table->boolean("privacidade_exibir_email")->default(false);

            # Notification
            $table->boolean("notificacao_email_plataforma")->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracao');
    }
}
