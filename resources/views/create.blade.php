{{-- My task is hard --}}
@extends('layouts.app')

@section('title', 'Add Task')

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
            <input text="text" name="title" id="title"/>
        </div>
            <label for="description">
            Description
            </label>
            <textarea name="description" id="description" rows="5"></textarea>
        <div>
            <label for="long_description">
            Long Description
            </label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>
            <button type="submit">Add Task</button>
        <div>
        </div>
    </form>
@endsection