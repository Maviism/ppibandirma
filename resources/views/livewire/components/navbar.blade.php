<div>
<header class="relative z-50 w-full h-24">
            <div class="container flex items-center justify-center h-full max-w-6xl px-8 mx-auto sm:justify-between xl:px-0">
                <a href="/" class="relative flex items-center inline-block h-5 h-full font-black leading-none">
                    <span class="ml-3 text-xl text-gray-800">PPI BANDIRMA</span>
                </a>

                <nav id="nav" class="absolute top-0 left-0 z-50 flex flex-col items-center justify-between hidden w-full h-64 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 md:w-auto md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:flex md:relative">
                    <a href="/home" class="ml-0 mr-0 font-bold duration-100 md:ml-12 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Home</a>
                    <a href="/event" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Event</a>
                    <a href="/finance" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Keuangan</a>
                    
                    <!-- Mobile -->
                    @if (Route::has('login'))
                        @auth
                        <div class="flex flex-col block w-full font-medium border-t border-gray-200 md:hidden">
                            <a href="#_" class="w-full py-2 font-bold text-center text-pink-500">{{Auth::user()->name}}</a>
                        </div>
                        @else
                        <div class="flex flex-col block w-full font-medium border-t border-gray-200 md:hidden">
                            <a href="/login" class="w-full py-2 font-bold text-center text-pink-500">Masuk</a>
                            <a href="/register"
                            class="relative inline-block w-full px-5 py-3 text-sm leading-none text-center text-white bg-indigo-700 fold-bold">Daftar</a>
                        </div>
                        @endauth
                    @endif
                </nav>

                @if (Route::has('login'))
                    @auth
                    <div class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">
                        <a href="{{ url('/dashboard') }}" class="relative flex items-center  z-40 px-3 py-2 mr-0 text-sm font-bold text-pink-500 md:px-1 lg:text-indigo-700 sm:mr-3 md:mt-0"><p>{{Auth::user()->name}} </p> <img class="ml-2 h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /></a>
                    </div>
                    @else
                    <div class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">
                        <a href="/login" class="relative z-40 px-3 py-2 mr-0 text-sm font-bold text-pink-500 md:px-5 lg:text-indigo-700 sm:mr-3 md:mt-0">Login</a>
                        <a href="/register" class="relative z-40 inline-block w-auto h-full px-5 py-3 text-sm font-bold leading-none text-white transition-all transition duration-100 duration-300 bg-indigo-700 rounded shadow-md fold-bold lg:bg-white lg:text-indigo-700 sm:w-full lg:shadow-none hover:shadow-xl">Sign Up</a>
                    </div>
                    @endauth
                @endif

                <div id="nav-mobile-btn" class="absolute top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none md:hidden sm:mt-10">
                    <span class="block w-full h-1 mt-2 duration-200 transform bg-gray-800 rounded-full sm:mt-1"></span>
                    <span class="block w-full h-1 mt-1 duration-200 transform bg-gray-800 rounded-full"></span>
                </div>

            </div>
        </header>
            
</div>
