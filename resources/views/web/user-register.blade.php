@extends('layouts.master')
@section('title', 'Listing')
@section('content')
<section class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
   <img src="{{ asset('assets/images/bg.jpg') }}">
   <div class="banner-content">
      <h2>REGISTER as User</h2>
   </div>
</section>
<div class=" inner-page reg-page">
   <section class="main-content">
   <div class="page-center">
      <div class="main-wrapper">
         <form method="POST" enctype="multipart/form-data" action="{{ route('update_user') }}">
            {{ csrf_field() }}
            <div class="form-wrapper">
               <div class="row">
                  <div class="col-md-6 mt-5">
                     <div class="form-group">
                        <input required type="text" placeholder="Enter Your Name" name="name">
                        <input name="userType" type="hidden" value="5">
                     </div>
                  </div>
                  <div class="col-md-6 mt-5">
                     <div class="form-group">
                        <input required type="email" id="userEmail" placeholder="Enter Your email" name="email">
                     </div>
                  </div>
                  <div class="col-md-6 mt-5">
                     <div class="form-group">
                        <input required type="password" placeholder="Enter Your Password" name="password">
                     </div>
                  </div>
                  <div class="col-md-6 mt-5">
                     <div class="form-group">
                        <input required type="password" placeholder="Enter Password again" name="confirmPassword">
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <div class="form-group">
                        <input type="button"value="Register" id="register">
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </form>
   </div>
</div>
<script>
    $("#register").on("click", function(event) {
   if ($("#userEmail").val() != "") {
      $.post("{{ URL::to('/verify_email') }}", {
    '_token': $("input[name='_token']").val(),
    email: $("#userEmail").val()
      }, function(data){
         try {
            data = JSON.parse(data);
            if(data['exist'] == 0) {
               if ($('input[name="password"]').val() == $('input[name="confirmPassword"]').val()) {
                  var f = document.getElementsByTagName('form')[0];
                  if(f.checkValidity()) {
                     f.submit();
                  } else {
                     toastr.error("Form is invalid.. please enter all the details");
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

