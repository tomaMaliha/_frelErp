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
                        

                        <h3 class="nk-block-title page-title">Division List</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        Total Division : {{ $total_division }}
                                        <br>
                                        Active Division : {{ $active }}
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col nk-tb-col-check">
                                            SL
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Division Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Bangla Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">URL</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($divisions as $key=>$division)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            {{ $key+1 }}
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">
                                                        {{$division->name}}
                                                    <span class="dot dot-success d-md-none ml-1"></span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                {{$division->bn_name}}
                                            <span class="currency"></span></span>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">
                                                {{$division->url}}
                                            <span class="currency"></span></span>
                                        </td>
                                        @if($division->status==1)
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-success">Active</span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-md">
                                        <span class="tb-status text-danger">InActive</span>
                                        </td>
                                        @endif
                                        @if($division->status)
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('division.active', $division->id) }}" method="post">
                                        @csrf
                                            <span>
                                            <button type="submit" class="btn btn-outline-warning">InActive</button>
                                            </form>
                                            </span>
                                        </td>
                                        @else
                                        <td class="nk-tb-col tb-col-lg">
                                        <form action="{{ route('division.active', $division->id) }}" method="post">
                                        @csrf
                                            <span>
                                            <button type="submit" class="btn btn-outline-success">Active</button>
                                            </form>
                                            </span>
                                        </td>
                                        @endif
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->
                                    
                                   
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div>

            </div>
        </div>
    </div>
</div>
<!-- content @e -->


@endsection