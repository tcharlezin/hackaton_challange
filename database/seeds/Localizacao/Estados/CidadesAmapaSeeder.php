<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CidadesAmapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Amapá', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Calçoene', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Cutias', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Ferreira Gomes', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Itaubal', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Laranjal do Jari', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Macapá', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Mazagão', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Oiapoque', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Pedra Branca do Amaparí', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Porto Grande', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Pracuúba', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Santana', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Serra do Navio', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Tartarugalzinho', 'estado_id' => 3]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Vitória do Jari', 'estado_id' => 3]);

        $this->command->info('Cidades do Amapá importadas com sucesso!');
    }
}
