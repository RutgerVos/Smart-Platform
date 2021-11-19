@extends('layouts.app')

@section('Styles')	
<style>
	#demo-div {
		color: lightgrey;
		border-radius: 0.3rem;
	}

	#demo-div span,
	#demo-div #num-observed-events {
		color: black;
	}

	h1 {
		margin-top: 0.5rem;
	}

	h4 {
		margin-top: 0.66rem;
		font-size: 1.33rem;
	}

	#demo-div li {
		line-height: 21px;
	}

	#demo-div ul {
		margin-bottom: 0.66rem;
	}
</style>
@endsection

@section('content')
	<div role="main" class="container">
		<div class="p-3 mb-2 bg-secondary" id="demo-div">
			<a id="start_demo" class="btn btn-lg py-1 btn-success" href="#"
				role="button">Start demo</a>
			<p style="margin-top:1rem;">Num. of datapoints: <span class="badge badge-warning"
					id="num-observed-events">2</span></p>


			<h4 style="margin-top:0.75rem;">Orientation</h4>
			<ul>
				<li>X-axis (β): <span id="Orientation_b">0</span><span>°</span></li>
				<li>Y-axis (γ): <span id="Orientation_g">0</span><span>°</span></li>
				<li>Z-axis (α): <span id="Orientation_a">0</span><span>°</span></li>
			</ul>

			<h4>Accelerometer</h4>
			<ul>
				<li>X-axis: <span id="Accelerometer_x">0</span><span> m/s<sup>2</sup></span></li>
				<li>Y-axis: <span id="Accelerometer_y">0</span><span> m/s<sup>2</sup></span></li>
				<li>Z-axis: <span id="Accelerometer_z">0</span><span> m/s<sup>2</sup></span></li>
				<li>Data Interval: <span id="Accelerometer_i">16.00</span><span> ms</span></li>
			</ul>

			<h4>Accelerometer including gravity</h4>

			<ul>
				<li>X-axis: <span id="Accelerometer_gx">0</span><span> m/s<sup>2</sup></span></li>
				<li>Y-axis: <span id="Accelerometer_gy">0</span><span> m/s<sup>2</sup></span></li>
				<li>Z-axis: <span id="Accelerometer_gz">0</span><span> m/s<sup>2</sup></span></li>
			</ul>

			<h4>Gyroscope</h4>
			<ul>
				<li>X-axis: <span id="Gyroscope_x">0</span><span>°/s</span></li>
				<li>Y-axis: <span id="Gyroscope_y">0</span><span>°/s</span></li>
				<li>Z-axis: <span id="Gyroscope_z">0</span><span>°/s</span></li>
			</ul>

		</div>
	</div>
	<!-- <footer class="footer">
		<div class="container">
			<span class="text-muted small">This page is hosted on GitHub Pages, please see GitHub's privacy statement
				<a href="https://help.github.com/articles/github-privacy-statement/">here</a>.</span>
		</div>
	</footer> -->
@endsection

@content('bottomScripts')
	<script>

		function handleOrientation(event) {
			updateFieldIfNotNull('Orientation_a', event.alpha);
			updateFieldIfNotNull('Orientation_b', event.beta);
			updateFieldIfNotNull('Orientation_g', event.gamma);
			incrementEventCount();
		}

		function incrementEventCount() {
			let counterElement = document.getElementById("num-observed-events")
			let eventCount = parseInt(counterElement.innerHTML)
			counterElement.innerHTML = eventCount + 1;
		}

		function updateFieldIfNotNull(fieldName, value, precision = 10) {
			if (value != null)
				document.getElementById(fieldName).innerHTML = value.toFixed(precision);
		}

		function handleMotion(event) {
			updateFieldIfNotNull('Accelerometer_gx', event.accelerationIncludingGravity.x);
			updateFieldIfNotNull('Accelerometer_gy', event.accelerationIncludingGravity.y);
			updateFieldIfNotNull('Accelerometer_gz', event.accelerationIncludingGravity.z);

			updateFieldIfNotNull('Accelerometer_x', event.acceleration.x);
			updateFieldIfNotNull('Accelerometer_y', event.acceleration.y);
			updateFieldIfNotNull('Accelerometer_z', event.acceleration.z);

			updateFieldIfNotNull('Accelerometer_i', event.interval, 2);

			updateFieldIfNotNull('Gyroscope_z', event.rotationRate.alpha);
			updateFieldIfNotNull('Gyroscope_x', event.rotationRate.beta);
			updateFieldIfNotNull('Gyroscope_y', event.rotationRate.gamma);
			incrementEventCount();
		}

		let is_running = false;
		let demo_button = document.getElementById("start_demo");
		demo_button.onclick = function (e) {
			e.preventDefault();

			// Request permission for iOS 13+ devices
			if (
				DeviceMotionEvent &&
				typeof DeviceMotionEvent.requestPermission === "function"
			) {
				DeviceMotionEvent.requestPermission();
			}

			if (is_running) {
				window.removeEventListener("devicemotion", handleMotion);
				window.removeEventListener("deviceorientation", handleOrientation);
				demo_button.innerHTML = "Start demo";
				demo_button.classList.add('btn-success');
				demo_button.classList.remove('btn-danger');
				is_running = false;
			} else {
				window.addEventListener("devicemotion", handleMotion);
				window.addEventListener("deviceorientation", handleOrientation);
				document.getElementById("start_demo").innerHTML = "Stop demo";
				demo_button.classList.remove('btn-success');
				demo_button.classList.add('btn-danger');
				is_running = true;
			}
		};

		/*
		Light and proximity are not supported anymore by mainstream browsers.
		window.addEventListener('devicelight', function(e) {
		   document.getElementById("DeviceLight").innerHTML="AmbientLight current Value: "+e.value+" Max: "+e.max+" Min: "+e.min;
		});

		window.addEventListener('lightlevel', function(e) {
		   document.getElementById("Lightlevel").innerHTML="Light level: "+e.value;
		});

		window.addEventListener('deviceproximity', function(e) {
		   document.getElementById("DeviceProximity").innerHTML="DeviceProximity current Value: "+e.value+" Max: "+e.max+" Min: "+e.min;
		});

		window.addEventListener('userproximity', function(event) {
		   document.getElementById("UserProximity").innerHTML="UserProximity: "+event.near;
		});
		*/

	</script>
@endcontent