@extends('layouts.master')
@section('title', 'Listing')
@section('content')
<section  class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
     <!--<div class = "page-content">
                     <div class = "swiper-container">
                        <div class = "swiper-wrapper">
                           
                           <div class = "swiper-slide">
                              <img data-src = "assets/images/bg.jpg" class = "swiper-lazy">
                              <div class = "preloader"></div>
                           </div>
                           
                           <div class = "swiper-slide">
                              <img data-src = "assets/images/bg.jpg" class = "swiper-lazy">
                              <div class = "preloader"></div>
                           </div>
                           
                           <div class = "swiper-slide">
                              <img data-src = "assets/images/bg.jpg" class = "swiper-lazy">
                              <div class = "preloader"></div>
                           </div>
                           
                           <div class = "swiper-slide">
                              <img data-src = "assets/images/bg.jpg" class = "swiper-lazy">
                              <div class = "preloader"></div>
                           </div>
                           
                           <div class = "swiper-slide">
                              <img data-src = "assets/images/bg.jpg" class = "swiper-lazy">
                              <div class = "preloader"></div>
                           </div>
                        </div>
                        
                        <div class = "swiper-pagination color-white"></div>
                     </div>
                  </div>-->
   <div id="slider">
  <a href="#" class="control_next">></a>
  <a href="#" class="control_prev"><</a>
  <ul>
    <li class="slider-main" style="background-image: url({{asset('assets/images/slider.jpg')}});"></li>
    <li class="slider-main" style="background-image: url({{asset('assets/images/slider1.jpg')}});"></li>
	<li class="slider-main" style="background-image: url({{asset('assets/images/slider2.jpg')}});"></li>
  </ul>  
</div>
                  <!--<img src="{{ asset('assets/images/bg.jpg') }}">-->
        <div class="banner-content">
            <h2>The TEACHER</h2>
            <p>Lorem Ipsum Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium, totam rem aperiam.</p><br>
            <div class="banner-buttons">
             
             @if(!isset(Auth::user()->id) !='')
             <a href="{{ route('login') }}" class="btn-common reg-btn mr-2">Login</a>
             <a href="{{ route('register') }}" class="btn-common login-btn">Register</a> 
             @endif
         </div>
     </div>
    
   <!-- Define pagination, if it is required -->
   <div class = "swiper-pagination"></div>
</div>
    <div class="search-wrapper">
        <div class="page-center">
            <div class="search-card ">
                <form class="search-form" method="get" action="{{ route('home') }}">
                    {{ csrf_field() }}
                    <div class="input-holder-wrapper flex justify-center">
                        <div class="input-holder border-line">
                        <input type="text" name="subject" value="{{ $subject }}" placeholder="Subject wise" tabindex="1">
                        </div>
                        <div class="input-holder border-line">
                                <input type="text" name="qualification" value="{{ $qualification }}" placeholder="Educational Qualification" tabindex="2" >
                        </div>
                        <div class="input-holder border-line">
                        <select data-placeholder="Country wise" tabindex="3" value="{{ $country }}" name="country">
                                <option value="">Choose Country</option>
                                @foreach ($allCountry as $item)
                                    <option value="{{ trim($item->country) }}" <?php echo trim($item->country) == $country ? 'selected = true' : ''  ?>>{{ $item->country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-holder border-line">
                            <input type="text" name="panchayat" tabindex="4" value="{{ $statePanchayat }}" placeholder="State/District/Block/Panchayat" >
                        </div>
                        <div class="input-holder">
                           <button class="search-btn" type="submit" value="Search" name="Search" data-toggle="tooltip" data-original-title="Search">Serach
                           </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div>
@if(session('success_message'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('success_message') }}
    </div>
@endif
<section class="main-content home-page">
    <div class="page-center">
        <div class="main-wrapper">
            <div class="custom-row">
                @forelse($teachersDetailListing as $key=>$teacher)
                <div class="user-card flex">
                    @if(isset(Auth::user()->id) !='')
                        <a href="{{ route('account_details', ['id' => Crypt::encrypt($teacher->id)]) }}" class="link-box"></a>
                    @else
                        <a href="{{ route('login') }}" class="link-box"></a>
                    @endif
                    @php
                        $imageUrl = 'userImages/'.json_decode($teacher->userImages)[0];
                    @endphp
                       @if (file_exists(public_path($imageUrl)))

                        <div class="user-img" style="background-image: url({{ asset('userImages/'. (json_decode($teacher->userImages)[0])) }}" >  

                            <a href="{{ route('account_details', ['id' => Crypt::encrypt($teacher->id)]) }}">
                                <img src="<?php echo asset('userImages/'. (json_decode($teacher->userImages)[0])) ?>" alt="Image"></a> 
                        </div>
                        @else 
                        <div class="user-img" style="background-image: url({{ asset('assets/images/image-not-found.png') }}" >
                            <a href="{{ route('account_details', ['id' => Crypt::encrypt($teacher->id)]) }}">
                                <img src="<?php echo asset('assets/images/teacher_women.png') ?>" alt="Image"></a> 
                        </div>
                        @endif
                    <div class="user-details">  
                            <h3>{{ $teacher->name }}</h3>
                            <div class="user-content flex">
                                <label> Name</label>
                                <span>:{{ $teacher->name }}</span>
                            </div>
                            <div class="user-content flex">
                                <label> Education</label>
                                <span style="    min-width: 100%;">: 
                            <?php echo substr($teacher->qualification,0); ?>
                            </span>
                            </div>
                            <div class="user-content flex">
                                <label> Age </label>
                                <span>:{{ $teacher->age }}</span>
                            </div>
                            <div class="user-content flex">
                                <label> Sex </label>
                                <span>:{{ $teacher->sex }} </span>
                            </div>
                            {{-- <div class="user-content flex">
                                <label> Status </label>
                                <span>: dd</span>
                            </div>
 --}}                    </div>  
                    {{-- <a  href="javascript:void(0);" class="btn-view-details"> View Details</a> --}}
                </div>
                @empty
                    <h3>No list... for now!</h3>
                @endforelse
            </div>
            {!! $teachersDetailListing->appends(Request::capture()->except('page'))->render() !!}
        </div>
    </div>
@endsection
<style type="text/css">
    a.control_prev, a.control_next{
        padding : 1% 1% ! important;
    }
</style>