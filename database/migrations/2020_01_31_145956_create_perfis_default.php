<?php

use Illuminate\Database\Migrations\Migration;

class CreatePerfisDefault extends Migration
{
    public function up()
    {
        \App\Models\Geral\Perfil::create(["name"=>"Administrador"]);
        \App\Models\Geral\Perfil::create(["name"=>"Usuário"]);
    }

    public function down()
    {
    }
}
