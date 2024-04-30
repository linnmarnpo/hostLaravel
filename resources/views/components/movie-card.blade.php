<div class="mt-8">
    <a class="flex justify-center w-auto" href="{{    route('movies.show', $movie['id'])   }}">
        <img src="{{ $movie['poster_path']  }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2 hover:text-gray-300">
        <a href="{{    route('movies.show', $movie['id'])   }}" class="text-lg mt-2">{{  $movie['title']  }}</a>
        <div class="flex items-center text-gray-400 mt-2">
            <span><i class="fa-solid fa-star fill-current text-orange-500 w-4"></i></span>
            <span class="ml-1"> {{ $movie['vote_average']  }}</span>
            <span class="mx-2">|</span>
            <span>{{  $movie['release_date']  }}</span>
        </div>
        <div class="text-gray-400 text-sm">{{ $movie['genres']}}</div>
    </div>
</div>