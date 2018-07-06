@extends('layouts.app')

@section('title', isset($category) ? $category->name : 'Home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9">
            @if (isset($category))
                <div class="alert alert-info" role="alert">
                    {{ $category->name }} ：{{ $category->description }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <ul class="tw-flex tw-list tw-list-reset tw-m-0">
                        <li role="presentation">
                            <a class="tw-relative tw-block tw-text-sm px-2 tw-text-grey-darkest {{ active_class( ! if_query('order', 'recent') ) }}" href="{{ Request::url() }}?order=default">最后回复</a>
                        </li>
                        <li role="presentation">
                            <a class="tw-relative tw-block tw-text-sm px-2 tw-text-grey-darkest {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">最新发布</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $topics])
                </div>
                <div class="card-footer tw-flex tw-justify-end">
                    {{-- 分页 --}}
                    {!! $topics->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('topics._sidebar', ['trending' => $trending])
        </div>
    </div>
</div>

@endsection