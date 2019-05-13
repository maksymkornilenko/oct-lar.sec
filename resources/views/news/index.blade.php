@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{ route('news_store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Кнопка открытия формы для добавления новости -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-plus"></i> Добавить новость
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Текущие задачи -->
@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Новости
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <!-- Список новостей -->
            @foreach ($news as $news)
            <thead>
                <tr>
                    <th>Заголовок новости</th>
                    <td class="table-text">
                        <div>{{ $news->name }}</div>
                    </td>
                </tr>
            </thead>
            <!-- Тело таблицы текст новостей -->
            <tbody>
            <th>Текст новости</th>
            <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                    <div>{{ $news->text }}</div>
                </td>
                <td>
                    <form method="POST" action="{{route('news_destroy', $news->id)}}">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-default bg-danger">
                            <i class="fa fa-trash"></i> Удалить
                        </button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{route('news_edit', $news->id)}}">
                        {{csrf_field()}}
                        {{method_field('get')}}
                        <button type="submit" class="btn btn-default bg-info">
                            <i class="fas fa-broom"></i>Редактировать
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection