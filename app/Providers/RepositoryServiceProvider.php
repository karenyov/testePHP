<?php

namespace App\Providers;

use App\Repositories\EloquentRepositoryInterface; 
use App\Repositories\MarcaRepositoryInterface; 
use App\Repositories\EletrodomesticoRepositoryInterface; 
use App\Repositories\Eloquent\MarcaRepository;
use App\Repositories\Eloquent\EletrodomesticoRepository; 
use App\Repositories\Eloquent\BaseRepository; 
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(MarcaRepositoryInterface::class, MarcaRepository::class);
        $this->app->bind(EletrodomesticoRepositoryInterface::class, EletrodomesticoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
