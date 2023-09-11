{{-- My task is hard --}}
@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    <style>
        .error-msg {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
    {{-- Cross Side request forgery 
    sending request to a diffrent website on behaf of user
    when they have active session 
    creates tokens to protect users 490 error
     must include this directive on every form  --}}
    @csrf
        <div>
            <label for="title">
            Title
            </label>
            <input text="text" name="title" id="title" value="{{ old('title') }}"/>
            @error('title')
                <p class=".error-msg">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label for="description">
            Description
            </label>
            <textarea name="description" id="description" rows="5" >{{ old('description') }}</textarea>
            @error('description')
                <p class=".error-msg ">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label for="long_description">
            Long Description
            </label>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class=".error-msg ">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection