@extends('admin.master')
@section('title') Test page @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Room Type
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Room type</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="" action="" enctype="multipart/form-data">
      <div class="box-body col-sm-8">
        <div class="form-group">
          <label for="typename" class="col-sm-2 control-label">Type Name</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" name="typename" id="typename" placeholder="Type name">
          </div>
        </div>
        <div class="form-group">
          <label for="typename" class="col-sm-2 control-label">Max People</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" name="maxpeople" id="maxpeople" placeholder="Type name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Textarea</label>

          <div class="col-sm-10">
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
          </div>
        </div>
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Select</label>

          <div class="col-sm-10">
            <select class="form-control">
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
              <option>option 4</option>
              <option>option 5</option>
            </select>
          </div>
        </div>
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Upload</label>

          <div class="col-sm-10">
            <input type="file" id="exampleInputFile">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember me
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-8">
          <a class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-info pull-right">Sign in</button>
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
@endsection