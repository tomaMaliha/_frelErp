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
                                        <input type="text" class="form-control" id="fv-email" name="name" value="{{$product->name}}" placeholder="Product Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Category <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap ">
                                        <select class="form-control form-select" id="fv-topics" name="sub_category_id" data-placeholder="Select a option" required>
                                            @foreach($sub_categories as $sub_category)
                                            @if($sub_category->sub_category != 0)
                                                <option value="{{$sub_category->id}}" @if($sub_category->id == $product->sub_category_id) selected @endif>{{$sub_category->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Brand <span style="top:-5px; color:red;">*</span></label reqired>
                                    <input type="text" class="form-control" id="fv-email" name="brand" value="{{$product->brand->name}}" placeholder="Brand Name" required>
                                        <!-- <select class="form-control form-select" id="fv-topics" name="brand_id" data-placeholder="Select a option" required>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-message">Status <span style="top:-5px; color:red;">*</span></label reqired>
                                        <select class="form-control form-select" id="fv-topics" name="status" data-placeholder="Select a option" >
                                            <option value="1" @if($product->status == 1) selected @endif>Available</option>
                                            <option value="0" @if($product->status == 0) selected @endif>Do Not Show</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Bar Code</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="bar_code" value="{{$product->bar_code}}" placeholder="Bar Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Product Code</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="product_code" value="{{ $product->product_code }}" placeholder="Product Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Distributor Price <span style="top:-5px; color:red;">*</span></label reqired>
                                    <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="fv-email" name="distributor_price" value="{{$product->distributor_price}}" placeholder="1000 Taka" placeholder="Distributor Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Trade Price</label>
                                    <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="fv-email" name="trade_price" value="{{$product->trade_price}}" placeholder="1000. Taka">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Corporate Price</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="fv-email" name="corporate_price" value="{{$product->corporate_price}}" placeholder="1000. Taka">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-email">Image</label>
                                    <div class="form-control-wrap">
                                    @if(!empty($product->image))
                                        <img src="{{asset('public/assets/images/product/' . $product->image)}}" style="width: 200px;">
                                    @endif
                                        <input type="file" class="form-control" id="full-name" name="image">
                                        <input type="hidden" class="form-control" id="full-name" name="image" value="{{$product->image}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fv-message">Remarks</label>
                                    <div class="form-control-wrap">
                                            <textarea class="form-control form-control-sm" id="fv-message" name="description" placeholder="Write Description">{{$product->description}}</textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-primary">Back</a>
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



        