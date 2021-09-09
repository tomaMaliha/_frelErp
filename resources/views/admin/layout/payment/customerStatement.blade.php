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


<div class="nk-content p-0">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-msg nk-msg-boxed">
                <div class="nk-msg-body bg-white profile-shown">
                    <div class="nk-msg-head">
                        <h4 class="title d-none d-lg-block">Customer Statemement</h4>
                        <div class="nk-msg-head-meta">
                        </div><!-- .nk-msg-head -->
                    <form method="post" action="{{route('customer.payment.info')}}">
                        @csrf
                        <div class="row g-gs">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">From <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap ">
                                        <input type="text" class="form-control date-picker" name="from" placeholder="To Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">To <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap ">
                                        <input type="text" class="form-control date-picker" name="to" placeholder="From Date">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Distributor Name</label>
                                    <div class="form-control-wrap ">
                                    <select id="customer" name="distributor_id" data-placeholder="Select a Distributor" >
                                        <option></option>
                                        @foreach(App\Payment::all(); as $payment)
                                            <option value="{{ $payment->id }}">{{ $payment->distributor->distributor_name }}</option>
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
                    </div><!-- .nk-msg-body -->
                @if(isset($payments))
                    <div class="row">
                        <table class="table table-bordered col-sm-12" id="dynamicTable">
                            <thead>
                            
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Ref No.</th>
                                    <th>Remarks</th>
                                    <th>Sales</th>
                                    <th>collection</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                               <td colspan="3" style="text-align:center;"><b>Opening Balance</b></td>
                               <td colspan="3" style="text-align:center;"><b>{{$payment->transaction_history->amount}}</b></td>
                            </tr>
                           
                       
                        @foreach($payments as $key => $payment)
                            @php 
                                $credit_limit = $payment->distributor->credit_limit;
                                $sub_total = App\Order::where('status', 1)->first()->sub_total;

                                $sales = $payment->orderss->total;

                                $collection = 0;

                                
                            @endphp
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>
                                        {{ $payment->date }}
                                    </td>
                                    <td>
                                        {{ $payment->bank_name }}
                                    </td>
                                    <td>
                                        {{ $payment->remarks }}
                                    </td>
                                    <td>
                                    
                                        {{ $sales }}
                                    
                                    </td>
                                    <td>
                                    @if(App\Order::where('status', 1)->first()->sub_total)
                                        {{ $collection }}
                                    @else
                                        00.0
                                    @endif
                                </td>
                                   <td>
                                       
                                   </td>

                                </tr>
                            @endforeach
                           
                            </tbody>
                        
                        
                        </table>
                   
                </div>
                @endif
            </div><!-- .nk-msg -->
        </div>
    </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

        $("#customer").select2({
        });

        $("#categoryName").select2({
        });

        $("#warehouseName").select2({
        });
</script>

@endsection