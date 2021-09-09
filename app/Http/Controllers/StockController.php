<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function list(Request $request)
    {
        
        $search = $request->category;
        $categories = Category::where('id', $search)->orderBy('id' , 'asc')->first();
        $cats = Category::all();
        $stocks = Stock::all();
        
        $products = Product::orderBy('id' , 'asc')->get();

        return view('admin.layout.stock.stockList' ,compact('products' , 'categories' , 'stocks' , 'cats'));
    }

    public function stockAdd()
    {
        $cats = Category::all();
        return view('admin.layout.stock.stockAdd', compact('cats'));
    }

    public function update(Request $request, $id)
    {
        
        Stock::where('id',$id)->update([
            'date'=>$request->date,
            'stock'=>$request->stock,
        ]);

        return redirect()->route('stock.list')->with('msg','New Stock Information Updated Successfully'); 
    }

    public function delete($id)
    {
        Stock::find($id)->delete();
        return redirect()->route('stock.list')->with('msg','Stock Information Deleted Successfully');
    }

    // public function searchStock(Request $request)
    // {
    //     Model::where('type', $from_request)->where('category_id', $from_request )->get();
    //     $search = $request->search;
    //     $bank = Bank::where('bank_name', $search)->paginate(5);
    //     return view('backend.layouts.bank.bankview', compact('bank'));
    // }

    public function stockUpdate(Request $request )
    {
        // if(Stock::where('category_id',$request->category_id)->where('product_id',$request->product_id)->exists()){
        //     $data = Stock::where('category_id',$request->category_id)->where('product_id',$request->product_id)->first();
        //     Stock::where('category_id',$request->category_id)->where('product_id',$request->product_id)->update([
        //         'quantity' => $data->quantity+$request->quantity,
        //         'available' => $data->available+$request->available,
        //         'damage' => $data->damage+$request->damage,
        //     ]);
        // }
        $data = Stock::where('sub_category_id',$request->sub_category_id)->where('product_id',$request->product_id)->first();
        {
            foreach ($request->product_id as $key => $product) 
            {
                $stock = Stock::where('product_id', $product)->latest()->first();
                $stock->update([
                    'product_id' => $product,
                    'date' => Carbon::now(),
                    'note' => $request->note[$key],
                    'stock' => $stock->stock + $request->stock[$key],
                ]);
            }
        }
        
        return redirect()->route('stock.list')->with('msg','Stock Information Updated Successfully');
    }

   public function stockReportSearch(Request $request)
   {
    
    $search = $request->sub_category_id;
    // dd($search);
    $stocks = Stock::where('sub_category_id' , $search)->get();
    
    $cats = Category::orderBy('id' , 'asc')->get();
   
    return view ('admin.layout.stock.stockList')->with(compact('cats' , 'stocks'));
   }
}

