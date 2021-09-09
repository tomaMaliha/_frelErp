@extends('admin.master')
@section('css')

<style>

.custom-control-label h6
{
   color: #854fff;;
}
</style>

@endsection
@section('content')


@if(Session::has('msg'))
    <p class="alert alert-success">{{ Session::get('msg') }}</p>
@endif


<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Order Information</h4>
        </div>
    </div>
    <div class="card">
        <h6 class="title nk-block-title">Order Information</h6>
        <div class="card-inner">
            <div class="row g-3 align-center">
                <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                        <h5 class="title">Order Details</h5>
                    </div><!-- .nk-block-head -->
                    <div class="bq-note">
                        <div class="bq-note-item">
                            <div class="bq-note-text">
                            @php
                            $timestamp = strtotime($order->created_at);
                            $newDate = date('d F, Y', $timestamp);
                            @endphp
                                    <p style="padding-top: 10px;"><b>{{ $order->distributor->distributor_name }}</b></p>
                                    <p style="color: #6e6e6e;"><b style="color: #333;">Order No: </b>{{ $order->order_id }}</p>
                                    <p style="color: #6e6e6e;"><b style="color: #333;">Order Date </b>{{ $newDate }}, </p>
                                    <p style="color: #6e6e6e;"><b style="color: #333;">Distributor Point: </b>
                                        {{ Devfaysal\BangladeshGeocode\Models\Division::find($order->distributor->division)->name }} : 
                                        {{ Devfaysal\BangladeshGeocode\Models\District::find($order->distributor->zone)->name }} : 
                                        {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($order->distributor->base)->name }}</p>
                                    <p style="color: #6e6e6e;"><b style="color: #333;">Phone: </b>{{ $order->distributor->mobile }}</p>
                                    
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
                            @foreach(App\OrderDetails::where('order_id' , $order->order_id)->get() as $product)
                            <tr>
                            <th>
                                {{ $num }}
                            </th>
                            <td>
                                {{ $product->product->name }}
                            </td>
                            
                            <td>{{ $product->quantity }}</td>
                            <td><span style="visibility: hidden;"></span>{{ $product->product->distributor_price * $product->quantity }} </td>
                        </tr>

                            @php
                                $num++;
                            @endphp

                            @endforeach

                            <tr>
                                <td colspan="3" style="text-align: right;">
                                    <b>Sub Total</b>
                                </td>
                                <td colspan="1">BDT. <b> {{ $order->total }}</b></td>
                            </tr>

                            <tr>
                                <td colspan="3" style="text-align: right;">
                                    <b>Total Amount</b>
                                </td>
                                <td colspan="1">BDT. <b> {{ $order->total }}</b></td>
                            </tr>
                        </tbody>
                        
                    </table>
                    @if($order->status == 0)
                    <a href="#modalAlert"data-toggle="modal" class="btn btn-success">Accept</a>
                    @endif
                    <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><em class="icon ni ni-chevron-left-fill-c"></em>Back</a>
            </div>
        </div>

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
                                    You’ve successfully Confirmed <br>
                                    <strong>
                                        <a href=""></a>
                                    </strong> 
                                    <a href="" >{{ $order->distributor->distributor_name }}'s </a>
                                    <strong>
                                        <a href=""> </a>
                                    </strong> 
                                    Order
                                    </div>
                            </div>
                            <div class="nk-modal-action">
                                <a href="{{route('approve.order' , $order->id)}}" class="btn btn-lg btn-mw btn-success" >Confirm</a>
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
</div>

@section('js')
<script type="text/javascript">

    $("#distributorName").select2({
    });

</script>
@endsection
@endsection