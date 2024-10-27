<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index', [
            'todos' => Todo::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
        ]);

        Todo::create($request->all());

        return redirect('/');
    }

    public function edit(Todo $todo)
    {
        $todo = Todo::find($todo->id);
        $todos = Todo::all();

        return view('todos.edit', compact('todo', 'todos'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
        ]);

        $todo->update($request->all());

        return redirect('/');
    }

    public function done(Todo $todo)
    {
        $todo->update(['is_done' => true]);

        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }
}
