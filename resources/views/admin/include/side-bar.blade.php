<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('public')}}/admin/dist/img/user.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="{{ URL::route('admin.booking.getList') }}">
              <i class="fa fa-indent"></i> <span>Booking </span>
              @if (count($newbooking)>0)
                <span class="label label-warning">{{ count($newbooking)}}</span>
              @endif
            </a>
          </li>
          <li>
            <a href="{{ URL::route('admin.room.getList') }}">
              <i class="fa fa-hotel"></i> <span>Room</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('admin.roomtype.getList') }}">
              <i class="fa fa-cubes"></i> <span>Room Type</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('admin.service.getList') }}">
              <i class="fa fa-coffee"></i> <span>Service</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('admin.customer.getList') }}">
              <i class="fa fa-users"></i> <span>Customer</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::route('admin.bill.getList') }}">
              <i class="fa fa-newspaper-o"></i> <span>Bills</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-plus"></i>
              <span>Staff</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ URL::route('admin.staff.getList') }}"><i class="fa fa-circle-o"></i> Staff</a></li>
              <li><a href="{{ URL::route('admin.role.getList') }}"><i class="fa fa-circle-o"></i> Role</a></li>
            </ul>
          </li>
          <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Charts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
              <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
              <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
              <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
            </ul>
          </li> -->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>