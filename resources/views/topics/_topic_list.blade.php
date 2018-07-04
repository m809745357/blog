@if (count($topics))

    <ul class="list-unstyled">
        @foreach ($topics as $topic)
            <li class="media">
                <div class="mr-3">
                    <a href="{{ route('users.show', [$topic->user_id]) }}">
                        <img class="media-object img-thumbnail" style="width: 52px; height: 52px;" src="{{ $topic->user->avatar }}" title="{{ $topic->user->name }}">
                    </a>
                </div>

                <div class="media-body">

                    <h5 class="mt-0 tw-flex tw-justify-between">
                        <a class="tw-text-grey-darkest tw-text-base" href="{{ route('topics.show', [$topic->id]) }}" title="{{ $topic->title }}">
                            {{ $topic->title }}
                        </a>
                        <a class="tw-text-grey" href="{{ route('topics.show', [$topic->id]) }}" >
                            <span class="badge tw-bg-grey tw-w-4 tw-h-4 rounded-circle text-white"> {{ $topic->reply_count }} </span>
                        </a>
                    </h5>

                    <p class="tw-text-grey-dark">

                        <a class="tw-text-grey-dark" href="#" title="{{ $topic->category->name }}">
                            @octicon(file-directory)
                             {{ $topic->category->name }}
                        </a>

                        <span> • </span>
                        <a class="tw-text-grey-dark" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                            @octicon(person)
                            {{ $topic->user->name }}
                        </a>
                        <span> • </span>
                        @octicon(clock)
                        <span class="timeago" title="最后活跃于">{{ $topic->updated_at->diffForHumans() }}</span>
                    </p>

                </div>
            </li>

            @if ( ! $loop->last)
                <hr>
            @endif

        @endforeach
    </ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif