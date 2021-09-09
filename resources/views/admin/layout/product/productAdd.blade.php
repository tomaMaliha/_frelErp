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

    T


<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                        <h6 class="title nk-block-title">Product Information</h6><br>
                        <form method="post" action="{{route('product.create')}}" class="form-validate" enctype="multipart/form-data">
                            @csrf

                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Product Name <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="name" placeholder="Enter Product Name" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Category <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap ">
                                        <select class="form-control form-select" id="fv-topics" name="sub_category_id" data-placeholder="Select a option" required>
                                            
                                            <option value="">Select a category</option>
                                            @foreach(App\Category::orderBy('name', 'asc')->where('sub_category', 0)->where('status' , 1)->get() as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                            @foreach (App\Category::orderBy('name', 'asc')->where('sub_category', $parent->id)->where('status' , 1)->get() as $child)
                                            <option value="{{ $child->id }}">&emsp;&emsp;--&nbsp;{{ $child->name }}</option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Bar Code</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="bar_code" placeholder="9QWec5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Product Code</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="product_code" placeholder="9QWec5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Alert Quanity</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="alert_quantity" placeholder="Quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Brand <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap ">
                                        <select class="form-control form-select" id="fv-topics" name="brand_id" data-placeholder="Select a option" required>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Distributor Price <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="distributor_price" placeholder="1000. Taka">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Trade Price </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="trade_price" placeholder="1000. Taka">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Corporate Price</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="corporate_price" placeholder="1000. Taka">
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
                                    <label class="form-label" for="fv-message">Remarks</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control form-control-sm" id="fv-message" name="description" placeholder="Write Description"></textarea>
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dim btn-outline-primary" >Add</button>
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


