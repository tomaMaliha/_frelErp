 <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="" class="logo-link nk-sidebar-logo">
            <div class="nk-sidebar-brand">
            <a href="#" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" style="max-width:220px; top: 4px; " src="{{asset('public/assets/imager/logo.frcl.png')}}" srcset="{{asset('public/assets/images/logo.frcl.png 2x')}}" alt="logo">
                            <img class="logo-dark logo-img" style="max-width:220px; top: 4px;" src="{{asset('public/assets/images/logo.frcl.png')}}" srcset="{{asset('public/assets/images/logo.frcl.png 2x')}}" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" style="max-width:220px; top: 4px;" src="{{asset('public/assets/images/logo.frcl.png')}}" srcset="{{asset('public/assets/images/logo.frcl.png 2x')}}" alt="logo-small">
                        </a>
                    </div>
                
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('admin.home')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">User Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                                <a href="{{route('role')}}" class="nk-menu-link"><span class="nk-menu-text">Role Manage</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('user.list')}}" class="nk-menu-link"><span class="nk-menu-text">User List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('user.add')}}" class="nk-menu-link"><span class="nk-menu-text">Add User</span></a>
                            </li>
                            
                            <!-- Second DropDown -->
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-col-2s"></em></span>
                                    <span class="nk-menu-text">Manage Locations</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="{{route('user.division')}}" class="nk-menu-link"><span class="nk-menu-text">Division Manage</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('user.zone')}}" class="nk-menu-link"><span class="nk-menu-text">Zone Manage</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('user.base')}}" class="nk-menu-link"><span class="nk-menu-text">Base Manage</span></a>
                                    </li>
                                    
                                    <!-- <li class="nk-menu-item">
                                        <a href="{{route('permission.list')}}" class="nk-menu-link"><span class="nk-menu-text">Permission Manage</span></a>
                                    </li> -->
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->

                            <!-- <li class="nk-menu-item">
                                <a href="{{route('permission.list')}}" class="nk-menu-link"><span class="nk-menu-text">Permission Manage</span></a>
                            </li> -->
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Distributor Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('distributor.list')}}" class="nk-menu-link"><span class="nk-menu-text">Distributor List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('distributor.add')}}" class="nk-menu-link"><span class="nk-menu-text">Distributor Open</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('distributor.pending')}}" class="nk-menu-link"><span class="nk-menu-text" >Distributor Pending List <span class="badge badge-danger">[ {{App\Distributor::where('active',0)->count()}} ]</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('db.stock.report')}}" class="nk-menu-link"><span class="nk-menu-text">DB Stock Report</span></a>
                            </li>
                           
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                            <span class="nk-menu-text">Product Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                                <a href="{{route('brand.list')}}" class="nk-menu-link"><span class="nk-menu-text">Brand</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('category.list')}}" class="nk-menu-link"><span class="nk-menu-text">Category</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('product.list')}}" class="nk-menu-link"><span class="nk-menu-text">Product List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('product.add')}}" class="nk-menu-link"><span class="nk-menu-text">Add Product</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-db-fill"></em></span>
                            <span class="nk-menu-text">Factory Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('stock.add')}}" class="nk-menu-link"><span class="nk-menu-text">Add FG in Stock</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('stock.list')}}" class="nk-menu-link"><span class="nk-menu-text">View FG Stock List</span></a>
                            </li>
                            <!-- <li class="nk-menu-item">
                                <a href="{{route('stock.add')}}" class="nk-menu-link"><span class="nk-menu-text">FG Transfer</span></a>
                            </li> -->
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-sign-dollar"></em></span>
                            <span class="nk-menu-text">Payment Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('payment.add')}}" class="nk-menu-link"><span class="nk-menu-text">Payment Receive</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('payment.details')}}" class="nk-menu-link"><span class="nk-menu-text">Payment Details</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('transaction.show')}}" class="nk-menu-link"><span class="nk-menu-text">Transaction Details</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('customerStatement')}}" class="nk-menu-link"><span class="nk-menu-text">Customer Statement</span></a>
                            </li>
                            <li class="nk-menu-item">
                                {{-- <a href="{{route('distributor.commission.balance')}}" class="nk-menu-link"><span class="nk-menu-text">DB Commission Balance</span></a> --}}
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('bank.list')}}" class="nk-menu-link"><span class="nk-menu-text">Bank Manage</span></a>
                            </li>
                            {{-- <li class="nk-menu-item">
                                <a href="{{route('payment.add.backDate')}}" class="nk-menu-link"><span class="nk-menu-text">BD Payment Receive</span></a>
                            </li> --}}
                            {{-- <li class="nk-menu-item">
                                <a href="" class="nk-menu-link"><span class="nk-menu-text">BD Payment Receive</span></a>
                            </li> --}}
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Order Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('order.list')}}" class="nk-menu-link"><span class="nk-menu-text">Create Order</span></a>
                            </li>
                            <li class="nk-menu-item">
                            <a href="{{route('pending.order')}}" class="nk-menu-link"><span class="nk-menu-text" >Pending Order <em class="icon ni ni-bell"></em> <span class="badge badge-danger">[ {{App\Order::where('status',0)->count()}} ]</em></span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('allOrder.list')}}" class="nk-menu-link"><span class="nk-menu-text">Open Order List</span></a>
                            </li>
                            
                            
                        </ul><!-- .nk-menu-sub -->
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-out"></em></span>
                            <span class="nk-menu-text">Delivery</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('delivery.add')}}" class="nk-menu-link"><span class="nk-menu-text">Create Delivery</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('delivery.list')}}" class="nk-menu-link"><span class="nk-menu-text">Delivery Report</span></a>
                            </li>
                           
                            <li class="nk-menu-item">
                                <a href="{{route('driver.list')}}" class="nk-menu-link"><span class="nk-menu-text" >Driver List</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    {{-- <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                            <span class="nk-menu-text">Report</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('delivery.add')}}" class="nk-menu-link"><span class="nk-menu-text">Create Delivery</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('delivery.list')}}" class="nk-menu-link"><span class="nk-menu-text">Delivery Report</span></a>
                            </li>
                           
                            <li class="nk-menu-item">
                                <a href="{{route('driver.list')}}" class="nk-menu-link"><span class="nk-menu-text" >Driver List</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li> --}}
                    
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>