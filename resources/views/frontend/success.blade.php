@extends('frontend.master')
@section('title')
Home
@endsection
@section('wrapper')

<div id="content" class="pdtop-70">
	<h2 class="h3-text-center pdtop-70 pdbot-30">Booking success.<br/>Please check email and make payment to complete the booking</h2>
	<div id="list-room">
		<center>Auto redirect Home page...
			<div id="countdown">10</div></center>
			<script type="text/javascript">
                    var seconds;
                    var temp;

                    function countdown() {
                        seconds = document.getElementById('countdown').innerHTML;
                        seconds = parseInt(seconds, 5);

                        if (seconds == 1) {
                            temp = document.getElementById('countdown');
                            temp.innerHTML = "Redirecting...";
                            return;
                        }

                        seconds--;
                        temp = document.getElementById('countdown');
                        temp.innerHTML = seconds;
                        timeoutMyOswego = setTimeout(countdown, 1000);
                    }
                    countdown();
                    function forward() {
                        window.location = "{{ asset('/')}}";
                    }
                    setTimeout('forward()', 7000);
                </script>			
	</div>
</div>
<div id="testimonial">
	<h2></h2>
</div>
@endsection