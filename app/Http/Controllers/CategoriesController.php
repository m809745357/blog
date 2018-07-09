<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Models\Link;

class CategoriesController extends Controller
{
    public function show(Request $request, Category $category, Link $link)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = Topic::withOrder($request->order)->withCreatedAt($request->created_at)->where('category_id', $category->id)->with('category', 'user')->paginate(20);

        $trending = collect(Redis::zrevrange('trending_topics', 0, 4))->map(function ($topic) {
            return json_decode($topic);
        });

        // 传参变量话题和分类到模板中
        $releasesDates = Topic::all()->groupBy(function ($topic) {
            return $topic->created_at->format('Y-m-d');
        })->keys();

        $links = $link->getAllCached();

        return view('topics.index', compact('topics', 'category', 'trending', 'releasesDates', 'links'));
    }
}
