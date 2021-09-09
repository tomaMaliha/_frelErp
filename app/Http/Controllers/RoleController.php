<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
   	public function index()
   	{
   		$roles = Role::orderBy('id' , 'DESC')->get();
   		return view ('admin.layout.user.role', compact('roles'));
   	}

    public function create(Request $request)
    {
      Role::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()->route('role')->with('msg','New Role Added Successfully'); 
    }

    public function view($id)
    {
      $roles = Role::all();
      return view ('admin.layout.permission.permissionList', compact('roles'));
	}
	
	public function update(Request $request,$id)
	{
		Role::where('id',$id)->update([
			'name'=>$request->name,
            'description'=>$request->description,
		]);
		return redirect()->route('role')->with('msg','Role Updated Successfully'); 
	}

   	public function roleActive($id)
   	{
   		$roles= Role::find($id);
   		if($roles->status==1)
   		{
   			$roles->status = 0;
   			$roles->save();
   		}
   		else
   		{
   			$roles->status = 1;
   			$roles->save();
   		}
   		return redirect()->back();
	   }
	   
	   public function delete($id)
	   {
		   Role::find($id)->delete();
		   return redirect()->route('role')->with('msg' , 'Role Deleted Successfully');
	   }
}