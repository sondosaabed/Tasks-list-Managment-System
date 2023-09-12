@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
    <style>
        .error-msg {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
    @csrf
    @method('PUT')     {{-- Spoofing --}}
        <div>
            <label for="title">
            Title
            </label>
            <input text="text" name="title" id="title" value="{{ $task->title }}"/>
            @error('title')
                <p class=".error-msg">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label for="description">
            Description
            </label>
            <textarea name="description" id="description" rows="5">{{ $task->description}}</textarea>
            @error('description')
                <p class=".error-msg ">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label for="long_description">
            Long Description
            </label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description}}</textarea>
            @error('long_description')
                <p class=".error-msg ">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>
@endsection