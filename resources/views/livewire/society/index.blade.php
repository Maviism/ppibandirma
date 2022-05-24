<div>
    
    <div class="p-2">
        <div class="flex justify-center">
            <div class="mb-3 w-full md:w-82 xl:w-96">
                <input type="search" wire:model.debounce.800ms="search" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="exampleText0" placeholder="Search member name" />
            </div>
        </div>

        @foreach($users as $user)
        <div class="flex justify-center">
            <div class="w-96 bg-white flex py-1.5 px-2 border-b-2 border-gray-500">
                <img class="w-10 h-10 rounded-full mr-3" src="/logo.png" alt="">
                <div class="font-medium text-black">
                    <div><p class="text-md text-blue-500">{{$user->name}} . <span class="text-xs text-gray-500">{{$user->identity->arrival_year }}</span></p></div>
                    <div class="text-sm text-gray-500">{{$user->identity->faculty}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
