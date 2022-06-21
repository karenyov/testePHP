<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas_name = ['Electrolux', 'Brastemp', 'Fischer', 'Samsung', 'LG'];
        $marcas = array();
        foreach ($marcas_name as $marca) {
            $marcas[] = [
                'nome' => $marca,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('marcas')->insert($marcas);
    }
}