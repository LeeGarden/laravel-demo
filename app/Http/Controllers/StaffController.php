<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use App\Http\Requests\AdminRequest;
use DateTime;

class StaffController extends Controller
{
    function __construct(Admin $staff,Role $role)
    {
        $this->staff = $staff;
        $this->role  = $role;
    }

    public function getListStaff()
    {
        $data      = $this->staff->getListStaff();
        $liststaff = "";
        $modal     = "";
        foreach ($data as $key => $item) {
            $role      = Admin::find($item['id'])->role->role;
            $liststaff = $liststaff.'
          <tr>
            <td>'.$item['id'].'</td>
            <td>'.$item['name'].'</td>
            <td>'.$item['email'].'</td>
            <td>'.$role.'</td>
            <td>'.$item['updated_at'].'</td>
            <td>
              <a href="#" title="Detail"><i class="fa fa-1x fa-folder-open-o"></i></a>
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
        return view('admin.staff.list',compact('liststaff','modal'));

    }

    public function getAddStaff(){
        $role     = $this->role->getListRole();
        $listrole = "";
    	foreach ($role as $key => $item) {
    		$listrole = $listrole.'<option value="'.$item['id'].'">'.$item['role'].'</option>';
    	}
    	return view('admin.staff.add',compact('listrole'));
    }
    public function postAddStaff(AdminRequest $request)
    {
        $staff           = $this->staff;
        $staff->name     = $request->name;
        $staff->phone    = $request->phone;
        $staff->email    = $request->email;
        $staff->address  = $request->address;
        $staff->birthday = date('Y-m-d', strtotime($request->birthday));
        $staff->gender   = $request->gender;
        $staff->id_role  = $request->role;
        $staff->password = bcrypt($request->password);
    	if ($request->hasFile('imageUpload'))
    	{				
            $files           = $request->file('imageUpload');
            $filename        = str_slug($files->getClientOriginalName());
            $filetype        = $files->getClientOriginalExtension();
            $currenttime     = date("Y-m-d--H-i-s", time());
            $picture         = "$filename-$currenttime.$filetype";
            $destinationPath = base_path() . '/uploads/images/';
            $staff->image    = $picture;
            $files->move($destinationPath, $picture);
		}
		$staff->save();

		return redirect()->route('admin.staff.getAdd')->with(['flash_message' => 'Add new staff success']);
    }

    public function getEditStaff($id)
    {
        $staff  = $this->staff->getStaffByID($id);
        $option ="";
        $role   = $this->role->getListRole();
    	foreach ($role as $value) {
    		if ($value['id'] == $staff['id_role']) {
    			$option = $option.'<option value="'.$value['id'].'" selected>'.$value['role'].'</option>';
    		}
    		else{
    			$option = $option.'<option value="'.$value['id'].'">'.$value['role'].'</option>';
    		}
    	}
        if($staff['gender'] == 1)
        {
            $gender = '
                <label class="col-sm-3">
                  <input type="radio" name="gender" id="gender" value="1" checked>
                  Male
                </label>
                <label class="col-sm-3">
                  <input type="radio" name="gender" id="gender" value="0">
                  Female 
                </label>
            ';
        }
        else
        {
            $gender = '
                <label class="col-sm-3">
                  <input type="radio" name="gender" id="gender" value="1" >
                  Male
                </label>
                <label class="col-sm-3">
                  <input type="radio" name="gender" id="gender" value="0" checked>
                  Female 
                </label>
            ';
        }
    	return view('admin.staff.edit',compact('staff','option','gender'));
    }


    public function postEditStaff(AdminRequest $request,$id)
    {
        $staff           = $this->staff->getStaffByID($id);
        $staff->name     = $request->name;
        $staff->phone    = $request->phone;
        $staff->email    = $request->email;
        $staff->address  = $request->address;
        $staff->birthday = date('Y-m-d', strtotime($request->birthday));
        $staff->gender   = $request->gender;
        $staff->id_role  = $request->role;
        $staff->password = bcrypt($request->password);
    	if ($request->hasFile('imageUpload'))
    	{				
            $files           = $request->file('imageUpload');
            $filename        = str_slug($files->getClientOriginalName());
            $filetype        = $files->getClientOriginalExtension();
            $currenttime     = date("Y-m-d--H-i-s", time());
            $picture         = "$filename-$currenttime.$filetype";
            $destinationPath = base_path() . '/uploads/images/';
            $staff->image    = $picture;
            $files->move($destinationPath, $picture);
		}
		$staff->save();

		return redirect()->route('admin.staff.getAdd')->with(['flash_message' => 'Update staff success']);
    }

    public function getDeleteStaff($id)  
    {
        $staff = $this->staff->getStaffByID($id);
        $staff->delete($id);
        return redirect()->route('admin.staff.getList')->with(['flash_message' =>'Delete staff success']);  

    }



    public function getListRole()
    {
        $data     = $this->role->getListRole();
        $listrole = "";
        foreach ($data as $key => $item) 
        {
            $listrole = $listrole.'
              <tr>
                <td>'.$item['id'].'</td>
                <td>'.$item['role'].'</td>
                <td>'.$item['updated_at'].'</td>
                <td>
                  <a href="#" title="Detail"><i class="fa fa-1x fa-folder-open-o"></i></a>
                  <a href="edit/'.$item['id'].'" title="Update"><i class="fa fa-edit"></i></a>
                  <a href="delete/'.$item['id'].'" title="Delete"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>';
        }
        return view('admin.role.list',compact('listrole'));

    }

    public function getAddRole()
    {
        return view('admin.role.add');
    }

    public function postAddRole(Request $request)
    {
        $this->validate($request,
            [   'role' => 'required'

            ],
            [
                'role.required' => 'Please enter name of role',
            ]);

        $role       = $this->role;
        $role->role = $request->role;
        
        $role->save();
        return redirect()->route('admin.role.getAdd')->with(['flash_message' => 'Add new role success']);
    }


    public function getEditRole($id)
    {
        $role = $this->role->getRoleByID($id);
        return view('admin.role.edit',compact('role'));
    }

    public function postEditRole(Request $request,$id)
    {
        $this->validate($request,
            [   'role' => 'required'

            ],
            [
                'role.required' => 'Please enter name of role',
            ]);

        $role       = $this->role->getRoleByID($id);
        $role->role = $request->role;

        $role->save();
        return redirect()->route('admin.role.getList')->with(['flash_message' =>'Update role success']);  
    }

    public function getDeleteRole($id)  
    {


        $role = $this->role->getRoleByID($id);
        $role->delete($id);
        return redirect()->route('admin.role.getList')->with(['flash_message' =>'Delete role success']);  

    }
}
