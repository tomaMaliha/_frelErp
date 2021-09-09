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
                            <form method="post" action="{{route('payment.create')}}" class="form-validate" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-gs">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Payment Date</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control date-picker" id="fv-email" name="date" placeholder="Date" required> 
                                            </div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Distributor Name</label>
                                            <div class="form-control-wrap ">
                                                <select id="distributor_name" name="distributor_id" data-placeholder="Select a option" >
                                                    <option value="">Select Name</option>
                                                    @foreach(App\Distributor::where('active', 1)->get() as $distributor)
                                                        <option value="{{ $distributor->id }}">{{ $distributor->random_number }}::{{ $distributor->distributor_name }} : : {{ $distributor->zone }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-label" for="fv-topics">Bank Name</label>
                                        <div class="form-control-wrap ">
                                            <select class="form-control form-select" id="fv-topics" name="bank_name" data-placeholder="Select a option" >
                                                    <option value="City Bank">City Bank</option>
                                                    <option value="Dhaka Bank">Dhaka Bank</option>
                                                    <option value="UCB Bank">UCB Bank</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Deposite Account</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-email" name="deposite_account" placeholder="Deposite No." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-label" for="fv-topics">Payment Method</label>
                                        <div class="form-control-wrap ">
                                            <select class="form-control form-select" id="fv-topics" name="payment_method" data-placeholder="Select a option" >
                                                <option value="Cash">Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Bkash">Bkash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Transaction ID </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-email" name="transaction_id" placeholder="Transaction ID - 14708298723">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Reference Number</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-email" name="ref_no" placeholder="Ref.No. (Cheque No.)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Amount</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-email" name="amount" placeholder="50000 Taka" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-email">Attchaments of Cheque</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" id="fv-email" name="attachment">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-message">Remarks</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-sm" id="fv-message"
                                                name="remarks" placeholder="Remarks"></textarea>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
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
</script>

@endsection