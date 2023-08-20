{{-- Use extends so that we could edit them in one place instead of many --}}
@extends('layouts.app')
@section('title','The List of tasks')
{{-- @isset($name)
    <div>
    The name is: {{$name}}
    </div>
@endisset

it's not normal to keep adding isset to code --}}


@section('content')
    {{--
        instead of this I can use foreles
         @if(count($tasks))
        
        
        <div> There are tasks:</div>
        
        
        @foreach ($tasks as $task)
            <div>{{$task-> title }}</div>
        @endforeach
    @else
        <div> You have done all your tasks!</div>
    @endif --}}
    
    @forelse ($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['id' => $task ->id])}}">{{$task ->title}}</a>
        </div>
    @empty
        <div> You have done all your tasks!</div>
    @endforelse
@endsection