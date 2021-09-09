<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Order;
use App\Product;
use Carbon\Carbon;
use App\Distributor;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    // dashboard page
    public function index()
    {
        $distributors = Distributor::whereDate('created_at', Carbon::today())->get();
        $distributor = Distributor::where('active' , 1)->get();
 
        $category = Category::where('status' , 1)->get();

        $products = Product::whereDate('created_at', Carbon::today())->get();
        $product = Product::where('status' , 1)->get();

        $users = User::whereDate('created_at', Carbon::today())->get();

        $orders = Order::where('status' , 0)->whereDate('created_at', Carbon::today())->get();
        $order = Order::where('status' , 1)->get();
        
        return view('admin.partials.main', compact('distributors' , 'products' , 
        'users','distributor' , 'orders' , 'product' , 'order', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->order_id;
        // dd($search);
        $distributors = Distributor::whereDate('created_at', Carbon::today())->get();
        $distributor = Distributor::all();
        $products = Product::whereDate('created_at', Carbon::today())->get();
        $users = User::whereDate('created_at', Carbon::today())->get();

        $orders = Order::where('status' , 0)->whereDate('created_at', Carbon::today())->get();
        $product = Product::all();
        // $recentOrder = Order::where('status' , 0)->get();
        // dd($recentOrder);
        return view('admin.partials.main', compact( 'distributors' , 'products' , 'users','distributor' , 'orders' , 'product'));
    
    // dd($recentOrder);
    }
}
