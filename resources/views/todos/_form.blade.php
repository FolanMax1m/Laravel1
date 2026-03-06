@csrf

<div class="mb-3">
  <label class="form-label">Назва</label>
  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $todo->title ?? '') }}" required>
  @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Опис</label>
  <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $todo->description ?? '') }}</textarea>
  @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

@if(isset($todo))
  <div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="done" value="1" id="done" {{ old('done', $todo->done) ? 'checked' : '' }}>
    <label class="form-check-label" for="done">Готово</label>
  </div>
@endif

<button class="btn btn-primary" type="submit">{{ $buttonText ?? 'Зберегти' }}</button>
<a href="{{ route('todos.index') }}" class="btn btn-secondary">Скасувати</a>
