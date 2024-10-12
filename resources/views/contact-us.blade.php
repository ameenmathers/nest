@extends('layouts.app')

@section('content')


    <div class="contact">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="contact_info">
                        <div class="section_title">Get in touch with us</div>
                        <div class="section_subtitle">Say hello</div>
                        <div class="contact_info_text"><p>Get in touch with us to say hello! We are here to assist you with any inquiries or information you need. Feel free to reach out and experience our dedicated support and hospitality</p></div>
                        <div class="contact_info_content">
                            <ul class="contact_info_list">
                                <li>
                                    <div>Address:</div>
                                    <div>1481 Creekside Lane Avila Beach, CA 93424</div>
                                </li>
                                <li>
                                    <div>Phone:</div>
                                    <div>+53 345 7953 32453</div>
                                </li>
                                <li>
                                    <div>Email:</div>
                                    <div><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c5bcaab0b7a8a4aca985a2a8a4aca9eba6aaa8">[email&#160;protected]</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="contact_form_container">
                        <form action="#" class="contact_form" id="contact_form">
                            <div class="row">

                                <div class="col-lg-6 contact_name_col">
                                    <input type="text" class="contact_input" placeholder="Name" required="required">
                                </div>

                                <div class="col-lg-6">
                                    <input type="email" class="contact_input" placeholder="E-mail" required="required">
                                </div>
                            </div>
                            <div><input type="text" class="contact_input" placeholder="Subject"></div>
                            <div><textarea class="contact_textarea contact_input" placeholder="Message" required="required"></textarea></div>
                            <button class="contact_button button">send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact_map">


        <div class="map">
            <div id="google_map" class="google_map">
                <div class="map_container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.7106656220694!2d7.498384075233261!3d9.090100388029091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0a403e7a648b%3A0x5f15e2da75006319!2sLake%20Chad%20Cres%2C%20Maitama%2C%20Abuja%20904101%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1721900685731!5m2!1sen!2sng" height="550" style=" width: 100%; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
