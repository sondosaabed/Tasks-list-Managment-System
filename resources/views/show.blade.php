@extends('layouts.app')
{{-- Doesn't know where it should render this layouts
to handle that we need to use directives --}}

{{-- sections that doesn't have html Idonn't have to close it--}}
@section('title', $task->title)

@section('content')
    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

    <div> 
        <form action="{{ route('tasks.destroy', ['task'=>$task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form> 
    </div>
@endsection