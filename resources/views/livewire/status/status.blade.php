<div>
    <div class="flex justify-center sm:py-12">
        <div class=" sm:w-2/5  border border-gray-600 h-auto  ">
            <div><a href="/home"><i class="nav-icon fa fa-angle-left"></i>  Back</a></div>
            <!--middle wall-->
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
            </div>
            <div class="pl-16 pr-2">
                <p class="text-base width-auto font-medium text-black-800 flex-shrink">
                    {{$status->status}}
                </p>
                <div class="flex">
                    <!-- Icon -->
                    <div class="w-full">
                        <div class="flex items-center">
                            <div class="flex-1 text-center">
                                <a href="" class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
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
            <hr class="border-gray-600 h-5">
            <hr>

            
            @foreach($comments as $comment)
            <div class="flex flex-shrink-0 p-4 pb-0">
                <a href="#" class="flex-shrink-0 group block">
                    <div class="flex items-center">
                    <div>
                        <img class="inline-block h-10 w-10 rounded-full" src="{{$comment->user->profile_photo_url}}" alt="" />
                    </div>
                    <div class="ml-3">
                        <p class="text-base leading-6 font-medium text-gray-700">
                        {{ $comment->user->name}} 
                        <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                        • {{$comment->created_at}}
                            </span>
                            </p>
                    </div>
                    </div>
                </a>
            </div>
            <div class="pl-16 pr-2">
                <p class="text-base width-auto font-medium text-black-800 flex-shrink">
                    {{$comment->comment}}
                </p>
                <div class="flex">
                    <!-- Icon -->
                    <div class="w-full">
                        <div class="flex items-center">
                            <div class="flex-1 text-center py-2 m-2">
                                @if(in_array($comment->id, $likesComment))
                                <button wire:click="unlikeComment({{$comment->id}})">
                                   <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
                                   <span>{{ $comment->like->count() }}</span>
                                </button>
                                @else
                                <button wire:click="likeComment({{$comment->id}})">
                                    <i class="far fa-heart bg-red likeBtn pull-right" aria-hidden="true"></i>
                                    {{ $comment->like->count() }}
                                </button>
                                @endif
                            </div>   
                        </div>
                    </div>
                </div>
                
            </div><!-- End first tweet -->
            <hr class="border-gray-600">
            @endforeach
            
            <hr class="border-gray-600">
            <!--middle creat tweet-->
            <!-- Post -->
            @auth
            <form wire:submit.prevent="store({{$status->id}})">
            <div>
                <div class="flex">
                    <div class="m-2 w-10 py-1">
                        <img class="inline-block h-10 w-10 rounded-full" src="{{Auth::user()->profile_photo_url}}" alt="" />
                    </div>
                    <div class="flex-1 px-2 pt-2 mt-2">
                        <textarea wire:model="commentVal" class=" bg-transparent text-gray-400 font-medium text-lg w-full" rows="2" cols="50" placeholder="bagaimana tanggapan lesti..."></textarea>
                    </div>                    
                </div>
                <!--Text box-->
                <div class="flex">
                    <div class="flex-1">
                        <button type="submit" class="bg-blue-400 mt-2 mb-2 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                            Comment
                        </button>
                    </div>
                </div>
            </div> <!-- End post -->
            <hr class="border-gray-500 border">
            </form>
            @endauth

        </div>
    </div>
    
</div>
