<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoomTypeRequest;
use App\Roomtype;

class RoomTypeController extends Controller
{

	function __construct(Roomtype $roomtype)
    {
        $this->roomtype = $roomtype;
    }


    //
    public function getAdd(){
    	return view('admin.roomtype.add');
    }
    
    public function postAdd(RoomTypeRequest $request){
        $roomtype              = $this->roomtype;
        $roomtype->typename    = $request->typename;
        $roomtype->slug        = str_slug($request->typename);
        $roomtype->maxpeople   = $request->maxpeople;
        $roomtype->price       = $request->price;
        $roomtype->description = $request->description;
        $roomtype->id_admin    = 1;
    	//get multiple image
    	if ($request->hasFile('imageUpload')) {				
            $files = $request->file('imageUpload');
            $arr   = '';
		    foreach($files as $file){
                $typename        = str_slug($request->typename);
                $filename        = str_slug($file->getClientOriginalName());
                $filetype        = $file->getClientOriginalExtension();
                $currenttime     = date("Y-m-d--H-i-s", time());
                $picture         = "$typename-$filename-$currenttime.$filetype";
                $destinationPath = base_path() . '/uploads/images/';
                $arr             = "$picture|$arr"; //chuỗi tên ảnh ngăn cách bằng dấu |
                $file->move($destinationPath, $picture);
		    }
		    $imgs = substr($arr, 0, -1); //cắt kí tự / cuối chuỗi //
			
			$roomtype->image = $imgs; // cắt xong lưu csdl
		}
		//get value of check box
        $utilities = $request->input('utility');
        $utili     = "";
		foreach($utilities as $utility){
		        $utili = "$utility|$utili";
		}
		$roomtype->utility = substr($utili, 0, -1);

    	$this->roomtype->saveRoomtype();

    	return redirect()->route('admin.roomtype.getAdd')->with(['flash_message'=>'Add Room type success']);			 
    }

    public function getEdit($id)
    {   
        $data    = $this->roomtype->getRoomtypeByID($id);
        $utility = explode('|',$data['utility']);
        return view('admin.roomtype.edit',compact('data','utility'));
    }

    public function postEdit(RoomTypeRequest $request, $id)
    {
        $roomtype              = $this->roomtype->getRoomtypeByID($id);
        $roomtype->typename    = $request->typename;
        $roomtype->slug        = str_slug($request->typename);
        $roomtype->maxpeople   = $request->maxpeople;
        $roomtype->price       = $request->price;
        $roomtype->description = $request->description;
        $roomtype->id_admin    = 1;
        if ($request->hasFile('imageUpload')) {             
            $files = $request->file('imageUpload');
            $arr   = '';
            foreach($files as $file){
                $typename        = str_slug($request->typename);
                $filename        = str_slug($file->getClientOriginalName());
                $filetype        = $file->getClientOriginalExtension();
                $currenttime     = date("Y-m-d--H-i-s", time());
                $picture         = "$typename-$filename-$currenttime.$filetype";
                $destinationPath = base_path() . '/uploads/images/';
                $arr             = "$picture|$arr"; //chuỗi tên ảnh ngăn cách bằng dấu |
                $file->move($destinationPath, $picture);
            }
            $imgs = substr($arr, 0, -1); //cắt kí tự / cuối chuỗi //
            
            $roomtype->image = $imgs; // cắt xong lưu csdl
        }
        //get value of check box
        $utilities = $request->input('utility');
        $utili     = "";
        foreach($utilities as $utility){
                $utili = "$utility|$utili";
        }
        $roomtype->utility = substr($utili, 0, -1);
        $roomtype->save();
        return redirect()->route('admin.roomtype.getList')->with(['flash_message'=>'Update Room type success']);    


    }



    public function getList()
    {
        $roomtypes = $this->roomtype->getListRoomtype();
        $data      = "";
        $modal     = "";
        foreach ($roomtypes as $item) {
            $admins = Roomtype::find($item['id'])->admin->name;
            $data   =  $data.
            ' <tr>
                <td>'.$item['id'] .'</td>
                <td>'. $item['typename'] .'</td>
                <td>'. $item['maxpeople'] .'</td>
                <td>'. $item['price'].'</td>
                <td>'. $admins.'</td>
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
    	return view('admin.roomtype.list', compact('data','modal'));
    }


    public function getDelete($id)
    {
        $roomtype = $this->roomtype->getRoomtypeByID($id);
        $roomtype->delete($id);
        return redirect()->route('admin.roomtype.getList')->with(['flash_message'=>'Delete Room type success']);    
    }
}
