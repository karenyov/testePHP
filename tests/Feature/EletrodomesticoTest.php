<?php

namespace Tests\Feature;

use App\Models\Eletrodomestico as Eletrodomestico;
use App\Models\Marca;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EletrodomesticoTest extends TestCase
{

    protected $url = '/api/eletrodomesticos';

    /**
     * A basic eletrodomesticos.
     *
     * @return void
     */
    public function testEletrodomesticoList()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
    }

    /**
     * Insere uma eletrodomestico.
     *
     * @return void
     */
    public function testNewEletrodomesticoSuccessful()
    {
        $eletrodomestico = ['nome' => 'Geladeira teste', 'descricao' => 'Geladeira duas portas', 'tensao' => 220, 'marca_id' => 1];

        $this->post($this->url, $eletrodomestico, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "data" => [
                    'id',
                    'marca_id',
                    'nome',
                    'descricao',
                    'tensao',
                    'marca'
                ],
                "message",
            ]);
    }

        /**
     * Update uma Eletrodomestico.
     *
     * @return void
     */
    public function testUpdateEletrodomesticoSuccessful()
    {
        $eletrodomestico = Eletrodomestico::where('nome','Geladeira teste')->first();
        $eletrodomestico_ = ['nome' => 'Geladeira teste', 'descricao' => 'Geladeira duas portas update', 'tensao' => 220, 'marca_id' => $eletrodomestico->marca_id ];

        $this->put($this->url.'/'.$eletrodomestico->id, $eletrodomestico_, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "data" => [ 
                    'id', 
                    'nome',
                    'descricao',
                    'tensao',
                    'marca'
                ],
                "message",
            ]);
    }

    /**
     * Delete uma marca.
     *
     * @return void
     */
    public function testDeleteEletrodomesticoSuccessful()
    {
        $eletrodomestico = Eletrodomestico::where('nome','Geladeira teste')->first();

        $this->delete($this->url.'/'. $eletrodomestico->id)
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "data" => [ ],
                "message",
            ]);
    }
}
