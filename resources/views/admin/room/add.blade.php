@extends('admin.master')
@section('title') Room @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Room
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Room </a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
      @include('admin.include.message')
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="box-body col-sm-8">
        <div class="form-group">
          <label for="roomnumber" class="col-sm-3 control-label">Room Number</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="roomnumber" id="roomnumber" value="{{ old('roomnumber') }}" placeholder="Room number">
          </div>
        </div>
        <div class="form-group">
        <label for="id_roomtype" class="col-sm-3 control-label">Room type</label>

          <div class="col-sm-9">
            <select name="roomtype" class="form-control">
              <option value="">Select Roomtype</option>
            @foreach ($roomtype as $item)
              <option value="{!! $item['id'] !!}">{!! $item['typename'] !!}</option>
            @endforeach
            </select>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-8">
          <a href="{{ URL::route('admin.room.getList') }}" class="btn btn-default">Return List </a>
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