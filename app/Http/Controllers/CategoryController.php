<?php

namespace App\Http\Controllers;

use Throwable;
use App\Category;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index()
	{
		$categories = Category::orderBy('id' , 'DESC')->get();
		return view('admin.layout.category.categoryList',compact('categories'));
	}

	public function create(Request $request)
    {
		DB::beginTransaction();
        try{
      	Category::updateOrCreate([
			'name'=>$request->name,
			'sub_category'=>$request->sub_category,
            'description'=>$request->description,
		]);

		DB::commit();

		Toastr::success('Category Added Successfully', 'Title');
		return redirect()->route('category.list');

		}
		catch(Throwable $ex){ 
			
			DB::rollBack();
			// dd($ex->getMessage());
			
			Toastr::error('Error - Something is Wrong', 'Title', [ "positionClass"=> "toast-bottom-right" , "closeButton"=> true, "progressBar"=> true,]);
			return redirect()->back();
		}
		
	}

    public function categoryActive($id)
   	{
   		$categories= Category::find($id);
   		if($categories->status==1)
   		{
   			$categories->status = 0;
   			$categories->save();
   		}
   		else
   		{
   			$categories->status = 1;
   			$categories->save();
   		}
   		return redirect()->back();
	}
	   
	public function update(Request $request , $id)
	{
		Category::where('id',$id)->update([
			'name'=>$request->name,
			'sub_category'=>$request->sub_category,
			'description'=>$request->description,
		]);
		return redirect()->route('category.list')->with('msg','Category Updated Successfully');
	}

	// public function delete($id)
	// {
	// 	Category::find($id)->delete();
    //     return redirect()->route('category.list')->with('msg','Category Deleted Successfully');
	// }

	// public function search(Request $request)
	// {
	// 	$categories = Category::search($query)
    //         ->with('products')
	// 		->get();
	// 	dd($categories);
	// }

	public function search(Request $request)
	{
		$search = $request->sub_category_id;
		$categories = Category::with('products')->where('id', $search)->first();
		// return $categories[0]->products[0]->stock;
		$cats = Category::all();
		// dd($cats);
		return view('admin.layout.stock.stockAdd', compact('categories', 'cats'));
		// dd($categories);
	}
	
	public function categorySinglePrint($id)
	{
		$categories = Category::find($id);
		$pdf = PDF::loadView('admin.layout.category.categorySinglePrint' , ['categories'=>$categories]);
        return $pdf->stream('categories.pdf');
	}
}
