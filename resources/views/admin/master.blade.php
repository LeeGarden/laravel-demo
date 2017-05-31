<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | @yield('title')</title>
  <link rel="icon" href="{{ asset('frontend/images/hotel.ico') }}" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- jQuery 2.2.3 -->
  <script src="{{ asset('public')}}/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- Include all file for head -->
  @include('admin.include.head')
  <?php
    use App\Bill;

    $newbooking   = Bill::select()->where('status',2)->get()->toArray();
  ?>
  <style type="text/css">
    @media all and (max-width: 1024px)
    {
      #examle1{
        font-size: 0.9em;
      }
      .btn{
        padding: 6px 9px;
      }
    }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    
    
    <!-- Include main header bar -->
    @include('admin.include.main-header')
    
    
    <!-- Include left side bar -->
    @include('admin.include.side-bar')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.8
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </footer>

    
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- Include right aside part for all page -->
  @include('admin.include.right-aside')
  <!-- Include all file script for page -->
  @include('admin.include.script')

</body>
</html>
