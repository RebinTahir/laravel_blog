<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

// load more news  
function loadmorenews(){
alert("we are workig on it");
}


function english() { 
    $.get("{{route('english')}}",function(data,status){
if(data == true){
window.location.reload();

}
    });
 }
 

function arabic() { 
    $.get("{{route('arabic')}}",function(data,status){
if(data == true){
window.location.reload();
}
    });
 }

function kurdish() { 
    $.get("{{route('kurdish')}}",function(data,status){
if(data == true){
window.location.reload();
}
    });
 }



</script>





    </body>
</html>
