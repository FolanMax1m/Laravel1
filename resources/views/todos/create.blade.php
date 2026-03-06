@extends('layouts.app')

@section('title', 'Нова задача')

@section('content')
<h1>Нова задача</h1>

<form action="{{ route('todos.store') }}" method="POST">
  @include('todos._form', ['buttonText' => 'Створити'])
</form>
@endsection
