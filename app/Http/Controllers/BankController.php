<?php

namespace App\Http\Controllers;

use App\Bank;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function list()
    {
        $banks = Bank::all();
        return view('admin.layout.bank.bankList' ,  compact('banks'));
    }

    public function create(Request $request)
    {
        $file_name = null;

        if($request->hasFile('logo'))
        {
            $bank_image= $request->file('logo');
            $file_name = uniqid().date('Ymdhms').'.'.$bank_image->getClientOriginalExtension();
            $bank_image->move('public/assets/images/bank/',$file_name);
        }

        DB::beginTransaction();
        try{
            $create_bank = Bank::updateOrCreate([
                'name'=>$request->name,
                'account_number'=>$request->account_number,
                'concerned_person'=>$request->concerned_person,
                'contact'=>$request->contact,
                'logo'=>$file_name,
                'address'=>$request->address,
            ]);

		DB::commit();

		Toastr::success('Bank information Added Successfully', 'Title');
		return redirect()->route('bank.list');

		}
		catch(Throwable $ex){ 
			
			DB::rollBack();
			// dd($ex->getMessage());
			
			Toastr::error('Error - Something is Wrong', 'Title', [ "positionClass"=> "toast-bottom-right" , "closeButton"=> true, "progressBar"=> true,]);
			return redirect()->back();
		}
    }

    public function update(Request $request , $id)
    {
        $data =$request->all();

        if($request->hasFile('logo'))
        {
            $image= $request->file('logo');
            $file_name = uniqid().date('Ymdhms').'.'.$image->getClientOriginalExtension();
            $image->move('public/assets/images/bank/',$file_name);
        }
        else
        {
            $file_name = $data['logo'];
        }

        Bank::where('id',$id)->update([
			'name'=>$request->name,
            'account_number'=>$request->account_number,
            'concerned_person'=>$request->concerned_person,
            'contact'=>$request->contact,
            'logo'=>$file_name,
            'address'=>$request->address,
        ]);
        
        Toastr::success('Bank information Updated Successfully', 'Title');
		return redirect()->route('bank.list');
    }

    public function bankActive($id)
    {
        $banks = Bank::find($id);

        if($banks->status==1)
   		{
   			$banks->status = 0;
   			$banks->save();
   		}
   		else
   		{
   			$banks->status = 1;
   			$banks->save();
   		}
   		return redirect()->back();
    }
}
