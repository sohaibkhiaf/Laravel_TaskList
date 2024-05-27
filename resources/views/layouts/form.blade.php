@section('title' , isset($task) ? 'Edit Task!' : 'Create Task!')
    
@section('content')
    <form action="{{ isset($task) ? route('tasks.update' , ['task' => $task->id]) : route('tasks.store')}}" method="POST">
        @csrf

        @isset($task)
            @method('PUT')
        @endisset
    
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title ?? old('title')}}">

            @error('title')
                <p class="error-message">  {{ $message }} </p>
            @enderror
        </div>

        <div>
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" rows="5">{{ $task->description ?? old('desc') }}</textarea>

            @error('desc')
                <p class="error-message">  {{ $message }} </p>
            @enderror
        </div>

        <div>
            <label for="long_desc">Long Description</label>
            <textarea name="long_desc" id="long_desc" rows="8">{{ $task->long_description ?? old('long_desc')}}</textarea>
        </div>
        @error('long_desc')
            <p class="error-message">  {{ $message }} </p>
        @enderror

        <div class="form-button-container">
            <button type="submit">
                @isset($task)
                    Edit
                @else
                    Create
                @endisset
            </button>
        </div>

        <div class="cancel-form-button">
            <a href="{{ route('tasks.index') }}">Cancel</a>
        </div>

    </form>
@endsection