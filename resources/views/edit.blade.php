@extends('layouts.app')
    
@section('content')
    @include('layouts.form' , ['task' => $task])
@endsection