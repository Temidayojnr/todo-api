<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return response()->json($todos);
    }

    public function create(Request $request)
    {
        $todo = new Todo();
        $todo->completed = $request->completed;
        $todo->title = $request->title;
        $todo->save();

        return response()->json($todo);
    }

    public function updateTodo($id, Request $request)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = $request->completed;
        $todo->title = $request->title;
        $todo->save();
        return response()->json($todo);
    }

    public function deleteTodo($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json($todo);
    }
}
