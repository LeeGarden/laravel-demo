<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Roomtype;
use App\Admin;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    
	function __construct(Room $room,Roomtype $roomtype)
	{
        $this->roomtype = $roomtype;
        $this->room     = $room;
	}

	public function getList()
        {
        $data = $this->room->getListRoom();
        $roomlist = "";
        $modal    = "";
		foreach ($data as $item) {
            $roomtype = Room::find($item['id'])->roomtype->typename;
            $admin    = Room::find($item['id'])->admin->name;
            $roomlist =  $roomlist.
			' <tr>
				<td>'.$item['roomnumber'].'</td>
				<td>'.$roomtype.'</td>
				<td>'.$admin.'</td>
				<td>'.$item['updated_at'] .'</td>
                <td>
                  <a href="edit/'.$item['id'].'" title="Update"><i class="fa fa-edit"></i></a>
                  <a data-toggle="modal" data-target="#delete'.$item['id'].'"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>';
            $modal = $modal.'          
            <!-- Modal -->
            <div class="modal fade" id="delete'.$item['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Item</h4>
                  </div>
                  <div class="modal-body">
                    Delete this data. Are you sure?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                    <a href="delete/'.$item['id'].'"><button type="button" class="btn btn-primary">Yes</button></a>
                  </div>
                </div>
              </div>
            </div>';
		}
		return view('admin.room.list',compact('roomlist','modal'));

	}

    public function getAdd()
    {
    	$roomtype = $this->roomtype->getListRoomtype();
    	return view('admin.room.add',compact('roomtype'));
    }

    public function postAdd(RoomRequest $request)
    {
        $room              = $this->room;
        $room->roomnumber  = $request->roomnumber;
        $room->id_roomtype = $request->roomtype;
        $room->id_admin    = 1;
    	$this->room->save();
    	return redirect()->route('admin.room.getAdd')->with(['flash_message' =>'Add room success']);    	

    }


    public function getEdit($id)
    {
        $room     = $this->room->getRoomByID($id);
        $roomtype = $this->roomtype->getListRoomtype();
        $option   = "";
    	foreach ($roomtype as $value) {
    		if ($value['id'] == $room['id_roomtype']) {
    			$option = $option.'<option value="'.$value['id'].'" selected>'.$value['typename'].'</option>';
    		}
    		else{
    			$option = $option.'<option value="'.$value['id'].'">'.$value['typename'].'</option>';
    		}
    	}
    	return view('admin.room.edit',compact('room','option'));
    }
    public function postEdit(RoomRequest $request,$id)
    {
        $room              = $this->room->getRoomByID($id);
        $room->roomnumber  = $request->roomnumber;
        $room->id_roomtype = $request->roomtype;
        $room->id_admin    = 1;

    	$room->save();
    	return redirect()->route('admin.room.getList')->with(['flash_message' =>'Add room success']);  
    }
    public function getDelete($id)  
    {
        $room = $this->room->getRoomByID($id);
        $room->delete($id);
        return redirect()->route('admin.room.getList')->with(['flash_message' =>'Delete room success']);  

    }
}
