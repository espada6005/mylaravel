<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewBase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::withoutDoubleEncoding();

        Blade::directive('formatDatetime', function (string $type) {
            return <<<CODE
            <?php
            \$format = ['datetime' => 'Y/m/d H:i:s',
                'date' => 'Y/m/d', 'time' => 'H:i:s'];
            \$current = now();
            print \$current->format(\$format[$type]);
            ?>
            CODE;
        });

        Blade::if('date', function (string $from, string $to) {
            return today()->between($from, $to);
        });

        View::composer('*', function (ViewBase $view) {
            // View::composer('view.compose', function (ViewBase $view) {
            // View::composer(['hello.show', 'view.compose'], function (ViewBase $view) {
            // View::composer('view.*', function (ViewBase $view) {
            $view->with([
                'appName' => 'Laravel実践入門',
                'currentYear' => now()->year,
            ]);
            // $view->with('appName', 'Laravel実践入門');
        });
    }
}
