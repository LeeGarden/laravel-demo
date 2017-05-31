@extends('admin.master')
@section('title') Service @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Service
    <small>it all list service is here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Service</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      @include('admin.include.message')
        <a href="{{ URL::route('admin.service.getAdd') }}" class="btn btn-primary"> 
          <i class="fa fa-plus"></i> Add Service</a>
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price($)</th>
            <th>Admin</th>
            <th>Date Updated</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        {!! $servicelist !!}
        </tbody>
      </table>
    </div>
    {!! $modal !!}
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- DataTables -->
<script src="{{ asset('public') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('public') }}/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function(){
    $("#example1").DataTable(
    {
      "aoColumnDefs": [
      { 
        "bSortable": false, 
          "aTargets": [ -1 ] // <-- gets last column and turns off sorting
        } 
        ]
      });
  } );
</script>
<!-- /.content -->
@endsection