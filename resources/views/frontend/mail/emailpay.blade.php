<style type="text/css">
	#content-mail{
	    
	}
	#logo{
		
	}
	#logo img{
		
	}
	#content{
		
	}
	.note{
		
	}
	#prepay{
		
	}
	table{
		
	}
	.td-title{
		
	}
</style>
<div style="background: #fffcfc; font-family: Verdana,sans-serif font-size: 12px; margin: 0 auto; width: 60%;">
	<div style="width: 100%; background: #2a2e33;">		
		<img style="display: block;	padding: 30px 10px;	margin: 0 auto;" src="http://i.imgur.com/bNxSPj3.png" alt="logo">
	</div>
	<div style="width: 90%;	margin: 0 auto;">
		<h1>Hello, Huu Vien Le</h1>
		<h3>Thanks for you Booking at Deluxe Hotel</h3>		
		<hr>
		<h2>Booking Info</h2>

		<div class="table-info">
			<h3>Customer Info</h3>
			<table style="margin-left: 20px;">
				<tr>
					<td style="width: 200px;">Customer name: </td>
					<td><strong>{{ $name }}</strong></td>
				</tr>
				<tr>
					<td style="width: 200px;">Phone: </td>
					<td><strong>{{ $phone }}</strong></td>
				</tr>
				<tr>
					<td style="width: 200px;">Email: </td>
					<td><strong>{{ $email }}</strong></td>
				</tr>
				<tr>
					<td style="width: 200px;">Address: </td>
					<td><strong>{{ $address }}</strong></td>
				</tr>
			</table>
		</div>
		<div style="margin-left: 20px;">
			<h3>Booking Info</h3>
			<table>
				<tr>
					<td style="width: 200px;">ID: </td>
					<td><strong>{{ $bill_id }}</strong></td>
				</tr>
				<tr>
					<td style="width: 200px;">Room: </td>
					<td><strong>{{ $typeName }}</strong></td>
				</tr>
				<tr>
					<td style="width: 200px;">Date in: </td>
					<td><strong>{{ $dateIn }}</strong></td>
				</tr>
				<tr>
					<td style="width: 200px;">Date out: </td>
					<td><strong>{{ $dateOut }}</strong></td>
				</tr>
				<tr>
					<td style="width: 200px;"><h4>Grand total: </h4></td>
					<td><strong>${{ $grandTotal }}</strong></td>
				</tr>
				<tr>
					<td colspan="2">
						<h4 style="color:#c66f6f;">You must pay us 1 day (<span style="color: #000;text-decoration: underline;">${{ $price }}</span>) in advance to hold the reservation.</h4>
					</td>
				</tr>
			</table>
		</div>


		<h3 style="color:#c66f6f;">NOTE: Please check your order information
				if anything goes wrong please contact 
				 according to the information below.</h3>
		<h3>Thank you for choosing Deluxe Hotel!</h3>
		<hr>
		<div class="item-footer">
				<h3>Hotel Deluxe</h3>
				<h4>Phone: +84 977 593 223</h4>
				<h4>Email: contact@hoteldeluxe.com</h4>
				<h4>Website: hoteldeluxe.com</h4>
		</div>
	</div>
</div>