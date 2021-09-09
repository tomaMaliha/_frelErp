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


    <!-- @if(Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
    @endif -->


<div class="nk-block nk-block-lg">
<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="title nk-block-title">Distributor Information</h4>
    </div>
</div>
<div class="card">
    <h6 class="title nk-block-title">Distributor Information</h6>
    <div class="card-inner">
        <h4 class="title nk-block-title">Distributor Information</h4><br>
        <form method="post" action="{{route('distributor.moreInfoAdd',$distributors->id)}}" class="form-validate" enctype="multipart/form-data">
            @csrf

            <div class="row g-gs">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Total Credit Limit</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" value="{{$distributors->credit_limit}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Add Credit Limit <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="credit_limit" placeholder="Enter Credit" required>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Collection</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="collection" placeholder="Enter Credit" required>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="#modalAlert{{$distributors->id}}" data-toggle="modal" class="btn btn-outline-primary">Add Credit Limit</a>
                    </div>
                </div>
            </div>

             <!-- Modal Alert -->
             <div class="modal fade" tabindex="-1" id="modalAlert{{$distributors->id}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-lg text-center">
                            <div class="nk-modal">
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                <h4 class="nk-modal-title">Credit Limit Added Successfully!</h4>
                                <div class="nk-modal-text">
                                    <div class="caption-text">
                                        for<br>
                                        <strong>
                                            <a href="">{{ $distributors->distributor_name }} </a>
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
    </div>
</div>
</div><!-- .nk-block -->

@endsection

