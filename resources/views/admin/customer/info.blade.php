@extends('admin.master')
@section('title') Customer @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     Customer Infomation
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Customer </a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      @include('admin.include.message')
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="box-body col-sm-8">
        <div class="form-group">
          <label for="name" class="col-sm-5 control-label">ID</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->id}}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-5 control-label">Name</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->name }}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-5 control-label">Email</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->email}}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-5 control-label">Phone</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->phone }}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-5 control-label">Address</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->address }}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="birthday" class="col-sm-5 control-label">Birthday</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->birthday }}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="roomnumber" class="col-sm-5 control-label">Gender</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->gender }}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="id_role" class="col-sm-5 control-label">Jobs</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->job }}</label>
          </div>
        </div>
        <div class="form-group">
          <label for="id_role" class="col-sm-5 control-label">Nationality</label>

          <div class="col-sm-7">
          <label for="name" class="control-label">{{ $customer->nationality }}</label>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-8">
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->

</section>

<!-- bootstrap datepicker -->
<script src="{{asset('/') }}admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true
  });
</script>
<!-- /.content -->
@endsection