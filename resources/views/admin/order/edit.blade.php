
<?php

//print_r($array);
//die;
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Data Tables</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/dist/css/skins/_all-skins.min.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{url('assets/admin')}}/plugins/iCheck/all.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		@include('admin/includes/header') @include('admin/includes/sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					{{ isset($type) ? $type : ""}}
					<small>Edit {{ isset($type) ? $type : ""}}</small>
				</h1>
				<ol class="breadcrumb">
					<li>
						<a href="{{url('admin/dashboard')}}">
							<i class="fa fa-dashboard"></i> Home</a>
					</li>
					<li>
						<a href="{{url('admin/orders/pending')}}">
							<i class="fa fa-user"></i>Pending Orders</a>
					</li>
					<li class="active">Edit</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Edit Order</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							{{Form::open(["url"=>"/admin/orders/edit/".$item->OrderID])}}
							<div class="box-body">
								<div class="form-group">
									<label>OrderID: {{$item->OrderID}}</label>
								</div>
								<div class="form-group">
									<label>UserID: {{$item->UserID}}</label>
								</div>
								<div class="form-group">
									<label>Name: {{$user->Name}}</label>
								</div>
								<div class="form-group">
									<label>Number: {{$user->Cell}}</label>
								</div>
								<div class="form-group">
									<label>Email: {{$user->Email}}</label>
								</div>
								<div class="form-group">
									<label>Registered Address: {{$user->Address}}</label>
								</div>
								<div class="form-group">
									<label>Given Address: {{$item->Address}}</label>
								</div>
								<div class="form-group">
									{{Form::select('Status', ['1' => 'Pending Confirmation', '2' => 'Readying Package','3' => 'Available for Pickup', '4' => 'In-transit','5' => 'Package Delivered'], $item->Status)}}
								</div>
								
								<h2>Products</h2>
								<?php $total = 0?>
								@for ($i = 0; $i < count($products); $i++)
								<div class="row" style="margin-top:20px">
										<div class="col-md-2">
											<img src="{{url('assets/uploads/products_thumb/'.$products[$i]->ProductImage)}}" width="150">
										</div>
										<div class="col-md-10">
											<h3 style="margin-top:20px">{{$products[$i]->ProductName}}</h3>
											<h4 style="margin-top:20px">Quantity: {{$array[$i]['qty']}} </h4>
											<h4 style="margin-top:20px">SubTotal: {{$array[$i]['qty'] * $products[$i]->ProductPrice}} </h4>
										</div>
									</div>
									<?php $total += $array[$i]['qty'] * $products[$i]->ProductPrice?>
								@endfor

									<h1>Total: {{$total}}</h1>
								<!--<div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm password" class="form-control" required="">
                                </div>-->

							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
							</form>
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		@include("admin.includes.footer")

		<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="{{url('assets/admin')}}/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{url('assets/admin')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="{{url('assets/admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{url('assets/admin')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="{{url('assets/admin')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- bootstrap datepicker -->
	<script src="{{url('assets/admin')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="{{url('assets/admin')}}/plugins/iCheck/icheck.min.js"></script>
	<!-- FastClick -->
	<script src="{{url('assets/admin')}}/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="{{url('assets/admin')}}/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{url('assets/admin')}}/dist/js/demo.js"></script>
	<!-- page script -->
	<script>
		$(function () {
			$('#example1').DataTable()
			$('#example2').DataTable({
				'paging': true,
				'lengthChange': false,
				'searching': false,
				'ordering': true,
				'info': true,
				'autoWidth': false
			});

			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			})
			//Red color scheme for iCheck
			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass: 'iradio_minimal-red'
			})
			//Flat red color scheme for iCheck
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass: 'iradio_flat-green'
			})
			//Date picker
			$('#datepicker').datepicker({
				autoclose: true,
				format: "yyyy/mm/dd"
			})
		})
	</script>
</body>

</html>