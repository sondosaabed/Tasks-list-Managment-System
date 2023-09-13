@extends('layouts.app')
{{-- Doesn't know where it should render this layouts
to handle that we need to use directives --}}

{{-- sections that doesn't have html Idonn't have to close it--}}
@section('title', $task->title)

@section('content')
    <div>
       <a href="{{ route('tasks.index')}}" 
        class="link">← Go back to the task list!</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description}}</p>

    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif
    {{-- To make it more readable  --}}
    <p class="mb-4 text-sm text-slate-500">Created
    {{$task->created_at->diffForHumans()}} . Updated {{$task->updated_at->diffForHumans()}}
    
    </p>

    <p>
        @if($task->completed)
            <span class="font-medoum text-green-500">Completed! :)</span>
        @else
             <span class="font-medoum text-red-500">Not completed :(</span>
        @endif
    </p>
    {{-- hover is a sudo class --}}
    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task'=> $task])}}"
        class="btn">Edit</a>

        <form method="POST" action="{{ route('tasks.toggle-complete', ['task'=> $task])}}">
        @csrf
        @method('PUT') 
        {{--  spoofing --}}
        <button class="btn" type="submit">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
        </form>
  
        <form action="{{ route('tasks.destroy', ['task'=>$task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete</button>
        </form> 
    </div>
@endsection