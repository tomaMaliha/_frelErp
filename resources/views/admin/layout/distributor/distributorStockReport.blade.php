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
                        <center><h6 class="title nk-block-title">Distributor Stock Report</h6></center><br>
                        <form method="post" action="{{route('db.stock.report.search' )}}" class="form-validate" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row g-gs">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control date-picker" id="fv-email" name="date" placeholder="Date" > 
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                    <select id="distributor_name" name="distributor_id" data-placeholder="Select a option" >
                                                        <option value="">    </option>
                                                        @foreach($distributor_report as $dis)
                                                            <option value="{{ $dis->id }}">{{ $dis->random_number }}::{{ $dis->distributor_name }}::{{ $dis->zone }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                        <button type="submit" class="btn btn-success"> Search  </button>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>

                        </div>  
                        @if($distributor_stock->count() > 0 )
                        <div style="margin: 18px;">
                            <div class="row">
                                
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="9">
                                                Trade Name(DB Name): {{ $distributor_stock->distributor_name }} - 
                                                Distributor Code: {{ $distributor_stock->random_number }} 
                                            </th>
                                        </tr>
                                    </thead>
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                      @foreach($distributor_stock->order as $key=>$order)
                                      @foreach($order->order as $product)
                                       <tr>
                                            <th>{{ $key+1 }}</th>
                                            <td>
                                                
                                                {{ $product->id  }}
                                                
                                            </td>
                                            <td>
                                                {{ $product->product->category->name }}
                                            </td>
                                            <td>
                                                {{ $product->product->name }}
                                            </td>
                                            <td>
                                                {{ $product->quantity }}
                                            </td>
                                            <td>
                                                {{ $product->quantity * $product->product->distributor_price }}
                                            </td>
                                            <td class="tb-tnx-id">
                                                <a href="#">
                                                <center><span>
                                                    <a href="#UpdateModal{{$order->id}}" data-toggle="modal"><em class="icon ni ni-edit"></em><span></span></a>

                                                    </a>
                                                    </span></center>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Update Modal -->
                                        <div class="modal fade" tabindex="-1" id="UpdateModal{{$order->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Order</h5>
                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('order.update', $product->id )}}" class="form-validate is-alter">
                                                            @csrf
                                                            
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">Category</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="full-name" name="sub_category_id" value="{{ $product->product->category->name }}" readonly>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">Product</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="full-name" name="product_id" value="{{ $product->product->name }}" readonly>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">Quantity</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control quantity" id="full-name" name="quantity" value="{{ $product->quantity }}" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Update Cart</button>
                                                            </div>
                                                        
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <span class="sub-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Update modal End -->
                                        @endforeach
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div><!-- .card-preview -->
                    
                </div><!-- .nk-block -->
               
            </div>
        </div>
    </div>
</div>
<!-- content @e -->


@section('js')


<script type="text/javascript">

    $("#distributor_name").select2({
    });

    $("#point").select2({
    });

    //Calculation
    // $('tbody').delegate('.distributor_price , .quantity ' , 'keyup' ,  function()
    // {
    //     var tr = $(this).parent().parent();
    //     var price = tr.find('.distributor_price').val();
    //     var quantity = tr.find('.quantity').val();
    //     var sub_total = (price*quantity);
    //     // var total = total + tr.find('.sub_total').val(sub_total);
    //     // console.log( tr.find('.unit_price'));
    //     tr.find('.sub_total').val(sub_total);

</script>
@endsection

@endsection
