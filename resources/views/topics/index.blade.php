@extends('layouts.app')

@section('title', isset($category) ? $category->name : 'Home')

@section('content')

<div class="container tw-bg-white tw-shadow">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9">
            @if (isset($category))
                <div class="alert alert-info" role="alert">
                    {{ $category->name }} ：{{ $category->description }}
                </div>
            @endif
            <ul class="tw-flex tw-list tw-list-reset tw-m-0 tw-pb-4 tw-mt-2 ">
                <li role="presentation" class="tw-mr-2">
                    <a class="hvr-shutter-in-vertical tw-relative tw-block tw-text-sm px-2 tw-text-grey-darkest {{ active_class( ! if_query('order', 'recent') ) }}" href="{{ Request::url() }}?order=default">最后回复</a>
                </li>
                <li role="presentation">
                    <a class="hvr-shutter-in-vertical tw-relative tw-block tw-text-sm px-2 tw-text-grey-darkest {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">最新发布</a>
                </li>
            </ul>
            @include('topics._topic_list', ['topics' => $topics])
            <div class="tw-flex tw-justify-end">
                {!! $topics->appends(Request::except('page'))->render() !!}
            </div>
        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('topics._sidebar')
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    let allreleasesDates = @json($releasesDates);

    @if (isset(request()->created_at))
        created_at = '{{ request()->created_at }}';
    @endif
</script>
@endsection