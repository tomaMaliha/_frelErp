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
                        <center><h6 class="title nk-block-title">Pending Order List</h6></center><br>
                        <div class="nk-block">
                            <div class="card card-stretch">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h5 class="title">All Pending Order List</h5><hr>
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
                                                <div class="nk-tb-col tb-col-md"><span>Eligible Balance</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Pending Order Value</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Balance</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Order Date</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Status</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Action</span></div>
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
                                                        <a href="{{route('orderDetails' , $order->id)}}"> {{ $order->order_id }}</a>
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
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-sub">
                                                        {{ $order->distributor->mobile }}
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-lead">
                                                       <a href="#"> {{ $order->balance->eligible_balance }}</a>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-lead">
                                                        <a href="#"> {{ $order->total }} </a>Taka
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-lead">
                                                        <a href="#"> {{ $order->balance->balance }} </a>Taka
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
                                                    <span class="tb-status text-danger">InActive</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-success">
                                                        <a href="{{route('approve.order' , $order->id)}}" class="btn btn-success">Accept</a>
                                                    </span>
                                                </div>
                                                
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                    
                                                        <!-- <li class="nk-tb-action-hidden">
                                                            <a href="{{route('orderDetails' , $order->id)}}" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" >
                                                                <em class="icon ni ni-eye"></em></a></li> -->
                                                        <li>
                                                            <div class="drodown mr-n1">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('orderDetails' , $order->id)}}"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                                        <li><a href="#DeleteModal{{$order->id}}" data-toggle="modal"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->
                                                
                                            <!-- Delete Modal -->
                                            <div class="modal fade" tabindex="-1" id="DeleteModal{{$order->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Order</h5>
                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center> <p><h3>Are you sure?</h3><br>
                                                                You won't be able to revert this!</p>
                                                            <a href="{{route('order.delete' , $order->id)}}" class="btn btn-success">Yes, Delete it!</a>
                                                            <a href="#" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a>
                                                            </center>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <span class="sub-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Modal -->
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
