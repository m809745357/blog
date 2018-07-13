<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale('zh');

        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);

        Blade::directive(
            'octicon',
            function ($expression) {
                $svg = "octicon['$expression'].path";
                return "<svg version=\"1.1\" width=\"16\" height=\"16\" viewBox=\"0 0 16 16\" class=\"octicon octicon-$expression\" aria-hidden=\"true\" v-html=\"$svg\"></svg>";
            }
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
