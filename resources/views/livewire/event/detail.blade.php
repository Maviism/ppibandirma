<div>
      <!-- summernote -->
    <div class="container px-4 flex-grow w-full md:w-4/5 py-4 sm:py-10 mx-auto">
        <h1><a href="/event" class="text-blue-500 hover:text-blue-700"> Event </a> / {{$event->event_name}}</h1>
        
        <div class="container mt-3 rounded-lg w-full bg-white shadow-xl">
            <div class="relative">
                <img class="object-fit blur  w-full h-96 lg:h-[32rem] absolute inset-0" src="/storage/event/{{$event->thumbnail}}">      
                <img class="object-contain relative h-96 lg:h-[32rem] w-full" src="/storage/event/{{$event->thumbnail}}">
            </div>
            <div class="pl-4 py-5">
                <h1 class="font-bold text-lg text-[#2f2f2f] md:text-4xl">{{$event->event_name}}</h1>
                <div class="py-5 pl-1">
                    <p class="">
                       <i class="nav-icon text-blue-700 far fa-calendar-alt"></i>
                       &nbsp;{{$event->dateFormat()}}
                    </p>
                    <p class="py-1">
                        <i class="nav-icon text-gray-700 far fa-clock"></i>
                        &nbsp;{{$event->time}}
                    </p>
                    <p class="">
                        <i class="nav-icon text-red-500 fas fa-map-pin"></i>
                        &nbsp; &nbsp;{{ $event->place}}
                    </p>
                </div>
                <h1 class="text-lg md:text-3xl mb-3 font-bold text-[#2f2f2f]">Deskripsi</h1>
                <div class="w-full md:w-1/2">
                    <p> {!! $event->description  !!} </p>
                </div>
            </div>
        </div>

        <h1 class="text-3xl mt-4 font-bold">Gallery</h1>
        <div class="container flex justify-center items-center rounded-lg w-full h-48 bg-white shadow-xl">
            <p class="font-bold text-lg">Not available...</p>
        </div>

        <!-- Rating -->
        @auth
        <div class="container mt-2 flex justify-center">
            <div class="p-3 ">
                @if(in_array($event->id, $isRated))
                <div class="text-3xl font-bold">Thanks for your review</div>
                @else
                <form wire:submit.prevent="store">
                <p class="text-3xl font-bold">Give rating for this event</p>
                <div class="flex justify-center" >
                    @for($i = 0; $i < $this->star; $i++)
                    <svg wire:click="setStar({{$i+1}})" class="w-10 h-10 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                    @for($i = $this->star; $i < 5 ; $i++)
                    <svg wire:click="setStar({{$i+1}})" class="w-10 h-10 text-gray-300 hover:text-yellow-400 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>
               
                <div class="form-group mt-2">
                        <div class="card-body">
                            <textarea wire:model="comment" class="bg-white text-gray-600 font-medium text-lg w-full border border-solid border-gray-300 rounded" rows="3" placeholder="write your review about this event"></textarea>
                        </div>
                </div>
                <div class="m-2 flex justify-between">
                    <div class="form-group ">
                        <input type="checkbox" value="1" wire:model="show_name" id="commentCheck">
                        <label for="commentCheck">show my name</label>
                    </div>
                    <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                </div>
                </form>
                @endif

            </div> 
        </div>
        @endauth
        <!-- Rating End -->

        <h1 class="text-3xl mt-4 font-bold">Reviews</h1>
        <div class="container p-2 flex rounded-lg w-full h-auto bg-white shadow-xl">
            <div>
                <div class="flex items-center p-2 ">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <p class="ml-2 text-sm font-bold text-gray-700">{{ number_format($sumRate, 2) }}</p>
                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                    <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline">{{$event->rating->count()}} reviews</a>
                </div>
                @foreach($event->rating as $rating)
                <hr>
                <article class="p-2">
                    <div class="flex items-center mb-4 space-x-4">
                        <img class="w-10 h-10 rounded-full" src="{{ $rating->show_name == 1 ? $rating->user->profile_photo_url : '' }}" alt="">
                        <div class="space-y-1 font-medium">
                            <p>{{ $rating->show_name == 1 ? $rating->user->name : 'Anon'}} <time datetime="2017-03-03 19:00" class="text-sm text-gray-500">. March 3, 2017</time>
                                <div class="flex -m-1 items-center mb-1">
                                @for($i = 0; $i < $rating->rate; $i++)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                                </div>
                            </p>
                        </div>
                    </div>
                    <p class="mb-2 font-light text-gray-500 w-full md:w-3/4 dark:text-gray-400">{{$rating->review}}</p>
                </article>
                @endforeach
                
            </div>
        </div>

    </div>
</div>




