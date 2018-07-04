@extends('layouts.app')

@section('title', '话题列表')

@section('content')

<div class="container topics-index-page">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9">
            <div class="card">
                <div class="card-header">
                    <ul class="tw-flex tw-list tw-list-reset tw-m-0">
                        <li role="presentation">
                            <a class="tw-relative tw-block tw-text-sm px-2 tw-text-grey-darkest" href="#">最后回复</a>
                        </li>
                        <li role="presentation">
                            <a class="tw-relative tw-block tw-text-sm px-2 tw-text-grey-darkest" href="#">最新发布</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $topics])
                    {{-- 分页 --}}
                    {!! $topics->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('topics._sidebar')
        </div>
    </div>
</div>

@endsection