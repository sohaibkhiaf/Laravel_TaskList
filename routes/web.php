<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

// root URI
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// tasks for index , store, update , edit , create, destroy
Route::resource('tasks' , TaskController::class);

// toggle complete
Route::put('tasks/toggle-complete/{task}' , function(Task $task){
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->back()->with('success' , 'Task updated successfully!');
})->name('tasks.toggle-complete');

// other directives
Route::fallback(function() {
    return redirect()->route('tasks.index');
});
