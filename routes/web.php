<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


// root URI
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// tasks for index , store, update , edit , create, destroy
Route::get('/tasks' , [TaskController::class , 'index' ])->name('tasks.index');
Route::get('/tasks/create' , [TaskController::class , 'create' ])->name('tasks.create');
Route::get('/tasks/{task}/edit' , [TaskController::class , 'edit' ])->name('tasks.edit');
Route::get('/tasks/{task}' , [TaskController::class , 'show' ])->name('tasks.show');

Route::post('/tasks' , [TaskController::class , 'store' ])->name('tasks.store');
Route::put('/tasks/{task}' , [TaskController::class , 'update' ])->name('tasks.update');
Route::delete('/tasks/{task}' , [TaskController::class , 'destroy' ])->name('tasks.destroy');


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
