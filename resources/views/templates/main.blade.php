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
    <x-header></x-header>
    <div class="flex overflow-hidden bg-white pt-14">
        <x-sidebar></x-sidebar>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

        <div id="main-content" class="h-full w-full bg-gray-50 min-h-screen relative overflow-y-auto lg:ml-64">
            <main class="pt-6 px-4">
                @yield('content')
            </main>
        </div>

    </div>
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
