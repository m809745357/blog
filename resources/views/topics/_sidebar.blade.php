<Datepicker 
    :highlighted="state.highlighted" 
    @selected="doSomethingInParentComponentFunction" 
    :format="customFormatter" 
    :inline="true"
    :value="state.date"
    :language="state.language"
>
</Datepicker>

<h5 class="tw-text-grey-darkest tw-py-2">热门</h5>
@foreach($trending as $topic)
    <p class="tw-p-0 tw-truncate tw-w-full">
        <a class="tw-text-grey-darkest" href="{{ url($topic->link) }}">{{ $topic->title }}</a>
    </p>
@endforeach