<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
        <link rel="shortcut icon" href="favicon.ico"/> 
        <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('frontend/css/jquery-ui.structure.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('frontend/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">        
        <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css"/>
        @stack('css')
        <title>Tunisair</title>
  </head>
<body class="no-overflow" data-color="theme-1">
    <div class="loading blue">
        <div class="loading-center">
            <div class="loading-center-absolute">
                <div class="object object_four"></div>
                <div class="object object_three"></div>
                <div class="object object_two"></div>
                <div class="object object_one"></div>
            </div>
        </div>
    </div>
  
  <header class="color-1 hovered menu-3">
   <div class="container">
   	  <div class="row">
   	  	 <div class="col-md-12">
  	  	    <div class="nav"> 
            <a href="{{ route('frontend') }}" class="logo">
                <img src="{{ asset('material') }}/img/Tunisair_logo.png" width="250">
   	  	    </a>
   	  	   
                <nav class="menu">
                    <ul>
                        <li class="type-1 @if($page_title === 'home') active @endif">
                            <a href="{{ route('frontend') }}">Home</a>
                        </li>
                        <li class="type-1 @if($page_title === 'agencies') active @endif">
                            <a href="{{ route('frontend.agencies-map') }}">Agencies</a>
                        </li>
                        <li class="type-1 @if($page_title === 'daily') active @endif">
                            <a href="{{ route('frontend.daily-flights') }}">Daily Flights</a>
                        </li>
                        <li class="type-1">
                            <li class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <a href="{{ route('register') }}" class="nav-link">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
		   </div>
   	  	 </div>
   	  </div>
   </div>
  </header>

    @yield('content')

    <footer class="bg-dark type-2">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="footer-block">
    					<img src="img/theme-1/logo.png" alt="" class="logo-footer">
    					<div class="f_text color-grey-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore  magna aliqua. Ut aliquip ex ea commodo consequat.</div>
    					<div class="footer-share">
    						<a href="#"><span class="fa fa-facebook"></span></a>
    						<a href="#"><span class="fa fa-twitter"></span></a>
    						<a href="#"><span class="fa fa-google-plus"></span></a>
    						<a href="#"><span class="fa fa-pinterest"></span></a>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-sm-6 no-padding">
				   <div class="footer-block">
						<h6>Travel News</h6>
						{{-- <div class="f_news clearfix">
							<a class="f_news-img black-hover" href="index_4.html#">
								<img class="img-responsive" src="img/home_6/news_1.jpg" alt="">
								<div class="tour-layer delay-1"></div>
							</a>
							<div class="f_news-content">
								<a class="f_news-tilte color-white link-red" href="index_4.html#">amazing place</a>
								<span class="date-f">Mar 18, 2015</span>
								<a href="index_4.html#" class="r-more">read more</a>
							</div>
						</div>
						<div class="f_news clearfix">
							<a class="f_news-img black-hover" href="index_4.html#">
								<img class="img-responsive" src="img/home_6/news_2.jpg" alt="">
								<div class="tour-layer delay-1"></div>
							</a>
							<div class="f_news-content">
								<a class="f_news-tilte color-white link-red" href="index_4.html#">amazing place</a>
								<span class="date-f">Mar 18, 2015</span>
								<a href="index_4.html#" class="r-more">read more</a>
							</div>
						</div>
						<div class="f_news clearfix">
							<a class="f_news-img black-hover" href="index_4.html#">
								<img class="img-responsive" src="img/home_6/news_1.jpg" alt="">
								<div class="tour-layer delay-1"></div>
							</a>
							<div class="f_news-content">
								<a class="f_news-tilte color-white link-red" href="index_4.html#">amazing place</a>
								<span class="date-f">Mar 18, 2015</span>
								<a href="index_4.html#" class="r-more">read more</a>
							</div>
						</div>							 --}}
				   </div>
				</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    			   <div class="footer-block">
                     <h6>Tags:</h6>
    			      <a href="#" class="tags-b">flights</a>
    			      <a href="#" class="tags-b">traveling</a>
    			      <a href="#" class="tags-b">sale</a>
    			      <a href="#" class="tags-b">cruises</a>
    			      <a href="#" class="tags-b">cars</a>
    			      <a href="#" class="tags-b">hotels</a>
    			      <a href="#" class="tags-b">tours</a>
    			      <a href="#" class="tags-b">booking</a>
    			      <a href="#" class="tags-b">countries</a>
				   </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="footer-block">
                     <h6>Contact Info</h6>
                       <div class="contact-info">
                        <div class="contact-line color-grey-3"><i class="fa fa-map-marker"></i><span>Lorem ipsum dolor sit amet consectetur .</span></div>
						<div class="contact-line color-grey-3"><i class="fa fa-phone"></i><a href="tel:93123456789">+216 22 555 555</a></div>
						<div class="contact-line color-grey-3"><i class="fa fa-envelope-o"></i><a href="mailto:">contact@tunisair.com</a></div>
					</div>
				   </div>
				</div>
    		</div>
    	</div>
    	<div class="footer-link bg-black">
    	  <div class="container">
    	  	<div class="row">
    	  		<div class="col-md-12">
    	  		    <div class="copyright">
						<span>&copy; 2021 All rights reserved. Tunisair</span>
					</div>
    	  			<ul>
						<li><a class="link-aqua" href="{{ route('frontend') }}">Home </a></li>
						<li><a class="link-aqua" href="{{ route('frontend.agencies-map') }}">Agencies</a></li>
						<li><a class="link-aqua" href="{{ route('frontend.daily-flights') }}">Daily Flights</a></li>
					</ul>
    	  		</div>
    	  	</div>
    	  </div>
    	</div>
    </footer>
<script src="{{ asset('frontend/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/js/idangerous.swiper.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.viewportchecker.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mousewheel.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&language=en"></script>	
<script src="{{ asset('frontend/js/map.js') }}"></script>	
<script src="{{ asset('frontend/js/all.js') }}"></script>
@stack('js')
</body>
</html>