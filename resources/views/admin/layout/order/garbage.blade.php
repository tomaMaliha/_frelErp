@extends('admin.master')
@section('css')

<style>

.custom-control-label h6
{
   color: #854fff;
}

.danger-box{
    background-color: #ffad99;
    color: black;
}

.success-box{
    background-color:  #2ecc71;
    color: black;
}

.danger-box{
    background-color: red;
    color: black;
}
</style>

@endsection
@section('content')


    @if(Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
    @endif

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card">
                        <div class="card-inner card-inner-xl">
                            <div class="row g-gs">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <center> <label class="form-label" for="fv-topics">Account Information (in BDT) </label></center>
                                        <div class="form-control-wrap ">
                                        <!-- <form method="post" action="{{route('order.balanceHistory')}}" class="form-validate" enctype="multipart/form-data"> -->
                                            <div class="row">
                                            
                                                <table class="table table-bordered col-sm-12">
                                                @foreach($payments as $payment)

                                                @php
                                                    $credit_limit = $payment->distributor->credit_limit;
                                                    
                                                    if(App\Order::all()->count() > 0)
                                                        $order_balance = ($payment->distributor->credit_limit) - (App\Order::where('status', 1)->first()->unit_price) ;
                                                    else
                                                        $order_balance = ($payment->distributor->credit_limit);
                                                    
                                                @endphp
                                                    <tr>
                                                        <!-- Credit Limit caltulation -->
                                                        <td>
                                                        
                                                            Credit Limit: {{ $credit_limit }}
                                                            
                                                        </td>
                                                        <!-- Order balance Caltulation -->
                                                        <td>
                                                            @if(App\Order::all()->count() > 0)
                                                                Eligible Balance: {{ $order_balance }}
                                                            @else
                                                                Eligible Balance: 00.0
                                                            @endif
                                                        
                                                        </td>
                                                        <!-- Pendisng Order Balance Calculation -->
                                                        <td>
                                                        @php
                                                            if(App\Order::all()->count() > 0) {
                                                                    $pendingOrder = App\Order::where('distributor_id', $payment->distributor->id)->sum('sub_total');
                                                                    $pendingCart = App\Cart::where('distributor_id' , $payment->distributor->id)->sum('sub_total');
                                                                    $pending_order_value = ($pendingOrder + $pendingCart);
                                                
                                                            }
                                                        @endphp

                                                        @if(App\Order::all()->count() > 0)
                                                        
                                                            Hold: {{ $pending_order_value }}
                                                        
                                                        @else
                                                        
                                                            Hold value: 0.00
                                                        
                                                        @endif
                                                           
                                                            
                                                        </td>
                                                        <!-- Current Order Balance Calcultaion -->
                                                        <td class="current_order">
                                                            @php
                                                                $unit_price = 0;
                                                            @endphp
                                                            @if(App\Cart::all()->count() > 0)
                                                               
                                                                @foreach(App\Cart::all() as $cart)
                                                                @php
                                                                    $unit_price = $unit_price + $cart->unit_price;
                                                                @endphp
                                                                    
                                                                @endforeach
                                                                Cart Amount: {{ $unit_price }}
                                                            @else
                                                                Cart Amount: 00.0
                                                            @endif
                                                            
                                                        </td>
                                                        <!-- Remaining Balance -->
                                                        <td>
                                                        @if(App\Order::all()->count() > 0)
                                                            Balance: {{ $balance = ($payment->distributor->credit_limit) - (App\Order::where('status', 1)->first()->sub_total) - ($payment->distributor->credit_limit) }}
                                                        @else
                                                            Balance: 00.0
                                                        @endif
                                                        
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                       
                                                        @if(App\Cart::all()->count() > 0)
                                                            
                                                            @if( (App\Cart::where('status', 0)->first()->unit_price) < (($payment->distributor->credit_limit) - ($unit_price)) )
                                                                <td class="success-box amount_money" colspan="5" id="amount_money" ><center><b>WithIn Limit. You Can Still Order. Remianing Amount: 
                                                                
                                                                <span id="amount_money"> 
                                                                    {{ $amount = ($payment->distributor->credit_limit) - ($unit_price) }}
                                                                </span></b> </center></td>
                                                            @else
                                                                <td class="danger-box amount_money" colspan="5" id="amount_money" ><center><b>WithIn Limit. You Can Still Order. Remianing Amount: 
                                                                
                                                                <span id="amount_money"> 
                                                                    {{ $amount = ($payment->distributor->credit_limit) }}
                                                                </span></b> </center></td>
                                                            @endif

                                                        @else
                                                            <td class="success-box amount_money" colspan="5" id="amount_money" ><center><b>WithIn Limit. You Can Still Order. Remianing Amount: 
                                                                
                                                            <span id="amount_money"> 
                                                                {{ $amount = ($payment->distributor->credit_limit) }}
                                                            </span></b> </center></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5"><center><b>Order Request Form</b></center></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Customer Name: <b>{{$payment->distributor->distributor_name}} [{{ $payment->distributor->id }}]</b> </td>
                                                        <td>Distributor Code: <b>{{ $payment->distributor->random_number }}</b></td>
                                                        <td colspan="3">Order Date: <b>{{ Carbon\Carbon::now()->format('Y-m-d')}}</b></td>
                                                    </tr>
                                                    @php
                                                        $distributor_id = $payment->distributor_id;
                                                    @endphp
                                                    @endforeach
                                                </table>
                                            </div>
                                        </form>
                                        </div>
                                        <form method="post" action="{{route('order.category' , $distributor_id)}}" class="form-validate" enctype="multipart/form-data">
                                        @csrf
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-topics">Category</label>
                                                    <div class="form-control-wrap ">
                                                        <select id="categoryName" name="sub_category_id" data-placeholder="Select a option" required>
                                                        @foreach($cats as $category)
                                                        @if($category->sub_category != 0)
                                                            <option value="{{$category->id}}">{{$category->name}} </option>
                                                        @endif
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-topics">Search</label>
                                                    <div class="form-control-wrap ">
                                                        <button type="submit" class="btn btn-success"> Search  </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <form action="{{route('order.create' , $distributor_id)}}"  method="POST">
                                    @csrf
                                    <div class="row">
                                    @if(isset($categories))
                                        <table class="table table-bordered col-sm-12" id="dynamicTable">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Group</th>
                                                    <th>Product</th>
                                                    <th>(Stock-Order)=Available Stock</th>
                                                    <th>Order Qty</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <input type="hidden" name="credit_limit" value="{{$credit_limit}}">
                                            <input type="hidden" name="order_balance" value="{{ $order_balance }}">
                                            
                                            <input type="hidden" name="currnet_order" value="{{ $unit_price }}">

                                                @if(isset($categories))
                                                @foreach($categories->products as $key => $product)
                                                <input type="hidden" name="product_id[]" value="{{ $product->id }}" class="form-conrtol">
                                                <input type="hidden" name="sub_category_id" value="{{ $categories->id }}" class="form-conrtol">
                                                <tr>
                                                    <td>
                                                        {{$key+1}}
                                                    </td>
                                                    <td>
                                                        {{$categories->name}}
                                                    </td>
                                                    <td>
                                                        {{$product->name}}
                                                    </td>
                                                    @if(($product->stock->stock)<=5)
                                                    <td class="danger-box">
                                                    @else
                                                    <td>
                                                    @endif
                                                        ({{ $product->stock->stock }} - Order) = Available Stock
                                                        <input type="hidden" id="distributor_price" name="distributor_price" class="distributor_price"  value="{{$product->distributor_price}}">
                                                    </td>
                                                    <td>
                                                    @if($product->stock->stock < 5)
                                                        <input type="text" id="quantity" name="quantity[]" class="form-control quantity" readonly placeholder="Insufficient Quantity">
                                                    @else
                                                        <input type="text" id="quantity" name="quantity[]" class="form-control quantity" value="0">
                                                    @endif
                                                    </td>
                                                    <td>
                                                    @if($product->stock->stock < 5)
                                                        <input type="text" id="sub_total" name="sub_total[]" class="form-control sub_total"  readonly placeholder="Insufficient Quantity">
                                                    @else
                                                        <input type="text" id="sub_total" name="sub_total[]" class="form-control sub_total"  value="0">
                                                    @endif
                                                    </td>
                                                    
                                                    <input type="hidden" name="distributor_id" value="{{$distributor_id}}">
                                                    <input type="hidden" name="date" value="{{ Carbon\Carbon::now()->format('Y-m-d')}}">
                                                </tr>
                                                
                                                @endforeach
                                                <tr>
                                                    <td colspan="5">Total</td>
                                                    <td><input type="text" id="unit_price" name="unit_price" class="form-control unit_price"  value="0" readonly required autofocus></td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                                </div>
                            </div>
                            @if($carts->count() > 0)
                            <div class="col-md-12">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Goods In Your Bucket <em class="icon ni ni-cart"></em><sup><span class="badge badge-danger">{{ App\Cart::all()->count()}}</span></sup></h4>
                                        
                                    </div>
                                </div>
                                <div class="card card-preview">
                                        <table class="table table-tranx">
                                            <thead>
                                                <tr class="tb-tnx-head">
                                                    <th class="tb-tnx-id"><span class="">SL</span></th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Category</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Customer</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Product Name</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Order Qty</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Total</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <center><span>Edit Qty</span><center>
                                                        </span>
                                                    </th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                    $piece = 0;
                                                @endphp
                                            @foreach($carts as $key => $product)
                                                <tr class="tb-tnx-item">
                                                    <td class="tb-tnx-id">
                                                        <a href="#">
                                                            <span>
                                                                {{ $key+1 }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    
                                                    <td class="tb-tnx-id">
                                                        <a href="#">
                                                            <span>
                                                                {{ $product->category->name }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td class="tb-tnx-id">
                                                        <a href="#">
                                                            <span>
                                                                {{ $product->distributor->distributor_name }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td class="tb-tnx-id">
                                                        <a href="#">
                                                            <span>
                                                                {{ $product->product->name }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td class="tb-tnx-id">
                                                        <a href="#">
                                                            <span>
                                                                {{ $product->quantity }} Pcs
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td class="tb-tnx-id">
                                                        <a href="#">
                                                            <span>
                                                                {{ $product->sub_total }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    @php
                                                        $total = $total +$product->sub_total;
                                                        $piece = $piece +$product->quantity;
                                                    @endphp
                                                    <td class="tb-tnx-id">
                                                        <a href="#">
                                                        <center><span>
                                                            <a href="#UpdateModal{{$product->id}}" data-toggle="modal"><em class="icon ni ni-edit"></em><span></span></a>

                                                            </a>
                                                            </span></center>
                                                        </a>
                                                    </td>
                                                    <input type="hidden" name="distributor_id" value="{{$distributor_id}}">
                                                </tr>
                                            <!-- Update Modal -->
                                                <div class="modal fade" tabindex="-1" id="UpdateModal{{$product->id}}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Update Order</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="{{route('order.update', $product->id)}}" class="form-validate is-alter">
                                                                    @csrf
                                                                    <input type="hidden" name="distributor_id" value="{{$distributor_id}}">
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="full-name">Category</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="full-name" name="sub_category_id" value="{{$product->category->name}}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="full-name">Product</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="full-name" name="product_id" value="{{$product->product->name}}" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label" for="full-name">Quantity</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control quantity" id="full-name" name="quantity" value="{{$product->quantity}}" required>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-lg btn-primary">Update Cart</button>
                                                                        <a href="{{route('order.delete' , $product->id)}}" class="btn btn-lg btn-danger">Delete</a>
                                                                    </div>
                                                                
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer bg-light">
                                                                <span class="sub-text"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Update modal End -->
                                            
                                                @endforeach
                                            
                                                <tr>
                                                    <td class="tb-tnx-id" colspan="4">
                                                        <a href="#">
                                                            <span>
                                                                Grand Total
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td class="tb-tnx-id" colspan="1">
                                                        <a href="#">
                                                            <span>
                                                                {{ $piece }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td class="tb-tnx-id" >
                                                        <a href="#">
                                                            <span>
                                                            {{ $total }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="tb-tnx-id" colspan="7">
                                                        <a href="#">
                                                            <span>
                                                                <a href="{{route('order.place' , $distributor_id )}}" class="btn btn-danger">Add</a>
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div><!-- .card -->
                            </div><!-- nk-block -->
                            @endif
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@section('js')


<script type="text/javascript">

    $("#categoryName").select2({
    });

    //Calculation
    $('tbody').delegate('.distributor_price , .quantity , .amount , .amount_money,  .unit_price' , 'keyup' ,  function()
    {
        //cart bill caltulation
        var tr = $(this).parent().parent();
        var price = tr.find('.distributor_price').val();
        var quantity = tr.find('.quantity').val();
        var sub_total = (price*quantity);
        // var total = total + tr.find('.sub_total').val(sub_total);
        
        tr.find('.sub_total').val(sub_total);
        
        // Amount Calculation
        var amount = tr.find('amount_money').val();
        console.log('am: '.amount);
        var unit_price = tr.find('.unit_price').val();
        var value = (amount-unit_price);
        tr.find('.amount_money').val(value);

        // Piece calculation
        // var value = 0;
        // var piece = tr.find('.quantity').val();
        // var unit_price = tr.find('.unit_price').val();
        // var value = (amount-unit_price);
        // tr.find('.amount').val(value);

        current();

        total();
    });
    function total()
    {
        var total = 0;
        $('.sub_total').each(function(i,e)
        {
            var sub_total = $(this).val()-0;
            total += sub_total;
        });
        $('.unit_price').val(total);
    }

    function current()
    {
        var current = 0;
        $('.currnet_order').each(function(i,e)
        {
            var unit_price = $(this).val()-0;
            current -= unit_price;
        });
        $('.currnet_order').val(current);
    }

</script>
@endsection

@endsection
