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
  <link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('assets/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('assets/admin')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('assets/admin')}}/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin/includes/header')
  @include('admin/includes/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ isset($type) ? $type : ""}}
        <small>Add, Delete, Update and Edit {{ isset($type) ? $type : ""}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ isset($type) ? $type : ""}} tables</li>
      </ol>
    </section>

    {{Form::open(["url"=>"/admin/orders/delete/"])}}
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ isset($type) ? $type : ""}}</h3>
              <input type="submit" class="btn btn-danger pull-right" value="Delete">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" name="checkbox" id="check"></th>
                  <th>OrderID</th>
                  <th>UserID</th>
                  <th>Status</th>
                  <th>DateAdded</th>
                  <th>DateModified</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @if(count($orders)>0)
                  @foreach($orders as $item)
                      <tr>
                        <td><input type="checkbox" name="IDs[]" value="{{ $item->OrderID }}" class="lowercheckbox"></td>
                        <td>{{ $item->OrderID }}</td>
                        <td>{{ $item->UserID }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>{{ $item->DateAdded }}</td>
                        <td>{{ $item->DateModified }}</td>
                        <td><a href="{{url('admin/orders/edit/').'/'. $item->OrderID}}" class="btn btn-danger">Edit</a></td>
                      </tr> 
                  @endforeach   
                @endif
                
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Checks</th>
                  <th>OrderID</th>
                  <th>UserID</th>
                  <th>Status</th>
                  <th>DateAdded</th>
                  <th>DateModified</th>
                  <th>Edit</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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
<!-- FastClick -->
<script src="{{url('assets/admin')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('assets/admin')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('assets/admin')}}/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(document).ready(function(){
      //select all checkboxes
      $("#check").change(function(){  //"select all" change 
      $(".lowercheckbox").prop('checked', $(this).prop("checked")); //change all ".lowercheckbox" checked status
      });

      //".lowercheckbox" change 
      $('.lowercheckbox').change(function(){ 
      //uncheck "select all", if one of the listed checkbox item is unchecked
      if(false == $(this).prop("checked")){ //if this item is unchecked
          $("#check").prop('checked', false); //change "select all" checked status to false
      }
      //check "select all" if all checkbox items are checked
      if ($('.lowercheckbox:checked').length == $('.lowercheckbox').length ){
          $("#check").prop('checked', true);
      }
      });
    });

  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      "columnDefs": [ {
        "targets": [0],
        "orderable": false
        }]
    })
  })
</script>
</body>
</html>
