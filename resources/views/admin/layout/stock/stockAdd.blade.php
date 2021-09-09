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
                        <h4 class="title nk-block-title"><center>FG Stock</center></h4><br>
                        <form method="post" action="{{route('category.product')}}">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Type</label>
                                        <div class="form-control-wrap ">
                                            <select id="typeName" data-placeholder="Select a option" required>
                                                <option value="Production">Production</option>
                                                <option value="Retailer">Retailer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Category <span style="top:-5px; color:red;">*</span></label reqired>
                                        <div class="form-control-wrap ">
                                            <select id="categoryName" name="sub_category_id" data-placeholder="Select a option" required>
                                            @foreach($cats as $category)
                                            @if($category->sub_category != 0)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">WareHouse</label>
                                        <div class="form-control-wrap ">
                                            <select id="warehouseName" data-placeholder="Select a option" required>
                                                <option value="Ware House">Ware House</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-topics">Search</label>
                                        <div class="form-control-wrap ">
                                            <button type="submit" class="btn btn-success"> Search  </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- .card-preview -->
                   @if(isset($categories))
                   <form method="post" action="{{route('stock-update')}}">
                   @csrf
                   <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    SL
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Category</span></div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text">Product</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Note</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Stock Qty</span></div>
                                
                            </div><!-- .nk-tb-item -->
                            
                            @if(isset($categories))
                                @foreach($categories->products  as $key => $product)
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}" class="form-conrtol">
                                <div class="nk-tb-item">
                                
                                    <div class="nk-tb-col nk-tb-col-check">
                                        {{$key+1}}
                                    </div>
                                    <div class="nk-tb-col">
                                        <a href="html/user-details-regular.html">
                                            <div class="user-card">
                                                
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{ $categories->name }}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb">
                                        <span class="tb-amount">
                                            {{$product->name}}
                                        </span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>
                                            <input type="text" name="note[]"  class="form-control" value="">
                                        </span>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <ul class="list-status">
                                            <li><em class="icon text-success ni ni-check-circle"></em> <span>
                                            <input type="text" name="stock[]" class="form-control"  value="">
                                            </span></li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-tb-item -->
                                @endforeach
                            @endif
                        </div><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">

                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="#modalAlert{{$categories->id}}" data-toggle="modal" class="btn btn-dim btn-outline-primary" >Add Stock Qty</a>
                            <a href="{{ URL::previous() }}" class="btn btn-outline-info" onclick="myFunction()">Back</a>
                        </div>
                    </div>
                     <!-- Modal Alert -->
                     <div class="modal fade" tabindex="-1" id="modalAlert{{$categories->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                                <div class="modal-body modal-body-lg text-center">
                                    <div class="nk-modal">
                                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                        <h4 class="nk-modal-title">Congratulations!</h4>
                                        <div class="nk-modal-text">
                                            <div class="caption-text">
                                                You’ve successfully Stocked The Products <br>
                                                
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
                    </div>
                    </form>
                   @endif
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection


@section('js')


<script type="text/javascript">

$("#typeName").select2({
    });

    $("#categoryName").select2({
    });

    $("#warehouseName").select2({
    });


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



