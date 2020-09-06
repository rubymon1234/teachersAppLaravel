@extends('layouts.master')
@section('title', 'About Us')
@section('content')
<section class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
   <img src="{{ asset('assets/images/bg.jpg') }}">
   <div class="banner-content">
      <h2>About Us</h2>
   </div>
</section>
<div class=" inner-page reg-page">
   <section class="main-content">
      <div class="page-center">
         <div class="main-wrapper">
           <div class="content-wrapper text-center ">
             <div class="about-top flex">
               <div class="about-left">
                 <figure>
                  <img src="assets/images/about_img.jpg" alt="About Image" width="400">
               </figure>
            </div>
            <div class="about-right">
              <h3>WHAT WE DO</h3>
              <div class="line"></div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?Lorem ipsum dolor sit amet, consec
             </p>
          </div>
       </div>
       <div class="about-bottom">
         <div class="header">
           <h3>Why You Should Choose Us</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do e</p>
        </div>
        <div class=" row choose-us-wrapper ">
         <div class="col-md-3 col-sm-6 text-left">
            <div class="img-wrap">
              <img src="assets/images/book.png" alt="icon">
           </div>
           <div class="choose-content">
            <h4>Lorem Ipsum</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?Lorem </p>
         </div>
      </div>
      <div class="col-md-3  col-sm-6 text-left">
         <div class="img-wrap">
           <img src="assets/images/educate.png" alt="icon">
        </div>
        <div class="choose-content">
         <h4>Lorem Ipsum</h4>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?Lorem </p>
      </div>
   </div>
   <div class="col-md-3  col-sm-6 text-left">
      <div class="img-wrap">
        <img src="assets/images/notes.png" alt="icon">
     </div>
     <div class="choose-content">
      <h4>Lorem Ipsum</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?Lorem </p>
   </div>
</div>
<div class="col-md-3  col-sm-6 text-left">
   <div class="img-wrap">
     <img src="assets/images/idea.png" alt="icon">
  </div>
  <div class="choose-content">
   <h4>Lorem Ipsum</h4>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?Lorem </p>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</section>
</div>
@endsection