<?php

namespace Cucxabeng\Repogen\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryGeneratorCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repository:file
                            {name : The name of the repository.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new repository.';

    protected $type = 'Repository';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return  __DIR__ . '/../stubs/repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    /**
     * Build the model class with the given name.
     *
     * @param  string  $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $modelName = str_before($name, 'Repository');

        $replace = [
            'DummyContract' => 'App\Contracts\Repositories\\'.class_basename($name),
            'DummyFullModelClass' => 'App\Models\\'.class_basename($modelName),
            'DummyModelVariables' => camel_case(str_plural(class_basename($modelName))),
            'DummyModelVariable' => camel_case(str_singular(class_basename($modelName))),
            'DummyModel' => class_basename($modelName),
        ];

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }
}

/*
 * Laravel 5.4 not found str_before :(
 *
 */
function str_before($subject, $search)
{
    return $search == '' ? $subject : explode($search, $subject)[0];
}