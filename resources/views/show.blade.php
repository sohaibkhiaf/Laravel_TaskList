@extends('layouts.app')

@section('title' , $task->title)

@section('success')
    @if (session()->has('success'))
        <p class="success-message"> {{session('success')}} </p>
    @endif
@endsection

@section('content')
    <p class="description"> <b>Description:</b> {{ $task->description }}</p>

    @if (isset($task->long_description))

    <p class="long-description"> <b>Long Description:</b> {{ $task->long_description }} </p>

    <p class="created-at"> Created at {{ $task->created_at }} </p>
    <p class="updated-at"> Updated at {{ $task->updated_at }} </p>

    @endif

    @if ( $task->completed == true)
        <p class="complete-state" style="color: green;">completed </p>
    @else
        <p class="complete-state" style="color: red;">not completed yet </p>
    @endif

    <div class="action-buttons">

        <div class="complete-button-container">
            <form action="{{ route('tasks.toggle-complete' , ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('PUT')
        
                <button type="submit">
                    @if ($task->completed)
                        Mark as not completed
                    @else
                        Mark as completed
                    @endif
                </button>
            </form>
        </div>   
        
        <div class="edit-button-container">
            <form action="{{ route('tasks.edit' , ['task' => $task->id ]) }}" method="GET">
                @csrf
                <button type="submit">
                    Edit
                </button>
            </form>
        </div>

        <div class="delete-button-container">
            <form action="{{ route('tasks.destroy' , ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>

        <div class="home-button-container">
            <form action="{{ route('tasks.index') }}" method="GET">
                @csrf
                <button type="submit">
                    Go back to Tasks List
                </button>
            </form>
        </div>

    </div>

@endsection


