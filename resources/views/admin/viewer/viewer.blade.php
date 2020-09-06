@extends('layouts.admin')
@section('title', 'Viewer Management')
@section('content')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="col-xs-12">
            @if(session('error_message'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error_message') }}
                </div>
            @endif
            @if(session('success_message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success_message') }}
                </div>
            @endif
            @if(session('warning_message'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('warning_message') }}
                </div>
            @endif
        </div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">@yield('title') :: Who Viewed Whom  </h4> 
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Viewed By</th>
                                            <th> Which Profile</th>
                                            <th> View Count </th>
                                            <th>Contact Request</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($viewerDetail as $key=>$view)
                                            <tr>
                                                <td class="serial">{{ $key + $viewerDetail->firstItem()}}</td>
                                                <td> <span class="name">{{ $view->viewer_name }} </span> </td>
                                                <td> <span class="product"> {{ $view->profile_name }} </span> </td>
                                                <td> {{ $view->view_count }} </td>
                                                <td>
                                                    @if($view->contacted ==1)
                                                    <span class="badge badge-complete">Contact</span>
                                                    @else
                                                    <span class="badge badge-complete">Viewed</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"> No Role in the list... for now! </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection