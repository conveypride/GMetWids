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
{{-- leaflet API --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script> --}}
    {{-- <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.0/mapbox-gl.js"></script>
<script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.4.0/mapbox-gl-draw.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.4.0/mapbox-gl-draw.css" type="text/css"> --}}

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
        No  Advisories yet....
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
            <path fill="lightblue" d="M10 0 Q10,0 14,7 A5,5 0 1,1 6,7 Q10,0 10,0Z" />
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
            <circle cx="4" cy="4" r="4" fill="#e3fcff" />
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
          <li class="btnicons" data-target="districts-content">
            <a href="#">
                <i class='bi bi-cursor'></i>
                <span class="links_name">Districts</span>
            </a>
            <span class="tooltip">Districts</span>
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
<div class=" container mt-3">
  <div class="text-center">
    {{-- search column --}}
<div class="card rounded">
  <div class="card-body">
    <h4 class="card-title">Request Search Form</h4>
    <p class="card-text">Welcome to the GMet Weather Information Dissemination System</p>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom03">Select Product:</label>
          <select class="form-control form-control-lg" name="category" id="validationCustom03"   required>
            <option value="">Choose... </option>
            <option value="24Hrs">24-Hour-Forecast</option>
            <option value="5-Days-Forecast">5-Days-Forecast</option>
            <option value="Seasonal Forecast">Seasonal Forecast</option>
            <option value="Marine Forecast">Marine Forecast</option>
             
          </select>
      <div class="invalid-feedback">
        Please select a product.
      </div>
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationCustom04">Select District:</label>
         <select class="form-control form-control-lg" id="validationCustom04" name="activity" required></select>
        <div class="invalid-feedback">
        Please select a  district.
      </div>
      </div>
    </div>
    <button class="btn btn-dark btn-lg d-block w-100" type="button"><i class='bi bi-search'></i> Request</button>

  </div>
</div>



    <h5 class="font-weight-bold mt-2 p-2"> DAILY SOMETHING SOMETHING </h5>
<div id="carouselExampleCaptions" class="carousel topHomeCarouselWidthAdjustment carousel-dark  slide my-4 mx-auto" data-bs-ride="carousel"  >
  <div class="carousel-indicators" >
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/data (1).jpg') }}" class="topHomeCarouselWidthAdjustment"    alt="...">
       
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/data (2).jpg') }}" class="topHomeCarouselWidthAdjustment"   alt="...">
      
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/data (3).jpg') }}" class="topHomeCarouselWidthAdjustment"   alt="...">
      
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
 </div>
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
                                                Accra
                                            </h1>  <button class="btn  dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                            
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="defaultDropdown" style="overflow: hidden;
                                             overflow-y: scroll;
                                            max-height: 200px;"> 
                                             <li><a class="dropdown-item" href="#">Axim</a></li>
                                              <li><a class="dropdown-item" href="#">Accra</a></li>
                                              <li><a class="dropdown-item" href="#">Saltpond</a></li>
                                              <li><a class="dropdown-item" href="#">Ada</a></li>
                                              <li><a class="dropdown-item" href="#">Koforidua</a></li>
                                              <li><a class="dropdown-item" href="#">Akuse</a></li>
                                              <li><a class="dropdown-item" href="#">Akatsi</a></li>
                                              <li><a class="dropdown-item" href="#">Sefwi-Bekwai</a></li>
                                              <li><a class="dropdown-item" href="#">Ho</a></li>
                                              <li><a class="dropdown-item" href="#">Abetifi</a></li>
                                              <li><a class="dropdown-item" href="#">Kumasi</a></li>
                                              <li><a class="dropdown-item" href="#">Sunyani</a></li>
                                              <li><a class="dropdown-item" href="#">Wenchi</a></li>
                                              <li><a class="dropdown-item" href="#">Kete-Krachi</a></li>
                                              <li><a class="dropdown-item" href="#">Bole</a></li>
                                              <li><a class="dropdown-item" href="#">Yendi</a></li>
                                              <li><a class="dropdown-item" href="#">Temale</a></li>
                                              <li><a class="dropdown-item" href="#">Navrongo</a></li>
                                              <li><a class="dropdown-item" href="#">Wa</a></li>
                                              <li><a class="dropdown-item" href="#">Takoradi</a></li>
                                              <li><a class="dropdown-item" href="#">Tema</a></li>
                                            </ul>
                                          </div>
                                            
                                            <p class="text-muted">Chance of rain: 0%</p>
                                            {{-- temp --}}
                                            <h1 class="fw-bold" style="font-size: 50px;">
                                                31°C
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
                                                <figcaption><small class="text-muted fw-bold">Wind(NE-12m/s)</small>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-left-circle-fill bouncingN-arrow" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-5.904-2.803a.5.5 0 1 1 .707.707L6.707 10h2.768a.5.5 0 0 1 0 1H5.5a.5.5 0 0 1-.5-.5V6.525a.5.5 0 0 1 1 0v2.768l4.096-4.096z"/>
                                                  </svg> 
                                                </figcaption>
                                            </figure> 
                                        </div>
                                        <div class="p-2 ">
                                            <!-- Sunny -->
                                            <figure>
                                                <figcaption class="text-center fw-bold">Sunny</figcaption>
                                                <svg class="bigicon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun" />
                                                </svg>

                                            </figure>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between bd-highlight mb-2">
                                      <div class="p-2 "> <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#viewAdvisoriesModel">View Advisories</button></div>
                                      <div class="p-2 "> </div>
                                      <div class="p-2 ">
                                        {{-- time --}}
                                        <h6 class="p-2 text-muted fw-bold text-end"> Morning(12:00 - 5:59)GMT
                                        </h6>
                                      </div>
                                    </div>
         
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong> Weather Summary:</strong>
  Today; Accra, Central Northern and some parts of Western Lake Volta regions will experience sunny intervals whereas the rest of country will experience partly cloudy conditions.
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
            <h5 class="text-dark fw-bold text-center"> 57%</h5>
          </div>
        </div>
      </div>
      <div class="col mx-2">
        <div class="card rounded-4" style="background-color: #EAECEF;"> 
          <div class="card-body">
            <h5 class="card-title text-muted fw-bold"><i class="bi bi-hourglass-split"></i> Pressure</h5>
            <h5 class="text-dark fw-bold text-center"> 1008 hPa </h5>
          </div>
        </div>
      </div>
      </div>
      <div class="d-flex justify-content-center bd-highlight mb-2 g-3">
      <div class="col mx-2">
        <div class="card rounded-4" style="background-color: #EAECEF;"> 
          <div class="card-body">
            <h5 class="card-title text-muted fw-bold"><i class="bi bi-droplet-half"></i> Rain</h5>
            <h5 class="text-dark fw-bold text-center"> 0% </h5>
          </div>
        </div>
      </div>
      <div class="col mx-2">
        <div class="card rounded-4" style="background-color: #EAECEF;"> 
          <div class="card-body">
            <h5 class="card-title text-muted fw-bold"><i class="bi bi-bezier2"></i> ITD</h5>
            <h5 class="text-dark fw-bold text-center"> 1° N </h5>
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
                                                    <p class="card-text"><small class="text-muted"> Morning(6:00 -
                                                            11:59am)
                                                        </small></p>
                                                    <figure>
                                                        <svg class="hrs24icon" viewbox="0 0 100 100">
                                                            <use xlink:href="#grayCloud" class="small-cloud"
                                                                fill="url(#gradGray)" />
                                                            <use xlink:href="#whiteCloud" x="7" />
                                                        </svg>
                                                        <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
                                                    </figure>
                                                    <h5 class="fw-bold text-center">
                                                        24°C
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
                                                        <figcaption><small class="text-muted fw-bold">Wind(NW-10m/s)</small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-circle-fill bouncingNW-arrow" viewBox="0 0 16 16">
                                                          <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm5.904-2.803a.5.5 0 1 0-.707.707L9.293 10H6.525a.5.5 0 0 0 0 1H10.5a.5.5 0 0 0 .5-.5V6.525a.5.5 0 0 0-1 0v2.768L5.904 5.197z"/>
                                                        </svg></figcaption>
                                                    </figure>
                                                </div>
                                                <div class="vr"></div>
                                                <div class="col  px-2">
                                                  {{-- afternoon --}}
                                                  <p class="card-text"><small class="text-muted">Afternoon(12:00 -
                                                    5:59pm)
                                                </small></p>
                                                <figure>
                                                  <svg class="hrs24icon" viewbox="0 0 100 100">
                                                    <use xlink:href="#sun"/>
                                                  </svg>
                                                  <figcaption class="text-center fw-bold text-muted">Sunny</figcaption>
                                                </figure>
                                            <h5 class="fw-bold text-center">
                                                31°C
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
                                                  <small class="text-muted fw-bold">Wind(SW-12m/s)</small> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-circle-fill  bouncingSW-arrow " viewBox="0 0 16 16">
                                                    <path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8zm5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707l-4.096 4.096z"/>
                                                  </svg> </figcaption>
                                            </figure>
                                                </div>
                                                <div class="vr"></div>
                                                <div class="col px-2">
                                                  <p class="card-text"><small class="text-muted"> Evening(6:00 -
                                                    11:59pm)
                                                </small></p>
                                             <!-- Partly Cloudy Night -->
                                <figure>
                                  <svg class="hrs24icon" viewbox="0 0 100 100">
                                    <use xlink:href="#moon" x="-20" y="-15"/>
                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                    <use xlink:href="#whiteCloud" x="7" />
                                  </svg>
                                  <figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
                                </figure>
                                            <h5 class="fw-bold text-center">
                                                15°C
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
                                                <figcaption><small class="text-muted fw-bold">Wind(SE-08m/s)</small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-left-circle-fill bouncingSE-arrow" viewBox="0 0 16 16">
                                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-5.904 2.803a.5.5 0 1 0 .707-.707L6.707 6h2.768a.5.5 0 1 0 0-1H5.5a.5.5 0 0 0-.5.5v3.975a.5.5 0 0 0 1 0V6.707l4.096 4.096z"/>
                                                </svg></figcaption>
                                            </figure>

                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{-- 5- days forecast --}}
                        <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-4 col-xlg-4">
                          <div class="card rounded-4 bg-success text-white btn" > 
                            <div class="card-body">
                              <h5 class="card-title text-white fw-bold"><div class="spinner-grow spinner-grow-sm text-white" role="status">
                                <span class="visually-hidden">Loading...</span>
                              </div> Warning</h5>
                              <h5 class="text-white fw-bold text-center">Impact: Low </h5>
                            </div>
                          </div>
                          <br>
                          {{-- map --}}
                          .<div class="card text-center">
                            {{-- <div class="card-body"> --}}
                             {{-- <h4 class="card-title">Title</h4>
                             <p class="card-text">Body</p> --}}
                           <div id="map" 
                           style=" width: 600px; 
                           height: 700px;">
                           </div> 
                         {{-- </div> --}}
                         </div>


                        </div>
                    </div>
                </div>
               
                <div class="content day5-content ">
                  <div class="mb-3">
                    <label for="selectDistric" class="form-label fw-bold fs-2">Select District</label> 
                  <select class="form-select form-select-lg" id="selectDistric" aria-label="Small select">
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
                  </select>
                 </div> 
                 <div class="card rounded-2 h-100" style="background-color: #EAECEF">
                                
                    <div class="card-body">
                        <h5 class="text-muted fw-bold">5-Days-Forecast</h5>
  
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item my-4" style="background-color: #EAECEF">
                            <div class="d-flex justify-content-evenly bd-highlight"><!-- New -->
                              <div class="text-dark fw-bold fs-3">Mon</div>
                              <div class="text-dark fw-bold">
                                <figure>
                                  <svg class="icon5day" viewbox="0 0 100 100">
                                    <use xlink:href="#moon" x="-20" y="-15"/>
                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                    <use id="drop3" xlink:href="#rainDrop" x="45" y="65"/>
                                    <use xlink:href="#whiteCloud" x="7" />
                                  </svg>
                                  <figcaption class="figure-caption">Showers-Night</figcaption>
                                </figure>
                              </div>
                              <div class="text-dark fw-bold fs-3"> 15°C - 18°C</div>
                            </div>
                          </li>
                          <li class="list-group-item my-4" style="background-color: #EAECEF">
                            <div class="d-flex justify-content-evenly bd-highlight"><!-- New -->
                              <div class="text-dark fw-bold fs-3">Tue</div>
                              <div class="text-dark fw-bold ">
                                <figure>
                                  <svg class="icon5day" viewbox="0 0 100 100">
                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
                                    <use xlink:href="#whiteCloud" x="7" />
                                    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
                                  </svg>
                                  <figcaption class="figure-caption">Thunderstorm</figcaption>
                                </figure>
                              </div>
                              <div class="text-dark fw-bold fs-3">25°C - 28°C</div>
                            </div>
                          </li>
                          <li class="list-group-item my-4" style="background-color: #EAECEF">
                            <div class="d-flex justify-content-evenly bd-highlight"><!-- New -->
                              <div class="text-dark fw-bold fs-3">Wed</div>
                              <div class="text-dark fw-bold ">
                                <figure>
                                  <svg class="icon5day" viewbox="0 0 100 100">
                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
                                    <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
                                    <use id="mist" xlink:href="#mist" x="0" y="30"/>
                                  </svg>
                                  <figcaption class="figure-caption">Fog</figcaption>
                                </figure>
                              </div>
                              <div class="text-dark fw-bold fs-3">18°C - 23°C</div>
                            </div>
                          </li>
                          <li class="list-group-item my-4" style="background-color: #EAECEF">
                            <div class="d-flex justify-content-evenly bd-highlight"><!-- New -->
                              <div class="text-dark fw-bold fs-3">Thu</div>
                              <div class="text-dark fw-bold">
                                <figure>
                                  <svg class="icon5day" viewbox="0 0 100 100">
                                    <use xlink:href="#moon" x="-15"/>
                                    <use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
                                    <use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
                                    <use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
                                  </svg>
                                  <figcaption class="figure-caption">Clear-Night</figcaption>
                                </figure>

                              </div>
                              <div class="text-dark fw-bold fs-3">35°C - 37°C</div>
                            </div>
                          </li>
                          <li class="list-group-item my-4" style="background-color: #EAECEF">
                            <div class="d-flex justify-content-evenly bd-highlight"><!-- New -->
                              <div class="text-dark fw-bold fs-3">Fri</div>
                              <div class="text-dark fw-bold">
                                <figure>
                                  <svg class="icon5day" viewbox="0 0 100 100">
                                    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
                                    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
                                    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
                                    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
                                    <use xlink:href="#whiteCloud" x="5" y="-7"/>
                                  </svg>
                                  <figcaption class="figure-caption">Rain</figcaption>
                                </figure>
                              </div>
                              <div class="text-dark fw-bold fs-3">26°C - 30°C</div>
                            </div>
                          </li>
                        </ul>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                      <label for="selectedDist" class="form-label fw-bold fs-3"> Select District:</label>
                      <select class="form-select" aria-label="Default select" id="selectedDist">
                        <option selected="">Select District</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
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
                                      <!-- Sunny -->
                                      <figure> 
                                        <svg class="districtsicon" viewbox="0 0 100 100">
                                            <use xlink:href="#sun" />
                                        </svg>
                                    </figure>
                                    </div>
                                    <div class="col-4 align-self-start">
                                      {{-- location --}}
                                      <h4 class="card-title text-left">Accra  <i class='bi bi-cursor fs-6'></i></h4>
                                      <p class="card-text text-left">10:20 AM</p>
                                    </div>
                                    <div class="col  ">
                                      {{-- temperature --}}
                                      <h3 class="fw-bold" style="font-size: 30px; text-align: right">
                                        31°C
                                    </h3>
                                       </div>
                                  </div>
                                  
                                </div>
                              </div>  {{--end of card 1--}}
 {{-- card 2 --}} 
 <div class="card my-2" style="border-radius: 20px;">
  <div class="card-body">
    <div class="d-flex">
      <div class="col-3">
        {{-- weather condition --}}
        {{-- rainy --}}
        <figure>
          <svg class="districtsicon" viewbox="0 0 100 100">
            <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
            <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
            <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
            <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
            <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
            <use xlink:href="#whiteCloud" x="5" y="-7"/>
          </svg>
        </figure>
      </div>
      <div class="col-4 align-self-start">
        {{-- location --}}
        <h4 class="card-title text-left">Kumasi  <i class='bi bi-cursor fs-6'></i></h4>
        <p class="card-text text-left">10:20 AM</p>
      </div>
      <div class="col  ">
        {{-- temperature --}}
        <h3 class="fw-bold" style="font-size: 30px; text-align: right">
          19°C
      </h3>
         </div>
    </div>
    
  </div>
</div>  {{--end of card 2--}}
 {{-- card 3 --}} 
                            <div class="card my-2" style="border-radius: 20px;">
                                <div class="card-body">
                                  <div class="d-flex">
                                    <div class="col-3">
                                      {{-- weather condition --}}
                                      <figure>
                                        <svg class="districtsicon wind" viewBox="0 0 100 100"
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
                                    </figure>
                                    </div>
                                    <div class="col-4 align-self-start">
                                      {{-- location --}}
                                      <h4 class="card-title text-left">Takoradi  <i class='bi bi-cursor fs-6'></i></h4>
                                      <p class="card-text text-left">10:20 AM</p>
                                    </div>
                                    <div class="col  ">
                                      {{-- temperature --}}
                                      <h3 class="fw-bold" style="font-size: 30px; text-align: right">
                                        24°C
                                    </h3>
                                       </div>
                                  </div>
                                  
                                </div>
                              </div>  {{--end of card 3--}}
                               {{-- card 4 --}} 
                            <div class="card my-2" style="border-radius: 20px;">
                                <div class="card-body">
                                  <div class="d-flex">
                                    <div class="col-3">
                                      {{-- weather condition --}}
                                      <figure>
                                        <svg class="districtsicon" viewbox="0 0 100 100">
                                          <use xlink:href="#moon" x="-20" y="-15"/>
                                          <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                          <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
                                          <use id="drop3" xlink:href="#rainDrop" x="45" y="65"/>
                                          <use xlink:href="#whiteCloud" x="7" />
                                        </svg>
                                        <figcaption class="figure-caption">Showers-Night</figcaption>
                                      </figure>
                                    </div>
                                    <div class="col-4 align-self-start">
                                      {{-- location --}}
                                      <h4 class="card-title text-left">Bole  <i class='bi bi-cursor fs-6'></i></h4>
                                      <p class="card-text text-left">10:20 AM</p>
                                    </div>
                                    <div class="col  ">
                                      {{-- temperature --}}
                                      <h3 class="fw-bold" style="font-size: 30px; text-align: right">
                                        33°C
                                    </h3>
                                       </div>
                                  </div>
                                  
                                </div>
                              </div>  {{--end of card 4--}}
                            </div>  {{-- end of districts list --}} 

                        
                      </div>  {{--end of  districts list container--}} 
                      {{-- side district--}}
                      <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-4 col-xlg-4">
                        <div class="card">
                          
                          <div class="card-body">
                            <div class="d-flex">
<div class="col-6 align-self-start">
                                      {{-- location --}}
                                      <h4 class="card-title text-left fw-bold">Accra  </h4>
                                      <p class="card-text text-left">chance of rain: 20%</p>
                                      {{-- temperature --}}
                                      <h3 class="fw-bold" style="font-size: 30px; text-align: left">
                                        31°C
                                    </h3>
                                    </div>
<div class="col-6">
   <!-- Sunny -->
   <figure> 
    <svg class="districtsiconSide" viewbox="0 0 100 100">
        <use xlink:href="#sun" />
    </svg>
</figure>
</div>
                            </div>
                             </div>
<hr>
{{-- 24hr forecast for district page  --}}
<h5 class="fw-bold p-2"> Today's Forecast</h5>
<div class="d-flex justify-content-center bd-highlight mb-2">
  {{-- morning --}}
  <div class="col  px-2">
      <p class="card-text"><small class="text-muted"> Morning(6:00 -
              11:59am)
          </small></p>
      <figure>
          <svg class="hrs24icon" viewbox="0 0 100 100">
              <use xlink:href="#grayCloud" class="small-cloud"
                  fill="url(#gradGray)" />
              <use xlink:href="#whiteCloud" x="7" />
          </svg>
          <figcaption class="text-center fw-bold text-muted">Few Clouds</figcaption>
      </figure>
      <h5 class="fw-bold text-center">
          24°C
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
          <figcaption><small class="text-muted fw-bold">Wind(NW-10m/s)</small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-circle-fill bouncingNW-arrow" viewBox="0 0 16 16">
            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm5.904-2.803a.5.5 0 1 0-.707.707L9.293 10H6.525a.5.5 0 0 0 0 1H10.5a.5.5 0 0 0 .5-.5V6.525a.5.5 0 0 0-1 0v2.768L5.904 5.197z"/>
          </svg></figcaption>
      </figure>
  </div>
  <div class="vr"></div>
  <div class="col  px-2">
    {{-- afternoon --}}
    <p class="card-text"><small class="text-muted">Afternoon(12:00 -
      5:59pm)
  </small></p>
  <figure>
    <svg class="hrs24icon" viewbox="0 0 100 100">
      <use xlink:href="#sun"/>
    </svg>
    <figcaption class="text-center fw-bold text-muted">Sunny</figcaption>
  </figure>
<h5 class="fw-bold text-center">
  31°C
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
    <small class="text-muted fw-bold">Wind(SW-12m/s)</small> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-circle-fill  bouncingSW-arrow " viewBox="0 0 16 16">
      <path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8zm5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707l-4.096 4.096z"/>
    </svg> </figcaption>
</figure>
  </div>
  <div class="vr"></div>
  <div class="col px-2">
    <p class="card-text"><small class="text-muted"> Evening(6:00 -
      11:59pm)
  </small></p>
<!-- Partly Cloudy Night -->
<figure>
<svg class="hrs24icon" viewbox="0 0 100 100">
<use xlink:href="#moon" x="-20" y="-15"/>
<use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
<use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption class="text-center fw-bold text-muted">Partly Cloudy Night</figcaption>
</figure>
<h5 class="fw-bold text-center">
  15°C
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
  <figcaption><small class="text-muted fw-bold">Wind(SE-08m/s)</small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-left-circle-fill bouncingSE-arrow" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-5.904 2.803a.5.5 0 1 0 .707-.707L6.707 6h2.768a.5.5 0 1 0 0-1H5.5a.5.5 0 0 0-.5.5v3.975a.5.5 0 0 0 1 0V6.707l4.096 4.096z"/>
  </svg></figcaption>
</figure>

  </div>
</div>
<hr>
{{-- 5-days forecast for district page  --}}
<h5 class="fw-bold p-2"> 5-Days Forecast</h5>
<ul class="list-group list-group-flush">
  {{--  today--}}
 
    <ul class="list-group list-group-horizontal">
      <li class="list-group-item"> 
        {{--day--}}
        <h5 class=" text-left">Now</h5></li>

      <li class="list-group-item"> 
         <!-- Sunny -->
        <figure> 
          <svg class="districtsicon" viewbox="0 0 100 100">
              <use xlink:href="#sun" />
          </svg>
          <figcaption class="text-center fw-bold">Sunny</figcaption>
      </figure></li>
      <li class="list-group-item"> {{-- temperature --}}
        <h5 class="fw-bold" style="font-size: 20px; ">
          27°C / 31°C
      </h5></li>
    </ul>
{{-- endo of today --}}

    {{--  tues--}}
   
      <ul class="list-group list-group-horizontal">
        <li class="list-group-item"> 
          {{--day--}}
          <h5 class=" text-left">Tue</h5></li>
  
        <li class="list-group-item"> 
           <!-- Sunny -->
          <figure> 
            <svg class="districtsicon" viewbox="0 0 100 100">
                <use xlink:href="#sun" />
            </svg>
            <figcaption class="text-center fw-bold">Sunny</figcaption>
        </figure></li>
        <li class="list-group-item"> {{-- temperature --}}
          <h5 class="fw-bold" style="font-size: 20px; ">
            27°C / 31°C
        </h5></li>
      </ul>
  {{-- endo of tues --}}
  
   {{--  wed--}}
  
    <ul class="list-group list-group-horizontal">
      <li class="list-group-item"> 
        {{--day--}}
        <h5 class=" text-left">Wed</h5></li>

      <li class="list-group-item"> 
         <!-- Sunny -->
        <figure> 
          <svg class="districtsicon" viewbox="0 0 100 100">
              <use xlink:href="#sun" />
          </svg>
          <figcaption class="text-center fw-bold">Sunny</figcaption>
      </figure></li>
      <li class="list-group-item"> {{-- temperature --}}
        <h5 class="fw-bold" >
          27°C / 31°C
      </h5></li>
    </ul>
{{-- endo of wed --}}
 

    <ul class="list-group list-group-horizontal">
      <li class="list-group-item"> 
        {{--day--}}
        <h5 class=" text-left">Thu</h5></li>

      <li class="list-group-item"> 
         <!-- Sunny -->
        <figure> 
          <svg class="districtsicon" viewbox="0 0 100 100">
              <use xlink:href="#sun" />
          </svg>
          <figcaption class="text-center fw-bold">Sunny</figcaption>
      </figure></li>
      <li class="list-group-item"> {{-- temperature --}}
        <h5 class="fw-bold">
          27°C / 31°C
      </h5></li>
    </ul>
{{-- endo of thursday --}}
 

  {{--  fri--}}
  
    <ul class="list-group list-group-horizontal">
      <li class="list-group-item"> 
        {{--day--}}
        <h5 class=" text-left">Fri</h5></li>

      <li class="list-group-item"> 
         <!-- Sunny -->
        <figure> 
          <svg class="districtsicon" viewbox="0 0 100 100">
              <use xlink:href="#sun" />
          </svg>
          <figcaption class="text-center fw-bold">Sunny</figcaption>
      </figure></li>
      <li class="list-group-item"> {{-- temperature --}}
        <h5 class="fw-bold" >
          27°C / 31°C
      </h5></li>
    </ul>
{{-- endo of fri --}}


</ul>


 
                        </div>
                        <div>
                    </div>
                  </div>
                   </div>
                </div>
                 <div class="content seasonal-content">seasonal-content goes here
                  
                 </div>
                 <div class="content marine-content">marine content goes here</div>
                 
                <div class="content feedback-content">feedback content goes here</div>
                
            </div>

        </div>
    </section>
     <script>
      
     </script>
</body>

</html>
