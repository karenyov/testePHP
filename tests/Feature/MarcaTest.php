<?php

namespace Tests\Feature;

use App\Models\Marca;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MarcaTest extends TestCase
{

    protected $url = '/api/marcas';

    /**
     * Lista todas as marcas.
     *
     * @return void
     */
    public function testMarcaList()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
    }

    /**
     * Insere uma marca.
     *
     * @return void
     */
    public function testNewMarcaSuccessful()
    {
        $marca = ['nome' => 'Lenovo teste'];

        $this->post($this->url, $marca, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "data" => [ 
                    'id', 
                    'nome' 
                ],
                "message",
            ]);
    }

    /**
     * Update uma marca.
     *
     * @return void
     */
    public function testUpdateMarcaSuccessful()
    {
        $marca = Marca::where('nome','Lenovo teste')->first();
        $marca_ = ['nome' => 'Lenovo teste update'];

        $this->put($this->url.'/'.$marca->id, $marca_, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "data" => [ 
                    'id', 
                    'nome' 
                ],
                "message",
            ]);
    }

    /**
     * Delete uma marca.
     *
     * @return void
     */
    public function testDeleteMarcaSuccessful()
    {
        $marca = Marca::where('nome','Lenovo teste update')->first();

        $this->delete($this->url.'/'.$marca->id)
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "data" => [ ],
                "message",
            ]);
    }
    
}
