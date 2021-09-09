<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use App\OrderDetails;
use Illuminate\Http\Request;

class OrderDuplicateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function pendingOrder()
    {
        $orders = Order::with(['balance'])->orderBy('id' , 'DESC')->where('status', 0 )->get();
        return view('admin.layout.order.pendingOrder' ,  compact('orders'));
    }

    public function orderApprove($id)
    {
        Order::where('id',$id)->update([
            'status' => 1,
        ]);

        return redirect()->route('pending.order');
    }

    public function allOrder()
    {
        $orders = Order::orderBy('id' , 'DESC')->where('status' , 1)->get();
        $orderProduct = OrderDetails::all();
        return view('admin.layout.order.allOrderList' , compact('orders' , 'orderProduct'));
    }

    public function allOrderSearch(Request $request)
    {
        $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString();
        $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString();
        // dd($from);
        $orders = Order::where('status' , 1)->whereBetween('created_at', [$from, $to])->get();
        return view('admin.layout.order.allOrderList' , compact('orders'));
    }

    public function order()
    {
        return view('admin.layout.payment.order');
    }
    
     public function balanceHistory(Request $request)
    {
        // $balanceHistory = DistributorBalance::create([
        //     'credit_limit'=>$request->credit_limit,
        //     'order_balance'=>$request->order_balance,
        //     'pending_order_value'=>$request->pending_order_value,
        //     'currnet_order'=>$request->currnet_order,
        //     'balance'=>$request->balance
        // ]);
        
        $balanceHistory = new DistributorBalance();
        $balanceHistory->credit_limit = $request->credit_limit;
        $balanceHistory->order_balance = $request->order_balance;
        $balanceHistory->pending_order_value = $request->pending_order_value;
        $balanceHistory->eligible_balance = $request->eligible_balance;
        $balanceHistory->currnet_order = $request->currnet_order;
        $balanceHistory->balance = $request->balance;
        $balanceHistory->save();

        return redirect()->route('order' , $request->distributor)->with(compact('balanceHistory')); 
    }

    public function orderDetails($id)
    {
        $order = Order::where('status' , 0)->find($id);
        $orderProduct = OrderDetails::all();
        return view('admin.layout.order.orderDetails' , compact('order' , 'orderProduct'));
    }

    public function orderDetailsActive($id)
    {
        $order = Order::where('status' , 1)->find($id);
        $orderProduct = OrderDetails::all();
        return view('admin.layout.order.orderDetails' , compact('order' , 'orderProduct'));
    }
}
