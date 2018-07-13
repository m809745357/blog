
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ active_class(if_route('topics.index')) }}" href="{{ route('topics.index') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link {{ active_class(if_route('categories.show')) }} dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Category
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('categories.show', $category->name) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('登录') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('注册') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics.create') }}">
                            @octicon(plus)
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-fluid rounded-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">
                                个人资料
                            </a>
                            <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">
                                编辑资料
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('退出') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>