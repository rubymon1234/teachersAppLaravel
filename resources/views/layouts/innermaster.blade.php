<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>{{ config('app.name', 'MarketPlace') }} :: @yield('title')</title>
        <link rel="icon" href="favicon.png" type="image/png" />
        <!--[if lt IE 10]><script src="js/IEupdate.js" type="text/javascript"></script><![endif]-->
        <script src="{{ asset('assets/js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/custom_scripts.js') }}" type="text/javascript"></script>
        <link type="text/css" href="{{ asset('assets/css/slick.css') }}" rel="stylesheet" media="all" />
        <link type="text/css" href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" media="all" />
    </head>

    <body id="body">

    	<section id="container" class="innerTemplate">
    		
    		<header class="mainHeader">
                <div class="pageCenter">
                    <a href="javascript:void(0)" class="left"><img src="{{ asset('assets/images/logoMain.png') }}" alt="Shop"></a>
                    <nav class="mainNav right">
                        <ul>
                            <li><a href="javascript:void(0)">Home</a></li>
                            <li><a href="javascript:void(0)">Gallery</a></li>
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">Contact</a></li>
                        </ul>
                        <a href="javascript:void(0)" class="commonBtnV2 orange right">Login</a>
                        <a href="javascript:void(0)" class="commonBtnV2 purple right">Register</a>
                        <div class="customClear"></div>
                    </nav>
                    <div class="customClear"></div>
                </div>
            </header>
            
            <section  class="bannerWrapper">
                <ul class="bannerSlider slick-list">
                    <li  style="background-image: url('images/bannerMain1.jpg')"></li>
                    <li  style="background-image: url('images/bannerMain2.jpg')"></li>
                </ul>
            </section>

    		<section class="mainContent">
                
                @yield('content')

                <footer class="footer">
                    <div class="pageCenter">
                        <div class="footerTop">
                            <a href="javascript:void(0)" class="left"><img src="{{ asset('assets/images/footerLogo.png') }}" alt="Shop"></a>
                            <ul class="right">
                                <li><a href="javascript:void(0)">Home</a></li>
                                <li><a href="javascript:void(0)">Gallery</a></li>
                                <li><a href="javascript:void(0)">About Us</a></li>
                                <li><a href="javascript:void(0)">Contact</a></li>
                            </ul>
                            <div class="customClear"></div>
                        </div>
                        <div class="footerBtm">
                            <p class="left">Powered by: <a href="https://www.zoondia.com/"><img src="{{ asset('assets/images/zoondia.png') }}" alt="Zoondia"></a></p>
                            <p class="right">Copyright &copy; 2019 Shop. All rights reserved</p>
                            <div class="customClear"></div>
                        </div>
                    </div>
                </footer>
            </section>
    	
    	</section>
    </body>
</html>
