<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Topic;
use App\Models\Link;
use Illuminate\Support\Facades\Redis;

class TopicComposer
{
    /**
    * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with(
            'trending',
            collect(Redis::zrevrange('trending_topics', 0, 4))
            ->map(function ($topic) {
                return json_decode($topic);
            })
        );
        $view->with(
            'releasesDates',
            Topic::all()->groupBy(function ($topic) {
                return $topic->created_at->format('Y-m-d');
            })->keys()
        );
        $view->with(
            'links',
            (new Link())->getAllCached()
        );
    }
}
