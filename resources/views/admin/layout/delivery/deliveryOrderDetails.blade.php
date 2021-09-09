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
                            
                                    <p style="padding-top: 10px;"><b>{{ $deliveryOrder->distributor->distributor_name }}</b></p>
                                    <!-- <p style="color: #6e6e6e;"><b style="color: #333;">Order Date </b>{{ $newDate }}, </p> -->
                                    <p style="color: #6e6e6e;"><b style="color: #333;">Zone: </b>{{ Devfaysal\BangladeshGeocode\Models\Division::find($order->distributor->division)->name }} : {{ Devfaysal\BangladeshGeocode\Models\District::find($order->distributor->zone)->name }} : {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($order->distributor->base)->name }}</p>
                                    <p style="color: #6e6e6e;"><b style="color: #333;">Phone: </b>{{ $deliveryOrder->distributor->mobile }}</p>
                                    <p style="color: #6e6e6e;"><b style="color: #333;">Order No: </b>{{ $deliveryOrder->order_id }}</p>
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
                            @foreach($deliveryOrder as $product)
                            <tr>
                                <th>
                                    {{ $num }}
                                </th>
                                <td>
                                    
                                    {{ $product->product->name }}
                                    
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
                                <td colspan="1">BDT. <b> {{ $deliveryOrder->total }}</b></td>
                            </tr>

                            <tr>
                                <td colspan="3" style="text-align: right;">
                                    <b>Total Amount</b>
                                </td>
                                <td colspan="1">BDT. <b> {{ $deliveryOrder->total }}</b></td>
                            </tr>
                        </tbody>
                    </table>
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