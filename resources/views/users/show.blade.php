@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="card">
                <div class="card-body">
                    <div class="media flex-column">
                        <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="300px" height="300px">
                        <div class="media-body">
                            <hr>
                            <h4><strong>个人简介</strong></h4>
                            <p>{{ $user->introduction }}</p>
                            <hr>
                            <h4><strong>注册于</strong></h4>
                            <p>{{ $user->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <span>
                        <h1 class="card-title pull-left" style="font-size:30px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
                    </span>
                </div>
            </div>
            <hr>

            {{-- 用户发布的内容 --}}
            <div class="card">
                <div class="card-body">
                    @forelse($topics as $topic)
                        <h5 class="mt-0 tw-flex tw-w-full tw-justify-between tw-items-center">
                        
                        @if($topic->hasUpdatedFor())
                            <a class="tw-flex-1 tw-text-blue-dark tw-font-bold tw-text-base hvr-forward" href="{{ $topic->link() }}" title="{{ $topic->title }}">{{ $topic->title }}</a>
                        @else
                            <a class="tw-flex-1 tw-text-blue tw-font-normal tw-text-base hvr-forward" href="{{ $topic->link() }}" title="{{ $topic->title }}">{{ $topic->title }}</a>
                        @endif
                            <a class="tw-text-grey-darkest tw-text-base tw-flex tw-items-center tw-justify-center" href="{{ $topic->link() }}" >
                                @octicon(clock)
                                <span title="最后活跃于" class="tw-ml-2">{{ $topic->updated_at->diffForHumans() }}</span>
                            </a>
                        </h5>
                    @empty
                        暂无数据 ~_~ 
                    @endforelse
                    <div class="tw-flex tw-justify-end">
                        {!! $topics->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
            