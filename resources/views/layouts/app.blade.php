{{-- So What we want to do is to inherite from this template --}}
<!DOCTYPE html>
<html>

<head>
    <title>Tasks List App</title>
    @yield('styles')
</head>

<body>
{{-- we use yeild to fix the problem whhere to render this --}}
    <h1>@yield('title')</h1>
    <div>
    {{-- this is a directive  --}}
        @yield('content')
    </div>
</body>
</html>