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
        <div>
            <p>{{$user->name}}</p>
        </div>
        @endforeach
    </div>

</div>
