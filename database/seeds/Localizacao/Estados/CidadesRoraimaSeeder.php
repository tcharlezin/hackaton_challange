<?php

use Illuminate\Database\Seeder;

class CidadesRoraimaSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Alto Alegre', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Amajari', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Boa Vista', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Bonfim', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Cantá', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Caracaraí', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Caroebe', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Iracema', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Mucajaí', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Normandia', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Pacaraima', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Rorainópolis', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'São João da Baliza', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'São Luiz', 'estado_id' => 23]);
        \App\Models\Localizacao\Cidade::create(['descricao' => 'Uiramutã', 'estado_id' => 23]);

        $this->command->info('Cidades de Roraima importadas com sucesso!');
    }
}
