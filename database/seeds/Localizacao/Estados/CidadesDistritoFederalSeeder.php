<?php

use Illuminate\Database\Seeder;

class CidadesDistritoFederalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Brasília', 'estado_id' => 7]);

        $this->command->info('Cidades do Distrito Federal importadas com sucesso!');
    }
}
