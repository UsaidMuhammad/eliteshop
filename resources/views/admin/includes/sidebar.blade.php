<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{url('admin/dashbaord')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        <li><a href="{{url('admin/users')}}"><i class="fa fa-user"></i> <span>Users</span></a></li>

        <li><a href="{{url('admin/men/category/list')}}"><i class="fa fa-database"></i> <span>Men Categories</span></a></li>

        <li><a href="{{url('admin/women/category/list')}}"><i class="fa fa-database"></i> <span>Women Categories</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Men Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php 
            $men = \Cache::remember('menGet', 24*60, function () {
              return \DB::table('men')->get();
            });
            ?>
            @for ($i = 1; $i <=count($men); $i++)
            <li><a href="{{url('admin/men/'.$men[$i-1]->CategoryID.'/products/list')}}">{{$men[$i-1]->CategoryName}} Products</a></li>
            @endfor
          </ul>
        </li>      


        <li class="treeview">
            <a href="#">
              <i class="fa fa-tags"></i> <span>Women Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php 
              $women = \Cache::remember('womenGet', 24*60, function () {
                return \DB::table('women')->get();
              });
              ?>
              @for ($i = 1; $i <=count($men); $i++)
              <li><a href="{{url('admin/women/'.$women[$i-1]->CategoryID.'/products/list')}}">{{$women[$i-1]->CategoryName}} Products</a></li>
              @endfor
            </ul>
          </li> 

        <!--
        <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Men Categories</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('admin/men/category/list')}}">List Category</a></li>
              <li><a href="{{url('admin/men/category/add')}}">Add Category</a></li>
            </ul>
          </li>
  
          <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Women Categories</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/women/category/list')}}">List Category</a></li>
                <li><a href="{{url('admin/women/category/add')}}">Add Category</a></li>
              </ul>
            </li>-->
      </ul>
    

      
    </section>
    <!-- /.sidebar -->
  </aside>