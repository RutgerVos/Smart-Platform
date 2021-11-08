<title>Smart Platform/homepage</title>
<head> 
<meta charset="utf-8"/> 
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1"/>
      <!-- ,minimum-scale=1, maximum-scale=1 -->
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"/>
    <!--  Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
</head>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
             @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                     <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
             @endauth
                </div>
    @endif
<x-guest-layout>
        <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Home') }}
                    </h2>
                </div>
        </header>

    <div class="py-6 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-5">
                <p class="text-center">Welkom bij de Smart Platform applicatie</p>
                <br>
                <p class="text-center">Dit is de index pagina</p>
            </div>
        </div>
    </div>
    <div class="p-10">  
    <!--Card 1-->
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
      <img class="w-full" src="https://ae01.alicdn.com/kf/H6aae0f2645a84ff4be37b46c635bd4fay/Geeetech-Multicolor-3D-Printer-2-In-1-Out-A10M-Met-Twee-Extruders-Auto-Leveling-breken-Hervatten.jpg" alt="placeholder">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">Open Dag</div>
        <p class="text-gray-700 text-base">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#3d printers</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#robots</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#mirco controllers</span>
      </div>
    </div>
  </div>
    <body>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/user/erondu/3000x900"
            alt="apple watch photo"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/collection/190727/3000x900"
            alt="apple watch photo"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/collection/190728/3000x900"
            alt="apple watch photo"
          />
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
  </body>
  <footer class="text-center">©  {{ date("Y") }} Copyright.</footer>
</x-guest-layout>