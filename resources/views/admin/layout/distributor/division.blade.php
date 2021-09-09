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
        <form method="post" action="{{route('distributor.create')}}" class="form-validate" enctype="multipart/form-data">
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


</script>

@endsection