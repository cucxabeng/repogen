<?php

namespace Cucxabeng\Repogen\Commands;

use Illuminate\Console\Command;

class RepogenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repository:generate
                            {name : The name of the repostiory.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new repository.';

    public function handle()
    {
        $name = str_singular($this->argument('name'));

        $this->call('repository:contract', ['name' => $name.'Repository']);
        $this->call('repository:file', ['name' => $name.'Repository']);
    }
}