<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\TopicComposer;
use App\Http\ViewComposers\CategoryComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('topics.index', TopicComposer::class);
        View::composer(['topics.create_and_edit', 'layouts._header'], CategoryComposer::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
