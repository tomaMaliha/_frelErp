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
                            <h3 class="nk-block-title page-title">Brand</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <!-- <li class="nk-block-tools-opt">
                                            <a href="{{route('brand.create')}}" class="btn btn-icon btn-primary d-md-none modal" data-toggle="modal" data-target="#mymodel"><em class="icon ni ni-plus"></em></a>
                                            <a href="" class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-plus"></em><span>Add Brand</span></a>
                                        </li> -->
                                        <li class="nk-block-tools-opt">
                                            <a href="{{route('brand.create')}}" class="btn btn-icon btn-primary d-md-none modal" data-toggle="modal" data-target="#mymodel"><em class="icon ni ni-plus"></em></a>
                                            <a data-toggle="modal" data-target="#mymodel"  class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Brand</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <!-- Modal -->
                <div class="modal fade" tabindex="-1" id="mymodel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Brand </h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('brand.create')}}" class="form-validate is-alter" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Brand <span style="top:-5px; color:red;">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="name" class="form-control" id="fv-email" placeholder="Brand Name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="fv-message">image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" id="fv-email" name="image">
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary">Save Informations</button>
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
                                        <th class="nk-tb-col"><span class="sub-text">Image</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $key => $brand)
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
                                                @if(!empty($brand->image))
                                                    <img class = "customImg" src="{{ asset('public/assets/images/brand/'.$brand->image) }}" ></span>
                                                @endif
                                                
                                            </div>
                                            
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>
                                            {{$brand->name}}
                                        </span>
                                    </td>
                                    @if( $brand->status == 1)
                                        <td class="nk-tb-col">
                                            <span class="tb-status text-success">Enable</span>
                                        </td>
                                    @else
                                        <td class="nk-tb-col">
                                            <span class="tb-status text-danger">Disable</span>
                                        </td>
                                    @endif
                                    {{-- <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            
                                                            <li><a href="#UpdateModal{{$brand->id}}" data-toggle="modal"><em class="icon ni ni-repeat"></em><span>Edit Brand</span></a></li>
                                                            <li><a href="{{route('brand.single.print' , $brand->id)}}"><em class="icon ni ni-repeat"></em><span>Print Brand</span></a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td> --}}
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            
                                                @if ($brand->status)
                                                    <li class="nk-tb-action-hidden">
                                                        <form action="{{ route('brand.status', $brand->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Disable">
                                                                <em class="icon ni ni-cross-circle-fill"></em>
                                                            </button>
                                                        </form>
                                                        
                                                    </li>
                                                @else
                                                    <li class="nk-tb-action-hidden">
                                                        <form action="{{ route('brand.status', $brand->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Enable">
                                                                <em class="icon ni ni-check-circle-fill"></em>
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="#viewModal{{ $brand->id }}" data-toggle="modal">
                                                                    <em class="icon ni ni-eye"></em><span>View</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#UpdateModal{{$brand->id}}" data-toggle="modal">
                                                                    <em class="icon ni ni-link-alt"></em>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#deleteModal{{ $brand->id }}" data-toggle="modal">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Remove</span>
                                                                </a>
                                                            </li>

                                                            {{-- <li class="divider"></li>
                                                            <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend</span></a></li> --}}
                                                        </ul>
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr><!-- .nk-tb-item  -->

                                <!-- Update Modal -->
                                <div class="modal fade" tabindex="-1" id="UpdateModal{{$brand->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Brand Information</h5>
                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('brand.update',$brand->id)}}" class="form-validate is-alter" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Brand</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="full-name" name="name" value="{{$brand->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Image</label>
                                                        <div class="form-control-wrap">
                                                        @if(!empty($brand->image))
                                                            <img src="{{asset('public/assets/images/brand/' . $brand->image)}}" style="width: 200px;">
                                                            @endif
                                                            <input type="file" class="form-control" id="full-name" name="image">
                                                            <input type="hidden" class="form-control" id="full-name" name="image" value="{{$brand->image}}">
                                                        
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer bg-light">
                                                <span class="sub-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Update Modal -->
                                <!-- Delete Modal start -->
                                <div class="modal fade" tabindex="-1" id="deleteModal{{ $brand->id }}">
                                    <div class="modal-dialog modal-dialog-top" role="document">
                                        <div class="modal-content">
                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                <em class="icon ni ni-cross"></em>
                                            </a>
                                            <div class="modal-header">
                                                <h5 class="modal-title">Are you sure to delete?</h5>
                                            </div>
                                            {{-- <div class="modal-body">
                                                
                                            </div> --}}
                                            <div class="modal-footer">
                                                <form action="{{ route('brand.delete', $brand->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger" style="font-size: 13px;">YES, delete permanently</button>
                                                </form>
                                                <button type="button" class="btn btn-success" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal end -->
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