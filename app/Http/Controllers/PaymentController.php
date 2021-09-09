<?php

namespace App\Http\Controllers;

use Auth;
use App\Bank;
use App\Order;
use Throwable;
use App\Payment;
use Carbon\Carbon;
use App\Distributor;
use App\TransactionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
// use Illuminate\Support\Facades\Auth;
use infobip\api\client\SendSingleTextualSms;
use Devfaysal\BangladeshGeocode\Models\Division;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\textual\SMSTextualRequest;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function add()
    {
        // $distributors = Distributor::where('active' , 1)->with('distributor')->get();
        $banks = Bank::where('status' , 1)->get();
        $distributors = Distributor::where('active' , 1)->get();
        return view('admin.layout.payment.paymentAdd' , compact('banks' , 'distributors'));
    }

    public function create(Request $request)
    {
        // 'date' => 'required | date | after:today',
        $file_name = null;

        //image
        if($request->hasFile('attachment'))
        {
            $attachment= $request->file('attachment');
            $file_name = uniqid().date('Ymdhms').'.'.$attachment->getClientOriginalExtension();
            $attachment->move('public/assets/images/payment',$file_name);
        }

        //Transaction 
        if($request->payment_method == "Cash")
        {
            $new_transaction_id = 'Cash' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else if($request->payment_method == "Online Cash"){
            $new_transaction_id = 'online_cash_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else if($request->payment_method == "Cheque"){
            $new_transaction_id = 'cheque_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else{
            $new_transaction_id = 'others_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        

            if(Payment::where('distributor_id',$request->distributor_id)->exists())
                {
                    $data = Payment::where('distributor_id',$request->distributor_id)
                                    ->first();
                    Payment::where('distributor_id',$request->distributor_id)
                            ->update([
                        'amount' => $data->amount+$request->amount,
                    ]);

                    if(Distributor::where('id',$request->distributor_id)->exists())
                    {
                        $data = Distributor::where('id',$request->distributor_id)
                                    ->first();
                            Distributor::where('id',$request->distributor_id)
                            ->update([
                        'distributor_payment' => $data->distributor_payment+$request->amount,
                        ]);
                    }
                    TransactionHistory::create([
                        'distributor_id'=>$request->distributor_id,
                        'date'=>$request->date,
                        'bank_name'=>$request->bank_name,
                        'payment_method'=>$request->payment_method,
                        'transaction_id'=>$new_transaction_id,
                        'ref_no'=>$request->ref_no,
                        'amount'=>$request->amount,
                        'attachment'=>$file_name,
                        'remarks'=>$request->remarks,
                        'division'=>$request->division,
                        'zone'=>$request->zone,
                        'base'=>$request->base,
                        'mobile'=>$request->mobile,
                        'user_id'=>auth()->user()->id
                        ]);
                        
                }

            else{
           
                $create_payment = Payment::create([
                        'distributor_id'=>$request->distributor_id,
                        'date'=>$request->date,
                        'bank_name'=>$request->bank_name,
                        'payment_method'=>$request->payment_method,
                        'transaction_id'=>$new_transaction_id,
                        'ref_no'=>$request->ref_no,
                        'amount'=>$request->amount,
                        'attachment'=>$file_name,
                        'remarks'=>$request->remarks,
                        'division'=>$request->division,
                        'zone'=>$request->zone,
                        'base'=>$request->base,
                        'mobile'=>$request->mobile,
                        'user_id'=>auth()->user()->id
                    ]);

                    TransactionHistory::create([
                        'distributor_id'=>$request->distributor_id,
                        'date'=>$request->date,
                        'bank_name'=>$request->bank_name,
                        'payment_method'=>$request->payment_method,
                        'transaction_id'=>$new_transaction_id,
                        'ref_no'=>$request->ref_no,
                        'amount'=>$request->amount,
                        'attachment'=>$file_name,
                        'remarks'=>$request->remarks,
                        'division'=>$request->division,
                        'zone'=>$request->zone,
                        'base'=>$request->base,
                        'mobile'=>$request->mobile,
                        'user_id'=>auth()->user()->id
                        ]);

                    if(Distributor::where('id',$request->distributor_id)->exists())
                    {
                        $data = Distributor::where('id',$request->distributor_id)
                                    ->first();
                            Distributor::where('id',$request->distributor_id)
                            ->update([
                        'distributor_payment' => $data->distributor_payment+$request->amount,
                        ]);
                    }
                
                }   
            // $client = new SendSingleTextualSms(new BasicAuthConfiguration('FirstRays','info@FRCL20'));

            // $requestBody = new SMSTextualRequest();
    
            // $requestBody->setFrom('First Rays');
            // $requestBody->setTo('+88'.$request->mobile);
            // $requestBody->setText("Use as One Time Password to continue with www.firstrays.com.bd");
        
            // $response = $client->execute($requestBody);
    
            //     dd($response);
    
            // dd($requestBody);


             return redirect()->route('payment.details');
   

    }

    public function edit($id)
    {
        $distributors = Distributor::all();
        $payments = Payment::find($id);
        return view('admin.layout.payment.paymentEdit' , compact('payments' , 'distributors'));
    }

    public function update(Request $request , $id)
    {
        $data =$request->all();
        if($request->hasFile('attachment'))
        {
            $attachment= $request->file('attachment');
            $file_name = uniqid().date('Ymdhms').'.'.$attachment->getClientOriginalExtension();
            $attachment->move('public/assets/images/payment',$file_name);
        }
        else
        {
            $file_name = $data['attachment'];
        }

        if($request->payment_method == "Cash")
        {
            $new_transaction_id = 'Cash' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else if($request->payment_method == "Online Cash"){
            $new_transaction_id = 'online_cash_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else if($request->payment_method == "Cheque"){
            $new_transaction_id = 'cheque_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else{
            $new_transaction_id = 'others_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        

        if(Payment::where('distributor_id',$request->distributor_id)
                    ->exists())
                    {
                    $data = Payment::where('distributor_id',$request->distributor_id)
                                    ->first();
                    Payment::where('distributor_id',$request->distributor_id)
                            ->update([
                        'amount' => $data->amount+$request->amount,
                    ]);
            
        }

        Payment::where('id',$id)->update([
                        'distributor_id'=>$request->distributor_id,
                        'date'=>$request->date,
                        'bank_name'=>$request->bank_name,
                        'payment_method'=>$request->payment_method,
                        'transaction_id'=>$new_transaction_id,
                        'ref_no'=>$request->ref_no,
                        'amount'=>$request->amount,
                        'attachment'=>$file_name,
                        'remarks'=>$request->remarks,
                        'division'=>$request->division,
                        'zone'=>$request->zone,
                        'base'=>$request->base,
                        'mobile'=>$request->mobile,
                        'user_id'=>auth()->user()->id
            ]);

            TransactionHistory::where('id',$id)->update([
                'distributor_id'=>$request->distributor_id,
                'date'=>$request->date,
                'bank_name'=>$request->bank_name,
                'payment_method'=>$request->payment_method,
                'transaction_id'=>$new_transaction_id,
                'ref_no'=>$request->ref_no,
                'amount'=>$request->amount,
                'attachment'=>$file_name,
                'remarks'=>$request->remarks,
                'division'=>$request->division,
                'zone'=>$request->zone,
                'base'=>$request->base,
                'mobile'=>$request->mobile,
                'user_id'=>auth()->user()->id
                ]);


        return redirect()->route('payment.details')->with('msg','Payment Information Updated Successfully'); 
    }

    public function orderValidation()
    {
        return view('admin.layout.payment.orderValidation');
    }

    public function paymentDetails()
    {
        // $payments = Payment::all();
        $divisions = Division::all();
        $distributors = Distributor::where('active' , 1)->get();
        $pay = Payment::where('id' , 'ASC')->get()->groupBy('division');
        // dd($pay);
        return view('admin.layout.payment.paymentDetails' , compact('divisions' , 'distributors' , 'pay'));
    }

    public function productDetailsSearch(Request $request)
    {
        $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString();
        $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString();
        // dd($from);
        $payments = Payment::whereBetween('created_at', [$from, $to])
                            ->orWhere('division' , $request->division)
                            ->get();

        $divisions = Division::all();
        $distributors = Distributor::where('active' , 1)->get();
        $pay = Payment::all();
        // dd($payments);
        return view('admin.layout.payment.paymentDetails' , compact('payments' , 'divisions' , 'distributors' , 'pay'));
    }

    public function customerStatement()
    {
        return view('admin.layout.payment.customerStatement' );
    }

    public function searchCustomer(Request $request)
    {
        $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString();
        $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString();
        // Model::where('table_attribute', $from_request )->where('table_attribute', $from_request )->where('table_attribute', $from_request )->->get()
        $payments = Payment::whereBetween('created_at', [$from, $to])->get();
        return view('admin.layout.payment.customerStatement' , compact('payments'));
    }

    public function customerPaymentInfo()
    {
        $payments = Payment::with(['transaction_history'])->get();
        return view('admin.layout.payment.customerStatement' , compact('payments' ));
    }

    public function addBackDate()
    {
        return view('admin.layout.payment.addBackDate');
    }

    public function createBackDate(Request $request)
    {
        $request->validate([
            'date' => 'required|before:today',
        ]);

        
        $file_name = null;
        if($request->hasFile('attachment'))
        {
            $attachment= $request->file('attachment');
            $file_name = uniqid().date('Ymdhms').'.'.$attachment->getClientOriginalExtension();
            $attachment->move('public/assets/images/payment',$file_name);
        }

        if($request->payment_method == "Bkash")
        {
            $new_transaction_id = 'bkash_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else if($request->payment_method == "Cash"){
            $new_transaction_id = 'cash_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        else{
            $new_transaction_id = 'cheque_' . "." . date('Ymd') . "." . $request->distributor_id . ".". $request->transaction_id;
        }
        if(Payment::where('distributor_id',$request->distributor_id)->where('deposite_account',$request->deposite_account)->exists()){
            $data = Payment::where('distributor_id',$request->distributor_id)->where('deposite_account',$request->deposite_account)->first();
            Payment::where('distributor_id',$request->distributor_id)->where('deposite_account',$request->deposite_account)->update([
                'amount' => $data->amount+$request->amount,
            ]);
            
        }
        else{
            DB::beginTransaction();
            try{
                $create_payment = Payment::create([
                        'distributor_id'=>$request->distributor_id,
                        'date'=>$request->date,
                        'deposite_account'=>$request->deposite_account,
                        'bank_name'=>$request->bank_name,
                        'payment_method'=>$request->payment_method,
                        'transaction_id'=>$new_transaction_id,
                        'ref_no'=>$request->ref_no,
                        'amount'=>$request->amount,
                        'attachment'=>$file_name,
                        'remarks'=>$request->remarks,
                    ]);

                    TransactionHistory::create([
                        'distributor_id'=>$create_payment->id,
                        'date'=>$request->date,
                        'deposite_account'=>$request->deposite_account,
                        'bank_name'=>$request->bank_name,
                        'payment_method'=>$request->payment_method,
                        'transaction_id'=>$new_transaction_id,
                        'ref_no'=>$request->ref_no,
                        'amount'=>$request->amount,
                        'attachment'=>$file_name,
                        'remarks'=>$request->remarks,
                        ]);
            
                        DB::commit();
                        Toastr::success('Payment Information Added Successfully', 'Title');
                        return redirect()->route('payment.add');
            
                    }catch(Throwable $ex){ 
                        
                        DB::rollBack();
                        dd($ex->getMessage());
                       
                        Toastr::error('Error', 'Title', [ "positionClass"=> "toast-bottom-right" , "closeButton"=> true, "progressBar"=> true,]);
                        return redirect()->back();   
            
                    }
      }
        return redirect()->back()->with('msg','Payment Added Successfully'); 
    }

    public function distributorCommisionBalance()
    {
        $distrbutors = Payment::all();
        return view('admin.layout.distributor.distributorCommissionBalance' , compact('distrbutors'));
    }

    public function transaction_show()
    {
        $transaction_history = Payment::all();
        return view('admin.layout.payment.transaction_history' , compact('transaction_history'));
    }

    public function transaction_details($id)
    {
        // $campaign_product = CampaignProduct::with(['tag.products'])->where('campaign_id', $id)->first();
        $transaction = TransactionHistory::with(['payment'])->where('distributor_id' , $id)->first();
        dd($transaction);
        $transaction_details = Payment::where('distributor_id' , $transaction->distributor_id)->get();
        dd($transaction_details);
        return view('admin.layout.payment.transaction_details' , compact('transaction_details'));
    }

}
