<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>AquaClean | Official website page</title>
         <link rel="shortcut icon" href="{{asset('assets/img/aquaclean.png')}}" type="image/png">

    </head>
    <style>@import url('assets/css/style.css');</style>
    <style>@import url('assets/css/sidebar.css');</style>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

                @php
                    $role_id = auth()->user()->role_id;
                @endphp

                @if($role_id == 1)
                    @include('admin.sidebar')
                @else
                    @include('layouts.sidebar')
                @endif

                @include('layouts.navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
