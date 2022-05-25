<div>
    <div class="container px-4 flex-grow w-full py-4 sm:py-10 mx-auto px-0">
      <h1 class="text-center font-bold tracking-wider text-3xl mb-4 uppercase text-gray-700 mx-auto px-2">
        Event
      </h1>
      <div class="mx-auto w-full md:w-4/5 px-4">
        <div class="container my-8 px-2 pb-1 shadow-xl">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl font-medium">
              Upcoming Event
            </h2>
            
          </div>
          <!-- Item -->
          <div id="scrollContainer" class="flex flex-no-wrap overflow-x-scroll no-scrollbar scrolling-touch items-start mb-8">
            @if($events != null)
              @foreach($events as $event)
              @if((strtotime($event->date) < strtotime(date('d-m-Y h:i'))) != null)
              <div class="flex-none w-2/3 md:w-1/3 mr-8 border rounded-lg shadow-xl border-2 border-black">
                <div href="#" class="space-y-4">
                  <div class="aspect-w-16 aspect-h-9 relative">
                    <img class="object-fit blur h-48 w-full absolute inset-0" src="/storage/event/{{$event->thumbnail}}">      
                    <img class="object-contain relative h-48 w-full" src="/storage/event/{{$event->thumbnail}}">
                  </div>
                  <div class="px-4 py-2">
                    <div class="text-lg h-20 leading-6 font-medium space-y-1">
                      <h3 class="font-bold text-gray-800 text-xl md:text-2xl mb-2">
                        {{ Str::limit($event->event_name, 27) }}
                      </h3>
                    </div>
                    <div class="text-lg">
                      <p class="">
                        <i class="nav-icon text-blue-700 far fa-calendar-alt"></i>
                        {{$event->dateFormat()}}
                      </p>
                      <p class="">
                      <i class="nav-icon text-red-500 fas fa-map-pin"></i>
                      &nbsp;{{ $event->place}}
                      </p>
                      
                    </div>
                  </div>
                </div>
                <a href="/event/{{$event->slug}}" class="">
                    <div class="w-full font-semibold rounded bg-blue-400 hover:bg-blue-500 h-10 text-center p-2">
                      Details                  
                    </div>
                </a>
              </div>
              @endif
              @endforeach
            @else
              <div class="flex-none w-2/3 md:w-1/3 mr-8 border rounded-lg shadow-xl border-2 border-black">Not Available</div>
            @endif

            
          </div>
        </div>
        <!---->
      </div>

      <!-- Latest Event -->
      <div class="mx-auto w-full md:w-4/5 px-0">
        <div class="container my-8">
          <!-- Title -->
          <div class="flex justify-between items-center mb-4">
            <h2 class="ml-2 text-3xl font-medium">
              Latest Events
            </h2>
            
          </div>
          <!-- Item -->
          <div class="grid grid-cols-2 md:grid-cols-4 ">
            @foreach($events as $event)
            @if(strtotime($event->date) > strtotime(date('d-m-Y h:i')))
            
              <div class="flex-none m-1 md:m-2 border bg-white rounded-lg">
                <div href="#" class="space-y-4">
                  <div class="aspect-w-16 aspect-h-9 relative">
                    <img class="object-fit blur h-48 w-full absolute inset-0" src="/storage/event/{{$event->thumbnail}}">      
                    <img class="object-contain relative h-48 w-full" src="/storage/event/{{$event->thumbnail}}">
                  </div>
                  <div class="px-4 py-2">
                    <div class="text-lg h-16 leading-6 font-medium space-y-1">
                      <h3 class="font-bold text-gray-800 text-lg md:text-xl mb-2">
                        {{ Str::limit($event->event_name, 30) }}
                      </h3>
                    </div>
                    <div class="text-lg">
                      <p class="">
                        <i class="nav-icon text-blue-700 far fa-calendar-alt"></i>
                        {{$event->dateFormat()}}
                      </p>
                      <p class="">
                        <i class="nav-icon text-gray-700 far fa-clock"></i>
                        {{$event->time}}
                      </p>
                      <p class="">
                        <i class="nav-icon text-red-500 fas fa-map-pin"></i>
                        {{ $event->place }}
                      </p>
                      
                    </div>
                  </div>
                </div>
                <a href="/event/{{$event->slug}}" class="">
                    <p class="w-full tracking-wide font-semibold rounded bg-blue-600 md:bg-blue-400 hover:bg-blue-500 h-10 text-center p-2">
                      Details                  
                    </p>
                </a>
              </div>
            @endif
            @endforeach
            
          </div>
        
        </div>
        <!---->
      </div>
    </div>
</div>


