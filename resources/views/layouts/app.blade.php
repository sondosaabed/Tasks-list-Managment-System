{{-- So What we want to do is to inherite from this template --}}
<!DOCTYPE html>
<html>

<head>
    <title>Tasks List App</title>
      <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
{{-- we use yeild to fix the problem whhere to render this --}}
    <h1 class="text-3xl mb-4">@yield('title')</h1>
    <div>
    {{-- this is a directive  --}}
        @if(session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>