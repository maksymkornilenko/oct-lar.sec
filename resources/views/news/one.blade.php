@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{ route('news_index') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('get')}}
        <!-- Кнопка открытия формы для добавления новости -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-plus"></i> Back
                </button>
            </div>
        </div>
    </form>
</div>
@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Новости
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <!-- Список новостей -->
            <thead>
                <tr>
                    <th>Заголовок новости</th>
                </tr>
                <tr>
                    <td class="table-text">
                        <h2>{{ $news->head }}</h2>
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
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection