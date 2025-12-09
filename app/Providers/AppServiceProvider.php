<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share custom JavaScript to all views
        view()->composer('layouts.app', function ($view) {
            $headerScript = \App\Models\CustomJavaScript::active()
                ->position('header')
                ->first();

            $bodyStartScript = \App\Models\CustomJavaScript::active()
                ->position('body_start')
                ->first();

            $bodyEndScript = \App\Models\CustomJavaScript::active()
                ->position('body_end')
                ->first();

            $view->with([
                'customHeaderScript' => $headerScript,
                'customBodyStartScript' => $bodyStartScript,
                'customBodyEndScript' => $bodyEndScript,
            ]);
        });
    }
}
