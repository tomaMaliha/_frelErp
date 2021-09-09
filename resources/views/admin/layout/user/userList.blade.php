
@extends('admin.master')

@section('css')

		<style >
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

		/*

		The following rule will only run if your browser supports CSS grid.

		Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling. 

		*/

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
			width: 120px!important;
            height: auto!important;
		}
		.custom-avatar img {
			border-radius: 3px;
		}
		.card-body {
			padding: 0px!important;
		}
        .link-list-opt .remove_btn .icon {
            font-size: 1.125rem;
            width: 1.75rem;
            opacity: .8;
        }
        .link-list-opt .remove_btn {
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
        }
        .view_img {
            max-width: 100%!important;
            /*margin: 1.75rem!important;*/
            justify-content: center;
        }
        .view_img_modal {
            padding-right: 0px!important;
        }
	</style>
@endsection

@section('content')
	<div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    
                    <div class="card-body">
                        @include('admin.partials.alert')
                    </div> 

                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Users Lists</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                                    	<em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                <a href="{{route('user.add')}}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                <a href="{{route('user.add')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New User</span></a>
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
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">#</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Image</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Contact</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Company Name</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Joining Date</span></th>
                                            {{-- <th class="nk-tb-col tb-col-lg"><span class="sub-text">Brand</span></th> --}}
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $num = 0; @endphp
                                        @foreach ($users as $key=>$user)
                                        <tr class="nk-tb-item">
                                            {{--  <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                    <label class="custom-control-label" for="uid1"></label>
                                                </div>
                                            </td> --}}
                                             <td class="nk-tb-col tb-col-md">
                                                <span>{{ $key+1 }}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-amount">{{ $user->name }}</span>
                                            </td>
                                            
                                            <td class="nk-tb-col">
                                                <a href="#viewModal{{ $user->id }}" data-toggle="modal">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary custom-avatar">
                                                            
                                                                {{-- <em class="icon ni ni-user-alt"></em> --}}
                                                                <img src="{{ asset('public/assets/images/user/'.$user->image) }}">
                                                        </div>
                                                        {{-- <div class="user-info">
                                                            <span class="tb-lead">{{ $user->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                            <span>info@softnio.com</span>
                                                        </div> --}}
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-amount">{{ $user->contact }}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span class="tb-amount">{{ $user->companyName }}</span>
                                            </td>
                                            @php
                                                $timestamp = strtotime($user->joinDate);
                                                $newDate = date('d F, Y', $timestamp);
                                            @endphp
                                            <td class="nk-tb-col">
                                                <span class="tb-amount">{{ $newDate }}</span>
                                            </td>
                                            
                                            @if ($user->status)
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-success">Enable</span>
                                                </td>
                                            @else
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-danger">Disable</span>
                                                </td>
                                            @endif
                                            {{-- <td class="nk-tb-col tb-col-md">
                                                <span class="tb-status text-success">Active</span>
                                            </td> --}}
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    {{-- <li class="nk-tb-action-hidden">
                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Wallet">
                                                            <em class="icon ni ni-wallet-fill"></em>
                                                        </a>
                                                    </li> --}}
                                                    {{-- <li class="nk-tb-action-hidden">
                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                            <em class="icon ni ni-mail-fill"></em>
                                                        </a>
                                                    </li> --}}
                                                    @if ($user->status)
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ route('user.active', $user->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Disable">
                                                                    <em class="icon ni ni-cross-circle-fill"></em>
                                                                </button>
                                                            </form>
                                                            
                                                        </li>
                                                    @else
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ route('user.active', $user->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Enable">
                                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
                                                    {{-- <li class="nk-tb-action-hidden">
                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                        </a>
                                                    </li> --}}
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="#viewModal{{ $user->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-eye"></em><span>View</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('user.edit' , $user->id) }}">
                                                                            <em class="icon ni ni-edit"></em>
                                                                            <span>Edit</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#addPassword{{ $user->id }}" data-toggle="modal">
                                                                            <em class="icon ni ni-link-alt"></em>
                                                                            <span>Add Password</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#DeleteModal{{ $user->id }}" data-toggle="modal">
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
                                            <!-- Modal Content Code -->
                                            
                                            <!-- promotion Modal start -->
                                            <div class="modal fade" tabindex="-1" id="addPassword{{ $user->id }}">
                                                <div class="modal-dialog modal-dialog-top" role="document">
                                                    <div class="modal-content">
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Set Password</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('user.password', $user->id) }}" method="post" class="form-validate is-alter">
                                                                @csrf
                                                                
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                        <label class="form-label" for="default-06">Welcome </label><span style="color:  #2451d1 ; font-weight: bold;"> Mr/Mrs {{ $user->name }} *</span>
                                                                        <input type="password" class="form-control" id="promotion_price" name="password" placeholder="Password">
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- promotion Modal end -->

                                            {{-- <!-- Modal -->
                                            <div class="modal fade" tabindex="-1" id="viewModal{{$user->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">User Information</h5>
                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-borderless">
                                                                <tr>
                                                                    <td>
                                                                        @if(!empty($user->image))
                                                                        <p>Image : <img class = "customImg" src="{{ asset('public/assets/images/user/'.$user->image) }}" ></p>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <p>Name : </p>
                                                                    </td>
                                                                    <td>{{$user->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <p>Contact : </p>
                                                                    </td>
                                                                    <td>{{$user->contact}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <p>Address : </p>
                                                                    </td>
                                                                    <td>{{$user->address}}</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                    <p>Email : </p>
                                                                    </td>
                                                                    <td>{{$user->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <p>Company : </p>
                                                                    </td>
                                                                    <td>{{$user->companyName}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <p>Role : </p>
                                                                    </td>
                                                                    <td>{{$user->role->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    <p>Status : </p>
                                                                    </td>
                                                                    <td>@if($user->status == 1)
                                                                        <span class="tb-status text-success">Active</span>
                                                                        @else
                                                                        <span class="tb-status text-danger">Inactive</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                $timestamp = strtotime($user->dob);
                                                                $newDate = date('d F, Y', $timestamp);
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                    <p>Date of Birth : </p>
                                                                    </td>
                                                                    <td>{{$newDate}}</td>
                                                                </tr>
                                                                @php
                                                                $timestamp = strtotime($user->joinDate);
                                                                $newDate = date('d F, Y', $timestamp);
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                    <p>Join Date : </p>
                                                                    </td>
                                                                    <td>{{$newDate}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                        <span class="sub-text"><button class="btn btn-secondary"><em class="icon ni ni-files">Print</em></button></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal End --> --}}
                                       
                                            <!-- Delete Modal -->
                                                <div class="modal fade" tabindex="-1" id="DeleteModal{{$user->id}}">
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
                                                                <a href="{{route('user.delete' , $user->id)}}" class="btn btn-success">Yes, Delete it!</a>
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
    {{-- @include('admin.partials.assets-link.js-links') --}}
@endsection

@section('js')
	
	<script type="text/javascript">

        @if (count($errors) > 0)
            $('.bd-example-modal-lg').modal('show');
        @endif

	</script>
@endsection


