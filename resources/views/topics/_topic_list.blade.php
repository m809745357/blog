@if (count($topics))

    <ul class="list-unstyled">
        @foreach ($topics as $topic)
            <li class="media">
                <a class="tw-text-grey-dark tw-text-base tw-mr-2 hvr-float-shadow" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                    <img class="tw-w-8 tw-h-8 tw-rounded-full" src="{{ $topic->user->avatar }}" title="{{ $topic->user->name }}">
                </a>
                <div class="media-body">
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
                <p>{{ $topic->excerpt }}</p>
                <p class="tw-text-grey-dark m-0 p-0">
                    <a class="tw-text-grey-dark tw-text-base tw-mr-1" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                        @octicon(person)
                            {{ $topic->user->name }}
                    </a>

                    <span> • </span>

                    <a class="tw-text-{{$topic->category->color}}-dark" href="{{ route('categories.show', $topic->category->name) }}" title="{{ $topic->category->name }}">
                        @octicon(file-directory)
                            {{ $topic->category->name }}
                    </a>
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