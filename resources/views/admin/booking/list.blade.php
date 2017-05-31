@extends('admin.master')
@section('title') Bill @endsection

@section('content')                  
  <?php 
  use App\Bill;
  use App\Room;
  ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Booking
    <small>it all booking room is here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Bill</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      @include('admin.include.message')
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Status</th>
            <th>Roomnumber</th>
            <th>Date In</th>
            <th>Date Out</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($booking as $item)
        @if ($item['status'] == 2 || $item['status'] == 3)
        <tr>          
        @if ($item['status'] == 2)
          <td><span  class="btn btn-warning">New Booking</span> Waiting</td>
        @else
          <td>Done</td>
        @endif
        @if ($item['roomnumber'] == 0)
          <td><a data-toggle="modal" data-target="#room{{ $item['id']}}" class="btn btn-info">Add Room Number</a></td>
        @else
          <td>{{ $item['roomnumber'] }}</td>
        @endif
          <td>{{ $item['date_in'] }}</td>
          <td>{{ $item['date_out'] }}</td>
          <td>
            <a data-toggle="modal" data-target="#view{{ $item['id']}}" title="View Detail" class="btn btn-default">Detail</a>
            @if ($item['status'] == 3 && $item['roomnumber'] != 0)                          
                <a href="{{ asset('admin/booking/edit') }}/{{ $item['id'] }}"  class="btn btn-info" title="Check Out">Check Out</a>
            @else                
                <a href="{{ asset('admin/booking/cancel') }}/{{ $item['id'] }}"  class="btn btn-danger" title="Cancel">X</a>
            @endif
          </td>
        </tr>
        @endif
        @endforeach
        </tbody>
      </table>
    </div>
      @foreach ($booking as $item)
        @if ($item['status'] == 2 || $item['status'] == 3)
           <!-- Modal Info Detail-->
          <div class="modal fade" id="view{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Bill Info</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Room number</label>

                    <div class="col-sm-7">
                    <label for="name" class="control-label">{{ $item['roomnumber'] }}</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Customer</label>

                    <div class="col-sm-7">
                    <label for="name" class="control-label">{{ $item['customer']['name'] }}</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">Room charge</label>

                    <div class="col-sm-7">
                    <label for="name" class="control-label">${{ $item['roomcharge'] }}</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="col-sm-5 control-label">Service charge</label>

                    <div class="col-sm-7">
                    <label for="name" class="control-label">${{ $item['servicecharge'] }}</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-5 control-label">Date In</label>

                    <div class="col-sm-7">
                    <label for="name" class="control-label">{{ $item['date_in'] }}</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="birthday" class="col-sm-5 control-label">Date Out</label>

                    <div class="col-sm-7">
                    <label for="name" class="control-label">{{ $item['date_out'] }}</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="roomnumber" class="col-sm-5 control-label">Status</label>

                    <div class="col-sm-7">
                    @if ($item['status'] == 2)
                      <label for="name" class="control-label">Waiting</label>
                    @else
                      <label for="name" class="control-label">Done</label>
                    @endif
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Add Room Number -->
          <div class="modal fade" id="room{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm Booking</h4>
              </div>
              <form method="POST" action="{{ asset('admin/booking/chooseroom') }}/{{ $item['id'] }}">              
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">                  
                    <span>Choose Room Number: </span>                  
                    <?php 
                      $dateIn  = $item['date_in'];
                      $dateOut = $item['date_out'];
                      $type    = $item['id_roomtype'];

                      $allBill = Bill::get();
                        //lấy ra mảng chứa danh sách phòng, orderBy theo id_roomtype, với key là roomnumber
                      $allRoom = Room::orderBy('id_roomtype', 'desc')->where('id_roomtype',$type)->get()->keyBy('roomnumber');   
                      
                      foreach ($allBill as $key => $value) 
                      {
                        if (!($value['status'] ==  1 && $value['status'] == 4) 
                          && !($dateIn > $value['date_out'] || $dateOut < $value['date_in']))
                        {
                          $allRoom->forget($value['roomnumber']);        
                        }
                      } 
                    ?>
                    <select name="roomnumber" class="form-control">
                    @foreach ($allRoom as $room)
                      <option value="{{ $room['roomnumber'] }}">{{ $room['roomnumber'] }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                  <a type="button" class="btn btn-default pull-left" data-dismiss="modal">No</a>
                  <button type="submit" class="btn btn-primary">Save changes</a>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        @endif
      @endforeach
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- DataTables -->
<script src="{{ asset('public') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('public') }}/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function(){
    $("#example1").DataTable({
      "aaSorting": [ [0,'desc'] ],
    });
  });
</script>
<!-- /.content -->
@endsection