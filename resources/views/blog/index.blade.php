@extends('layout')

@section('title')
    test
@stop


@section('content')

    <!--home_content!-->
    <div class="container">

        @if (count($posts))
        <div class="block">
            <div class="block-content">
                <h1>Статьи</h1>
            </div>
            <hr />
        </div>
        <div class="news">
        @foreach($posts as $post)
            <!-- Blog Post Row -->
                <div class="row">
                    <div class="col-md-1 text-center">
                        <p><span class="glyphicon glyphicon-calendar"></span></p>
                        {{--<p>{{ $post->getDate() }}</p>--}}
                        <p>{{ date('Y.m.d', strtotime($post->created_at)) }}</p>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('blog_post_page', ['slug'=>$post->slug]) }}">
                            <img src="{{ $post->getImgPath() }}" width="200"/>
                            {{--{{ $post->getImg('400', '', ['class' => 'img-responsive img-hover']) }}--}}
                        </a>
                    </div>
                    <div class="col-md-8">
                        <h3><a href="{{ route('blog_post_page', ['slug'=>$post->slug]) }}">{{ $post->title }}</a></h3>
                        <p>автор: <a href="/">Слава Ставицкий</a></p>
                        <p>{{ str_limit($post->short_description, 255) }}</p>
                        <a class="btn btn-primary" href="{{ route('blog_post_page', ['slug'=>$post->slug]) }}">Читать далее <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- /.row -->

                <hr>
        @endforeach
        </div>
        <!-- Pager -->
        <div class="row text-center">
            <ul class="pagination cent">
                {{--<li class="previous"><a href="#">&larr; Новее</a></li>--}}
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
                {{--<li class="next"><a href="#">Старее &rarr;</a></li>--}}
            </ul>
        </div>
        <!-- /.row -->
        @else

            <h2> К сожалению статей пока нет </h2>

        @endif
        {{--<hr>--}}

    </div>
    <!--home_content!-->
    <div class="clear" style="clear:both"></div>
@stop
