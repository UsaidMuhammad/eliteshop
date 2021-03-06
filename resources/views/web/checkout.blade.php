<!DOCTYPE html>
<html>

<head>
	<title>Elite Shop</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="{{url('/assets/web')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{url('/assets/web')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{url('/assets/web')}}/css/font-awesome.css" rel="stylesheet">
	<link href="{{url('/assets/web')}}/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<!-- //for bootstrap working -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
</head>

<body>
	@include("web.includes.header")

	<!-- banner -->
	@include("web.includes.menu") 
	@include('web.includes.login')

	<div class="modal-body modal-body-sub_agile">
		<div class="col-md-10 col-lg-offset-1 modal_body_left modal_body_left1" style="margin-top:60px">
			<h1 class="text-center">Checkout</h1>
			<?php $amount = 0;?>
			@if (count($cart)>0)
			@foreach ($cart as $item)
			<div class="row" style="margin-top:20px">
				<div class="col-md-2">
					<img src="{{url('assets/uploads/products_thumb/'.$item->options->Image)}}" width="150">
				</div>
				<div class="col-md-6">
					<h3 style="margin-top:20px">{{$item->name}}</h3>
					<h4 style="margin-top:20px">Quantity: {{$item->qty}}</h4>
					{{Form::hidden('quantity[]', $item->qty)}}
					{{Form::hidden("ProductID[]",$item->id)}}
					{{Form::hidden("_type[]",$item->options->_type)}}
					<h4 style="margin-top:20px">Cost: {{$item->subtotal}} PKR</h4>
				</div>
				<div class="col-md-2 text-center">
					<div class="clearfix"></div>
				</div>
			</div>
			<?php $amount += $item->subtotal?>
			@endforeach
			<div style="margin-top:20px">
					<h1>Shipping Details</h1>
					{{Form::open(['url'=>'checkout'])}}
					<div style="margin-top:50px;">
						<label>Name</label>
						<input type="text" name="name" required="" value="{{$user['Name']}}" disabled>
						<span></span>
					</div>
					<div style="margin-top:50px;">
						<label>Email</label>	
						<input type="email" name="email" required="" value="{{$user['Email']}}" disabled>
						<span></span>
					</div>
					<div class="styled-input" style="margin-top:50px;">
						<input type="text" name="address" required="" value="{{$user['Address']}}">
						<label>Address</label>
						<span></span>
					</div>
					<div style="margin-top:50px;">
						<label>Cell</label>
						<input type="text" name="cell" required="" value="{{$user['Cell']}}" disabled>
						<span></span>
					</div>
					<h4 style="margin-top:20px; padding:20px;" class="text-center">Total Cost: {{$amount}} PKR</h4>
					<input type="submit" name="palceorder" value="Place Order" style="width:100%;margin-top:20px">
					{{Form::close()}}
			</div>
			@else
				<h2 class="text-center">Your Cart is Empty so can't Check out!</h2>
			@endif

		</div>
		<div class="clearfix"></div>
	</div>

	@include("web.includes.footer")
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- js -->
	<script type="text/javascript" src="{{url('/assets/web')}}/js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<script src="{{url('/assets/web')}}/js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links -->

	<!-- //cart-js -->
	<!-- script for responsive tabs -->
	<script src="{{url('/assets/web')}}/js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!-- //script for responsive tabs -->
	<!-- stats -->
	<script src="{{url('/assets/web')}}/js/jquery.waypoints.min.js"></script>
	<script src="{{url('/assets/web')}}/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{url('/assets/web')}}/js/move-top.js"></script>
	<script type="text/javascript" src="{{url('/assets/web')}}/js/jquery.easing.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->


	<!-- for bootstrap working -->
	<script type="text/javascript" src="{{url('/assets/web')}}/js/bootstrap.js"></script>
</body>

</html>