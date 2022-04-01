<div>
    <hr class="border-gray-600">
    <!--middle creat tweet-->
    <!-- Post -->
    @auth
    <form wire:submit.prevent="store">
    <div>
        <div class="flex">
            <div class="m-2 w-10 py-1">
                <img class="inline-block h-10 w-10 rounded-full" src="{{Auth::user()->profile_photo_url}}" alt="" />
            </div>
            <div class="flex-1 px-2 pt-2 mt-2">
                <textarea wire:model="opini" class=" bg-transparent text-gray-400 font-medium text-lg w-full" rows="2" cols="50" placeholder="What's happening?"></textarea>
            </div>                    
        </div>
        <!--Text box-->
        <div class="flex">
            <div class="flex-1">
                <button type="submit" class="bg-blue-400 mt-2 mb-2 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                    Share
                </button>
            </div>
        </div>
    </div> <!-- End post -->
    <hr class="border-gray-500 border">
    </form>
    @endauth
    <div>
    </div>

@foreach($opinions as $opini)
        <div class="flex flex-shrink-0 p-4 pb-0">
            <a href="#" class="flex-shrink-0 group block">
                <div class="flex items-center">
                <div>
                    <img class="inline-block h-10 w-10 rounded-full" src="{{$opini->user->profile_photo_url}}" alt="" />
                </div>
                <div class="ml-3">
                    <p class="text-base leading-6 font-medium text-gray-700">
                    {{ $opini->user->name}} 
                    <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                    • {{$opini->created_at}}
                        </span>
                        </p>
                </div>
                </div>
            </a>
        </div>
        <div class="pl-16 pr-2">
            <p class="text-base width-auto font-medium text-black-800 flex-shrink">
                {{$opini->opini}}
            </p>
            <div class="flex">
                <!-- Icon -->
                <div class="w-full">
                    <div class="flex items-center">
                        <div class="flex-1 text-center">
                            <a href="#" class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                <svg class="text-center h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </a>
                        </div>

                        <div class="flex-1 text-center py-2 m-2">
                            <a href="#" class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </a>
                        </div>    
                    </div>
                </div>
            </div>
            
        </div><!-- End first tweet -->
        <hr class="border-gray-600">
        @endforeach
</div>
