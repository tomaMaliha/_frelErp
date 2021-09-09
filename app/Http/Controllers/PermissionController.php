<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;

class PermissionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

   	public function index()
   	{
   		$roles = Role::all();
   		$permissions = Permission::orderBy('id' , 'desc')->get();
   		return view('admin.layout.permission.permissionList',compact('roles','permissions'));
   	}

   	public function create()
   	{
   		return  view('admin.layout.permission.permissionAdd');
   	}

   	public function store(Request $request)
   	{
   		Permission::create($request->all());
   		return redirect()->route('admin');
   	}
}
