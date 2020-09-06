@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Contacted </h4>
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