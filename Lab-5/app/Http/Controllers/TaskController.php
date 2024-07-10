<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    function index()
    {

        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    function create()
    {

        return view('tasks.create', ['priorities' => Priority::all(), 'users' => User::all()]);
    }

    function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority_id = $request->priority;
        $task->user_id = $request->user;
        $task->save();
        return redirect('/tasks');
    }

    function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task, 'priorities' => Priority::all(), 'users' => User::all()]);
    }

    function update(Request $request, Task $task)
    {
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority_id = $request->priority;
        $task->user_id = $request->user;
        $task->save();
        return redirect('/tasks');
    }

    function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }

    function complete(Task $task)
    {
        $task->completed = true;
        $task->save();
        return redirect('/tasks');
    }
}
