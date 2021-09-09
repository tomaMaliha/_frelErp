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


    @if(Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
    @endif


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
        <form method="post" action="{{route('distributor.update' , $distributors->id)}}" class="form-validate" enctype="multipart/form-data">
            @csrf

            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Trade Name(DB Name) <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="distributor_name" placeholder="Enter Name" value="{{$distributors->distributor_name}}" required>
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
                            <input type="text" class="form-control" id="fv-email" name="proprietor_name" placeholder="Enter Name" value="{{$distributors->proprietor_name}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Father/Spouse Name : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="fat_hus_name" placeholder="Enter Name" value="{{$distributors->fat_hus_name}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Proprietor Present Address Village/ Ward : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_address" placeholder="Enter Address" value="{{$distributors->proprietor_present_address}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Post office : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_PO" placeholder="Post Office" value="{{$distributors->proprietor_present_PO}}"reqired>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Thana : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_thana" placeholder="B. Baria Sadar" value="{{$distributors->proprietor_present_thana}}"reqired>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">District : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_present_district" placeholder="B. Baria" value="{{$distributors->proprietor_present_district}}"reqired>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Proprietor Permanent Address Village/ Ward : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_address" placeholder="Enter Address" value="{{$distributors->proprietor_present_district}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Post office : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_PO" placeholder="Post Office" value="{{$distributors->proprietor_permanent_PO}}" required> 
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Thana : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_thana" placeholder="B. Baria Sadar" value="{{$distributors->proprietor_permanent_thana}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">District : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="proprietor_permanent_district" placeholder="B. Baria" value="{{$distributors->proprietor_permanent_district}}" required>
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
                            <input type="text" class="form-control" id="fv-email" name="mobile" placeholder="(+88-XXXXXXXXXXX)" pattern="[0-9]{11}" value="{{$distributors->mobile}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Mobile (Alternative) : </label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="mobileALT" placeholder="(+88-XXXXXXXXXXX)" pattern="[0-9+]{11,14}" value="{{$distributors->mobileALT}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Telephone(Office) : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="telephone_office" placeholder="0851423223" value="{{$distributors->telephone_office}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">(House) : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="telephone_house" placeholder="(+88-XXXXXXXXXXX)" value="{{$distributors->telephone_house}}" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Fax (If any) : </label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="fv-email" name="fax" placeholder="9130496" value="{{$distributors->fax}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>
                
                <div class="col-md-4 form-group">
                    <label>Division <span style="top:-5px; color:red;">*</span></label reqired>
                    <select name="division" id="division" class="form-control" required>
                        @foreach($divisions as $division)
                        <option value="{{$division->id}}" @if( $division->id == $distributors->division ) selected @endif>{{$division->name}}</option>
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
                        @if(!empty($distributors->image_distributot))
                            <img src="{{asset('public/assets/images/distributor/' . $distributors->image_distributot )}}" style="width: 200px;">
                        @endif
                            <input type="file" class="form-control" id="full-name" name="image_distributot">
                            <input type="hidden" class="form-control" id="full-name" name="image_distributot" value="{{$distributors->image_distributot}}">
                        
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Nominee : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                        @if(!empty($distributors->image))
                            <img src="{{asset('public/assets/images/distributor/' . $distributors->image_nominee )}}" style="width: 200px;">
                        @endif
                            <input type="file" class="form-control" id="full-name" name="image_nominee">
                            <input type="hidden" class="form-control" id="full-name" name="image_nominee" value="{{$distributors->image_nominee}}">
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Trade license : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                        @if(!empty($distributors->image_trade))
                            <img src="{{asset('public/assets/images/distributor/' . $distributors->image_trade )}}" style="width: 200px;">
                        @endif
                            <input type="file" class="form-control" id="full-name" name="image_trade">
                            <input type="hidden" class="form-control" id="full-name" name="image_trade" value="{{$distributors->image_trade}}">
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">NID (Image) : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                        @if(!empty($distributors->image_nid))
                            <img src="{{asset('public/assets/images/distributor/' . $distributors->image_nid )}}" style="width: 200px;">
                        @endif
                            <input type="file" class="form-control" id="full-name" name="image_nid">
                            <input type="hidden" class="form-control" id="full-name" name="image_nid" value="{{$distributors->image_nid}}">
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-email">Analog Form : <span style="top:-5px; color:red;">*</span></label reqired>
                        <div class="form-control-wrap">
                        @if(!empty($distributors->image_form))
                            <img src="{{asset('public/assets/images/distributor/' . $distributors->image_form )}}" style="width: 200px;">
                        @endif
                            <input type="file" class="form-control" id="full-name" name="image_form">
                            <input type="hidden" class="form-control" id="full-name" name="image_form" value="{{$distributors->image_form}}">
                        
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="fv-message">Comments</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="fv-message"
                                name="comment" placeholder="Comments...">{{$distributors->proprietor_permanent_district}}</textarea>
                        </div> 
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                    </div>
                </div>

                
            </div>
        </form>
    </div>
</div>
</div><!-- .nk-block -->

@endsection

@section('js')

<script type="text/javascript">

    // $("#divisionName").select2({
    // });

    // $("#zoneName").select2({
    // });

    // $("#baseName").select2({
    // });

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

</script>

@endsection