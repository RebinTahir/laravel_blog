<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('ap.appname') }}</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="{{asset('jquery/dist/jquery.min.js')}}"></script>

</head>

<body class="antialiased">

    <div class="grid grid-cols-5">
        <div class="col-span-1 hidden w-full md:col-span-1 md:block">@include('sections.sidebar')</div>

        <div class="col-span-5 mb-5 px-5 md:col-span-4">

            @include('sections.navbar')




            @if (!is_null($data))
                <main class="bg-white pb-16 pt-8 antialiased dark:bg-gray-900 lg:pb-24 lg:pt-16 h-screen">
                    <div class="mx-auto flex max-w-screen-xl  px-4 flex-col justify-center items-center">
                        <img src="{{$data->myimg}}" class="mb-5 rounded-lg w-28" alt="Image 2">

                        <article
                            class="format format-sm format-blue mx-auto w-full max-w-4xl 
                            dark:format-invert sm:format-base lg:format-lg">
                         
                     <h2> {!! $data->title !!}</h2>
                         
                     <p class="px-5"> {!! $data->body !!}</p>
                        </article>
                    </div>
                </main>

      
          
         
         
                @else
                 <h1> {{ __('ap.datanotfound') }} </h1>
                <h3> {{ __('ap.suggestedposts') }} </h3>
            
                @endif 

        </div>
        <div class="order-last col-span-5"> @include('sections.footer') </div>

    </div>

<script>
    $(document).ready(function() {
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
});

function mtranslate(lang) { 
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
