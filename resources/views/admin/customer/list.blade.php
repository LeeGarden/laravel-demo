@extends('admin.master')
@section('title') Customer @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Customer
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Customer</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      @include('admin.include.message')
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        {!! $listcustomer !!}
        </tbody>
      </table>
    </div>
    {!! $modal or null !!}
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- DataTables -->
<script src="{{ asset('public') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('public') }}/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function(){
    $("#example1").DataTable();
  });
</script>
<!-- /.content -->
@endsection