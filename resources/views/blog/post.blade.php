@extends('layout')

@section('content')
    <!--home_content!-->
    <div class="container">

    <div class="row">
        <div class="col-lg-12">

            <ol class="breadcrumb">
                <li><a href="{{ route('blog') }}">Блог</a></li>
                <li class="active">{{ $post->title }}</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
        <div class="block">
            <div class="block-content">
                <h1>{{ $post->title }}</h1>
            </div>
            <hr />
        </div>
        <div class=" news-page">
            <!-- Content Row -->
            <div class="row">

                <!-- Blog Post Content Column -->
                <div class="col-lg-8">

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Создана {{ date('d', strtotime($post->created_at)) }}, {{ date('Y', strtotime($post->created_at)) }} в {{ date('H:i', strtotime($post->created_at)) }}</p>
                    <hr>

                    <!-- Preview Image -->
                    {!! $post->getImg('300') !!}
                    {{--<img class="img-responsive" src="http://placehold.it/400x300" alt="">--}}

                    <hr>

                    <!-- Post Content -->
                    <div class="post-content">
                        {{ $post->description }}
                    </div>
                    <!-- Blog Comments -->
            </div>



        {{--<hr>--}}

    </div>
@stop
