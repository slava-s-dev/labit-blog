<header>
    <section>
        <nav class="navbar navbar-default navbar-fixed-top" id="top-subnav">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li @if(Request::getRequestUri() == '/') class="active" @endif><a href="{{ url('/') }}">Главная</a></li>
                        <li @if(Request::getRequestUri() == '/blog') class="active" @endif><a href="{{ route('blog') }}">Блог</a></li>
                    </ul>
                    @if(Sentinel::check())
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('admin_index') }}">Панель администратора</a></li>
                        </ul>
                    @else
                        <ul class="nav navbar-nav navbar-right">
                            {{--<li @if(Request::getRequestUri() == '/login') class="active" @endif><a href="{{ route('login') }}">Вход</a></li>--}}
                            <a href="{{ route('login') }}" class="btn btn-default navbar-btn">
                                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                Вход
                            </a>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
    </section>
</header>