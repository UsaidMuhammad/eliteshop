<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--<meta name="keywords" content="" />-->
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //tags -->
	<link href="{{url('/assets/web')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{url('/assets/web')}}/css/flexslider.css" type="text/css" media="screen" />
	<link href="{{url('/assets/web')}}/css/font-awesome.css" rel="stylesheet">
	<link href="{{url('/assets/web')}}/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="{{url('/assets/web')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />

	<!-- //for bootstrap working -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
</head>

<body>
	@include("web.includes.header")

	<!-- banner -->
	@include("web.includes.menu") @include('web.includes.login') @include("web/includes/breadcrum", $title)

	<!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="images/d2.jpg">
								<div class="thumb-image">
									<img src="{{url('/assets/uploads/products/'.$product[0]->ProductImage)}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3>{{$product[0]->ProductName}}</h3>
				<p>
					<span class="item_price">PKR {{$product[0]->ProductPrice}}</span>
				</p>
				<div class="color-quality">
					<div class="color-quality-right">
						<h5>Quantity :</h5>
						{{Form::open(['url'=>'cart/add'])}}
						{{Form::selectRange('quantity', 1, 10)}}
					</div>
				</div>
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
								{{Form::hidden("_id",$product[0]->ProductID)}}
								{{Form::hidden("_type",$_type)}}
								{{Form::hidden('_image',$product[0]->ProductImage)}}
								<input type="submit" name="submit" value="Add to cart" class="button">
						</form>
					</div>

				</div>
			</div>
			<div class="clearfix"> </div>
			<!-- /new_arrivals -->
			<div class="responsive_tabs_agileits">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Description</li>
					</ul>
					<div class="resp-tabs-container">
						<!--/tab_one-->
						<div class="tab1">

							<div class="single_page_agile_its_w3ls">
								<h6>{{$product[0]->ProductName}}</h6>
								<p>{{$product[0]->ProductDescription}}</p>
							</div>
						</div>
						<!--//tab_one-->
					</div>
				</div>
			</div>
			<!-- //new_arrivals -->
			<!--/slider_owl-->
		</div>
	</div>
	<!--//single_page-->
	@include("web.includes.footer")
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>
	<!-- js -->
	<script type="text/javascript" src="{{url('/assets/web')}}/js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<script src="{{url('/assets/web')}}/js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links -->
	<!-- single -->
	<script src="{{url('/assets/web')}}/js/imagezoom.js"></script>
	<!-- single -->
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
	<!-- FlexSlider -->
	<script src="{{url('/assets/web')}}/js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
	<!-- //script for responsive tabs -->
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