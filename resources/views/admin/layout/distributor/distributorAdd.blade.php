@extends('admin.master')
@section('css')

<style>

.custom-control-label h6
{
   color: #854fff;;
}
</style>

@endsection
@section('content')


   


<div class="nk-block nk-block-lg">
<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="title nk-block-title">Distributor Information</h4>
    </div>
</div>
<div class="card">
    <h6 class="title nk-block-title">Distributor Information</h6>
    <div class="card-inner">
        <center><h4 class="title nk-block-title border-dark">Distributor Information</h4></center><hr><br>
        <form method="post" action="{{route('distributor.create')}}" class="form-validate" enctype="multipart/form-data" id="form">
            @csrf

            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Trade Name(DB Name) <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="distributor_name" placeholder="Enter Name" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>

                <div class="nk-block-head">
                    <h5 class="title">Proprietor Information</h5><hr>
                </div><!-- .nk-block-head -->

                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Proprietor Name : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_name" placeholder="Enter Name" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Father/Spouse Name : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="fat_hus_name" placeholder="Enter Name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Proprietor Present Address Village/ Ward : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_address" placeholder="Enter Address" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Post office : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_PO" placeholder="Post Office" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Thana : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_thana" placeholder="B. Baria Sadar" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">District : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_district" placeholder="B. Baria" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Proprietor Permanent Address Village/ Ward : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_address" placeholder="Enter Address" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Post office : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_PO" placeholder="Post Office" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Thana : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_thana" placeholder="B. Baria Sadar" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">District : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_district" placeholder="B. Baria" required>
                        </div>
                    </div>
                </div>

                <div class="nk-block-head">
                    <h5 class="title">Distributor Personal Information</h5><hr>
                </div><!-- .nk-block-head -->

                <div class="col-md-6">
                    
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Mobile : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="mobile" placeholder="(+88-XXXXXXXXXXX)" pattern="[0-9]{11}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Mobile (Alternative) : </label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="mobileALT" placeholder="(+88-XXXXXXXXXXX)" pattern="[0-9+]{11,14}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Telephone(Office) : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="telephone_office" placeholder="0851423223" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">(House) : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="telephone_house" placeholder="(+88-XXXXXXXXXXX)" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Fax (If any) : </label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="fax" placeholder="9130496">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>
                
                <div class="col-md-4 form-group">
                    <label>Division <span style="top:-5px; color:red;">*</span></label reqired>
                    <select name="division" id="division" class="form-control" required>
                        @foreach($divisions as $division)
                        <option value="{{$division->id}}">{{$division->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Zone <span style="top:-5px; color:red;">*</span></label reqired>
                    <select name="zone" id="district" class="form-control" required>
                        <option value="">--Select Zone--</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Base <span style="top:-5px; color:red;">*</span></label reqired>
                    <select name="base" id="upazila" class="form-control" required>
                        <option value="">--Select Base--</option>
                    </select>
                </div>

                <div class="nk-block-head">
                    <h5 class="title">Images</h5><hr>
                </div><!-- .nk-block-head -->

                <div class="col-md-6">
                    
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Image of Distributor : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="file" class="form-control" id="fv-email" name="image_distributot">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Nominee : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="file" class="form-control" id="fv-email" name="image_nominee">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Trade license : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="file" class="form-control" id="fv-email" name="image_trade">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">NID (Image) : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="file" class="form-control" id="fv-email" name="image_nid">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Analog Form : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="file" class="form-control" id="fv-email" name="image_form">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-message">Comments</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="fv-message"
                                name="comment" placeholder="Comments..."></textarea>
                        </div> 
                    </div>
                </div>
                
               <div>
               <a href="{{route('distributor.policy.print')}}" target="_blank" class="btn btn-round btn-primary"><span>Click, Policy</span></a>
               </div>
                
                <div class="col-md-12">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                        <input type="checkbox" class="custom-control-input" id="uid1" required>
                        <label class="custom-control-label" for="uid1"><h6>I agree to The Terms & Conditions</h6></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="#modalAlert" data-toggle="modal" class="btn btn-outline-primary">Save Informations</button>
                        <a href="{{ URL::previous() }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>

                <!-- Modal Alert -->
                <div class="modal fade" tabindex="-1" id="modalAlert">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                            <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                    <h4 class="nk-modal-title"></h4>
                                    <div class="nk-modal-text">
                                        <div class="caption-text">
                                            Are you sure? <br>
                                            You want to add
                                            <strong>
                                                <a href="">New Distributor</a>
                                            </strong> 
                                            <a href="" > </a>
                                            <strong>
                                                <a href=""> </a>
                                            </strong> 
                                            
                                            </div>
                                    </div>
                                    <div class="nk-modal-action">
                                        <button type="submit" class="btn btn-lg btn-mw btn-success" >Confirm</button>
                                    </div>
                                </div>
                            </div><!-- .modal-body -->
                            <div class="modal-footer bg-lighter">
                                <div class="text-center w-100">
                                    <p> <a href="#">Thank You!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </form>
    </div>
</div>
</div><!-- .nk-block -->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">

    $("#divisionName").select2({
    });

    $("#zoneName").select2({
    });

    $("#baseName").select2({
    });

    $(document).ready(function () {
    $('#form').validate({ 
        rules: {
            distributor_name: {
            },
            
            mobile: {
                required: true,
                digits: true
                
            },
        },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
    });
});

    $(document).ready(function(){
            $('#division').change(function(){
                var division_id = $(this).val();
                // alert(division_id);
                // ajaxSetup start
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ajaxSetup end


                // ajaxSetup district request start
                $.ajax({
                    type: 'POST',
                    url: '{{ route('distributor.district') }}',
                    data:{division_id:division_id},
                    success:function(data){
                        $('#district').html(data);
                    }
                });
                // ajaxSetup district request end
            });

            $('#district').change(function(){
                var district_id = $(this).val();
                // ajaxSetup upazila request start
                $.ajax({
                    type: 'POST',
                    url: '{{ route('distributor.upazila') }}',
                    data:{district_id:district_id},
                    success:function(data){
                        $('#upazila').html(data);
                }
                });
                // ajaxSetup upazila  request end
            });
        });

    //              <div class="col-md-4 form-group">
    //                 <label>Division <span style="top:-5px; color:red;">*</span></label reqired>
    //                 <select name="division" id="division" class="form-control" required>
    //                     <option value="">--Select Division--</option>
    //                     @foreach($divisions as $division)
    //                         <option value="{{$division->id}}">{{$division->name}}</option>
    //                     @endforeach
    //                 </select>
    //             </div>
    //             <div class="col-md-4 form-group">
    //                 <label>Zone <span style="top:-5px; color:red;">*</span></label reqired>
    //                 <select name="zone" id="district" class="form-control" required>
    //                     <option value="">--Select Zone--</option>
    //                 </select>
    //             </div>
    //             <div class="col-md-4 form-group">
    //                 <label>Base <span style="top:-5px; color:red;">*</span></label reqired>
    //                 <select name="base" id="upazila" class="form-control" required>
    //                     <option value="">--Select Base--</option>
    //                 </select>
    //             </div>

</script>

@endsection