<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('ap.appname') }}</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('jquery/dist/jquery.js') }}"></script>


</head>

<body class="antialiased">

    <div class="grid grid-cols-5">
        <div class="col-span-1 hidden w-full md:col-span-1 md:block">@include('sections.sidebar')</div>

        <div class="col-span-5 mb-5 px-5 md:col-span-4 ">
<div class=" p-4 ">
    @include('sections.navbar')

</div>

<div class="">
    @include('sections.content')

</div>

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




        function mtranslate(lang = "") {
            if (lang.length == 2) {

                $.post(`{{ route('translate') }}`, {
                    "lang": lang
                }, function(data, status) {
                    if (data == true) {
                        window.location.reload();
                    }
                });
            }
        }


        var fromcounter = 9;



        // load more news  
        function loadmorenews() {
            let html = "";

            $.post("{{ route('moredata') }}", {
                "counter": fromcounter
            }, function(data, status) {
                if (status == "success" && data.length > 0) {
                    data.forEach((value, index, array) => {
                        html += `
<article class="max-w-xs">
            
            <a href="${value.mylink}"> 
                ${value.img != "null" ? '<img src="${value.myimg}" class="mb-5 rounded-lg w-28" alt="Image 2">':''}
                
                        <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white hover:text-blue-500"> value->title </h2>
              </a>
              </article>
  <hr class="bg-gray-200 h-1"/>
`;

                    });

                }

            });
            fromcounter += 15;
            $("#extracontent").html(html);
        }
    </script>





</body>

</html>
