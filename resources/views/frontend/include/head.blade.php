
<title>@yield('title')</title>
<meta charset="utf-8" />
<link rel="icon" href="{{ asset('public/frontend/images/hotel.ico') }}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/reset.css" />		
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/style.css" />
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/font-awesome.css" />	
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Droid+Sans|Quicksand" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
		$( ".datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	} );
</script>
<script type="text/javascript">
	$('li > a').click(function() {
			$('a').removeClass();
			$('#abooking').addClass('active');
		});
</script>