<div class="card">
    <div class="card-body">
        @foreach($trending as $topic)
            <p class="tw-text-grey-dark m-0 p-0 tw-truncate">
                <a href="{{ url($topic->link) }}">{{ $topic->title }}</a>
            </p>
        @endforeach
    </div>
</div>