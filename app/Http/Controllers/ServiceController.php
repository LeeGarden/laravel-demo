<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Service;

class ServiceController extends Controller
{
    
	function __construct(Service $service)
	{
		$this->service = $service;
	}

	public function getList()
	{
        $data        = $this->service->getListService();
        $servicelist = "";
        $modal       = "";
		foreach ($data as $key => $item) {
            $admin       = Service::find($item['id'])->admin->name;
            $servicelist = $servicelist.'
          <tr>
            <td>'.$item['id'].'</td>
            <td>'.$item['name'].'</td>
            <td>'.$item['price'].'</td>
            <td>'.$admin.'</td>
            <td>'.$item['updated_at'].'</td>
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
		return view('admin.service.list',compact('servicelist','modal'));
	}


    public function getAdd(){
    	return view('admin.service.add');
    }
    public function postAdd(ServiceRequest $request){
        $service           = $this->service;
        $service->name     = $request->name;
        $service->price    = $request->price;
        $service->id_admin = 1;
		$this->service->saveService();
		return redirect()->route('admin.service.getAdd')->with(['flash_message'=>'Add new Service success']);
    }
    public function getEdit($id)
    {
    	$service = $this->service->getServiceByID($id);
    	return view('admin.service.edit',compact('service'));
    }
    public function postEdit(ServiceRequest $request, $id)
    {
        $service           = $this->service->getServiceByID($id);
        $service->name     = $request->name;
        $service->price    = $request->price;
        $service->id_admin = 1;
    	$service->save();

    	return redirect()->route('admin.service.getList')->with(['flash_message' => 'Update service success']);
    }
  public function getDelete($id)
  {
    $service = $this->service->getServiceByID($id);
    $service->delete($id);

    return redirect()->route('admin.service.getList')->with(['flash_message' => 'Delete service success']);
  }
}
