<?php

namespace Cucxabeng\Repogen;

use Cucxabeng\Repogen\Commands\RepogenCommand;
use Illuminate\Support\ServiceProvider;
use Cucxabeng\Repogen\Commands\ContractGeneratorCommand;
use Cucxabeng\Repogen\Commands\RepositoryGeneratorCommand;

class RepogenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            RepogenCommand::class,
            ContractGeneratorCommand::class,
            RepositoryGeneratorCommand::class
        );
    }
}
