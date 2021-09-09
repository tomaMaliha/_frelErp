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

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Payment Details</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                            <a href="#" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Print</span></a>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">Search</h5>
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            
                                            <li>
                                            
                                            <form method="post" action="{{route('payment.search')}}">
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
                                                            <label class="form-label" for="fv-topics">To </label >
                                                            <div class="form-control-wrap ">
                                                                <input type="text" class="form-control date-picker" name="to" placeholder="From Date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-topics">Division </label >
                                                            <div class="form-control-wrap ">
                                                                <select id="districtName" id="fv-topics" name="division" data-placeholder="Select a option"> <span style="top:-5px; color:red;">*</span reqired>
                                                                <option value="">Select a Option</option>
                                                                    @foreach($pay as $payment)
                                                                        <option value="{{ $payment->id }}">{{ $payment->distributor->division }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-topics">Search</label>
                                                            <div class="form-control-wrap ">
                                                                <button type="submit" class="btn btn-success"> View  </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                            </li>
                                        </ul><!-- .btn-toolbar -->
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
                           @if(isset($payments))
                           <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-tnx">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            SL
                                        </div>
                                        <div class="nk-tb-col"><span>Date</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Point Name</span></div>
                                        <div class="nk-tb-col tb-col-sm"><span>Distributor Name</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Amount</span></div>
                                        <div class="nk-tb-col"><span>Bank Name</span></div>
                                        <div class="nk-tb-col"><span>Payment Method</span></div>
                                        <div class="nk-tb-col"><span>Ref . No.</span></div>
                                        <div class="nk-tb-col"><span>Received By</span></div>
                                        <div class="nk-tb-col"><span>Remarks</span></div>
                                        <div class="nk-tb-col"><span>Edit</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                        
                                        </div>
                                    </div><!-- .nk-tb-item -->

                                    @if(isset($payments))
                                    @foreach($payments as $key => $payment)

                                    @php
                                    $timestamp = strtotime($payment->date);
                                    $newDate = date('d F, Y', $timestamp);
                                    @endphp
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                {{ $key+1 }}
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead"><a href="#">
                                                {{ $newDate }}
                                            </a></span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub">
                                                {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($payment->distributor->base)->name }}
                                            </span>
                                        </div>
                                        
                                        <div class="nk-tb-col tb-col-sm">
                                            <span class="tb-sub">
                                            {{ $payment->distributor->distributor_name }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub text-primary">
                                            {{ $payment->amount }} TK
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">
                                            {{ $payment->bank->name }} - Account->{{ $payment->bank->account_number }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">
                                            {{ $payment->payment_method }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">
                                            {{ $payment->ref_no }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">
                                                -
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">
                                            {{ $payment->remarks }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                
                                                <li>
                                                    <div class="drodown mr-n1">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Payment Details</span></a></li>
                                                                <li><a href="{{ route('payment.edit' , $payment->id) }}"><em class="icon ni ni-money"></em><span>Edit Payment Info</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    @endforeach
                                    @endif
                                </div><!-- .nk-tb-list -->
                            </div><!-- .card-inner -->
                           
                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div><!-- .card-inner -->

                            @endif
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->


@endsection

@section('js')

<script type="text/javascript">

        $("#typeName").select2({
        });

        $("#categoryName").select2({
        });

        $("#districtName").select2({
        });

        
</script>

@endsection