<?php

use Illuminate\Database\Seeder;

class CidadesAcreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Acrelândia', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Assis Brasil', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Brasiléia', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Bujari', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Capixaba', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Cruzeiro do Sul', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Epitaciolândia', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Feijó', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Jordão', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Mâncio Lima', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Manoel Urbano', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Marechal Thaumaturgo', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Plácido de Castro', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Porto Acre', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Porto Walter', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Rio Branco', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Rodrigues Alves', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Santa Rosa do Purus', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Sena Madureira', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Senador Guiomard', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Tarauacá', 'estado_id' => 1]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Xapuri', 'estado_id' => 1]);

        $this->command->info('Cidades do Acre importadas com sucesso!');
    }
}
