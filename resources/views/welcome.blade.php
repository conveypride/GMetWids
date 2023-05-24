<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GmetWids') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    {{-- bootstrap icon --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- FontAwesome JS-->
  <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }} "></script>
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.0/mapbox-gl.js'></script>
     <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.0/mapbox-gl.css' rel='stylesheet' />
     {{-- <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.4/mapbox-gl-draw.js'></script> --}}
     {{-- <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.4/mapbox-gl-draw.css' type='text/css' /> --}}
     <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
     <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/index.css', 'resources/js/app.js', 'resources/js/index.js'])




</head>

<body>
  <!--View Advisories Modal -->
<div class="modal " id="viewAdvisoriesModel" tabindex="-1" >
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewAdvisoriesModelLabel"> Advisories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($addDailyForecast->textareaweatherwarning !== 'null')
     {{-- The variable is not empty --}}
 <h5> <strong> {{ $addDailyForecast->textareaweatherwarning}}</strong> </h5>
@else
     {{-- The variable is empty --}}
     {{ "No  Advisories yet...." }}
@endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

 <!--View warning model-->
 <div class="modal " id="viewWarningModel" tabindex="-1" >
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewWarningModelLabel"> Nowcasting Risk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($addDailyForecast->textareaweatherwarning !== 'null')
     {{-- The variable is not empty --}}
   <h5> <strong> {{ $addDailyForecast->textareaweatherwarning}}</strong> </h5> 
@else
     {{-- The variable is empty --}}
     {{ "No  Warning Summary given...." }}
@endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>











    {{-- icons animation --}}
    <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0">
        <defs>
            <radialGradient id="gradYellow" cx="50%" cy="50%" r="80%" fx="90%" fy="80%">
                <stop offset="0%" style="stop-color:yellow; stop-opacity:1" />
                <stop offset="100%" style="stop-color:orange ;stop-opacity:1" />
            </radialGradient>
            <radialGradient id="gradDarkGray" cx="50%" cy="50%" r="50%" fx="50%"
                fy="50%">
                <stop offset="0%" style="stop-color:white; stop-opacity:1" />
                <stop offset="70%" style="stop-color:gray; stop-opacity:1" />
                <stop offset="100%" style="stop-color:dimgray ;stop-opacity:1" />
            </radialGradient>
            <radialGradient id="gradGray" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                <stop offset="0%" style="stop-color:white; stop-opacity:1" />
                <stop offset="100%" style="stop-color:darkgray ;stop-opacity:1" />
            </radialGradient>
            <linearGradient id="gradWhite" x1="40%" y1="50%" x2="90%" y2="90%">
                <stop offset="0%" style="stop-color:white;stop-opacity:1" />
                <stop offset="100%" style="stop-color:darkgray;stop-opacity:1" />
            </linearGradient>
        </defs>

        <!-- Sun -->
        <symbol id="sun">
            <!-- center -->
            <circle cx="50" cy="50" r="20" fill="url(#gradYellow)" />

            <!-- long rays -->
            <line x1="50" y1="27" x2="50" y2="2" class="longRay" />
            <line x1="50" y1="73" x2="50" y2="98" class="longRay" />
            <line x1="27" y1="50" x2="2" y2="50" class="longRay" />
            <line x1="73" y1="50" x2="98" y2="50" class="longRay" />
            <line x1="34" y1="34" x2="16" y2="16" class="longRay" />
            <line x1="66" y1="66" x2="84" y2="84" class="longRay" />
            <line x1="34" y1="66" x2="16" y2="84" class="longRay" />
            <line x1="66" y1="34" x2="84" y2="16" class="longRay" />

            <!-- short rays -->
            <line x1="59" y1="29" x2="66" y2="13" class="shortRay" />
            <line x1="71" y1="42" x2="87" y2="35" class="shortRay" />
            <line x1="71" y1="58.5" x2="87" y2="65" class="shortRay" />
            <line x1="59" y1="71" x2="66" y2="87" class="shortRay" />
            <line x1="41" y1="71" x2="34" y2="87" class="shortRay" />
            <line x1="29.5" y1="58.5" x2="13" y2="66" class="shortRay" />
            <line x1="29" y1="42" x2="13" y2="35" class="shortRay" />
            <line x1="41" y1="29" x2="35" y2="13" class="shortRay" />
        </symbol>

        <!-- Moon -->
        <symbol id="moon">
            <path d="M60,20 A30,30 0 1,0 90,65 22,22 0 1,1 60,20z" fill="url(#gradYellow)" />
        </symbol>

        <!-- Star -->
        <symbol id="star">
            <polygon points="5,0 2,10 10,4 0,4 8,10" style="fill:url(#gradYellow);fill-rule:nonzero;" />
        </symbol>

        <!-- Small Gray Cloud -->
        <symbol id="grayCloud">
            <path d="M20,15 Q25,0 45,11 Q60,5 60,20 A30,15 5 1,1 20,15 Z" />
        </symbol>

        <!-- White Cloud -->
        <symbol id="whiteCloud">
            <path fill="url(#gradWhite)"
                d="M11,47 Q13,37 21,42 Q31,30 41,38 A28,21 -25 1,1 35,75 Q23,85 19,73 A12,12 0 0,1 11,47Z" />
        </symbol>

        <!-- Rain Drop -->
        <symbol id="rainDrop">
            <path fill="#06b6d1" d="M10 0 Q10,0 14,7 A5,5 0 1,1 6,7 Q10,0 10,0Z" />
        </symbol>

        <!-- Rain Drizzle -->
        <symbol id="rainDrizzle">
            <line x1="20" y1="2" x2="10" y2="40" />
        </symbol>

        <!-- Thunder Bolt -->
        <symbol id="thunderBolt">
            <path fill="black" d="M15,0 L1,23 L8,23 L0,40 L15,19 L8,19Z" />
        </symbol>

        <!-- Snow Flake -->
        <symbol id="snowFlake">
            <path d="M5,0 L5,10 M0,5 L10,5 M1.5,1.5 L8.5,8.5 M8.5,1.5 L1.5,8.5" />
            <path d="M3.5,0.25 L5,2 L6.5,0.25 M3.5,9.75 L5,8 L6.5,9.75" />
            <path d="M0.25,3.5 L2,5 L0.25,6.5 M9.75,3.5 L8,5 L9.75,6.5" />
            <path d="M0.75,2.90 L2.85,2.85 L2.90,0.75 M7.25,9.35 L7.15,7.15 L9.35,7.25" />
            <path d="M0.75,7.25 L2.85,7.15 L2.90,9.35 M7.15,0.75 L7.25,2.85 L9.35,2.90" />
        </symbol>

        <!-- Hail/Ice Pellet-->
        <symbol id="icePellet">
            <circle cx="4" cy="4" r="4" fill="#06b6d1" />
        </symbol>

        <!-- Mist -->
        <symbol id="mist">
            <path d="M5,34 L43,34" />
            <path d="M10,40 L40,40 Q51.5,40 50,35 T60,30 L80,30" />
            <path d="M15,45 L45,45 Q56.5,45 55,40 T65,35 L90,35" />
            <path d="M60,42 L85,42" />
        </symbol>

    </svg>


    {{-- <div class="spinner-grow spinner-grow-sm text-danger" role="status">
      <span class="visually-hidden">Loading...</span>
    </div> --}}
    <div class="mennu" id="mennu">
        <nav class="navbar navbar-light">
            {{-- <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-dark p-4">
        <h5 class="text-white h4">Collapsed content</h5>
        <span class="text-muted">Toggleable via the navbar brand.</span>
      </div>
    </div> --}}
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <div class="logo-details">
            <i class='bi bi-list '></i>
            <div class="logo_name">GMet</div>
            <i class='bi-x-circle iconn' id="btn"></i>
        </div>
        <ul class="navlist">
          <li class="btnicons active" data-target="home-content" id="home-btn">
              <a href="#">
                  <i class='bi bi-house'></i>
                  <span class="links_name">Home</span>
              </a>
              <span class="tooltip">Home</span>
          </li> 
          
            
            <li class="btnicons" data-target="weather-content" id="weather-btn">
                <a href="#">
                    <i class='bi bi-cloud-sun'></i>
                    <span class="links_name">Daily Forecast</span>
                </a>
                <span class="tooltip">Daily Forecast</span>
            </li>
            <li class="btnicons" data-target="day5-content">
              <a href="#">
                  <i class='bi bi-sun'></i>
                  <span class="links_name">5-Days-Forecast</span>
              </a>
              <span class="tooltip">5-Days-Forecast</span>
          </li>
          <li class="btnicons" data-target="districts-content"   id="cities-btn">
            <a href="#">
                <i class='bi bi-cursor'></i>
                <span class="links_name">Cities</span>
            </a>
            <span class="tooltip">Cities</span>
        </li>

 <li class="btnicons" data-target="seasonal-content" id="seasonal-btn">
                <a href="#">
                  <i class="bi bi-arrow-repeat"></i>
                    <span class="links_name">Seasonal Forecast</span>
                </a>
                <span class="tooltip">Seasonal Forecast</span>
            </li>
            
            <li class="btnicons" data-target="marine-content">
                <a href="#">
                    <i class='bi bi-water'></i>
                    <span class="links_name">Marine</span>
                </a>
                <span class="tooltip">Marine Forecast</span>
            </li>
          
           

            <li class="btnicons" data-target="feedback-content">
                <a href="#">
                    <i class='bi bi-chat'></i>
                    <span class="links_name">Feedback</span>
                </a>
                <span class="tooltip">Feedback</span>
            </li>
            
            <li class="profile">
                <div class="profile-details">
                    <!--<img src="profile.jpg" alt="profileImg">-->
                    <div class="name_job">
                        <div class="name">
                            <nav class="navbar navbar-bg-white shadow rounded-2 bg-light">
                                <div class=" container-fluid shadow  rounded-2">
                                   
                                            <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}">
                          <span class="navbar-brand text-center px-2"
                               style="font-weight:bold; color:rgb(0, 0, 0);background-color: #EAECEF">
                               {{ __('Login') }}</span>
                              </a>
                            
                        @endif
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                          <span class="navbar-brand text-center px-2"
                               style="font-weight:bold; color:rgb(0, 0, 0);background-color: #EAECEF">
                               {{ __('Register') }}</span></a>
                        @endif
                   @else
                   <a href="{{ route('login') }}">
                    <span class="navbar-brand text-center px-2"
                         style="font-weight:bold; color:rgb(0, 0, 0);background-color: #EAECEF">
                         {{ __('Login') }}</span>
                        </a>
                    {{--  <a href="{{ route('logout') }}">
                      <span class="navbar-brand text-center px-2"
                           style="font-weight:bold; color:rgb(0, 0, 0);background-color: #EAECEF">
                           {{ __('Logout') }}</span></a>  
                            --}}
                    @endguest



                                          
                                </div>
                            </nav>
                        </div>
                        <div class="job"><i class='bi bi-person' id="log_out"></i></div>
                    </div>
                </div>

            </li>
        </ul>
    </div>
    {{-- style="background-color: #E4E9F7" --}}
    {{-- bluegray: style="background-color: #EAECEF" --}}
    
    <section class="home-section">
        <div class="container-fluid my-3">

            <div class="tab-content" id="pills-tabContent">
              {{-- home content --}}
              <div class="content home-content">
{{-- top slider --}}
 
 
<div class="text-center">
{{-- <button class="btn btn-dark  d-block w-100" type="button">Request</button> --}}
.<div class="text-start"> 
  <div class="shadow-sm rounded">
    {{-- <h4 class="card-title text-center">GMet Weather Information Dissemination System</h4> --}}
    <p class="text-center">
<header class="d-block w-100">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item carousel-item2f active " style="background-image: url('{{ asset('images/Slider1.png') }}')">
        <div class="carousel-caption">
          <h5>...</h5>
          <p>...</p>
        </div>
      </div>
      <div class="carousel-item carousel-item2f" style="background-image: url('{{ asset('images/Slider2.png') }}')">
        <div class="carousel-caption">
          <h5>...</h5>
          <p>...</p>
        </div>
      </div>
      <div class="carousel-item carousel-item2f" style="background-image: url('{{ asset('images/Slider3.png') }}')">
        <div class="carousel-caption">
          <h5>...</h5>
          <p>...</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>
</p>
</div>
</div>
<!-- Page Content -->
<section class="py-5 bg-white">
 <!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->
  <h2 class="my-4">About WIDS
    {{-- <small>Secondary Text</small> --}}
  </h2>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="{{ asset('images/STAKEHOLDERS.png') }}" alt="">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">What is WIDS?</h3>
      <p>The Weather Information Dissemination System (WIDS) is a seed project of the Ghana Meteorology Agency (GMet).The project seeks to explore how to improve weather and climate information management in Ghana for effective service provision through the application of suitable Information Communication Technologies (ICTs).</p>
      <h3 class="my-3">Objectives</h3>
      <ul>
        <li>WIDS is designed to provide real-time and accurate weather/climate information to stakeholders.</li>
        <li>It aims at providing mobile USSD and web interface platforms to capture weather products such as forecasts, weather advisories and warnings to the public.</li>
         
      </ul>
    </div>

  </div>
  <!-- /.row -->

  <!-- WIDS Education Row -->
  <h3 class="my-4">WIDS Education</h3>

  <div class="row">

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="{{ asset('images/IMG_9507.JPG') }}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="{{ asset('images/IMG_9482.JPG') }}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="{{ asset('images/Agriculture.jpg') }}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="{{ asset('images/farmer.jpg') }}" alt="">
          </a>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

</section>
</div>
<hr>

               {{-- button slider --}}
                <div class="container text-center my-3">
                  <h5 class="font-weight-bold"> DAILY SOMETHING SOMETHING </h5>
                  <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel" class="carousel  carousel-dark  slide" data-bs-ride="carousel">
                      <div class="carousel-inner carousel-inner1" role="listbox">
                        <div class="carousel-item active carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (5).jpg') }}" class="img-fluid ">
                              </div>
                              <div class="card-img-overlay">Slide 1</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (6).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 2</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (7).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 3</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (8).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 4</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (9).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 5</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (10).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 6</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (11).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 7</div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (12).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 8</div>
                            </div>
                          </div>
                        </div>


                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (13).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 8</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (14).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 8</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (15).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 8</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (16).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 8</div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item carousel-item1">
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-img">
                                <img src="{{ asset('images/data (17).jpg') }}" class="img-fluid">
                              </div>
                              <div class="card-img-overlay">Slide 8</div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      </a>
                      <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      </a>
                    </div>
                  </div>		
                </div>
             </div>  {{-- end of home content --}}

             
                {{-- daily weather section --}}
                <div class="content weather-content">
                    <div class="row  g-2">
                        <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-8 col-xlg-8 ">
                            <div class="card " style="background-color:#F5F5F5">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body px-2 ">
                                    <div class="d-flex justify-content-around  mb-2">
                                        <div class="p-2 ">
                                          <div class="btn-group">
                                           <h1 class="fw-bold font-monospace">
                                               @if(!empty($district))
                                              {{-- The variable is not empty --}}
                                             {{ $district}}
                                         @else
                                            {{-- The variable is empty --}}
                                             {{ 'No Value' }}
                                         @endif 
                                            </h1>  <button class="btn  dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                            
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="defaultDropdown" style="overflow: hidden;
                                             overflow-y: scroll;
                                            max-height: 200px;"> 

                                            @forelse ($districts as $districtt)
                                            <li><a class="dropdown-item districted" districted={{ $districtt->districtname }} href="#">{{ $districtt->districtname }}</a></li>
                                            @empty
                                            <li><a class="dropdown-item" href="#">No Cities available</a></li>
                                            @endforelse
                                             
                                            </ul>
                                          </div>
                                            
                                            <p class="text-muted">Chance of rain: 
                                              @if(!empty($currentConditionRain))
                                              {{-- The variable is not empty --}}
                                             {{ $currentConditionRain}}
                                         @else
                                            {{-- The variable is empty --}}
                                             {{ 'No Value' }}
                                         @endif
                                         </p>
                                            {{-- temp --}}
                                            <h1 class="fw-bold" style="font-size: 50px;">
                                              @if(!empty($maxTemp))
                                              {{-- The variable is not empty --}}
                                             {{ $maxTemp}}°C
                                         @else
                                            {{-- The variable is empty --}}
                                             {{ 'No Value' }}
                                         @endif
                                            </h1>
                                            {{-- wind --}}
                                            <figure>
                                                <svg class="windsmicon wind" viewBox="0 0 100 100" id="wind">
                                                    <path id="wind1" d="M 8,37 L 35,37" />
                                                    <path id="wind2"
                                                        d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35" />
                                                    <path id="wind3"
                                                        d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41" />
                                                    <path id="wind4"
                                                        d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76" />
                                                    <path id="wind5" d="M 5,75 L 48,75" />
                                                </svg>
                                                
                                                <figcaption><small class="text-muted fw-bold">
                                                  
                                                  @if(!empty($wind))
                                                  {{-- The variable is not empty --}}
                                                 {{ $wind }}
                                             @else
                                                {{-- The variable is empty --}}
                                                 {{ 'No Value' }}
                                             @endif
                                                </small>
                                                @if ($winddir !== null || !empty($winddir))
                                                 @if ($winddir == 'SW' || $winddir == 'WS')
                                                  <i id="arrow-sw" class="bi bi-arrow-up-right-circle-fill active animation-sw"></i>

                                                     @elseif ($winddir == 'SE' || $winddir == 'ES')
                                                     <i id="arrow-se" class="bi bi-arrow-up-left-circle-fill active animation-se "></i>

                                                    @elseif ($winddir == 'NE' || $winddir == 'EN')
                                                    <i id="arrow-ne" class="bi bi-arrow-down-left-circle-fill active animation-ne "></i>

                                                    @elseif ($winddir == 'NW' || $winddir == 'WN')
                                                    <i id="arrow-nw" class="bi bi-arrow-down-right-circle-fill active animation-nw flush"></i>
                                                    
                                                    @elseif ($winddir == 'S')
                                                    <i id="arrow-s" class="bi bi-arrow-down-circle-fill  active animation-s"></i>
                                                    
                                                    @elseif ($winddir == 'N')
                                                    <i id="arrow-n" class="bi bi-arrow-up-circle-fill  active animation-n"></i>

                                                    @elseif ($winddir == 'E')
                                                    <i id="arrow-e" class="bi bi-arrow-right-circle-fill active animation-e"></i>

                                                    @elseif ($winddir == 'W')
                                                    <i id="arrow-w" class="bi bi-arrow-right-circle-fill active animation-w "></i>
                                                  @endif

                                                @else
                                                  {{  'no direction provided...' }}
                                                @endif
 </figcaption>
                                            </figure> 
                                        </div>
                                        <div class="p-2 "> 

                                          @if(!empty($weather))
                                                  {{-- The variable is not empty --}}
                                                 @if ($weather == 'SUNNY')
                                                    <!-- Sunny -->
                                            <figure> <figcaption class="text-center fw-bold">Sunny</figcaption>
                                              <svg class="bigicon" viewbox="0 0 100 100">
                                                  <use xlink:href="#sun" />
                                              </svg>  </figure>
                                                 @elseif($weather == '-TSRA')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
                                                   <svg class="bigicon" viewbox="0 0 100 100">
                                                   
                                                    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                                    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                                    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
                                                    <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                                  </svg>
                                                </figure>
                                                
                                                 @elseif($weather == 'TSRA')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
                                                   <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                                    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                                    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                                    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                                  </svg>
                                                </figure>
                                                 @elseif($weather == '+TSRA')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
                                                   <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                                    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                                    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                                    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                                    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                                    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                                  </svg>
                                                </figure>
                                                 @elseif($weather == '-RAINDAY')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
                                                 <svg class="bigicon" viewbox="0 0 100 100">
                                                   <use xlink:href="#sun" x="-12" y="-18"/>
                                                   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                                   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                                   <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                 </svg> 
                                               </figure>
                                                @elseif($weather == '-RAINNIGHT')
                                                <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
                                                 <svg class="bigicon" viewbox="0 0 100 100">
                                                  <use xlink:href="#moon" x="-20" y="-15"/>
                                                   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                                   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                                   <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                 </svg> 
                                               </figure>

                                                 @elseif($weather == 'RAINDAY')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
                                                 <svg class="bigicon" viewbox="0 0 100 100">
                                                   <use xlink:href="#sun" x="-12" y="-18"/>
                                                   
                                                   <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                                   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                                   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                                   <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                 </svg> 
                                               </figure>
                                                  @elseif($weather == 'RAINNIGHT')
                                                  <figure>
                                                    <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
                                                   <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#moon" x="-20" y="-15"/>
                                                  
                                                     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                                     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                                     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                                     <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                   </svg> 
                                                 </figure>


                                                 @elseif($weather == '+RAINDAY')
                                                
                                                 <figure>
                                                   <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun" x="-12" y="-18"/>
                                                    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                                    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                                    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                                    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                                    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                  </svg> 
                                                </figure>
                                                @elseif($weather == '+RAINNIGHT')
                                                
                                                <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
                                                 <svg class="bigicon" viewbox="0 0 100 100">
                                                  <use xlink:href="#moon" x="-20" y="-15"/>
                                                   <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                                   <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                                   <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                                   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                                   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                                   <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                 </svg> 
                                               </figure>



                                                 @elseif($weather == '-DRIZZLEDAY')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun" x="-12" y="-18"/>
                                                     <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg> 
                                                </figure>
                                                @elseif($weather == '-DRIZZLENIGHT')
                                                <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#moon" x="-20" y="-15"/>
                                                    <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg>
                                                </figure>

                                                 @elseif($weather == 'DRIZZLEDAY')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun" x="-12" y="-18"/>
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                                    <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg> 
                                                </figure>
                                                @elseif($weather == 'DRIZZLENIGHT')
                                                <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#moon" x="-20" y="-15"/>
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                                    <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                                    <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg>
                                                </figure>
             @elseif($weather == '+DRIZZLEDAY')
       <figure>
    <figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
    <svg class="bigicon" viewbox="0 0 100 100">
      <use xlink:href="#sun" x="-12" y="-18"/>
      <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
      <use xlink:href="#rainDrizzle" x="25" y="65"/>
      <use xlink:href="#rainDrizzle" x="30" y="65"/>
      <use xlink:href="#rainDrizzle" x="35" y="65"/>
      <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
      <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
      <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
      <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
      <use xlink:href="#rainDrizzle" x="40" y="65"/>
      <use xlink:href="#rainDrizzle" x="45" y="65"/>
      <use xlink:href="#whiteCloud" x="7" />
    </svg> 
  </figure>
  @elseif($weather == '+DRIZZLENIGHT')
  <figure>
    <figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
    <svg class="bigicon" viewbox="0 0 100 100">
      <use xlink:href="#moon" x="-20" y="-15"/>
      <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
      <use xlink:href="#rainDrizzle" x="25" y="65"/>
      <use xlink:href="#rainDrizzle" x="30" y="65"/>
      <use xlink:href="#rainDrizzle" x="35" y="65"/>
      <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
      <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
      <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
      <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
      <use xlink:href="#rainDrizzle" x="40" y="65"/>
      <use xlink:href="#rainDrizzle" x="45" y="65"/>
      <use xlink:href="#whiteCloud" x="7" />
    </svg>
  </figure>

                                                 
                                                 @elseif($weather == 'HAIL')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                                    <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
                                                    <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
                                                    <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
                                                    <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
                                                    <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                                  </svg>
                                                </figure>
                                              
                                                 @elseif($weather == 'MIST')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
                                                    <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                                    <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                                  </svg> 
                                                 </figure>
                                                 @elseif($weather == 'FOG') 
                                               <figure>  
                                                  <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
                                                    <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                                    <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                                  </svg> 
                                                 </figure>

                                                 @elseif($weather == 'HAZE') 
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
                                                  <svg class="icon wind" viewBox="0 0 100 100" id="wind">
                                                   
                                                    <path id="wind1" d="M 8,37 L 35,37"/>
                                                    <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
                                                    <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
                                                    <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
                                                    <path id="wind5" d="M 5,75 L 48,75"/>  
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                                    {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
                                                  </svg>
                                                </figure>


                                                 @elseif($weather == 'SUNNY BREAKS')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#whiteCloud" x="-7" y="-15"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                    <use xlink:href="#sun" x="-12" y="-18"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg> 
                                                </figure>
                                                 @elseif($weather == 'SUNNY INTERVALS')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun" x="-12" y="-18"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg>
                                                 
                                                </figure>
                                                 @elseif($weather == 'FEW CLOUDS')
                                               <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun" x="-12" y="-18"/>
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                                  </svg>
                                                 
                                                </figure>

                                                 @elseif($weather == 'PARTLY CLOUDY(DAY)')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun" x="-12" y="-18"/>
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg>
                                                </figure>
                                                 @elseif($weather == 'PARTLY CLOUDY(NIGHT)')
                                                 {{-- Partly Cloudy Night --}}
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#moon" x="-20" y="-15"/>
                                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                                    <use xlink:href="#whiteCloud" x="7" />
                                                  </svg>
                                                </figure>
                                                 @elseif($weather == 'CLOUDY')
                                                 <figure>
                                                  <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
                                                  <svg class="bigicon" viewbox="0 0 100 100">
                                                     <use xlink:href="#grayCloud" class="small-cloud"
                                                         fill="url(#gradGray)" />
                                                     <use xlink:href="#whiteCloud" x="7" />
                                                 </svg>
                                                 </figure>
                                                 @elseif($weather == 'CLEAR NIGHT')
                                                   <!-- Clear Night -->
  <figure> 
    <figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
    <svg class="bigicon" viewbox="0 0 100 100">
      <use xlink:href="#moon" x="-15"/>
      <use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
      <use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
      <use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
    </svg>
  </figure>
      @endif



                                             @else
                                                {{-- The variable is empty --}}
                                                 {{ 'No Value' }}
                                             @endif
                                           
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between bd-highlight mb-2">
                                      <div class="p-2 "> <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#viewAdvisoriesModel">View Advisories</button></div>
                                      <div class="p-2 "> </div>
                                      <div class="p-2 ">
                                        {{-- time --}}
                                        <h6 class="p-2 text-muted fw-bold text-end">
                                          @if(!empty($period))
                                          {{-- The variable is not empty --}}
                                         {{ $period}}
                                     @else
                                        {{-- The variable is empty --}}
                                         {{ 'No time' }}
                                     @endif
                                        </h6>
                                      </div>
                                    </div>
         
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong> Weather Summary:</strong>
  @if(!empty($addDailyForecast->summary))
     {{-- The variable is not empty --}}
    {{ $addDailyForecast->summary}}
@else
     {{-- The variable is empty --}}
     {{ "No Summary Available" }}
@endif
</div>

  
                                    {{-- current conditons --}}
<div class="card rounded-4 my-2" style="background-color: whitesmoke;">
  <div class="card-body">
    <h5 class="card-title text-muted fw-bold ">Current Condition </h5>
    <div class="d-flex justify-content-center bd-highlight mb-2 g-3">
      
      <div class="col mx-2">
        <div class="card rounded-4" style="background-color: #EAECEF;"> 
          <div class="card-body">
            <h5 class="card-title text-muted fw-bold"><i class="bi bi-moisture"></i> Humidity</h5>
            <h5 class="text-dark fw-bold text-center"> 
               @if(!empty($currentConditionRH))
               {{-- The variable is not empty --}}
              {{ $currentConditionRH}}
          @else
             {{-- The variable is empty --}}
              {{ 'No RH' }}
          @endif
              
            </h5>
          </div>
        </div>
      </div>
      <div class="col mx-2">
        <div class="card rounded-4" style="background-color: #EAECEF;"> 
          <div class="card-body">
            <h5 class="card-title text-muted fw-bold"><i class="bi bi-heat"></i>Min - Max Temp. </h5>
            <h5 class="text-dark fw-bold text-center"> 
               @if(!empty($maxTemp) || !empty($maxTemp))
               {{-- The variable is not empty --}}
               {{$minTemp}}°C - {{$maxTemp}}°C
          @else
             {{-- The variable is empty --}}
              {{ 'No Value' }}
          @endif
              
            </h5>
          </div>
        </div>
      </div>
      </div>
      <div class="d-flex justify-content-center bd-highlight mb-2 g-3">
      <div class="col mx-2">
        <div class="card rounded-4" style="background-color: #EAECEF;"> 
          <div class="card-body">
            <h5 class="card-title text-muted fw-bold"><i class="bi bi-droplet-half"></i> Rain</h5>
            <h5 class="text-dark fw-bold text-center">
                @if(!empty($currentConditionRain))
               {{-- The variable is not empty --}}
              {{ $currentConditionRain}}
          @else
             {{-- The variable is empty --}}
              {{ 'No Value' }}
          @endif
            </h5>
          </div>
        </div>
      </div>
      <div class="col mx-2">
        <div class="card rounded-4" style="background-color: #EAECEF;"> 
          <div class="card-body">
            <h5 class="card-title text-muted fw-bold"><i class="bi bi-bezier2"></i> ITD</h5>
            <h5 class="text-dark fw-bold text-center"> 
              @if(!empty($currentConditionItd))
               {{-- The variable is not empty --}}
              {{ $currentConditionItd }}
          @else
             {{-- The variable is empty --}}
              {{ 'No ITD' }}
          @endif
            </h5>
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</div>
                                    {{-- 24hrs foreast --}}
                                    <div class="card rounded-4 " style="background-color: #EAECEF">
                                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                        <div class="card-body">
                                          <h5 class="card-title text-muted fw-bold ">24Hrs Forecast </h5>
                                            <div class="d-flex justify-content-center bd-highlight mb-2">
                                                {{-- morning --}}
                                                <div class="col  px-2">
                                                    <p class="card-text"><small class="text-muted"> Morning(12:00am -
                                                            11:59am)
                                                        </small></p>
                                                       
                                                        
                                          @if(!empty($weatherM))
                                          {{-- The variable is not empty --}}
                                         @if ($weatherM == 'SUNNY')
                                            <!-- Sunny -->
                                    <figure> 
                                      <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#sun" />
                                      </svg> 
                                      <figcaption class="text-center fw-bold">Sunny</figcaption>
                                    </figure>
                                         @elseif($weatherM == '-TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
                                        </figure>
                                        
                                         @elseif($weatherM == 'TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherM == '+TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherM == '-RAINDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
                                       </figure>
                                        @elseif($weatherM == '-RAINNIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
                                       </figure>

                                         @elseif($weatherM == 'RAINDAY')
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
                                       </figure>
                                          @elseif($weatherM == 'RAINNIGHT')
                                          <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                             <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                             <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                             <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                           </svg> 
                                           <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
                                         </figure>


                                         @elseif($weatherM == '+RAINDAY')
                                        
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
                                        </figure>
                                        @elseif($weatherM == '+RAINNIGHT')
                                        
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                           <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
                                       </figure>



                                         @elseif($weatherM == '-DRIZZLEDAY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                             <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherM == '-DRIZZLENIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
                                        </figure>

                                         @elseif($weatherM == 'DRIZZLEDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherM == 'DRIZZLENIGHT')
                                        <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
                                        </figure>
     @elseif($weatherM == '+DRIZZLEDAY')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
</figure>
@elseif($weatherM == '+DRIZZLENIGHT')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
</figure>

                                         
                                         @elseif($weatherM == 'HAIL')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
                                            <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
                                            <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
                                            <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
                                        </figure>
                                      
                                         @elseif($weatherM == 'MIST')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
                                         </figure>
                                         @elseif($weatherM == 'FOG') 
                                       <figure>  
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
                                         </figure>

                                         @elseif($weatherM == 'HAZE') 
                                         <figure>
                                         <svg class="icon wind" viewBox="0 0 100 100" id="wind">
                                           <path id="wind1" d="M 8,37 L 35,37"/>
                                            <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
                                            <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
                                            <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
                                            <path id="wind5" d="M 5,75 L 48,75"/>  
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
                                        </figure>


                                         @elseif($weatherM == 'SUNNY BREAKS')
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#whiteCloud" x="-7" y="-15"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
                                        </figure>
                                         @elseif($weatherM == 'SUNNY INTERVALS')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
                                        </figure>
                                         @elseif($weatherM == 'FEW CLOUDS')
                                       <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
                                        </figure>

                                         @elseif($weatherM == 'PARTLY CLOUDY(DAY)')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
                                        </figure>
                                         @elseif($weatherM == 'PARTLY CLOUDY(NIGHT)')
                                         {{-- Partly Cloudy Night --}}
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
                                        </figure>
                                         @elseif($weatherM == 'CLOUDY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                             <use xlink:href="#grayCloud" class="small-cloud"
                                                 fill="url(#gradGray)" />
                                             <use xlink:href="#whiteCloud" x="7" />
                                         </svg>
                                         <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
                                         </figure>
                                         @elseif($weatherM == 'CLEAR NIGHT')
                                           <!-- Clear Night -->
<figure> 
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
</figure>
@endif

     @else
             {{-- The variable is empty --}}
        {{ 'No Value' }}
          @endif
   <h5 class="fw-bold text-center">
               @if(!empty($maxTempM) || !empty($maxTempM))
                   {{-- The variable is not empty --}}
                  {{$minTempM}}°C - {{$maxTempM}}°C
           @else
                   {{-- The variable is empty --}}
         {{ 'No Value' }}
                  @endif
        </h5>
                                                    <figure>
                                                        <svg class="hrs24iconwind wind" viewBox="0 0 100 100"
                                                            id="wind">
                                                            <path id="wind1" d="M 8,37 L 35,37" />
                                                            <path id="wind2"
                                                                d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35" />
                                                            <path id="wind3"
                                                                d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41" />
                                                            <path id="wind4"
                                                                d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76" />
                                                            <path id="wind5" d="M 5,75 L 48,75" />
                                                        </svg>
                                                        <figcaption><small class="text-muted fw-bold">Wind
                                                           @if(!empty($windM))
                                                          {{-- The variable is not empty --}}
                                                         {{($windM )}}
                                                     @else
                                                        {{-- The variable is empty --}}
                                                         {{ 'No Value' }}
                                                     @endif
                                                        
                                                          
                                                          </small>
                                                          @if ($winddirM !== null || !empty($winddirM))
                                                          @if ($winddirM == 'SW' || $winddirM == 'WS')
                                                           <i id="arrow-sw" class="bi bi-arrow-up-right-circle-fill active animation-sw"></i>
         
                                                              @elseif ($winddirM == 'SE' || $winddirM == 'ES')
                                                              <i id="arrow-se" class="bi bi-arrow-up-left-circle-fill active animation-se "></i>
         
                                                             @elseif ($winddirM == 'NE' || $winddirM == 'EN')
                                                             <i id="arrow-ne" class="bi bi-arrow-down-left-circle-fill active animation-ne "></i>
         
                                                             @elseif ($winddirM == 'NW' || $winddirM == 'WN')
                                                             <i id="arrow-nw" class="bi bi-arrow-down-right-circle-fill active animation-nw"></i>
                                                             
                                                             @elseif ($winddirM == 'S')
                                                             <i id="arrow-s" class="bi bi-arrow-down-circle-fill  active animation-s"></i>
                                                             
                                                             @elseif ($winddirM == 'N')
                                                             <i id="arrow-n" class="bi bi-arrow-up-circle-fill  active animation-n"></i>
         
                                                             @elseif ($winddirM == 'E')
                                                             <i id="arrow-e" class="bi bi-arrow-right-circle-fill active animation-e"></i>
         
                                                             @elseif ($winddirM == 'W')
                                                             <i id="arrow-w" class="bi bi-arrow-right-circle-fill active animation-w "></i>
                                                           @endif
         
                                                         @else
                                                           {{  'no direction provided...' }}
                                                         @endif
                                                        
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="vr"></div>
                                                <div class="col  px-2">
                                                  {{-- afternoon --}}
                                                  <p class="card-text"><small class="text-muted">Afternoon(12:00pm -
                                                    5:59pm)
                                                </small></p>
                                                                
                                          @if(!empty($weatherA))
                                          {{-- The variable is not empty --}}
                                         @if ($weatherA == 'SUNNY')
                                            <!-- Sunny -->
                                    <figure> 
                                      <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#sun" />
                                      </svg> 
                                      <figcaption class="text-center fw-bold">Sunny</figcaption>
                                    </figure>
                                         @elseif($weatherA == '-TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
                                        </figure>
                                        
                                         @elseif($weatherA == 'TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherA == '+TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherA == '-RAINDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
                                       </figure>
                                        @elseif($weatherA == '-RAINNIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
                                       </figure>

                                         @elseif($weatherA == 'RAINDAY')
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
                                       </figure>
                                          @elseif($weatherA == 'RAINNIGHT')
                                          <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                             <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                             <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                             <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                           </svg> 
                                           <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
                                         </figure>


                                         @elseif($weatherA == '+RAINDAY')
                                        
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
                                        </figure>
                                        @elseif($weatherA == '+RAINNIGHT')
                                        
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                           <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
                                       </figure>



                                         @elseif($weatherA == '-DRIZZLEDAY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                             <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherA == '-DRIZZLENIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
                                        </figure>

                                         @elseif($weatherA == 'DRIZZLEDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherA == 'DRIZZLENIGHT')
                                        <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
                                        </figure>
     @elseif($weatherA == '+DRIZZLEDAY')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
</figure>
@elseif($weatherA == '+DRIZZLENIGHT')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
</figure>

                                         
                                         @elseif($weatherA == 'HAIL')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
                                            <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
                                            <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
                                            <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
                                        </figure>
                                      
                                         @elseif($weatherA == 'MIST')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
                                         </figure>
                                         @elseif($weatherA == 'FOG') 
                                       <figure>  
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
                                         </figure>

                                         @elseif($weatherA == 'HAZE') 
                                         <figure>
                                         <svg class="icon wind" viewBox="0 0 100 100" id="wind">
                                           <path id="wind1" d="M 8,37 L 35,37"/>
                                            <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
                                            <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
                                            <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
                                            <path id="wind5" d="M 5,75 L 48,75"/>  
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
                                        </figure>


                                         @elseif($weatherA == 'SUNNY BREAKS')
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#whiteCloud" x="-7" y="-15"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
                                        </figure>
                                         @elseif($weatherA == 'SUNNY INTERVALS')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
                                        </figure>
                                         @elseif($weatherA == 'FEW CLOUDS')
                                       <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
                                        </figure>

                                         @elseif($weatherA == 'PARTLY CLOUDY(DAY)')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
                                        </figure>
                                         @elseif($weatherA == 'PARTLY CLOUDY(NIGHT)')
                                         {{-- Partly Cloudy Night --}}
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
                                        </figure>
                                         @elseif($weatherA == 'CLOUDY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                             <use xlink:href="#grayCloud" class="small-cloud"
                                                 fill="url(#gradGray)" />
                                             <use xlink:href="#whiteCloud" x="7" />
                                         </svg>
                                         <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
                                         </figure>
                                         @elseif($weatherA == 'CLEAR NIGHT')
                                           <!-- Clear Night -->
<figure> 
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
</figure>
@endif

     @else
             {{-- The variable is empty --}}
        {{ 'No Value' }}
          @endif
                                                

                                            <h5 class="fw-bold text-center">
                                              @if(!empty($maxTempA) || !empty($maxTempA))
                                              {{-- The variable is not empty --}}
                                             {{$minTempA}}°C - {{$maxTempA}}°C
                                      @else
                                              {{-- The variable is empty --}}
                                    {{ 'No Value' }}
                                             @endif
                                            </h5>
                                            <figure>
                                                <svg class="hrs24iconwind wind" viewBox="0 0 100 100"
                                                    id="wind">
                                                    <path id="wind1" d="M 8,37 L 35,37" />
                                                    <path id="wind2"
                                                        d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35" />
                                                    <path id="wind3"
                                                        d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41" />
                                                    <path id="wind4"
                                                        d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76" />
                                                    <path id="wind5" d="M 5,75 L 48,75" />
                                                </svg>
                                                <figcaption> 
                                                  <small class="text-muted fw-bold">
                                                  
                                                    Wind
                                                           @if(!empty($windA))
                                                          {{-- The variable is not empty --}}
                                                         {{($windA)}}
                                                     @else
                                                        {{-- The variable is empty --}}
                                                         {{ 'No Value' }}
                                                     @endif
                                                        
                                                    </small>
                                                    @if ($winddirA !== null || !empty($winddirA))
                                                    @if ($winddirA == 'SW' || $winddirA == 'WS')
                                                     <i id="arrow-sw" class="bi bi-arrow-up-right-circle-fill active animation-sw"></i>
   
                                                        @elseif ($winddirA == 'SE' || $winddirA == 'ES')
                                                        <i id="arrow-se" class="bi bi-arrow-up-left-circle-fill active animation-se "></i>
   
                                                       @elseif ($winddirA == 'NE' || $winddirA == 'EN')
                                                       <i id="arrow-ne" class="bi bi-arrow-down-left-circle-fill active animation-ne "></i>
   
                                                       @elseif ($winddirA == 'NW' || $winddirA == 'WN')
                                                       <i id="arrow-nw" class="bi bi-arrow-down-right-circle-fill active animation-nw"></i>
                                                       
                                                       @elseif ($winddirA == 'S')
                                                       <i id="arrow-s" class="bi bi-arrow-down-circle-fill  active animation-s"></i>
                                                       
                                                       @elseif ($winddirA == 'N')
                                                       <i id="arrow-n" class="bi bi-arrow-up-circle-fill  active animation-n"></i>
   
                                                       @elseif ($winddirA == 'E')
                                                       <i id="arrow-e" class="bi bi-arrow-right-circle-fill active animation-e"></i>
   
                                                       @elseif ($winddirA == 'W')
                                                       <i id="arrow-w" class="bi bi-arrow-right-circle-fill active animation-w "></i>
                                                     @endif
   
                                                   @else
                                                     {{  'no direction provided...' }}
                                                   @endif
                                                  
                                                  </figcaption>
                                            </figure>
                                                </div>
                                                <div class="vr"></div>
                                                <div class="col px-2">
                                                  <p class="card-text"><small class="text-muted"> Evening(6:00pm -
                                                    11:59pm)
                                                </small></p>
                                             
                                                                
                                          @if(!empty($weatherE))
                                          {{-- The variable is not empty --}}
                                         @if ($weatherE == 'SUNNY')
                                            <!-- Sunny -->
                                    <figure> 
                                      <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#sun" />
                                      </svg> 
                                      <figcaption class="text-center fw-bold">Sunny</figcaption>
                                    </figure>
                                         @elseif($weatherE == '-TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
                                        </figure>
                                        
                                         @elseif($weatherE == 'TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherE == '+TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherE == '-RAINDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
                                       </figure>
                                        @elseif($weatherE == '-RAINNIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
                                       </figure>

                                         @elseif($weatherE == 'RAINDAY')
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
                                       </figure>
                                          @elseif($weatherE == 'RAINNIGHT')
                                          <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                             <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                             <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                             <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                           </svg> 
                                           <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
                                         </figure>


                                         @elseif($weatherE == '+RAINDAY')
                                        
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
                                        </figure>
                                        @elseif($weatherE == '+RAINNIGHT')
                                        
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                           <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
                                       </figure>



                                         @elseif($weatherE == '-DRIZZLEDAY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                             <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherE == '-DRIZZLENIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
                                        </figure>

                                         @elseif($weatherE == 'DRIZZLEDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherE == 'DRIZZLENIGHT')
                                        <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
                                        </figure>
     @elseif($weatherE == '+DRIZZLEDAY')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
</figure>
@elseif($weatherE == '+DRIZZLENIGHT')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
</figure>

                                         
                                         @elseif($weatherE == 'HAIL')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
                                            <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
                                            <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
                                            <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
                                        </figure>
                                      
                                         @elseif($weatherE == 'MIST')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
                                         </figure>
                                         @elseif($weatherE == 'FOG') 
                                       <figure>  
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
                                         </figure>

                                         @elseif($weatherE == 'HAZE') 
                                         <figure>
                                         <svg class="icon wind" viewBox="0 0 100 100" id="wind">
                                           <path id="wind1" d="M 8,37 L 35,37"/>
                                            <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
                                            <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
                                            <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
                                            <path id="wind5" d="M 5,75 L 48,75"/>  
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
                                        </figure>


                                         @elseif($weatherE == 'SUNNY BREAKS')
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#whiteCloud" x="-7" y="-15"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'SUNNY INTERVALS')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'FEW CLOUDS')
                                       <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
                                        </figure>

                                         @elseif($weatherE == 'PARTLY CLOUDY(DAY)')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'PARTLY CLOUDY(NIGHT)')
                                         {{-- Partly Cloudy Night --}}
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'CLOUDY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                             <use xlink:href="#grayCloud" class="small-cloud"
                                                 fill="url(#gradGray)" />
                                             <use xlink:href="#whiteCloud" x="7" />
                                         </svg>
                                         <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
                                         </figure>
                                         @elseif($weatherE == 'CLEAR NIGHT')
                                           <!-- Clear Night -->
<figure> 
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
</figure>
@endif

     @else
             {{-- The variable is empty --}}
        {{ 'No Value' }}
          @endif
                                            <h5 class="fw-bold text-center">
                                              @if(!empty($maxTempE) || !empty($maxTempE))
                                              {{-- The variable is not empty --}}
                                             {{$minTempE}}°C - {{$maxTempE}}°C
                                      @else
                                              {{-- The variable is empty --}}
                                    {{ 'No Value' }}
                                             @endif
                                            </h5>
                                            <figure>
                                                <svg class="hrs24iconwind wind" viewBox="0 0 100 100"
                                                    id="wind">
                                                    <path id="wind1" d="M 8,37 L 35,37" />
                                                    <path id="wind2"
                                                        d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35" />
                                                    <path id="wind3"
                                                        d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41" />
                                                    <path id="wind4"
                                                        d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76" />
                                                    <path id="wind5" d="M 5,75 L 48,75" />
                                                </svg>
                                                <figcaption><small class="text-muted fw-bold">
                                                  Wind
                                                           @if(!empty($windE))
                                                          {{-- The variable is not empty --}}
                                                         {{($windE)}}
                                                     @else
                                                        {{-- The variable is empty --}}
                                                         {{ 'No Value' }}
                                                     @endif
                                                        
                                                
                                                </small>
                                                @if ($winddirE !== null || !empty($winddirE))
                                                @if ($winddirE == 'SW' || $winddirE == 'WS')
                                                 <i id="arrow-sw" class="bi bi-arrow-up-right-circle-fill active animation-sw"></i>

                                                    @elseif ($winddirE == 'SE' || $winddirE == 'ES')
                                                    <i id="arrow-se" class="bi bi-arrow-up-left-circle-fill active animation-se "></i>

                                                   @elseif ($winddirE == 'NE' || $winddirE == 'EN')
                                                   <i id="arrow-ne" class="bi bi-arrow-down-left-circle-fill active animation-ne "></i>

                                                   @elseif ($winddirE == 'NW' || $winddirE == 'WN')
                                                   <i id="arrow-nw" class="bi bi-arrow-down-right-circle-fill active animation-nw"></i>
                                                   
                                                   @elseif ($winddirE == 'S')
                                                   <i id="arrow-s" class="bi bi-arrow-down-circle-fill  active animation-s"></i>
                                                   
                                                   @elseif ($winddirE == 'N')
                                                   <i id="arrow-n" class="bi bi-arrow-up-circle-fill  active animation-n"></i>

                                                   @elseif ($winddirE == 'E')
                                                   <i id="arrow-e" class="bi bi-arrow-right-circle-fill active animation-e"></i>

                                                   @elseif ($winddirE == 'W')
                                                   <i id="arrow-w" class="bi bi-arrow-right-circle-fill active animation-w "></i>
                                                 @endif

                                               @else
                                                 {{  'no direction provided...' }}
                                               @endif
                                              
                                              </figcaption>
                                            </figure>

                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{-- dailyforecast --}}
                        <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-4 col-xlg-4">
@if ($addDailyForecast->warningtype == 'null')
<div class="card rounded-4 bg-white text-dark btn" > 
  <div class="card-body">
    <h5 class="card-title text-dark fw-bold"> Warning</h5>
    <h5 class="text-dark fw-bold text-center">No Impact </h5>
  </div>
</div>
@elseif($addDailyForecast->warningtype == 'Low Risk')
<div class="card rounded-4 bg-success text-white btn"  data-bs-toggle="modal" data-bs-target="#viewWarningModel" > 
  <div class="card-body">
    <h5 class="card-title text-white fw-bold"><div class="spinner-grow spinner-grow-sm text-white" role="status">
      <span class="visually-hidden">Loading...</span>
    </div> Warning</h5>
    <h5 class="text-white fw-bold text-center">Impact: Low Risk</h5>
  </div>
</div>

@elseif($addDailyForecast->warningtype == 'Be Aware')
<div class="card rounded-4 text-dark btn"  data-bs-toggle="modal" data-bs-target="#viewWarningModel" style=" background-color: yellow;"> 
  <div class="card-body">
    <h5 class="card-title text-dark fw-bold"><div class="spinner-grow spinner-grow-sm text-dark" role="status">
      <span class="visually-hidden">Loading...</span>
    </div> Warning</h5>
    <h5 class="text-dark fw-bold text-center">Impact: Be Aware </h5>
  </div>
</div>

@elseif($addDailyForecast->warningtype == 'Be Prepared')
<div class="card rounded-4  text-white btn"  data-bs-toggle="modal" data-bs-target="#viewWarningModel" style=" background-color: orange;" > 
  <div class="card-body">
    <h5 class="card-title text-white fw-bold"><div class="spinner-grow spinner-grow-sm text-white" role="status">
      <span class="visually-hidden">Loading...</span>
    </div> Warning</h5>
    <h5 class="text-white fw-bold text-center">Impact: Be Prepared</h5>
  </div>
</div>

@elseif($addDailyForecast->warningtype == 'Take Action')
<div class="card rounded-4 bg-danger text-white btn"  data-bs-toggle="modal" data-bs-target="#viewWarningModel"> 
  <div class="card-body">
    <h5 class="card-title text-white fw-bold"><div class="spinner-grow spinner-grow-sm text-white" role="status">
      <span class="visually-hidden">Loading...</span>
    </div> Warning</h5>
    <h5 class="text-white fw-bold text-center">Impact: Take Action</h5>
  </div>
</div>
@else
<div></div>

@endif



                          
                          <br>
                          {{-- map --}} 
                           <h4 class="fw-bold font-monospace text-center"> 
                           {{   $time }} Map
                            </h4>
                          <div class="card text-center">
                           <div id="map" 
                           style=" width: auto; 
                           height: 300px;">
                           </div> 
                         </div>
                         <br>


    {{-- weather icons --}}
    <table class="table table-bordered caption-top">
      <caption class="fw-bold">  Weather icons</caption>
      <thead>
        <tr>
          <th class="text-center" style="background-color:white">
            <i class="bi bi-cloud-drizzle-fill fs-5"></i>
            Rain</th>
          <th class="text-center" style="background-color: white"> 
            <i class="bi bi-wind fs-5"></i> 
            Wind
          </th>
          <th  class="text-center" style="background-color: white">
            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35"><symbol id="a" viewBox="0 0 342 234"><path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/></symbol><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/></svg>
          Dust</th>
          <th class="text-center" style="background-color: white">
            <i class="bi bi-cloud-hail-fill fs-5"></i>
          Hail</th>
          {{-- <th class="text-center" style="background-color: white">No Risk</th> --}}
        </tr>
      </thead>
     
    </table>


                         <hr>
   {{--  Nowcast Risk--}}
   <table class="table table-bordered caption-top">
    <caption class="fw-bold"> Nowcast Risk</caption>
    <thead>
      <tr>
        <th class="text-center" style="background-color:#ff0000">Take Action</th>
        <th class="text-center" style="background-color: #eda411">Be Prepared</th>
        <th  class="text-center" style="background-color: #e9f542">Be Aware</th>
        <th class="text-center" style="background-color: #4ca64c">Low Risk</th>
        <th class="text-center" style="background-color: white">No Risk</th>
      </tr>
    </thead>
   
  </table>
   {{-- Weather Forecasting Risk Table--}}
   <hr>
    <div class="row">
<div class="col-1">
  <div class="row" style="min-height: 230px;">
    <div class="col d-flex flex-column justify-content-center fw-bold">
      <p class="text-center fw-bold my-5 mx-2">  <i class="bi bi-arrow-up text-center fw-bold  text-success fs-4" style="min-height: 115px;"></i></p> 
      <p class="text-center fw-bold p-1 verticaltext">Likelihood</p> 
    </div>

    <div class="col d-flex flex-column justify-content-center">
      
    </div>

  </div>
</div>

<div class="col">
  <table class="table table-bordered caption-top">
    <caption class="fw-bold"> Weather Forecasting Risk Table</caption>
<thead>
    <th>High(>60%) </th>
    <th class="text-center" style="background-color: #e9f542">G</th>
    <th class="text-center" style="background-color: #eda411">H</th>
    <th class="text-center" style="background-color:#ff0000">I</th>
  </tr>
</thead>
<tbody>
  <thead>
    <th>Medium(40% - 60%)</th>
    <th class="text-center" style="background-color: #4ca64c">D</th>
    <th  class="text-center" style="background-color: #e9f542">E</th>
    <th class="text-center" style="background-color: #eda411">F</th>
  </thead>
  <thead>
    <th>Low(<40%)</th>
    <th class="text-center" style="background-color: #4ca64c">A</th>
    <th class="text-center" style="background-color: #4ca64c">B</th>
    <th  class="text-center" style="background-color: #e9f542">C</th>
  </thead>
  <thead>
    <th></th>
    <th>Low</th>
    <th>Medium</th>
    <th>High</th>
  </thead>
  <thead>
    <th colspan="4">
      <p class="text-center fw-bold m-0 p-0"><i class="text-center fw-bold bi bi-arrow-right text-success fs-4" style="width: 12em;"></i> </p>
      <p class="text-center fw-bold m-0 p-0"> Impact </p>
    </th>
    
  </thead>
</tbody>
</table>
</div>
    </div>
    
  {{-- </div> --}}



    </div>
                    </div>
                </div>
               
                <div class="content day5-content ">
                  <div class="mb-3">
                    {{-- <label for="selectDistric" class="form-label fw-bold fs-2">Select District</label>  --}}
                  {{-- <select class="form-select form-select-lg" id="selectDistric" aria-label="Small select">
                    <option selected="">Accra</option>
                    <option value="1">Another District </option>
                    <option value="2">Another District</option>
                    <option value="3">Another District</option>
                    <option value="3">Another District</option>
                    <option value="3">Another District</option>
                    <option value="3">Another District</option>
                    <option value="3">Another District</option>
                    <option value="3">Another District</option>
                    <option value="3">Another District</option>
                  </select> --}}
                 </div> 
                 <div class="card rounded-2 h-100" style="background-color: #EAECEF">
                                
                    <div class="card-body">
          <h5 class="text-muted fw-bold font-monospace">5-Days-Forecast</h5>
  {{--  today--}}
  @forelse ($fivedayforecasts as $fivedayforecast )
    
 <div class="card" style="border-radius: 20px;">
  <div class="card-body">
    <div class="d-flex">
      <div class="col-4 align-self-start">
        <h3 class="card-title text-left text-dark fw-bold fs-3">
         {{ \Carbon\Carbon::parse($fivedayforecast->date)->format('l') }}
       </h3> 
      </div>
      <div class="col-4">
        @if(!empty($fivedayforecast->weather))
        {{-- The variable is not empty --}}
       @if ($fivedayforecast->weather == 'SUNNY')
          <!-- Sunny -->
     <figure> <figcaption class="text-center fw-bold">Sunny</figcaption>
     <svg class="icon5day" viewbox="0 0 100 100">
        <use xlink:href="#sun" />
     </svg>  </figure>
       @elseif($fivedayforecast->weather == '-TSRA')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
         <svg class="icon5day" viewbox="0 0 100 100">
         
          <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
          <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
        </svg>
      </figure>
      
       @elseif($fivedayforecast->weather == 'TSRA')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
         <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
          <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == '+TSRA')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
         <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
          <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
          <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
          <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == '-RAINDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
       <svg class="icon5day" viewbox="0 0 100 100">
         <use xlink:href="#sun" x="-12" y="-18"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
      @elseif($fivedayforecast->weather == '-RAINNIGHT')
      <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
       <svg class="icon5day" viewbox="0 0 100 100">
        <use xlink:href="#moon" x="-20" y="-15"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
     
       @elseif($fivedayforecast->weather == 'RAINDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
       <svg class="icon5day" viewbox="0 0 100 100">
         <use xlink:href="#sun" x="-12" y="-18"/>
         
         <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
        @elseif($fivedayforecast->weather == 'RAINNIGHT')
        <figure>
          <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
         <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
        
           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
       </figure>
     
     
       @elseif($fivedayforecast->weather == '+RAINDAY')
      
       <figure>
         <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
          <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
          <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
        </svg> 
      </figure>
      @elseif($fivedayforecast->weather == '+RAINNIGHT')
      
      <figure>
        <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
       <svg class="icon5day" viewbox="0 0 100 100">
        <use xlink:href="#moon" x="-20" y="-15"/>
         <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
         <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
         <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
     
     
     
       @elseif($fivedayforecast->weather == '-DRIZZLEDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
           <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg> 
      </figure>
      @elseif($fivedayforecast->weather == '-DRIZZLENIGHT')
      <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
          <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
     
       @elseif($fivedayforecast->weather == 'DRIZZLEDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg> 
      </figure>
      @elseif($fivedayforecast->weather == 'DRIZZLENIGHT')
      <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
     @elseif($fivedayforecast->weather == '+DRIZZLEDAY')
     <figure>
     <figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
     <svg class="icon5day" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="25" y="65"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
     </svg> 
     </figure>
     @elseif($fivedayforecast->weather == '+DRIZZLENIGHT')
     <figure>
     <figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
     <svg class="icon5day" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="25" y="65"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
     </svg>
     </figure>
     
       
       @elseif($fivedayforecast->weather == 'HAIL')
       <figure>
        <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
          <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
          <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
          <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
        </svg>
      </figure>
     
       @elseif($fivedayforecast->weather == 'MIST')
       <figure>
        <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
          <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
          <use id="mist" xlink:href="#mist" x="0" y="30"/>
        </svg> 
       </figure>
       @elseif($fivedayforecast->weather == 'FOG') 
     <figure>  
        <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
          <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
          <use id="mist" xlink:href="#mist" x="0" y="30"/>
        </svg> 
       </figure>
     
       @elseif($fivedayforecast->weather == 'HAZE') 
       <figure>
        <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
        <svg class="icon5day wind" viewBox="0 0 100 100" id="wind">
         
          <path id="wind1" d="M 8,37 L 35,37"/>
          <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
          <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
          <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
          <path id="wind5" d="M 5,75 L 48,75"/>  
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
        </svg>
      </figure>
     
     
       @elseif($fivedayforecast->weather == 'SUNNY BREAKS')
       <figure>
        <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#whiteCloud" x="-7" y="-15"/>
          <use xlink:href="#whiteCloud" x="7" />
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#whiteCloud" x="7" />
          <use xlink:href="#whiteCloud" x="7" />
        </svg> 
      </figure>
       @elseif($fivedayforecast->weather == 'SUNNY INTERVALS')
       <figure>
        <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
       
      </figure>
       @elseif($fivedayforecast->weather == 'FEW CLOUDS')
     <figure>
        <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
        </svg>
       
      </figure>
     
       @elseif($fivedayforecast->weather == 'PARTLY CLOUDY(DAY)')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == 'PARTLY CLOUDY(NIGHT)')
       {{-- Partly Cloudy Night --}}
       <figure>
        <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == 'CLOUDY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
        <svg class="icon5day" viewbox="0 0 100 100">
           <use xlink:href="#grayCloud" class="small-cloud"
               fill="url(#gradGray)" />
           <use xlink:href="#whiteCloud" x="7" />
       </svg>
       </figure>
       @elseif($fivedayforecast->weather == 'CLEAR NIGHT')
         <!-- Clear Night -->
     <figure> 
     <figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
     <svg class="icon5day" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-15"/>
     <use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
     <use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
     <use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
     </svg>
     </figure>
     @endif
     
     
     
     @else
      {{-- The variable is empty --}}
       {{ 'No Value' }}
     @endif
     
        

      </div>
      <div class="col">
        <h3 class="text-dark fw-bold fs-3" style="font-size: 30px; text-align: right"> {{$fivedayforecast->min_temp}}°C  - {{$fivedayforecast->max_temp}}°C</h3>
         </div>
    </div>
  </div>
</div>
<br>
     @empty
    <p> No 5 days Forecast Provided</p>
  @endforelse
                    </div>
                </div>
                    </div>
                    {{-- DISTRICTS --}}
                 <div class="content districts-content">
                  <div class="row  g-2">
                     {{-- districts list container--}} 
                    <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-8 col-xlg-8 ">
                      <div class="mb-3">
                      {{-- search  --}}
                      <label for="selectedDist" class="form-label fw-bold fs-3"> Select City:</label>
                      <select class="form-select" aria-label="Default select" id="selectedDist">
                        <option value="null">Select City</option>
                        @forelse ($districts as $districtt)
                        <option value="{{ $districtt->districtname }}">{{ $districtt->districtname }}</option> 
                        @empty
                        <option value="2">No Cities available</option>
                        @endforelse
                      </select>
                      </div>
                      {{-- districts list --}} 
                      <div class="m-2 p-2">
                            {{-- card 1 --}} 
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                  <div class="d-flex">
                                    <div class="col-3">
                                      {{-- weather condition --}}
                              
   @if(!empty($weather))
   {{-- The variable is not empty --}}
  @if ($weather == 'SUNNY')
     <!-- Sunny -->
<figure> <figcaption class="text-center fw-bold">Sunny</figcaption>
<svg class="districtsicon" viewbox="0 0 100 100">
   <use xlink:href="#sun" />
</svg>  </figure>
  @elseif($weather == '-TSRA')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
    <svg class="districtsicon" viewbox="0 0 100 100">
    
     <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
     <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
   </svg>
 </figure>
 
  @elseif($weather == 'TSRA')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
    <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
     <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
   </svg>
 </figure>
  @elseif($weather == '+TSRA')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
    <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
     <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
   </svg>
 </figure>
  @elseif($weather == '-RAINDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
  <svg class="districtsicon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>
 @elseif($weather == '-RAINNIGHT')
 <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
  <svg class="districtsicon" viewbox="0 0 100 100">
   <use xlink:href="#moon" x="-20" y="-15"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>

  @elseif($weather == 'RAINDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
  <svg class="districtsicon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>
   @elseif($weather == 'RAINNIGHT')
   <figure>
     <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
    <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
   
      <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
      <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
      <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
      <use xlink:href="#whiteCloud" x="5" y="-7"/>
    </svg> 
  </figure>


  @elseif($weather == '+RAINDAY')
 
  <figure>
    <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
   </svg> 
 </figure>
 @elseif($weather == '+RAINNIGHT')
 
 <figure>
   <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
  <svg class="districtsicon" viewbox="0 0 100 100">
   <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>



  @elseif($weather == '-DRIZZLEDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
      <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg> 
 </figure>
 @elseif($weather == '-DRIZZLENIGHT')
 <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>

  @elseif($weather == 'DRIZZLEDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg> 
 </figure>
 @elseif($weather == 'DRIZZLENIGHT')
 <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>
@elseif($weather == '+DRIZZLEDAY')
<figure>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
<svg class="districtsicon" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
</figure>
@elseif($weather == '+DRIZZLENIGHT')
<figure>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
<svg class="districtsicon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
</figure>

  
  @elseif($weather == 'HAIL')
  <figure>
   <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
     <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
     <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
     <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
   </svg>
 </figure>

  @elseif($weather == 'MIST')
  <figure>
   <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
     <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
     <use id="mist" xlink:href="#mist" x="0" y="30"/>
   </svg> 
  </figure>
  @elseif($weather == 'FOG') 
<figure>  
   <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
     <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
     <use id="mist" xlink:href="#mist" x="0" y="30"/>
   </svg> 
  </figure>

  @elseif($weather == 'HAZE') 
  <figure>
   <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
   <svg class="districtsicon wind" viewBox="0 0 100 100" id="wind">
    
     <path id="wind1" d="M 8,37 L 35,37"/>
     <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
     <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
     <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
     <path id="wind5" d="M 5,75 L 48,75"/>  
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
   </svg>
 </figure>


  @elseif($weather == 'SUNNY BREAKS')
  <figure>
   <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#whiteCloud" x="-7" y="-15"/>
     <use xlink:href="#whiteCloud" x="7" />
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#whiteCloud" x="7" />
     <use xlink:href="#whiteCloud" x="7" />
   </svg> 
 </figure>
  @elseif($weather == 'SUNNY INTERVALS')
  <figure>
   <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
  
 </figure>
  @elseif($weather == 'FEW CLOUDS')
<figure>
   <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
   </svg>
  
 </figure>

  @elseif($weather == 'PARTLY CLOUDY(DAY)')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>
  @elseif($weather == 'PARTLY CLOUDY(NIGHT)')
  {{-- Partly Cloudy Night --}}
  <figure>
   <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>
  @elseif($weather == 'CLOUDY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
   <svg class="districtsicon" viewbox="0 0 100 100">
      <use xlink:href="#grayCloud" class="small-cloud"
          fill="url(#gradGray)" />
      <use xlink:href="#whiteCloud" x="7" />
  </svg>
  </figure>
  @elseif($weather == 'CLEAR NIGHT')
    <!-- Clear Night -->
<figure> 
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
<svg class="districtsicon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
</figure>
@endif



@else
 {{-- The variable is empty --}}
  {{ 'No Value' }}
@endif

                                    </div>
                                    <div class="col-4 align-self-start">
                                      {{-- location --}}
                                      <h4 class="card-title text-left">
                                        @if(!empty($district))
                                        {{-- The variable is not empty --}}
                                       {{ $district}}
                                   @else
                                      {{-- The variable is empty --}}
                                       {{ 'No Value' }}
                                   @endif 
                                        {{-- <i class='bi bi-cursor fs-6'></i> --}}
                                      
                                      </h4>
                                      <p class="card-text text-left">{{$time }}</p>
                                    </div>
                                    <div class="col">
                                      {{-- temperature --}}
                                      <h3 class="fw-bold" style="font-size: 30px; text-align: right">
                                        @if(!empty($maxTemp))
                                              {{-- The variable is not empty --}}
                                             {{ $maxTemp }}°C
                                         @else
                                            {{-- The variable is empty --}}
                                             {{ 'No Value' }}
                                         @endif
                                    </h3>
                                       </div>
                                  </div>
                                  
                                </div>
                              </div>  {{--end of card 1--}}
 {{-- card 2 --}} 
 @forelse ($eachDistrictWeathers as $eachDistrictWeather)
 
   <div class="card my-2" style="border-radius: 20px;">
    <div class="card-body">
      <div class="d-flex">
        <div class="col-3">
          {{-- weather condition --}}
          @if(!empty($eachDistrictWeather))
          {{-- The variable is not empty --}}
         @if ($eachDistrictWeather->weather == 'SUNNY')
            <!-- Sunny -->
       <figure> <figcaption class="text-center fw-bold">Sunny</figcaption>
       <svg class="districtsicon" viewbox="0 0 100 100">
          <use xlink:href="#sun" />
       </svg>  </figure>
         @elseif($eachDistrictWeather->weather == '-TSRA')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
           <svg class="districtsicon" viewbox="0 0 100 100">
           
            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
          </svg>
        </figure>
        
         @elseif($eachDistrictWeather->weather == 'TSRA')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
           <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
          </svg>
        </figure>
         @elseif($eachDistrictWeather->weather == '+TSRA')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
           <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
          </svg>
        </figure>
         @elseif($eachDistrictWeather->weather == '-RAINDAY')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
         <svg class="districtsicon" viewbox="0 0 100 100">
           <use xlink:href="#sun" x="-12" y="-18"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
       </figure>
        @elseif($eachDistrictWeather->weather == '-RAINNIGHT')
        <figure>
          <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
         <svg class="districtsicon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
       </figure>
       
         @elseif($eachDistrictWeather->weather == 'RAINDAY')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
         <svg class="districtsicon" viewbox="0 0 100 100">
           <use xlink:href="#sun" x="-12" y="-18"/>
           
           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
       </figure>
          @elseif($eachDistrictWeather->weather == 'RAINNIGHT')
          <figure>
            <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
           <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
          
             <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
             <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
             <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
             <use xlink:href="#whiteCloud" x="5" y="-7"/>
           </svg> 
         </figure>
       
       
         @elseif($eachDistrictWeather->weather == '+RAINDAY')
        
         <figure>
           <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
          </svg> 
        </figure>
        @elseif($eachDistrictWeather->weather == '+RAINNIGHT')
        
        <figure>
          <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
         <svg class="districtsicon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
           <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
           <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
       </figure>
       
       
       
         @elseif($eachDistrictWeather->weather == '-DRIZZLEDAY')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
             <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg> 
        </figure>
        @elseif($eachDistrictWeather->weather == '-DRIZZLENIGHT')
        <figure>
          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
            <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
        </figure>
       
         @elseif($eachDistrictWeather->weather == 'DRIZZLEDAY')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg> 
        </figure>
        @elseif($eachDistrictWeather->weather == 'DRIZZLENIGHT')
        <figure>
          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
        </figure>
       @elseif($eachDistrictWeather->weather == '+DRIZZLEDAY')
       <figure>
       <figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
       <svg class="districtsicon" viewbox="0 0 100 100">
       <use xlink:href="#sun" x="-12" y="-18"/>
       <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
       <use xlink:href="#rainDrizzle" x="25" y="65"/>
       <use xlink:href="#rainDrizzle" x="30" y="65"/>
       <use xlink:href="#rainDrizzle" x="35" y="65"/>
       <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
       <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
       <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
       <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
       <use xlink:href="#rainDrizzle" x="40" y="65"/>
       <use xlink:href="#rainDrizzle" x="45" y="65"/>
       <use xlink:href="#whiteCloud" x="7" />
       </svg> 
       </figure>
       @elseif($eachDistrictWeather->weather == '+DRIZZLENIGHT')
       <figure>
       <figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
       <svg class="districtsicon" viewbox="0 0 100 100">
       <use xlink:href="#moon" x="-20" y="-15"/>
       <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
       <use xlink:href="#rainDrizzle" x="25" y="65"/>
       <use xlink:href="#rainDrizzle" x="30" y="65"/>
       <use xlink:href="#rainDrizzle" x="35" y="65"/>
       <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
       <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
       <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
       <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
       <use xlink:href="#rainDrizzle" x="40" y="65"/>
       <use xlink:href="#rainDrizzle" x="45" y="65"/>
       <use xlink:href="#whiteCloud" x="7" />
       </svg>
       </figure>
       
         
         @elseif($eachDistrictWeather->weather == 'HAIL')
         <figure>
          <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
            <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
            <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
            <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
          </svg>
        </figure>
       
         @elseif($eachDistrictWeather->weather == 'MIST')
         <figure>
          <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
            <use id="mist" xlink:href="#mist" x="0" y="30"/>
          </svg> 
         </figure>
         @elseif($eachDistrictWeather->weather == 'FOG') 
       <figure>  
          <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
            <use id="mist" xlink:href="#mist" x="0" y="30"/>
          </svg> 
         </figure>
       
         @elseif($eachDistrictWeather->weather == 'HAZE') 
         <figure>
          <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
          <svg class="districtsicon wind" viewBox="0 0 100 100" id="wind">
           
            <path id="wind1" d="M 8,37 L 35,37"/>
            <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
            <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
            <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
            <path id="wind5" d="M 5,75 L 48,75"/>  
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
          </svg>
        </figure>
       
       
         @elseif($eachDistrictWeather->weather == 'SUNNY BREAKS')
         <figure>
          <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#whiteCloud" x="-7" y="-15"/>
            <use xlink:href="#whiteCloud" x="7" />
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#whiteCloud" x="7" />
            <use xlink:href="#whiteCloud" x="7" />
          </svg> 
        </figure>
         @elseif($eachDistrictWeather->weather == 'SUNNY INTERVALS')
         <figure>
          <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
         
        </figure>
         @elseif($eachDistrictWeather->weather == 'FEW CLOUDS')
       <figure>
          <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          </svg>
         
        </figure>
       
         @elseif($eachDistrictWeather->weather == 'PARTLY CLOUDY(DAY)')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
        </figure>
         @elseif($eachDistrictWeather->weather == 'PARTLY CLOUDY(NIGHT)')
         {{-- Partly Cloudy Night --}}
         <figure>
          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
        </figure>
         @elseif($eachDistrictWeather->weather == 'CLOUDY')
         <figure>
          <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
          <svg class="districtsicon" viewbox="0 0 100 100">
             <use xlink:href="#grayCloud" class="small-cloud"
                 fill="url(#gradGray)" />
             <use xlink:href="#whiteCloud" x="7" />
         </svg>
         </figure>
         @elseif($eachDistrictWeather->weather == 'CLEAR NIGHT')
           <!-- Clear Night -->
       <figure> 
       <figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
       <svg class="districtsicon" viewbox="0 0 100 100">
       <use xlink:href="#moon" x="-15"/>
       <use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
       <use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
       <use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
       </svg>
       </figure>
       @endif
       
       
       
       @else
        {{-- The variable is empty --}}
         {{ 'No Value' }}
       @endif
       
        </div>
        <div class="col-4 align-self-start">
          {{-- location --}}
          <h4 class="card-title text-left">  {{  $eachDistrictWeather->districts }}</h4>
          <p class="card-text text-left">{{$time}}</p>
        </div>
        <div class="col">
          {{-- temperature --}}
          <h3 class="fw-bold" style="font-size: 30px; text-align: right">
            {{  $eachDistrictWeather->max_temp }}°C
        </h3>
           </div>
      </div>
      
    </div>
  </div>  

 @empty
   <p>No Cities Available</p>

 @endforelse
 
  
                        
                            </div>  {{-- end of districts list --}} 

                        
                      </div>  {{--end of  districts list container--}} 
                      {{-- side district--}}
                      <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-4 col-xlg-4">
                        <div class="card">
                          
                          <div class="card-body">
                            <div class="d-flex">
<div class="col-6 align-self-start">
                                      {{-- location --}}
                                      <h4 class="card-title text-left fw-bold">
                                        @if(!empty($district))
                                        {{-- The variable is not empty --}}
                                       {{ $district}}
                                   @else
                                      {{-- The variable is empty --}}
                                       {{ 'No Value' }}
                                   @endif 
                                      </h4>
                                      <p class="card-text text-left">chance of rain:  @if(!empty($currentConditionRain))
                                        {{-- The variable is not empty --}}
                                       {{ $currentConditionRain}}
                                   @else
                                      {{-- The variable is empty --}}
                                       {{ 'No Value' }}
                                   @endif
                                  </p>
                                      {{-- temperature --}}
                                      <h3 class="fw-bold" style="font-size: 30px; text-align: left">
                                        @if(!empty($maxTemp))
                                        {{-- The variable is not empty --}}
                                       {{ $maxTemp }}°C
                                   @else
                                      {{-- The variable is empty --}}
                                       {{ 'No Value' }}
                                   @endif
                                    </h3>
                                    </div>
<div class="col-6">
   <!-- Sunny -->
   @if(!empty($weather))
   {{-- The variable is not empty --}}
  @if ($weather == 'SUNNY')
     <!-- Sunny -->
<figure> <figcaption class="text-center fw-bold">Sunny</figcaption>
<svg class="districtsiconSide" viewbox="0 0 100 100">
   <use xlink:href="#sun" />
</svg>  </figure>
  @elseif($weather == '-TSRA')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
    <svg class="districtsiconSide" viewbox="0 0 100 100">
    
     <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
     <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
   </svg>
 </figure>
 
  @elseif($weather == 'TSRA')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
    <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
     <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
   </svg>
 </figure>
  @elseif($weather == '+TSRA')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
    <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
     <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
   </svg>
 </figure>
  @elseif($weather == '-RAINDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
  <svg class="districtsiconSide" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>
 @elseif($weather == '-RAINNIGHT')
 <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
  <svg class="districtsiconSide" viewbox="0 0 100 100">
   <use xlink:href="#moon" x="-20" y="-15"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>

  @elseif($weather == 'RAINDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
  <svg class="districtsiconSide" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>
   @elseif($weather == 'RAINNIGHT')
   <figure>
     <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
    <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
   
      <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
      <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
      <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
      <use xlink:href="#whiteCloud" x="5" y="-7"/>
    </svg> 
  </figure>


  @elseif($weather == '+RAINDAY')
 
  <figure>
    <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
   </svg> 
 </figure>
 @elseif($weather == '+RAINNIGHT')
 
 <figure>
   <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
  <svg class="districtsiconSide" viewbox="0 0 100 100">
   <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
</figure>



  @elseif($weather == '-DRIZZLEDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
      <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg> 
 </figure>
 @elseif($weather == '-DRIZZLENIGHT')
 <figure>
   <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>

  @elseif($weather == 'DRIZZLEDAY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg> 
 </figure>
 @elseif($weather == 'DRIZZLENIGHT')
 <figure>
   <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#rainDrizzle" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="55" y="65"/>
     <use xlink:href="#rainDrizzle" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>
@elseif($weather == '+DRIZZLEDAY')
<figure>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
<svg class="districtsiconSide" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
</figure>
@elseif($weather == '+DRIZZLENIGHT')
<figure>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
<svg class="districtsiconSide" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
</figure>

  
  @elseif($weather == 'HAIL')
  <figure>
   <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
     <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
     <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
     <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
     <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
   </svg>
 </figure>

  @elseif($weather == 'MIST')
  <figure>
   <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
     <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
     <use id="mist" xlink:href="#mist" x="0" y="30"/>
   </svg> 
  </figure>
  @elseif($weather == 'FOG') 
<figure>  
   <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
     <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
     <use id="mist" xlink:href="#mist" x="0" y="30"/>
   </svg> 
  </figure>

  @elseif($weather == 'HAZE') 
  <figure>
   <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
   <svg class="icon wind" viewBox="0 0 100 100" id="wind">
    
     <path id="wind1" d="M 8,37 L 35,37"/>
     <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
     <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
     <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
     <path id="wind5" d="M 5,75 L 48,75"/>  
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
   </svg>
 </figure>


  @elseif($weather == 'SUNNY BREAKS')
  <figure>
   <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#whiteCloud" x="-7" y="-15"/>
     <use xlink:href="#whiteCloud" x="7" />
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#whiteCloud" x="7" />
     <use xlink:href="#whiteCloud" x="7" />
   </svg> 
 </figure>
  @elseif($weather == 'SUNNY INTERVALS')
  <figure>
   <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
  
 </figure>
  @elseif($weather == 'FEW CLOUDS')
<figure>
   <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
   </svg>
  
 </figure>

  @elseif($weather == 'PARTLY CLOUDY(DAY)')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>
  @elseif($weather == 'PARTLY CLOUDY(NIGHT)')
  {{-- Partly Cloudy Night --}}
  <figure>
   <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#whiteCloud" x="7" />
   </svg>
 </figure>
  @elseif($weather == 'CLOUDY')
  <figure>
   <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
   <svg class="districtsiconSide" viewbox="0 0 100 100">
      <use xlink:href="#grayCloud" class="small-cloud"
          fill="url(#gradGray)" />
      <use xlink:href="#whiteCloud" x="7" />
  </svg>
  </figure>
  @elseif($weather == 'CLEAR NIGHT')
    <!-- Clear Night -->
<figure> 
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
<svg class="districtsiconSide" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
</figure>
@endif



@else
 {{-- The variable is empty --}}
  {{ 'No Value' }}
@endif

</div>
                            </div>
                             </div>
<hr>
{{--hrs24iconwind 24hr forecast for district page hrs24icon --}}
<h5 class="fw-bold p-2"> Today's Forecast</h5>
<div class="d-flex justify-content-center bd-highlight mb-2">
  {{-- morning --}}
  <div class="col  px-2">
      <p class="card-text"><small class="text-muted"> Morning(12:00am -
              11:59am)
          </small></p>
          @if(!empty($weatherM))
          {{-- The variable is not empty --}}
         @if ($weatherM == 'SUNNY')
            <!-- Sunny -->
    <figure> 
      <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#sun" />
      </svg> 
      <figcaption class="text-center fw-bold">Sunny</figcaption>
    </figure>
         @elseif($weatherM == '-TSRA')
         <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
          </svg>
          <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
        </figure>
        
         @elseif($weatherM == 'TSRA')
         <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
          </svg>
          <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
        </figure>
         @elseif($weatherM == '+TSRA')
         <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
          </svg>
          <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
        </figure>
         @elseif($weatherM == '-RAINDAY')
         <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
           <use xlink:href="#sun" x="-12" y="-18"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
         <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
       </figure>
        @elseif($weatherM == '-RAINNIGHT')
        <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
         <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
       </figure>

         @elseif($weatherM == 'RAINDAY')
         <figure>
        <svg class="hrs24icon" viewbox="0 0 100 100">
           <use xlink:href="#sun" x="-12" y="-18"/>
           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
         <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
       </figure>
          @elseif($weatherM == 'RAINNIGHT')
          <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
             <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
             <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
             <use xlink:href="#whiteCloud" x="5" y="-7"/>
           </svg> 
           <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
         </figure>


         @elseif($weatherM == '+RAINDAY')
        
         <figure>
           <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
          </svg> 
          <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
        </figure>
        @elseif($weatherM == '+RAINNIGHT')
        
        <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
           <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
           <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
         <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
       </figure>



         @elseif($weatherM == '-DRIZZLEDAY')
         <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
             <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg> 
          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
        </figure>
        @elseif($weatherM == '-DRIZZLENIGHT')
        <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
            <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
        </figure>

         @elseif($weatherM == 'DRIZZLEDAY')
         <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg> 
          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
        </figure>
        @elseif($weatherM == 'DRIZZLENIGHT')
        <figure>
           <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#rainDrizzle" x="30" y="65"/>
            <use xlink:href="#rainDrizzle" x="35" y="65"/>
            <use xlink:href="#rainDrizzle" x="40" y="65"/>
            <use xlink:href="#rainDrizzle" x="45" y="65"/>
            <use xlink:href="#rainDrizzle" x="50" y="65"/>
            <use xlink:href="#rainDrizzle" x="55" y="65"/>
            <use xlink:href="#rainDrizzle" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
        </figure>
@elseif($weatherM == '+DRIZZLEDAY')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
</figure>
@elseif($weatherM == '+DRIZZLENIGHT')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
</figure>

         
         @elseif($weatherM == 'HAIL')
         <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
            <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
            <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
            <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
          </svg>
          <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
        </figure>
      
         @elseif($weatherM == 'MIST')
         <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
            <use id="mist" xlink:href="#mist" x="0" y="30"/>
          </svg> 
          <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
         </figure>
         @elseif($weatherM == 'FOG') 
       <figure>  
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
            <use id="mist" xlink:href="#mist" x="0" y="30"/>
          </svg> 
          <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
         </figure>

         @elseif($weatherM == 'HAZE') 
         <figure>
         <svg class="icon wind" viewBox="0 0 100 100" id="wind">
           <path id="wind1" d="M 8,37 L 35,37"/>
            <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
            <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
            <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
            <path id="wind5" d="M 5,75 L 48,75"/>  
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
          </svg>
          <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
        </figure>


         @elseif($weatherM == 'SUNNY BREAKS')
         <figure>
           <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#whiteCloud" x="-7" y="-15"/>
            <use xlink:href="#whiteCloud" x="7" />
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#whiteCloud" x="7" />
            <use xlink:href="#whiteCloud" x="7" />
          </svg> 
          <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
        </figure>
         @elseif($weatherM == 'SUNNY INTERVALS')
         <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
          <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
        </figure>
         @elseif($weatherM == 'FEW CLOUDS')
       <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          </svg>
          <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
        </figure>

         @elseif($weatherM == 'PARTLY CLOUDY(DAY)')
         <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#sun" x="-12" y="-18"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
        </figure>
         @elseif($weatherM == 'PARTLY CLOUDY(NIGHT)')
         {{-- Partly Cloudy Night --}}
         <figure>
        <svg class="hrs24icon" viewbox="0 0 100 100">
            <use xlink:href="#moon" x="-20" y="-15"/>
            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
            <use xlink:href="#whiteCloud" x="7" />
          </svg>
          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
        </figure>
         @elseif($weatherM == 'CLOUDY')
         <figure>
         <svg class="hrs24icon" viewbox="0 0 100 100">
             <use xlink:href="#grayCloud" class="small-cloud"
                 fill="url(#gradGray)" />
             <use xlink:href="#whiteCloud" x="7" />
         </svg>
         <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
         </figure>
         @elseif($weatherM == 'CLEAR NIGHT')
           <!-- Clear Night -->
<figure> 
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
</figure>
@endif

@else
{{-- The variable is empty --}}
{{ 'No Value' }}
@endif
          
          
      <h5 class="fw-bold text-center">
        <h5 class="fw-bold text-center">
          @if(!empty($maxTempM))
              {{-- The variable is not empty --}}
            {{$maxTempM}}°C
      @else
              {{-- The variable is empty --}}
    {{ 'No Value' }}
             @endif
   </h5>
      </h5>
      <figure>
        <svg class="hrs24iconwind wind" viewBox="0 0 100 100"
            id="wind">
            <path id="wind1" d="M 8,37 L 35,37" />
            <path id="wind2"
                d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35" />
            <path id="wind3"
                d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41" />
            <path id="wind4"
                d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76" />
            <path id="wind5" d="M 5,75 L 48,75" />
        </svg>
        <figcaption><small class="text-muted fw-bold">Wind
           @if(!empty($windM))
          {{-- The variable is not empty --}}
         {{($windM )}}
     @else
        {{-- The variable is empty --}}
         {{ 'No Value' }}
     @endif
        </small>
          @if ($winddirM !== null || !empty($winddirM))
          @if ($winddirM == 'SW' || $winddirM == 'WS')
           <i id="arrow-sw" class="bi bi-arrow-up-right-circle-fill active animation-sw"></i>

              @elseif ($winddirM == 'SE' || $winddirM == 'ES')
              <i id="arrow-se" class="bi bi-arrow-up-left-circle-fill active animation-se "></i>

             @elseif ($winddirM == 'NE' || $winddirM == 'EN')
             <i id="arrow-ne" class="bi bi-arrow-down-left-circle-fill active animation-ne "></i>

             @elseif ($winddirM == 'NW' || $winddirM == 'WN')
             <i id="arrow-nw" class="bi bi-arrow-down-right-circle-fill active animation-nw"></i>
             
             @elseif ($winddirM == 'S')
             <i id="arrow-s" class="bi bi-arrow-down-circle-fill  active animation-s"></i>
             
             @elseif ($winddirM == 'N')
             <i id="arrow-n" class="bi bi-arrow-up-circle-fill  active animation-n"></i>

             @elseif ($winddirM == 'E')
             <i id="arrow-e" class="bi bi-arrow-right-circle-fill active animation-e"></i>

             @elseif ($winddirM == 'W')
             <i id="arrow-w" class="bi bi-arrow-right-circle-fill active animation-w "></i>
           @endif

         @else
           {{  'no direction provided...' }}
         @endif
        
        </figcaption>
    </figure>
  </div>
  <div class="vr"></div>
  <div class="col  px-2">
    {{-- afternoon hrs24icon--}}
    <p class="card-text"><small class="text-muted">Afternoon(12:00pm -
      5:59pm)
  </small></p>
 
                       
  @if(!empty($weatherA))
  {{-- The variable is not empty --}}
 @if ($weatherA == 'SUNNY')
    <!-- Sunny -->
<figure> 
<svg class="hrs24icon" viewbox="0 0 100 100">
  <use xlink:href="#sun" />
</svg> 
<figcaption class="text-center fw-bold">Sunny</figcaption>
</figure>
 @elseif($weatherA == '-TSRA')
 <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
  </svg>
  <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
</figure>

 @elseif($weatherA == 'TSRA')
 <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
  </svg>
  <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
</figure>
 @elseif($weatherA == '+TSRA')
 <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
  </svg>
  <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
</figure>
 @elseif($weatherA == '-RAINDAY')
 <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
   <use xlink:href="#sun" x="-12" y="-18"/>
   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
   <use xlink:href="#whiteCloud" x="5" y="-7"/>
 </svg> 
 <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
</figure>
@elseif($weatherA == '-RAINNIGHT')
<figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
  <use xlink:href="#moon" x="-20" y="-15"/>
   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
   <use xlink:href="#whiteCloud" x="5" y="-7"/>
 </svg> 
 <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
</figure>

 @elseif($weatherA == 'RAINDAY')
 <figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
   <use xlink:href="#sun" x="-12" y="-18"/>
   <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
   <use xlink:href="#whiteCloud" x="5" y="-7"/>
 </svg> 
 <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
</figure>
  @elseif($weatherA == 'RAINNIGHT')
  <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
  <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#whiteCloud" x="5" y="-7"/>
   </svg> 
   <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
 </figure>


 @elseif($weatherA == '+RAINDAY')

 <figure>
   <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg> 
  <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
</figure>
@elseif($weatherA == '+RAINNIGHT')

<figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
  <use xlink:href="#moon" x="-20" y="-15"/>
   <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
   <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
   <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
   <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
   <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
   <use xlink:href="#whiteCloud" x="5" y="-7"/>
 </svg> 
 <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
</figure>



 @elseif($weatherA == '-DRIZZLEDAY')
 <figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
    <use xlink:href="#rainDrizzle" x="35" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#rainDrizzle" x="45" y="65"/>
    <use xlink:href="#rainDrizzle" x="50" y="65"/>
    <use xlink:href="#rainDrizzle" x="55" y="65"/>
    <use xlink:href="#rainDrizzle" x="60" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg> 
  <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
</figure>
@elseif($weatherA == '-DRIZZLENIGHT')
<figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#rainDrizzle" x="30" y="65"/>
    <use xlink:href="#rainDrizzle" x="35" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#rainDrizzle" x="45" y="65"/>
    <use xlink:href="#rainDrizzle" x="50" y="65"/>
    <use xlink:href="#rainDrizzle" x="55" y="65"/>
    <use xlink:href="#rainDrizzle" x="60" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
</figure>

 @elseif($weatherA == 'DRIZZLEDAY')
 <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#rainDrizzle" x="30" y="65"/>
    <use xlink:href="#rainDrizzle" x="35" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#rainDrizzle" x="45" y="65"/>
    <use xlink:href="#rainDrizzle" x="50" y="65"/>
    <use xlink:href="#rainDrizzle" x="55" y="65"/>
    <use xlink:href="#rainDrizzle" x="60" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg> 
  <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
</figure>
@elseif($weatherA == 'DRIZZLENIGHT')
<figure>
   <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#rainDrizzle" x="30" y="65"/>
    <use xlink:href="#rainDrizzle" x="35" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#rainDrizzle" x="45" y="65"/>
    <use xlink:href="#rainDrizzle" x="50" y="65"/>
    <use xlink:href="#rainDrizzle" x="55" y="65"/>
    <use xlink:href="#rainDrizzle" x="60" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
</figure>
@elseif($weatherA == '+DRIZZLEDAY')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
</figure>
@elseif($weatherA == '+DRIZZLENIGHT')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
</figure>

 
 @elseif($weatherA == 'HAIL')
 <figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
    <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
    <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
    <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg>
  <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
</figure>

 @elseif($weatherA == 'MIST')
 <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
    <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
    <use id="mist" xlink:href="#mist" x="0" y="30"/>
  </svg> 
  <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
 </figure>
 @elseif($weatherA == 'FOG') 
<figure>  
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
    <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
    <use id="mist" xlink:href="#mist" x="0" y="30"/>
  </svg> 
  <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
 </figure>

 @elseif($weatherA == 'HAZE') 
 <figure>
 <svg class="icon wind" viewBox="0 0 100 100" id="wind">
   <path id="wind1" d="M 8,37 L 35,37"/>
    <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
    <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
    <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
    <path id="wind5" d="M 5,75 L 48,75"/>  
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
  </svg>
  <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
</figure>


 @elseif($weatherA == 'SUNNY BREAKS')
 <figure>
   <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#whiteCloud" x="-7" y="-15"/>
    <use xlink:href="#whiteCloud" x="7" />
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#whiteCloud" x="7" />
    <use xlink:href="#whiteCloud" x="7" />
  </svg> 
  <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
</figure>
 @elseif($weatherA == 'SUNNY INTERVALS')
 <figure>
  <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
</figure>
 @elseif($weatherA == 'FEW CLOUDS')
<figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
  </svg>
  <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
</figure>

 @elseif($weatherA == 'PARTLY CLOUDY(DAY)')
 <figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
</figure>
 @elseif($weatherA == 'PARTLY CLOUDY(NIGHT)')
 {{-- Partly Cloudy Night --}}
 <figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
</figure>
 @elseif($weatherA == 'CLOUDY')
 <figure>
 <svg class="hrs24icon" viewbox="0 0 100 100">
     <use xlink:href="#grayCloud" class="small-cloud"
         fill="url(#gradGray)" />
     <use xlink:href="#whiteCloud" x="7" />
 </svg>
 <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
 </figure>
 @elseif($weatherA == 'CLEAR NIGHT')
   <!-- Clear Night -->
<figure> 
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
</figure>
@endif

@else
{{-- The variable is empty --}}
{{ 'No Value' }}
@endif

<h5 class="fw-bold text-center">
  @if(!empty($maxTempA))
  {{-- The variable is not empty --}}
{{$maxTempA}}°C
@else
  {{-- The variable is empty --}}
{{ 'No Value' }}
 @endif
</h5>
<figure>
  <svg class="hrs24iconwind wind" viewBox="0 0 100 100"
      id="wind">
      <path id="wind1" d="M 8,37 L 35,37" />
      <path id="wind2"
          d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35" />
      <path id="wind3"
          d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41" />
      <path id="wind4"
          d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76" />
      <path id="wind5" d="M 5,75 L 48,75" />
  </svg>
  <figcaption> 
    <small class="text-muted fw-bold">
    
      Wind
             @if(!empty($windA))
            {{-- The variable is not empty --}}
           {{($windA)}}
       @else
          {{-- The variable is empty --}}
           {{ 'No Value' }}
       @endif
          
      </small>
      @if ($winddirA !== null || !empty($winddirA))
      @if ($winddirA == 'SW' || $winddirA == 'WS')
       <i id="arrow-sw" class="bi bi-arrow-up-right-circle-fill active animation-sw"></i>

          @elseif ($winddirA == 'SE' || $winddirA == 'ES')
          <i id="arrow-se" class="bi bi-arrow-up-left-circle-fill active animation-se "></i>

         @elseif ($winddirA == 'NE' || $winddirA == 'EN')
         <i id="arrow-ne" class="bi bi-arrow-down-left-circle-fill active animation-ne "></i>

         @elseif ($winddirA == 'NW' || $winddirA == 'WN')
         <i id="arrow-nw" class="bi bi-arrow-down-right-circle-fill active animation-nw"></i>
         
         @elseif ($winddirA == 'S')
         <i id="arrow-s" class="bi bi-arrow-down-circle-fill  active animation-s"></i>
         
         @elseif ($winddirA == 'N')
         <i id="arrow-n" class="bi bi-arrow-up-circle-fill  active animation-n"></i>

         @elseif ($winddirA == 'E')
         <i id="arrow-e" class="bi bi-arrow-right-circle-fill active animation-e"></i>

         @elseif ($winddirA == 'W')
         <i id="arrow-w" class="bi bi-arrow-right-circle-fill active animation-w "></i>
       @endif

     @else
       {{  'no direction provided...' }}
     @endif
    
    </figcaption>
</figure>



  </div>
  <div class="vr"></div>
  <div class="col px-2">
    <p class="card-text"><small class="text-muted"> Evening(6:00pm -
      11:59pm)
  </small></p>

  @if(!empty($weatherE))
                                          {{-- The variable is not empty --}}
                                         @if ($weatherE == 'SUNNY')
                                            <!-- Sunny -->
                                    <figure> 
                                      <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#sun" />
                                      </svg> 
                                      <figcaption class="text-center fw-bold">Sunny</figcaption>
                                    </figure>
                                         @elseif($weatherE == '-TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
                                        </figure>
                                        
                                         @elseif($weatherE == 'TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherE == '+TSRA')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                            <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
                                        </figure>
                                         @elseif($weatherE == '-RAINDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
                                       </figure>
                                        @elseif($weatherE == '-RAINNIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
                                       </figure>

                                         @elseif($weatherE == 'RAINDAY')
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                           <use xlink:href="#sun" x="-12" y="-18"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
                                       </figure>
                                          @elseif($weatherE == 'RAINNIGHT')
                                          <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                             <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                             <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                             <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                           </svg> 
                                           <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
                                         </figure>


                                         @elseif($weatherE == '+RAINDAY')
                                        
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
                                        </figure>
                                        @elseif($weatherE == '+RAINNIGHT')
                                        
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                           <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                           <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                           <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                         </svg> 
                                         <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
                                       </figure>



                                         @elseif($weatherE == '-DRIZZLEDAY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                             <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherE == '-DRIZZLENIGHT')
                                        <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
                                        </figure>

                                         @elseif($weatherE == 'DRIZZLEDAY')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
                                        </figure>
                                        @elseif($weatherE == 'DRIZZLENIGHT')
                                        <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#rainDrizzle" x="30" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="35" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="40" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="45" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="50" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="55" y="65"/>
                                            <use xlink:href="#rainDrizzle" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
                                        </figure>
     @elseif($weatherE == '+DRIZZLEDAY')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#sun" x="-12" y="-18"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg> 
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
</figure>
@elseif($weatherE == '+DRIZZLENIGHT')
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#rainDrizzle" x="25" y="65"/>
<use xlink:href="#rainDrizzle" x="30" y="65"/>
<use xlink:href="#rainDrizzle" x="35" y="65"/>
<use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
<use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
<use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
<use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
<use xlink:href="#rainDrizzle" x="40" y="65"/>
<use xlink:href="#rainDrizzle" x="45" y="65"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
</figure>

                                         
                                         @elseif($weatherE == 'HAIL')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                            <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
                                            <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
                                            <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
                                            <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
                                            <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
                                        </figure>
                                      
                                         @elseif($weatherE == 'MIST')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
                                         </figure>
                                         @elseif($weatherE == 'FOG') 
                                       <figure>  
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
                                            <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                            <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
                                         </figure>

                                         @elseif($weatherE == 'HAZE') 
                                         <figure>
                                         <svg class="icon wind" viewBox="0 0 100 100" id="wind">
                                           <path id="wind1" d="M 8,37 L 35,37"/>
                                            <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
                                            <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
                                            <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
                                            <path id="wind5" d="M 5,75 L 48,75"/>  
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
                                        </figure>


                                         @elseif($weatherE == 'SUNNY BREAKS')
                                         <figure>
                                           <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#whiteCloud" x="-7" y="-15"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg> 
                                          <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'SUNNY INTERVALS')
                                         <figure>
                                          <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'FEW CLOUDS')
                                       <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
                                        </figure>

                                         @elseif($weatherE == 'PARTLY CLOUDY(DAY)')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" x="-12" y="-18"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'PARTLY CLOUDY(NIGHT)')
                                         {{-- Partly Cloudy Night --}}
                                         <figure>
                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                            <use xlink:href="#moon" x="-20" y="-15"/>
                                            <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                            <use xlink:href="#whiteCloud" x="7" />
                                          </svg>
                                          <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
                                        </figure>
                                         @elseif($weatherE == 'CLOUDY')
                                         <figure>
                                         <svg class="hrs24icon" viewbox="0 0 100 100">
                                             <use xlink:href="#grayCloud" class="small-cloud"
                                                 fill="url(#gradGray)" />
                                             <use xlink:href="#whiteCloud" x="7" />
                                         </svg>
                                         <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
                                         </figure>
                                         @elseif($weatherE == 'CLEAR NIGHT')
                                           <!-- Clear Night -->
<figure> 
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-15"/>
<use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
<use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
<use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
</svg>
<figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
</figure>
@endif

     @else
             {{-- The variable is empty --}}
        {{ 'No Value' }}
          @endif

          <h5 class="fw-bold text-center">
            @if(!empty($maxTempE))
            {{-- The variable is not empty --}}
           {{$maxTempE}}°C
    @else
            {{-- The variable is empty --}}
  {{ 'No Value' }}
           @endif
          </h5>
          <figure>
              <svg class="hrs24iconwind wind" viewBox="0 0 100 100"
                  id="wind">
                  <path id="wind1" d="M 8,37 L 35,37" />
                  <path id="wind2"
                      d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35" />
                  <path id="wind3"
                      d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41" />
                  <path id="wind4"
                      d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76" />
                  <path id="wind5" d="M 5,75 L 48,75" />
              </svg>
              <figcaption><small class="text-muted fw-bold">
                Wind
                         @if(!empty($windE))
                        {{-- The variable is not empty --}}
                       {{($windE)}}
                   @else
                      {{-- The variable is empty --}}
                       {{ 'No Value' }}
                   @endif
                      
              
              </small>
              @if ($winddirE !== null || !empty($winddirE))
              @if ($winddirE == 'SW' || $winddirE == 'WS')
               <i id="arrow-sw" class="bi bi-arrow-up-right-circle-fill active animation-sw"></i>

                  @elseif ($winddirE == 'SE' || $winddirE == 'ES')
                  <i id="arrow-se" class="bi bi-arrow-up-left-circle-fill active animation-se "></i>

                 @elseif ($winddirE == 'NE' || $winddirE == 'EN')
                 <i id="arrow-ne" class="bi bi-arrow-down-left-circle-fill active animation-ne "></i>

                 @elseif ($winddirE == 'NW' || $winddirE == 'WN')
                 <i id="arrow-nw" class="bi bi-arrow-down-right-circle-fill active animation-nw"></i>
                 
                 @elseif ($winddirE == 'S')
                 <i id="arrow-s" class="bi bi-arrow-down-circle-fill  active animation-s"></i>
                 
                 @elseif ($winddirE == 'N')
                 <i id="arrow-n" class="bi bi-arrow-up-circle-fill  active animation-n"></i>

                 @elseif ($winddirE == 'E')
                 <i id="arrow-e" class="bi bi-arrow-right-circle-fill active animation-e"></i>

                 @elseif ($winddirE == 'W')
                 <i id="arrow-w" class="bi bi-arrow-right-circle-fill active animation-w "></i>
               @endif

             @else
               {{  'no direction provided...' }}
             @endif
            
            </figcaption>
          </figure>

  </div>
</div>
<hr>
{{-- 5-days forecast for district page  --}}
<h5 class="fw-bold p-2"> 5-Days Forecast</h5>
 
<ul class="list-group list-group-flush">
 

    {{-- <ul class="list-group list-group-horizontal">
      <li class="list-group-item"> 
       
        <h5 class=" text-left">Now</h5></li>

      <li class="list-group-item"> 
         <!-- Sunny -->
        <figure> 
          <svg class="districtsicon" viewbox="0 0 100 100">
              <use xlink:href="#sun" />
          </svg>
          <figcaption class="text-center fw-bold">Sunny</figcaption>
      </figure></li>
      <li class="list-group-item"> 
        <h5 class="fw-bold" style="font-size: 20px;">
          27°C / 31°C
      </h5></li>
    </ul> --}}
{{-- endo of today --}}

 {{--  today--}}
 @forelse ($fivedayforecasts as $fivedayforecast )
    
 <div class="card m-2" style="border-radius: 20px;">
  <div class="card-body">
    <div class="d-flex">
      <div class="col-4 align-self-start">
        <h3 class="card-title text-left text-dark fw-bold fs-5">
         {{ \Carbon\Carbon::parse($fivedayforecast->date)->format('l') }}
       </h3> 
      </div>
      <div class="col-4">
        @if(!empty($fivedayforecast->weather))
        {{-- The variable is not empty --}}
       @if ($fivedayforecast->weather == 'SUNNY')
          <!-- Sunny -->
     <figure> <figcaption class="text-center fw-bold">Sunny</figcaption>
     <svg class="hrs24icon" viewbox="0 0 100 100">
        <use xlink:href="#sun" />
     </svg>  </figure>
       @elseif($fivedayforecast->weather == '-TSRA')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Thunderstorms With Rain</figcaption>
         <svg class="hrs24icon" viewbox="0 0 100 100">
         
          <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/> 
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
          <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
        </svg>
      </figure>
      
       @elseif($fivedayforecast->weather == 'TSRA')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate Thunderstorms With Rain</figcaption>
         <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
          <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == '+TSRA')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Heavy Thunderstorms With Rain</figcaption>
         <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
          <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
          <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
          <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == '-RAINDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Rain Day</figcaption>
       <svg class="hrs24icon" viewbox="0 0 100 100">
         <use xlink:href="#sun" x="-12" y="-18"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
      @elseif($fivedayforecast->weather == '-RAINNIGHT')
      <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Rain Night</figcaption>
       <svg class="hrs24icon" viewbox="0 0 100 100">
        <use xlink:href="#moon" x="-20" y="-15"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
     
       @elseif($fivedayforecast->weather == 'RAINDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate  Rain Day</figcaption>
       <svg class="hrs24icon" viewbox="0 0 100 100">
         <use xlink:href="#sun" x="-12" y="-18"/>
         
         <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
        @elseif($fivedayforecast->weather == 'RAINNIGHT')
        <figure>
          <figcaption class="text-center fw-bold text-muted">Moderate Rain Night</figcaption>
         <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
        
           <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
           <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
           <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
           <use xlink:href="#whiteCloud" x="5" y="-7"/>
         </svg> 
       </figure>
     
     
       @elseif($fivedayforecast->weather == '+RAINDAY')
      
       <figure>
         <figcaption class="text-center fw-bold text-muted">Heavy Rain Day</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
          <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
          <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
        </svg> 
      </figure>
      @elseif($fivedayforecast->weather == '+RAINNIGHT')
      
      <figure>
        <figcaption class="text-center fw-bold text-muted">Heavy Rain Night</figcaption>
       <svg class="hrs24icon" viewbox="0 0 100 100">
        <use xlink:href="#moon" x="-20" y="-15"/>
         <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
         <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
         <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
         <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
         <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
         <use xlink:href="#whiteCloud" x="5" y="-7"/>
       </svg> 
     </figure>
     
     
     
       @elseif($fivedayforecast->weather == '-DRIZZLEDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Drizzle Day</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
           <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg> 
      </figure>
      @elseif($fivedayforecast->weather == '-DRIZZLENIGHT')
      <figure>
        <figcaption class="text-center fw-bold text-muted">Slight Drizzle Night</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
          <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
     
       @elseif($fivedayforecast->weather == 'DRIZZLEDAY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Day</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg> 
      </figure>
      @elseif($fivedayforecast->weather == 'DRIZZLENIGHT')
      <figure>
        <figcaption class="text-center fw-bold text-muted">Moderate Drizzle Night</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#rainDrizzle" x="30" y="65"/>
          <use xlink:href="#rainDrizzle" x="35" y="65"/>
          <use xlink:href="#rainDrizzle" x="40" y="65"/>
          <use xlink:href="#rainDrizzle" x="45" y="65"/>
          <use xlink:href="#rainDrizzle" x="50" y="65"/>
          <use xlink:href="#rainDrizzle" x="55" y="65"/>
          <use xlink:href="#rainDrizzle" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
     @elseif($fivedayforecast->weather == '+DRIZZLEDAY')
     <figure>
     <figcaption class="text-center fw-bold text-muted">Heavy Drizzle Day</figcaption>
     <svg class="hrs24icon" viewbox="0 0 100 100">
     <use xlink:href="#sun" x="-12" y="-18"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="25" y="65"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
     </svg> 
     </figure>
     @elseif($fivedayforecast->weather == '+DRIZZLENIGHT')
     <figure>
     <figcaption class="text-center fw-bold text-muted">Heavy Drizzle NIGHT</figcaption>
     <svg class="hrs24icon" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-20" y="-15"/>
     <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
     <use xlink:href="#rainDrizzle" x="25" y="65"/>
     <use xlink:href="#rainDrizzle" x="30" y="65"/>
     <use xlink:href="#rainDrizzle" x="35" y="65"/>
     <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
     <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
     <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
     <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
     <use xlink:href="#rainDrizzle" x="40" y="65"/>
     <use xlink:href="#rainDrizzle" x="45" y="65"/>
     <use xlink:href="#whiteCloud" x="7" />
     </svg>
     </figure>
     
       
       @elseif($fivedayforecast->weather == 'HAIL')
       <figure>
        <figcaption class="text-center fw-bold text-muted">HAIL</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
          <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
          <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
          <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
          <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
          <use xlink:href="#whiteCloud" x="5" y="-7"/>
        </svg>
      </figure>
     
       @elseif($fivedayforecast->weather == 'MIST')
       <figure>
        <figcaption class="text-center fw-bold text-muted">MIST</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)" x="0" y="20"/>
          <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
          <use id="mist" xlink:href="#mist" x="0" y="30"/>
        </svg> 
       </figure>
       @elseif($fivedayforecast->weather == 'FOG') 
     <figure>  
        <figcaption class="text-center fw-bold text-muted">FOG</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
          <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
          <use id="mist" xlink:href="#mist" x="0" y="30"/>
        </svg> 
       </figure>
     
       @elseif($fivedayforecast->weather == 'HAZE') 
       <figure>
        <figcaption class="text-center fw-bold text-muted">HAZE</figcaption>
        <svg class="hrs24icon wind" viewBox="0 0 100 100" id="wind">
         
          <path id="wind1" d="M 8,37 L 35,37"/>
          <path id="wind2" d="M 2,45 L 45,45 C65,45 64,25 52,25 C47,24 42,30 44,35"/>
          <path id="wind3" d="M 20,55 L 75,55 C90,53 90,35 80,32 C70,28 60,42 70,48 C80,50 80,40 78,41"/>
          <path id="wind4" d="M 12,65 L 65,65 C85,68 75,87 65,83 C60,81 60,78 61,76"/>
          <path id="wind5" d="M 5,75 L 48,75"/>  
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          {{-- <use xlink:href="#whiteCloud" x="7" /> --}}
        </svg>
      </figure>
     
     
       @elseif($fivedayforecast->weather == 'SUNNY BREAKS')
       <figure>
        <figcaption class="text-center fw-bold text-muted">SUNNY BREAKS</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#whiteCloud" x="-7" y="-15"/>
          <use xlink:href="#whiteCloud" x="7" />
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#whiteCloud" x="7" />
          <use xlink:href="#whiteCloud" x="7" />
        </svg> 
      </figure>
       @elseif($fivedayforecast->weather == 'SUNNY INTERVALS')
       <figure>
        <figcaption class="text-center fw-bold text-muted">SUNNY INTERVALS</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
       
      </figure>
       @elseif($fivedayforecast->weather == 'FEW CLOUDS')
     <figure>
        <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
        </svg>
       
      </figure>
     
       @elseif($fivedayforecast->weather == 'PARTLY CLOUDY(DAY)')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Partly Cloudy Day</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#sun" x="-12" y="-18"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == 'PARTLY CLOUDY(NIGHT)')
       {{-- Partly Cloudy Night --}}
       <figure>
        <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
          <use xlink:href="#moon" x="-20" y="-15"/>
          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
          <use xlink:href="#whiteCloud" x="7" />
        </svg>
      </figure>
       @elseif($fivedayforecast->weather == 'CLOUDY')
       <figure>
        <figcaption class="text-center fw-bold text-muted">Cloudy</figcaption>
        <svg class="hrs24icon" viewbox="0 0 100 100">
           <use xlink:href="#grayCloud" class="small-cloud"
               fill="url(#gradGray)" />
           <use xlink:href="#whiteCloud" x="7" />
       </svg>
       </figure>
       @elseif($fivedayforecast->weather == 'CLEAR NIGHT')
         <!-- Clear Night -->
     <figure> 
     <figcaption class="text-center fw-bold text-muted">Clear Night</figcaption>
     <svg class="hrs24icon" viewbox="0 0 100 100">
     <use xlink:href="#moon" x="-15"/>
     <use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
     <use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
     <use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
     </svg>
     </figure>
     @endif
     
     
     
     @else
      {{-- The variable is empty --}}
       {{ 'No Value' }}
     @endif
     
        

      </div>
      <div class="col">
        <h3 class="text-dark fw-bold fs-5" style="font-size: 30px; text-align: right"> {{$fivedayforecast->min_temp}}°C / {{$fivedayforecast->max_temp}}°C</h3>
         </div>
    </div>
  </div>
</div>
<br>
     @empty
    <p> No 5 days Forecast Provided</p>
  @endforelse


</ul>


 
                        </div>
                        <div>
                    </div>
                  </div>
                   </div>
                </div>
                 <div class="content seasonal-content">
                  {{-- seasonal-content --}}
                  <div class="d-flex justify-content-center align-items-center" style="height: 80vh; ">
                  <p class="text-center">
                  <div class="card bg-white text-dark shadow-lg" style="border-radius: 20px;">
                    <div class="card-body text-dark">
                    <h3 class="fw-light fs-3  text-center">Seasonal Forecast <strong><h1 class=" font-monospace text-center">Coming Soon!!!</h1></strong></h3>  
                    </div>
                  </div>
                </p>
              </div>

                 </div>
                 <div class="content marine-content">
                  <div class="d-flex justify-content-center align-items-center" style="height: 80vh; ">
                    <p class="text-center">
                    <div class="card bg-primary text-white shadow-lg" style="border-radius: 20px;">
                      <div class="card-body text-white">
                      <h3 class="fw-light fs-3  text-center">Marine Forecast <strong><h1 class=" font-monospace text-center">Coming Soon!!!</h1></strong></h3>  
                      </div>
                    </div>
                  </p>
                </div>

                 </div>
                 
                <div class="content feedback-content">
                   <div class="d-flex justify-content-center align-items-center" style="height: 80vh; ">
                    <p class="text-center">
                      <div class="card text-start bg-white shadow-lg" style="border-radius: 20px;">
                        <div class="card-body">
                          <h4 class="card-title">Leave Us A Feedback📢 About Our Forecast⛈️</h4>
                          <p class="card-text">
                            <form method="POST" action="{{ route('feedbackpost') }}">
                              @csrf
                              <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control form-control-sm" name="email1" id="inputEmail3">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                  <input type="tel" class="form-control form-control-sm" name="phoneNum" id="phone">
                                </div>
                              </div>
                              <p class="text-center">
                              <div class="row mb-3">
                                <div class="col-sm-10">
                                <div class="form-floating"> 
                              <select class="form-select form-select-sm" aria-label="Default select" id="feedbackselectedDist" name="selectCity">
                                <option value="null">Select City</option>
                                @forelse ($districts as $districtt)
                                <option value="{{ $districtt->districtname }}">{{ $districtt->districtname }}</option> 
                                @empty
                                <option value="2">No Cities available</option>
                                @endforelse
                              </select>
                              <label for="feedbackselectedDist"> Select Feedback City:</label>
                            </div>
                            </div>
                          </div>
                          {{--  --}}
                            <div class="row mb-3">
                              <div class="col-sm-10">
                              <div class="form-floating"> 
                            <select class="form-select form-select-sm" aria-label="Default select" id="feedbackForcastype" name="forecastType">
                              <option value="null">Forecast Type</option>
                              <option value="dailyForecast">Daily Forecast</option> 
                              <option value="fiveDaysForecast">5 Days Forecast</option> 
                              <option value="seasonalForecast">Seasonal Forecast</option> 
                              <option value="marine">Marine</option> 
                            </select>
                            <label for="feedbackForcastype"> Select Feedback Forecast Type:</label>
                          </div>
                          </div>
                        </div>
                        {{--  Accuracy --}}
                          <div class="row mb-3">
                            <div class="col-sm-10">
                              <div class="form-floating"> 
                                <select class="form-select form-select-sm" aria-label="Default select" id="feedbackaccuracy" name="feedbackaccuracy">
                                  <option value="null">Select Forecast Accuracy </option>
                                  <option value="1">1</option> 
                                  <option value="2">2</option> 
                                  <option value="3">3</option> 
                                  <option value="4">4</option> 
                                  <option value="5">5</option> 
                                </select>
                                <label for="feedbackaccuracy">Rate Our Accuracy Level:</label>
                              </div>
                          </div>
                          </div>
                          <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="comment" style="height: 100px" name="comment"></textarea>
                            <label for="comment">Comments</label>
                          </div>
                        </p>
 <button type="submit" class="btn btn-primary" id="submitFeedback" >Submit</button>
                            </form>
                          </p>
                        </div>
                      </div>
                    
                    </p>
                </div>
                </div>
                
            </div>

        </div>
    </section>
    <div id="polygonElement" data-polygon="{{ json_encode($polygon) }}"    data-marker="{{ json_encode($markers)  }}"></div>
</body>

</html>
