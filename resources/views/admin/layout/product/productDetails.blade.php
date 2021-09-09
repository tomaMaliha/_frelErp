@extends('admin.master')
@section('css')

<style type="text/css">
    .heading {
        font-family: "Montserrat", Arial, sans-serif;
        font-size: 4rem;
        font-weight: 500;
        line-height: 1.5;
        text-align: center;
        padding: 3.5rem 0;
        color: #1a1a1a;
    }

    .heading span {
        display: block;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        /* Compensate for excess margin on outer gallery flex items */
        margin: -1rem -1rem;
    }

    .gallery-item {
        /* Minimum width of 24rem and grow to fit available space */
        flex: 1 0 24rem;
        /* Margin value should be half of grid-gap value as margins on flex items don't collapse */
        margin: 1rem;
        box-shadow: 0.3rem 0.4rem 0.4rem rgba(0, 0, 0, 0.4);
        overflow: hidden;
    }

    .gallery-image {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 400ms ease-out;
    }

    .gallery-image:hover {
        transform: scale(1.15);
    }

    
    @supports (display: grid) {
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(24rem, 1fr));
            grid-gap: 2rem;
        }

        .gallery,
        .gallery-item {
            margin: 0;
        }
    }
    .custom-avatar {
        width: 50px!important;
        height: auto!important;
    }
    .custom-avatar img {
        border-radius: 3px;
    }
    .card-body {
        padding: 0px!important;
    }
    .link-list-opt .custom_btn .icon {
        font-size: 1.125rem;
        width: 1.75rem;
        opacity: .8;
        margin-right: 3px;
    }
    .link-list-opt .custom_btn:hover {
        color: #854fff;
        background: #f5f6fa;
    }
    .link-list-opt .custom_btn:focus {
        outline: none;
    }
    .link-list-opt .custom_btn {
        display: flex;
        align-items: center;
        padding: .625rem 1.0rem;
        font-size: 12px;
        font-weight: 500;
        color: #526484;
        transition: all .4s;
        line-height: 1.3rem;
        position: relative;
        background: transparent;
        border: none;
        width: -webkit-fill-available;
    }
    .view_img {
        max-width: 100%!important;
        /*margin: 1.75rem!important;*/
        justify-content: center;
    }
    .view_img_modal {
        padding-right: 0px!important;
    }
    .custom-banner-row {
        padding: 20px;
    }
    .tb-lead {
        font-size: 12px;
        font-weight: 400;
    }
    .custom_date {
        font-size: 12px!important;
    }
    .custom-user-card {
        display: contents;
    }
    .custom-user-info {
        margin-top: 5px;
        margin-left: 0px!important;
    }
    .small-txt {
        margin-bottom: 10px;
        color: #b7c2d0;
        font-style: italic;
    }
    .borderless td, .borderless th {
        border: none;
    }
    .borderless td {
        padding: 2px 10px;
    }
    .page-title {
        font-size: 17px!important;
    }
    .nk-tb-list td {
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>

@endsection
@section('content')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title" style="font-size: 25px;">Product Information</h3>
                        </div><!-- .nk-block-head-content -->
                        {{-- <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="more-options">
                                    <ul class="nk-block-tools g-3">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <span class="badge badge-dark" style="font-size: 14px; padding: 5px;">Product ID: <small>{{ $products->id }}</small></span>
                        <div class="card-inner">
                            <h6 class="page-title">Product</h6>
                            <div class="float-left">
                                <table class="table borderless" >
                                    <tr style="vertical-align: initial;">
                                        <td><b>Name</b></td>
                                        <td><b>:</b></td>
                                        <td>{{ $products->name }}</td>
                                    </tr>
                                    
                                    <tr style="vertical-align: initial;">
                                        <td><b>Brand</b></td>
                                        <td><b>:</b></td>
                                        <td>
                                            @if($products->brand->name == NULL)
                                                -
                                                @else
                                                {{ $products->brand->name}}
                                                @endif</td>
                                            
                                    </tr>
                                    <tr style="vertical-align: initial;">
                                        <td><b>Category</b></td>
                                        <td><b>:</b></td>
                                        <td>
                                            @if ($products->category->parent_id != null)
                                            {{ App\Category::where('id', $products->category->parent_id)->first()->name }}, 
                                            @endif
                                            {{ $products->category->name }}
                                    </td>
                                    </tr>
                                    <tr style="vertical-align: initial;">
                                        <td><b>Quantity</b></td>
                                        <td><b>:</b></td>
                                        <td>
                                            {{ $products->stock->stock }} Pcs
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: initial;">
                                        <td><b>Alert Quantity</b></td>
                                        <td><b>:</b></td>
                                        <td>
                                            <span style="color: red; "><b> {{ $products->stock->alert_quantity }} Pcs</b></span>
                                        </td>
                                    </tr>
                                </table>
                                <h6 class="page-title mt-3">Others</h6>
                                <table class="table borderless" >
                                    
                                    <tr style="vertical-align: initial;">
                                        <td><b>Distributor Price</b></td>
                                        <td><b>:</b></td>
                                        <td> &#2547; {{ $products->distributor_price }} </td>
                                    </tr>
                                    <tr style="vertical-align: initial;">
                                        <td><b>Trade Price</b></td>
                                        <td><b>:</b></td>
                                        <td> &#2547; {{ $products->trade_price }}</td>
                                    </tr>
                                    <tr style="vertical-align: initial;">
                                        <td><b>Corporate Price</b></td>
                                        <td><b>:</b></td>
                                        <td> &#2547;
                                            {{ $products->corporate_price }}
                                        </td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="color: rgb(69, 165, 50)"><b>
                                                
                                            </b></td>
                                        </tr>
                                        
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="float-right">
                                <table class="table borderless" >
                                    <tr style="vertical-align: initial;">
                                        <td><b>Bar Code</b></td>
                                        <td><b>:</b></td>
                                        <td>
                                            {{ $products->bar_code }}
                                       
                                    </td>
                                    </tr>
                                    <tr style="vertical-align: initial;">
                                        <td><b>Product Code</b></td>
                                        <td><b>:</b></td>
                                        <td>
                                       
                                            {{ $products->product_code }}
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                            <div class="orders_product_list_div mt-3">
                                <h6 class="page-title">Product Image</h6>
                                <table class="nk-tb-list nk-tb-ulist table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$products->name}}</td>
                                            <td>
                                                @if ($products->category->sub_category != null)
                                                {{ App\Category::where('id', $products->category->sub_category)->first()->name }}, 
                                                @endif
                                                {{ $products->category->name }}
                                            </td>
                                            <td>
                                                
                                                <img src="{{ asset('public/assets/images/product/'.$products->image) }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                                    
                                            <br></td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Description</b></td>
                                            <td colspan="2">
                                            @if($products->description == NULL)
                                                -
                                                @else
                                                {{ $products->description}}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-preview -->
            </div>
        </div>
    </div>
</div>

@endsection



   
   