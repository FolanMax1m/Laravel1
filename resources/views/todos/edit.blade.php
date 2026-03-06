@extends('layouts.app')

@section('title', 'Редагувати задачу')

@section('content')
<h1>Редагувати задачу</h1>

<form action="{{ route('todos.update', $todo) }}" method="POST">
  @method('PUT')
  @include('todos._form', ['buttonText' => 'Оновити'])
</form>
@endsection
