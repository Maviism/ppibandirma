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
                <textarea wire:model="status" class="bg-transparent text-gray-400 font-medium text-lg w-full" rows="2" cols="50" placeholder="What's happening?"></textarea>
            </div>
        </div>
        @error('status')<span class="error text-red-400 ml-4">{{ $message }}</span> @enderror                    
        <!--Text box-->
        
            <div class="flex {{Auth::user()->balance >= 0 ? 'justify-between' : 'justify-end'}} pl-8">
                @if( Auth::user()->balance >= 0 )
                <div class="form-group p-3  ml-6">
                    <input type="checkbox" wire:model="show_name" value="1" id="show_name" name="show_name">
                    <label for="commentCheck">hide my name</label>
                </div>
                @endif
                <button type="submit" class="bg-blue-400 mt-2 mb-2 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                    Share
                </button>
            </div>
    
    </div> <!-- End post -->
    <hr class="border-gray-500 border">
    </form>
    @endauth
   

    @foreach($statuses as $status)
        <div class="flex flex-shrink-0 p-4 pb-0">
            <a href="#" class="flex-shrink-0 group block">
                <div class="flex items-center">
                    <div>
                        <img class="inline-block h-10 w-10 rounded-full" src="{{$status->hide_name == 0 ? $status->user->profile_photo_url : '/logo.png'}}" alt="" />
                    </div>
                    <div class="ml-3">
                        <p class="text-base leading-6 font-medium text-gray-700">
                        {{ $status->hide_name == 0 ? $status->user->name : 'Anonim'}} 
                        <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                        • {{$status->created_at}}
                            </span>
                            </p>
                    </div>
                </div>
            </a>
            @auth
            @if($status->user_id == Auth::user()->id)
            <div class="flex items-center justify-end w-full">
                <form action="">
                    <button class="text-gray-600 font-bold">x</button>

                </form>
            </div>
            @endif
            @endauth
        </div>
        <div class="pl-16 pr-2">
            <p class="text-base width-auto font-normal text-black-800 flex-shrink">
                {{$status->status}}
            </p>
            <div class="flex">
                <!-- Icon -->
                <div class="w-full">
                    <div class="flex items-center">
                        <div class="flex-1 text-center">
                            <a href="status/{{$status->id}}" class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                <svg class="text-center h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg> {{$status->comment->count()}}
                            </a>
                        </div>

                        <div class="flex-1 text-center py-2 m-2">
                               @if(in_array($status->id, $likes))
                               <button wire:click="unlikeStatus({{$status->id}})">
                                   <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
                                   <span>{{ $status->like->count() }}</span>
                                </button>
                                @else
                                <button wire:click="likeStatus({{$status->id}})">
                                    <i class="far fa-heart bg-red likeBtn pull-right" aria-hidden="true"></i>
                                    {{ $status->like->count() }}
                                </button>
                                @endif
                        </div>    
                    </div>
                </div>
            </div>
            
        </div><!-- End first tweet -->
        <hr class="border-gray-600">
        @endforeach
</div>
