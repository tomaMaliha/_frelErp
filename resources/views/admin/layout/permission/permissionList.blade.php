@extends('admin.master')
@section('css')

<style>

.customImg
{
    height: 70px;
    width: 70px;
    border-radius: 50%;
}
</style>

@endsection
@section('content')





<!-- content @s -->
<div class="nk-content ">
<div class="container-fluid">
<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">


        @if(Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
        @endif
        

            </div><!-- .nk-block-head-content -->
            <form action="{{route('permission.store')}}" method="POST">
            @csrf
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="form-control-wrap">
                                    
                                    <select class="form-control" id="default-04" name="role" data-placeholder="Select a option" required>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                                </div>
                            </li>
                            <li class="nk-block-tools-opt">
                                <a href="{{route('user.add')}}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <a href="{{route('user.add')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Submit</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->

        </form>
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="nk-tb-list is-separate is-medium mb-3">
            <div class="nk-tb-item nk-tb-head">
                
                <div class="nk-tb-col"><span>Modules</span></div>
                <div class="nk-tb-col tb-col-md"><span>Add</span></div>
                <div class="nk-tb-col"><span class="d-none d-mb-block">Edit</span></div>
                <div class="nk-tb-col tb-col-sm"><span>List View</span></div>
                <div class="nk-tb-col tb-col-md"><span>Delete</span></div>
            </div><!-- .nk-tb-item -->
            

            <!-- User Module -->
                <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        User Management
                    </div>
                    <div class="nk-tb-col">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid1" name="permission[role][add]" value="1">
                            <label class="custom-control-label" for="uid1"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid2" name="permission[role][edit]" value="1">
                            <label class="custom-control-label" for="uid2"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid3" name="permission[permission][view]" value="1">
                            <label class="custom-control-label" for="uid3"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid4" name="permission[permission][delete]" value="1">
                            <label class="custom-control-label" for="uid4"></label>
                        </div>
                    </div>
                </div><!-- .nk-tb-item -->
            
               <!-- Order Module -->
            <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        Order Management
                    </div>
                    <div class="nk-tb-col">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid5" name="permission[role][add]" value="1">
                            <label class="custom-control-label" for="uid5"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid6" name="permission[role][edit]" value="1">
                            <label class="custom-control-label" for="uid6"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid7" name="permission[permission][view]" value="1">
                            <label class="custom-control-label" for="uid7"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid8" name="permission[permission][delete]" value="1">
                            <label class="custom-control-label" for="uid8"></label>
                        </div>
                    </div>
                </div>

                <!-- Accounts Module -->
                <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        Accounts Management
                    </div>
                    <div class="nk-tb-col">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid9" name="permission[role][add]" value="1">
                            <label class="custom-control-label" for="uid9"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid10" name="permission[role][edit]" value="1">
                            <label class="custom-control-label" for="uid10"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid11" name="permission[permission][view]" value="1">
                            <label class="custom-control-label" for="uid11"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid12" name="permission[permission][delete]" value="1">
                            <label class="custom-control-label" for="uid12"></label>
                        </div>
                    </div>
                </div><!-- .nk-tb-item -->


                <!-- inventory module -->
                <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        Inventory Management
                    </div>
                    <div class="nk-tb-col">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid13" name="permission[role][add]" value="1">
                            <label class="custom-control-label" for="uid13"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid14" name="permission[role][edit]" value="1">
                            <label class="custom-control-label" for="uid14"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid15" name="permission[permission][view]" value="1">
                            <label class="custom-control-label" for="uid15"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid16" name="permission[permission][delete]" value="1">
                            <label class="custom-control-label" for="uid16"></label>
                        </div>
                    </div>
                </div><!-- .nk-tb-item -->



                	<!-- Payment Module -->
                	<div class="nk-tb-item">
                    <div class="nk-tb-col">
                        Payment Management
                    </div>
                    <div class="nk-tb-col">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid17" name="permission[role][add]" value="1">
                            <label class="custom-control-label" for="uid17"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid18" name="permission[role][edit]" value="1">
                            <label class="custom-control-label" for="uid18"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid19" name="permission[permission][view]" value="1">
                            <label class="custom-control-label" for="uid19"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid20" name="permission[permission][delete]" value="1">
                            <label class="custom-control-label" for="uid20"></label>
                        </div>
                    </div>
                </div><!-- .nk-tb-item -->

                <!-- HRM -->
                <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        HRM Management
                    </div>
                    <div class="nk-tb-col">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid21" name="permission[role][add]" value="1">
                            <label class="custom-control-label" for="uid21"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid22" name="permission[role][edit]" value="1">
                            <label class="custom-control-label" for="uid22"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid23" name="permission[permission][view]" value="1">
                            <label class="custom-control-label" for="uid23"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid24" name="permission[permission][delete]" value="1">
                            <label class="custom-control-label" for="uid24"></label>
                        </div>
                    </div>
                </div><!-- .nk-tb-item -->


                <!-- Reports -->
                <div class="nk-tb-item">
                    <div class="nk-tb-col">
                        Reports Management
                    </div>
                    <div class="nk-tb-col">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid25" name="permission[role][add]" value="1">
                            <label class="custom-control-label" for="uid25"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                       <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid26" name="permission[role][edit]" value="1">
                            <label class="custom-control-label" for="uid26"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid27" name="permission[permission][view]" value="1">
                            <label class="custom-control-label" for="uid27"></label>
                        </div>
                    </div>
                   
                        <div class="nk-tb-col">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid28" name="permission[permission][delete]" value="1">
                            <label class="custom-control-label" for="uid28"></label>
                        </div>
                    </div>
                </div><!-- .nk-tb-item -->
            
        </div><!-- .nk-tb-list -->
        <div class="card">
            <div class="card-inner">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        <ul class="pagination justify-content-center justify-content-md-start">
                            <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-left"></em></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-right"></em></a></li>
                        </ul><!-- .pagination -->
                    </div>
                    <div class="g">
                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                            <div>Page</div>
                            <div>
                                <select class="form-select form-select-sm" data-search="on" data-dropdown="xs center">
                                    <option value="page-1">1</option>
                                    <option value="page-2">2</option>
                                    <option value="page-4">4</option>
                                    <option value="page-5">5</option>
                                    <option value="page-6">6</option>
                                    <option value="page-7">7</option>
                                    <option value="page-8">8</option>
                                    <option value="page-9">9</option>
                                    <option value="page-10">10</option>
                                    <option value="page-11">11</option>
                                    <option value="page-12">12</option>
                                    <option value="page-13">13</option>
                                    <option value="page-14">14</option>
                                    <option value="page-15">15</option>
                                    <option value="page-16">16</option>
                                    <option value="page-17">17</option>
                                    <option value="page-18">18</option>
                                    <option value="page-19">19</option>
                                    <option value="page-20">20</option>
                                </select>
                            </div>
                            <div>OF 102</div>
                        </div>
                    </div><!-- .pagination-goto -->
                </div><!-- .nk-block-between -->
            </div>
        </div>
    </div><!-- .nk-block -->
</div>
</div>
</div>
</div>
    <!-- content @e -->


@endsection