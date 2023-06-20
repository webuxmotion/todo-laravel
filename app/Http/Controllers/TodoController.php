<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Models\TodoItem;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = auth()->user()->todos;

        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    public function archive() {
        $todos = TodoItem::onlyTrashedTodos();

        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    public function edit(TodoItem $todo) {
        return view('todos.edit', [
            'todo' => $todo
        ]);
    }

    public function create() {
        return view('todos.create');
    }

    public function store(CreateTodoRequest $request) {
        TodoItem::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('todos');
    }

    public function update(TodoItem $todo, CreateTodoRequest $request) {
        $todo->update($request->all());

        return back();
    }

    public function destroy(TodoItem $todo) {
        $todo->delete();

        return back();
    }
}
