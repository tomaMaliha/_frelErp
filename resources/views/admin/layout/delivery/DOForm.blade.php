@extends('admin.master')
@section('css')

<style>

.custom-control-label h6
{
   color: #854fff;
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
                        <center><h6 class="title nk-block-title">Delivery Information</h6></center><br>
                        <div class="nk-block">
                                    <div class="card card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h5 class="title">Delivery No Edit</h5>
                                                    </div>
                                                    <div class="card-tools mr-n1">
                                                    </div><!-- .card-tools -->
                                                   
                                                </div><!-- .card-title-group -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-tnx">
                                                    <div class="card">
                                                        <div class="card-inner">
                                                            <form method="post" action="{{ route('delivery.DOCreate' , $delivery->id) }}" class="form-validate">
                                                                @csrf
                                                                
                                                                <div class="row g-gs">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-full-name">DO Number</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="fv-full-name" value="{{ $delivery->DO }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-email">Customer ID</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="fv-email" value="{{ $delivery->distributor->random_number }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-topics">Driver</label>
                                                                            <div class="form-control-wrap ">
                                                                                <select id="driver_name" name="driver_name" data-placeholder="Select a option" required>
                                                                                    @foreach($drivers as $driver)
                                                                                        <option value="{{$driver->id}}" >{{$driver->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-subject">Mobile</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="fv-subject" name="driver_mobile" value="{{ $delivery->driver_mobile }}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-subject">Vehical</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="fv-subject" name="vehical" value="{{ $delivery->vehical }}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-subject">Transport</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="fv-subject" name="transport" value="{{ $delivery->transport }}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-subject">Destination</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="fv-subject" name="destination" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-subject">Note</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control" id="fv-subject" name="note" required>
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
                                                    </div>
                                                </div><!-- .nk-block -->
                                            </div>
                                                
                    
                    </div><!-- .card-preview -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->


@endsection

@section('js')

<script type="text/javascript">

        $("#driver_name").select2({
        });

        $("#default").select2({
        });
</script>

@endsection
