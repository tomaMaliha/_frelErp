<!DOCTYPE html>
<html lang="en">

<head>
  <title>First Rays ERP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="{{asset('public/front/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/front/assets/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('public/front/assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/front/assets/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/front/assets/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('public/front/assets/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{asset('public/front/assets/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('public/front/assets/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('public/front/assets/css/aos.css')}}">
  <link href="{{asset('public/front/assets/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('public/front/assets/css/style.css')}}">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a> 
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a> 
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> support@firstrays.com.bd</a> 
          </div>

        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="{{ url('/') }}" class="d-block">
              <img src="{{asset('public/front/assets/images/logo.jpeg')}}" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="{{ url('/') }}" class="nav-link text-left">Home</a>
                </li>
                <li>
                  <a href="{{ url('/') }}" class="nav-link text-left">About</a>
                </li>
                <li>
                  <a href="about.html" class="nav-link text-left">Services</a>
                </li>
                <li>
                  <a href="blog.html" class="nav-link text-left">Blog</a>
                </li>
                <li>
                  <a href="contact.html" class="nav-link text-left">Contact</a>
                </li>
              </ul>                                                                
            </nav>

          </div>
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nk-menu-item has-sub">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    
                                </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{route('user')}}" class="nk-menu-link"><span class="nk-menu-text">Logout</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li>

                                
                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    
                                </a> -->

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
 
        </div>

      </header>


      <div class="hero-slide owl-carousel site-blocks-cover">
        <div class="intro-section" style="background-image: url('public/front/assets/images/hero_1.jpg');">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 mx-auto text-center" data-aos="fade-up">
                <h1> First Rays ERP</h1>
                <b><p>Work Done for you dear. <br> Asset do not works with csss proerty like "background-image" property. It only works with html tag like img src. </p></b>
                <p><a href="#" class="btn btn-primary">Get Started</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="intro-section" style="background-image: url('public/front/assets/images/hero_2.jpg');">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 mx-auto text-center" data-aos="fade-up">
                <div class="intro">
                  <h1>First Rays ERP</h1>
                  <b></b><p>Enjoy your day. Thanks for knocking me.</p><b>
                  <p><a href="#" class="btn btn-primary">Get Started</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


      <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <img src="{{asset('public/front/assets/images/hero_1.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto">
              <span class="caption">About Us</span>
              <h2 class="title-with-line">Recognized Planning of Financial Costing & Saving</h2>


              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi voluptate asperiores rem quis consectetur cum quae, ratione voluptatem aliquam sit aspernatur.</p>


              <div class="row">
                <div class="col-md-6">
                  <ul class="list-unstyled ul-arrow">
                    <li>Dolor sit amet</li>
                    <li>Obcaecati similique excepturi</li>
                    <li>Ipsum amet voluptas</li>
                    <li>Aliquid facilis est</li>
                    <li>Eligendi laborum assumenda</li>
                  </ul>

                </div>
                <div class="col-md-6">
                  <ul class="list-unstyled ul-arrow float-left">
                    <li>Dolor sit amet</li>
                    <li>Obcaecati similique excepturi</li>
                    <li>Ipsum amet voluptas</li>
                    <li>Aliquid facilis est</li>
                    <li>Eligendi laborum assumenda</li>
                  </ul>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
      </div>

      <div class="site-section pt-0">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <div class="numbers">
                <strong class="d-block">32, 594</strong>
                <span>Number of Clients</span>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="numbers">
                <strong class="d-block">15</strong>
                <span>Years of Experience</span>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="numbers">
                <strong class="d-block">300</strong>
                <span>Employees</span>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="numbers">
                <strong class="d-block">10,200</strong>
                <span>Cup of Coffees</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light pb-0">
        <div class="container">
          <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-4">
              <span class="caption">Our Services</span>
              <h2 class="title-with-line text-center mb-5">What We Do</h2>                
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6">

              <div class="feature-1">
                <div class="icon-wrapper bg-primary">

                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5h-2v12h2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                    <path fill-rule="evenodd" d="M0 14.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                  </svg>
                </div>
                <div class="feature-1-content">
                  <h2>Growth Business</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                  <p><a href="#" class="btn btn-primary px-4 ">Learn More</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="feature-1">
                <div class="icon-wrapper bg-primary">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-life-preserver" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                    <path d="M11.642 6.343L15 5v6l-3.358-1.343A3.99 3.99 0 0 0 12 8a3.99 3.99 0 0 0-.358-1.657zM9.657 4.358L11 1H5l1.343 3.358A3.985 3.985 0 0 1 8 4c.59 0 1.152.128 1.657.358zM4.358 6.343L1 5v6l3.358-1.343A3.985 3.985 0 0 1 4 8c0-.59.128-1.152.358-1.657zm1.985 5.299L5 15h6l-1.343-3.358A3.984 3.984 0 0 1 8 12a3.99 3.99 0 0 1-1.657-.358z"/>
                  </svg>
                </div>
                <div class="feature-1-content">
                  <h2>Distributor Support</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                  <p><a href="#" class="btn btn-primary px-4 ">Learn More</a></p>
                </div>
              </div> 
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="feature-1">
                <div class="icon-wrapper bg-primary">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 6a6 6 0 1 1 12 0A6 6 0 0 1 0 6z"/>
                    <path d="M12.93 5h1.57a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1.57a6.953 6.953 0 0 1-1-.22v1.79A1.5 1.5 0 0 0 5.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 4h-1.79c.097.324.17.658.22 1z"/>
                  </svg>
                </div>
                <div class="feature-1-content">
                  <h2>Advanced Accounting</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                  <p><a href="#" class="btn btn-primary px-4 ">Learn More</a></p>
                </div>
              </div> 
            </div>



            <div class="col-lg-4 col-md-6">

              <div class="feature-1">
                <div class="icon-wrapper bg-primary">

                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-wallet2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.5 4l10-3A1.5 1.5 0 0 1 14 2.5v2h-1v-2a.5.5 0 0 0-.5-.5L5.833 4H2.5z"/>
                    <path fill-rule="evenodd" d="M1 5.5A1.5 1.5 0 0 1 2.5 4h11A1.5 1.5 0 0 1 15 5.5v8a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5v-8zM2.5 5a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-11z"/>
                  </svg>
                </div>
                <div class="feature-1-content">
                  <h2>Good Quality Product</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                  <p><a href="#" class="btn btn-primary px-4 ">Learn More</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="feature-1">
                <div class="icon-wrapper bg-primary">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-briefcase" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6h-1v6a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-6H0v6z"/>
                    <path fill-rule="evenodd" d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v2.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 6.884V4.5zM1.5 4a.5.5 0 0 0-.5.5v1.616l6.871 1.832a.5.5 0 0 0 .258 0L15 6.116V4.5a.5.5 0 0 0-.5-.5h-13zM5 2.5A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z"/>
                  </svg>
                </div>
                <div class="feature-1-content">
                  <h2>Investment Management</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                  <p><a href="#" class="btn btn-primary px-4 ">Learn More</a></p>
                </div>
              </div> 
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="feature-1">
                <div class="icon-wrapper bg-primary">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calculator-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
                  </svg>
                </div>
                <div class="feature-1-content">
                  <h2>Money Calculations</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                  <p><a href="#" class="btn btn-primary px-4 ">Learn More</a></p>
                </div>
              </div> 
            </div>

          </div>
        </div>
      </div>


      


      

      <!-- // 05 - Block -->
      <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 text-center mx-auto">
              <span class="caption text-white">Testimonials</span>
              <h2 class="title-with-line text-center mb-5 text-white">Happy Clients</h2>
            </div>
          </div>


          <div class="owl-slide owl-carousel owl-testimonial">

            <div class="ftco-testimonial-1">
              <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                <img src="{{asset('public/front/assets/images/person_1.jpg')}}" alt="Image" class="img-fluid mr-3">
                <div>
                  <h3>Allison Holmes</h3>
                  <span>Designer</span>
                </div>
              </div>
              <div>
                <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
              </div>
            </div>

            <div class="ftco-testimonial-1">
              <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                <img src="{{asset('public/front/assets/images/person_2.jpg')}}" alt="Image" class="img-fluid mr-3">
                <div>
                  <h3>Allison Holmes</h3>
                  <span>Designer</span>
                </div>
              </div>
              <div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
              </div>
            </div>

            <div class="ftco-testimonial-1">
              <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                <img src="{{asset('public/front/assets/images/person_4.jpg')}}" alt="Image" class="img-fluid mr-3">
                <div>
                  <h3>Allison Holmes</h3>
                  <span>Designer</span>
                </div>
              </div>
              <div>
                <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
              </div>
            </div>

            <div class="ftco-testimonial-1">
              <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                <img src="{{asset('public/front/assets/images/person_3.jpg')}}" alt="Image" class="img-fluid mr-3">
                <div>
                  <h3>Allison Holmes</h3>
                  <span>Designer</span>
                </div>
              </div>
              <div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
              </div>
            </div>

            <div class="ftco-testimonial-1">
              <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                <img src="{{asset('public/front/assets/images/person_2.jpg')}}" alt="Image" class="img-fluid mr-3">
                <div>
                  <h3>Allison Holmes</h3>
                  <span>Designer</span>
                </div>
              </div>
              <div>
                <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
              </div>
            </div>

            <div class="ftco-testimonial-1">
              <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                <img src="{{asset('public/front/assets/images/person_4.jpg')}}" alt="Image" class="img-fluid mr-3">
                <div>
                  <h3>Allison Holmes</h3>
                  <span>Designer</span>
                </div>
              </div>
              <div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
              </div>
            </div>

          </div>

        </div>
      </div>

      
      


      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <p class="mb-4"><img src="{{asset('public/front/assets/images/logo.jpeg')}}" alt="Image" class="img-fluid"></p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>  
              <p><a href="#">Learn More</a></p>
            </div>
            <div class="col-lg-3">
              <h3 class="footer-heading"><span>Solutions</span></h3>
              <ul class="list-unstyled">
                <li><a href="#">Investment Bonds</a></li>
                <li><a href="#">Financial Funds</a></li>
                <li><a href="#">Growth Business</a></li>
                <li><a href="#">Lifetime Support</a></li>
                <li><a href="#">Advanced Accounting</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
              <h3 class="footer-heading"><span>Services</span></h3>
              <ul class="list-unstyled">
                <li><a href="#">Investment Bonds</a></li>
                <li><a href="#">Financial Funds</a></li>
                <li><a href="#">Growth Business</a></li>
                <li><a href="#">Lifetime Support</a></li>
                <li><a href="#">Advanced Accounting</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Support Community</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Share Your Story</a></li>
                <li><a href="#">Our Supporters</a></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="copyright">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="icon-heart" aria-hidden="true"></i>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- .site-wrap -->


    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

    <script src="{{asset('public/front/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('public/front/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/bo/otstrap.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('public/front/assets/js/aos.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('public/front/assets/js/jquery.mb.YTPlayer.min.js')}}"></script>




    <script src="{{asset('public/front/assets/js/main.js')}}"></script>

  </body>

  </html>