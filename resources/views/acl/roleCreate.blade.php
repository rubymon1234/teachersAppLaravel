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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body mainHeading">
                            <h4 class="box-title">@yield('title') :: Add Role</h4>
                        </div>
                        <div class="card-body innerDataHolderV1">
                            <div class="custom-tab">
                                <div class="tab-content pl-3 pt-2">
                                    <form role="form" action="" method="post">
                                        {{ csrf_field() }}
                                        <div class="tab-pane fade active show" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="name" class="form-control" placeholder="Enter Role Name." value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <label for="text-input" class=" form-control-label">Display Name</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="display_name" class="form-control" placeholder="Enter Display Name." value="{{ old('display_name') }}">
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col-12">
                                                    <label for="text-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" name="description" class="form-control" placeholder="Enter Description." value="{{ old('description') }}">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                @if ($errors->any())
                                                    <label class="control-label" for="inputError" style="color: #dd4b39"><i class="fa fa-times-circle-o" ></i> {{ implode(' | ', $errors->all(':message')) }} .</label>
                                                @endif
                                                <button type="submit" class="btn btn-danger pull-right" name="Cancel" value="cancel">Cancel</button>&nbsp;
                                                <button type="submit" class="btn btn-info pull-right" style="margin-right: 10px;" name="Update" value="Save">Create</button>
                                            </div>
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
</div>
@endsection
