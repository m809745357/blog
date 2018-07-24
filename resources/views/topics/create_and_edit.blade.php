@extends('layouts.app')

@section('content')

<div class="container tw-bg-white tw-shadow">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 ">
            @include('common.error')
            <h1>
               @octicon(archive) 文章 /
                @if($topic->id)
                    修改 #{{$topic->id}}
                @else
                    创建
                @endif
            </h1>

            @if($topic->id)
                <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
            @else
                <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
            @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                
                <div class="form-group">
                    <label for="title-field">标题</label>
                    <input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" />
                </div> 
                <div class="form-group">
                    <label for="title-field">分类</label>
                    <select class="form-control" name="category_id" required>
                        <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择</option>
                        @foreach ($categories as $value)
                            <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="body-field">内容</label>
                    <markdown-editor :body="{{ $topic }}"></markdown-editor>
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('topics.index') }}">@octicon(reply) Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection