<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>
        @yield('title', '-') | {{ config('app.name') }}
    </title>

    <meta name="description" content="Siretu application report SMK Negeri 1 Pekalongan" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="turbolinks-cache-control" content="no-cache">
    @include('includes.basic-style')
    @livewireStyles
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <x-sidebar></x-sidebar>
            <div class="layout-page">
                <x-header></x-header>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <x-toast></x-toast>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    @routes
    @livewireScripts
    @livewireChartsScripts
    @livewire('wire-elements-modal')
    @include('includes.basic-script')
    <x-livewire-alert::scripts />
</body>

</html>
