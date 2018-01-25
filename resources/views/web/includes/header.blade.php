<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
			<li>
				@if (\Session::has("IsUserLoggedIn"))
					<a href="{{url('users/orders')}}"><i class="fa fa-user" aria-hidden="true"></i> {{DB::table('users')->where('UserID', \Session::get("UserID"))->value('Name')}} </a>				
				@else
					<a href="#" data-toggle="modal" data-target="#myModal">
						<i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a>
				@endif
				
			</li>
			<li>
				@if (\Session::has("IsUserLoggedIn"))
					<a href="{{url('users/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a>
				@else
				<a href="#" data-toggle="modal" data-target="#myModal2">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a>
				@endif
			</li>
			<li>
				<i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
			<li>
				<i class="fa fa-envelope-o" aria-hidden="true"></i>
				<a href="mailto:info@example.com">info@example.com</a>
			</li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		
		<!-- header-bot -->
		<div class="col-md-4 logo_agile" style="margin:auto;width:100%;">
			<h1 class="text-center">
				<a href="{{url('/assets/web')}}/index.html">
					<span>E</span>lite Shop
					<i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i>
				</a>
			</h1>
		</div>
		<!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">


		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->