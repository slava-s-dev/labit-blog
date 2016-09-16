@extends('layout')


@section('content')

    <div class="container">



        <form action="{{ route('auth') }}" class="form-signin" role="form" method="post">

            @if (Session::has('login_error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('login_error') }}
                </div>
            @endif

            {{ csrf_field() }}

            <h2 class="form-signin-heading"> Вход в систему </h2>

            <input type="email" class="form-control" placeholder="E-mail" name="email" value="" required autofocus>

            <input type="password" name="password" class="form-control" placeholder="Пароль">

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Войти</button>
            {{--<a class="btn btn-lg btn-success btn-block" href=""> Регистрация </a>--}}
        </form>

    </div>

@stop