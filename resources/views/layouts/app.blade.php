{{-- So What we want to do is to inherite from this template --}}
<!DOCTYPE html>
<html>

<head>
    <title>Tasks List App</title>
      <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
      <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label {
          @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
          @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
          @apply text-red-500 text-sm
        }
      </style>
    {{-- blade-formatter-enable --}}

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