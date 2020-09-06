@extends('layouts.admin')
@section('title', 'Event Management')
@section('content')
<section class="content">
    <div class="row">
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
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">@yield('title') :: Create Event Category</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                          <div class="input-group-btn">
                            <a href="{{ route('acl.role.manage') }}" class="btn btn-block btn-success btn-lg">Add New Role</a>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th class="center"> SI_NO </th>
                                <th class="center"> Event Name </th>
                                <th class="center"> Status </th>
                                <th class="center"> Manage </th>
                            </tr>
                            @forelse($eventCategory as $key=>$category)
                                <tr>
                                    <td>{{ $key + $eventCategory->firstItem()}}</td>
                                    <td><b>{{ $category->event_name }}</b></td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <a href="{{ route('assign.role.permission', $category->id) }}" class="btn btn-primary btn-xs">Edit Event</a>
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
</section>
@endsection
