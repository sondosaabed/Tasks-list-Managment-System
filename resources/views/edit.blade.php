@extends('layouts.app')
{{-- Included the form for resunig the code --}}
@section('content')
    @include('form', ['task' => $task])
@endsection