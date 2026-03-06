@extends('layouts.app')

@section('title', 'Мої задачі')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Мої задачі</h1>
  <a href="{{ route('todos.create') }}" class="btn btn-primary">Нова задача</a>
</div>

@if($todos->count())
  <div class="list-group">
    @foreach($todos as $todo)
      <a href="{{ route('todos.show', $todo) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div>
          <strong>{{ $todo->title }}</strong>
          <div class="small text-muted">{{ Str::limit($todo->description, 80) }}</div>
        </div>
        <div class="text-end">
          @if($todo->done)
            <span class="badge bg-success">Готово</span>
          @else
            <span class="badge bg-secondary">В роботі</span>
          @endif
          <div class="mt-2">
            <a href="{{ route('todos.edit', $todo) }}" class="btn btn-sm btn-outline-secondary">Редагувати</a>
            <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Видалити?')">Видалити</button>
            </form>
          </div>
        </div>
      </a>
    @endforeach
  </div>

  <div class="mt-3">{{ $todos->links() }}</div>
@else
  <p class="text-muted">Задач поки немає. Створіть першу.</p>
@endif
@endsection
