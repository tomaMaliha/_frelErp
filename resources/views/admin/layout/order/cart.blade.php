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
            <h4 class="title nk-block-title"></h4>
        </div>
    </div>
    <div class="card">
        <h6 class="title nk-block-title"></h6>
        <div class="card-inner">
            <h4 class="title nk-block-title"> </h4><br>
            
                <div class="row g-gs">
                    <div class="col-md-12">
                        <div class="form-group">
                        <center> <label class="form-label" for="fv-topics">Account Information (in BDT) </label></center>
                            <div class="form-control-wrap ">
                                <div class="row">

                                    <table class="table table-bordered col-sm-12">
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>
                                                Credit Limit: {{$payment->distributor->credit_limit}}
                                            </td>
                                            <td>
                                                Actual Balance:
                                            </td>
                                            <td>
                                                Pending Order Val:
                                            </td>
                                            <td>
                                                Current Order val:
                                            </td>
                                            <td>
                                                Balance: 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><b>WithIn Limit. You Can Still Order. Amount: $value</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><center><b>Order Request Form</b></center></td>
                                        </tr>
                                        <tr>
                                            <td>Customer Name: <b>{{$payment->distributor->distributor_name}} [{{ $payment->distributor->id }}]</b> </td>
                                            <td>Distributor Code: <b>{{ $payment->distributor->random_number }}</b></td>
                                            <td colspan="3">Order Date: <b>{{ Carbon\Carbon::now()->format('Y-m-d')}}</b></td>
                                        
                                        </tr>
                                        @php
                                            $distributor_id = $payment->distributor_id;
                                        @endphp
                                        @endforeach
                                    </table>
                                
                                </div>
                            </div>
                            <form method="post" action="{{route('order.category' , $distributor_id)}}" class="form-validate" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="fv-topics">Category</label>
                                    <div class="form-control-wrap ">
                                        <select id="categoryName" name="sub_category_id" data-placeholder="Select a option" required>
                                        @foreach($cats as $category)
                                        @if($category->sub_category != 0)
                                            <option value="{{$category->id}}">{{$category->name}} </option>
                                        @endif
                                        @endforeach
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
                            </form>
                        </div>
                        

                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@section('js')
<script type="text/javascript">

    // <?php
    //    $product = App\Product::all()->distributor_price;
    // ?>

    $("#categoryName").select2({
    });

    //Calculation
    $('tbody').delegate('.quantity , .value' , 'keyup' ,  function()
    {
        var tr = $(this).parent().parent();
        var quantity = tr.find('.quantity').val();
        var product = tr.find('.product').val();
        var value = (quantity*product);
        tr.find('.value').val(value);
    });

</script>
@endsection

@endsection



