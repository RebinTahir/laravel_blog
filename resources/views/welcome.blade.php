<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{__("ap.appname")}}</title>


        @vite(['resources/css/app.css', 'resources/js/app.js'])

       
    </head>
    <body class="antialiased">

<div class="grid grid-cols-5">
<div class="col-span-1 hidden md:block ">
    @include("sections.sidebar")

</div>
<div class="col-span-5 md:col-span-4">
    @include("sections.navbar")

</div>


<div class="content col-span-5">@include("sections.content")</div>
<div class="content col-span-5"> @include("sections.footer") </div>

</div>




    </body>
</html>
