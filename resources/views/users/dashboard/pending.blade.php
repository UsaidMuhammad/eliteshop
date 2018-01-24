<!DOCTYPE html>
<html>
<head>
<title>Elite Shop</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="{{url('/assets/web')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('/assets/web')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('/assets/web')}}/css/font-awesome.css" rel="stylesheet"> 
<link href="{{url('/assets/web')}}/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
@include("web.includes.header")

<!-- banner -->
@include("web.includes.menu")

@include('web.includes.login')

<div class="modal-body modal-body-sub_agile">
	<h3 class="wthree_text_info" style="margin-top:50px;">Welcome <span>{{\Session::get("Name")}}</span></h3>
	<div class="row" style="margin-top:20px">
		@include("users.dashboard.includemenu")	
		
		<h1 class="text-center">Pending Orders</h1>
				
		<div class="col-md-9">
				@for ($i = 0; $i < count($item); $i++)
				<h3 style="margin-top:20px">Status: 
						@if ($item[$i]->Status==1)
							Pending Confirmation
						@endif
						@if ($item[$i]->Status==2)
							Readying Package
						@endif
						@if ($item[$i]->Status==3)
							Available for Pickup
						@endif
						@if ($item[$i]->Status==4)
							In-Transit
						@endif
					</h3>
					@for ($a = 0; $a < count($array[$i]); $a++)
						<div class="row" style="margin-top:20px; background-color:#eeeeee">
							<div class="col-md-10">
								<h3 style="margin-top:20px">{{$products[$i][$a]->ProductName}}</h3>
								<h4 style="margin-top:20px">Quantity: {{$array[$i][$a]['qty']}}</h4>
								<h4 style="margin-top:20px">Total Price: {{$products[$i][$a]->ProductPrice * $array[$i][$a]['qty']}}</h4>
							</div>
							<div class="col-md-2">
								<img src="{{url('assets/uploads/products_thumb/'.$products[$i][$a]->ProductImage)}}" alt="" srcset="" width="100%">
							</div>
						</div>
						<?php $total = 0;$total += $products[$i][$a]->ProductPrice * $array[$i][$a]['qty']?>
					@endfor
					<div class="pull-left">
						<h4 style="margin-top:20px;">Shipped Address: {{$item[$i]->Address}}</h4>
						<h4 style="margin-top:20px;">Total Cost: {{$total}}</h4>
					</div>
					<hr style="margin-top:120px;">
				@endfor
		</div>
	</div>
</div>

@include("web.includes.footer")
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

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
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
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
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->
<script type="text/javascript" src="{{url('/assets/web')}}/js/bootstrap.js"></script>
</body>
</html>
