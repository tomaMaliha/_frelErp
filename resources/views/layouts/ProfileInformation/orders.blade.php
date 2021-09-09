@extends('admin.masterUser')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
        .container {
            padding-left: 0px;
            padding-right: 0px;
        }
        #wrapper {
            overflow-x: hidden;
         }

        #sidebar-wrapper {
          min-height: 100vh;
          margin-left: -16rem;
          -webkit-transition: margin .25s ease-out;
          -moz-transition: margin .25s ease-out;
          -o-transition: margin .25s ease-out;
          transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
          padding: 0.875rem 1.25rem;
          font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
          width: 15.4rem;
        }

        #page-content-wrapper {
          min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
          margin-left: 0;
        }

        @media (min-width: 768px) {
          #sidebar-wrapper {
            margin-left: 0;
          }

          #page-content-wrapper {
            min-width: 0;
            width: 100%;
          }

          #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
          }
        }
        .list-group-flush>.list-group-item  {
            font-size: 13px;
            color: #ced4da;
            border-color: #08084a;
        }
        a.bg-theme-blue:focus, a.bg-theme-blue:hover, button.bg-theme-blue:focus, button.bg-theme-blue:hover {
            color: #fff;
            background-color: #212145!important;
        }
        .list-group-item.active {
            color: #FF005C;
            font-weight: bold;
            background: #fff;
            background-color: #212145!important;
            border: none;
        }
        .navbar.bg-light {
            background: #fff !important;
             box-shadow: none; 
        }
        .user-phn {
            font-size: 12px;
            color: #a5a5a5;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .user-name {
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 15px;
        }
        .sidebar-heading {
            text-align: center;
            background: #0f0f4b;
            border-bottom: 2px solid #fff;
        }
        .user-img {
            margin-bottom: 20px;
        }
        .user-img img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 1px solid #6c757d;
        }
        .bg-theme-blue {
            background-color: #07072d!important
        }
        .navbar-toggler {
            padding: .25rem 1.75rem;
        }
        .logout-btn {
            color: #07072d!important;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid #07072d;
            border-radius: 5px;
            padding: 6px 20px!important;
        }
        .logout-btn:hover {
            background: #07072d;
            color: #fff!important;
            box-shadow: 1px 1px 3px #0000004d;
        }
        .url-class {
            font-size: 12px;
            color: #a5a5a5;
            letter-spacing: 1px;
        }
        .dataTables_info {
            font-size: 12px;
        }
        .dataTables_paginate {
            font-size: 12px;
        }
        .dataTables_length {
            font-size: 12px;
        }
        .dataTables_filter {
            font-size: 12px;
        }
        .custom-action-btn {
            font-size: 12px;
            font-weight: 400;
        }
    </style>

@endsection

@section('content')
    <h2 class="mt-4">DB Orders List</h2>
    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-bordered" style="width:100%; font-size: 12px!important;">
                    <thead>
                   <center><h4 >DB Order List</h4></center><br>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th class="tb-col-mb tb-col-md tb-col-sm tb-col-lg" style="text-align: center;">Distributor</th>
                            <th class="tb-col-mb tb-col-md tb-col-sm tb-col-lg" style="text-align: center;">Product</th>
                            <th class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">Qty</th>
                            <th class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">Price (&#2547;)</th>
                            <th class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">Total Value</th>
                            {{-- <th class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">Delivery</th> --}}
                            {{-- <th class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">Order Created</th>  --}}
                            {{-- <th>Order Status</th> --}}
                        </tr>
                    </thead>
                    @php $num = 0; @endphp
                    <tbody>
                        @foreach ($orders as $order)
                        
                                <tr>
                                    <td >@php echo ++$num; @endphp</td>
                                    <td >{{ $order->order_id }}</td>
                                    <td class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">
                                        {{ $order->distributor->distributor_name }}
                                    </td>
                                   
                                    <td class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">
                                        @foreach ($order->order as $key => $product)
                                                {{ $product->product->name }}
                                        @endforeach
                                    </td> 
                                    <td class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">
                                        @foreach ($order->order as $key => $product)
                                              {{ $product->quantity }}
                                        @endforeach
                                    </td> 
                                    <td class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">
                                        @foreach ($order->order as $key => $product)
                                               &#2547; {{ $product->product->distributor_price }}
                                        @endforeach
                                    </td> 
                                    <td class="tb-col-mb tb-col-md tb-col-sm tb-col-lg">
                                        @foreach ($order->order as $key => $product)
                                               &#2547; {{ $product->quantity * $product->sub_total }}
                                        @endforeach
                                    </td> 
                                    {{-- @if ($order->orders->count() > 1) --}}
                                        {{-- 
                                    @else
                                        @foreach ($order->orders as $key => $product)
                                            <td>
                                                <img src="{{ asset($product->product_image) }}" width="20px"><br>
                                                {{ $product->product_name }}
                                            </td>
                                            <td>{{ $product->product_attribute }}</td>
                                            <td>{{ $product->quantity }} x {{ $product->price }}</td>
                                        @endforeach
                                    @endif --}}
                                    {{-- @if ($order->orders->count() > 1)
                                        <td style="padding: 0px;">
                                            <table style="width: -webkit-fill-available;">
                                                @foreach ($order->orders as $key => $product)
                                                    <tr>
                                                        <td>{{ $product->product_attribute }} </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    @else
                                        @foreach ($order->orders as $key => $product)
                                            <td>{{ $product->product_attribute }}</td>
                                        @endforeach
                                    @endif--}}
                                    
                                    
                                    
                                    </td>
                                </tr>
                              
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@endsection