@extends('admin.master')

@section('content')


<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="card-body">
                                @include('admin.partials.alert')
                            </div> 
                        <center> <h4 class="title nk-block-title">User Information</h4><br></center>
                        
                        <form method="post" action="{{route('user.create')}}" class="form-validate" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-label" for="fv-email">User Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="name" placeholder="Name" required>
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
                                    <label class="form-label" for="fv-email">Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="fv-email" name="email" placeholder="email@gmail.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Company Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="companyName" placeholder="First Rays" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Role</label>
                                    <div class="form-control-wrap ">
                                        <select class="form-control form-select" id="fv-topics" name="role_id" data-placeholder="Select a option" required>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Satus</label>
                                    <div class="form-control-wrap">
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Department Name</label>
                                    <div class="form-control-wrap">
                                        <select class="form-control form-select" id="fv-topics" name="department" data-placeholder="Select a option" required>
                                            <option value="Factory">Factory</option>
                                            <option value="Sales & Marketing">Sales & Marketing</option>
                                            <option value="Accounts">Accounts</option>
                                            <option value="Supply Chain">Supply Chain</option>
                                        </select>
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
                                                <input  class="form-control date-picker" data-date-format="yyyy-mm-dd" name="joinDate" placeholder="Joining Date">
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
                                                <input  class="form-control date-picker" data-date-format="yyyy-mm-dd" name="dob" placeholder="Date of Birth">
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">NID Number</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="nid" placeholder="938 456 823" pattern="[0-9]{6,10}" required>
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
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Password</label>
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control" id="fv-email" name="password" pattern="[0-9]{6,10}" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"> 
                                    <button type="submit" class="btn btn-dim btn-outline-primary" >Add User Information</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-info" onclick="myFunction()">Back</a>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    </div><!-- .card-preview -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

<!-- <div class="modal fade" tabindex="-1" id="modalTop">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Title</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <p>Save User Information</p>
                
                <button type="submit" class="btn btn-success">Confirm</button>
                <button class="btn btn-danger" >Cancel</button>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Modal Footer Text</span>
            </div>
        </div>
    </div>
</div> -->
@include('admin.partials.assets-link.js-links')
@endsection

@section('js')


<script type="text/javascript">

function myFunction() {
  var txt;
  if (confirm("Press a button!")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}

</script>
@endsection
