<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('ap.appname') }}</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="antialiased bg-amber-400">

    <div class="flex h-screen flex-col justify-between  gap-3">
        @include('sections.navbar')

        <h1 class="bg-gray-800 p-5 text-center font-extrabold text-white"> {{ __('ap.appname') }}</h1>


        <h4 class="mt-5 bg-amber-400 p-5 text-center font-extrabold text-black">
            We Are Making Every Problem a piece of <span class="underline">CAKE </span>
        </h4>


        <div class=" justify-self-end"> @include('sections.footer') </div>

    </div>




</body>

</html>
