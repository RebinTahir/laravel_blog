{{-- <h2 class="my-2 w-full rounded-lg bg-amber-300 p-5 text-center font-extrabold text-black">Latest News</h2>

<div class="flex flex-col gap-2">


    <div class="w-fit rounded-lg bg-gray-300 p-5">
        <div>
            <a href="" class="font-semibold text-black hover:text-blue-500 hover:underline">
                Laravel version 10 is here
            </a>
        </div>
        <div class="m-2">
            <p class="ml-5 text-black"> Laravel Website announse a new version of laravel 10.0 that come with huge
                support </p>
        </div>
    </div>



    

</div> --}}



{{-- for test --}}

<h2 class="my-2 w-full rounded-lg bg-amber-300 p-5 text-center font-extrabold text-black">Latest News</h2>

<div class="flex flex-col gap-2">

{{-- 
    <div class="w-fit rounded-lg bg-gray-300 p-5">
    <div>
        <a href="{{route('information', $i )}}" class="font-semibold text-black hover:text-blue-500 hover:underline">
            Laravel version 10 is here
        </a>
    </div>
    <div class="m-2">
        <p class="ml-5 text-black"> text

            Laravel Website announse a new version of laravel 10.0 that come with huge
            support 
               
        </p>
        </div>
    </div>
    --}}



@foreach (App\Models\Post::limit(10)->get() as $post)
    
{{-- this is post body --}}
<article class="max-w-xs">
    
    @if (!is_null($post->img))
    <img src="{{$post->img}}" class="mb-5 rounded-lg" alt="Image 2">
        
    @endif
        <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">{{$post->title}}</h2>
    <p class="mb-4 text-gray-500 dark:text-gray-400 text-clip">{{$post->body}}</p>
</article>
    
    @endforeach




    
    <div class="p-5 bg-amber-300 text-black text-center rounded-lg hover:bg-blue-500 hover:text-white  " >
        <button onclick="loadmorenews()" class="w-full h-full">{{__("ap.loadmore")}}</button>

    </div>


</div>
