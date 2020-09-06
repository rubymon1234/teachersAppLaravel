@extends('layouts.admin')
@section('title', 'User Management')
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
                            <h4 class="box-title">@yield('title') :: List  </h4> 
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">User Name</th>
                                            <th> Role Name </th>
                                            <th> Contact Number </th>
                                            <th> Email </th>
                                            <th> Expected Salary </th>
                                            <th> Manage </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($userDetail as $key=>$user)
                                            <tr>
                                                <td class="serial">{{ $key + $userDetail->firstItem()}}</td>
                                                <td> <span class="name">{{ $user->m_name }} </span> </td>
                                                <td> <span class="product"> {{ $user->role_display_name }} </span> </td>
                                                <td> {{ $user->mobile_number }} </td>
                                                <td>
                                                    {{ $user->m_email }}
                                                </td>
                                                <td>
                                                    {{ $user->expected_salary }}
                                                </td>
                                                <td>
                                                    @if($user->rolename !='user')
                                                    <span class="badge badge-complete"><a href="{{ route('admin.user.detail', ['id' => Crypt::encrypt($user->userId)]) }}" style="color: white;"> View Details </a></span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"> No Users in the list... for now! </td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                                {{ $userDetail->links() }}
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

<style type="text/css">
    .pagination {
        margin-left: 18px ! important;
    }
</style>