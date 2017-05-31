<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Service;
use App\Status;
use App\Room;
use App\UseService;
use Auth;
use App\Http\Requests\UseServiceRequest;

class BillController extends Controller
{
	function __construct(Bill $bill, Service $service,Room $room, Status $status, UseService $useservice)
	{
		$this->bill    = $bill;
		$this->service = $service;
		$this->room    = $room;
		$this->status  = $status;
		$this->useservice  = $useservice;
		$service = $this->service->getListService();

		view()->share(['service' => $service]);
	}
	
	public function getListBooking()
	{
		$booking  = $this->bill->getAllBill();		
		return view('admin.booking.list', compact('booking'));
	}
	public function postChooseRoom(Request $request, $id)
	{
		$bill = $this->bill->getBookingByID($id);
		$bill->roomnumber = $request->roomnumber;
		$bill->status = 3;
		$bill->save();
		return redirect('admin/booking/list')->with(['flash_message' => 'Update Room number success']);
	}

	public function getEdit($id)
	{
		$bill = $this->bill->find($id);
		$roomtype = $bill->roomtype;
		$customer = $bill->customer;
		$allRoom = $this->room->orderBy('id_roomtype', 'desc')->where('id_roomtype',$roomtype->id)->get();
		$allBill = $this->bill->getAllBill();
		//return list room avaible with date in & date out from bill
		foreach ($allBill as $key => $item) 
		{
			if (!($item['status'] ==  1 && $item['status'] == 4) 
				&& !($bill['date_in'] > $item['date_out'] || $bill['date_out'] < $item['date_in']))
			{
				$allRoom->forget($item['roomnumber']);				
			}
		}
		//total use service charge
		$useser = UseService::select()->where('id_bill',$id)->get();
		$totalservicecharge = 0;
		foreach ($useser as $key => $value) {
			$service = UseService::find($value['id'])->service;
			$totalservicecharge = $totalservicecharge + ($service->price * $value['quantity']);
		}
		$bill->servicecharge = $totalservicecharge;	
		$bill->save();
		//convert date to d-m-Y
		$bill->date_in = date('d-m-Y', strtotime($bill['date_in']));
		$bill->date_out = date('d-m-Y', strtotime($bill['date_out']));
		
		$useservice = UseService::select()->where('id_bill', $id)->get();
		$useservicedata = '';
		foreach ($useservice as $key) {
			$nameservice = UseService::find($key['id'])->service->name;
			$useservicedata = $useservicedata.'
			<div class="form-group">
	          <div class="col-sm-4">
	            <label for="name" class="col-sm-12 control-label">'.$nameservice.'</label>
	          </div>
	          <div class="col-sm-3"> 
	            <label for="name" class="col-sm-12 control-label">'.$key['quantity'].'</label>
	          </div>
	          <div class="col-sm-3"> 
	            <a href="/admin/bill/del/'.$key['id'].'" class="btn btn-warning">Remove</a>
	          </div>
	        </div>';										
		}
		return view('admin.booking.edit', compact('bill','roomtype','customer','useservicedata'));	
	}
	public function postEdit(Request $request, $id)
	{
		$bill = $this->bill->find($id);
		$bill->roomnumber = $request->roomnumber;
		$bill->status     = $request->status;
		$bill->save();
		return redirect()->route('admin.booking.getList');
	}
	public function postAddService(Request $request, $idbill)
	{
		$useservice = $this->useservice;
		$useservice->id_service = $request->id_service;
		$useservice->quantity	 = $request->quantity;
		$useservice->id_bill	 = $idbill;
		$useservice->id_admin	 = Auth::user()->id;
		$useservice->save();
		return redirect('admin/bill/edit/'.$idbill);

	}
	public function delUseService($id)
	{
		$useservice = $this->useservice->getUseServiceByID($id);
		$useservice->delete($id);
		return redirect()->back();
	}
	public function paymentBill($id)
	{
		$bill = $this->bill->find($id);
		$bill->status = 4;
		$bill->save();
		$roomtype = $bill->roomtype;
		$customer = $bill->customer;		
		//convert date to d-m-Y
		$bill->date_in = date('d-m-Y', strtotime($bill['date_in']));
		$bill->date_out = date('d-m-Y', strtotime($bill['date_out']));		
		
		$useservice = UseService::select()->where('id_bill', $id)->get();
		$useservicedata = '';
		foreach ($useservice as $key) {
			$nameservice = UseService::find($key['id'])->service->name;
			$useservicedata = $useservicedata.'
			<div class="form-group">
	          <div class="col-sm-5">
	            <label for="name" class="col-sm-12 control-label">'.$nameservice.'</label>
	          </div>
	          <div class="col-sm-5"> 
	            <label for="name" class="col-sm-12 control-label">'.$key['quantity'].'</label>
	          </div>
	        </div>';										
		}
		return view('admin.booking.detail', compact('bill','roomtype','customer','useservicedata'));	
		
	}

	public function viewDetailBill($id)
	{
		$bill = $this->bill->find($id);
		$roomtype = $bill->roomtype;
		$customer = $bill->customer;		
		//convert date to d-m-Y
		$bill->date_in = date('d-m-Y', strtotime($bill['date_in']));
		$bill->date_out = date('d-m-Y', strtotime($bill['date_out']));		
		
		$useservice = UseService::select()->where('id_bill', $id)->get();
		$useservicedata = '';
		foreach ($useservice as $key) {
			$nameservice = UseService::find($key['id'])->service->name;
			$useservicedata = $useservicedata.'
			<div class="form-group">
	          <div class="col-sm-5">
	            <label for="name" class="col-sm-12 control-label">'.$nameservice.'</label>
	          </div>
	          <div class="col-sm-5"> 
	            <label for="name" class="col-sm-12 control-label">'.$key['quantity'].'</label>
	          </div>
	        </div>';										
		}
		return view('admin.booking.detail', compact('bill','roomtype','customer','useservicedata'));	
		
	}

	public function getListBill()
	{
		$bill  = $this->bill->getAllBill();
		$data  = '';
		$modal = '';
		foreach ($bill as  $item) {
			if($item['status'] == 4)
			{				
				$status = Status::find($item['status'])->status;
				$item['date_in'] = date('d-m-Y', strtotime($item['date_in']));
				$item['date_out'] = date('d-m-Y', strtotime($item['date_out']));
				$total = $item['roomcharge'] + $item['servicecharge'];
				$data = $data.'
				<tr>
					<td>'.$item['roomnumber'].'</td>
					<td>'.$item['date_in'].'</td>
					<td>'.$item['date_out'].'</td>
					<td>'.$status.'</td>
		            <td>
		              <a data-toggle="modal" data-target="#view'.$item['id'].'"><i class="fa fa-1x fa-folder-open-o"></i></a>
		            </td>
		          </tr>';
		          $modal = $modal.'          
		            <!-- Modal -->
		            <div class="modal fade" id="view'.$item['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
		                      <label for="name" class="control-label">'.$item['roomnumber'].'</label>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="name" class="col-sm-5 control-label">Customer</label>

		                      <div class="col-sm-7">
		                      <label for="name" class="control-label">'.$item['customer']['name'].'</label>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="email" class="col-sm-5 control-label">Room charge</label>

		                      <div class="col-sm-7">
		                      <label for="name" class="control-label">$'.$item['roomcharge'].'</label>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="phone" class="col-sm-5 control-label">Service charge</label>

		                      <div class="col-sm-7">
		                      <label for="name" class="control-label">$'.$item['servicecharge'].'</label>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="address" class="col-sm-5 control-label">Date In</label>

		                      <div class="col-sm-7">
		                      <label for="name" class="control-label">'.$item['date_in'].'</label>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="birthday" class="col-sm-5 control-label">Date Out</label>

		                      <div class="col-sm-7">
		                      <label for="name" class="control-label">'.$item['date_out'].'</label>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label for="roomnumber" class="col-sm-5 control-label">Total BIll</label>

		                      <div class="col-sm-7">
		                      <label for="name" class="control-label">$'.$total.'</label>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="modal-footer">
		                    <a href="view/'.$item['id'].'" target="_blank"><button type="button" class="btn btn-primary">Detail</button></a>
		                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                  </div>
		                </div>
		              </div>
		            </div>';
			}
		}

		return view('admin.bill.list', compact('data','modal'));
	}
	public function getCancelBill($id)
	{
		$bill = $this->bill->getBookingByID($id);
		$bill->status = 1;
		$bill->save();
		return redirect('admin/booking/list')->with(['flash_message' => 'Cancle Booking success']);

	}
}
