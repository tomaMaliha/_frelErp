@extends('admin.master')
@section('css')

<style>

/* .customImg
{
    height: 70px;
    width: 70px;
} */
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
                            <h3 class="nk-block-title page-title">Driver Information</h3>
                            <div class="nk-block-des text-soft">
                                <p></p>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" tabindex="-1" id="modalLarge">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Driver Info</h5>
                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                <em class="icon ni ni-cross"></em>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('driver.create')}}" class="form-validate is-alter" enctype="multipart/form-data">
                                                @csrf
                                                
                                                <div class="row g-gs">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="form-label" for="fv-email">Full Name</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-email" name="name" placeholder="Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="form-label" for="fv-email">Email</label>
                                                        <div class="form-control-wrap">
                                                            <input type="email" class="form-control" id="fv-email" name="email" placeholder="Email" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-email">Contact</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-email" name="contact" pattern="[0-9+]{11,14}" placeholder="+8801XXXXXXXXX" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-email">Address</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-email" name="address" placeholder="Address" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-email">NID Number</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-email" name="nid" placeholder="938 456 823" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Date of Birth</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                    <input  class="form-control date-picker" data-date-format="yyyy-mm-dd" name="date_birth" placeholder="Date of Birth">
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Join Date</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                    <input name="join_date" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="Join Date">
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-email">Image</label>
                                                        <div class="form-control-wrap">
                                                            <input type="file" class="form-control" id="fv-email" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-outline-primary">Save Informations</button>
                                                    </div>
                                                </div>
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

                            

                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Print</span></a></li>
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#modalLarge" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="modal" data-target="#modalLarge"><em class="icon ni ni-plus"></em></a>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner position-relative card-tools-toggle">
                            <h1 class="nk-block-title page-title">Driver Information</h1>
                                <div class="card-title-group">
                                    
                               
                                </div><!-- .card-title-group -->
                               
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-ulist is-compact">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                SL
                                            </div>
                                        </div>
                                        <div class="nk-tb-col"><span class="sub-text">Driver Name</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                                        <div class="nk-tb-col tb-col-sm"><span class="sub-text">Address</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Join Date</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Date of Birth</span></div>
                                        <div class="nk-tb-col"><span class="sub-text">Status</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools text-right">
                                           
                                        </div>
                                    </div><!-- .nk-tb-item -->

                                    @foreach($drivers as $key=>$driver)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                {{$key+1}}
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar xs bg-primary">
                                                    <span>
                                                    @if(!empty($driver->image))
                                                        <img class = "customImg" src="{{ asset('public/assets/images/driver/'.$driver->image) }}" ></span>
                                                    @endif
                                                    </span>
                                                </div>
                                                <div class="user-name">
                                                    <span class="tb-lead">
                                                        {{ $driver->name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>
                                                {{ $driver->contact }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <span>
                                                {{ $driver->address }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>
                                                {{ $driver->email }}
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>
                                                {{ $driver->join_date }}
                                            </span>
                                        </div>
                                       
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>
                                                {{ $driver->date_birth }}
                                            </span>
                                        </div>
                                        @if($driver->status == 1)
                                        <div class="nk-tb-col">
                                            <span class="tb-status text-success">Active</span>
                                        </div>
                                        @else
                                        <div class="nk-tb-col">
                                            <span class="tb-status text-danger">Inactive</span>
                                        </div>
                                        @endif
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-2">
                                                
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <!-- <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li> -->
                                                                <li>
                                                                    <a href="#modalUpdateStatus{{$driver->id}}" data-toggle="modal">
                                                                        <em class="icon ni ni-repeat"></em><span>Status Update</span></a>
                                                                    </li>
                                                                <li>
                                                                    <a href="#modalUpdate{{$driver->id}}" data-toggle="modal">
                                                                        <em class="icon ni ni-repeat"></em><span>Edit</span></a>
                                                                    </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-tb-item -->

                                    <!-- Update Modal -->
                                        <div class="modal fade" tabindex="-1" id="modalUpdate{{$driver->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Driver Info</h5>
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('driver.update' , $driver->id)}}" class="form-validate is-alter" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class="row g-gs">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                <label class="form-label" for="fv-email">Full Name</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="fv-email" name="name" value="{{$driver->name}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                <label class="form-label" for="fv-email">Email</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="email" class="form-control" id="fv-email" name="email" value="{{$driver->email}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fv-email">Contact</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="fv-email" name="contact" pattern="[0-9+]{11,14}" value="{{$driver->contact}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fv-email">Address</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="fv-email" name="address" value="{{$driver->address}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fv-email">NID Number</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="fv-email" name="nid" value="{{$driver->nid}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Date of Birth</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-icon form-icon-left">
                                                                                <em class="icon ni ni-calendar"></em>
                                                                            </div>
                                                                                <input  class="form-control date-picker" data-date-format="yyyy-mm-dd" name="date_birth" placeholder="Date of Birth" value="{{$driver->date_birth}}">
                                                                        </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Join Date</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-icon form-icon-left">
                                                                                <em class="icon ni ni-calendar"></em>
                                                                            </div>
                                                                                <input name="join_date" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="Join Date" value="{{$driver->join_date}}">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fv-email">Image</label>
                                                                    <div class="form-control-wrap">
                                                                        <img src="{{asset('public/assets/images/driver/' . $driver->image)}}" style="width: 200px;">
                                                                        <input type="file" class="form-control" id="full-name" name="image">
                                                                        <input type="hidden" class="form-control" id="full-name" name="image" value="{{$driver->image}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-outline-primary">Update Information</button>
                                                                </div>
                                                            </div>
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

                                        <!-- Update Modal -->
                                        <div class="modal fade" tabindex="-1" id="modalUpdateStatus{{$driver->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Driver Info</h5>
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('driver.updateStatus' , $driver->id)}}" class="form-validate is-alter" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class="row g-gs">
                                                                <div class="col-lg-7">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <select name="status" class="form-control" value="{{ $driver->status }}">
                                                                                <option value="0" @if($driver->status == 0) selected @endif>Pending</option>
                                                                                <option value="1" @if($driver->status == 1)  selected @endif>Approved</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-outline-primary">Update Status</button>
                                                                </div>
                                                            </div>
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

                                </div><!-- .nk-tb-list -->
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    
                                </ul><!-- .pagination -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
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