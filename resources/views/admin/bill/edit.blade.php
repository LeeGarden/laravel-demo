@extends('admin.master')
@section('title') Bill @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Bill
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Bill </a></li>
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
      <div class="box-body col-sm-6">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Room Number</label>
          
          <div class="col-sm-4">
            <select name="roomnumber" class="form-control">
              <option>Select Room number</option>
              {!! $option or null !!}
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-3 control-label">Customer</label>

          <div class="col-sm-9">
            <label for="phone" class="control-label">{{ $customer->name or null }} 
              <a data-toggle="modal" data-target="#view{{ $customer->id }}"><i class="fa fa-question-circle"></i></a></label>
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-3 control-label">Room Type</label>

          <div class="col-sm-9"><label for="phone" class="control-label">{{ $roomtype->typename or null }}</label></div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-3 control-label">Room Charge</label>

          <div class="col-sm-9"><label for="phone" class="control-label">${{ $bill['roomcharge'] or null}}</label></div>
        </div>
        <div class="form-group">
          <label for="birthday" class="col-sm-3 control-label">Room Service</label>

          <div class="col-sm-9"><label for="phone" class="control-label">${{ $bill['servicecharge'] or 0}}</label></div>
        </div>
        <div class="form-group">
          <label for="roomnumber" class="col-sm-3 control-label">Date In</label>

          <div class="col-sm-9"><label for="phone" class="control-label">{{ $bill['date_in'] or null}}</label></div>
        </div>
        <div class="form-group">
          <label for="id_role" class="col-sm-3 control-label">Date Out</label>
          
          <div class="col-sm-9"><label for="phone" class="control-label">{{ $bill['date_out'] or null}}</label></div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Status</label>

          <div class="col-sm-4">
            <select name="status" class="form-control">
              {!! $optionstt or null !!}
            </select>
          </div>
        </div>
      </div>
      <div class="box-body col-sm-6">
        <div class="form-group">
          
          <div class="col-sm-6">
          <label for="name" class="col-sm-12 control-label">Add Use Service</label>
          </div>
        </div>
        <div class="form-group">

          <div class="col-sm-4">
          <label for="name" class="col-sm-12 control-label">Service Name</label>
          </div>

          <div class="col-sm-3"> 
          <label for="name" class="col-sm-12 control-label">Quantity</label>
          </div>

        </div>
        <div class="form-group">

          <div class="col-sm-4">
            <select name="status" class="form-control">
              {!! $optionstt or null !!}
            </select>
          </div>

          <div class="col-sm-3"> 
            <input type="number" name="quantity" class="form-control" min="1">
          </div>
          <div class="col-sm-3"> 
            <button  class="btn btn-default">Add</button>
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
       <!-- Modal -->
            <div class="modal fade" id="view{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Customer Info</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-5 control-label">ID</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">{{ $customer->id }}</label>
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
                      <label for="name" class="control-label">{{ $customer->email }}</label>
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
                  <div class="modal-footer">
                    <a href="/admin/customer/view/{{ $customer->id }}" target="_blank"><button type="button" class="btn btn-primary">Detail</button></a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
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