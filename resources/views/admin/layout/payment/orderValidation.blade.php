@extends('admin.master')
@section('css')

<style>

.customImg
{
    height: 70px;
    width: 70px;
    border-radius: 80%;
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


        @if(Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
        @endif
        
                <h3 class="nk-block-title page-title">User List</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-search"></em>
                                    </div>
                                    <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                </div>
                            </li>
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-toggle="dropdown">Status</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><span>On Hold</span></a></li>
                                            <li><a href="#"><span>Delevired</span></a></li>
                                            <li><a href="#"><span>Rejected</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nk-block-tools-opt">
                                <a href="{{route('user.add')}}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <a href="{{route('user.add')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New User</span></a>
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
                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                <label class="custom-control-label" for="uid"></label>
                                            </div>
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Contact</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Company Name</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date of Join</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                               @foreach($users as $user)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid1">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                <span><img class = "customImg" src="{{ asset('public/assets/images/user/'.$user->image) }}" ></span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$user->name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                {{$user->contact}}
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>
                                                {{$user->companyName}}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text-success ni ni-check-circle"></em> <span>
                                                {{$user->joinDate}}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span></span></li>
                                            </ul>
                                        </td>
                                        @if($user->status==1)
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-success">Active</span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-danger">InActive</span>
                                        </td>
                                        @endif
                                        @if($user->status)
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('user.active', $user->id) }}" method="post">
                                        @csrf
                                            <span>
                                            <button type="submit" class="btn btn-warning">InActive</button>
                                            </form>
                                            </span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('user.active', $user->id) }}" method="post">
                                        @csrf
                                            <span>
                                            <button type="submit" class="btn btn-success">Active</button>
                                            </form>
                                            </span>
                                        </td>
                                        @endif
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                
                                                                <li><a href="#modalLarge{{$user->id}}" data-toggle="modal"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                <li><a href="{{route('user.edit',$user->id)}}"><em class="icon ni ni-repeat"></em><span>Edit User</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->

                                     <!-- Modal -->
                                        <div class="modal fade" tabindex="-1" id="modalLarge{{$user->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">User Information</h5>
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                            
                                                        <p>Image : <img class = "customImg" src="{{ asset('public/assets/images/user/'.$user->image) }}" ></p>
                                                        <p>Name : {{$user->name}}</p>
                                                        <p>Contact : {{$user->contact}}</p>
                                                        <p>Address : {{$user->address}}</p>
                                                        <p>Email : {{$user->email}}</p>
                                                        <p>Company Name : {{$user->name}}</p>
                                                        <p>Role : {{$user->role}}</p>
                                                        <p>Status : {{$user->status}}</p>
                                                        <p>Date of Birth : {{$user->dob}}</p>
                                                        <p>Join Date : {{$user->joinDate}}</p>
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <span class="sub-text">Modal Footer Text</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- modal End -->
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