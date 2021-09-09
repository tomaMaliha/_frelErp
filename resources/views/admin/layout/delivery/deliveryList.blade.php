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
                        <div class="nk-block">
                                    <div class="card card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h5 class="title">All Delivery List</h5>
                                                    </div>
                                                    <div class="card-tools mr-n1">
                                                    </div><!-- .card-tools -->
                                                   
                                                </div><!-- .card-title-group -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-tnx">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        
                                                        <div class="nk-tb-col"><span>SL</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Customer</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Order ID</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>DO</span></div>
                                                        <div class="nk-tb-col"><span>Product</span></div>
                                                        <div class="nk-tb-col"><span>Quantity</span></div>
                                                        <div class="nk-tb-col"><span>Value</span></div>
                                                        <div class="nk-tb-col"><span>CTN</span></div>
                                                        <div class="nk-tb-col"><span>Remarks</span></div>
                                                        <div class="nk-tb-col"><span>CTN Serial</span></div>
                                                        <div class="nk-tb-col"><span>Trans</span></div>
                                                        <div class="nk-tb-col"><span>Status</span></div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            
                                                        </div>
                                                    </div><!-- .nk-tb-item -->

                                                    @foreach($deliveries as $key=>$delivery)

                                                    
                                                    <div class="nk-tb-item">
                                                        
                                                    
                                                    
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead"><a href="#">
                                                                {{ $key+1 }}
                                                            </a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">
                                                                {{ $delivery->date }}
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">
                                                                {{ $delivery->distributor->distributor_name }}
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-sub">
                                                                {{ $delivery->order_id }}
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub text-primary">
                                                                <a href="{{route('delivery.DO' , $delivery->id) }}">{{ $delivery->DO }}</a>
                                                            </span>
                                                        </div>
                                                        
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                                {{ $delivery->product->name }}
                                                            </span>
                                                        </div>
                                                       <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                            <center> {{ $delivery->quantity }}
                                                        </center>
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                                {{ $delivery->value }}
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                            <center>{{ $delivery->ctn }} </center>
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                                {{ $delivery->remakrs }}
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                            <center> {{ $delivery->ctn_serial }} </center>
                                                            </span>
                                                        </div>
                                                        @if($delivery->transport != null)
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                                {{ $delivery->transport }}
                                                            </span>
                                                        </div>
                                                        @else
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                                Others
                                                            </span>
                                                        </div>
                                                        @endif

                                                        @if($delivery->status == 0)
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                                <a href="#UpdateModal{{$delivery->id}}" data-toggle="modal"><em class="icon ni ni-pen2"></em></a>
                                                            </span>
                                                        </div>
                                                        @else
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">
                                                                <em class="icon ni ni-check-circle"></em>
                                                            </span>
                                                        </div>
                                                        @endif
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                                                <!-- <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-toggle="dropdown">
                                                                        
                                                                        <em class="icon ni ni-truck"></em></a></li>
                                                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-toggle="dropdown">
                                                                        <em class="icon ni ni-eye"></em></a></li> -->
                                                                <li>
                                                                    <div class="drodown mr-n1">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="#deliveryModal{{$delivery->id}}" data-toggle="modal" ><em class="icon ni ni-eye" ></em><span>Delivery Details</span></a></li>
                                                                                <li><a href="#UpdateModal{{$delivery->id}}" data-toggle="modal" ><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                                                <!-- <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li> -->
                                                                                <li><a href="{{route('delivery.Chalan.Print' , $delivery->id)}}" target="_blank"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                                                <!-- <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li> -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                         <!-- Update Modal -->
                                                        <div class="modal fade" tabindex="-1" id="UpdateModal{{$delivery->id}}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Update Delivery Status</h5>
                                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <em class="icon ni ni-cross"></em>
                                                                        </a>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="{{ route('delivery.status' , $delivery->id) }}" class="form-validate is-alter">
                                                                            @csrf
                                                                            <div class="card">
                                                                                <div class="card-inner">
                                                                                    <div class="row g-3 align-center">
                                                                                        <div class="col-lg-5">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label" for="site-name">Date</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-7">
                                                                                            <div class="form-group">
                                                                                                <div class="form-control-wrap">
                                                                                                    <input type="text" class="form-control" id="site-name" value="{{$delivery->date}}" readonly>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row g-3 align-center">
                                                                                        <div class="col-lg-5">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">DO Number</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-7">
                                                                                            <div class="form-group">
                                                                                                <div class="form-control-wrap">
                                                                                                    <input type="text" class="form-control" id="site-email" value="{{$delivery->DO}}" readonly>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row g-3 align-center">
                                                                                        <div class="col-lg-5">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">
                                                                                                    Status
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-7">
                                                                                            <div class="form-group">
                                                                                                <div class="form-control-wrap">
                                                                                                    <select name="status" class="form-control" value="{{ $delivery->status }}">
                                                                                                        <option value="0">Pending</option>
                                                                                                        <option value="1">Approved</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <button type="submit" class="btn btn-outline-primary">Update Status</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div><!-- card -->
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer bg-light">
                                                                        <span class="sub-text"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Update modal End -->

                                                        <!-- Delivery Modal -->
                                                        <div class="modal fade" tabindex="-1" id="deliveryModal{{$delivery->id}}">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="col-md-4">
                                                                            <a href="#">
                                                                                <button class="btn btn-outline-primary"><em class="icon ni ni-printer">Print</em></button>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <h5 class="modal-title">First Rays</h5>
                                                                            <p>Delivery Details</p>
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
                                                                                        <h5 class="title">Invoice</h5>
                                                                                    </div><!-- .nk-block-head -->
                                                                                    <div class="bq-note">
                                                                                        <div class="bq-note-item">
                                                                                            <div class="bq-note-text">
                                                                                            @php
                                                                                            $timestamp = strtotime($delivery->date);
                                                                                            $newDate = date('d F, Y', $timestamp);
                                                                                            @endphp
                                                                                                    <p style="padding-top: 10px;"><b>{{ $delivery->distributor->distributor_name }}</b></p>
                                                                                                    <p style="color: #6e6e6e;"><b style="color: #333;">Delivery Date </b>{{ $newDate }}, </p>
                                                                                                    <p style="color: #6e6e6e;"><b style="color: #333;">Shipping Address: </b>{{ $delivery->distributor->address }}, </p>
                                                                                                    <p style="color: #6e6e6e;"></p>
                                                                                                    <p style="color: #6e6e6e;"><b style="color: #333;">Phone: </b>{{ $delivery->distributor->mobile }}</p>
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
                                                                                       
                                                                                        <tr>
                                                                                        <th>
                                                                                            {{ $num }}
                                                                                        </th>
                                                                                        <td>
                                                                                            {{ $delivery->product->name }}
                                                                                        </td>
                                                                                        
                                                                                        <td>{{ $delivery->quantity }}</td>
                                                                                        <td><span style="visibility: hidden;"></span>{{ $delivery->value }} </td>
                                                                                    </tr>

                                                                                        @php
                                                                                            $num++;
                                                                                            
                                                                                        @endphp

                                                                                    

                                                                                        <tr>
                                                                                            <td colspan="3" style="text-align: right;">
                                                                                                <b>Sub Total</b>
                                                                                            </td>
                                                                                            <td colspan="1">BDT. <b> {{ $delivery->total }}</b></td>
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
                                                        <!-- Delivery modal End -->
                                                       
                                                    </div><!-- .nk-tb-item -->
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
