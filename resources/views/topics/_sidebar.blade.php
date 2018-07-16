<div class="tw-sticky tw-pin-t">
<h5 class="tw-text-grey-darkest tw-mt-2">历史记录</h5>
<hr>
<Datepicker class="tw-flex"
    :highlighted="state.highlighted" 
    @selected="doSomethingInParentComponentFunction" 
    :format="customFormatter" 
    :inline="true"
    :value="state.date"
    :language="state.language"
>
</Datepicker>
@if (count($trending))
    <h5 class="tw-text-grey-darkest tw-mt-2">热门文章</h5>
    <hr>
    @foreach($trending as $topic)
        <p class="tw-p-0 tw-truncate tw-w-full">
            <a class="tw-text-grey-darkest hvr-forward" href="{{ url($topic->link) }}">{{ $topic->title }}</a>
        </p>
    @endforeach
@endif

@if (count($links))
    <h5 class="tw-text-grey-darkest tw-mt-2">资源推荐</h5>
    <hr>
    @foreach ($links as $link)
        <p class="tw-p-0 tw-truncate tw-w-full">
            <a class="tw-text-grey-darkest hvr-forward" href="{{ $link->link }}">{{ $link->title }}</a>
        </p>
    @endforeach
@endif
</div>