@extends('admin.wrap')

@section('content')
    <div class="container">

        @if(Session::has('create_success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('create_success') }}
            </div>
        @endif

        @if(Session::has('create_error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                @foreach((array)Session::get('create_error') as $message)
                    {{ $message[0] }}
                @endforeach
            </div>
        @endif


        <h3>
            <span class="text-info">Создание статьи: </span>
        </h3>

        <hr>

        <ul class="nav nav-tabs">
            <li class="active"><a href="#common" data-toggle="tab">Общее</a></li>
            <li><a href="#seo" data-toggle="tab">SEO</a></li>
        </ul>

        <br>

        <form data-toggle="validator" role="form" action="{{ route('admin_post_add') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="tab-content">

                <div class="tab-pane active" id="common">
                    <table class="table">
                        <tr>
                            <td class="col-md-2">
                                <label for="title">Заголовок статьи:</label>
                            </td>

                            <td>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <input required name="title" class="form-control" id="title" type="text">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-2">
                                <label for="slug">Url статьи:</label>
                            </td>

                            <td>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <input required pattern="^[A-z0-9]+((-[A-z0-9]+)+)?$" data-pattern-error="Введите латиницу, знак '-' или цифры" name="slug" class="form-control" id="slug" type="text">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-2">
                                <label for="short_description">Короткий текст:</label>
                            </td>

                            <td>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <textarea id="short_description" name="short_description" class="form-control" rows="3"></textarea>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-2">
                                <label for="description">Текст статьи</label>
                            </td>

                            <td>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <textarea required id="description" name="description" class="form-control" rows="5"></textarea>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-2">
                                <label for="description">Изображение</label>
                            </td>

                            <td>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <input type="file" name="image_url">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="tab-pane" id="seo">
                    <table class="table">
                        Поля для SEO
                    </table>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-ok"></span> Сохранить
            </button>
        </form>

    </div>

    <br/>
@stop