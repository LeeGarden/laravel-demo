@extends('frontend.master')
@section('title')
About Us
@endsection
@section('wrapper')


<div id="content" class="pdtop-70">
	<h2 class="h2-title-ardecode pdtop-30 pdbot-30">About Us & Contact</h2>
	<div id="content-contact">
		<div id="maps" class="pdbot-30">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.812861926461!2d108.22041631441815!3d16.07519798887721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142183081e4bf9d%3A0xca4bb165ac11fa46!2zMTUgUXVhbmcgVHJ1bmcsIEjhuqNpIENow6J1IDEsIFEuIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1481250810377" frameborder="0" style="border:0" allowfullscreen=""></iframe>
		</div>
		<div id="contact-info">
			<h3 class="h3-text-center pdtop-30">Contact Info</h3>
			<div id="list-room">
				<h4 class="h4-text">Hotel Deluxe</h4>
				<h4 class="h4-text">Phone: +84 977 593 223</h4>
				<h4 class="h4-text">Email: contact@hoteldeluxe.com</h4>
				<h4 class="h4-text">Address: 15 Quang Trung - DN</h4>
			</div>
		</div>
		<div id="contact-form">
			<p class="param-text" style="font-size: 1em">Thanks for your interest. Please complete the form below to send us your question or comment and we'll get back to you as soon as possible!</p>
			<div class="form-item form-item-50">
				<label class="form-label">First name</label>
				<input type="text" name="fullname">
			</div>
			<div class="form-item  form-item-50">
				<label class="form-label">Last name</label>
				<input type="text" name="fullname">
			</div>
			<div class="form-item form-item-50">
				<label class="form-label">Email</label>
				<input type="text" name="fullname">
			</div>
			<div class="form-item  form-item-50">
				<label class="form-label">Phone</label>
				<input type="text" name="fullname">
			</div>
			<div class="form-item form-item-100" >
				<label class="form-label">Content</label>
				<textarea name="content" style="width: 100%" rows="10"></textarea>
				<div class="pdbot-30"></div>
				<input type="submit" name="submit" id="submit">
			</div>
		</div>
	</div>
</div>
<div id="testimonial">
	<h2></h2>
</div>
@endsection