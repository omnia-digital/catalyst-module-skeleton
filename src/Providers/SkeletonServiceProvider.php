<?php

namespace OmniaDigital\Catalyst\SkeletonModule\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class SkeletonServiceProvider extends PluginServiceProvider
{
    //// Module Section ////
    /**
     * @var string
     */
    protected $moduleName = 'Skeleton';

    /**
     * @var string
     */
    protected $moduleNameLower = 'skeleton';


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
        $this->loadMigrationsFrom(__DIR__ .'/../database/Migrations');
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
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = __DIR__ .'/../resources/views';

        $this->publishes([
            $sourcePath => $viewPath,
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', $this->moduleNameLower);
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

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ .'/../config/config.php' => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ .'/../config/config.php', $this->moduleNameLower
        );
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }

        return $paths;
    }

    //// Filament Plugin Section ////
    public static string $name = 'skeleton-module';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-skeleton' => __DIR__.'/../resources/dist/skeleton.css',
    ];

    protected array $scripts = [
        'plugin-skeleton' => __DIR__.'/../resources/dist/skeleton.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-skeleton' => __DIR__ . '/../resources/dist/skeleton.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }

}
