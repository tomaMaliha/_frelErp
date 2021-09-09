<?php

namespace App\Http\Controllers;

use App\Brand;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Barryvdh\DomPDF\Facade as PDF;



class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brandList()
    {
        $brands = Brand::all();
        return view('admin.layout.brand.brandList',compact('brands'));
    }

    public function create(Request $request)
    {
        $file_name = null;
        if($request->hasFile('image'))
        {
            $brand_image= $request->file('image');
            $file_name = uniqid().date('Ymdhms').'.'.$brand_image->getClientOriginalExtension();
            $brand_image->move('public/assets/images/brand',$file_name);
        }

        DB::beginTransaction();
        try{

            $create_brand = Brand::updateOrCreate([
                'name'=>$request->name,
                'image'=>$file_name,
            ]);

            DB::commit();

                Toastr::success('Brand Information Added Successfully', 'Title');
                return redirect()->route('brand.list');

            }
            catch(Throwable $ex)
            { 
                
                DB::rollBack();
                // dd($ex->getMessage());
                
                Toastr::error('Error - Something is Wrong', 'Title', [ "positionClass"=> "toast-top-right" , "closeButton"=> true, "progressBar"=> true,]);
                return redirect()->back();
            }
      }

    public function update(Request $request,$id)
    {
        $data = $request->all();;
        if($request->hasFile('image'))
        {
            $brand_image= $request->file('image');
            $file_name = uniqid().date('Ymdhms').'.'.$brand_image->getClientOriginalExtension();
            $brand_image->move('public/assets/images/brand/',$file_name);
        }
        else
        {
            $file_name = $data['image'];
        }

        Brand::where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$file_name,
        ]);

        return redirect()->route('brand.list')->with('msg','Brand Updated Successfully'); 
    }

    public function brandSinglePrint($id)
    {
        $brands= Brand::find($id);
        $pdf = PDF::loadView('admin.layout.brand.brandSinglePrint' , ['brands'=>$brands]);
        return $pdf->stream('brands.pdf');
    }

    public function status($id)
    {
        $brand= Brand::find($id);
        if($brand->status==1)
        {
            $brand->status = 0;
            $brand->save();
        }
        else
        {
            $brand->status = 1;
            $brand->save();
        }
        
        return redirect()->back();
    }

    public function delete($id)
    {
        Brand::find($id)->delete();
        return redirect()->route('brand.list')->with('msg','Brand Deleted Successfully');
    }
}
