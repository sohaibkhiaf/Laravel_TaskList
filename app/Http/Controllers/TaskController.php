<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return view('index' , [
            'tasks' => Task::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();

        $task = new Task();
        $task->title = $data['title'];
        $task->description = $data['desc'];
        $task->long_description = $data['long_desc'];

        $task->save();

        return redirect()->route('tasks.show' , ['task' => $task->id])
            ->with('success' , 'Task created successfully!');
    }

    public function show(Task $task)
    {
        return view('show' , ['task' => $task ]);
    }

    public function edit(Task $task)
    {
        return view('edit' , ['task' => $task]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->title = $data['title'];
        $task->description = $data['desc'];
        $task->long_description = $data['long_desc'];
    
        $task->save();
    
        return redirect()->route('tasks.show' , ['task' => $task->id])
            ->with('success' , 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success' , 'Task deleted successfully!');
    }

}
