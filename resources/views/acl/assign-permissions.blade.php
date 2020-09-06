@extends('layouts.admin')
@section('title', 'Role Management')
@section('content')
<div class="content">
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
                            <h4 class="box-title">@yield('title') :: Assign Permission  </h4> 
                        </div>
                        <?php $assignRole  = array(); ?>
                            @foreach($role_permissions as $assignrole)
                                <?php  $assignRole[] = $assignrole->id; ?> 
                            @endforeach
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <form role="form" method="post" action="">
                                    {{ csrf_field() }}
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">Check</th>
                                                <th class="avatar">Name</th>
                                                <th>Display Name</th>
                                                <th style="text-align: left;">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($permissions as $key=>$role_perms)
                                                <tr>
                                                    <td class="serial"><input type="checkbox" name="permissn[]" class="" id="check1" value="{{ $role_perms->id }}" <?php 
                                                if (in_array($role_perms->id, $assignRole)) { ?>
                                                    checked=checked
                                                <?php } ?>> </td>
                                                    <td>  <span class="name">{{ $role_perms->name }}</span> </td>
                                                    <td> <span class="product">{{ $role_perms->display_name }}</span> </td>
                                                    <td style="text-align: left;"> {{ $role_perms->description }} </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6"> No Permission in the list... for now! </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-danger pull-right" name="Cancel" value="cancel">Cancel</button>&nbsp;
                                        <button type="submit" class="btn btn-info pull-right" style="margin-right: 10px;" name="Update" value="Save">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection