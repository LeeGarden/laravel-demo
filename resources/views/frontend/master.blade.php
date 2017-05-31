	<!DOCTYPE html>
	<html>
	<head>
		@include('frontend.include.head')
	</head>
	<body>
		<header>
			@include('frontend.include.header')
		</header>
		<div id="wrapper">
			@yield('wrapper')
		</div>
		<footer>
			<div id="main-footer">
				<div class="col-1-of-5">
					<h3 class="h3-title-footer">ABOUT THIS HOTEL</h3>
					<p class="param-text">Hotel Deluxe</p>
					<p class="param-text">Phone: +84 977 593 223</p>
					<p class="param-text">Email: contact@hoteldeluxe.com</p>
					<p class="param-text">Address: 15 Quang Trung -Da Nang</p>
				</div>
				<div class="col-1-of-5">
					<h3 class="h3-title-footer">Latest news</h3>
					<p class="param-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate consequuntur ullam ab deserunt consectetur odit.</p>
					<p class="param-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, corrupti.</p>
				</div>
				<div class="col-2-of-5">
					<h3 class="h3-title-footer">Join Deluxehotels</h3>
					<p class="param-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate consequuntur ullam ab deserunt consectetur odit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio accusantium voluptate a magnam, officia consequuntur corrupti quos impedit placeat porro.</p>
					<p class="param-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, corrupti.</p>
					<a href="#" class="btn-submit">Read More</a>
				</div>
				<div class="col-1-of-5 last-col">
					<h3 class="h3-title-footer">Members Area</h3>
					<form id="login" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
					<table>
						<tr><td><h4>Email</h4></td></tr>
						<tr><td><input type="email" name="email" value="{{ old('email') }}"</td></tr>
						<tr><td><h4>Password</h4></td></tr>
						<tr><td><input type="password" name="password" required></td></tr>
						<tr><td><input type="submit" name="login" class="btn-submit" value="Login"></td></tr>
					</table></form>
				</div>
			</div>
			<div id="bot-footer"></div>
		</footer>
	</body>

	</html>