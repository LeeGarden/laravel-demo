@extends('frontend.master')
@section('title')
Home
@endsection
@section('wrapper')

<div id="content" class="pdtop-70">	
	<form id="done-booking" action="" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3 class="h3-text-center">Room Infomation</h3>

        {!! $roominfo !!}

		<h3 class="h3-text-center">Customer Infomation</h3>
		
        <div class="form-group">
          <label for="name" class="col-1-of-3 control-label">Name</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control" name="name" id="name" value="" placeholder="Name">
          </div>
        </div>
        <div class="form-group">
          <label for="idcard" class="col-1-of-3 control-label">ID Card</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control" name="idcard" id="idcard" value="" placeholder="ID Card">
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-1-of-3 control-label">Address</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control" name="address" id="address" value="" placeholder="Address">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-1-of-3 control-label">Phone</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control" name="phone" id="phone" value="" placeholder="Phone">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-1-of-3 control-label">Email</label>

          <div class="col-2-of-3">
            <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="roomnumber" class="col-1-of-3 control-label">Gender</label>

          <div class="col-2-of-3">
          	<label class="col-sm-3">
              <input type="radio" name="gender" id="gender" value="1" checked>
              Male
            </label>
            <label class="col-sm-3">
              <input type="radio" name="gender" id="gender" value="0">
              Female 
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="birthday" class="col-1-of-3 control-label">Birthday</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control datepicker" name="birthday">
          </div>
        </div>
        <div class="form-group">
          <label for="job" class="col-1-of-3 control-label">Job</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control" name="job" id="job" value="" placeholder="Job">
          </div>
        </div>
        <div class="form-group">
          <label for="nationality" class="col-1-of-3 control-label">Nationality</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control" name="nationality" id="nationality" value="" placeholder="Nationality">
          </div>
        </div>
        <div class="form-group">

          <div class="col-2-of-3">
			<button type="submit" class="btn-submit pull-right">Done Booking</button>
          </div>
        </div>
	</form>
</div>
<div id="testimonial">
	<h2></h2>
</div>
@endsection