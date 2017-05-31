<script type="text/javascript">
    window.onload = function () {
        /*------------- valid form register, design by Van Khuong ----------*/
        var inputs = document.forms['booking'].getElementsByTagName('input');
        var run_onchange = false;
        function valid() {
            var errors = false;
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!

            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = mm + '/' + dd + '/' + yyyy;
            var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
            for (var i = 0; i < inputs.length; i++) {
                var value = inputs[i].value;
                var id = inputs[i].getAttribute('id');

                // Tạo phần tử span lưu thông tin lỗi
                var span = document.createElement('span');
                // Nếu span đã tồn tại thì remove
                var p = inputs[i].parentNode;
                if (p.lastChild.nodeName == 'SPAN') {
                    p.removeChild(p.lastChild);
                }

                // Kiểm tra rỗng
                if (value == '') {
                    span.innerHTML = ' Please select dates';
                } else {
                    // Kiểm tra các trường hợp khác

                    if (id == 'datepickerI' && value < today) {
                        span.innerHTML = ' Invalid date';
                    }
                    if (id == 'datepickerO' && value < today) {
                        span.innerHTML = ' Invalid date';
                    }
                    if (id == 'datepickerI') {
                        var datepickerI = value;
                    }
                    if (id == 'datepickerO' && value <= datepickerI) {
                        span.innerHTML = 'Invalid date';
                    }

                }

                // Nếu có lỗi thì span vào hồ sơ, chạy onchange, submit return false, highlight border
                if (span.innerHTML != '') {
                    inputs[i].parentNode.appendChild(span);
                    errors = true;
                    run_onchange = true;
                    inputs[i].style.border = '1px solid #c6807b';
                    inputs[i].style.background = '#fffcf9';
                    span.style.color = 'red';
                }
            }// end for

            if (errors == false) {
            }
            return !errors;
        }// end valid()

        // Chay ham kiem tra
        var register = document.getElementById('checkroom');
        register.onclick = function () {
            return valid();
        }

        // Kiểm tra lỗi với sự kiện onchange -> gọi lại hàm valid()
        for (var i = 0; i < inputs.length; i++) {
            var id = inputs[i].getAttribute('id');
            inputs[i].onchange = function () {
                if (run_onchange == true) {
                    this.style.border = '1px solid #8A2424';
                    this.style.background = '#fff';
                    this.style.color = '#000';
                    valid();
                }
            }
        }// end for
    }// end onload
</script>
<div id="header-top">
	<nav id="cnt-header-top">
		<div id="logo">
			<a href="{{ asset('/') }}"><img src="{{ asset('public/frontend') }}/images/logo.png" alt="logo.png"></a>
		</div>
		<ul id="main-nav">
			<li><a href="{{ asset('/') }}">Home</a></li>
			<li><a href="{{ asset('booking') }}">Bookings</a></li>
			<li><a href="{{ asset('rooms') }}">Rooms</a></li>
			<li><a href="#">Restaurant</a></li>
			<li><a href="#">conference</a></li>
			<li><a href="{{ asset('about') }}">Contact Us</a></li>
		</ul>
	</nav>
</div>
<div id="banner">
	<div id="text-banner">
		<h4><strong>Hello, </strong>You've Reached</h4>
		<h2>Hotel Deluxe</h2>
		<h3>hotel - spa sloon - fine dining</h3>
	</div>			
	<div id="booking">
		<form action="{{ asset('booking')}}" name="booking" method="POST"><table>
			<input type ="hidden" name="_token" value="{{ csrf_token() }}">
			<tr>
				<td><span>Arrival</span></td>
				<td><span>Departure</span></td>
				<td><span>Room Type</span></td>
				<td></td>
			</tr>
			<tr>
				<td><input type="text" class="datepicker" id="datepickerI" name="dateIn"></td>
				<td><input type="text" class="datepicker" id="datepickerO" name="dateOut"></td>
				<td>
					<select name="roomtype">
						<option value="">Select Room</option>
						{!! $option !!}
					</select>
				</td>
				<td><input type="submit" id="checkroom" name="booking" value="View Prices"></td>
			</tr>
			<tr>
				<td><span></span></td>
				<td><span></span></td>
				<td><span></span></td>
				<td></td>
			</tr>
		</table></form>
	</div>
</div>