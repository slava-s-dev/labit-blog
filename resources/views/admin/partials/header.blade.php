<header>
    <section>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="top-subnav">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('admin_index') }}">Blog Admin</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        {{--<li @if(Request::getRequestUri() == '/') class="active" @endif><a href="{{ url('/') }}">На главную</a></li>--}}
                        <li @if(Request::getRequestUri() == '/admin/posts') class="active" @endif>
                            <a href="{{ route('admin_posts') }}">
                                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                                Мои статьи
                            </a>
                        </li>
                        <li @if(Request::getRequestUri() == '/admin/post/add-page') class="active" @endif>
                            <a href="{{ route('admin_post_add_page') }}">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Добавить статью
                            </a>
                        </li>
                    </ul>
                    @if(Sentinel::check())
                        <ul class="nav navbar-nav navbar-right">
                            <a href="{{ route('logout') }}" class="btn btn-default navbar-btn">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                Выйти
                            </a>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('admin_index') }}"> Здравствуйте, {{ Sentinel::getUser()->name }}</a></li>
                        </ul>
                    @else
                        <ul class="nav navbar-nav navbar-right">
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