<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Home - Teachers</title>
    <link rel="icon" href="favicon.png" type="image/png" />
    <!--[if lt IE 10]><script src="js/IEupdate.js" type="text/javascript"></script><![endif]-->
     <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/styles.css') }}">
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
   
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

   
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
<style>
#slider {
  position: relative;
  overflow: hidden;
  margin: 20px auto 0 auto;
  border-radius: 4px;
}

#slider ul {
  position: relative;
  margin: 0;
  padding: 0;
  height: 200px;
  list-style: none;
}

#slider ul li {
  position: relative;
  display: block;
  float: left;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 350px;
  background: #ccc;
  text-align: center;
  line-height: 300px;
}

a.control_prev, a.control_next {
  position: absolute;
  top: 40%;
  z-index: 999;
  display: block;
  padding: 4% 3%;
  width: auto;
  height: auto;
  background: #2a2a2a;
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  font-size: 18px;
  opacity: 0.8;
  cursor: pointer;
}

a.control_prev:hover, a.control_next:hover {
  opacity: 1;
  -webkit-transition: all 0.2s ease;
}

a.control_prev {
  border-radius: 0 2px 2px 0;
}

a.control_next {
  right: 0;
  border-radius: 2px 0 0 2px;
}

.slider_option {
  position: relative;
  margin: 10px auto;
  width: 160px;
  font-size: 18px;
}
.slider-main{
	background-repeat: no-repeat !important;
	background-size: cover !important;
}
</style>

</head>
<body id="body">
    <div class="layout-wrapper">
        <nav class="mob-nav">
            {{ csrf_field() }}
            <div id="menu-list"></div>
            
        </nav>
        <section id="container">
            <header id="page-header">
                <div class="page-center">
                    <div class="header-wrapper flex">
                        <div class="page-logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="TEACHER'S APP">
                        </div>
                        <nav class="page-nav">
                            <div class="mob-nav-icon flex">
                            <div id="nav-icon3">
                              <span></span>
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                           <div class="profile-mob">
                             @if(isset(Auth::user()->id) !='')
                                    <a href="javascript:void(0);" class="user-profile-img" style="background-image: url({!! Session::has('userImage') ? asset('assets/images/' . Session::get('userImage')) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRzofi7unSyOsVHeYOuWhjp8oSGwbAYbH8aHOOWiv1nWMWXBsC8' !!} );">
                                       <img width="42" class="rounded-circle" src="{!! Session::has('userImage') ? asset('assets/images/' . Session::get('userImage')) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRzofi7unSyOsVHeYOuWhjp8oSGwbAYbH8aHOOWiv1nWMWXBsC8' !!}" alt="">
                                    </a>
                                        <div class="dropdown-profile" >
                                            <ul class="dropdown-lists">
                                                <li><a href="javascript:void(0);">{{ Auth::user()->email }} </a></li>
                                                <li><a href="javascript:void(0);"
                                                    class="img-icon profile-icon"></a> My Profile</li>
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="img-icon logout-icon"></a>Sign Out</li>
                                                <li><a href="javascript:void(0);"></a></li>
                                                </ul>
                                               <!--  <h6> {{ Auth::user()->email }} </h6>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Sign out
                                            </a> -->
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                           </div>
                                @endif

                           </div>
                           <div id="menu-list"></div>
                            <ul>
                                <li><a class="web-nav {{ (Route::is('listing') ? 'active' : '') }}" href="{{ route('listing') }}">HOME</a></li>
                                <li><a class="web-nav {{ (Route::is('aims') ? 'active' : '') }}" href="{{ route('aims') }}" href="{{ route('aims') }}">MISSION AIMS & OBJECTIVES </a></li>
                                <li>
                                    <a class="web-nav {{ (Route::is('aboutUs') ? 'active' : '') }}" href="{{ route('aboutUs') }}">ABOUT US</a></li>
                                <li><a class="web-nav {{ (Route::is('contactUs') ? 'active' : '') }}" href="{{ route('contactUs') }}">CONTACT US</a></li>
                                @if(isset(Auth::user()->id) !='')
                                <li>
                                    <a href="javascript:void(0);" class="user-profile-img" style="background-image: url({!! Session::has('userImage') ? asset('assets/images/' . Session::get('userImage')) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRzofi7unSyOsVHeYOuWhjp8oSGwbAYbH8aHOOWiv1nWMWXBsC8' !!}">
                                       <img width="42" class="rounded-circle" src="{!! Session::has('userImage') ? asset('assets/images/' . Session::get('userImage')) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRzofi7unSyOsVHeYOuWhjp8oSGwbAYbH8aHOOWiv1nWMWXBsC8' !!}" alt="">
                                    </a>
                                        <div class="dropdown-profile" >
                                            <ul class="dropdown-lists">
                                                <li><a href="javascript:void(0);">{{ Auth::user()->email }} </a></li>

                                                <li><a href="{{ route('profile_view') }}"
                                                    class="img-icon profile-icon"> My Profile </a></li>
                                                @permission('edit_account')  
                                                <li><a href="{{ route('edit_account') }}"
                                                    class="img-icon profile-icon"> Edit Account </a></li>
                                                @endpermission
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="img-icon logout-icon">Sign Out</a></li>
                                                <li><a href="javascript:void(0);"></a></li>
                                                </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>                       
    
    @yield('content')

    <footer class="footer-wrapper">
    <div class="page-center">
        <div class="footer-content">
            <div class="footer-top flex">
                <img src="assets/images/footer_logo.png" alt="Teacher's App">
                <nav class="page-nav footer-nav">
                    <div id="menu-list-footer"></div>
                </nav>
            </div>
            <div class="footer-bottom flex">
                <a href="javascript:void(0);">Powered by</a>
                <a href="javascript:void(0);">&copy 2015 Teachers’ app. All rights reserved. </a>
            </div>
        </div>
    </div>
</footer>
</section>
    </div>
</section>

</div>

</body>
<script src="{{ asset('assets/js/custom_scripts.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!--<script type = "text/javascript" 
         src = "https://cdnjs.cloudflare.com/ajax/libs/framework7/1.4.2/js/framework7.min.js"></script>-->
        
<script>
  $(function() {
    $('.chosen-select').chosen();
    $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    $( ".datepicker" ).datepicker({endDate: "+0d 0w"});
    $.post("{{ URL::to('/getMenuList') }}", {
    '_token': $("input[name='_token']").val()}, function(data){
        $("#menu-list").html(data);
        $("#menu-list-footer").html(data);
      });
});

</script>
  <script>
      
       jQuery(document).ready(function ($) {


  setInterval(function () {
        moveRight();
    }, 3000);
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider').css({ width: slideWidth, height: slideHeight });
	
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    


  </script>

{!! Toastr::message() !!}
</html>
