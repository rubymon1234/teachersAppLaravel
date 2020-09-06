@extends('layouts.admin')
@section('title', 'User Management')
@section('content')
<div class="content">
<div class="animated fadeIn">
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-header">
<strong class="card-title">Address for Communication</strong>
</div>
<div class="card-body">

<div id="pay-invoice">
<div class="card-body">
<div class="form-group">
<label for="cc-payment" class="control-label mb-1">House Name</label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_house_name }}" disabled="disabled">
</div>
<div class="form-group has-success">
<label for="cc-name" class="control-label mb-1">House No</label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_house_no }}" disabled="disabled">
<span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">Land mark </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_landmark }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">Village </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_village }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">Post Office </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_postoffice }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">Block </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_block }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">Panchayath </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_panchayath }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">District </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_district }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">State </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_state }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="form-group">
<label for="cc-number" class="control-label mb-1">Pincode </label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_pincode }}" disabled="disabled">
<span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
<div class="row form-group">
<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address</label></div>
<div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{ $userDetails[0]->address }}</textarea></div>
</div>
<div>
</button>
</div>
</div>
</div>
</div>
</div> 
</div>


<div class="col-lg-6">
<div class="card">
<div class="card-header"><strong>Contact </strong><small> Details</small></div>
<div class="card-body card-block">
    <div class="form-group"><label for="vat" class=" form-control-label">landPhone</label>
    <input type="text" id="vat" placeholder="" class="form-control"  value="{{ $userDetails[0]->landPhone }}"></div>
<div class="form-group"><label for="company" class=" form-control-label">Mobile No    </label>
    <input type="text" id="company" value="{{ $userDetails[0]->mobile_number }}" placeholder="" class="form-control"></div>
<div class="form-group"><label for="vat" class=" form-control-label">Alternative No</label>
    <input type="text" id="vat" placeholder="" class="form-control"  value="{{ $userDetails[0]->alt_number }}"></div>
<div class="form-group"><label for="street" class=" form-control-label">Whatsapp No   </label>
    <input type="text" id="street" placeholder="" class="form-control" value="{{ $userDetails[0]->whatsup_number }}"></div>
    <div class="form-group"><label for="street" class=" form-control-label">Email address      </label>
    <input type="text" id="street" placeholder="" class="form-control" value="{{ $userDetails[0]->email }}"></div>
</div>
</div>
</div>



<div class="col-lg-6">
<div class="card">
<div class="card-header">
<strong>Basic Details</strong>
</div>
<div class="card-body card-block">
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Marital Status</label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">{{ $userDetails[0]->marital_status }}</p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Age and date of birth</label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">{{ $userDetails[0]->age }}</p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Date of birth</label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">{{ $userDetails[0]->date_of_birth }}</p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Religion</label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">{{ $userDetails[0]->religion  }}</p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Community</label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">{{ $userDetails[0]->community  }}</p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Are you physically challenged?  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">@if($userDetails[0]->physically_challanged ==1)
    YES
    @elseif($userDetails[0]->physically_challanged ==2)
    NO
    @endif
</p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Working experience in the filed </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">{{ $userDetails[0]->working_exp  }}</p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-3"><label class=" form-control-label">Presently working any institution?  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->presently_working ==1)
    YES
    @elseif($userDetails[0]->presently_working ==2)
    NO
    @endif </p>
</div>

</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label">Presently Working Description  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->presently_working_description)
    {{ $userDetails[0]->presently_working_description }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>



</div>

<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label">Presently studying any Course  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->done_any_course ==1)
    YES
    @elseif($userDetails[0]->done_any_course ==2)
    NO
    @endif </p>
</div>

</div>

<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label">Presently Studying Description  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->done_any_course_description)
    {{ $userDetails[0]->done_any_course_description }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>

<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label">Are you interested to work in  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->intrested_to_work)
    {{ $userDetails[0]->intrested_to_work }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>

<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label">Which institution you are working or worked in last  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->last_working ==1)
    YES
    @else
    {{ 'NO' }}
    @endif </p>
</div>
</div>

<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Institution you are working or worked : Name of Institution  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->last_working_name)
    {{ $userDetails[0]->last_working_name }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Institution you are working or worked : Address  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->last_working_address)
    {{ $userDetails[0]->last_working_address }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label">Institution you are working or worked : Duration  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->last_working_duration)
    {{ $userDetails[0]->last_working_duration }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Reasons to vacate from the institution </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->reason_vacate)
    {{ $userDetails[0]->reason_vacate  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="card">
<div class="card-header">
<strong>Other Facilities </strong>
</div>
<div class="card-body card-block">
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Accomodation </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->other_facilities_accomodation)
    {{ $userDetails[0]->other_facilities_accomodation  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Spouce Stay </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->other_facilities_spouce_stay)
    {{ $userDetails[0]->other_facilities_spouce_stay  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Transportation </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->other_facilities_transportation)
    {{ $userDetails[0]->other_facilities_transportation  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>



</div>
</div>
<div class="card">
<div class="card-header">
<strong>Expected</strong> Form
</div>
<div class="card-body card-block">
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Expected Salary Per day /Per month  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->expected_salary)
    {{ $userDetails[0]->expected_salary  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>
</div>
</div>

</div>

<div class="card">
<div class="card-header">
<strong> Father’s/ Spouse</strong> Details
</div>
<div class="card-body card-block">
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Father’s/ Spouse  </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->father_or_spouse)
    {{ $userDetails[0]->father_or_spouse  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>

</div>

<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Name   </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->father_or_spouse_name)
    {{ $userDetails[0]->father_or_spouse_name  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>

</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Relation    </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->father_or_spouse_relation)
    {{ $userDetails[0]->father_or_spouse_relation  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>

</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Contact No    </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->father_or_spouse_contact_no)
    {{ $userDetails[0]->father_or_spouse_contact_no  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>

</div>
<div class="row form-group">
<div class="col col-md-6"><label class=" form-control-label"> Email    </label></div>
<div class="col-12 col-md-9">
 <p class="form-control-static">
    @if($userDetails[0]->father_or_spouse_email)
    {{ $userDetails[0]->father_or_spouse_email  }}
    @else
    {{ 'Not Mentioned' }}
    @endif </p>
</div>

</div>
</div>

</div>

</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<strong class="card-title">Qualification Details</strong>
</div>
<div class="card-body">

<div id="pay-invoice">
<div class="card-body">
<div class="form-group">
<label for="cc-payment" class="control-label mb-1">House Name</label>
<input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $userDetails[0]->address_house_name }}" disabled="disabled">
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

<style type="text/css">
    .pagination {
        margin-left: 18px ! important;
    }
</style>