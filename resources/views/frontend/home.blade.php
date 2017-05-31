@extends('frontend.master')
@section('title')
Home
@endsection
@section('wrapper')

@include('frontend.include.slide')

<div id="content">
	<h2 class="h2-title-ardecode pdtop-30 pdbot-30">Our Room Type</h2>
	<div id="list-room">
	{!! $divroomtype !!}			
	</div>
</div>
<div id="testimonial">
	<h2></h2>
</div>
@endsection