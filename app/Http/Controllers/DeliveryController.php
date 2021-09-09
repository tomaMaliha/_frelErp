<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use App\Driver;
use App\Delivery;
use Carbon\Carbon;
use App\Distributor;
use App\OrderDetails;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;

class DeliveryController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function add(Request $request)
    {
       
        $distributor_names = Order::where('status' , 1)->get();
        
        // if($distributor_names)
        // {
        //     $deliveryReady = Delivery::where('status' , 0)->get();
        // }
            
            // dd($deliveryReady);
        $delivery = Delivery::all();
        
        return view('admin.layout.delivery.deliveryAddForm' , compact('distributor_names' , 'delivery'));
    }
    
    public function search(Request $request)
    {
        // dd($request->all());
        $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString();
        $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString();
        // dd($from);
        $orders = Order::whereBetween('created_at', [$from, $to])
                        ->where('order_id' , $request->order_id)
                        ->get();
        // dd($orders);            
        $distributor_names = Order::all();
        // $distributors = Order::with(['upazilaData', 'divisionData', 'districtData', 'orderDetail.productDetail'])->find($id);
        
        return view('admin.layout.delivery.deliveryAddForm' , compact('orders' , 'distributor_names' ));
        // dd($orders);
    }

    public function deliveryOrderDetails($id)
    {
        $deliveryOrder = Order::where('status' , 1)->find($id);
        return view('admin.layout.delivery.deliveryOrderDetails' , compact('deliveryOrder'));
    }

    public function create(Request $request)
    {
        // dd($request->all());

        $ctn = array_filter($request->input('ctn'),function($item){
            if($item != null){
                return $item;
            }
        });

        $number = "1" .str_pad($request->order_id, 5 , '0' , STR_PAD_LEFT);
        foreach($ctn as $key=>$product_id){
            $deliveryOrder = OrderDetails::where('product_id' , $request->product_id[$key])->with('order')->first();
           
        
            $delivery = Delivery::create([
                'order_id'=>$request->order_id,
                'product_id'=>$request->product_id[$key],
                'sub_category_id'=>$request->sub_category_id[$key],
                'distributor_id'=>$request->distributor_id,
                'quantity'=>$request->quantity[$key],
                'ctn'=>$request->ctn[$key],
                'ctn_serial'=>$request->ctn_serial[$key],
                'date'=>$request->date,
                'value'=>$request->value[$key],
                'DO'=>$number,
                
            ]);

           
            if(Order::where('order_id',$request->order_id)
                    ->exists())
                    {
                    $data = Order::where('order_id',$request->order_id)
                                    ->first();
                    Order::where('order_id',$request->order_id)
                            ->update([
                        'delivery_status' => "Delivered",
                    ]);
            
            }
        }
        
        Toastr::success('New Delivery Added Successfully', 'Title');
        return redirect()->route('delivery.list');
    }

    public function list()
    {
        $deliveries = Delivery::orderBy('id', 'desc')->get();
        return view('admin.layout.delivery.deliveryList' , compact('deliveries'));
    }

    public function DO($id)
    {
        $drivers = Driver::where('status' , 1)->get();
        $delivery = Delivery::find($id);
       
        return view('admin.layout.delivery.DOForm' , compact('delivery' , 'drivers'));
    }

    public function DOCreate(Request $request , $id)
    {
        $deliveries = Delivery::find($id);

        $deliveries->driver_name = $request->driver_name;
        $deliveries->driver_mobile = $request->driver_mobile;
        $deliveries->destination = $request->destination;
        $deliveries->vehical = $request->vehical;
        $deliveries->transport = $request->transport;
        $deliveries->note = $request->note;
        $deliveries->save();
        
        Toastr::success('New Delivery Information Added Successfully', 'Title');
        return redirect()->route('driver.list' );
    }

    public function driverList()
    {
        $drivers = Driver::all();
        return view('admin.layout.delivery.driverList' , compact('drivers'));
    }

    public function driverCreate(Request $request)
    {
        $file_name = null;

        if($request->hasFile('image'))
        {
            $image= $request->file('image');
            $file_name = uniqid().date('Ymdhms').'.'.$image->getClientOriginalExtension();
            $image->move('public/assets/images/driver',$file_name);
        }

        $driver = Driver::create([
           
            'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'join_date'=>$request->join_date,
            'date_birth'=>$request->date_birth,
            'nid'=>$request->nid,
            'image'=>$file_name,
            
        ]);
            
        Toastr::success('New Driver Information Added Successfully', 'Title');
        return redirect()->route('driver.list' );
    }

    public function driverUpdate(Request $request , $id)
    {
        $file_name = null;
        $data =$request->all();
        
        if($request->hasFile('image'))
        {
            $driver_image= $request->file('image');
            $file_name = uniqid().date('Ymdhms').'.'.$driver_image->getClientOriginalExtension();
            $driver_image->move('public/assets/images/driver/',$file_name);
        }
        else
        {
            $file_name = $data['image'];
        }

        Driver::where('id',$id)->update([
			'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'join_date'=>$request->join_date,
            'date_birth'=>$request->date_birth,
            'nid'=>$request->nid,
            'image'=>$file_name,
        ]);
        
        Toastr::success('Driver Information Updated Successfully', 'Title');
        return redirect()->route('driver.list' );
    }
    
    public function updateStatus(Request $request , $id)
    {
        
        Driver::where('id',$id)->update([
			'status'=>$request->status,
        ]);
        
        Toastr::success('Driver Status Updated Successfully', 'Title');
        return redirect()->route('driver.list' );
    } 

    public function deliveryStatus(Request $request , $id)
    {
        $deliveries = Delivery::find($id);
        $deliveries->status = $request->status;
        $deliveries->save();

                
        $getProductStock = Stock::where('product_id' , $deliveries->product_id)->first();
        $newStock = $getProductStock->stock - $deliveries->quantity;
        // dd($newStock);
        Stock::where('product_id' , $deliveries->product_id)
                ->update([
                    'stock' => $newStock,
                ]);

        Toastr::success('New Delivery Status Updated Successfully', 'Title');
        return redirect()->route('delivery.list' );
    }

    public function deliveryChalanPrint($id)
    {
        $deliveries = Delivery::find($id);
		$pdf = PDF::loadView('admin.layout.delivery.deliveryChalanPrint' , ['deliveries'=>$deliveries]);
        return $pdf->stream('deliveries.pdf');
    }

}
