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





<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">


                       
                        <div class="card-body">
                            @include('admin.partials.alert')
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" tabindex="-1" id="modalForm">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Role</h5>
                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('role.create')}}" class="form-validate is-alter">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Role</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="full-name" name="name" placeholder="General Manager" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="fv-message">Description</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control form-control-sm" id="fv-message" name="description" placeholder="Write Description"></textarea>
                                                </div> 
                                            </div>
                                        
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <span class="sub-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal End -->

                        <h3 class="nk-block-title page-title">Role List</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                    
                                        <li class="nk-block-tools-opt">
                                            <a href="{{route('user.add')}}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                            <a href="{{route('role.add')}}" class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-plus"></em><span>Add New Role</span></a>
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
                                            SL
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Role Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Desciption of Role</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key=>$role)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            {{ $key+1 }}
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$role->name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                {{$role->description}}
                                            <span class="currency"></span></span>
                                        </td>
                                        @if($role->status==1)
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-success">Active</span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-danger">InActive</span>
                                        </td>
                                        @endif
                                        @if($role->status)
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('role.active', $role->id) }}" method="post">
                                        @csrf
                                            <span>
                                            <button type="submit" class="btn btn-outline-warning">InActive</button>
                                            </form>
                                            </span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('role.active', $role->id) }}" method="post">
                                        @csrf
                                            <span>
                                            <button type="submit" class="btn btn-outline-success">Active</button>
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
                                                                
                                                                <li><a href="#updateModal{{$role->id}}" data-toggle="modal">
                                                                    <em class="icon ni ni-repeat"></em><span>Edit Role</span></a>
                                                                </li>
                                                                <li><a href="#DeleteModal{{$role->id}}" data-toggle="modal">
                                                                    <em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" tabindex="-1" id="DeleteModal{{$role->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Product</h5>
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <center> <p><h3>Are you sure?</h3><br>
                                                        You won't be able to revert this!</p>
                                                    <a href="{{route('role.delete' , $role->id)}}" class="btn btn-success">Yes, Delete it!</a>
                                                    <a href="#" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a>
                                                    </center>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <span class="sub-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    
                                    <!-- Update Modal -->
                                    <div class="modal fade" tabindex="-1" id="updateModal{{$role->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Role</h5>
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{route('role.update' , $role->id)}}" class="form-validate is-alter">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Role</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-control form-select" id="fv-topics" name="name" data-placeholder="Select a option" required>
                                                                    @foreach($roles as $rol)
                                                                        <option value="{{$rol->name}}" @if($rol->id == $role->id)  selected @endif> {{$rol->name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-message">Description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control form-control-sm" id="fv-message" name="description" >{{$role->description}}</textarea>
                                                            </div> 
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-outline-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <span class="sub-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Update modal End -->
                                    
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