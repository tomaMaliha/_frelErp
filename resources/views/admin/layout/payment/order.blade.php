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


<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                        <h6 class="title nk-block-title">Payment Information</h6>
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Timepicker</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control time-picker" placeholder="Input placeholder">
                                        </div>
                                    </div>
                                </div>
                            </div>
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

        $("#customer").select2({
        });

        $("#categoryName").select2({
        });

        $("#warehouseName").select2({
        });
</script>

@endsection