@extends('layouts.frontend_new', ['page_title' => 'home'])
@section('content')

<div class="inner-banner style-6">
	<div class="vertical-align">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2">
		  			<ul class="banner-breadcrumb  clearfix">
		  				<li><a class="link-blue-2" href="{{ route('frontend') }}">home</a> /</li>
		  				<li><span>blog detail</span></li>
		  			</ul>
  				</div>
			</div>
		</div>
	</div>
</div>

<div class="detail-wrapper">
	<div class="container">
       	<div class="row padd-90">
       		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
       			<div class="detail-header style-3">
       				<h2 class="detail-title color-dark-2">{{$actualite->title}}</h2>
					<div class="tour-info-line clearfix">
						<div class="tour-info">
				  	 		<img src="/frontend/img/calendar_icon_grey.png" alt="">
				  	 		<span class="font-style-2 color-dark-2">{{$actualite->created_at->format('d/m/Y')}}</span>
				  	 	</div>
						<div class="tour-info">
				  	 		<img src="/frontend/img/people_icon_grey.png" alt="">
				  	 		<span class="font-style-2 color-dark-2">{{ $actualite->user->firstname }} {{ $actualite->user->lastname }}</span>
				  	 	</div>
					</div>
       			</div>
       			<div class="detail-content">
       				<div class="detail-content-block">
	       				<div class="slider-wth-thumbs style-2">
							<div class="swiper-container thumbnails-preview" data-autoplay="0" data-speed="500" data-center="0" data-slides-per-view="1">
				                <div class="swiper-wrapper">
			                    	<div class="swiper-slide active" data-val="0">
			                    		 <img class="img-responsive img-full" src="{{ asset('app/' . $actualite->image) }}" alt="">
			                    	</div>
			                    </div>
				                <div class="pagination pagination-hidden"></div>
				            </div>
						</div>       									
						<p>{{$actualite->content}}.</p>
					</div> 					     			
				</div>
       		</div>
       	</div>
	</div>
</div>





@endsection
