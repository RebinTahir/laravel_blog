<h2 class="my-2 w-full rounded-lg bg-amber-300 p-5 text-center font-extrabold text-black">Latest News</h2>

<div class="flex flex-col gap-2">



    @foreach (App\Models\Post::limit(10)->get() as $post)
        {{-- this is post body --}}
        <article class="max-w-xs">
            
            @if($post->img != "null")
                <img src="{{$post->myimg}}" class="mb-5 rounded-lg w-28" alt="Image 2">
            @endif
            <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">{{ $post->title }}</h2>
            <p class="mb-4 text-clip text-gray-500 dark:text-gray-400">{{ $post->body }}</p>
        </article>
    @endforeach

    <div class="rounded-lg bg-amber-300 p-5 text-center text-black hover:bg-blue-500 hover:text-white">
        <button onclick="loadmorenews()" class="h-full w-full">{{ __('ap.loadmore') }}</button>

    </div>


</div>
