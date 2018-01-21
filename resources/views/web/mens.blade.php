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
			<div class="col-md-12 products-right">
				<h5>Products</h5>
				<div class="sort-grid">
					<div class="sorting">
						<h6>Sort By</h6>
						<select id="country1" class="frm-field required sect">
							<option value="Newest">Newest</option>
							<option value="Oldest">Oldest</option>
							<option value="Name(A - Z)">Name(A - Z)</option>
							<option value="Name(Z - A)">Name(Z - A)</option>
							<option value="Price(High - Low)">Price(High - Low)</option>
							<option value="Price(Low - High)">Price(Low - High)</option>
						</select>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="clearfix"></div>
			</div>

			<div class="single-pro" id="ajaxproducts">
				<h1 class="text-center">Loading Please wait..</h1>

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
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [1000, 7000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<script type="text/javascript" src="{{url('/assets/web')}}/js/jquery-ui.js"></script>
	<!---->
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

			// ajax load products
			$('#country1').ready(function () {
				LoadEverything($('#country1').val());
			});

			$('#country1').change(function () {
				$('#ajaxproducts').html('<h1 class="text-center">Loading Please wait..</h1>');
				LoadEverything($('#country1').val());
			});

			function LoadEverything(value) {
				$.get("{{url('/mens/'.$title[1].'/getJSON')}}", function (data) {
					
					if(value=="Newest")
					{
						data.sort(function(a, b) {
							return b.DateModified > a.DateModified;
						});
					}
					else if(value=="Oldest")
					{
						data.sort(function(a, b) {
							return a.DateModified > b.DateModified;
						});
					}
					else if(value=="Name(A - Z)")
					{
						data.sort(function(a, b) {
							return a.ProductName > b.ProductName;
						});
						
					} 
					else if(value=="Name(Z - A)")
					{
						data.sort(function(a, b) {
							return b.ProductName > a.ProductName;
						});
					} 
					else if(value=="Price(High - Low)")
					{
						data.sort(function(a, b) {
							return b.ProductPrice > a.ProductPrice;
						});
					} 
					else if(value=="Price(Low - High)")
					{
						data.sort(function(a, b) {
							return a.ProductPrice > b.ProductPrice;
						});
					} 

					data.sort();
					$('#ajaxproducts').html('');
					for (var i = 0; i < data.length; i++) {
						var $products = "";
						$products += '<div class="col-md-3 product-men">';
						$products += '<div class="men-pro-item simpleCart_shelfItem">';
						$products += '<div class="men-thumb-item">';
						$products += '<img src=\'{{url("/assets/uploads/products_thumb")}}/'+data[i].ProductImage+'\' alt="" class="pro-image-front">';
						$products += '<img src=\'{{url("/assets/uploads/products_thumb")}}/'+data[i].ProductImage+'\' alt="" class="pro-image-back">';
						$products += '<div class="men-cart-pro">';
						$products += '<div class="inner-men-cart-pro">';
						$products += '<a href=\'{{url("/item")}}/'+data[i].ProductID+'/men\' class="link-product-add-cart">Quick View</a>';
						$products += "</div>";
						$products += '</div>';
						$products += "</div>";
						$products += '<div class="item-info-product ">';
						$products += '<h4>';
						$products += '<a href=\'{{url("/item")}}/'+data[i].ProductID+'/men\'>'+data[i].ProductName+'</a>';
						$products += '</h4>';
						$products += '<div class="info-product-price">';
						$products += '<span class="item_price">PKR '+data[i].ProductPrice+'</span>';
						$products += '</div>';
						$products +=
							'<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">';
						$products += '<form action="#" method="post">';
						$products += '<fieldset>';
						$products += '<input type="submit" name="submit" value="Add to cart" class="button" />';
						$products += '</fieldset>';
						$products += '</form>';
						$products += '</div>';
						$products += '</div>';
						$products += '</div>';
						$products += '</div>';
						
						$('#ajaxproducts').append($products);
					}
				});
				
				
			}


		});
	</script>
	<!-- //here ends scrolling icon -->

	<!-- for bootstrap working -->
	<script type="text/javascript" src="{{url('/assets/web')}}/js/bootstrap.js"></script>
</body>

</html>