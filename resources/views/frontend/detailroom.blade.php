@extends('frontend.master')
@section('title')
Home
@endsection
@section('wrapper')
<style type="text/css">
	.rslides {
	  position: relative;
	  list-style: none;
	  overflow: hidden;
	  width: 100%;
	  padding: 0;
	  margin: 0;
	  }

	.rslides li {
	  -webkit-backface-visibility: hidden;
	  position: absolute;
	  display: none;
	  width: 100%;
	  left: 0;
	  top: 0;
	  }

	.rslides li:first-child {
	  position: relative;
	  display: block;
	  float: left;
	  }

	.rslides img {
	  display: block;
	  height: auto;
	  float: left;
	  width: 100%;
	  border: 0;
	  }
</style>
<script>
  $(function() {
    $(".rslides").responsiveSlides();
  });
</script>
<div id="content" class="pdtop-70">
	<h2 class="h2-title-ardecode pdtop-30 pdbot-30">Detail Room</h2>
	<div id="detail-room">
		<div class="img-detail-slide pdbot-30">
			<ul class="rslides">
			@foreach ($imgs as $img)				
		      <li><img src="{{ asset('uploads/images') }}/{{ $img }}" alt="{{ $img }}"></li>
			@endforeach
		    </ul>
		</div>
		<div class="text-detail">
			<h3 class="room-name">{{ $room['typename'] }}</h3>
			<h4 class="room-desc">Price: ${{ $room['price'] }}/night</h4>
			<h4 class="room-desc">Utilities: @foreach (explode('|', $room['utility']) as $utility)
				{{ ucfirst( $utility ) }}, 
			@endforeach </h4>
			<p class="room-desc">Max people: {{ $room['maxpeople'] }}</p>
			<p class="room-desc">{{ $room['description'] }}</p>
		</div>
		<div class="other-rooms">
			<h2 class="h2-title-ardecode">Other Rooms</h2>
			<div class="list-room">
				@foreach($data as $item)					
					<div class="col-1-of-3 pdbot-30">
						<a href="{{ asset('/rooms') }}/{{ $item['slug'] }}">
							<div class="content-list"
								 style="background: url('{{ asset('uploads/images') }}/{{ explode('|',$item['image'])['0']  }}'); background-position: center;background-size: cover">
							</div>
							<h4 class="h3-text-center pdtop-15">{{ $item['typename'] }}</h4>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<div id="testimonial">
	<h2></h2>
</div>
<script src="{{ asset('public/frontend') }}/js/responsiveslides.min.js"></script>
@endsection