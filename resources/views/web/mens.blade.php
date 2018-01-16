<!DOCTYPE html>
<html>

<head>
	<title>Elite Shop</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<!--//tags -->
	<link href="{{url('/assets/web')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="{{url('/assets/web')}}/css/jquery-ui.css">
	<link href="{{url('/assets/web')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{url('/assets/web')}}/css/font-awesome.css" rel="stylesheet">
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
			<!-- mens -->
			<div class="col-md-4 products-left">
				<div class="css-treeview">
					<h4>Categories</h4>
					<ul class="tree-list-pad">
						<li>
							<input type="checkbox" id="item-1" checked="checked" />
							<label for="item-1">
								<i class="fa fa-long-arrow-right" aria-hidden="true"></i> Men
							</label>
							<ul>
									<?php
									$men = \DB::table('men')
											->get();
									?>
									@foreach ($men as $item)
										<li>
											<a href="{{url('/mens/').'/'.$item->CategoryName}}/">{{$item->CategoryName}}</a>
										</li>
									@endforeach
									
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-8 products-right">
				<h5>Product
					<span>Compare(0)</span>
				</h5>
				<div class="sort-grid">
					<div class="sorting">
						<h6>Sort By</h6>
						<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="Newest">Newest</option>
							<option value="Oldest">Oldest</option>
							<option value="Name(A - Z)">Name(A - Z)</option>
							<option value="Name(Z - A)">Name(Z - A)</option>
							<option value="Price(High - Low)">Price(High - Low)</option>
							<option value="Price(Low - High)">Price(Low - High)</option>
						</select>
						<div class="clearfix"></div>
					</div>
					<!--<div class="sorting">
						<h6>Showing</h6>
						<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">7</option>
							<option value="null">14</option>
							<option value="null">28</option>
							<option value="null">35</option>
						</select>
						<div class="clearfix"></div>
					</div>-->
					<div class="clearfix"></div>
				</div>

				<div class="clearfix"></div>
			</div>

			<div class="single-pro">
				<div class="col-md-3 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="{{url('/assets/web')}}/images/m1.jpg" alt="" class="pro-image-front">
							<img src="{{url('/assets/web')}}/images/m1.jpg" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="{{url('/assets/web')}}/single.html" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>

						</div>
						<div class="item-info-product ">
							<h4>
								<a href="{{url('/assets/web')}}/single.html">Formal Blue Shirt</a>
							</h4>
							<div class="info-product-price">
								<span class="item_price">$45.99</span>
								<del>$69.71</del>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
								<form action="#" method="post">
									<fieldset>
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="business" value=" " />
										<input type="hidden" name="item_name" value="Formal Blue Shirt" />
										<input type="hidden" name="amount" value="30.99" />
										<input type="hidden" name="discount_amount" value="1.00" />
										<input type="hidden" name="currency_code" value="USD" />
										<input type="hidden" name="return" value=" " />
										<input type="hidden" name="cancel_return" value=" " />
										<input type="submit" name="submit" value="Add to cart" class="button" />
									</fieldset>
								</form>
							</div>

						</div>
					</div>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //mens -->
	<!--/grids-->
	@include("web.includes.footer")
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>
	<!-- js -->
	<script type="text/javascript" src="{{url('/assets/web')}}/js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<script src="{{url('/assets/web')}}/js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
	</script>
	<script src="{{url('/assets/web')}}/js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links -->
	<!---->
	<script type='text/javascript'>
		//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>
	</script>
	<script type="text/javascript" src="{{url('/assets/web')}}/js/jquery-ui.js"></script>
	<!---->
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