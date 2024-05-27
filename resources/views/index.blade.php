@extends('layouts.app')

@section('title' , 'The list of tasks')

@section('success')
    @if (session()->has('success'))
        <p class="success-message"> {{session('success')}}  </p>
    @endif
@endsection
    
@section('content')

<div>

    <div class="add-task-container">
        <a class="add-task" href="{{ route('tasks.create') }}">Add Task!</a>
    </div>

    <div class="tasks-container">
        @forelse ($tasks as $task)
            <div class="task-container">
                @if ($task->completed)
                    <a class="task" style="text-decoration-line: line-through;" href="{{ route('tasks.show' , ['task' => $task->id] ) }}">{{ $task->title }}</a>
                @else
                    <a class="task" href="{{ route('tasks.show' , ['task' => $task->id] ) }}">{{ $task->title }}</a>
                @endif
            </div>
        @empty
            <div class="empty-message">
                There are no tasks!
            </div>
        @endforelse
    </div>

    @if ($tasks->count())
        <div class="links-container">
            {{ $tasks->links() }}
        </div>
    @endif

</div>
    
@endsection

