<?php namespace Neva\Fenom;

use Fenom;
use Illuminate\Filesystem;
use Illuminate\Support\ServiceProvider;

class FenomServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('fenom', function () {
            $provider = new FenomProvider(base_path());
            $fenom = new Fenom($provider);
            $fenom->setCompileDir(storage_path() . '/framework/views');

            return $fenom;
        });
    }

    /**
     * boot process
     */
    public function boot()
    {
        \View::addExtension('fenom.php', 'fenom', function () {
            return new FenomEngine($this->app['fenom']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'fenom',
        ];
    }
}

