<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function userAdd()
    {
        $roles = Role::where('status' , 1)->orderBy('id' , 'desc')->get();
    	return view ('admin.layout.user.userAdd', compact('roles'));
    }
    
    public function create(Request $request)
    {
        // dd($request->all());
        $file_name = null;
        if($request->hasFile('image'))
        {
        $user_image= $request->file('image');
        $file_name = uniqid().date('Ymdhms').'.'.$user_image->getClientOriginalExtension();
        $user_image->move('public/assets/images/user/',$file_name);
        }

        // $request->validate([
        //     'nid' => 'bail|required|max:255|number',
        // ]);

        DB::beginTransaction();
        try{

            // $validator = Validator::make($request->all(), [
            //     'user_name' => 'required|unique:users|max:25',
            //     'email' => 'required|unique:users|email',
            // ]);
    
            // if ($validator->fails()) 
            // {
            //     return redirect('user.add')->withErrors($validator)->withInput();
            // }

       $user =  User::create([
            
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
            'companyName'=>$request->companyName,
            'role_id'=>$request->role_id,
            'status'=>$request->status,
            'dob'=>$request->dob,
            'department'=>$request->department,
            'nid'=>$request->nid,
            'joinDate'=>$request->joinDate,
            'image'=>$file_name,
            
            'password'=>bcrypt($request->password),
            // 'user_id'=>auth()->user()->id
            
        ]);
        // dd($user);
        DB::commit();

            session()->flash('success', 'User Information not Added Successfully');
            return redirect()->route('user.list');

        }
        catch(Throwable $ex){ 
            
            DB::rollBack();
            // dd($ex->getMessage());
            
            session()->flash('error', 'User Information not Added Successfully');
            return redirect()->back();
        }
    }

    public function list()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view ('admin.layout.user.userList', compact('users'));
    }

    public function edit($id)
    {
        $roles = DB::table('roles')->where('status' , 1)->get();
        $user = User::find($id);
        
        return view('admin.layout.user.userEdit',compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $user_image= $request->file('image');
            $file_name = uniqid().date('Ymdhms').'.'.$user_image->getClientOriginalExtension();
            $user_image->move('public/assets/images/user',$file_name);
        }
        else
        {
            $file_name = $data['image'];
        }

        $validator = Validator::make($request->all(), [
            
            'email' => 'required|unique:users|email',
        ]);
        
        User::where('id',$id)->update([
           
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
            'companyName'=>$request->companyName,
            'role_id'=>$request->role_id,
            'dob'=>$request->dob,
            'department'=>$request->department,
            'nid'=>$request->nid,
            'joinDate'=>$request->joinDate,
            'image'=>$file_name,
            'password'=>bcrypt($request->password)
        ]);
        session()->flash('success', 'Successfully Updated the User!!');
        return redirect()->route('user.list');
     
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('success', 'Successfully deleted the User!!');
        return redirect()->back();
    }

    public function UserActive($id)
    {
        // dd($request->all());
        $users= User::find($id);
   		if($users->status==1)
   		{
   			$users->status = 0;
   			$users->save();
            session()->flash('error', 'User disabled');
   		}
   		else
   		{
   			$users->status = 1;
   			$users->save();
            session()->flash('success', 'User enabled');
   		}
           
   		return redirect()->back();
    }

    public function logout()
    {
        if (auth()->user()->role == '1') {
            Auth::logout();
            return redirect()->route('login_register')->with('msg', 'Successfully logged out.');
        }

        if (auth()->user()->role != '4') {
        Auth::logout();
        return redirect()->route('login')->with('msg', 'Successfully logged out.');;
        }
    }

    public function divisionActive($id)
    {
        $divisions= Division::find($id);
   		if($divisions->status==1)
   		{
   			$divisions->status = 0;
   			$divisions->save();
   		}
   		else
   		{
   			$divisions->status = 1;
   			$divisions->save();
   		}
   		return redirect()->back();
    }

    public function zoneActive($id)
    {
        $zones= District::find($id);
   		if($zones->status==1)
   		{
   			$zones->status = 0;
   			$zones->save();
   		}
   		else
   		{
   			$zones->status = 1;
   			$zones->save();
   		}
   		return redirect()->back();
    }

    public function baseActive($id)
    {
        $bases= Upazila::find($id);
   		if($bases->status==1)
   		{
   			$bases->status = 0;
   			$bases->save();
   		}
   		else
   		{
   			$bases->status = 1;
   			$bases->save();
   		}
   		return redirect()->back();
    }

    public function division()
    {
        $divisions = Division::all();
        $total_division = $divisions->count();
        $active_division = Division::where('status' , 1)->get();
        $active = $active_division->count();
        return view('admin.layout.user.divisionManage.division' , compact('divisions' , 'total_division' , 'active'))
                    ->with('msg' , 'Division Activated Successfully');
    }

    public function zone()
    {
        $zones = District::all();
        $total_zone = $zones->count();
        $active_zone = District::where('status' , 1)->get();
        $active = $active_zone->count();
        return view('admin.layout.user.divisionManage.zone' , compact('zones' , 'total_zone' , 'active'))
                    ->with('msg' , 'Zone Activated Successfully');
    }

    public function base()
    {
        $bases = Upazila::all();
        $total_base = $bases->count();
        $active_base = Upazila::where('status' , 1)->get();
        $active = $active_base->count();
        return view('admin.layout.user.divisionManage.base' , compact('bases' , 'total_base' , 'active'))
                    ->with('msg' , 'Base Activated Successfully');
    }

    public function user_password(Request $request , $id)
    {
        $user = User::find($id);

        if ($request->password) {
            $user->password = bcrypt($request->password);

            $user->save();
            return redirect()->back()->with('success', 'Password added successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Please add User Complete Information first.');
        }
    }
}
