<?php

namespace Vip\Crud\Commands;

use Illuminate\Console\Command;

class VipCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate
                    {--force : Overwrite existing views by default}';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'create.stub' => 'crud/create.blade.php',
        'edit.stub' => 'crud/edit.blade.php',
        'index.stub' => 'crud/index.blade.php',
        'layouts/app.stub' => 'layouts/app.blade.php',
        'components/action_buttons.stub' => 'components/action_buttons.blade.php'
    ];

    /**
     * Execute the console command.
     *
     * @return void
     *
     */
    public function handle()
    {
        $this->exportBackend();

        $this->components->info('Laravel crud generated successfully.');
    }

    /**
     * Export the authentication backend.
     *
     * @return void
     */
    protected function exportBackend()
    {

        $controller = app_path('Http/Controllers/CrudController.php');

        $model = app_path('Models/Record.php');

        if (file_exists($controller) && ! $this->option('force')) {
            if ($this->components->confirm("The [CrudController.php] file already exists. Do you want to replace it?")) {
                file_put_contents($controller, $this->compileControllerStub());
            }
        } else {
            file_put_contents($controller, $this->compileControllerStub());
        }

        if (file_exists($model) && ! $this->option('force')) {
            if ($this->components->confirm("The [Record.php] file already exists. Do you want to replace it?")) {
                file_put_contents($model, $this->compileModelStub());
            }
        } else {
            file_put_contents($controller, $this->compileModelStub());
        }

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/../stubs/routes.stub'),
            FILE_APPEND
        );

        copy(
            __DIR__.'/../stubs/migrations/2023_05_27_072338_create_records_table.php',
            base_path('database/migrations/2023_05_27_072338_create_records_table.php')
        );
    }

    /**
     * Compiles the "CrudController" stub.
     *
     * @return string
     */
    protected function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/../stubs/controllers/CrudController.stub')
        );
    }

    /**
     * Compiles the "Record" model stub.
     *
     * @return string
     */
    protected function compileModelStub()
    {
        return str_replace(
            '{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/../stubs/models/Record.stub')
        );
    }

    /**
     * Export the crud views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            if (file_exists($view = $this->getViewPath($value)) && ! $this->option('force')) {
                if (! $this->components->confirm("The [$value] view already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                __DIR__.'/../stubs/views/'.$key,
                $view
            );
        }
    }

    /**
     * Get full view path relative to the application's configured view path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }

}