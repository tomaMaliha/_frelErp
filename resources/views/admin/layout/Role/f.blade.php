@extends('admin.master')
@section('css')

<style>

.customImg
{
    height: 70px;
    width: 70px;
}

.danger-box{
    background-color: #ffcdd2;
    color:white;
}

/* th-hover{
    color:green;
} */

.nk-tb-item:not(.nk-tb-head):hover, .nk-tb-item:not(.nk-tb-head).seleted
{
    background-color: none;
    color: black;
}

</style>

@endsection
@section('content')



!-- content @s -->
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
                                                <b>SL</b>
                                            </div>
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Product</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Brand</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Price</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Series</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($products as $key=>$product)
                                
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                {{$key+1}}
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex product-distance" style="background:none;" >
                                                <span>
                                                    @if(!empty($product->image))
                                                        <img class = "customImg" src="{{ asset('public/assets/images/product/'.$product->image) }}" ></span>
                                                    @endif
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead ">
                                                        <p >{{$product->name}}</p>
                                                    </span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                 {{App\Category::where('id', $product->sub_category_id)->first()->name}} 
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$product->brand->name}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class=""></em> <span>
                                                    {{$product->distributor_price}}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Taka</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg">
                                            <span>
                                                {{$product->trade_price}}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-success">
                                                {{$product->status}}
                                            </span>
                                        </td>
                                        
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                
                                                                <li><a href="{{route('product.details' , $product->id)}}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                <li><a href="{{route('product.edit',$product->id)}}"><em class="icon ni ni-repeat"></em><span>Edit Products</span></a></li>
                                                                <li><a href="#DeleteModal{{$product->id}}" data-toggle="modal"><em class="icon ni ni-activity-round"></em><span>Delete Product</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->

                                     <!-- Delete Modal -->
                                     <div class="modal fade" tabindex="-1" id="DeleteModal{{$product->id}}">
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
                                                    <a href="{{route('product.delete' , $product->id)}}" class="btn btn-success">Yes, Delete it!</a>
                                                    <a href="#" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a>
                                                    </center>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <span class="sub-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Stock List</h3>
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
                                        <a href="{{route('stock.add')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Stock</span></a>
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
                                        <th class="nk-tb-col"><span class="sub-text">Product Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category Name</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Quantity</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Available</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Damage</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date </span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stocks as $stock)   
                                @if(($stock->stock)<=5)
                                    <tr class="nk-tb-item danger-box" >
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$stock->product->name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        @php
                                            $cat = App\Category::where('id', $stock->product->sub_category_id)->first();
                                        @endphp
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                {{ $cat->name }}
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    {{$stock->quantity}}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Piece</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    {{ $stock->available }}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Piece</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    {{$stock->damage}}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Piece</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    {{$stock->date}}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span></span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                
                                                                <li><a href="#modalLarge{{$stock->id}}" data-toggle="modal"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                <li><a href="{{route('stock.edit' , $stock->id)}}"><em class="icon ni ni-repeat"></em><span>Edit Stock</span></a></li>
                                                                <li><a href="#DeleteModal{{$stock->id}}" data-toggle="modal"><em class="icon ni ni-activity-round"></em><span>Delete Stock</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->
                                    @else
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$stock->product->name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                            
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    {{ $stock->stock }}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Piece</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    <p></p>
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Piece</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    
                                                </span></li>
                                                <li><em class="icon ni"></em> <span>Piece</span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                            <ul class="list-status">
                                                <li><em class="icon text"></em> <span>
                                                    {{ $stock->date }}
                                                </span></li>
                                                <li><em class="icon ni"></em> <span></span></li>
                                            </ul>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                
                                                                <li><a href="#modalLarge{{$stock->id}}" data-toggle="modal"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                <li><a href="{{route('stock.edit' , $stock->id)}}"><em class="icon ni ni-repeat"></em><span>Edit Stock</span></a></li>
                                                                <li><a href="#DeleteModal{{$stock->id}}" data-toggle="modal"><em class="icon ni ni-activity-round"></em><span>Delete Stock</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->
                                    @endif
                                    <!-- View Details Modal -->
                                    <div class="modal fade" tabindex="-1" id="modalLarge{{$stock->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Stock Information</h5>
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                       <b> <p>Product Name : </b> {{$stock->product->name}}</p>
                                                       <b> <p>Category Name : </b> </p>
                                                       <b> <p>Quantity Product : </b> {{$stock->address}}</p>
                                                       <b><p>Available Product: </b>{{$stock->available}}</p>
                                                       <b><p>Damage Product : </b>{{$stock->damage}}</p>
                                                       <b><p>Stock Date : </b>{{$stock->date}}</p>
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <span class="sub-text"><button class="btn btn-secondary"><em class="icon ni ni-files">Print</em></button></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- View Details modal End -->

                                    <!-- Delete Modal -->
                                    <div class="modal fade" tabindex="-1" id="DeleteModal{{$stock->id}}">
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
                                                    <a href="{{route('stock.delete' , $stock->id)}}" class="btn btn-success">Yes, Delete it!</a>
                                                    <a href="#" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</a>
                                                    </center>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <span class="sub-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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