@extends('layouts.app')
@section('content')
<h2>Hello!!!</h2>
<p>You can show see all tasks<a href="{{route('tasks_index')}}"> here</a></p>
<p>You can show see all news<a href="{{route('news_index')}}"> here</a></p>
@endsection