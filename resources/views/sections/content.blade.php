<h2 class="my-2 w-full rounded-lg bg-amber-300 p-5 text-center font-extrabold text-black">Latest News</h2>

<div class="flex flex-col gap-2">



    @foreach (App\Models\Post::limit(10)->get() as $post)
        {{-- this is post body --}}
        <article class="max-w-xs">
            
          <a href="{{route('information',['id'=>$post->id])}}">

              @if($post->img != "null")
              <img src="{{$post->myimg}}" class="mb-5 rounded-lg w-28" alt="Image 2">
              @endif
              <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white hover:text-blue-500">{{ $post->title }}</h2>
            </a>
            </article>
<hr class="bg-gray-200 h-1"/>

    @endforeach

    <div class="rounded-lg bg-amber-300 p-5 text-center text-black hover:bg-blue-500 hover:text-white">
        <button onclick="loadmorenews()" class="h-full w-full">{{ __('ap.loadmore') }}</button>

    </div>


</div>
