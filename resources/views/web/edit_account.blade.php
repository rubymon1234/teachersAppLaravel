@extends('layouts.master')
@section('title', 'Listing')
@section('content')
<section class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
   <img src="{{ asset('assets/images/bg.jpg') }}">
   <div class="banner-content">
      <h2>EDIT ACCOUNT</h2>
   </div>
</section>
<div class=" inner-page reg-page">
   <section class="main-content">
   <div class="page-center">
      <div class="main-wrapper">
         <form method="POST" enctype="multipart/form-data" action="{{ route('update_profile') }}">
            {{ csrf_field() }}
            <div class="form-wrapper">
               <div class="row">
                    <div class="col-md-12 mt-3">
                            <h3>Address for Communication</h3>
                         </div>
                         <div class="col-md-6 mt-3">
                            <div class="form-group">
                               <input required type="text" placeholder="House name" name="address_house_name" value="{{$userDetails->address_house_name}}">
                            </div>
                         </div>
                         <div class="col-md-6 mt-3">
                            <div class="form-group">
                               <input required type="text" placeholder="House number" name="address_house_no"  value="{{$userDetails->address_house_no}}">
                            </div>
                         </div>
                         <div class="col-md-6 mt-3">
                            <div class="form-group">
                               <input required type="text" placeholder="Land mark" name="address_landmark"  value="{{$userDetails->address_landmark}}">
                            </div>
                         </div>
                         <div class="col-md-6 mt-3">
                            <div class="form-group">
                               <input required type="text" placeholder="Village" name="address_village"  value="{{$userDetails->address_village}}">
                            </div>
                         </div>
                         <div class="col-md-6 mt-3">
                            <div class="form-group">
                               <input required type="text" placeholder="Post Office" name="address_postoffice" value="{{$userDetails->address_postoffice}}">
                            </div>
                         </div>
                         <div class="col-md-6 mt-3">
                            <div class="form-group">
                               <input required type="text" placeholder="Block" name="address_block" value="{{$userDetails->address_block}}">
                            </div>
                         </div>
                         <div class="col-md-6 mt-3">
                                <div class="form-group">
                                   <select required name="country" id="CountryList" data-placeholder="Select Country">
                                      <option value="">Choose country</option>
                                      @foreach ($countryList as $item)
                                      <option value="{{ $item->id }}" <?php echo $item->id == $userDetails->country ? 'selected' : '' ?> >{{ $item->country }}</option>
                                      @endforeach
                                   </select>
                                </div>
                             </div>
                             <div class="col-md-6 mt-3">
                                <div class="form-group">
                                   <select required name="state" data-placeholder="Select State" id="StateList">
                                      <option value="{{ $userDetails->state }}">{{ $userDetails->state_name }}</option>
                                   </select>
                                </div>
                             </div>
                             <div class="col-md-6 mt-3">
                                <div class="form-group">
                                   <select required name="city" data-placeholder="Select City" id="CityList">
                                        <option value="{{ $userDetails->city }}">{{ $userDetails->city_name }}</option>
                                   </select>
                                </div>
                             </div>
                             <div class="col-md-6 mt-3">
                                <div class="form-group">
                                   <select required name="panchayath" data-placeholder="Select Panchayath"  id="PanchayathList">
                                        <option value="{{ $userDetails->panchayath }}">{{ $userDetails->panchayath_name }}</option>
                                   </select>
                                </div>
                             </div>
                             <div class="col-md-6 mt-3">
                                <div class="form-group">
                                   <select required name="pincode" data-placeholder="Select pincode" id="Pincode">
                                        <option value="{{ $userDetails->pincode }}">{{ $userDetails->pincode_name }}</option>
                                   </select>
                                </div>
                             </div>
                             <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                       <select required name="intrested_to_work" data-placeholder="Interested to work
                                          in" value="{{ $userDetails->intrested_to_work }}">
                                          <option value="">Interested to work in</option>
                                          <option value="Anywhere in India" selected="<?php 'Anywhere in India' == $userDetails->intrested_to_work ? 'selected' : '' ?>">Anywhere in India</option>
                                          <option value="Abroad"selected="<?php 'Abroad' == $userDetails->intrested_to_work ? 'selected' : '' ?>">Abroad</option>
                                          <option value="State"selected="<?php 'State' == $userDetails->intrested_to_work ? 'selected' : '' ?>">State</option>
                                          <option value="District"selected="<?php 'District' == $userDetails->intrested_to_work ? 'selected' : '' ?>">District</option>
                                          <option value="Block"selected="<?php 'Block' == $userDetails->intrested_to_work ? 'selected' : '' ?>">Block</option>
                                          <option value="Panchayath"selected="<?php 'Panchayath' == $userDetails->intrested_to_work ? 'selected' : '' ?>">Panchayath</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-12 mt-3">
                                        <h3>Other facilities</h3>
                                     </div>
                                     <input type="hidden" name="user_basic_details" value="{{ $userDetails->user_basic_details }}">
                                     <input type="hidden" name="user_secondary_details" value="{{ $userDetails->user_secondary_details }}">
                                     <div class="col-md-6 mt-3 ">
                                        <div class="form-group">
                                           <input required type="text" placeholder="Accomodation" name="other_facilities_accomodation" value="{{ $userDetails->accomodation }}">
                                        </div>
                                     </div>
                                     <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                           <input required type="text" placeholder="Spouce Stay" name="other_facilities_spouce_stay"  value="{{ $userDetails->spouce_stay }}">
                                        </div>
                                     </div>
                                     <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                           <input required type="text" placeholder="Transportation" name="other_facilities_transportation"  value="{{ $userDetails->transportation }}">
                                        </div>
                                     </div>
                                     <div class="col-md-12 mt-3">
                                            <h3>Contact Details</h3>
                                         </div>
                                     <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                               <input required type="text" placeholder="Mobile Number" name="mobile_number" value="{{ $userDetails->mobile_number }}">
                                            </div>
                                         </div>
                                         <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                               <input required type="text" placeholder="Whatsapp Number" name="whatsup_number" value="{{ $userDetails->whatsup_number }}">
                                            </div>
                                         </div>
                  <div class="col-md-12 mt-3">
                     <h3>Qualification Details <button type="button" id="addQualification" style="float:right;">+Add</button></h3>
                  </div>
                  <?php 

                $qualification = explode(',',$userDetails->qualification);
                $subject = explode(',',$userDetails->subject);
                $year_passout = explode(',',$userDetails->year_passout);
                //   print_r($qualification); exit;
?>
                  <div id="qualification">
                      @foreach ($qualification as $key => $item) 
                     <div class="row">
                        <div class="col-md-4 mt-3">
                           <div class="form-group">
                           <input  type="text" placeholder="Qualification" name="qualification[]" value="{{ $item }}">
                           </div>
                        </div>
                        <div class="col-md-4 mt-3">
                           <div class="form-group">
                              <input  type="text" placeholder="Subject" name="subject[]" value="{{ $subject[$key] }}">
                           </div>
                        </div>
                        <div class="col-md-4 mt-3">
                           <div class="form-group">
                           <input type="number" placeholder="Year of passout" name="year_passout[]" value="{{ $year_passout[$key] }}">
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>

                  <div class="col-md-12 mt-3">
                     <h3>Upload Images <button type="button" id="addImages" style="float:right;">+Add</button></h3>
                  </div>
                  <div class="row">
                    <input type="hidden" name="imagesList" id="imagesList" value="{{ ($userDetails->userImages) }}">
                    <div id="allImageList">
                            @foreach (($userDetails->userImages ? json_decode($userDetails->userImages) : []) as $key => $item)
                                <div class="col-md-4 mt-3 imageList_<?php echo $key ?>">
                                    <img src="{{ asset('userImages/' . $item) }}">
                                    <button type="button" onClick="removeImage('<?php echo $key ?>')">X</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                  <div class="row" id="imageList">
                     <div class="col-md-4 mt-3">
                        <div class="form-group">
                           <input type="file" name="filenames[]" value="{{ $item }}">
                        </div>
                     </div>
                  </div>


                  <div class="col-md-12 mt-3">
                     <div class="form-group">
                        <input type="submit"value="Update">
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </form>
   </div>
</div>

<script>

$('#addQualification').click(function(event) {
   $('#qualification').append('<div class="row"><div class="col-md-4 mt-3"><div class="form-group"><input  type="text" placeholder="Qualification" name="qualification[]"></div></div><div class="col-md-4 mt-3"><div class="form-group"><input  type="text" placeholder="Subject" name="subject[]" required></div></div><div class="col-md-4 mt-3"><div class="form-group"><input  type="number" placeholder="Year of passout" name="year_passout[]" required></div></div></div>');
});

$('#addImages').click(function(event){
    currentList = $("#imagesList").val();
    currentList = JSON.parse(currentList);
   if ((currentList.length + $('#imageList input').length) <= 4) {
      $('#imageList').append('<div class="col-md-4 mt-3"><div class="form-group"><input type="file" name="filenames[]" required></div></div>');
   }
});
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

  function removeImage(key) {
      currentList = $("#imagesList").val();
      alert(currentList);
      try {
        if (currentList) {
            currentList = JSON.parse(currentList);
            currentList.splice(key, 1);
            $("#imagesList").val(JSON.stringify(currentList));
            $('.imageList_' + key).remove();
        } else {
            $("#allImageList").remove();
        }
      } catch (e) {

      }
  }
</script>
@endsection

