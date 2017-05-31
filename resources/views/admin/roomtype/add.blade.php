@extends('admin.master')
@section('title') Room Type @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Room Type
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Room type</a></li>
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
    <form class="form-horizontal" action="{{ URL::route('admin.roomtype.postAdd') }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="box-body col-sm-8">
        <div class="form-group">
          <label for="typename" class="col-sm-3 control-label">Type Name</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="typename" id="typename" value="{{ old('typename') }}" placeholder="Type name">
          </div>
        </div>
        <div class="form-group">
          <label for="maxpeople" class="col-sm-3 control-label">Max People</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="maxpeople" id="maxpeople" value="{{ old('maxpeople') }}" placeholder="Max people">
          </div>
        </div>
        <div class="form-group">
          <label for="price" class="col-sm-3 control-label">Price($)</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Price">
          </div>
        </div>
        <div class="form-group">
          <label for="utility" class="col-sm-3 control-label">Utility</label>

          <div class="col-sm-9">
            <div class="checkbox">
                    <label>
                      <input type="checkbox" checked="true" name="utility[]" value="wifi">
                      Wifi
                    </label>
                    <label>
                      <input type="checkbox" checked="true" name="utility[]" value="airconditioner">
                      Air Conditioner
                    </label>
                    <label>
                      <input type="checkbox" checked="true" name="utility[]" value="television">
                      Television
                    </label>
                    <label>
                      <input type="checkbox" name="utility[]" value="iron">
                      Iron
                    </label>
                    <label>
                      <input type="checkbox" name="utility[]" value="fan">
                      Fan
                    </label>
                  </div>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Description</label>

          <div class="col-sm-9">
            <textarea class="form-control" rows="4" name="description" placeholder="Description ..." style="resize: vertical;">{{ old('description') }}</textarea>
          </div>
        </div>
        <div class="form-group">
        <label for="InputFile" class="col-sm-3 control-label">Upload Image</label>

          <div class="col-sm-9">
            <input type="file" id="InputFile" name="imageUpload[]" accept="image/*" multiple>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-8">
          <a href="{{ URL::route('admin.roomtype.getList') }}" class="btn btn-default">
          <i class="fa fa-list-alt"></i> Return List </a>
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