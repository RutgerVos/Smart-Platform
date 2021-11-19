<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('smart-platform', 'smart-platform') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	@yield('Styles')

	@livewireStyles

	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}" defer></script>
	@yield('topScripts')
</head>
<body class="font-sans antialiased">
	<x-jet-banner />
	<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
	<a class="navbar-brand" href="{{ url('/') }}">
		{{ config('smart-platform', 'smart-platform') }}
	</a>
	</h2>
	<x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('/')">
		{{ __('Home') }}
	</x-jet-nav-link>
	<x-jet-nav-link href="{{ route('Events') }}" :active="request()->routeIs('/Events')">
		{{ __('Events') }}
	</x-jet-nav-link>
	@guest
		<x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('/login')">
		{{ __('Login') }}
		</x-jet-nav-link>
		
		@if (Route::has('register'))
			<x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('/register')">
				{{ __('Register') }}
			</x-jet-nav-link>
		@endif
	@endguest
	</div>

		<!-- Page Content -->
		<main>
			@yield('content')
		</main>
	
	@stack('modals')

	<footer class="text-center">©  {{ date("Y") }} LabTwee23 Copyright.</footer>
	<br>
	@yield('bottomScripts')
	@livewireScripts
</body>
</html>