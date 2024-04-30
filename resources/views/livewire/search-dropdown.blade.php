<div class="relative mt-3 md:mt-0" x-data="{  isOpen: true  }" @click.away="isOpen=false">
    <input 
        wire:model.live.debounce.300ms="search" 
        type="text" 
        class="bg-gray-800 rounded-full w-64 px-4 pl-9 py-1 md:py-3 focus:shadow-outline" placeholder="Search"
        x-ref="search"
        @keydown.window="

            if(event.keyCode=== 191)
            {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @click="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        
    >
    <div class="absolute top-0 md:top-2">
        <svg class="fill-current w-5 mt-1.5 ml-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 32 32">
            <path d="M 19 3 C 13.488281 3 9 7.488281 9 13 C 9 15.394531 9.839844 17.589844 11.25 19.3125 L 3.28125 27.28125 L 4.71875 28.71875 L 12.6875 20.75 C 14.410156 22.160156 16.605469 23 19 23 C 24.511719 23 29 18.511719 29 13 C 29 7.488281 24.511719 3 19 3 Z M 19 5 C 23.429688 5 27 8.570313 27 13 C 27 17.429688 23.429688 21 19 21 C 14.570313 21 11 17.429688 11 13 C 11 8.570313 14.570313 5 19 5 Z"></path>
        </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-5 mt-6"></div>

    @if(strlen($search) > 0)
        <div 
            class="z-55 absolute bg-gray-800 text-sm rounded w-64 mt-4" 
            x-show.transition.opacity="isOpen"
            >  

            @if($searchResults->count() >0)
                <ul>
                    @foreach($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="{{     route('movies.show',$result['id'])    }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center "
                                @if($loop->last) @keydown.tab="isOpen = false" @endif
                            >
                                @if($result['poster_path'])
                                    <img src="{{ 'https://image.tmdb.org/t/p/w92/' .$result['poster_path']  }}" alt="" class="w-8 ">
                                @else
                                    <img src="{{ 'https://via.placeholder.com/50x75' .$result['poster_path']  }}" alt="" class="w-8 ">
                                @endif
                                <span class="ml-3">{{$result['title']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No result for {{$search}}</div>
            @endif
        </div>
    @endif
</div>
