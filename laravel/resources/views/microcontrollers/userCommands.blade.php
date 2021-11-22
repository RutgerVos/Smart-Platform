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
				ajaxCall('spacebar');
				break;
			case 37: //Left
				ajaxCall('left');
				break;
			case 38:  // Up
				ajaxCall('up');
				break;
			case 39: // Right
				ajaxCall('right');
				break;
			case 40: // Down
				ajaxCall('down');
				break;
		}
	};

	function ajaxCall(move) {
		console.log(move);
		$.ajax({
			url: "MC/store",
			type: "POST",
			data: {
				move: move
			},
			success: function () {
				console.log("it works?")
			}
		});
	}
</script>
@endsection

<!-- all main content of the page goes here -->
@section('content')

{{"hallo its working it seems"}}

@endsection

<!-- and all scripts that can be loaded last go here -->
@section('bottomScripts')

@endsection