@extends('layouts.dashboard')

@section('content')

    <div class="col-lg-12">
        <div class="single_element">
            <div class="quick_activity">
                <div class="row">
                    <div class="col-12">
                        <div class="quick_activity_wrap">

                            <div class="single_quick_activity">
                                <div class="count_content">
                                    <p>Welcome to your Nest Dashboard, {{$user->name}}</p>
                                    <h3><span class="counter"></span> </h3>
                                </div>
                                <a href="#" class="notification_btn green_btn">Dashboard</a>
                                <div id="bar3" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="75"></span>
                                </div>
                            </div>

                            <div class="single_quick_activity">
                                <div class="count_content">
                                    <p>Tours</p>
                                    <h3><span class="counter">{{$tours}}</span></h3>
                                </div>
                                <a href="#" class="notification_btn violate_btn">Annual</a>
                                <div id="bar4" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="85"></span>
                                </div>
                            </div>

                            <div class="single_quick_activity">
                                <div class="count_content">
                                    <p>Properties</p>
                                    <h3><span class="counter">{{$properties}}</span></h3>
                                </div>
                                <a href="#" class="notification_btn violate_btn">Total</a>
                                <div id="bar4" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="85"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
