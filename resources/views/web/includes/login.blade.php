<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body modal-body-sub_agile">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<h3 class="agileinfo_sign">Sign In
						<span>Now</span>
					</h3>
					{{Form::open(['url'=>'users/login'])}}
						<div class="styled-input agile-styled-input-top">
							<input type="email" name="email" required="">
							<label>Email</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="password" name="password" required="">
							<label>Password</label>
							<span></span>
						</div>
						<input type="submit" value="Sign In">
					</form>
					<div class="clearfix"></div>
					<p>
						<a href="#" data-toggle="modal" data-target="#myModal2"> Don't have an account?</a>
					</p>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>
<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body modal-body-sub_agile">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<h3 class="agileinfo_sign">Sign Up
						<span>Now</span>
					</h3>
					{{Form::open(["url"=>"/users/register"])}}
						<div class="styled-input agile-styled-input-top">
							<input type="text" name="name" required="">
							<label>Name</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="email" name="email" required="">
							<label>Email</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="text" name="address" required="">
							<label>Address</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="text" name="cell" required="">
							<label>Cell</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="password" name="password" required="">
							<label>Password</label>
							<span></span>
						</div>
						<div class="styled-input">
							<input type="password" name="confirm password" required="">
							<label>Confirm Password</label>
							<span></span>
						</div>
						<input type="submit" value="Sign Up">
					</form>
					<div class="clearfix"></div>
					<p>
						<a href="#">By clicking register, I agree to your terms</a>
					</p>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>
<!-- //Modal2 -->