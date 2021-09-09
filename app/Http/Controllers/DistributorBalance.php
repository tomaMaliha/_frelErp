<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistributorBalance extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function division()
    {
        return view('admin.layout.distributor.division');
    }

    
}

