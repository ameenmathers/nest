@extends('layouts.app')

@section('content')

    <div class="properties">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title">{{count($results)}} Properties found</div>
                    <div class="section_subtitle"></div>
                </div>
            </div>
            <div class="row properties_row">

                @if($results->isEmpty())
                    <p>No results found.</p>
                @else

                @foreach($results as $property)

                    <div class="col-xl-4 col-lg-6 property_col">
                        <div class="property">
                            <div class="property_image">
                                <img src="{{asset($property->thumbnail)}}" alt>
                            </div>
                            <div class="property_body text-center">
                                <div class="property_location">{{$property->district}}</div>
                                <div class="property_title"><a href="{{url('property-detail/'. $property->pid)}}">{{$property->name}}</a></div>
                                <div class="property_price">₦ {{$property->price}}</div>
                            </div>
                            <div class="property_footer d-flex flex-row align-items-center justify-content-start">
                                <div><div class="property_icon"><img src="{{Vite::asset('resources/img/icon_1.png')}}" alt></div><span>{{$property->size}} sqm</span></div>
                                <div><div class="property_icon"><img src="{{Vite::asset('resources/img/icon_2.png')}}" alt></div><span>{{$property->bedroom}} Bedrooms</span></div>
                                <div><div class="property_icon"><img src="{{Vite::asset('resources/img/icon_3.png')}}" alt></div><span>{{$property->bathroom}} Bathrooms</span></div>
                            </div>
                        </div>
                    </div>

                @endforeach

                @endif
            </div>
            <div class="row">
                <div class="col">
                    <br><br>
                    <div class="pagination">
                        <ul>
                            <li class="active"><a href="#">01.</a></li>
                            <li><a href="#">02.</a></li>
                            <li><a href="#">03.</a></li>
                            <li><a href="#">04.</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
