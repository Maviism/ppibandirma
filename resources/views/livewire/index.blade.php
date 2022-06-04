<div>
    <!--Left Col-->
	<div class="relative overflow-hidden bg-no-repeat bg-cover" style="background-position: 50%; background-image: url('https://kurumsaliletisim.bandirma.edu.tr/Content/Web/Yuklemeler/Sayfa/Resim/745/3ee0c65d204b4466823d96318f6b5a35.JPG');
          height: 500px;">
		<div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.75);">
			<div class="flex justify-center items-center h-full">
				<div class="text-center text-white px-6 md:px-12">
					<h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight mb-12 leading-tight">Welcome, You're visiting <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-pink-600">PPI&nbsp;Bandirma</span> area</h1>
					<a class="inline-block px-7 py-3 mr-1.5 border-2 border-white text-white font-medium text-sm leading-snug uppercase rounded-full shadow-md hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light" href="#!" role="button">Login</a>
					<a class="inline-block px-7 py-3 border-2 border-transparent bg-transparent text-white font-medium text-sm leading-snug uppercase rounded-full focus:outline-none focus:ring-0 transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light" href="#event" role="button">Our Event</a>
				</div>
			</div>
		</div>
		<div class="text-sm p-2 italic absolute text-gray-700 bottom-0 left-0 flex justify-center overflow-hidden bg-fixed items-end h-full">pict by: </div>
	</div>

	<section class="text-center p-2 bg-slate-50 h-auto">
		<p class="font-black text-transparent bg-clip-text bg-gradient-to-b from-blue-700 to-gray-300 mt-10 p-3">Hymne PPI Bandirma</p>
		<div class="flex justify-center">
			<audio controls>
				<source src="/hymne-ppi-bandirma.mp3" type="audio/mpeg">
				Your browser does not support the audio tag.
			</audio>
		</div>
		<p class="font-black text-transparent bg-clip-text bg-gradient-to-b from-red-600 to-gray-400 p-3">Hymne PPI Turki - Persembahan PPI Turki Kabinet Bumi Inspirasi 2021-2022</p>
		<div class="flex justify-center mb-5">
			<audio controls>
				<source src="/hymne-ppi-turki.mp3" type="audio/mpeg">
				Your browser does not support the audio tag.
			</audio>
		</div>
	</section>
	<svg class="-mt-5 mb-10 md:mb-0 md:-mt-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f8fafc" fill-opacity="1" d="M0,128L720,160L1440,64L1440,0L720,0L0,0Z"></path></svg>

	<section class="mb-32 -mt-16 text-gray-800 p-5" id="event">

		<h2 class="text-3xl md:text-4xl font-black mb-12 text-center">Event</h2>
		<div class="grid lg:grid-cols-3 gap-6">
			@foreach($events as $event)
			<div class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-lg"
				style="background-position: 50%;" data-mdb-ripple="true" data-mdb-ripple-color="light">
				<img src="/storage/event/{{$event->thumbnail}}" class="w-full object-contain h-96" />
				<a href="event/{{$event->slug}}">
				<div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
					style="background-color: rgba(0, 0, 0, 0.4)">
					<div class="flex justify-start items-end h-full">
					<div class="text-white m-6">
						<h5 class="font-bold text-lg mb-3">{{$event->event_name}}</h5>
						<p><svg class="w-5 h-5 text-yellow-400 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
						<small>{{ $event->rating->avg('rate') ?? '-'}} • <a href="event/{{$event->slug}}">Details</a></small>
						</p>
					</div>
					</div>
				</div>
				</a>
			</div>
			@endforeach

		
		</div>

  	</section>
  	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f8fafc" fill-opacity="1" d="M0,64L480,160L960,64L1440,96L1440,320L960,320L480,320L0,320Z"></path></svg>


	<section class="text-gray-800 p-5 text-center bg-slate-50">
		<h2 class="text-3xl md:text-4xl font-bold mb-20">Core PPI Bandirma</h2>

		<div class="grid lg:gap-x-8 lg:grid-cols-3">

			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Muhammad Hafidz Ramadhani</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Ketua</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Abdullah Azzam Al-Mujahidin</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Wakil ketua</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/images/teams/sekjen.jpeg" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Muhammad Ayyaasy</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Sekretaris Jendral</h5>
					<q class="text-gray-500">Tuhan pasti punya jalan untuk kita, tapi belom di cor aja</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Siti Qorri Ardianti</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Bendahara Umum</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>


			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Ridho Muhammad</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Kadiv Advokasi dan Hubungan Masyarakat</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>

			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Gifari Madyan Isnaini</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Kadiv Akastrat</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Khilmi Kurnia Alfata</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Kadiv Minat Bakat dan Budaya</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Salsabila Aisyah Putri</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Kadiv Agama</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Muahmmad Rayhan Najib</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Kadiv Informasi dan Komunikasi</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Muahmmad Sahal Khadafi</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Kadiv Sosial Pengabdian Masyarakat</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>
			<div class="mb-12">
				<div class="rounded-lg shadow-lg h-full block bg-white">
				<div class="flex justify-center">
					<div class="rounded-full shadow-lg inline-block -mt-8">
						<img src="/logo.png" class=" w-24 h-24 rounded-full object-cover" alt="">
					</div>
				</div>
				<div class="p-6">
					<h3 class="text-2xl font-bold text-blue-600">Muahmmad Akmal Maulana</h3>
					<h5 class="text-lg font-medium mb-4 text-gray-500">Kadiv Wirausaha</h5>
					<q class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam vero corporis aliquid dolore fugit fugiat?</q>
				</div>
				</div>
			</div>

			

			
		</div>

		
	</section>
	<svg class="-mt-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f8fafc" fill-opacity="1" d="M0,64L480,192L960,128L1440,96L1440,0L960,0L480,0L0,0Z"></path></svg>

	<section class="text-gray-800 p-5 text-center">
		<h2 class="text-3xl md:text-4xl font-bold mb-20">Extracurricular</h2>

	</section>

	<section class="text-gray-800 ">
		<div class="block rounded-lg shadow-lg bg-slate-50">
		<div class="flex flex-wrap items-center">
			<div class="p-10 basis-auto block w-full lg:flex lg:w-6/12 xl:w-4/12">
				<div class="">
					<img src="logo.png" class="h-full bg-contain w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg"></img>
				</div>
			</div>
			<div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-8/12">
				<div class="flex flex-wrap pt-12 lg:pt-0">
					<div class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
					<div class="flex items-start">
						<div class="shrink-0">
						<div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
							<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="headset" class="w-5 text-white"
							role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
							<path fill="currentColor"
								d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z">
							</path>
							</svg>
						</div>
						</div>
						<div class="grow ml-6">
						<p class="font-bold mb-1">Information center</p>
						<p class="text-gray-500">support@example.com</p>
						<p class="text-gray-500">+1 234-567-89</p>
						</div>
					</div>
				</div>
				<div class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
				<div class="flex items-start">
					<div class="shrink-0">
					<div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
						<i class="fa fa-gavel text-2xl text-white"></i>
					</div>
					</div>
					<div class="grow ml-6">
					<p class="font-bold mb-1">Advocate PPI Bandirma</p>
					<p class="text-gray-500">sales@example.com</p>
					<p class="text-gray-500">+1 234-567-89</p>
					</div>
				</div>
				</div>
				<div class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
				<div class="flex align-start">
					<div class="shrink-0">
					<div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
						<i class="fa text-white pl-1 text-xl fa-user-shield"></i>
					</div>
					</div>
					<div class="grow ml-6">
					<p class="font-bold mb-1">MPA PPI Bandirma</p>
					<p class="text-gray-500">press@example.com</p>
					<p class="text-gray-500">+1 234-567-89</p>
					</div>
				</div>
				</div>
				<div class="mb-12 lg:mb-0 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
					<div class="flex align-start">
						<div class="shrink-0">
						<div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
							<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bug" class="w-5 text-white"
							role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
							<path fill="currentColor"
								d="M511.988 288.9c-.478 17.43-15.217 31.1-32.653 31.1H424v16c0 21.864-4.882 42.584-13.6 61.145l60.228 60.228c12.496 12.497 12.496 32.758 0 45.255-12.498 12.497-32.759 12.496-45.256 0l-54.736-54.736C345.886 467.965 314.351 480 280 480V236c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v244c-34.351 0-65.886-12.035-90.636-32.108l-54.736 54.736c-12.498 12.497-32.759 12.496-45.256 0-12.496-12.497-12.496-32.758 0-45.255l60.228-60.228C92.882 378.584 88 357.864 88 336v-16H32.666C15.23 320 .491 306.33.013 288.9-.484 270.816 14.028 256 32 256h56v-58.745l-46.628-46.628c-12.496-12.497-12.496-32.758 0-45.255 12.498-12.497 32.758-12.497 45.256 0L141.255 160h229.489l54.627-54.627c12.498-12.497 32.758-12.497 45.256 0 12.496 12.497 12.496 32.758 0 45.255L424 197.255V256h56c17.972 0 32.484 14.816 31.988 32.9zM257 0c-61.856 0-112 50.144-112 112h224C369 50.144 318.856 0 257 0z">
							</path>
							</svg>
						</div>
						</div>
						<div class="grow ml-6">
						<p class="font-bold mb-1">Bug report</p>
						<p class="text-gray-500">muadz@maviism.xyz</p>
						</div>
					</div>
				</div>

			</div>
			</div>
		</div>
		</div>
	</section>




	

    
</div>

