<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{__("ap.appname")}}</title>


        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{asset('jquery/dist/jquery.js')}}"></script>

       
    </head>
    <body class="antialiased">

<div class="grid grid-cols-5">
<div class="col-span-1 hidden md:block  md:col-span-1 w-full   ">@include("sections.sidebar")</div>

<div class="col-span-5 md:col-span-4 px-5 mb-5">
    
    @include("sections.navbar")

    @include("sections.content")

</div>
<div class="col-span-5 order-last"> @include("sections.footer") </div>    

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
 





// load more news  
function loadmorenews(){
alert("we are workig on it");
}

</script>





    </body>
</html>
