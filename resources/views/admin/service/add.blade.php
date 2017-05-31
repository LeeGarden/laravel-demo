@extends('admin.master')
@section('title') Service @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Service
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Service </a></li>
    <li class="active">Add</li>
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
          <label for="name" class="col-sm-3 control-label">Service Name</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Service name">
          </div>
        </div>
        <div class="form-group">
          <label for="price" class="col-sm-3 control-label">Price($)</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Price">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-8">
          <a href="{{ URL::route('admin.service.getList') }}" class="btn btn-default">Return List </a>
          <button type="submit" class="btn btn-info pull-right">Add New</button>
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
@endsection