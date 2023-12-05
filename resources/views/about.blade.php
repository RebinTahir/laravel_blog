<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('ap.appname') }}</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('jquery/dist/jquery.js')}}"></script>


</head>

<body class="antialiased bg-amber-400">

    <div class="flex h-screen flex-col justify-between  gap-3">
        <div class="p-5">
            @include('sections.navbar')
        </div>

        <h1 class="bg-gray-800 p-5 text-center font-extrabold text-white"> {{ __('ap.appname') }}</h1>


        <h4 class="mt-5 bg-amber-400 p-5 text-center font-extrabold text-black">
            We Are Making Every Problem a piece of <span class="underline">CAKE </span>
        </h4>


        <div class=" justify-self-end"> @include('sections.footer') </div>

    </div>


<script>
    $(document).ready(function() {
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
});




function mtranslate(lang ="") { 
    if(lang.length == 2){

        $.post(`{{route('translate')}}`,{"lang":lang},function(data,status){
            if(data == true){
                window.location.reload();           
            }
        });
    }
 }
 
</script>

</body>

</html>
