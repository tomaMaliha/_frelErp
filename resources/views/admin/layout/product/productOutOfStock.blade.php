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
                            <h3 class="nk-block-title page-title">Product List</h3>
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
                                        <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="{{route('product.add')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Product</span></a>
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
                                        <th class="nk-tb-col"><span class="sub-text">Product</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Brand</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Sale Price</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Series of Product</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                <span><img class = "customImg" src="{{ asset('public/assets/images/product/'.$product->image) }}" ></span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$product->name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                {{$product->category->name}}
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$product->brand->name}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class=""></em> <span>
                                                    {{$product->sale_price}}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Taka</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg">
                                            <span>
                                                {{$product->series}}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-danger">InActive</span>
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-success">
                                                <a href="{{route('product.active',$product->id)}}" class="btn btn-success">Active</a>
                                            </span>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                <li><a href="{{route('product.edit',$product->id)}}"><em class="icon ni ni-repeat"></em><span>Edit Products</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
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


@extends('admin.master')
@section('css')

<style>

.customImg
{
    height: 70px;
    width: 70px;
}

.tb_range
{
    width: 10%;
}

.product-distance
{
    width: 50px;
}

.button_side
{
    float: right;
}



</style>

@endsection
@section('content')


<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                        <center><h6 class="title nk-block-title">Product List</h6><hr></center><br>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt button_side">
                                                <a href="{{route('product.add')}}" class="btn btn-icon btn-primary d-md-none" ><em class="icon ni ni-plus"></em></a>
                                                <a href="{{route('product.add')}}" class="btn btn-primary d-none d-md-inline-flex" ><em class="icon ni ni-plus"></em><span>Add New Product</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <form method="post" action="{{route('product.search')}}" class="form-validate" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Category</label>
                                        <div class="form-control-wrap ">
                                        <select id="category_name" name="sub_category_id" data-placeholder="Select a option" >
                                            @foreach($categories as $category)
                                                @if($category->sub_category != 0)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Product</label>
                                        <div class="form-control-wrap ">
                                        <select id="product_name" name="product_id" data-placeholder="Select a option" >
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
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
                          
                            <!-- content @s -->
                            @if($products->count() > 0)
                                <div class="nk-content-body">
                                    <div class="nk-block">
                                        <div class="card card-stretch">
                                            <div class="card-inner-group">
                                                <hr>
                                                <div class="card-inner p-0">
                                                    <div class="nk-tb-list nk-tb-ulist is-compact">
                                                        <div class="btn-wrap">
                                                            <!-- <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled" style="background:red; color:black;"><b>print</b></button></span>
                                                            <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span> -->
                                                        </div>
                                                    <div class="nk-tb-item nk-tb-head">
                                                            
                                                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">Product Name</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Category</span></div>
                                                            <div class="nk-tb-col tb-col-sm"><span class="sub-text">Distributor Price</span></div>
                                                            
                                                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">Description</span></div>
                                                            <div class="nk-tb-col"><span class="sub-text">Status</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></div>
                                                            <div class="nk-tb-col nk-tb-col-tools text-right">
                                                                
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                        @foreach($products as $key=>$product)

                                                        <div class="nk-tb-item">
                                                            
                                                            <div class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar xs bg-primary" style="background:none;">
                                                                        <span>
                                                                        @if(!empty($product->image))
                                                                            <img class = "customImg" src="{{ asset('public/assets/images/product/'.$product->image) }}" ></span>
                                                                        @endif
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">{{ $product->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span>
                                                                    {{ $product->category->name }}
                                                                </span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span>
                                                                    {{ $product->distributor_price }}
                                                                </span>
                                                            </div>
                                                            
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span>
                                                                @if( $product->description == null )
                                                                    -
                                                                @else
                                                                    {{ $product->description }}
                                                                @endif
                                                                </span>
                                                            </div>
                                                            
                                                            @if($product->status==1)
                                                            <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-status text-success">Active</span>
                                                            </div>
                                                            @else
                                                            <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-status text-danger">InActive</span>
                                                            </div>
                                                            @endif
                                                            
                                                            <div class="nk-tb-col">
                                                                @if($product->status)
                                                                    <form action="{{ route('product.active', $product->id) }}" method="post">
                                                                    @csrf
                                                                        <span>
                                                                            <button type="submit" class="btn btn-warning btn-sm">InActive</button>
                                                                        </span>
                                                                    </form>
                                                                @else
                                                                    <form action="{{ route('product.active', $product->id) }}" method="post">
                                                                    @csrf
                                                                        <span>
                                                                            <button type="submit" class="btn btn-success btn-sm">Active</button>
                                                                        </span>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                            <!-- <li><a href="{{route('product.details' , $product->id)}}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li> -->
                                                                            <li><a href="{{route('product.edit',$product->id)}}"><em class="icon ni ni-repeat"></em><span>Edit Products</span></a></li>
                                                                            
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                        @endforeach
                                                    </div><!-- .nk-tb-list -->
                                                </div><!-- .card-inner -->
                                                <div class="card-inner">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                        
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                    </ul><!-- .pagination -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-inner-group -->
                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->
                                </div>
                            @endif
                            <!-- content @e -->
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

        $("#category_name").select2({
        });
        
        $("#product_name").select2({
        });
</script>

@endsection