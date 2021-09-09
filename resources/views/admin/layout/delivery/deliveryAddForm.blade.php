@extends('admin.master')
@section('css')

<style>

.custom-control-label h6
{
   color: #854fff;
}
</style>

@endsection

@section('content')


@if(Session::has('msg'))
    <p class="alert alert-success">{{ Session::get('msg') }}</p>
@endif


<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                        <center><h6 class="title nk-block-title">Delivery Information</h6></center><br>
                            <form method="post" action="{{route('delivery.search')}}" class="form-validate" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-gs">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">From </label>
                                        <div class="form-control-wrap ">
                                            <input type="text" class="form-control date-picker" name="from" placeholder="To Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">To </label>
                                        <div class="form-control-wrap ">
                                            <input type="text" class="form-control date-picker" name="to" placeholder="From Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Distributor Name </label>
                                        <div class="form-control-wrap ">
                                            <select id="distributor_name" name="order_id" data-placeholder="Select a option" >
                                            <option> Select a Distributor</option>
                                                @foreach($distributor_names as $distributor)
                                                   
                                                   @if($distributor->delivery_status == "Not Delivered")
                                                   <option value="{{ $distributor->order_id }}">{{ $distributor->distributor->random_number }} : {{ $distributor->distributor->distributor_name }} : {{ $distributor->order_id }}</option>
                                                    
                                                    

                                                   @endif
                                                   
                                                   
                                                @endforeach
                                               
                                                
                                              
                                               
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary">View Informations</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        @if(isset($orders))
                        <div class="nk-block">
                            <div class="card card-stretch">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h5 class="title">All Orders</h5>
                                            </div>
                                            <div class="card-tools mr-n1">
                                            </div><!-- .card-tools -->
                                            <div class="card-search search-wrap" data-search="search">
                                                <div class="search-content">
                                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction">
                                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                </div>
                                            </div><!-- .card-search -->
                                        </div><!-- .card-title-group -->
                                    </div><!-- .card-inner -->

                                    <form method="post" action="{{route('delivery.create')}}" class="form-validate" enctype="multipart/form-data">
                                        @csrf

                                    <div class="card-inner p-0">
                                        <div class="nk-tb-list nk-tb-tnx">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col"><span>SL</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Order ID</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Point</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Customer</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Code</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Quantity</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Remarks</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Product Name</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Value</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>CTN</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>CTN Serial</span></div>
                                                
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                </div>
                                            </div><!-- .nk-tb-item -->

                                            @foreach($orders as $key=>$order)

                                            @foreach(App\OrderDetails::where('order_id' , $order->order_id)->get()  as $pro)
                                            
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead"><a href="#">
                                                        {{ $key+1 }}
                                                    </a></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub text-primary">
                                                    {{ $order->order_id }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">
                                                    {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($order->distributor->base)->name }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">
                                                    {{ $order->distributor->distributor_name }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">
                                                    {{ $order->distributor->random_number }}
                                                    </span>
                                                </div>
                                                @php
                                                    $timestamp = strtotime($pro->created_at);
                                                    $newDate = date('d F, Y', $timestamp);
                                                @endphp
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">
                                                    {{ $newDate}}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-sub">
                                                    {{ $pro->quantity }} Pcs
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-sub">
                                                    <input type="text" class="form-control" name="remarks">
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-sub">
                                                    {{ $pro->product->name }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub text-primary">
                                                    {{ $pro->sub_total }} Taka
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub text-primary">
                                                    <input type="text" class="form-control" name="ctn[]">
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub text-primary">
                                                    <input type="text" class="form-control" name="ctn_serial[]">
                                                    </span>
                                                </div>
                                                
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        
                                                        <!-- <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-toggle="dropdown">
                                                                <em class="icon ni ni-eye"></em></a></li>
                                                        <li>
                                                            <div class="drodown mr-n1">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{ route('delivery.order' , $order->id) }}"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->
                                                <input type="hidden" class="form-control" name="order_id" value="{{$order->order_id}}">
                                                <input type="hidden" class="form-control" name="sub_category_id[]" value="{{$pro->sub_category_id}}">
                                                <input type="hidden" class="form-control" name="product_id[]" value="{{$pro->product_id}}">
                                                <input type="hidden" class="form-control" name="distributor_id" value="{{$order->distributor_id}}">
                                                <input type="hidden" class="form-control" name="quantity[]" value="{{$pro->quantity }}">
                                                <input type="hidden" class="form-control" name="remarks" value="{{$order->remarks}}">
                                                <input type="hidden" class="form-control" name="remarks" value="{{$order->product_id}}">
                                                <input type="hidden" class="form-control" name="date" value="{{$newDate}}">
                                                <input type="hidden" class="form-control" name="value[]" value="{{$pro->sub_total}}">
                                            
                                                        @endforeach
                                            @endforeach
                                        </div><!-- .nk-tb-list -->
                                    </div><!-- .card-inner -->
                                    
                                    <div class="card-inner">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <a href="#modalAlert" class="btn btn-success"  data-toggle="modal" data-target="#modalAlert">Confirm Delivery </a>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
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
                                                                    
                                                                    <strong>
                                                                        <a href=""> You’ve successfully Delivered <br>
                                                                        the Ordered Products </a>
                                                                    </strong> 
                                                                    
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
                                </div><!-- .card-inner-group -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                        @endif
                    
                    </div><!-- .card-preview -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->


@endsection

@section('js')

<script type="text/javascript">

        $("#distributor_name").select2({
        });

        $("#default").select2({
        });
</script>

@endsection