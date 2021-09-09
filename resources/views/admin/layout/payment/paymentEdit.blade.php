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
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                        <center><h6 class="title nk-block-title">Payment Information</h6></center><br>
                            <form method="post" action="{{route('payment.update' , $payments->id)}}" class="form-validate" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-gs">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Payment Date <span style="top:-5px; color:red;">*</span></label reqired>
                                            <div class="form-control-wrap">
                                            <input type="date" class="form-control " id="fv-email" name="date" value="{{ $payments->date }}" placeholder="Date" required>
                                            </div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Distributor Name <span style="top:-5px; color:red;">*</span></label reqired>
                                            <div class="form-control-wrap ">
                                                <select id="distributor_name" name="distributor_id" data-placeholder="Select a option" >
                                                <option value="">Select primary category</option>
                                                @foreach(App\Distributor::where('active', 1)->get() as $distributor)
                                                    <option value="{{ $distributor->id }}" @if($distributor->id == $distributor->id) selected @endif>{{ $distributor->random_number }} :: {{ $distributor->distributor_name }} : : {{ $distributor->zone }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-label" for="fv-topics">Bank Name <span style="top:-5px; color:red;">*</span></label reqired>
                                        <div class="form-control-wrap ">
                                            <select class="form-control form-select" id="fv-topics" name="bank_name" data-placeholder="Select a option" >
                                            
                                                @foreach(App\Bank::all() as $bank)
                                                    <option value="{{ $bank->id }}" @if($bank->id == $bank->id) selected @endif>{{ $bank->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Payment Method <span style="top:-5px; color:red;">*</span></label reqired>
                                            <div class="form-control-wrap ">
                                                <select class="form-control form-select" id="fv-topics" name="payment_method" data-placeholder="Select a option" >
                                                    <option value="Cash" @if($payments->payment_method == "Cash")  selected @endif>Cash</option>
                                            
                                            
                                                    <option value="Bkash" @if($payments->payment_method == "Bkash")  selected @endif>Bkash</option>
                                                    
                                                    
                                                    <option value="Rocket" @if($payments->payment_method == "Rocket")  selected @endif>Rocket</option>

                                                    
                                                    <option value="Cheque" @if($payments->payment_method == "Cheque")  selected @endif>Cheque</option>
                                           
                                                </select>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Transaction ID <span style="top:-5px; color:red;">*</span></label reqired>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-email" name="transaction_id" placeholder="Transaction ID">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Reference Number <span style="top:-5px; color:red;">*</span></label reqired>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-email" name="ref_no" value="{{$payments->ref_no}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Amount <span style="top:-5px; color:red;">*</span></label reqired>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-email" name="amount" value="{{$payments->amount}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Attchaments of Cheque</label>
                                        <div class="form-control-wrap">
                                           @if(!empty($payment->attachment))
                                           <img src="{{asset('public/assets/images/payment/' . $payments->attachment)}}" style="width: 200px;">
                                           @endif
                                            <input type="file" class="form-control" id="full-name" name="attachment">
                                            <input type="hidden" class="form-control" id="full-name" name="attachment" value="{{$payments->attachment}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-message">Remarks</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-sm" id="fv-message"
                                                name="remarks" placeholder="Remarks">{{$payments->remarks}}</textarea>
                                        </div> 
                                    </div>
                                </div>

                                <input type="hidden" name="mobile" value="{{ $distributor->mobile }}">
                                <input type="hidden" name="division" value="{{ $distributor->division }}">
                                <input type="hidden" name="zone" value="{{ $distributor->zone }}">
                                <input type="hidden" name="base" value="{{ $distributor->base }}">

                                <!-- <div class="col-md-12" id="variant-option">
                                    <h5><input name="is_variant" type="checkbox" id="is-variant" value="1">&nbsp; {{trans('file.This product has variant')}}</h5>
                                </div>
                                <div class="col-md-12" id="variant-section">
                                    <div class="col-md-6 form-group mt-2">
                                        <input type="text" name="variant" class="form-control" placeholder="{{trans('file.Enter variant seperated by comma')}}">
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="#modalAlert" data-toggle="modal" class="btn btn-outline-primary">Update</a>
                                    </div>
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
                                                        You’ve successfully Edited Payment <br>
                                                        <strong>
                                                            <a href=""></a>
                                                        </strong> 
                                                        <a href="" > </a>
                                                        <strong>
                                                            <a href=""> </a>
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

                            </form>
                        </div>
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

        $("input[name='payment_method']").on("change", function () 
        {
        if ($(this).is(':selected')) {
            $("#transaction_id").show(300);
        }
        else
            $("#transaction_id").hide(300);
        });

    //Delete variant
    // $("table#variant-table tbody").on("click", ".vbtnDel", function(event) {
    //     $(this).closest("tr").remove();
    // });
</script>

@endsection