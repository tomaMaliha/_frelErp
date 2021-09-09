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
                        <center><h6 class="title nk-block-title">Stock Report<hr></h6></center><br>
                        <div class="card-inner">
                        <form method="post" action="{{ route('stock.report.search')}}">
                        @csrf
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Category</label>
                                    <div class="form-control-wrap">
                                    <select class="form-control form-select" id="fv-topics" name="sub_category_id" data-placeholder="Select a option" >
                                    
                                        @foreach($cats as $category)
                                        @if($category->sub_category != 0)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <button type="submit" class="btn btn-success"> View  </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div><!-- .card-inner -->
                    <div class="row">
                        
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Date</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product</th>
                                <th scope="col">Opening Qty</th>
                                <th scope="col">Factory Stock</th>
                                <th scope="col">Value Pcs</th>
                                <th scope="col">Value</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($stocks as $key => $stock)
                            
                            @php
                                $timestamp = strtotime($stock->date);
                                $newDate = date('d F, Y', $timestamp);
                            @endphp

                               @if($stock->alert_quantity >= $stock->stock)
                                <tr style="background-color:  #fcc7da ;">
                                    <th>{{ $key+1 }}</th>
                                       
                                    <td>{{ $newDate }}</td>
                                    <td>{{ $stock->category->name }}</td>
                                    <td>{{$stock->product->name}}</td>
                                    
                                    <td>
                                    {{ $stock->opening }}
                                    </td>
                                    <td>
                                        @if($stock->stock > 0)
                                            {{$stock->stock}}
                                        @else
                                        Not Stocked
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $price = ($stock->product->distributor_price);
                                        @endphp
                                        &#2547; {{number_format($price, 2) }}
                                    </td>
                                    <td>
                                        @php
                                            $value = ($stock->stock) * ($stock->product->distributor_price);
                                        @endphp
                                        &#2547; {{number_format($value, 2) }}
                                    </td>
                                    <td>{{$stock->note}}</td>
                                </tr>
                               @else
                               <tr>
                                <th>{{ $key+1 }}</th>
                                <td>{{ $newDate }}</td>
                                <td>{{ $stock->category->name }}</td>
                                <td>{{$stock->product->name}}</td>
                                
                                <td>
                                {{ $stock->opening }}
                                </td>
                                <td>
                                    @if($stock->stock > 0)
                                        {{$stock->stock}}
                                    @else
                                    Not Stocked
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $price = ($stock->product->distributor_price);
                                    @endphp
                                    &#2547; {{number_format($price, 2) }}
                                </td>
                                <td>
                                    @php
                                        $value = ($stock->stock) * ($stock->product->distributor_price);
                                    @endphp
                                    &#2547; {{number_format($value, 2) }}
                                </td>
                                <td>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <!-- <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-toggle="dropdown">
                                                    
                                                    <em class="icon ni ni-truck"></em></a></li>
                                            <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-toggle="dropdown">
                                                    <em class="icon ni ni-eye"></em></a></li> -->
                                            <li>
                                                <div class="drodown mr-n1">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#UpdateModal{{ $stock->id }}" data-toggle="modal" ><em class="icon ni ni-eye" ></em><span>Edit</span></a></li>
                                                            {{-- <li><a href="#UpdateModal" data-toggle="modal" ><em class="icon ni ni-truck"></em><span>Edit</span></a></li> --}}
                                                            <!-- <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li> -->
                                                            {{-- <li><a href="" target="_blank"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li> --}}
                                                            <!-- <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                </tr>
                                <!-- Update Modal -->
                                <div class="modal fade" tabindex="-1" id="UpdateModal{{$stock->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Stock</h5>
                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('stock.update' , $stock->id) }}" class="form-validate is-alter">
                                                    @csrf
                                                    <div class="card">
                                                        <div class="card-inner">
                                                            <div class="row g-3 align-center">
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="site-name">Date</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <input type="date" class="form-control" id="site-name" name="date" value="{{$stock->date}}" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 align-center">
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Stock</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="site-email" name ="stock" value="{{$stock->stock}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 align-center">
                                                                <div class="col-lg-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Remarks</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="site-email" name ="note" value="{{$stock->note}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                               
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-outline-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div><!-- card -->
                                                </form>
                                            </div>
                                            <div class="modal-footer bg-light">
                                                <span class="sub-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Update modal End -->
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                    </div><!-- .card-inner -->
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

      $("#product_name").select2({
        });
</script>

@endsection