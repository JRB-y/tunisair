@extends('layouts.frontend_new', ['page_title' => 'home'])
@section('content')

<!-- TOP BANNER -->
<div class="top-baner bg-blue">
    <div class="row no-margin">
        <div class="swiper-container main-slider-4" data-autoplay="0" data-loop="1" data-speed="800" data-center="0" data-slides-per-view="1">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide active" data-val="0">
                        <div class="hover-blue black-hover h_100">
                            <div class="clip">
                                <div class="bg bg-bg-chrome act" style="background-image:url('{{asset('app/' . $banner->image)}}')"></div>
                            </div>
                            <div class="tour-layer delay-1"></div>
                            <div class="vertical-align">
                                <div class="item-block style-4">
                                    <div class="vertical-align">
                                        {{-- <h4>Demo<b>Slider 1</b></h4> --}}
                                        <h3 class="hover-it">{{ $banner->title }}</h3>
                                        <div class="rate">
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                        </div>
                                        <div class="main-date">{{ $banner->text }}.</strong></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="pagination poin-style-1"></div>
        </div>

        <div class="find-form no-padding col-xs-12 col-md-6" style="height: 800px;">
            <div>
                <h4 class="ff_subtitle">Welcome to Tunisair</h4>
                <h2 class="ff_title">BLOC MOTEUR</h2>
                <div class="ff_text">Curabitur nunc erat, consequat in erat ut, congue bibendum nulla suspendisse</div>
            </div>
        </div>	      	 		


        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, fugit! Libero ipsum id ut quos aliquam fuga corrupti amet! Tempora alias libero ut mollitia cum sequi voluptas odit molestias fugit.
    </div>
</div>


<div class="main-wraper color-2 padd-90">
    <img class="center-image" src="img/home_4/tour-bg.jpg" alt="">
    <div class="wide-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="second-title style-2">
                    <h2 style="color: #d40000;">Latest news</h2>
                </div>
            </div>
        </div>

        {{-- NEWS --}}
        <div class="row" style="width: 65%; margin: auto;">
            <div class="list-content clearfix">
                @foreach($actualites as $act)
                    <div class="list-item-entry">
                        <div class="hotel-item style-3 bg-white">
                            <div class="table-view">
                                <div class="radius-top cell-view">
                                    <img src="{{ asset('app/' . $act->image) }}" width="50" height="50">          	 	 
                                </div>
                                <div class="title hotel-middle clearfix cell-view">
                                    <div class="date list-hidden"></div>
                                    <div class="date grid-hidden"><strong>{{$act->created_at->format('d/m/Y H:m')}}</strong></div>
                                    <h4><b>{{ $act->title }}</b></h4>
                                    <p class="f-14 grid-hidden">Nunc cursus libero purus ac congue arcu cur sus ut sed vitae pulvinar. Nunc cursus libero purus ac congue arcu.</p>
                                </div>
                                <div class="title hotel-right clearfix cell-view"> 
                                    <a class="c-button b-40 bg-blue hv-blue-o grid-hidden" href="{{ route('frontend.convention.show', $act->id) }}">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



{{-- CONVENTIONS --}}

<div class="main-wraper bg-blue padd-100">
    <div class="wide-container clearfix">
        <div class="left-title">
            <div class="second-title">
                <h2 class="subtitle color-white-light">Conventions</h2>
            </div>
        </div>
        <div class="left-content">
            <div class="row">
                <div class="swiper-container pad-15" data-autoplay="0" data-speed="1000" data-center="0" data-slides-per-view="responsive" data-mob-slides="1" data-xs-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="4" style="display: flex;">
                        <div class="swiper-wrapper">
                            @foreach ($convention_types as $type)
                                <div class="swiper-slide">
                                    <div class="hotel-item style-3">
                                        <div class="radius-top">
                                            <img src="https://via.placeholder.com/50" alt="">
                                        </div>
                                        <div class="title clearfix">
                                            <h4>
                                                <b>
                                                    <a href="{{ route('frontend.display.search', ['type' => 'convention', 'id' => $type->id ]) }}" style="color: #d40000">{{strtoupper($type->name)}}
                                                    </a>
                                                </b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    <div class="pagination"></div>
                </div>
            </div>				
        </div>

    </div>
</div>

@endsection
