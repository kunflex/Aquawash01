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
  
    <body class="font-sans text-gray-900 antialiased">
        @include('sweetalert::alert')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            

            <div style="width:30%;height:20%;background-color:white;padding:20px;border-radius:8px;">
                <center>
                    <div>
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </div>
                </center>
                <br><br>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
