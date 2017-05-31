<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roomtype;
use App\Bill;
use App\Room;
use App\Customer;
use Mail;
use DB;

class HomeController extends Controller
{
    function __construct(Roomtype $roomtype,Bill $bill,Room $room, Customer $customer)
    {
        $this->roomtype = $roomtype;
        $this->bill     = $bill;
        $this->room     = $room;
        $this->customer = $customer;

        $data        = $this->roomtype->getListRoomtype();
        $divroomtype = "";
        $option      = "";
        $img         = "";
        foreach ($data as $key => $item) {
            $imgs = explode('|', $item['image']);            
            $option = $option.'<option value="'.$item['id'].'">'.$item['typename'].'</option>';

            $divroomtype = $divroomtype.'                   
            <div class="col-1-of-3 pdtop-30">
                <a href="/rooms/'.$item['slug'].'">
                    <div class="room-img" style="background: url('.'/uploads/images/'.''.$imgs[0].''.') no-repeat; background-position: center; background-size: cover;"></div>
                    <div class="room-info">
                        <h3 class="room-name">'.$item['typename'].'</h3>
                        <p class="room-desc">'.str_limit($item['description'],160).'</p>
                        <span class="room-service">
                            <img src="public/frontend/images/wifi.png">
                            <img src="public/frontend/images/tv.png">
                            <img src="public/frontend/images/iron.png">
                        </span>
                    </div>
                </a>
            </div>      
            ';
        }

        view()->share(['option' => $option,'divroomtype' => $divroomtype,'data' => $data]);
    }
    public function getAboutUs()
    {
        return view('frontend.about');
    }
    public function getSuccess()
    {
        return view('frontend.success');
    }

    public function index()
    {
        return redirect('admin/dashboard');
    }
    public function getHomePage()
    {
        return redirect('admin/dashboard');
    }

    public function getIndex()
    {

        return view('frontend.home');
    }


    public function getBookingPage()
    {
        return view('frontend.booking');
    }

    public function returnAvaibleRoom(Request $request)
    {
        $dateIn  = date('Y-m-d', strtotime($request->dateIn));
        $dateOut = date('Y-m-d', strtotime($request->dateOut));
        $type    = $request->roomtype;
        $allBill = $this->bill->getAllBill();
        if ($type != null) {
            
            //lấy ra mảng chứa danh sách phòng, orderBy theo id_roomtype, với key là roomnumber
            $allRoom = $this->room->orderBy('id_roomtype', 'desc')->where('id_roomtype',$type)->get()->keyBy('roomnumber');
        } else {
            
            //lấy ra mảng chứa danh sách phòng, orderBy theo id_roomtype, với key là roomnumber
            $allRoom = $this->room->orderBy('id_roomtype', 'desc')->get()->keyBy('roomnumber');
        }
        
        $allType = $this->roomtype->getListRoomtype();
        $arr     = array();
        $same    = '';
        $avaible = '<h2 class="h2-title-ardecode pdtop-30 pdbot-30">Avaible Room '.$dateIn.' - '.$dateOut.'</h2>';
        foreach ($allBill as $key => $item) 
        {
            if (!($item['status'] ==  1 && $item['status'] == 4) 
                && !($dateIn > $item['date_out'] || $dateOut < $item['date_in']))
            {
                $allRoom->forget($item['roomnumber']);              
            }
        }
        //tạo 1 biến tạm $same
        if(count($allRoom) == 0)
        {
            $avaible = $avaible.'<h3 class="h3-text-center pdtop-30">No rooms are empty, please search again for all room types or other times. We apologize for this inconvenience</h3>';
        }
        foreach ($allRoom as $key => $item) {
            $arr[$item['id_roomtype']] = count($allRoom->where('id_roomtype', $item['id_roomtype']));
            $roomtype = Roomtype::find($item['id_roomtype']);   
            $imgs = explode('|', $roomtype['image']);     
            if ($item['id_roomtype'] == $same) {
                $avaible  = $avaible.'';
            } else {
                $avaible  = $avaible.'
                <div class="avaible-room pdbot-30">
                    <div class="avaible-room-info">
                        <div class="avaible-room-img"> <div class="room-img" style="background: url('.'/uploads/images/'.''.$imgs[0].''.') no-repeat; background-position: center; background-size: cover;"></div>
                    </div>
                    <div class="avaible-room-text">             
                        <h3 class="room-name">'.$roomtype['typename'].'</h3>
                        <h4 class="room-price">Price: $'.$roomtype['price'].'/night</h4>
                        <p class="room-desc">'.$roomtype['description'].'</p>
                    </div>
                    <div class="avaible-room-button">
                        <a href="booking/'.$dateIn.'/'.$dateOut.'/'.$item['id_roomtype'].'"><button class="booking">Booking</button></a>
                        <p class="param-text-center">'.$arr[$item['id_roomtype']].' rooms</p>
                    </div>
                </div>
            </div>';
        }
            //rồi từ vòng thứ 2 if với cái $same thứ 1, rồi từ vòng thứ 3 if với cái $same thứ 2...
            $same = $item['id_roomtype'];
        }
        return view('frontend.booking',compact('avaible','dateIn','dateOut'));
            //return $allRoom;
    }


    public function getBookingRoom($dateIn, $dateOut, $id_roomtype)
    {
        $roomtype = Roomtype::find($id_roomtype);
        $daystay = (strtotime($dateOut) - strtotime($dateIn))/ (60 * 60 * 24);
        $total = $daystay * $roomtype->price;
        $roominfo = '
        <div class="form-group">
          <label for="typename" class="col-1-of-3 control-label">Room type</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control readonly-input" name="typename" id="typename" value="'.$roomtype->typename.'" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="dateIn" class="col-1-of-3 control-label">Date In</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control readonly-input" name="dateIn" id="dateIn" value="'.$dateIn.'" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="dateOut" class="col-1-of-3 control-label">Date Out</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control readonly-input" name="dateOut" id="dateOut" value="'.$dateOut.'" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="daystay" class="col-1-of-3 control-label">Days Stay</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control readonly-input" name="daystay" id="daystay" value="'.$daystay.' day(s)" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="total" class="col-1-of-3 control-label">Total</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control readonly-input" name="total" id="total" value="$'.$total.'" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="prepay" class="col-1-of-3 control-label">Prepay</label>

          <div class="col-2-of-3">
            <input type="text" class="form-control readonly-input" name="prepay" id="prepay" value="$'.$roomtype->price.'" readonly>
          </div>
        </div>';
        return view('frontend.donebooking', compact('roominfo'));
    }

    public function postBookingRoom(Request $request, $dateIn, $dateOut, $id_roomtype)
    {
        $roomtype = Roomtype::find($id_roomtype);
        $daystay = (strtotime($dateOut) - strtotime($dateIn))/ (60 * 60 * 24);
        $roomcharge = $daystay * $roomtype->price;
        
        $customer              = $this->customer;
        $customer->name        = $request->name;
        $customer->id          = $request->idcard;
        $customer->address     = $request->address;
        $customer->phone       = $request->phone;
        $customer->email       = $request->email;
        $customer->gender      = $request->gender;
        $customer->birthday    = date('Y-m-d', strtotime($request->birthday));
        $customer->job         = $request->job;
        $customer->nationality = $request->nationality;
        $customer->save();
        
        $bill                  = $this->bill;
        $bill->id_customer     = $request->idcard;
        $bill->roomcharge      = $roomcharge;
        $bill->date_in         = $dateIn;
        $bill->date_out        = $dateOut;
        $bill->id_roomtype     = $id_roomtype;
        $bill->id_admin        = 1;
        $bill->prepay          = $roomtype->price;
        $bill->status          = 2;
        $bill->save();

        $roomTypeEmail = $this->roomtype->getRoomtypeByID($id_roomtype);
        $typeName      = $roomTypeEmail->typename;
        $grandTotal    = $daystay * $roomTypeEmail->price;
        $price         = $roomTypeEmail->price;

        $data = array(
              'name'       => $request->name,
              'phone'      => $request->phone,
              'email'      => $request->email,
              'address'    => $request->address,
              'bill_id'    => $bill->id,
              'dateIn'     => $dateIn,
              'dateOut'    => $dateOut,
              'typeName'   => $typeName,
              'grandTotal' => $grandTotal,
              'price'      => $price,
            );

        if($request->email != null){
            Mail::send('frontend.mail.emailpay',$data ,function($message) use ($data){
                $message->from('luckystarhotelct@gmail.com','Contact Hotel Deluxe');
                $message->to($data['email']);
                $message->subject('Thông Tin Đặt Phòng');
            });
        }

        return redirect()->route('frontend.donebooking');
    }


    public function getRoomsPage()
    {
        return view('frontend.room');
    }

    public function getDetailRoom($slug)
    {
        $room = Roomtype::where('slug',$slug)->first();
        $imgs = explode('|',$room->image);
        return view('frontend.detailroom',compact('room','imgs'));
    }
}
