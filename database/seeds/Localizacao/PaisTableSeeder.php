<?php

use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Localizacao\Pais::create(['id' => 1, 'descricao' => 'Brasil', 'sigla' => "BRA"]);
    }
}
