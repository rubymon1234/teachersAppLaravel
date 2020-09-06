@extends('layouts.admin')
@section('title', 'Role Management')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="clearfix"></div>
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
                            <h4 class="box-title">@yield('title') :: List Permission  <a href="{{ route('acl.perms.manage') }}" class="btn btn-info btn-sm" style="float: right;">Add New Permission</a></h4> 
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Permission Name</th>
                                            <th>Display Name</th>
                                            <th>Description</th>
                                            <th style="text-align: left;">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($perms as $key=>$perm)
                                            <tr>
                                                <td class="serial">{{ $key + $perms->firstItem()}}</td>
                                                <td> <span class="name">{{ $perm->name }}</span> </td>
                                                <td> <span class="product">{{ $perm->display_name }}</span> </td>
                                                <td> {{ $perm->description }} </td>
                                                <td style="text-align: left;"> 
                                                    <a href="{{ route('acl.perms.edit' ,$perm->id) }}"><i class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit Permission" ></i></a>&nbsp;&nbsp;
                                                    <a href="" id="dou_conf_{{ $perm->id }}">
                                                    <i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Permission" onclick="doubleConfirm({{ $perm->id }},'{{ route('acl.perms.delete',$perm->id) }}')">
                                                     </i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"> No Permission in the list... for now! </td>
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
<script type="text/javascript">
    function doubleConfirm(permission_id,url){
        if (confirm('Are you sure you want to permanently delete this permission ?')){
           jQuery('#dou_conf_'+permission_id).attr('href',url);
        }
    }
</script>
@endsection