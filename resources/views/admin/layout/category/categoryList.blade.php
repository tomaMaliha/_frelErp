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
            @if(Session::has('msg'))
                <p class="alert alert-icon alert-success">{{ Session::get('msg') }}</p>
            @endif
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">

                        

                        <!-- Modal -->
                        <div class="modal fade" tabindex="-1" id="modalForm">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Category</h5>
                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('category.create')}}" class="form-validate is-alter">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="full-name" >Category <span style="top:-5px; color:red;">*</span></label reqired>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name" class="form-control" id="fv-email" placeholder="Category Name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Sub Category</label>
                                                <div class="form-control-wrap">
                                                <select id="categoryName" name="sub_category" data-placeholder="Select a option" >
                                                    <option value="0">Main Category</option>
                                                    @foreach($categories as $category)
                                                    @if($category->sub_category == 0)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="fv-message">Description</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control form-control-sm" id="fv-message" name="description" placeholder="Write Description...."></textarea>
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

                        <h3 class="nk-block-title page-title">Category List</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        
                                        <li class="nk-block-tools-opt">
                                            <a href="{{route('user.add')}}" class="btn btn-icon btn-primary d-md-none" data-toggle="modal"><em class="icon ni ni-plus"></em></a>
                                            <a href="" class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-plus"></em><span>Add New Category</span></a>
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
                                        <th class="nk-tb-col"><span class="sub-text">Category Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Description</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Parent Category</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key=>$category)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                {{$key+1}}
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$category->name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                @if ($category->description == null)
                                                    -
                                                @else
                                                    {{ $category->description }}
                                                @endif
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>
                                                @if ($category->sub_category == 0)
                                                    -
                                                @else
                                                    {{ $category->parent->name }}
                                                @endif
                                            </span>
                                        </td>
                                        @if($category->status==1)
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-success">Active</span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-danger">InActive</span>
                                        </td>
                                        @endif
                                        @if($category->status)
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('active', $category->id) }}" method="post">
                                        @csrf
                                            <span>
                                            <button type="submit" class="btn btn-outline-warning">InActive</button>
                                            </form>
                                            </span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('active', $category->id) }}" method="post">
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
                                                            <li><a href="#modalLarge{{$category->id}}" data-toggle="modal"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                            <li><a href="#UpdateModal{{$category->id}}" data-toggle="modal"><em class="icon ni ni-repeat"></em><span>Edit Category</span></a></li>
                                                            <!-- <li><a href="#DeleteModal{{$category->id}}" data-toggle="modal"><em class="icon ni ni-activity-round"></em><span>Delete</span></a></li> -->
                                                            <li><a href="{{route('category.single.print' , $category->id)}}"><em class="icon ni ni-repeat"></em><span>Print Category</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->
                                    <!-- Modal -->
                                    <div class="modal fade" tabindex="-1" id="modalLarge{{$category->id}}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Category Information</h5>
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <b> <p>Category Name : </b> {{$category->name}}</p>
                                                    <b> <p>Parent Category : </b>
                                                    @if ($category->sub_category == 0)
                                                        -
                                                    @else
                                                        {{ $category->parent->name }}
                                                    @endif</p>
                                                    <b> 
                                                        <p>Description : </b> 
                                                        @if ($category->description == null)
                                                            No Description Added
                                                        @else
                                                            {{ $category->description }}
                                                        @endif
                                                    </p>

                                                    <b><p>Status: </b>
                                                    @if($category->status == 0)
                                                    <span class="tb-status text-danger">Inactive</span>
                                                    @else
                                                    <span class="tb-status text-success">Active</span>
                                                    @endif
                                                    </p>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <span class="sub-text"><button class="btn btn-secondary"><em class="icon ni ni-files">Print</em></button></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal End -->
                                    <!-- Update Modal -->
                                    <div class="modal fade" tabindex="-1" id="UpdateModal{{$category->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Category</h5>
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <em class="icon ni ni-cross"></em>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{route('category.update', $category->id)}}" class="form-validate is-alter">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Category <span style="top:-5px; color:red;">*</span></label reqired>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="full-name" name="name" value="{{$category->name}}" required>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-message">Description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control form-control-sm" id="fv-message" name="description" placeholder="Write Description" required>{{$category->description}}</textarea>
                                                            </div> 
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Parent Category</label>
                                                            <div class="form-control-wrap">
                                                            <select class="form-control form-select" id="fv-topics" name="sub_category" data-placeholder="Select a option" >
                                                                <option value="0">Main Category</option>
                                                                @foreach($categories as $cat)
                                                                    <option value="{{ $cat->id }}" @if($cat->id == $category->sub_category) selected @endif>{{ $cat->name }}</option>
                                                                @endforeach
                                                            </select>
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

@section('js')

<script type="text/javascript">

    $("#categoryName").select2({
    });
    // swal('Good Job' , 'Data Saved Successfully');
</script>

@endsection