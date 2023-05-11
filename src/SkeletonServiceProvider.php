<?php

namespace OmniaDigital\Catalyst\SkeletonModule;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class SkeletonServiceProvider extends PluginServiceProvider
{
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
