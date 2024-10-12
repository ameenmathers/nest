
<!DOCTYPE html>
<html lang="en">


<title>{{Route::currentRouteName()}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Nest, Kiota.com, Viewing, Renting, Rent in Abuja, Rent in Nigeria">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!-- FontAwesome CSS for navigation icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
<style>
    .intro_slider_nav_container {
        margin-top: 20px;
    }
    .intro_slider_nav {
        cursor: pointer;
        font-size: 20px;
        padding: 10px;
        background: #ddd;
        border-radius: 50%;
        margin: 0 5px;
    }

    body {
        font-family: 'Montserrat', sans-serif !important;
        font-size: 14px;
        font-weight: 400;
        background: #FFFFFF;
        color: #a5a5a5;
    }
</style>

@vite(['resources/css/main.css','resources/css/bootstrap.min.css','resources/css/owl.carousel.css',
'resources/css/responsive.css','resources/css/animate.css','resources/css/owl.theme.default.css',
'resources/js/custom.js', 'resources/js/main.js','resources/js/bootstrap.min.js','resources/js/parallax.min.js',
'resources/js/popper.js','resources/js/jquery-3.2.1.min.js',
'resources/js/TweenMax.min.js','resources/js/TimelineMax.min.js','resources/js/animation.gsap.min.js',
'resources/js/ScrollToPlugin.min.js','resources/js/owl.carousel.js','resources/js/property.js'])

<body>
<div class="super_container">

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo">
                            <a href="#"><img src="{{Vite::asset('resources/img/logo.png')}}" alt></a>
                        </div>
                        <nav class="main_nav">
                            <ul>
                                <li class="active"><a href="{{route('welcome')}}">Home</a></li>
                                <li><a href="{{route('about-us')}}">About us</a></li>
                                <li><a href="{{route('properties')}}">Explore</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                        @guest
                        <div class="row ml-auto">
                            <div class="col-md-6">
                                <div class="phone_num" style="width: 120px; text-align: center;">
                                    <div class="phone_num_inner"><div class=""><a href="{{route('login')}}"> <span style="color: white !important;">Login</span></a></div></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="phone_num" style="width: 120px; text-align: center;">
                                    <div class="phone_num_inner"><div class=""><a href="{{url('sign-up')}}"> <span style="color: white !important;">Sign Up</span></a></div></div>
                                </div>
                            </div>

                        </div>
                        @endguest

                            @auth
                                    <div class="phone_num ml-auto">
                                      <div class="phone_num_inner">
                                          <a href="{{route('dashboard')}}"><span style="color: white !important;">Dashboard </span></a>
                                      </div>
                                    </div>
                            @endauth

                        <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="menu trans_500">
        <div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
            <div class="menu_close_container"><div class="menu_close"></div></div>
            <div class="logo menu_logo">
                <a href="#">
                    <div class="logo_container d-flex flex-row align-items-start justify-content-start">
                        <div class="logo_image"><div><img src="{{Vite::asset('resources/img/logo.png')}}" alt></div></div>
                    </div>
                </a>
            </div>
            <ul>
                <li class="menu_item"><a href="{{route('welcome')}}">Home</a></li>
                <li class="menu_item"><a href="{{route('about-us')}}">About us</a></li>
                <li class="menu_item"><a href="{{route('properties')}}">Explore</a></li>
                <li class="menu_item"><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>

        @guest
            <a href="{{url('sign-up')}}">Sign Up</a>
            <a href="{{route('login')}}">Login</a>
        @endguest

        @auth
            <a href="{{route('dashboard')}}">Dashboard</a>
        @endauth


    </div>

    @if(Route::currentRouteName() === 'login' || Route::currentRouteName() === 'signUp')
    @else
        @if (Route::currentRouteName() === 'welcome' || Route::currentRouteName() === 'home')
            <div class="home">
                <div class="parallax_home" style="background-image: url({{Vite::asset('resources/img/home_slider_1.jpg')}})"></div>
                <div class="home_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="home_title">Welcome to Nest<br><br>
                                        <span style="font-size: 18px;" class="home_subtitle">Book a Tour. Viewing. Come home. It’s that simple.</span>
                                    </div>
                                    <div class="breadcrumbs ml-auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home_search">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_search_container">
                                <div class="home_search_content">

                                    <form action="{{ route('property-search') }}" method="GET" class="search_form d-flex flex-row align-items-start justfy-content-start">
                                        <div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
                                            <div>
                                                <select name="category" class="search_form_select">
                                                    <option disabled selected>For rent/sale</option>
                                                    <option value="Rent">Rent</option>
                                                    <option value="Sale">Sale</option>
                                                </select>
                                            </div>

                                            <div>
                                                <select name="type" class="search_form_select">
                                                    <option disabled selected>All types</option>
                                                    <option value="House" >House</option>
                                                    <option value="Land">Land</option>
                                                    <option value="Apartment">Apartment</option>
                                                </select>
                                            </div>

                                            <div>
                                                <select name="district" class="search_form_select">
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
                                            </div>

                                            <div>
                                                <select name="price" class="search_form_select">
                                                    <option disabled selected>Price</option>
                                                    <option value="1000000">₦ 1,000,000</option>
                                                    <option value="2000000">₦ 2,000,000</option>
                                                    <option value="3000000">₦ 3,000,000</option>
                                                    <option value="4000000">₦ 4,000,000</option>
                                                    <option value="5000000">₦ 5,000,000 and above</option>
                                                </select>
                                            </div>

                                            <div>
                                                <select name="bedrooms" class="search_form_select">
                                                    <option disabled selected>Bedrooms</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="search_form_button ml-auto">search</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="home">
                <div class="parallax_home" style="background-image: url({{Vite::asset('resources/img/home_slider_1.jpg')}})"></div>
                <div class="home_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="gv">{{Route::currentRouteName()}}</div>
                                    <div class="breadcrumbs ml-auto">
                                        <ul>
                                            <li><a href="{{route('home')}}">Home</a></li>
                                            <li>{{Route::currentRouteName()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif



            @yield('content')

    @if(Route::currentRouteName() === 'login' || Route::currentRouteName() === 'signUp')
    @else
    <div class="newsletter" style="min-height: 300px !important;">
        <div class="parallax_newsletter" style="background-image: url({{Vite::asset('resources/img/home_slider_1.jpg')}}); padding-top: 107px; padding-bottom: 105px;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_content d-flex flex-lg-row flex-column align-items-start justify-content-start">
                            <div class="newsletter_title_container">
                                <div class="newsletter_title">Are you buying or selling?</div>
                                <div class="newsletter_subtitle">Search your dream home</div>
                            </div>
                            <div class="newsletter_form_container">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" placeholder="Your e-mail address" required="required">
                                    <button class="newsletter_button">subscribe now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif

    <footer class="footer">
        <div class="footer_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer_logo"><a href="#"><img width="176" height="69" src="{{Vite::asset('resources/img/logo.png')}}" alt></a></div>
                    </div>
                    <div class="col-lg-3 d-flex flex-column align-items-center justify-content-end">
                        <div class="footer_title">Features</div>
                    </div>

                    <div class="col-lg-3 d-flex flex-column align-items-center justify-content-end">
                        <div class="footer_title">Useful Links</div>
                    </div>

                    <div class="col-lg-3 d-flex flex-column align-items-center justify-content-end">
                        <div class="footer_title">Socials</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 footer_col">
                        <div class="footer_about">
                            <div class="footer_about_text text-center">Nest is an on demand real estate platform that delivers instant access to buy and rent homes and full-service, professional real estate agents. All at the click of a button..</div>
                        </div>
                    </div>
                    <div class="col-lg-3 footer_col">
                        <div class="footer_latest d-flex flex-row align-items-center justify-content-center">
                            <div class="footer_latest_content">
                                <div class="footer_latest_name">
                                    <a href="{{route('about-us')}}">About Us Nest</a><br>
                                    <a href="{{route('contact')}}">Contact Us Nest</a><br>
                                    <a href="{{route('register')}}">Buy and Sell </a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 footer_col">
                        <div class="footer_latest d-flex flex-row align-items-center justify-content-center">
                            <div class="footer_latest_content">
                                <div class="footer_latest_name">
                                    <a href="#">Terms of Service</a><br>
                                    <a href="#">Privacy Policy</a><br>
                                    <a href="#">FAQs</a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 footer_col">
                        <div class="footer_latest d-flex flex-row align-items-center justify-content-center">
                            <div class="footer_latest_content">
                                <div class="">
                                    <a style="color: white; margin-right: 1.5rem !important;" href="#"><i style="color: white !important;" class="fa fa-facebook fa-2x"></i></a>

                                    <a style="color: white; margin-right: 1.5rem !important;"  href="#"><i class="fa fa-instagram fa-2x"></i></a>

                                    <a style="color: white; margin-right: 1.5rem !important;"  href="#"><i class="fa fa-twitter fa-2x"></i></a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bar">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer_bar_content d-flex flex-row align-items-center justify-content-start">
                            <div class="cr">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

                            </div>
                            <div class="footer_nav">
                                <ul>
                                    <li><a href="{{route('welcome')}}">Home</a></li>
                                    <li><a href="{{route('about-us')}}">About us</a></li>
                                    <li><a href="{{route('properties')}}">Buy</a></li>
                                    <li><a href="{{route('register')}}">Sell</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </div>
                            <div class="footer_phone ml-auto"><span>call us: </span>+234 805 322 5125</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

@stack('signup-tab')
@stack('carousel')
</body>
</html>
