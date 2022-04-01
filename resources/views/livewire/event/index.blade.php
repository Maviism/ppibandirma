<div>
    <main class="p-6">
        <div class="text-center font-bold mb-4 -mt-5">UPCOMING EVENT</div>
        <div class="grid sm:grid-cols-2 grid-cols-2 md:grid-cols-3 grid flow-col gap-4">
            <!-- Card -->
            @foreach($events as $event)
            <a href="#" class="flex flex-col items-start bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/storage/event/image.jpeg" alt="">
                <div class="flex flex-col p-3 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$event->event_name}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {!! Str::limit($event->description) !!}</p>
                    <div class="items-end">
                        <div>
                            <i class="nav-icon fas fa-map-signs"></i>
                            <p class="inline" >{{$event->event_place}}</p>
                        </div>
                        <div>
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p class="inline" >{{$event->date}}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
                     
        </div>
    </main>
</div>


