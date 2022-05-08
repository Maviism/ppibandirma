<div>
    <div class="container px-4 flex-grow w-full md:w-4/5 py-4 sm:py-10 mx-auto">
        <h1><a href="/event" class="text-blue-500 hover:text-blue-700"> Event </a> / {{$event->event_name}}</h1>
        
        <div class="container mt-3 rounded-lg w-full bg-white shadow-xl">
            <div class="relative">
                <img class="object-fit blur  w-full h-96 absolute inset-0" src="/storage/event/{{$event->thumbnail}}">      
                <img class="object-contain relative h-96 w-full" src="/storage/event/{{$event->thumbnail}}">
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
        <div class="container rounded-lg w-full bg-white shadow-xl">
            hello
        </div>
        
    </div>
</div>


