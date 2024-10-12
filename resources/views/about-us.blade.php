@extends('layouts.app')

@section('content')

    <div class="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="about_content">
                        <div class="section_title">A few words about us</div>
                        <div class="section_subtitle">Search your dream home</div>
                        <div class="about_text">
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Donec in tempus leo. Aenean ultricies mauris sed quam lacinia lobortis. Cras ut vestibulum enim, in gravida nulla. Curabitur ornare nisl at sagittis cursus. Sed mattis, eros non vulputate luctus, erat dui dapibus augue, eu fringilla tortor ante id mi. Sed a enim libero. Vestibulum pharetra aliquam convallis. </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about_image"><img src="{{Vite::asset('resources/img/about_image.jpg')}}" alt></div>
                </div>
            </div>
        </div>
    </div>

    <div class="realtors">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title">The Team</div>
                    <div class="section_subtitle">Resume of our team</div>
                </div>
            </div>
            <div class="row realtors_row">

                <div class="col-lg-3 col-md-6">
                    <div class="realtor_outer">
                        <div class="realtor">
                            <div class="realtor_image"><img src="{{Vite::asset('resources/img/realtor_1.jpg')}}" alt></div>
                            <div class="realtor_body">
                                <div class="realtor_title">Maria Williams</div>
                                <div class="realtor_subtitle">CEO</div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="realtor_outer">
                        <div class="realtor">
                            <div class="realtor_image"><img src="{{Vite::asset('resources/img/realtor_1.jpg')}}" alt></div>
                            <div class="realtor_body">
                                <div class="realtor_title">Christian Smith</div>
                                <div class="realtor_subtitle">CFO</div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="realtor_outer">
                        <div class="realtor">
                            <div class="realtor_image"><img src="{{Vite::asset('resources/img/realtor_1.jpg')}}" alt></div>
                            <div class="realtor_body">
                                <div class="realtor_title">Steve G. Brown</div>
                                <div class="realtor_subtitle">Senior Executive</div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="realtor_outer">
                        <div class="realtor">
                            <div class="realtor_image"><img src="{{Vite::asset('resources/img/realtor_1.jpg')}}" alt></div>
                            <div class="realtor_body">
                                <div class="realtor_title">Jessica Walsh</div>
                                <div class="realtor_subtitle">Senior Executive</div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
