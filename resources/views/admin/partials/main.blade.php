@extends('admin.master')
@section('content')


<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-4">
                            <div class="row g-gs">
                                <div class="col-xxl-12 col-md-6">
                                    <div class="card">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Orders</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        @php
                                                            $avgOrder = 0;
                                                            $t = 0;
                                                            $c = App\Order::count();
                                                            foreach (App\Order::all() as $order) {
                                                                $t = $t + $order->total;
                                                            }
                                                            $avgOrder = $t / $c;

                                                            if ($t != 0) {
                                                            $percent = $t / $c * 100;
                                                            } else {
                                                            $percent = 0;
                                                            }
                                                            
                                                        @endphp
                                                        <div class="amount">
                                                            {{ $c }}  
                                                        </div>
                                                        
                                                        <div class="info text-right"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up">
                                                            </em>{{ $percent }} %</span><br><span>vs. last week</span></div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="nk-ecwg3-ck">
                                                <canvas class="ecommerce-line-chart-s1" id="totalOrders"></canvas>
                                            </div>
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-xxl-12 col-md-6">
                                    <div class="card">
                                        <div class="nk-ecwg nk-ecwg3">
                                            <div class="card-inner pb-0">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Customers</h6>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount">
                                                            {{ count($distributor) }}
                                                        </div>
                                                        <div class="info text-right"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><br><span>vs. last week</span></div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="nk-ecwg3-ck">
                                                <canvas class="ecommerce-line-chart-s1" id="totalCustomers"></canvas>
                                            </div>
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .col -->
                        {{-- <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Today Distributors</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">{{ count($distributors) }}</div>
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                                </div>
                                            </div>
                                            <!-- <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div> -->
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Total Distributor</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">{{ count($distributor) }}</div>
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                                </div>
                                            </div>
                                            <!-- <div class="info"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>2.34%</span><span> vs. last week</span></div> -->
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Today Users</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">{{ count($users) }}</div>
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayCustomers"></canvas>
                                                </div>
                                            </div>
                                            <!-- <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div> -->
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Today New Products</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount">{{ count($products) }}</div>
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                                                </div>
                                            </div>
                                            <!-- <div class="info"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>2.34%</span><span> vs. last week</span></div> -->
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div><!-- .col --> --}}
                        
                        <div class="col-xxl-8">
                            <div class="card card-full">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Recent Orders</h6><hr>
                                        </div>
                                        <!-- <form method="post" action="{{route('recent.order')}}" class="form-validate">
                                            @csrf
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" name="order_id" class="form-control" id="default-04" placeholder="Order search by id">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">Search</button>
                                                </div>
                                            </div>
                                        </form> -->
                                    </div>
                                </div>
                                <div class="nk-tb-list mt-n2">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span>Order No.</span></div>
                                        <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                        <div class="nk-tb-col"><span>Amount</span></div>
                                        <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                    </div>
                                    
                                    @foreach(App\Order::orderBy('id' , 'asc')->limit(5)->get() as $order)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <span class="tb-lead"><a href="{{ route('orderDetails.active' , $order->id) }}">
                                                    {{ $order->order_id }}
                                                </a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <div class="user-card">
                                                    <div class="user-name">
                                                        <span class="tb-lead">
                                                            {{ $order->distributor->distributor_name }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $timestamp = strtotime($order->created_at->diffForHumans());
                                                $newDate = date('d F, Y', $timestamp);
                                                @endphp
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">
                                                    {{ $newDate }}
                                                </span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub tb-amount"> &#2547; {{ $order->total }} <span></span></span>
                                            </div>
                                            @if($order->status == 0)
                                                <div class="nk-tb-col">
                                                    <span class="badge badge-dot badge-dot-xs badge-warning">
                                                         Pending
                                                    </span>
                                                </div>
                                            @else
                                                <div class="nk-tb-col">
                                                    <span class="badge badge-dot badge-dot-xs badge-success">
                                                        Approved
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div><!-- .card -->
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <div class="card-title-group mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Top products</h6>
                                        </div>
                                        <!-- <div class="card-tools">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle link link-light link-sm dropdown-indicator" data-toggle="dropdown">Weekly</a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Daily</span></a></li>
                                                        <li><a href="#" class="active"><span>Weekly</span></a></li>
                                                        <li><a href="#"><span>Monthly</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    @foreach($product as $pro)
                                    <ul class="nk-top-products">
                                        <li class="item">
                                            <div class="thumb">
                                                @if(!empty($pro->image))
                                                    <img src="{{asset('public/assets/images/product/' . $pro->image)}}">
                                                @endif
                                            </div>
                                            <div class="info">
                                                <div class="title">
                                                    <a href="{{ route('product.details' , $pro->id) }}"> 
                                                        {{ $pro->name }}
                                                    </a>
                                                </div>
                                                <div class="price">
                                                   {{ $pro->category->name }}
                                                </div>
                                            </div>
                                            <div class="total">
                                                <div class="amount">
                                                    &#2547;  {{ $pro->distributor_price }} 
                                                </div>
                                                <div class="count">
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                    @endforeach
                                </div><!-- .card-inner -->
                                
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <div class="card-title-group mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Store Statistics</h6>
                                        </div>
                                    </div>
                                    
                                    <ul class="nk-store-statistics">
                                        {{-- <li class="item">
                                            <div class="info">
                                                <div class="title">Orders</div>
                                                <div class="count">{{ count($order) }} </div>
                                            </div>
                                            <em class="icon bg-primary-dim ni ni-bag"></em>
                                        </li> --}}
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Customers</div>
                                                <div class="count">{{ count($distributor) }}</div>
                                            </div>
                                            <em class="icon bg-info-dim ni ni-users"></em>
                                        </li>
                                       
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Products</div>
                                                <div class="count">{{ count($product) }}</div>
                                            </div>
                                            <em class="icon bg-pink-dim ni ni-box"></em>
                                        </li>
                                        
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Categories</div>
                                                <div class="count">{{ count($category) }}</div>
                                            </div>
                                            <em class="icon bg-purple-dim ni ni-server"></em>
                                        </li>
                                        
                                    </ul>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection