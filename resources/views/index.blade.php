<h1>
The List of tasks:
</h1>
<?php
/*
@isset($name)
    <div>
    The name is: {{$name}}
    </div>
@endisset

it's not normal to keep adding isset to code
*/
?>

<div>
    {{--
        instead of this I can use foreles
         @if(count($tasks))
        <?php
        /*
        <div> There are tasks:</div>
        */
        ?>
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
</div>
