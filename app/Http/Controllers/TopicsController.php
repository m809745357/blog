<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\TopicRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Models\Link;
use App\Handlers\ImageUploadHandler;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, Category $category)
    {
        $topics = Topic::withOrder($request->order)->withCreatedAt($request->created_at);

        if ($category->exists) {
            $topics->where('category_id', $category->id);
        }

        $topics = $topics->paginate(20);

        return view('topics.index', compact('topics'));
    }

    public function show(Request $request, Category $category, Topic $topic)
    {
        // URL 矫正
        if (!empty($topic->slug) && $topic->slug != $request->slug) {
            return redirect($topic->link(), 301);
        }

        $key = sprintf('users.%s.visits.%s', auth()->id(), $topic->id);

        cache()->forever($key, Carbon::now());

        Redis::zincrby('trending_topics', 1, json_encode([
            'title' => $topic->title,
            'link' => $topic->link()
        ]));

        return view('topics.show', compact('topic'));
    }

    public function create(Topic $topic)
    {
        return view('topics.create_and_edit', compact('topic'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = auth()->id();
        $topic->save();

        return redirect()->to($topic->link())->with('message', 'Created successfully.');
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);

        return view('topics.create_and_edit', compact('topic'));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());

        return redirect()->to($topic->link())->with('message', 'Updated successfully.');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();

        return redirect()->route('topics.index')->with('message', 'Deleted successfully.');
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success' => false,
            'msg' => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg'] = '上传成功!';
                $data['success'] = true;
            }
        }
        return $data;
    }
}
