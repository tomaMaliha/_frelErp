@extends('admin.master')
@section('css')

<style>

.customImg
{
    height: 70px;
    width: 70px;
    
}
</style>

@endsection
@section('content')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Bank</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <a href="{{route('bank.create')}}" class="modal" data-toggle="modal" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                            <a data-toggle="modal" data-target="#mymodel" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Bank</span></a>
                        </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <!-- Modal -->
                <div class="modal fade" tabindex="-1" id="mymodel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Bank </h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('bank.create')}}" class="form-validate is-alter" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Bank Name <span style="top:-5px; color:red;">*</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name" class="form-control" id="fv-email" placeholder="Sonali Bank" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Account Number </label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="account_number" class="form-control" id="fv-email" placeholder="190 834 234 27">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Concerned Person </label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="concerned_person" class="form-control" id="fv-email" placeholder="Md. A Alam">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Contact Number </label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="contact" class="form-control" id="fv-email" placeholder="017XXXXXXXX">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Bank Address </label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="address" class="form-control" id="fv-email" placeholder="35-42,44 Motijheel C/A Dhaka -1000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fv-message">Logo</label>
                                                <div class="form-control-wrap">
                                                    <input type="file" class="form-control" id="fv-email" name="logo">
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-primary">Save Informations</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer bg-light">
                                <span class="sub-text"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal End -->

                <div class="nk-block">
                    <div class="card card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Banks</h5>
                                    </div>
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-tnx">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            SL
                                        </div>
                                        <div class="nk-tb-col"><span>LOGO</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Bank Name</span></div>
                                        <div class="nk-tb-col tb-col-sm"><span>Account Number</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Concerned Person</span></div>
                                        <div class="nk-tb-col"><span>Contact Number</span></div>
                                        <div class="nk-tb-col"><span>Address</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    
                                    @foreach($banks as $key=>$bank)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            {{ $key+1 }}
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead"><a href="#">
                                                @if(!empty($bank->logo))
                                                    <img class = "customImg" src="{{ asset('public/assets/images/bank/'.$bank->logo) }}" ></span>
                                                @endif
                                            </a></span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub">
                                                {{ $bank->name }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <span class="tb-sub">
                                                {{ $bank->account_number }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub text-primary">
                                                {{ $bank->concerned_person }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">
                                                {{ $bank->contact }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">
                                                {{ $bank->address }}
                                            </span>
                                        </div>
                                        @if($bank->status == 1)
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-success">Active</span>
                                        </div>
                                        @else
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-danger">Inactive</span>
                                        </div>
                                        @endif
                                        @if($bank->status)
                                        <div class="nk-tb-col tb-col-md">
                                        <form action="{{ route('bank.active', $bank->id) }}" method="post">
                                        @csrf
                                            <span>
                                                <button type="submit" class="btn btn-outline-warning">InActive</button>
                                            </form>
                                            </span>
                                        </div>
                                        @else
                                        <div class="nk-tb-col tb-col-md">
                                        <form action="{{ route('bank.active', $bank->id) }}" method="post">
                                        @csrf
                                            <span>
                                                <button type="submit" class="btn btn-outline-success">Active</button>
                                            </form>
                                            </span>
                                        </div>
                                        @endif
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                
                                            </ul>
                                        </td>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown mr-n1">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#mymodel{{ $bank->id }}" data-toggle="modal"><em class="icon ni ni-repeat"></em><span>Edit Bank</span></a></li>
                                                                <li><a href=""><em class="icon ni ni-repeat"></em><span>Print Bank Information</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-tb-item -->

                                    <!-- Update Modal -->
                                    <div class="modal fade" tabindex="-1" id="mymodel{{ $bank->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Bank Information </h5>
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{route('bank.update' ,$bank->id)}}" class="form-validate is-alter" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row g-gs">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="full-name">Bank Name <span style="top:-5px; color:red;">*</span></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="name" class="form-control" id="fv-email" value="{{ $bank->name }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="full-name">Account Number </label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="account_number" class="form-control" id="fv-email" value="{{ $bank->account_number }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="full-name">Concerned Person </label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="concerned_person" class="form-control" id="fv-email" value="{{ $bank->concerned_person }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="full-name">Contact Number </label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="contact" class="form-control" id="fv-email" value="{{ $bank->contact }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="full-name">Bank Address </label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="address" class="form-control" id="fv-email" value="{{ $bank->address }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fv-message">Logo</label>
                                                                    <div class="form-control-wrap">
                                                                    @if(!empty($product->image))
                                                                        <img src="{{asset('public/assets/images/bank/' . $bank->logo)}}" style="width: 200px;">
                                                                    @endif
                                                                        <input type="file" class="form-control" id="full-name" name="logo">
                                                                        <input type="hidden" class="form-control" id="full-name" name="logo" value="{{$bank->logo}}">
                                                                    </div> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-outline-primary">Update changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <span class="sub-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Update Modal End -->
                                    @endforeach
                                   
                                </div><!-- .nk-tb-list -->
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

@endsection