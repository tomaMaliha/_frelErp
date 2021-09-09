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
                                                    
                                                    $balance = ($payment->distributor->credit_limit) - (optional(App\Order::where('status', 0)->first())->sub_total) - ($payment->distributor->credit_limit);

                                                    if(App\Order::all()->count() > 0)
                                                        $order_balance = ($payment->distributor->credit_limit) - (optional(App\Order::where('status', 0)->first())->total) ;
                                                    else
                                                        $order_balance = ($payment->distributor->credit_limit);   

                                                        $total_amount = 0;
                                                @endphp
                                                    <tr>
                                                        <!-- Credit Limit caltulation -->
                                                        <td>
                                                        
                                                            Credit Limit: {{ $credit_limit }}
                                                            
                                                        </td>
                                                        <!-- Eligible balance Caltulation -->
                                                        <td>
                                                        @php
                                                            if(App\Order::all()->count() > 0) {

                                                                    $pendingOrder = App\Cart::where('distributor_id', $payment->distributor->id)->sum('sub_total');
                                                                    $pendingCart = App\Cart::where('distributor_id' , $payment->distributor->id)->sum('sub_total');
                                                                    $pending_order_value = ($pendingOrder + $pendingCart);

                                                                    $eligible = ((($payment->distributor->credit_limit) + ($payment->amount)) - (optional( App\Order::where('status' , 1)->first())->total ) );
                                                            }
                                                        @endphp

                                                            @if(App\Order::all()->count() > 0)
                                                                Eligible Balance: {{ $eligible }}
                                                            @else
                                                                Eligible Balance: 00.0
                                                            @endif
                                                        
                                                        </td>
                                                        <!-- Hold Order Balance Calculation -->
                                                        <td>
                                                        @php
                                                            if(App\Order::all()->count() > 0) {

                                                                    $pendingOrder = App\Order::where('distributor_id', $payment->distributor->id)->sum('total');
                                                                    $pendingCart = App\Cart::where('distributor_id' , $payment->distributor->id)->sum('sub_total');
                                                                    $pending_order_value = ($pendingOrder + $pendingCart);

                                                            }
                                                        @endphp

                                                        @if(App\Order::all()->count() > 0)
                                                        
                                                            
                                                                @if(App\Order::where('status' , 0)->get()->count() > 0)
                                                                
                                                                   Hold: {{ $pending_order_value }}
                                                                

                                                                @else
                                                                
                                                                    Hold Value: 0.00
                                                                
                                                                @endif
                                                            
                                                        
                                                        @else
                                                        
                                                            Hold value: 0.00
                                                        
                                                        @endif
                                                        
                                                        </td>
                                                        <!-- Cart Order Balance Calcultaion -->
                                                        <td class="current_order">
                                                            @php
                                                                $total = 0;
                                                            @endphp
                                                            @if(App\Cart::all()->count() > 0)
                                                               
                                                                @foreach(App\Cart::all() as $cart)
                                                                @php
                                                                    $total = $total + $cart->sub_total;
                                                                @endphp
                                                                    
                                                                @endforeach

                                                                Cart Amount: {{ $total }}
                                                            @else
                                                                Cart Amount: 00.0
                                                            @endif
                                                            
                                                        </td>
                                                        <!-- Remaining Balance -->
                                                        <td>
                                                            @php 
                                                                

                                                                    if(App\Order::all()->count() > 0)
                                                                    {
                                                                        
                                                                        $remaining_balance = $payment->amount - (optional(App\Order::where('status', 1)->first())->total);
                                                                        
                                                                    }
                                                            @endphp
                                                        
                                                           @if(App\Order::all()->count() > 0)
                                                           
                                                           Balance: {{ $remaining_balance }}

                                                           @else

                                                           Balance: {{ $payment->amount }}

                                                           @endif
                                                        
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        @if(App\Cart::all()->count() > 0)
                                                            
                                                            @if( (App\Cart::where('status', 0)->first()->total) < (($payment->distributor->credit_limit) - ($total)) )
                                                                <td class="success-box amount_money" colspan="5" id="amount_money" ><center><b>WithIn Limit. You Can Still Order. Remianing Amount: 
                                                                
                                                                <span id="amount_money"> 
                                                                   
                                                                </span></b> </center></td>
                                                            @else
                                                                <td class="danger-box amount_money" colspan="5" id="amount_money" ><center><b>Without Limit. You Can Not Order. Remianing Amount: 
                                                                
                                                                <span id="amount_money"> 
                                                                    {{ $amount = ($payment->distributor->credit_limit) }}
                                                                </span></b> </center></td>
                                                            @endif

                                                        @else
                                                            <td class="success-box amount_money" colspan="5" id="amount_money" ><center><b>WithIn Limit. You Can Still Order. Remianing Amount: 
                                                                
                                                            <span id="amount_money"> 
                                                            
                                                            </span></b> </center></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5"><center><b>Order Request Form</b></center></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Customer Name: <b>{{$payment->distributor->distributor_name}} [{{ $payment->distributor->id }}]</b> </td>
                                                        <td>Distributor Code: <b>{{ $payment->distributor->random_number }}</b></td>
                                                        @php
                                                        $timestamp = strtotime(Carbon\Carbon::now());
                                                        $newDate = date('d F, Y', $timestamp);
                                                        @endphp
                                                        <td colspan="3">Order Date: <b>{{ $newDate }}</b></td>
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
                                            
                                            <input type="hidden" name="currnet_order" value="{{ $total }}">
                                            <input type="hidden" name="total" value="{{ $total_amount }}">

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
                                                </tr>
                                                
                                                @endforeach
                                                <tr>
                                                    <td colspan="5">Total</td>
                                                    <td><input type="text" id="unit_price" name="total" class="form-control unit_price"  value="0" readonly required autofocus></td>
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
                                                    $Ttotal = 0;
                                                    $total_amount = 0;
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
                                                        $Ttotal = $Ttotal + $product->sub_total;
                                                        $piece = $piece + $product->quantity;
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
                                                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Update Cart</button> -->
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
                                                @php
                                                    $total_amount = $total_amount + ($product->sub_total);
                                                @endphp
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
                                                            {{ $total_amount }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                
                                                    <td class="tb-tnx-id" colspan="7">
                                                    <form method="post" action="{{route('order.place')}}" class="form-validate is-alter">
                                                    @csrf
                                                        <input type="hidden" name="distributor_id" value="{{ $distributor_id }}">
                                                        <input type="hidden" name="total" value="{{ $total_amount }}">
                                                        <input type="hidden" name="session_id" value="{{ $cart->session_id }}">
                                                            <span>
                                                            <center>
                                                                <a href="#modalAlert" class="btn btn-success"  data-toggle="modal" data-target="#modalAlert">Confirm Order </a>
                                                            </center>
                                                            </span>
                                                            
                                                       <!-- Modal Alert -->
                                                        <div class="modal fade" tabindex="-1" id="modalAlert">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                                                                    <div class="modal-body modal-body-lg text-center">
                                                                        <div class="nk-modal">
                                                                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                                                            <h4 class="nk-modal-title">Congratulations!</h4>
                                                                            <div class="nk-modal-text">
                                                                                <div class="caption-text">
                                                                                    You’ve successfully Ordered <br>
                                                                                    <strong>
                                                                                        <a href="">{{ $piece }}</a>
                                                                                    </strong> 
                                                                                    Piece for 
                                                                                    <strong>
                                                                                        <a href="">{{ $total_amount }} </a>
                                                                                    </strong> 
                                                                                    Taka
                                                                                    </div>
                                                                                
                                                                            </div>
                                                                            <div class="nk-modal-action">
                                                                                <button type="submit" class="btn btn-lg btn-mw btn-success" >Confirm</button>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- .modal-body -->
                                                                    <div class="modal-footer bg-lighter">
                                                                        <div class="text-center w-100">
                                                                            <p> <a href="#">Thank You!</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
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

