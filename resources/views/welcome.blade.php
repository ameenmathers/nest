@extends('layouts.app')

@section('content')

    <div class="container-fluid" style="margin: 100px;">
        <div class="row">

            <div class="col-md-6">
                <div class="about_content">
                    <div class="section_title" style="color:#25b3ac ;">Schedule a Tour. Viewing Property</div>
                    <br>
                    <div class="section_title" style="color:#25b3ac ;">Buy or Rent Home. It’s that simple.</div>
                    <br>

                    <p> We've simplified the home buying process for buyers, eliminating downtime. Tour as many homes as you want, in real-time. Save thousands of dollars in agent fees.</p>
                    <br>


                    <div class="row text-left">
                        <div class="col-md-4">
                            <img src="{{Vite::asset('resources/img/Appstore.png')}}" alt>
                        </div>
                        <div class="col-md-1"></div>

                        <div class="col-md-4">
                            <img src="{{Vite::asset('resources/img/Googleplay.png')}}" alt>
                        </div>
                        <div class="col-md-2"></div>

                    </div>
                </div>
            </div>

            <div class="col-md-2"></div>

            <div class="col-md-4 align-items-end">
               <img src="{{Vite::asset('resources/img/phonescreen.png')}}" alt>
            </div>
        </div>

    </div>

    <hr>
    <div class="container-fluid" style="padding-left: 50px; padding-right: 50px; padding-top: 100px; padding-bottom: 100px;">
        <div class="homepage-work-clear"></div>
        <p class="section_title semi-bold text-center"  style="color:#25b3ac;">
            How does Nest work?
        </p>
        <p class="homepage-work-here text-center regular">
            Here’s how we make it easy to buy, sell, or rent a home.
        </p>
        <br><br>

        <div class="row text-center">

            <div class="col-md-4">
                <img src="{{Vite::asset('resources/img/how1.jpg')}}" alt="how1" width="170" height="170">

                <h3 class="semi-bold" style="color: black;">
                    Tour a home instantly
                </h3>

                <p class="homepage-work-table-content regular">
											<span>
											When you find a home you like, schedule a tour instantly and meet a
											licensed, pre-vetted agent at the front door. No need to schedule
											in advance.
											</span>
                </p>
            </div>

            <div class="col-md-4">
                <img class="" src="{{Vite::asset('resources/img/house.jpg')}}" alt="how1" width="170" height="170">

                <h3 class="semi-bold" style="color: black;">
                    Go Viewing within minutes
                </h3>

                <p class="homepage-work-table-content regular">
									<span>
										Home Viewing has never been easier. Check Property and get connected with an approved agent that can get you a home right away.
									</span>
                </p>
            </div>

            <div class="col-md-4">
                <img src="{{Vite::asset('resources/img/paying.jpg')}}" alt="how1" width="170" height="170">

                <h3 class="semi-bold" style="color: black;">
                    Start an offer, get options
                </h3>

                <p class="regular">
							<span>
								Begin the process right through the app. Next commits to giving you a smooth viewing and offer closing.
							</span>
                </p>
            </div>

        </div>
    </div>

    <div class="about" style="background-color: #bfcabc; padding: 100px;">
        <div class="container">
            <div class="row">

                <div class="col-md-4"></div>

                <div class="col-md-4 text-center">
                    <h3 class="" style="color:#25b3ac ;">Download the app</h3>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{Vite::asset('resources/img/Appstore.png')}}" alt>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
                            <img src="{{Vite::asset('resources/img/Googleplay.png')}}" alt>
                        </div>
                    </div>


                </div>

                <div class="col-md-4"></div>


            </div>

        </div>
    </div>


@endsection
