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

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                        <h4 class="title nk-block-title"><center>Order Information</center></h4><br>
                        <form method="post" action="{{route('order.search')}}" class="form-validate" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Distributor Select</label>
                                        <div class="form-control-wrap ">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control-wrap ">
                                            <select id="distributorName" id="fv-topics" name="distributor_id" data-placeholder="Select a option"> <span style="top:-5px; color:red;">*</span reqired>
                                                @foreach($dis as $or)
                                                
                                                    <option value="{{ $or->id }}">{{ $or->random_number }} : {{ $or->distributor_name }} : {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($or->base)->name }}</option>
                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-success">Search</button>
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



@section('js')
<script type="text/javascript">

    $("#distributorName").select2({
    });

</script>
@endsection
@endsection