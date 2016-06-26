<?php

namespace Displore\Themes;

use Illuminate\Support\ServiceProvider;

class ThemesServiceProvider extends ServiceProvider
{
    /**
     * Defer loading until service is called.
     * 
     * @var bool
     */
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/themes.php' => config_path('displore/themes.php'),
        ], 'displore.themes.config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/themes.php', 'displore.themes');

        // Binding Theme class to the facade.
         $this->app->singleton('theme', function () {
            return $this->app->make('Displore\Themes\Theme');
        });

        // The commands are not necessary on production servers.
        if ($this->app->environment('local')) {
            $this->commands(['Displore\Themes\ThemeCommand']);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return[Theme::class];
    }
}
