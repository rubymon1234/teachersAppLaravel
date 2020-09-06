@extends('layouts.admin')
@section('title', 'Role Management')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">@yield('title') :: Add Role</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Role Name." value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>Display Name</label>
                                <input type="text" name="display_name" class="form-control" placeholder="Enter Display Name." value="{{ old('display_name') }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Description." value="{{ old('description') }}">
                            </div>
                            <div class="box-footer">
                                @if ($errors->any())
                                    <label class="control-label" for="inputError" style="color: #dd4b39"><i class="fa fa-times-circle-o" ></i> {{ implode('', $errors->all(':message')) }} .</label>
                                @endif
                                <button type="submit" class="btn btn-danger pull-right" name="Cancel" value="cancel">Cancel</button>&nbsp;
                                <button type="submit" class="btn btn-info pull-right" style="margin-right: 10px;" name="Update" value="Save">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>
</section>
@endsection
