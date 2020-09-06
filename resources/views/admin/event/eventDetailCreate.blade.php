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
                      <h3 class="box-title">@yield('title') :: Event Detail </h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-6">
                                <label>Category</label>
                                <select name="category" class="form-control" required="required">
                                    <option value="0">Select categorg</option>
                                    <?php foreach ($categorys as $key => $category) { ?>
                                        <option value='<?php echo $category->id ?>' > <?php echo $category->event_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>StartDate & EndDate:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" name="startEndDate" class="form-control pull-right" id="reservation" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="layoutImage" class="form-control" placeholder="Enter Description." value="{{ old('layoutImage') }}" >
                            </div>
                            <div class="form-group">
                                <label>Event Images</label>
                                <input type="file" name="eventImage[]"   class="form-control" placeholder="Enter Description." value="{{ old('eventImage') }}" multiple >
                            </div>
                            <div class="form-group">
                                <label>PriceRange (ex: $100 - $200)</label>
                                <input type="text" name="prizeRange" class="form-control" placeholder="Enter Display Name." value="{{ old('prizeRange') }}" required="required">
                            </div>
                            <div class="box-footer">
                                @if ($errors->any())
                                    <label class="control-label" for="inputError" style="color: #dd4b39">
                                        <i class="fa fa-times-circle-o" ></i> 
                                        {{ implode('', $errors->all(':message')) }} .
                                    </label>
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
