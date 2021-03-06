<div>
    <header class="relative z-50 w-full h-20 border-b border-gray-100">
        <div class="fixed top-0 backdrop-filter-none bg-white md:bg-inherit md:backdrop-blur-3xl left-0 right-0 w-full h-20 border-b border-gray-100">
            <div class="container flex items-center justify-center h-full max-w-6xl px-8 mx-auto sm:justify-between xl:px-0">
                <a href="/" class="relative flex items-center inline-block h-5 h-full leading-none">
                    <span class="ml-3 text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-pink-600 ">PPI BANDIRMA</span>
                </a>

                <nav id="nav" class="fixed bottom-0 left-0 z-50 flex flex-row items-center justify-around w-full h-16 p-2 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 md:w-auto md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:flex md:relative">
                    <a href="/home" class="ml-0 mr-0 hidden md:block font-bold duration-100 md:ml-12 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Home</a>
                    
                    <a href="/event" class="mr-0 hidden md:block font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Event</a>
                    <a href="/users" class="mr-0 hidden md:block font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Member</a>

                    <a href="/home" class="ml-0 mr-0 font-bold duration-100 md:hidden transition-color hover:text-indigo-600"><i class="nav-icon fa fa-home text-2xl text-blue-800"></i></a>
                    <a href="/event" class="ml-0 mr-0 font-bold duration-100 md:hidden transition-color hover:text-indigo-600"><i class="nav-icon far fa-calendar-alt text-2xl text-blue-800"></i></a>
                    <a href="/users" class="ml-0 mr-0 font-bold duration-100 md:hidden transition-color hover:text-indigo-600"><i class="nav-icon fas fa-user text-2xl text-blue-800"></i></a>
                    
                    <!-- Mobile -->
                    @if (Route::has('login'))
                        @auth
                        <div class="flex flex-col block font-medium md:hidden">
                            <button class="inline-flex items-center h-8 px-4 font-bold text-indigo-100 {{ Auth::user()->balance >= 0 ? 'bg-green-600' : 'bg-red-700'}}    rounded-lg focus:shadow-outline " >{{ Auth::user()->balance}} ???</button>
                        </div>
                        @else
                        <div class="flex flex-col block font-medium md:hidden">
                            <a href="/login"
                            class="relative inline-block px-5 py-3 text-sm leading-none text-center text-white bg-indigo-700 fold-bold">Login</a>
                        </div>
                        @endauth
                    @endif
                </nav>

                @if (Route::has('login'))
                    @auth
                    <div class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">
                        @if(Auth::user()->role === "admin" | Auth::user()->role === "super-admin")
                        <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" href="/admin">Admin</a>
                        @else
                        <button class="inline-flex items-center h-8 px-4 m-2 text-md text-indigo-100 transition-colors duration-150 {{ Auth::user()->balance >= 0 ? 'bg-green-600' : 'bg-red-700'}} rounded-lg focus:shadow-outline hover:bg-indigo-800" >{{ Auth::user()->balance}} ???</button>
                        @endif
                        <div class="ml-3 relative items-center z-40 px-3 py-2">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                        
                    </div>
                    @else
                    <div class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">
                        <a href="/login" class="relative z-40 px-3 py-2 mr-0 text-sm font-bold text-pink-500 md:px-5 lg:text-indigo-700 sm:mr-3 md:mt-0">Login</a>
                        <a href="https://wa.me" class="relative z-40 inline-block w-auto h-full px-5 py-3 text-sm font-bold leading-none text-white transition-all transition duration-100 duration-300 bg-indigo-700 rounded shadow-md fold-bold lg:bg-white lg:text-indigo-700 sm:w-full lg:shadow-none hover:shadow-xl">Sign Up</a>
                    </div>
                    @endauth
                @endif
                

                @if (Route::has('login'))
                        @auth
                        <div id="nav-mobile-btn" class="absolute ml-2 top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none md:hidden sm:mt-10">
                        <div class="flex flex-col block font-medium md:hidden">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                        </div>
                        @endauth
                @endif

                <div id="nav1"
                    class="absolute hidden top-0 left-0 z-50 flex flex-col items-center justify-between  w-full h-64 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 ">
                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                    </x-jet-dropdown-link>
                    <div class="flex mt-2 flex-col block w-full font-medium border-t border-gray-200 md:hidden">
                        <a href="#_" class="w-full py-2 font-bold text-center text-pink-500">Logout</a>
                    </div>
                </div>

            </div>
           </div> 
    </header>
            
</div>
