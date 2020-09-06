@extends('layouts.admin')
@section('title', 'Role Management')
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
                            <h4 class="box-title">@yield('title') :: List Roles  <a href="{{ route('acl.role.manage') }}" class="btn btn-info btn-sm" style="float: right;">Add New Role</a></h4> 
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Role Name</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th style="text-align: left;">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($roles as $key=>$role)
                                            <tr>
                                                <td class="serial">{{ $key + $roles->firstItem()}}</td>
                                                <td>  <span class="name">{{ $role->name }}</span> </td>
                                                <td> <span class="product">{{ $role->display_name }}</span> </td>
                                                <td> {{ $role->description }} </td>
                                                <td style="text-align: left;">
                                                    <span class="badge badge-complete"><a href="{{ route('assign.role.permission', $role->id) }}" style="color: white;"> Manage Permissions</a></span>
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