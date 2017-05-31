@extends('frontend.master')
@section('title')
Home
@endsection
@section('wrapper')

<div id="content" class="pdtop-70">	
	<div id="list-room">
	{!! $avaible or $divroomtype !!}
	</div>
</div>
<div id="testimonial">
	<h2></h2>
</div>
@endsection