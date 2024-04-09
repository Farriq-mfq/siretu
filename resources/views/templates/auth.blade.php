<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', config('app.name')) | {{ config('app.name') }}
    </title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <div class="h-full w-full bg-gray-50 min-h-screen relative">
        <main class="bg-gray-50">
            <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
                @yield('content')
            </div>
        </main>
    </div>
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
