<?php

namespace App\Http\Controllers;


use App\Brand;
use App\Stock;
use Throwable;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function productList()
    {
        $brands = Brand::all();
        $categories  = Category::all();
        $products = Product::with('category')->orderBy('id' , 'DESC')->get();

        return view('admin.layout.product.productList', compact('products', 'categories' , 'brands'));
    }

    public function productSearch(Request $request)
    {
        $from = Carbon::parse($request->from)->startOfDay()->toDateTimeString();
        $to = Carbon::parse($request->to)->endOfDay()->toDateTimeString(); 
        
        $products = Product::where('sub_category_id', $request->sub_category_id)
                            ->orWhere('id', $request->product_id)
                            ->get();
                            // dd($product_list);

        // $products = Product::with('category')->orderBy('id' , 'DESC')->get();

        $categories = Category::all();
        
        return view('admin.layout.product.productList' , compact('products' , 'categories' ));
    }

    public function productAdd()
    {
        $brands = Brand::all();
        $sub_categories  = Category::where('status' , 1)->get();
        return view('admin.layout.product.productAdd', compact('brands' , 'sub_categories'));
    }

    public function create(Request $request)
    {
        $file_name = null;
        if($request->hasFile('image'))
        {
            $product_image= $request->file('image');
            $file_name = uniqid().date('Ymdhms').'.'.$product_image->getClientOriginalExtension();
            $product_image->move('public/assets/images/product/',$file_name);
        }

       $get_parent = Category::with('parent')->find($request->sub_category_id);
    //    dd($get_parent->parent);
        if($get_parent->parent->name == "Fan")
        {

        $checkExist = Product::where('category_id',$get_parent->parent->id)->orderBy('id','desc')->first();
           
        if(!empty($checkExist))
            {
                $new_product_id = $checkExist->unique_id+1;
            }else
            {
                $new_product_id = 3000;
            }
            
        }
        else if($get_parent->parent->name == "Light")
        {
            $checkExist = Product::where('category_id',$get_parent->parent->id)->orderBy('id','desc')->first();
           
            if(!empty($checkExist))
                {
                    $new_product_id=$checkExist->unique_id+1;
                }else
                {
                    $new_product_id=1000;
                }
                
        }
        else
        {
            $checkExist = Product::where('category_id',$get_parent->parent->id)->orderBy('id','desc')->first();
            if($checkExist)
            {
                $new_product_id=$checkExist->unique_id+1;
            }else
            {
                $new_product_id=3000;
            }
        }

   

        DB::beginTransaction();
        try{
            // DB::statement('ALTER TABLE products AUTO_INCREMENT = 1300;');

            $user_id = Auth::id();

            $new_product = Product::create([
                'name'=>$request->name,
                'sub_category_id'=>$request->sub_category_id,
                'category_id'=>$get_parent->parent->id,
                'brand_id'=>$request->brand_id,
                'distributor_price'=>$request->distributor_price,
                'trade_price'=>$request->trade_price,
                'corporate_price'=>$request->corporate_price,
                'bar_code'=>$request->bar_code,
                'product_code'=>$request->product_code,
                'image'=>$file_name,
                'description'=>$request->description,
                'unique_id'=>$new_product_id,
                'user_id' => $user_id,
                
            ]);
            
            Stock::create([
                'product_id' => $new_product->id,
                'sub_category_id' =>$request->sub_category_id,
                'opening' => 0,
                'stock' => 0,
                'alert_quantity'=>$request->alert_quantity,
            ]);
            
            // dd($user_id);
            
            DB::commit();
            Toastr::success('Product Information Added Successfully', 'Title');
            return redirect()->route('product.list');

        }catch(Throwable $ex){ 
            
            DB::rollBack();
           
            Toastr::error('Error', 'Title', [ "positionClass"=> "toast-bottom-right" , "closeButton"=> true, "progressBar"=> true,]);
            return redirect()->back();  
        }

    }

    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $sub_categories  = Category::all();
        return view('admin.layout.product.productEdit',compact('product','sub_categories' , 'brands'));
    }

    public function update(Request $request, $id)
    {
        $data =$request->all();
        if($request->hasFile('image'))
        {
            $product_image= $request->file('image');
            $file_name = uniqid().date('Ymdhms').'.'.$product_image->getClientOriginalExtension();
            $product_image->move('public/assets/images/product/',$file_name);
        }
        else
        {
            $file_name = $data['image'];
        }
        
        Product::where('id',$id)->update([
            'name'=>$request->name,
            'sub_category_id'=>$request->sub_category_id,
            'brand_id'=>$request->brand_id,
            'distributor_price'=>$request->distributor_price,
            'trade_price'=>$request->trade_price,
            'corporate_price'=>$request->corporate_price,
            'bar_code'=>$request->bar_code,
            'product_code'=>$request->product_code,
            'image'=>$file_name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()->route('product.list')->with('msg','Product Information Updated Successfully'); 
    }

    // public function delete($id)
    // {
    //     $product = Product::find($id)->first();
        
    //     $products = Product::where('sub_category_id', $id)->count();
    //     if($products > 0){
    //      return Redirect::to('admin.layout.product.productList')
    //             ->with('message', 'Something went wrong');
    //     }
    //     else{
    //     $category= Category::find($id);
    //     $category->delete();
    //     return Redirect::to('admin.layout.product.productList')
    //                 ->with('message', 'Category Deleted');
    //     }

    //     if(file_exists('public/assets/images/product/'.$product->image) AND !empty($product->image)){ 
    //         unlink('public/assets/images/product/'.$product->image);
    //      } 
        
    //     $product ->delete();
    //     return redirect()->route('product.list')->with('msg','Product Information Deleted Successfully');
    // }

    public function product_details($id)
    {
        $products = Product::where('id', $id)->with(['stock'])->first();

        return view('admin.layout.product.productDetails' , compact('products'));
    }

    public function productActive($id)
    {
        $products= Product::find($id);
   		if($products->status==1)
   		{
   			$products->status = 0;
   			$products->save();
   		}
   		else
   		{
   			$products->status = 1;
   			$products->save();
   		}
   		return redirect()->back();
    }

}
