@extends('layouts.master')
@section('title', 'Contact Us')
@section('content')
<section class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
   <img src="{{ asset('assets/images/bg.jpg') }}">
   <div class="banner-content">
      <h2>Contact Us</h2>
   </div>
</section>
<div class=" inner-page reg-page">
   <section class="main-content contact-us">
      <div class="page-center">
          <div class="main-wrapper">
            <form method="POST" action="{{ route('update_contact') }}">
                {{ csrf_field() }}
              <div class="form-wrapper">
                <div class="row">
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <input type="text" placeholder="Your Name" name="name" required>
                    </div>
                  </div> 
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <input type="email" placeholder="Your Email" name="email" required>
                    </div>
                  </div> 
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <input type="text" placeholder="Landline Number" name="landline" required>
                    </div>
                  </div> 
                  <div class="col-md-6 mt-3">
                    <div class="form-group">
                      <input type="text" placeholder="Mobile number" name="mobile" required>
                    </div>
                  </div> 
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <textarea placeholder="Message" rows="5" cols="30" name="message" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <input type="submit" name="Submit" class="submit-btn" id="register">    
                   </div>

                </div>
              </div>

            </div>
          </div>
   </section>
</div>
<script>
    $("#register").on("click", function(event) {


         try {
                var f = document.getElementsByTagName('form')[0];
                  if(f.checkValidity()) {
                     f.submit();
                    //  toastr.success("Form is valid..");
                  } else {
                     toastr.error("Form is invalid.. please enter all the details");
                  }


         } catch (e) {
            console.log(e);
            toastr.error("Something went wrong");
         }


});
</script>
@endsection
