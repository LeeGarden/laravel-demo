@extends('admin.master')
@section('title') Staff @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Staff
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Staff </a></li>
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
          <label for="name" class="col-sm-3 control-label">Name</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name',isset($staff)?$staff['name'] : null) }}" placeholder="Name">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-3 control-label">Phone</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone',isset($staff)?$staff['phone'] : null) }}" placeholder="Phone">
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-3 control-label">Address</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="address" id="address" value="{{ old('address',isset($staff)?$staff['address'] : null) }}" placeholder="Address">
          </div>
        </div>
        <div class="form-group">
          <label for="birthday" class="col-sm-3 control-label">Birthday</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="birthday" id="datepicker" value="{{ old('birthday',isset($staff)?$staff['birthday'] : null) }}" placeholder="Birthday">
          </div>
        </div>
        <div class="form-group">
          <label for="roomnumber" class="col-sm-3 control-label">Gender</label>

          <div class="radio col-sm-9">
            {!! $gender !!}
          </div>
        </div>
        <div class="form-group">
          <label for="id_role" class="col-sm-3 control-label">Role</label>

          <div class="col-sm-9">
            <select name="role" class="form-control">
              {!! $option !!}
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>

          <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email',isset($staff)?$staff['email'] : null) }}" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="InputFile" class="col-sm-3 control-label">Upload Image</label>

          <div class="col-sm-9">
            <input type="file" id="InputFile" name="imageUpload" accept="image/*">
          </div>
        </div> 
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password</label>

          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>
        </div> 
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-8">
          <a href="#" class="btn btn-default">Return List </a>
          <button type="submit" class="btn btn-info pull-right">Update</button>
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->

</section>

<!-- bootstrap datepicker -->
<script src="{{asset('public') }}/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true
  });
</script>
<!-- /.content -->
@endsection