@extends('admin.wrap')


@section('content')

    <div class="container">
    @if (count($posts))

        <h2 class="text-info">Статьи</h2>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Url</th>
                    <th>Короткий текст</th>
                    <th>Создан</th>
                    <th>Обновлен</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->short_description }}</td>
                    <td>{{ date('d.m.Y', strtotime($post->created_at)) }}</td>
                    <td>{{ date('d.m.Y', strtotime($post->updated_at)) }}</td>
                    <td>
                        <a href="{{ route('admin_post_edit_page', ['id' => $post->id]) }}"
                           class="btn btn-primary" title="Редактировать">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin_post_delete', ['id' => $post->id]) }}">
                            {{ csrf_field() }}
                            <button class="btn btn-danger" title="Удалить">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>

    @else

        <h2>Ни одной статьи в базе не наблюдается :)</h2>

    @endif

    </div>

@stop