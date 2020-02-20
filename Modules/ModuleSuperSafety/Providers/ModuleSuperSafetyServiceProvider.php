<?php

namespace Modules\ModuleSuperSafety\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ModuleSuperSafetyServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('ModuleSuperSafety', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('ModuleSuperSafety', 'Config/config.php') => config_path('modulesupersafety.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('ModuleSuperSafety', 'Config/config.php'), 'modulesupersafety'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/modulesupersafety');

        $sourcePath = module_path('ModuleSuperSafety', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/modulesupersafety';
        }, \Config::get('view.paths')), [$sourcePath]), 'modulesupersafety');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/modulesupersafety');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'modulesupersafety');
        } else {
            $this->loadTranslationsFrom(module_path('ModuleSuperSafety', 'Resources/lang'), 'modulesupersafety');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('ModuleSuperSafety', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
