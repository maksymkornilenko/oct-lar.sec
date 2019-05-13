@extends('layouts.app')
@section('content')
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{route('news_update',$news->id)}}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
	<!-- Имя задачи -->
        <div class="form-group">
	    <label for="task" class="col-sm-3 control-label">Заголовок</label>
	    <div class="col-sm-6">
		<input type="text" name="head" id="task-name" class="form-control">
	    </div>
	</div>
        <div class="form-group">
	    <label for="task" class="col-sm-3 control-label">Текст</label>
	    <div class="col-sm-6">
                <textarea name="text" id="task-name" class="form-control"></textarea>
	    </div>
	</div>
	<!-- Кнопка добавления задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-default bg-info">
		    <i class="fas fa-broom"></i> add
		</button>
	    </div>
	</div>
    </form>
</div>
@endsection

