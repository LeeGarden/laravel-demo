<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    function __construct(Customer $customer)
    {
    	$this->customer = $customer;
    }

    public function getList()
    {
        $data         = $this->customer->getListCustomer();
        $listcustomer = "";
        $modal = "";
    	foreach ($data as $key => $item)
        {
            if ($item['gender'] == 1) {
                $item['gender'] = 'Male';
            } else {
                $item['gender'] = 'Female';
            }
            
    		$listcustomer = $listcustomer.'
          <tr>
            <td>'.$item['id'].'</td>
            <td>'.$item['name'].'</td>
            <td>'.$item['email'].'</td>
            <td>'.$item['phone'].'</td>
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
                    <h4 class="modal-title" id="myModalLabel">Customer Info</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-5 control-label">ID</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['id'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-5 control-label">Name</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['name'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-sm-5 control-label">Email</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['email'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="phone" class="col-sm-5 control-label">Phone</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['phone'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="address" class="col-sm-5 control-label">Address</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['address'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="birthday" class="col-sm-5 control-label">Birthday</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['birthday'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="roomnumber" class="col-sm-5 control-label">Gender</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['gender'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="id_role" class="col-sm-5 control-label">Jobs</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['job'].'</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="id_role" class="col-sm-5 control-label">Nationality</label>

                      <div class="col-sm-7">
                      <label for="name" class="control-label">'.$item['nationality'].'</label>
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
    	return view('admin.customer.list', compact('listcustomer','modal'));
    }
    public function getInfo($id)   
    {
        $customer = $this->customer->find($id);
        $customer->birthday = date('d-m-Y', strtotime($customer->birthday));
        if($customer->gender == 1)
        {
            $customer->gender = 'Male';
        }
        else
        {
            $customer->gender = 'Female';
        }
        return view('admin.customer.info', compact('customer'));
    }
}
