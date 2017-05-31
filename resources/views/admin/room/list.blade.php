@extends('admin.master')
@section('title') Room @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Room
    <small>it all list room is here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Room</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">
      </h3>
        @include('admin.include.message')
        <a href="{{ URL::route('admin.room.getAdd') }}" class="btn btn-primary"> 
          <i class="fa fa-plus"></i> Add Room</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Roomnumber</th>
            <th>Roomtype</th>
            <th>Admin</th>
            <th>Date Updated</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        {!! $roomlist !!}
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