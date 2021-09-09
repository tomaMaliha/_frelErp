<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Stock;
use App\Payment;
use App\Category;
use Carbon\Carbon;
use App\Distributor;
use App\OrderDetails;
use App\distributorBalance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use infobip\api\client\SendSingleTextualSms;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\textual\SMSTextualRequest;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // public function list()
    // {
    //     $actual_order = 0;

    //     $dis = Distributor::all();
    //     // dd($dis);
    //     // $pay = Payment::where('distributor_id')->get();
    //     // if($dis || $pay)
    //     // {
    //     //     $order = $distributor_name;
    //     // }
    //     // dd($order);
    //     $payments = Payment::all();

    //     return view('admin.layout.order.orderAdd' , compact('payments', 'actual_order' , 'dis'));
    // }

    public function list()
    {
        $actual_order = 0;

        $dis = Distributor::where('active' , 1)->get();
        // $pay = Payment::where('distributor_id' , 'amount')->get();
        // if($dis || $pay)
        // {
        //     $order = $distributor_name;
        // }
        // $payments = Payment::all();

        return view('admin.layout.order.orderAdd' , compact('actual_order' , 'dis'));
    }

    public function searchDetails(Request $request)
    {
        $search = $request->distributor_id;

        $payments = Distributor::where('id' , $search)->with('paymentDistributor')->get();
        $actual_order = Order::with('distributor')->where('status', 0)->find($search);
        $pending_order = Order::with('distributor')->where('status', 1)->first();

        
        $cats = Category::all();
        $carts = Cart::all();
        return view ('admin.layout.order.orderForm' )->with('payments', $payments)->with('cats', $cats)->with('carts', $carts)->with('actual_order', $actual_order)->with('pending_order', $pending_order);
    }

    public function order($distributor_id)
    {
        $payments = Distributor::where('id' , $distributor_id)->get();
        $cats = Category::all();
        $carts = Cart::all();
        $orders = Order::all();
        $actual_order = Order::with('distributor')->where('status', 0)->find($distributor_id);
        $pending_order = Order::with('distributor')->where('distributor_id' , $distributor_id)->where('status', 1)->first();

        // $payments = Distributor::all();
        // return redirect()->back()->with('payments', $payments)->with('cats', $cats)->with('carts', $carts)->with('distributor_id', $distributor_id)->with('orders', $orders);
        return view('admin.layout.order.orderForm' , compact( 'payments' , 'carts' , 'cats' , 'distributor_id' , 'orders'));
    }

    public function searchCategory(Request $request,$distributor_id)
	{
        
        $payments = Distributor::where('id' , $distributor_id)->get();
        $search = $request->sub_category_id;
        
        $categories = Category::with('products')->where('id', $search)->first();
        $cats = Category::all();
        $carts = Cart::all();
        $actual_order = Order::with('distributor')->where('status', 0)->first();
        $pending_order = Order::with('distributor')->where('status', 1)->first();
       
        
        // return redirect()->back()->with('categories', $categories)->with('cats', $cats)->with('payments', $payments)->with('distributor_id', $distributor_id)->with('carts', $carts)->with('actual_order', $actual_order)->with('pending_order', $pending_order);

		return view('admin.layout.order.orderForm', compact('categories', 'cats' , 'payments' , 'carts' ,'distributor_id', 'actual_order', 'pending_order'));
		// dd($categories);
    }


    public function create(Request $request , $distributor_id)
    {
        
        $actual_order = 0;
        $session_id = Session::get('session_id');
    
        if(empty($session_id))
        {
            $session_id = Str::random(40);
            Session::put('session_id' , $session_id);
        }

        $countProduct = Cart::where('product_id' , $request->product_id)->count();
        
        if($countProduct > 0)
        {
            Toastr::error('Product Exist', 'Title', [ "positionClass"=> "toast-top-right" , "closeButton"=> true, "progressBar"=> true,]);
            return redirect()->route('order' , $distributor_id); 
        }

        else
        {
            foreach ($request->product_id as $key => $product) 
            {
                if($request->quantity[$key] > 0 && $request->sub_total[$key] > 0 )
                {
                
                    $quantity = Stock::where('product_id', $product)->latest()->first();
                    $cart = Cart::create([
                        'sub_category_id'=>$request->sub_category_id,
                        'product_id'=>$product,
                        'distributor_id'=>$request->distributor_id,
                        'quantity'=>$request->quantity[$key],
                        'sub_total'=>$request->sub_total[$key],
                        'session_id'=>$session_id,
                    ]);
                    
                // $quantity->stock = $quantity->stock - $request->quantity[$key];
                // $quantity->save();
                $cart->unique_id = "1" .str_pad($cart->id, 5 , '0' , STR_PAD_LEFT);
                
                $cart->save();
                
                $stock = Stock::where('product_id' , $product)->first();
                $stock->pending_order = $request->pending_order[$key];
                $stock->save();
                // echo $order."<br>";
                }  
            }

            // $order = Order::count()+1;
            // $number = "#" .str_pad($order, 5 , '0' , STR_PAD_LEFT);
            
		return redirect()->route('order' , $distributor_id)->with('msg','New Order Added Successfully'); 
        }
            
    }

    public function update(Request $request , $distributor_id)
    {
        $actual_order = 0;

        $cart = Cart::find($distributor_id);

        if (!is_null($cart)) {
            $cart->quantity = $request->quantity;
            $cart->sub_total = $request->sub_total;
            $cart->save();
            return redirect()->route('order' , $request->distributor_id)->with('msg','Cart Updated Successfully' , compact('cart'));
            // return \Response::json(['success' => 'Cart quantity updated successfully', 'cart' => $cart]);
        }
        else {
            session()->flash('error', 'Invalid cart item');
            return redirect()->route('order' , $request->distributor_id)->with('msg','Cart Updated Successfully' , compact('cart'));
        }

            // $cart = Cart::find($id)->update([
            //     'quantity'=>$request->quantity,
            // ]);
           
        // return redirect()->route('order' , $request->distributor_id)->with('msg','Cart Updated Successfully' , compact('cart'));
        
    }

    public function placeOrder(Request $request )
    {
        // Session::forget('Cart');
        $actual_order = 0;

        $cartProducts = Cart::where('distributor_id' , $request->distributor_id)->get();
        
        $order_count = Order::all()->count();
        $orderCount = $order_count + 1;
        $date = Carbon::now()->format('ymd');
        $id = $date.$orderCount;
        
        $order = new Order();
        $order->total = $request->total;
        $order->order_id = $id;
        $order->distributor_id = $request->distributor_id;
        $order->session_id = $request->session_id;
        $order->status = 0;
        $order->delivery_status = "Not Delivered";
        $order->save();
        
            $balanceHistory = new distributorBalance();
            $balanceHistory->distributor_id = $request->distributor_id;
            $balanceHistory->order_id = $id;
            $balanceHistory->credit_limit = $request->credit_limit;
            $balanceHistory->eligible_balance = $request->eligible_balance;
            $balanceHistory->balance = $request->balance;
            // dd($balanceHistory);
            
            $balanceHistory->save();

            $orderNew = DB::getPdo()->lastInsertId();
            // dd($orderNew);
            foreach($cartProducts as $pro)
            {
            
                $cartProp = new OrderDetails;
                $cartProp->order_id = $order->order_id;
                $cartProp->distributor_id = $pro->distributor_id;
                $cartProp->sub_category_id = $pro->sub_category_id;
                $cartProp->product_id = $pro->product_id;
                $cartProp->quantity = $pro->quantity;
                $cartProp->sub_total = $pro->sub_total;
                $cartProp->unique_id = $pro->unique_id;
                $cartProp->save();
                $pro->delete();
            }
            
            

            // $client = new SendSingleTextualSms(new BasicAuthConfiguration('FirstRays','info@FRCL20'));

            // $requestBody = new SMSTextualRequest();
    
            // $requestBody->setFrom('First Rays');
            // $requestBody->setTo('+88'.$request->mobile);
            // $requestBody->setText("Use as One Time Password to continue with www.firstrays.com.bd");
        
            // $response = $client->execute($requestBody);
    
            //     dd($response);
    
            // dd($requestBody);
        
        return redirect()->back();
    }

   public function delete($id)
   {

        Order::find($id)->delete();
        return redirect()->route('order.list')->with('msg','Order Deleted Successfully');
        // $order = Order::find($id);
        // $distributor = $order->distributor_id;
        // $order->delete();
        // return redirect()->back();
   }
}
