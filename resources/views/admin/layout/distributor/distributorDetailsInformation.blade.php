@extends('admin.master')
@section('css')

<style>

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

@section('content')
     <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title" style="font-size: 25px;">Distributor Information</h3>
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
                        	<span class="badge badge-dark" style="font-size: 14px; padding: 5px;">Distorbutor Code: <small>{{ $distributors->random_number }}</small></span>
                            <div class="card-inner">
                            	<h6 class="page-title">Distributor</h6>
                                <div class="float-left">
                                	<table class="table borderless" >
                                        <tr style="vertical-align: initial;">
                                            <td><b>Name</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $distributors->distributor_name }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Distributor Point</b></td>
                                            <td><b>:</b></td>
                                            <td><b>{{ Devfaysal\BangladeshGeocode\Models\Upazila::find($distributors->base)->name }} , 
                                                {{ Devfaysal\BangladeshGeocode\Models\District::find($distributors->zone)->name }} , 
                                                {{ Devfaysal\BangladeshGeocode\Models\Division::find($distributors->division)->name }}</b></td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Name</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $distributors->proprietor_name }}</td>
                                        </tr>
                                        
                                        <tr style="vertical-align: initial;">
                                            <td><b>Father/Husabnd Name</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $distributors->fat_hus_name }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Present Address</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                
                                                {{ $distributors->proprietor_present_address }}
                                        </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Present PO</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                            	{{ $distributors->proprietor_present_PO }} Pcs
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Present Thana</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                            	<span>{{ $distributors->proprietor_present_thana }} </span>
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Present District</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                            	<span>{{ $distributors->proprietor_present_district }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <h6 class="page-title mt-3">Others</h6>
                                    <table class="table borderless" >
                                        <tr style="vertical-align: initial;">
                                            <td><b>Mobile </b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $distributors->mobile }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Alternate Mobile</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $distributors->mobileALT }} </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Telephone (Office)</b></td>
                                            <td><b>:</b></td>
                                            <td>{{ $distributors->telephone_office }}</td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Telephone (House)</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                {{ $distributors->telephone_house }}
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Fax</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                {{ $distributors->fax }}
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Credit Limit</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                <b style="color: blue;"> &#2547; {{ $distributors->credit_limit}}</b>
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Distributor Payment</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                <b style="color: blue;"> &#2547; {{ $distributors->distributor_payment}}</b>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="float-right">
                                	<table class="table borderless" >
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Permanent District</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                            {{ $distributors->proprietor_permanent_address }}
                                        </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Permanent PO</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                {{ $distributors->proprietor_permanent_PO }}
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Permanent Thana</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                {{ $distributors->proprietor_permanent_thana }}
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: initial;">
                                            <td><b>Proprietor Permanent District</b></td>
                                            <td><b>:</b></td>
                                            <td>
                                                {{ $distributors->proprietor_permanent_district }}
                                            </td>
                                        
                                       
                                    </table>
                              
                                </div>
                                <div class="clearfix"></div>
                                <div class="orders_product_list_div mt-3">
	                            	<h6 class="page-title">Distributor Images</h6>
	                            	<table class="nk-tb-list nk-tb-ulist table-bordered">
	                            		<thead>
	                            			<tr>
		                            			<th>#</th>
		                            			<th>Image</th>
		                            			<th>Image Nominee</th>
		                            			<th>Image Trade</th>
		                            			<th>Image NID</th>
		                            			<th>Image Form</th>
		                            		</tr>
	                            		</thead>
	                            		@php
	                            			$num = 1;
	                            		@endphp
	                            		<tbody>

                                          
                                            <tr>
                                                <td>{{$num}}</td>
                                            
                                                <td>
                                                    <a href="#viewModal{{ $distributors->id }}" data-toggle="modal">
                                                        <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_distributot) }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                                    </a>
                                                </td>
                                            
                                                <td>
                                                    <a href="#viewModal2{{ $distributors->id }}" data-toggle="modal">
                                                        <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_nominee) }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="#viewModal3{{ $distributors->id }}" data-toggle="modal">
                                                        <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_trade) }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                                    </a>  
                                                <br></td>
                                                <td>
                                                    <a href="#viewModal4{{ $distributors->id }}" data-toggle="modal">
                                                        <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_nid) }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                                    </a>
                                                <br></td>
                                                <td>
                                                    <a href="#viewModal5{{ $distributors->id }}" data-toggle="modal">
                                                        <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_form) }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                                    </a>
                                                <br></td>
                                            </tr>
                                            <tr style="vertical-align: initial;">
                                                <td><b>Credit Limit</b></td>
                                                <td><b>:</b></td>
                                                <td colspan="4">
                                                @if($distributors->credit_limit == NULL)
                                                    <b> - </b>
                                                @else
                                                    <b style="color: blue;"> &#2547; {{ $distributors->credit_limit}}</b>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: initial;">
                                                <td><b>Distributor Paymanet</b></td>
                                                <td><b>:</b></td>
                                                <td colspan="4">
                                                @if($distributors->distributor_payment == NULL)
                                                    <b> - </b>
                                                @else
                                                    <b style="color: blue;"> &#2547; {{ $distributors->distributor_payment}}</b>
                                                @endif
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: initial;">
                                                <td><b>Description</b></td>
                                                <td><b>:</b></td>
                                                <td colspan="4">
                                                @if($distributors->comment == NULL)
                                                    -
                                                @else
                                                    {{ $distributors->comment}}
                                                @endif
                                                </td>
                                            </tr>
                                            <!-- view Modal start -->
                                            <div class="modal fade view_img_modal" tabindex="-1" id="viewModal{{ $distributors->id }}">
                                                <div class="modal-dialog view_img" role="document">
                                                    <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_distributot) }}">
                                                </div>
                                            </div>
                                            <!-- view Modal end -->
                                            <!-- view Modal start -->
                                            <div class="modal fade view_img_modal" tabindex="-1" id="viewModal2{{ $distributors->id }}">
                                                <div class="modal-dialog view_img" role="document">
                                                    <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_nominee) }}">
                                                </div>
                                            </div>
                                            <!-- view Modal end -->
                                            <!-- view Modal start -->
                                            <div class="modal fade view_img_modal" tabindex="-1" id="viewModal3{{ $distributors->id }}">
                                                <div class="modal-dialog view_img" role="document">
                                                    <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_trade) }}">
                                                </div>
                                            </div>
                                            <!-- view Modal end -->
                                            <!-- view Modal start -->
                                            <div class="modal fade view_img_modal" tabindex="-1" id="viewModal4{{ $distributors->id }}">
                                                <div class="modal-dialog view_img" role="document">
                                                    <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_nid) }}">
                                                </div>
                                            </div>
                                            <!-- view Modal end -->
                                            <!-- view Modal start -->
                                            <div class="modal fade view_img_modal" tabindex="-1" id="viewModal5{{ $distributors->id }}">
                                                <div class="modal-dialog view_img" role="document">
                                                    <img src="{{ asset('public/assets/images/distributor/'.$distributors->image_form) }}">
                                                </div>
                                            </div>
                                            <!-- view Modal end -->
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
    </div>
@endsection



@endsection

@section('js')

<script type="text/javascript">

        $("#distributor_name").select2({
        });

        $("#default").select2({
        });
</script>

@endsection

