<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $orders = Order::where('distributor_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('layouts.ProfileInformation.home');

    }

    public function user_order($id)
    {
        $orders = Order::where('distributor_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
        // dd($orders);

        return view('layouts.ProfileInformation.orders' , compact('orders'));
    }
}
