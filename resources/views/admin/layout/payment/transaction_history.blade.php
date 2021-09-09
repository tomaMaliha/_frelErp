@extends('admin.master')

@section('css')


{{-- dropzone cdn --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css" integrity="sha512-bbUR1MeyQAnEuvdmss7V2LclMzO+R9BzRntEE57WIKInFVQjvX7l7QZSxjNDt8bg41Ww05oHSh0ycKFijqD7dA==" crossorigin="anonymous" />

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
			width: 80px!important;
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
        .custom_txt {
        	color: #a5a5a5;
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
                                <h3 class="nk-block-title page-title">Transaction</h3></h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                    	<em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                {{-- <a href="#" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                	<em class="icon ni ni-plus"></em>
                                                </a>
                                                <a href="#" class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                	<em class="icon ni ni-plus"></em>
                                                	<span>Add</span>
                                                </a> --}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->

                   
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            {{-- <th class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </th> --}}
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">#</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Distributor</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Transaction Date</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($transaction_history->payment as $key=>$item)

                                       <tr class="nk-tb-item">
                                        {{--  <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid1">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td> --}}
                                         <td class="nk-tb-col tb-col-md">
                                            <span>
                                                {{ $key+1 }}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <a href="#viewModalA{{ $item->id }}" data-toggle="modal">
                                                <div class="user-card custom-user-card">
                                                    @if($item->image_distributot != null)
                                                    <div class="user-avatar bg-primary custom-avatar">
                                                        
                                                            {{-- <em class="icon ni ni-user-alt"></em> --}}
                                                            <img src="{{ $item->distributor->image_distributot }}">
                                                    </div>
                                                    @endif
                                                    <div class="user-info custom-user-info">
                                                        <span class="tb-lead">
                                                            <span style="font-weight: bold;">Trade Name: </span>
                                                            <span class="custom_txt">{{ $item->distributor->distributor_name }}</span>
                                                        </span>
                                                        <span class="tb-lead">
                                                            <span style="font-weight: bold;">Distributor Point: </span>
                                                            <span class="custom_txt">{{ Devfaysal\BangladeshGeocode\Models\Upazila::find($item->distributor->base)->name }}, {{ Devfaysal\BangladeshGeocode\Models\District::find($item->distributor->zone)->name }}, {{ Devfaysal\BangladeshGeocode\Models\Division::find($item->distributor->division)->name }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="user-info custom-user-info">
                                                        <span class="tb-lead">
                                                            <span style="font-weight: bold;">Contact: </span>
                                                            <span class="custom_txt">{{ $item->distributor->mobile }}</span>
                                                        </span>
                                                        <span class="tb-lead">
                                                            <span style="font-weight: bold;">Credit Limit: </span>
                                                            <span class="custom_txt">{{ $item->distributor->credit_limit }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        
                                        {{-- <td class="nk-tb-col tb-col-lg custom_des">
                                            <span>{{ $item->description }}</span>
                                        </td> --}}
                                       
                                        <td class="nk-tb-col tb-col-lg custom_date">
                                            <span style="font-weight: bold;">{{ Carbon\Carbon::parse($item->date)->format('d F, Y') }}</span>
                                            <br>
                                            <span>{{ Carbon\Carbon::parse($item->created_at)->format('H:i:s A') }}</span>
                                        </td>

                                        {{-- <td class="nk-tb-col tb-col-md">
                                            <span class="tb-status text-success">Active</span>
                                        </td> --}}
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                {{-- <li class="nk-tb-action-hidden">
                                                    <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Set Priority">
                                                        <span ></span>
                                                        <em data-toggle="modal" data-target="#priorityModal{{ $item->id }}" class="icon ni ni-layers-fill"></em>
                                                        
                                                    </button>
                                                </li> --}}
                                                    {{-- @if ($item->status)
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ url('/small_banner_status', $item->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Disable">
                                                                    <em class="icon ni ni-cross-circle-fill"></em>
                                                                </button>
                                                            </form>
                                                            
                                                        </li>
                                                    @else
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ url('/small_banner_status', $item->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Enable">
                                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif --}}
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                {{-- <li>
                                                                    <a href="#viewModal{{ $item->id }}" data-toggle="modal">
                                                                        <em class="icon ni ni-eye"></em><span>View</span>
                                                                    </a>
                                                                </li> --}}
                                                                
                                                                {{-- <li>
                                                                    <a href="#urlModal{{ $item->id }}" data-toggle="modal">
                                                                        <em class="icon ni ni-check-circle-fill"></em>
                                                                        <span>Add URL</span>
                                                                    </a>
                                                                </li> --}}
                                                                <li>
                                                                    <a href="{{ route('transaction.details' , $item->distributor_id) }}">
                                                                        <em class="icon ni ni-eye"></em>
                                                                        <span>Details</span>
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

                                        </tr>

                                            <!-- Modal Content Code -->

                                             <!-- view Modal start -->
                                            <div class="modal fade view_img_modal" tabindex="-1" id="viewModal{{ $item->id }}">
                                                <div class="modal-dialog view_img" role="document">
                                                    <img src="{{ $item->distributor->image_distyributot }}">
                                                </div>
                                            </div>
                                            <!-- view Modal end -->

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


@endsection

@section('js')
	<script type="text/javascript">
        @if (count($errors) > 0)
            $('.bd-example-modal-lg').modal('show');
        @endif
	</script>
@endsection



