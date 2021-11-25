@extends('layouts.app')

<!-- put all style links in this section -->
@section('Styles')

@endsection

<!-- all scripts that have to be loaded first go here -->
@section('topScripts')
<script>
	document.onkeydown = function (e) {
		switch (e.keyCode) {
			case 32: //spacebar
				axiosCall('spacebar');
				break;
			case 37: //Left
				axiosCall('left');
				break;
			case 38:  // Up
				axiosCall('up');
				break;
			case 39: // Right
				axiosCall('right');
				break;
			case 40: // Down
				axiosCall('down');
				break;
		}
	};

	function axiosCall(move) {
		axios.post('api/MC/store', {
			move: move
		})
		.then(function (response) {
			console.log(response);
		})
		.catch(function (error) {
			console.log(error);
		})
	};
</script>
@endsection

<!-- all main content of the page goes here -->
@section('content')

{{"hallo, its working it seems"}}

@endsection

<!-- and all scripts that can be loaded last go here -->
@section('bottomScripts')

@endsection