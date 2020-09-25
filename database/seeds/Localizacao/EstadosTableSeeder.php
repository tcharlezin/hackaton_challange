<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Localizacao\Estado::create(['descricao' => 'Acre', 'uf' => 'AC', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Alagoas', 'uf' => 'AL', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Amapá', 'uf' => 'AP', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Amazonas', 'uf' => 'AM', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Bahia', 'uf' => 'BA', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Ceará', 'uf' => 'CE', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Distrito Federal', 'uf' => 'DF', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Espírito Santo', 'uf' => 'ES', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Goiás', 'uf' => 'GO', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Maranhão', 'uf' => 'MA', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Mato Grosso', 'uf' => 'MT', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Mato Grosso do Sul', 'uf' => 'MS', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Minas Gerais', 'uf' => 'MG', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Pará', 'uf' => 'PA', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Paraíba', 'uf' => 'PB', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Paraná', 'uf' => 'PR', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Pernambuco', 'uf' => 'PE', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Piauí', 'uf' => 'PI', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Rio de Janeiro', 'uf' => 'RJ', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Rio Grande do Norte', 'uf' => 'RN', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Rio Grande do Sul', 'uf' => 'RS', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Rondônia', 'uf' => 'RO', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Roraima', 'uf' => 'RR', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Santa Catarina', 'uf' => 'SC', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'São Paulo', 'uf' => 'SP', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Sergipe', 'uf' => 'SE', 'pais_id' => 1]);
        \App\Models\Localizacao\Estado::create(['descricao' => 'Tocantins', 'uf' => 'TO', 'pais_id' => 1]);
    }
}
