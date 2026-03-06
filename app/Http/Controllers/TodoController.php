<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->latest()->paginate(10);
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();
        Todo::create($data);

        return redirect()->route('todos.index')->with('success', 'Задача створена');
    }

    public function show(Todo $todo)
    {
        #$this->authorize('view', $todo);
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        #$this->authorize('update', $todo);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        #$this->authorize('update', $todo);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'done' => 'sometimes|boolean',
        ]);
        $todo->update($data);
        return redirect()->route('todos.index')->with('success', 'Задача оновлена');
    }

    public function destroy(Todo $todo)
    {
        #$this->authorize('delete', $todo);
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Задача видалена');
    }

}
