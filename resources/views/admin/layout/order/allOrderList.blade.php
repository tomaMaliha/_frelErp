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
                        <center><h6 class="title nk-block-title">Order List</h6></center><br>
                        <div class="nk-block">
                            <div class="card card-stretch">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h5 class="title">All Order List</h5><hr>
                                            </div>
                                            <div class="card-tools mr-n1">
                                            </div><!-- .card-tools -->
                                            
                                        </div><!-- .card-title-group -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <div class="nk-tb-list nk-tb-tnx">
                                            <div class="nk-tb-item nk-tb-head">
                                                
                                                <div class="nk-tb-col"><span>SL</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Order No</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Distributor Point</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Distributor Name</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Distributor Mobile</span></div>
                                                
                                                <div class="nk-tb-col tb-col-md"><span>Order Date</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Total Price</span></div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    
                                                </div>
                                            </div><!-- .nk-tb-item -->

                                            @foreach($orders as $key=>$order)

                                            
                                            <div class="nk-tb-item">
                                                
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead"><a href="#">
                                                        {{ $key+1 }}
                                                    </a></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-lead">
                                                        <a href="{{ route('orderDetails.active' , $order->id) }}"> {{ $order->order_id   }} </a>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">
                                                        {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($order->distributor->base)->name }}, <br>
                                                        {{ Devfaysal\BangladeshGeocode\Models\District::find($order->distributor->zone)->name }}, <br>
                                                        {{ Devfaysal\BangladeshGeocode\Models\Division::find($order->distributor->division)->name }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">
                                                        {{ $order->distributor->distributor_name }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-sub">
                                                        {{ $order->distributor->mobile }}
                                                    </span>
                                                </div>
                                                
                                                @php
                                                $timestamp = strtotime($order->created_at);
                                                $newDate = date('d F, Y', $timestamp);
                                                @endphp
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-lead">
                                                    
                                                        {{ $newDate }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-lead">
                                                        {{ $order->total }}
                                                    </span>
                                                </div>
                                                
                                                
                                                
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                    
                                                        <li class="nk-tb-action-hidden">
                                                            <a href="{{route('orderDetails.active' , $order->id)}}" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" >
                                                                <em class="icon ni ni-eye"></em></a></li>
                                                        <li>
                                                            <div class="drodown mr-n1">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('orderDetails.active' , $order->id)}}"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                                        <!-- <li><a href=""><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->

                                                <!-- Order Modal -->
                                            <div class="modal fade" tabindex="-1" id="orderModal{{$order->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="col-md-4">
                                                                <!-- <a href="#">
                                                                    <button class="btn btn-outline-primary"><em class="icon ni ni-printer">Print</em></button>
                                                                </a> -->
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h5 class="modal-title">First Rays</h5>
                                                                <p>Order Details</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row g-3 align-center">
                                                                <div class="nk-block">
                                                                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                                        <h5 class="title">Order Details</h5>
                                                                    </div><!-- .nk-block-head -->
                                                                    <div class="bq-note">
                                                                        <div class="bq-note-item">
                                                                            <div class="bq-note-text">
                                                                          
                                                                                    <p style="padding-top: 10px;"><b>{{ $order->distributor->distributor_name }}</b></p>
                                                                                    <!-- <p style="color: #6e6e6e;"><b style="color: #333;">Order Date </b>{{ $newDate }}, </p> -->
                                                                                    <p style="color: #6e6e6e;"><b style="color: #333;">Zone: </b>{{ Devfaysal\BangladeshGeocode\Models\Division::find($order->distributor->division)->name }} : {{ Devfaysal\BangladeshGeocode\Models\District::find($order->distributor->zone)->name }} : {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($order->distributor->base)->name }}</p>
                                                                                    <p style="color: #6e6e6e;"><b style="color: #333;">Phone: </b>{{ $order->distributor->mobile }}</p>
                                                                                    <p style="color: #6e6e6e;"><b style="color: #333;">Order No: </b>{{ $order->order_id }}</p>
                                                                            </div>
                                                                        </div><!-- .bq-note-item -->
                                                                        
                                                                    </div><!-- .bq-note -->
                                                                </div><!-- .nk-block -->
                                                                    <table class="table table-bordered" >
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th style="width: 20px;">#</th>
                                                                                <th>Product</th>
                                                                                <th style="width: 80px;">Quantity</th>
                                                                                <th style="width: 120px;">Price (BDT.)</th>
                                                                            </tr>
                                                                        </thead>

                                                                        @php
                                                                        $num = 1;
                                                                        @endphp
                                                                        <tbody>
                                                                            @foreach(App\Order::where('order_id', $order->order_id)->get() as $product)
                                                                            <tr>
                                                                                <th>
                                                                                    {{ $num }}
                                                                                </th>
                                                                                <td>
                                                                                    
                                                                                    
                                                                                    
                                                                                </td>
                                                                                
                                                                                <td>{{ $product->quantity }}</td>
                                                                                <td><span style="visibility: hidden;">BDT. </span>{{ $product->sub_total }} </td>
                                                                            </tr>

                                                                            @php
                                                                                $num++;
                                                                            @endphp

                                                                            @endforeach

                                                                            <tr>
                                                                                <td colspan="3" style="text-align: right;">
                                                                                    <b>Sub Total</b>
                                                                                </td>
                                                                                <td colspan="1">BDT. <b> {{ $order->unit_price }}</b></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td colspan="3" style="text-align: right;">
                                                                                    <b>Total Amount</b>
                                                                                </td>
                                                                                <td colspan="1">BDT. <b> {{ $order->unit_price }}</b></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <span class="sub-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Order modal End -->
                                            @endforeach
                                            
                                        </div><!-- .nk-tb-list -->
                                    </div><!-- .card-inner -->
                                    
                                </div><!-- .card-inner-group -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
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




