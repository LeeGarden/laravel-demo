@extends('admin.master')
@section('title') Role @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Role
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Role</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      @include('admin.include.message')
        <a href="{{ URL::route('admin.role.getAdd') }}" class="btn btn-primary"> 
          <i class="fa fa-plus"></i> Add Role</a>
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Role</th>
            <th>Date Update</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        {!! $listrole !!}
        </tbody>
      </table>
    </div>
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