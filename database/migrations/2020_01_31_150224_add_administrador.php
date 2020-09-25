<?php

use Illuminate\Database\Migrations\Migration;

class AddAdministrador extends Migration
{

    public function up()
    {
        factory(\App\Models\User::class)->create(
            [
                'name' => env("ADMIN_NAME"),
                'email' => env("ADMIN_EMAIL"),
                'perfil_id' => \App\Models\Geral\Perfil::ADMINISTRADOR,
                "password" => bcrypt(env("ADMIN_PASSWORD"))
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
