<div>
    
    <div class="container text-center p-2">
        <div class="flex justify-center">
            <div class="mb-3 w-full md:w-82 xl:w-96">
                <input type="search" wire:model.debounce.800ms="search" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="exampleText0" placeholder="Search member" />
            </div>
        </div>
        <p>{{$search}}</p>
        @foreach($users as $user)
        <div class="flex items-center space-x-4">
            <img class="w-10 h-10 rounded-full" src="/logo.png" alt="">
            <div class="space-y-1 font-medium text-black">
                <div>{{$user->name}}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{$user->identity->faculty}}</div>
            </div>
        </div>
        @endforeach
    </div>

</div>
