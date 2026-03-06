@extends('layouts.app')

@section('title', $todo->title)

@section('content')
<div class="d-flex justify-content-between align-items-start mb-3">
  <div>
    <h1>{{ $todo->title }}</h1>
    <p class="text-muted">Створено: {{ $todo->created_at->format('d.m.Y H:i') }}</p>
  </div>
  <div>
    @if($todo->done)
      <span class="badge bg-success">Готово</span>
    @else
      <span class="badge bg-secondary">В роботі</span>
    @endif
  </div>
</div>

<div class="mb-4">
  <p>{{ $todo->description ?? 'Опис відсутній' }}</p>
</div>

<a href="{{ route('todos.edit', $todo) }}" class="btn btn-outline-primary">Редагувати</a>
<form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
  @csrf @method('DELETE')
  <button class="btn btn-outline-danger" onclick="return confirm('Видалити?')">Видалити</button>
</form>
<a href="{{ route('todos.index') }}" class="btn btn-link">Назад</a>
@endsection
