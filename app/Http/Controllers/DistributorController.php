<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Throwable;
use App\Payment;
use App\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use infobip\api\client\SendSingleTextualSms;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\textual\SMSTextualRequest;
use Barryvdh\DomPDF\Facade as PDF;

class DistributorController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:admin');
    }

    // View Distributor List
    public function list()
    {
        $distributors = Distributor::orderBy('id' , 'DESC')->where('active' , 1)->get();
        return view ('admin.layout.distributor.distributorList',compact('distributors'));
    }

    // Show Distributor form
    public function add()
    {
        $divisions = Division::where('status' , 1)->get();
        return view ('admin.layout.distributor.distributorAdd', compact('divisions'))->with('msg','New Distributor Added Successfully');

        
    }

    public function policy()
    {
        $pdf = PDF::loadView('admin.layout.distributor.distributorPolicy' );
        return $pdf->stream('distributorPolicy.pdf');
    }

    // Creating data for distributor form
    public function create(Request $request)
    {
       
        $file1_name = null;
        $file2_name = null;
        $file3_name = null;
        $file4_name = null;
        $file5_name = null;
        if($request->hasFile('image_distributot'))
        {
            $image_distributot= $request->file('image_distributot');
            $file1_name = uniqid().date('Ymdhms').'.'.$image_distributot->getClientOriginalExtension();
            $image_distributot->move('public/assets/images/distributor',$file1_name);
        }

        if($request->hasFile('image_nominee'))
        {
            $image_nominee= $request->file('image_nominee');
            $file2_name = uniqid().date('Ymdhms').'.'.$image_nominee->getClientOriginalExtension();
            $image_nominee->move('public/assets/images/distributor',$file2_name);
        }
        
        if($request->hasFile('image_trade'))
        {
            $image_trade= $request->file('image_trade');
            $file3_name = uniqid().date('Ymdhms').'.'.$image_trade->getClientOriginalExtension();
            $image_trade->move('public/assets/images/distributor',$file3_name);
        }
        
        if($request->hasFile('image_nid'))
        {
            $image_nid= $request->file('image_nid');
            $file4_name = uniqid().date('Ymdhms').'.'.$image_nid->getClientOriginalExtension();
            $image_nid->move('public/assets/images/distributor',$file4_name);
        }

        if($request->hasFile('image_form'))
        {
            $image_form= $request->file('image_form');
            $file5_name = uniqid().date('Ymdhms').'.'.$image_form->getClientOriginalExtension();
            $image_form->move('public/assets/images/distributor',$file5_name);
        }
        
        
        
        $distributor = Distributor::create([
           
                'distributor_name'=>$request->distributor_name,
                'proprietor_name'=>$request->proprietor_name,
                'fat_hus_name'=>$request->fat_hus_name,
                'proprietor_present_address'=>$request->proprietor_present_address,
                'proprietor_present_PO'=>$request->proprietor_present_PO,
                'proprietor_present_thana'=>$request->proprietor_present_thana,
                'proprietor_present_district'=>$request->proprietor_present_district,
                'proprietor_permanent_address'=>$request->proprietor_permanent_address,
                'proprietor_permanent_PO'=>$request->proprietor_permanent_PO,
                'proprietor_permanent_thana'=>$request->proprietor_permanent_thana,
                'proprietor_permanent_district'=>$request->proprietor_permanent_district,
                'telephone_office'=>$request->telephone_office,
                'telephone_house'=>$request->telephone_house,
                'mobile'=>$request->mobile,
                'mobileALT'=>$request->mobileALT,
                'fax'=>$request->fax,
                'zone'=>$request->zone,
                'division'=>$request->division,
                'base'=>$request->base,
                'image_distributot'=>$file1_name,
                'image_nominee'=>$file2_name,
                'image_trade'=>$file3_name,
                'image_nid'=>$file4_name,
                'image_form'=>$file5_name,
                'comment'=>$request->comment,
                'active'=> 0
            ]);
            User::create([
                'name' => $request->distributor_name,
                'contact'=> $request->mobile,
                'image' => $file1_name,
                'email' => $request->distributor_name . '@gmail.com',
                'role_id' => 7,
                'user_id' => $distributor->id,
            ]);
            
            $number = "1" .str_pad($distributor->id, 5 , '0' , STR_PAD_LEFT);

            $distributor->random_number = $number ;
            $distributor->save();

            // $client = new SendSingleTextualSms(new BasicAuthConfiguration('FirstRays','info@FRCL20'));

            // $requestBody = new SMSTextualRequest();
    
            // $requestBody->setFrom('First Rays');
            // $requestBody->setTo('+88'.$request->mobile);
            // $requestBody->setText("Use ".$number." as One Time Password to continue with www.firstrays.com.bd");
        
            // $response = $client->execute($requestBody);
    
                // dd($response);
    
            // dd($requestBody);
            $distributor->random_number = "1" .str_pad($distributor->id, 5 , '0' , STR_PAD_LEFT);
            $distributor->save();

            Toastr::success('New Distributor Added Successfully', 'Title');
            return redirect()->route('distributor.pending');

    }

    public function edit($id)
    {
        $distributors = Distributor::find($id);
        $divisions = Division::where('status' , 1)->get();
        return view('admin.layout.distributor.distributorEdit',compact('distributors' , 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $data =$request->all();
        if($request->hasFile('image_distributot'))
        {
            $image_distributot= $request->file('image_distributot');
            $file1_name = uniqid().date('Ymdhms').'.'.$image_distributot->getClientOriginalExtension();
            $image_distributot->move('public/assets/images/distributor/',$file1_name);
        }
        else
        {
            $file1_name = $data['image_distributot'];
        }

        if($request->hasFile('image_nominee'))
        {
            $image_nominee= $request->file('image_nominee');
            $file2_name = uniqid().date('Ymdhms').'.'.$image_nominee->getClientOriginalExtension();
            $image_nominee->move('public/assets/images/distributor/',$file2_name);
        }
        else
        {
            $file2_name = $data['image_nominee'];
        }

        if($request->hasFile('image_trade'))
        {
            $image_trade= $request->file('image_trade');
            $file3_name = uniqid().date('Ymdhms').'.'.$image_trade->getClientOriginalExtension();
            $image_trade->move('public/assets/images/distributor/',$file3_name);
        }
        else
        {
            $file3_name = $data['image_trade'];
        }

        if($request->hasFile('image_nid'))
        {
            $image_nid= $request->file('image_nid');
            $file4_name = uniqid().date('Ymdhms').'.'.$image_nid->getClientOriginalExtension();
            $image_nid->move('public/assets/images/distributor/',$file4_name);
        }
        else
        {
            $file4_name = $data['image_nid'];
        }

        if($request->hasFile('image_form'))
        {
            $image_form= $request->file('image_form');
            $file5_name = uniqid().date('Ymdhms').'.'.$image_form->getClientOriginalExtension();
            $image_form->move('public/assets/images/distributor/',$file5_name);
        }
        else
        {
            $file5_name = $data['image_form'];
        }

       $distributor = Distributor::where('id',$id)->update([
            'distributor_name'=>$request->distributor_name,
            'proprietor_name'=>$request->proprietor_name,
            'fat_hus_name'=>$request->fat_hus_name,
            'proprietor_present_address'=>$request->proprietor_present_address,
            'proprietor_present_PO'=>$request->proprietor_present_PO,
            'proprietor_present_thana'=>$request->proprietor_present_thana,
            'proprietor_present_district'=>$request->proprietor_present_district,
            'proprietor_permanent_address'=>$request->proprietor_permanent_address,
            'proprietor_permanent_PO'=>$request->proprietor_permanent_PO,
            'proprietor_permanent_thana'=>$request->proprietor_permanent_thana,
            'proprietor_permanent_district'=>$request->proprietor_permanent_district,
            'telephone_office'=>$request->telephone_office,
            'telephone_house'=>$request->telephone_house,
            'mobile'=>$request->mobile,
            'mobileALT'=>$request->mobileALT,
            'fax'=>$request->fax,
            'zone'=>$request->zone,
            'division'=>$request->division,
            'base'=>$request->base,
           
            'image_distributot'=>$file1_name,
            'image_nominee'=>$file2_name,
            'image_trade'=>$file3_name,
            'image_nid'=>$file4_name,
            'image_form'=>$file5_name,
            'comment'=>$request->comment,

        ]);
        
        // dd($distributor);
        return redirect()->route('distributor.list')->with('msg','Distributor Information Updated Successfully'); 
    }

    // public function delete($id)
    // {
    //     $distributor = Distributor::findOrFail($id)->first();
    //     unlink('public/assets/images/distributor/'.$distributor->image_distributot);
    //     unlink('public/assets/images/distributor/'.$distributor->image_nominee);
    //     unlink('public/assets/images/distributor/'.$distributor->image_trade);
    //     unlink('public/assets/images/distributor/'.$distributor->image_nid);
    //     unlink('public/assets/images/distributor/'.$distributor->image_form);
    //     $distributor->delete();
    //     return redirect()->route('distributor.list')->with('msg','Distributor Information Deleted Successfully');
    // }

    public function distributorPending()
    {
        $divisions = Division::all();
        $distributors = Distributor::orderBy('id' , 'DESC')->where('active',0)->get();
        return view('admin.layout.distributor.distributorPending' , compact('distributors' , 'divisions'));
    }

    /**
     * Display a listing of the districts.
     */
    public function getDistrict(Request $request)
    {

        $dropdown_to_send = "";
        $districts = District::where('division_id', $request->division_id)->get();

        foreach ($districts as $district) {
            $dropdown_to_send .= "<option value='" . $district->id . "'>" . $district->name . "</option>";
        }
        echo $dropdown_to_send;
    }

    /**
     * Display a listing of the upazila.
     */
    public function getUpazila(Request $request)
    {

        $dropdown_to_send = "";
        $upazilas = Upazila::where('district_id', $request->district_id)->get();

        foreach ($upazilas as $upazila) {
            $dropdown_to_send .= "<option value='" . $upazila->id . "'>" . $upazila->name . "</option>";
        }
        echo $dropdown_to_send;
    }


    public function distributorApprove($id)
    {
        Distributor::where('id',$id)->update([
            'active' => 1,
        ]);

        return redirect()->route('distributor.list');
    }

    public function moreInfo($id)
    {
        $distributors = Distributor::find($id);
        return view('admin.layout.distributor.distributorMoreInfo' , compact('distributors'));
    }

    public function moreInfoAdd(Request $request, $id)
    {
       
            $distributors = Distributor::find($id);
            
            $distributors = Distributor::where('id',$id)->update([
                'credit_limit' => $distributors->credit_limit + $request->credit_limit,
            ]);

            // $distributors = Distributor::where('id', $id)->first();
            //     $distributors->update([

            //         'credit_limit' => $distributors->credit_limit + $request->credit_limit,
            //     ]);

            return back();
    }

    public function dbStockReport()
    {
        $distributor_report = Distributor::where('active' , 1)->with(['order'])->get();
        $distributor_stock = Distributor::with(['order.order'])->first();
        // dd($distributor_report);
        return view('admin.layout.distributor.distributorStockReport' , compact('distributor_report' , 'distributor_stock'));
    }

    public function dbStockReportSearch(Request $request)
    {
        $search = $request->distributor_id;
        // dd($category);
        
            $distributor_stock = Distributor::where('id' , $search)->with(['order.order'])->first();
    
        // $distributor = Distributor::where('id' , $search)->get();
        // $distributor = Distributor::with(['order'])->where('distributor_id' , $search)->get();
        // dd($distributor);
        $distributor_report = Distributor::where('active' , 1)->get();
        // dd($request->date);
        // $distributors = \App\Distributor::where([ 
        //     ['id', 'LIKE', '%' . $category . '%'],
        //     ])->get();
        
        // $category = $request->distributor_id;
        // // dd($request->distributor_id);
        // if($category !=null)
        // {
        //     $orders = Order::where([ 
        //         ['distributor_id', 'LIKE', '%' . $category . '%'],
        //         ])->get();
        // }
        
        // if(empty($category) && empty($distributors)) 
        // {
        //     Session::flash('danger', "You didn't select any search.");
        //     return redirect() -> back();
        // }

            return view('admin.layout.distributor.distributorStockReport', compact('distributor_stock' , 'distributor_report'));
    }

    public function dbStockReportEdit(Request $request , $id)
    {

        $dbReport = Order::where('id',$id)->update([
            'quantity'=>$request->quantity,
        ]);

        return view('admin.layout.distributor.distributorStockReport' , compact('dbReport'));
    }

    public function OrderReportdelete($id)
    {
        $order = Order::findOrFail($id)->first();
        $order->delete();
        return redirect()->route('distributor.orderReport.delete')->with('msg','Distributor Information Deleted Successfully' ,  compact('order'));
    }

    public function distributorSinglePrint($id)
    {
        $distributor = Distributor::find($id);
        $pdf = PDF::loadView('admin.layout.distributor.distributorSinglePrint' , ['distributor'=>$distributor]);
        return $pdf->stream('distributor.pdf');
    }
    
    public function distributorDetailsInformation($id)
    {
        $divisions = Division::all();
        $distributors = Distributor::find($id);
        return view('admin.layout.distributor.distributorDetailsInformation' , compact('distributors' , 'divisions'));
    }

}
