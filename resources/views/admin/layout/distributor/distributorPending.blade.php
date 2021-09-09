@extends('admin.master')
@section('css')

<style>

.customImg
{
    height: 70px;
    width: 70px;
    border-radius: 50%;
}
</style>

@endsection
@section('content')

@if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Distributor Pending List</h3>
                        </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                   
                                    
                                    <li class="nk-block-tools-opt">
                                        <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="{{route('distributor.add')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Distributor</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                   <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <b>SL</b>
                                            </div>
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Distributor Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Contact</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Zone</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Division</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Base</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($distributors as $key=>$distributor)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                {{$key+1}}
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex" style="background:none;">
                                                <span>
                                                @if(!empty($distributor->image_distributot))
                                                    <img class = "customImg" src="{{ asset('public/assets/images/distributor/'.$distributor->image_distributot) }}" ></span>
                                                @endif
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$distributor->distributor_name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                {{$distributor->mobile}}
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>
                                                {{ Devfaysal\BangladeshGeocode\Models\District::find($distributor->zone)->name }}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class=""></em> <span>
                                                    {{ Devfaysal\BangladeshGeocode\Models\Division::find($distributor->division)->name }}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span></span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg">
                                            <span>
                                                {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($distributor->base)->name }}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-danger">InActive</span>
                                        </td>
                                        
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-success">
                                                <a href="#modalAlert{{ $distributor->id }}" data-toggle="modal" class="btn btn-success">Accept</a>
                                            </span>
                                        </td>
                                        
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">

                                                                <li><a href="{{route('distributor.details' , $distributor->id)}}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>

                                        <!-- Modal Alert -->
                                        <div class="modal fade" tabindex="-1" id="modalAlert{{$distributor->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                                                    <div class="modal-body modal-body-lg text-center">
                                                        <div class="nk-modal">
                                                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                                            <h4 class="nk-modal-title">Congratulations!</h4>
                                                            <div class="nk-modal-text">
                                                                <div class="caption-text">
                                                                    You’ve Accepted <br>
                                                                    <strong>
                                                                        <a href=""></a>
                                                                    </strong> 
                                                                    <a href="" >{{ $distributor->distributor_name }}'s </a>
                                                                    <strong>
                                                                        <a href=""> </a>
                                                                    </strong> 
                                                                    
                                                                    </div>
                                                            </div>
                                                            <div class="nk-modal-action">
                                                                <a href="{{route('distributor.approve' , $distributor->id)}}" class="btn btn-lg btn-mw btn-success" >Confirm</a>
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
                                    </tr><!-- .nk-tb-item  -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- content @e -->


@endsection