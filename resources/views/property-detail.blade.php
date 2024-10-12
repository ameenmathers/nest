@extends('layouts.app')

@section('content')


    <div class="intro">
        <div class="container">
            @include('notification')

            <div class="row">

                <div class="col">
                    <div class="intro_content d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="intro_title_container">
                            <div class="intro_title">{{$property->name}}</div>
                            <div class="intro_tags">
                                <ul>
                                    @foreach($property->amenities as $amenity)
                                        <li><a href="#">{{$amenity->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="intro_price_container ml-lg-auto d-flex flex-column align-items-start justify-content-center">
                            <div>For {{$property->type}}</div>
                            <div class="intro_price">₦ {{ number_format($property->price, 0, '.', ',') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="intro_slider_container">

            <div class="owl-carousel owl-theme intro_slider">

                @foreach($images as $image)
                    <div style="height: 600px; width: 100%"  class="owl-item"><img src="{{asset($image->image)}}" alt></div>
                @endforeach

            </div>

            <div class="intro_slider_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="intro_slider_nav_content d-flex flex-row align-items-start justify-content-end">
                                <div class="intro_slider_nav intro_slider_prev" style="padding-bottom: 40px; width: 40px; border-radius: 0px;"><i class="fas fa-chevron-left" aria-hidden="true"></i></div>
                                <div class="intro_slider_nav intro_slider_next" style="padding-bottom: 40px; width: 40px; border-radius: 0px;"><i class="fas fa-chevron-right" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="property">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar_search">
                            <div class="sidebar_search_title">Search your home</div>
                            <div class="sidebar_search_form_container">
                                <form action="{{ route('property-search') }}" method="GET" class="sidebar_search_form" id="sidebar_search_form">

                                    <select name="category" class="sidebar_search_select">
                                        <option disabled selected>For rent/sale</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Sale">Sale</option>
                                    </select>

                                    <select name="type" class="sidebar_search_select">
                                        <option disabled selected>All types</option>
                                        <option value="House" >House</option>
                                        <option value="Land">Land</option>
                                        <option value="Apartment">Apartment</option>
                                    </select>

                                    <select name="district" class="sidebar_search_select">
                                        <option disabled selected>District</option>
                                        <option value="Maitama">Maitama</option>
                                        <option value="Jabi">Jabi</option>
                                        <option value="Wuse">Wuse</option>
                                        <option value="Wuse II">Wuse II</option>
                                        <option value="Lifecamp">Lifecamp</option>
                                        <option value="Jahi">Jahi</option>
                                        <option value="Katampe Extension">Katampe Extension</option>
                                        <option value="Katampe">Katampe</option>
                                        <option value="Asokoro">Asokoro</option>
                                        <option value="Guzape">Guzape</option>
                                    </select>

                                    <div class="row sidebar_search_row">
                                        <div class="col-lg-6">
                                            <select name="bedrooms" class="sidebar_search_select">
                                                <option disabled selected>Bedrooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <select name="price" class="sidebar_search_select">
                                                <option disabled selected>Price</option>
                                                <option value="1000000">₦ 1,000,000</option>
                                                <option value="2000000">₦ 2,000,000</option>
                                                <option value="3000000">₦ 3,000,000</option>
                                                <option value="4000000">₦ 4,000,000</option>
                                                <option value="5000000">₦ 5,000,000 and above</option>
                                            </select>
                                        </div>
                                    </div>


                                    <button type="submit" class="sidebar_search_button search_form_button">search</button>
                                </form>
                            </div>
                        </div>

                        <div class="sidebar_realtor">
                            <div class="sidebar_realtor_image"><img src="{{asset($property->propertyAgent->image)}}" alt></div>
                            <div class="sidebar_realtor_body text-center">
                                <div class="sidebar_realtor_title"><a href="#">{{$property->propertyAgent->name}}</a></div>
                                <div class="sidebar_realtor_subtitle">Agent</div>
                                <div class="sidebar_realtor_phone"><span>Contact me: </span>Schedule a tour below</div>

                                <div class="realtor_link"><a href="{{url('client/schedule-tour-view/'.$property->pid)}}"><i class="fas fa-calendar"></i></a></div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 offset-lg-1">
                    <div class="property_content">
                        <div class="property_icons">
                            <div class="property_title">Extra Facilities</div>
                            <div class="property_text property_text_1">
                                <p>Discover additional facilities that elevate your property experience</p>
                            </div>
                            <div class="property_rooms d-flex flex-sm-row flex-column align-items-start justify-content-start">

                                <div class="property_room">
                                    <div class="property_room_title">Bedrooms</div>
                                    <div class="property_room_content d-flex flex-row align-items-center justify-content-start">
                                        <div class="room_icon"><img src="{{Vite::asset('resources/img/room_1.png')}}" alt></div>
                                        <div class="room_num">{{$property->bedroom}}</div>
                                    </div>
                                </div>

                                <div class="property_room">
                                    <div class="property_room_title">Bathrooms</div>
                                    <div class="property_room_content d-flex flex-row align-items-center justify-content-start">
                                        <div class="room_icon"><img src="{{Vite::asset('resources/img/room_2.png')}}" alt></div>
                                        <div class="room_num">{{$property->bathroom}}</div>
                                    </div>
                                </div>

                                <div class="property_room">
                                    <div class="property_room_title">Area</div>
                                    <div class="property_room_content d-flex flex-row align-items-center justify-content-start">
                                        <div class="room_icon"><img src="{{Vite::asset('resources/img/room_3.png')}}" alt></div>
                                        <div class="room_num">{{$property->size}} Sqm</div>
                                    </div>
                                </div>


                                <div class="property_room">
                                    <div class="property_room_title">Parking Space</div>
                                    <div class="property_room_content d-flex flex-row align-items-center justify-content-start">
                                        <div class="room_icon"><img src="{{Vite::asset('resources/img/room_5.png')}}" alt></div>
                                        <div class="room_num">{{$property->parking_space}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="property_description">
                            <div class="property_title">Description</div>
                            <div class="property_text property_text_2">
                                <p>{{$property->description}}</p>
                            </div>
                        </div>

                        <div class="additional_details">
                            <div class="property_title">Additional Details</div>
                            <div class="details_container">
                                <ul>
                                    @foreach($property->features as $feature)
                                        <li><span>{{$feature->feature_name}}: </span>{{$feature->feature_value}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="property_map">
                            <div class="property_title">Property on map</div>
                            <div class="property_map_container">

                                <div id="google_map" class="google_map">
                                    <div class="map_container">
                                        <iframe
                                            width="652"
                                            height="472"
                                            style="border:0"
                                            aria-hidden="false"
                                            tabindex="0"
                                            src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDz-usFFWCvxfSLRR1lHqe-60qlEzAvPTc&center={{$property->latitude}},{{$property->longitude}}&zoom=15"
                                            allowfullscreen
                                        ></iframe>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('carousel')

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!-- Your custom JS -->

        <script>
            $(document).ready(function(){
                var owl = $('.intro_slider');
                owl.owlCarousel({
                    items: 1,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    nav: false,
                    dots: false
                });

                $('.intro_slider_prev').click(function() {
                    owl.trigger('prev.owl.carousel');
                });

                $('.intro_slider_next').click(function() {
                    owl.trigger('next.owl.carousel');
                });
            });
        </script>
    @endpush

@endsection
