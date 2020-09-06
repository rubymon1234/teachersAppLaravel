@extends('layouts.master')
@section('title', 'Listing')
@section('content')
<section class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
   <img src="{{ asset('assets/images/bg.jpg') }}">
   <div class="banner-content">
      <h2>REGISTER</h2>
   </div>
</section>
<div class=" inner-page reg-page">
   <section class="main-content">
   <div class="page-center">
      <div class="main-wrapper">
         <form  class="register-form" id="registerFormSubmit" method="POST" enctype="multipart/form-data" action="{{ route('update') }}">
            {{ csrf_field() }}
            <div class="form-wrapper">
               <div class="row">
                  <div class="col-md-12">
                     <div class=" custom-radio-wrap flex">
                        @foreach ($roleList as $Role)
                        <div class="radio-btn">
                           <input required id="{{ $Role->name }}" <?php echo $Role->id == 3 ? "checked" : "" ?> type="radio" name="userType" value="{{ $Role->id }}">
                           <label class="custom-radio {{ $Role->name }}-imgs" for="{{ $Role->name }}"> {{ $Role->display_name }}</label>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="col-md-6 mt-4">
                     <div class="form-group">
                        <input required type="text" placeholder="Enter Your Name" name="name">
                     </div>
                  </div>
                  <div class="col-md-6 mt-4">
                     <div class="form-group">
                        <input required type="password" placeholder="Enter Your Passowrd" name="password" id="password">
                     </div>
                  </div>
                  <div class="col-md-6 mt-4">
                     <div class="form-group">
                        <input required type="password" placeholder="Enter Your Confirm Passowrd" name="confirmPassword" id="confirmPassword">
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Address for Communication</h3>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="House name" name="address_house_name">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="House number" name="address_house_no">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Land mark" name="address_landmark">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Village" name="address_village">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Post Office" name="address_postoffice">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Block" name="address_block">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="country" id="CountryList" data-placeholder="Select Country">
                           <option value="">Choose country</option>
                           @foreach ($countryList as $item)
                           <option value="{{ $item->id }}">{{ $item->country }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="state" data-placeholder="Select State" id="StateList">
                           <option value="">Choose State</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="city" data-placeholder="Select City" id="CityList">
                           <option value="">Choose City</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="panchayath" data-placeholder="Select Panchayath"  id="PanchayathList">
                           <option value="">Choose Panchayath</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="pincode" data-placeholder="Select pincode" id="Pincode">
                           <option value="">Choose Pincode</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Contact Details</h3>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Land Phone" name="landPhone">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Mobile Number" name="mobile_number">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Alternate Number" name="alt_number">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Whatsapp Number" name="whatsup_number">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="email" placeholder="Email Address" name="email" id="userEmail">
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Martial status</h3>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group ">
                        <div class="radio-wrapper flex">
                           <div class="radio-btnV2  mr-3">   
                              <input required type="radio" id="Married" value="Married" name="marital_status" checked>
                              <label for="Married">Married</label>
                           </div>
                           <div class="radio-btnV2 mr-3">   
                              <input required type="radio" id="Unmarried" value="Unmarried" name="marital_status" >
                              <label for="Unmarried">Unmarried</label>
                           </div>
                           <div class="radio-btnV2">   
                              <input required type="radio" id="Divorce" value="Divorce" name="marital_status" >
                              <label for="Divorce">Divorce</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Age and Date of Birth</h3>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Age" name="age">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Date of Birth" name="date_of_birth" class="datepicker" data-date-format="mm/dd/yyyy">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="sex" data-placeholder="Select Sex">
                          <option value="">Choose Gender</option>
                           <option value="Male">Male</option>
                           <option value="FeMale">FeMale</option>
                           <option value="TG">Other</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Father/Spouse Details</h3>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Name" name="father_or_spouse_name ">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Relation" name="father_or_spouse_relation">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Contact No" name="father_or_spouse_contact_no">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Email" name="father_or_spouse_email">
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Other Details</h3>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Religion" name="religion">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Community" name="community">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="physically_challanged" data-placeholder="Are you physically challeged">
                           <option value="">Are you physically challeged</option>
                           <option value="1">Yes</option>
                           <option value="2">No</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Working Experience in this field" name="working_exp">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="presently_working" data-placeholder="Presently working any
                           institution">
                           <option value="">Presently working any
                              institution
                           </option>
                           <option value="1">Yes</option>
                           <option value="2">No</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3" id="presently_working_description" style="display:none;">
                     <div class="form-group">
                        <input type="text" placeholder="Presently working Description" name="presently_working_description">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="done_any_course" data-placeholder="Presently studying any
                           Course">
                           <option value="">Presently studying any Course</option>
                           <option value="1">Yes</option>
                           <option value="2">No</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3" id="done_any_course_description" style="display:none;">
                     <div class="form-group">
                        <input type="text" placeholder="Presently studying experience" name="done_any_course_description">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="intrested_to_work" data-placeholder="Interested to work
                           in">
                           <option value="">Interested to work in</option>
                           <option value="Anywhere in India">Anywhere in India</option>
                           <option value="Abroad">Abroad</option>
                           <option value="State">State</option>
                           <option value="District">District</option>
                           <option value="Block">Block</option>
                           <option value="Panchayath">Panchayath</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Current/Previous Institute details</h3>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <select required name="last_working" data-placeholder="Currently working or worked in Previous Institute">
                           <option value="">Currently working or worked in Previous Institute</option>
                           <option value="1">Yes</option>
                           <option value="2">No</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 mt-3 last_working" style="display:none;">
                     <div class="form-group">
                        <input  type="text" placeholder="Institute Name" name="last_working_name">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3 last_working" style="display:none;">
                     <div class="form-group">
                        <input  type="text" placeholder="Institute Address" name="last_working_address">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3 last_working" style="display:none;">
                     <div class="form-group">
                        <input  type="text" placeholder="Duration" name="last_working_duration">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3 last_working" style="display:none;">
                     <div class="form-group">
                        <input  type="text" placeholder="Reasons to vacate from the institution" name="reason_vacate">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3 ">
                     <div class="form-group">
                        <input required type="text" placeholder="Expected Salary Per day/Per month" name="expected_salary">
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Other facilities</h3>
                  </div>
                  <div class="col-md-6 mt-3 ">
                     <div class="form-group">
                        <input required type="text" placeholder="Accomodation" name="other_facilities_accomodation">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Spouce Stay" name="other_facilities_spouce_stay">
                     </div>
                  </div>
                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <input required type="text" placeholder="Transportation" name="other_facilities_transportation">
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <h3>Qualification Details <button class="btn-add" type="button" id="addQualification" style="float:right;">+Add</button></h3>
                  </div>
                     <div class="row" id="qualification" style="width: 100%; padding: 0 16px ;" >
                        <div class="col-md-4 mt-3">
                           <div class="form-group">
                              <input required type="text" placeholder="Qualification" name="qualification[]">
                           </div>
                        </div>
                        <div class="col-md-4 mt-3">
                           <div class="form-group">
                              <input required type="text" placeholder="Subject" name="subject[]">
                           </div>
                        </div>
                        <div class="col-md-4 mt-3">
                           <div class="form-group">
                              <input required type="text" placeholder="Year of experience" name="year_passout[]">
                           </div>
                        </div>
                     </div>

                  <div class="col-md-12 mt-3">
                     <h3>Upload Images <button type="button" id="addImages" class="btn-add" style="float:right;">+Add</button></h3>
                  </div>
                  <div class="row" id="imageList" style="width: 100%; padding: 0 16px;">
                     <div class="col-md-4 mt-3">
                        <div class="form-group">
                           <input required type="file" name="filenames[]">
                        </div>
                     </div>
                  </div>

                  <div class="col-md-12 mt-3">
                     <div class="form-group">
                        <input type="button" value="Register" id="RegisterForm" class="submit-btn">
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </form>
   </div>
</div>

<script>
  $('#CountryList').change(function(event) {
    $.post("{{ URL::to('/getStateList') }}", {
    '_token': $("input[name='_token']").val(),
    countryId: $(this).val()
      }, function(data){
        $("#StateList").html(data);
      });
  });

  $('#StateList').change(function(event) {
    $.post("{{ URL::to('/getCityList') }}", {
    '_token': $("input[name='_token']").val(),
    stateId: $(this).val(),
    countryId: $('#CountryList').val()
      }, function(data){
        $("#CityList").html(data);
      });
  });

  $('#CityList').change(function(event) {
    $.post("{{ URL::to('/getPanchayathList') }}", {
    '_token': $("input[name='_token']").val(),
    stateId: $("#StateList").val(),
    countryId: $('#CountryList').val(),
    cityId: $(this).val()
      }, function(data){
        $("#PanchayathList").html(data);
      });
  });
  
  $('#PanchayathList').change(function(event) {
    $.post("{{ URL::to('/getPincode') }}", {
    '_token': $("input[name='_token']").val(),
    stateId: $("#StateList").val(),
    countryId: $('#CountryList').val(),
    cityId: $('#CityList').val(),
    panchatathId: $(this).val()
      }, function(data){
        $("#Pincode").html(data);
      });
  });

  $("select[name='presently_working']").change(function(event) {
    if ($(this).val() == 1) {
      $('input[name="presently_working_description"]').parents('.col-md-6').show();
    } else {
      $('input[name="presently_working_description"]').parents('.col-md-6').hide();
      }
  });

$("select[name='done_any_course']").change(function(event) {
  if ($(this).val() == 1) {
    $('input[name="done_any_course_description"]').parents('.col-md-6').show();
  } else {
    $('input[name="done_any_course_description"]').parents('.col-md-6').hide();
    }
});
  
$("select[name='last_working']").change(function(event) {
  if ($(this).val() == 1) {
    $('.last_working').show();
  } else {
    $('.last_working').hide();
    }
});

$('#addQualification').click(function(event) {
   $('#qualification').append('<div class="row"><div class="col-md-4 mt-3"><div class="form-group"><input required type="text" placeholder="Qualification" name="qualification[]"></div></div><div class="col-md-4 mt-3"><div class="form-group"><input required type="text" placeholder="Subject" name="subject[]"></div></div><div class="col-md-4 mt-3"><div class="form-group"><input required type="text" placeholder="Year of experience" name="year_passout[]"></div></div></div>');
});

$('input[name="userType"]').click(function(event) {
   var data = $(this).parent().find('label').text().trim();
   //alert(data);
   if (data == 'Institution/Organization') {
      window.location.replace('/register_user');
   }
});

$('#addImages').click(function(event){
   if ($('#imageList input').length <= 4) {
      $('#imageList').append('<div class="col-md-4 mt-3"><div class="form-group"><input type="file" name="filenames[]"></div></div>');
   }
});

$("#RegisterForm").on("click", function(event) {
   if ($("#userEmail").val() != "") {
      $.post("{{ URL::to('/verify_email') }}", {
    '_token': $("input[name='_token']").val(),
    email: $("#userEmail").val()
      }, function(data){
         try {
            data = JSON.parse(data);
            if(data['exist'] == 0) {
               if ($("#password").val() == $("#confirmPassword").val()) {
                  if ($("input[name='qualification[]']").val() == "") {
                     toastr.error("Qualification cannot be empty");
                  } else if ($("input[name='filenames[]']").val() == "") {
                     toastr.error("Choose image to upload");
                  } else {
                     var f = document.getElementsByTagName('form')[0];
                     if(f.checkValidity()) {
                        f.submit();
                     } else {
                        toastr.error("Form is invalid.. please enter all the details");
                     }
                  }
               } else {
                  toastr.error("Password and confirm password didn't match");
               }
            } else {
               toastr.error("Email Already Exists");
            }
         } catch (e) {
            console.log(e);
            toastr.error("Something went wrong");
         }
      });
   } else {
      toastr.error("Enter email to verify");
   }
});
</script>
@endsection

