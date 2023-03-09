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

  <!-- Scripts -->
  @vite(['resources/sass/app.scss','resources/css/index.css', 'resources/js/app.js', 'resources/js/index.js'])
 
  </head>
  <body class="container-fluid bg-light">
      {{-- @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
              <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
          @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
              @endif
          @endauth
      </div>
  @endif --}}
  {{-- <div class="col-xs-6">
      <select class="form-control" name="select1" id="select1">
        <option value="1">Fruit</option>
        <option value="2">Animal</option>
        <option value="3">Bird</option>
        <option value="4">Car</option>
      </select>
    </div> --}}
    
<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white ">
    <div class="position-sticky">
      <h5 class="font-weight-bold, px-3 py-1 mt-3 pt-3" style="font-weight: bold; color: blue;">Request Service Form</h5>
      <div class="list-group list-group-flush mx-3 mt-4">
        
      <div class="list-group-item list-group-item-action py-2 " >
          <div class="form-group">
                  <label for="selectProduct" style="font-size: 15px; font-weight: bold;">Select Product</label>
                  <select class="form-select" id="selectProduct" >
                    <option>Daily Forecast</option>
                    <option>Seasonal Forecast</option>
                    <option>Marine Forecast</option>
                  </select>
                </div>
</div>
<div class="list-group-item list-group-item-action py-2  " >
  <div class="form-group">
      <label for="selectProduct" style="font-size: 15px; font-weight: bold;">Select District</label>
      <select class="form-select" id="selectProduct" aria-label="size 5 select example">
        <option>Accra</option>
        <option>Ada</option>
        <option>Kumasi</option>
      </select>
    </div>
      
  </div>
  <div class="list-group-item list-group-item-action py-2  " >
  <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-primary" type="button">Request</button>
    </div>
  </div>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->
  
  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      {{-- thunderstorm with rain/ thunderstorm with ligthing / thunderstorm with  --}}



      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
      <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand mx-3 px-3" href="{{ url('/') }}">
          {{ config('app.name', 'Gmet') }}
      </a>
        
      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
              <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.476.476 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.602.602 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.453.453 0 0 0 .138-.326ZM5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.702.702 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52l.761.325Z"/>
              <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.882.882 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a6.998 6.998 0 0 1 3.425 7.692 1.015 1.015 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a.998.998 0 0 0 .283.126 7.001 7.001 0 0 1-9.49-3.409Z"/>
            </svg>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#"> 24-Hours Forecast</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">5-Days Forecast</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Marine Forecast</a>
            </li>
          </ul>
        </li>
 
        <!-- Icon dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
              <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
              <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
            </svg>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#"
                >
                
                English
                <i class="fa fa-check text-success ms-2"></i
              ></a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>French</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-china flag"></i>Twi</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>Ga</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Ewe</a>
            </li>
            
          </ul>
        </li>

        <!-- Avatar -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Login</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Register</a>
            </li>
            
          </ul>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="mt-4 py-3" >
  <div class="container my-3" >
      <!-- Nav tabs -->
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="pill" href="#msg">Daily Forecast</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="pill" href="#pro">Seasonal Forecast</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="pill" href="#set">Marine Forecast</a>
        </li>
      </ul>
      <div class="tab-content bg-white">
        <div class="tab-pane container active" id="msg">
          <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0">
  <defs>
  <radialGradient id="gradYellow" cx="50%" cy="50%" r="80%" fx="90%" fy="80%">
    <stop offset="0%" style="stop-color:yellow; stop-opacity:1" />
    <stop offset="100%" style="stop-color:orange ;stop-opacity:1" />
  </radialGradient>
  <radialGradient id="gradDarkGray" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
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
  <line x1="59" y1="29" x2="66" y2="13" class="shortRay"/>
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
  <path d="M60,20 A30,30 0 1,0 90,65 22,22 0 1,1 60,20z" fill="url(#gradYellow)"/>
</symbol>

<!-- Star -->
<symbol id="star">
  <polygon points="5,0 2,10 10,4 0,4 8,10" style="fill:url(#gradYellow);fill-rule:nonzero;"/>
</symbol>
  
<!-- Small Gray Cloud -->
<symbol id="grayCloud">
  <path  d="M20,15 Q25,0 45,11 Q60,5 60,20 A30,15 5 1,1 20,15 Z" />
</symbol>

<!-- White Cloud -->
<symbol id="whiteCloud">
  <path fill="url(#gradWhite)" d="M11,47 Q13,37 21,42 Q31,30 41,38 A28,21 -25 1,1 35,75 Q23,85 19,73 A12,12 0 0,1 11,47Z" />
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
          <div class="card mt-2 py-2">
              <h5 class="card-header text-left">DAILY FORECAST - Accra</h5>
              <div class="card-body ">
                <h6 class="card-title">Issued On: <span class="text-success">11th February 2023</span> </h6>
                <h6 class="card-title">Valid till :  <span class="text-danger"> 12th February 2023 @ 11:59pm (24hrs)</span> </h6>
                <p class="text-primary"> <h5>Weather Summary:</h5> </p>
                
                <div class="row row-cols-1 row-cols-md-2 g-4 bg-white">
                  <div class="col">
                      <div class="card text-white bg-primary  mb-3 shadow rounded-3" style="max-width: 18rem;">
                          <div class="card-header ">Morning (6:00am-12:00pm)</div>
                          <div class="card-body">
     <h5 class="card-title">
      <div class="row">
                              <!-- Dark clouds -->
<div class="col-6">
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Dark Clouds</figcaption>
</figure> 
</div>
<div class="col-6">
<h1> 16°C</h1>
</div>
</div>
</h5>
        <p class="card-text" style="font-weight-bold">
          {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>
          {{-- south-west --}}
         10-Knots  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-circle-fill  bouncing-arrow" viewBox="0 0 16 16">
          <path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8zm5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707l-4.096 4.096z"/>
        </svg> 
       </p>
                          </div>
                        </div>
                  </div>

                  {{--  few clouds--}}
                  <div class="col">
                      <div class="card text-white bg-primary mb-3 shadow rounded-3" style="max-width: 18rem;">
                          <div class="card-header">Afternoon( 12:00pm-6:00pm )</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                          <!-- Few clouds -->
                        <div class="col-6">
                         <figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Few Clouds</figcaption>
</figure>
                        </div>
                        <div class="col-6">
                        <h1> 08°C</h1>
                        </div>
                        </div>
                        </h5>

                            <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg> 10-Knots 
                              {{-- north easterly --}}
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-left-circle-fill bouncingN-arrow" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-5.904-2.803a.5.5 0 1 1 .707.707L6.707 10h2.768a.5.5 0 0 1 0 1H5.5a.5.5 0 0 1-.5-.5V6.525a.5.5 0 0 1 1 0v2.768l4.096-4.096z"/>
                            </svg> </p>
                          </div>
                        </div>
                  </div>
                  <div class="col">
                      <div class="card text-white bg-dark mb-3 shadow rounded-3" style="max-width: 18rem;">
                          <div class="card-header">Evening ( 6:00pm-11:59pm )</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                         
                        <div class="col-6">
                          <!-- Sunny -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun"/>
  </svg>
  <figcaption>Sunny</figcaption>
</figure>
                        </div>
                        <div class="col-6">
                        <h1> 38°C</h1>
                        </div>
                        </div>
                        </h5>
                            
                            <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg> 10-Knots 
{{-- north westerly --}}
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-circle-fill bouncingN-arrow" viewBox="0 0 16 16">
  <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm5.904-2.803a.5.5 0 1 0-.707.707L9.293 10H6.525a.5.5 0 0 0 0 1H10.5a.5.5 0 0 0 .5-.5V6.525a.5.5 0 0 0-1 0v2.768L5.904 5.197z"/>
</svg>

</p>
                          </div>
                        </div>
                  </div>
                  <div class="col">
                      <div class="card text-white bg-dark mb-3 shadow rounded-3" style="max-width: 18rem;">
                          <div class="card-header">Morning (12:00amm-06:00am)</div>
                              <div class="card-body">
                                <h5 class="card-title">
                                  <div class="row">
                                             
                            <div class="col-6">
                                                         <!-- Patchy Drizzle Day -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#rainDrizzle" x="25" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Drizzle Day</figcaption>
</figure>
                            </div>
                            <div class="col-6">
                            <h1> 26°C</h1>
                            </div>
                            </div>
                            </h5>
                               
                            <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg> 10-Knots 
{{-- ssouth easterly --}}

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-left-circle-fill bouncing-arrow" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-5.904 2.803a.5.5 0 1 0 .707-.707L6.707 6h2.768a.5.5 0 1 0 0-1H5.5a.5.5 0 0 0-.5.5v3.975a.5.5 0 0 0 1 0V6.707l4.096 4.096z"/>
</svg>
</p>
                          </div>
                  </div>
                </div>
                {{--  --}}
                <div class="col">
                  <div class="card text-white bg-danger mb-3 shadow rounded-3" style="max-width: 18rem;">
                      <div class="card-header">Afternoon(12:00pm-3:00pm)</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                         
                        <div class="col-6">
                          <!-- Partly Cloudy Day -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Partly Cloudy Day</figcaption>
</figure>
                        </div>
                        <div class="col-6">
                        <h1> 16°C</h1>
                        </div>
                        </div>
                        </h5>
                           
                        <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg> 10-Knots 
{{-- north --}}
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill bouncingN-arrow" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
</svg>
</p>
                      </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-white bg-danger mb-3 shadow rounded-3" style="max-width: 18rem;">
                  <div class="card-header"> Afternoon(03:00pm-05:06pm)</div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <div class="row">
                                     
                    <div class="col-6">
                     <!-- Patchy Rain Day -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="45" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Rain Day</figcaption>
</figure>
                    </div>
                    <div class="col-6">
                    <h1> 19°C</h1>
                    </div>
                    </div>
                    </h5>
                  
                    <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>10-Knots 
{{-- west --}}
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill bouncing-arrow" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
 </p>
                  </div>
          </div>
        </div>
        <div class="col">
                  <div class="card text-dark bg-white mb-3 shadow rounded-3" style="max-width: 18rem;">
                      <div class="card-header">Evening(6:00pm-11:59am)</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                         {{-- Clear Night --}}
                        <div class="col-6">
                         <figure>
                                  <svg class="icon" viewbox="0 0 100 100">
                                    <use xlink:href="#moon" x="-15"/>
                                    <use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
                                    <use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
                                    <use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
                                  </svg>
                                  <figcaption>Clear Night</figcaption>
                                </figure>
                        </div>
                        <div class="col-6">
                        <h1> 36°C</h1>
                        </div>
                        </div>
                        </h5>
                        <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg> 10-Knots 
{{-- south --}}
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill bouncing-arrow" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
</svg>
</p>
                      </div>
              </div>
            </div>
            <div class="col">
                  <div class="card text-dark bg-white mb-3 shadow rounded-3" style="max-width: 18rem;">
                      <div class="card-header">Evening(6:00pm-11:59am)</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                         
                        <div class="col-6">
                         <!-- Partly Cloudy Night -->
                                <figure>
                                  <svg class="icon" viewbox="0 0 100 100">
                                    <use xlink:href="#moon" x="-20" y="-15"/>
                                    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
                                    <use xlink:href="#whiteCloud" x="7" />
                                  </svg>
                                  <figcaption>Partly Cloudy Night</figcaption>
                                </figure>
                        </div>
                        <div class="col-6">
                        <h1> 37°C</h1>
                        </div>
                        </div>
                        </h5>
                            
                      
                        <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg> 10-Knots 
{{-- east --}}
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill bouncing-arrow" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg>

</p>
                      </div>
              </div>
            </div>
            <div class="col">
                  <div class="card text-white bg-warning mb-3 shadow rounded-3" style="max-width: 18rem;">
                      <div class="card-header">Evening(6:00pm-11:59am)</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                         
                        <div class="col-6">
                          <!-- Patchy Rain Night -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="45" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Rain Night</figcaption>
</figure>
                        </div>
                        <div class="col-6">
                        <h1> 20°C</h1>
                        </div>
                        </div>
                        </h5> 
                      
                        <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>10-Knots Moderate </p>
                      </div>
              </div>
            </div>
            <div class="col">
                  <div class="card text-white bg-warning mb-3 shadow rounded-3" style="max-width: 18rem;">
                      <div class="card-header">Monday Evening (6:00pm-11:59am)</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                         
                        <div class="col-6">
                         <!-- Patchy Drizzle Night -->
<figure>
<svg class="icon" viewbox="0 0 100 100">
  <use xlink:href="#moon" x="-20" y="-15"/>
  <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
  <use xlink:href="#rainDrizzle" x="25" y="65"/>
  <use xlink:href="#rainDrizzle" x="40" y="65"/>
  <use xlink:href="#whiteCloud" x="7" />
</svg>
<figcaption>Patchy Drizzle Night</figcaption>
</figure>
                        </div>
                        <div class="col-6">
                        <h1> 22°C</h1>
                        </div>
                        </div>
                        </h5>

                      
                        <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>10-Knots Moderate</p>
                      </div>
              </div>
            </div>
            <div class="col">
                  <div class="card text-white bg-success mb-3 shadow rounded-3" style="max-width: 18rem;">
                      <div class="card-header">Monday Evening (6:00pm-11:59am)</div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <div class="row">
                                         
                        <div class="col-6">
                          <!-- Rain -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg>
  <figcaption>Rain</figcaption>
</figure>
                        </div>
                        <div class="col-6">
                        <h1> 16°C</h1>
                        </div>
                        </div>
                        </h5> 
                      
                        <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>10-Knots Strong</p>
                      </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-white bg-success mb-3 shadow rounded-3" style="max-width: 18rem;">
                  <div class="card-header">Monday Evening (6:00pm-11:59am)</div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <div class="row">
                                     
                    <div class="col-6">
                     <!-- Drizzle -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#rainDrizzle" x="15" y="65"/>
    <use xlink:href="#rainDrizzle" x="25" y="65"/>
    <use xlink:href="#rainDrizzle" x="35" y="65"/>
    <use xlink:href="#rainDrizzle" x="45" y="65"/>
    <use xlink:href="#whiteCloud" x="10" y="-10"/>
  </svg>
  <figcaption>Drizzle</figcaption>
</figure>
                    </div>
                    <div class="col-6">
                    <h1> 30°C</h1>
                    </div>
                    </div>
                    </h5>
                        
                    <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>10-Knots Light</p>
                  </div>
          </div>
        </div>

<div class="col">
              <div class="card text-dark bg-light mb-3 shadow rounded-3" style="max-width: 18rem;">
                  <div class="card-header">Monday
                      Morning ( 6:00am-11:59am )</div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <div class="row">
                                     
                    <div class="col-6">
                      <!-- Thunderstorm -->
                     <figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
    <use xlink:href="#whiteCloud" x="7" />
    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
  </svg>
  <figcaption>Thunderstorm</figcaption>
</figure>
                    </div>
                    <div class="col-6">
                    <h1> 26°C</h1>
                    </div>
                    </div>
                    </h5>
                           
                  
                    <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>10-Knots Moderate</p>
                  </div>
          </div>
        </div>
        
        <div class="col">
              <div class="card text-dark bg-light mb-3 shadow rounded-3" style="max-width: 18rem;">
                  <div class="card-header">Monday Morning (6:00am-11:59am )</div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <div class="row">
                                     
                    <div class="col-6">
                     <!-- Mist Cloud -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
    <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
    <use id="mist" xlink:href="#mist" x="0" y="30"/>
  </svg>
  <figcaption>Mist/Fog</figcaption>
</figure>
                    </div>
                    <div class="col-6">
                    <h1> 18°C</h1>
                    </div>
                    </div>
                    </h5>
                        
                    <p class="card-text" style="font-weight-bold">   {{-- wind --}}
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
  <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>
</svg>10-Knots Strong </p>
                  </div>
          </div>
        </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button">Send Fedback</button>
                <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdvisories" aria-expanded="false" aria-controls="collapseAdvisories">Warning</button>
              </div>

              <div class="collapse m-2 p-2" id="collapseAdvisories">
                <div class="card card-body">
                  Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
              </div>
            </div>
        </div>
        <div class="tab-pane container fade" id="pro">This is a seasonal tab using pill data-toggle attribute.</div>
        <div class="tab-pane container fade" id="set">This is a marine tab using pill data-toggle attribute.</div>
      </div>
      </div>
</main>
<!--Main layout-->


<!-------------------- ICONS--------------------->

<!-- Partly Cloudy Day -->
{{-- <figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Partly Cloudy Day</figcaption>
</figure>

<!-- Patchy Rain Day -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="45" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Rain Day</figcaption>
</figure>



<!-- Patchy Snow Day -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="snowFlake2" xlink:href="#snowFlake" x="30" y="65"/>
    <use id="snowFlake4" xlink:href="#snowFlake" x="45" y="65"/>
    <use id="snowFlake5" xlink:href="#snowFlake" x="58" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Snow Day</figcaption>
</figure>

<!-- Patchy Sleet Day -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#sun" x="-12" y="-18"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="snowFlake2" xlink:href="#snowFlake" x="35" y="65"/>
    <use id="snowFlake4" xlink:href="#snowFlake" x="50" y="65"/>
    <use xlink:href="#rainDrizzle" x="25" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Sleet Day</figcaption>
</figure>

<!-- Moon -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-15"/>
    <use xlink:href="#star" x="42" y="30" class="stars animated infinite flash"/>
    <use xlink:href="#star" x="61" y="32" class="stars animated infinite flash delay-1s"/>
    <use xlink:href="#star" x="55" y="50" class="stars animated infinite flash delay-2s"/>
  </svg>
  <figcaption>Clear Night</figcaption>
</figure>

<!-- Partly Cloudy Night -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Partly Cloudy Night</figcaption>
</figure>

<!-- Patchy Rain Night -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="45" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Rain Night</figcaption>
</figure>

<!-- Patchy Drizzle Night -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#rainDrizzle" x="25" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Drizzle Night</figcaption>
</figure>

<!-- Patchy Snow Night -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="snowFlake2" xlink:href="#snowFlake" x="30" y="65"/>
    <use id="snowFlake4" xlink:href="#snowFlake" x="45" y="65"/>
    <use id="snowFlake5" xlink:href="#snowFlake" x="58" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Snow Night</figcaption>
</figure>

<!-- Patchy Sleet Night -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#moon" x="-20" y="-15"/>
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use id="snowFlake2" xlink:href="#snowFlake" x="35" y="65"/>
    <use id="snowFlake4" xlink:href="#snowFlake" x="50" y="65"/>
    <use xlink:href="#rainDrizzle" x="25" y="65"/>
    <use xlink:href="#rainDrizzle" x="40" y="65"/>
    <use xlink:href="#whiteCloud" x="7" />
  </svg>
  <figcaption>Patchy Sleet Night</figcaption>
</figure>

<!-- Rain -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="drop4" xlink:href="#rainDrop" x="15" y="65"/>
    <use id="drop1" xlink:href="#rainDrop" x="25" y="65"/>
    <use id="drop2" xlink:href="#rainDrop" x="37" y="65"/>
    <use id="drop3" xlink:href="#rainDrop" x="50" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg>
  <figcaption>Rain</figcaption>
</figure>

<!-- Drizzle -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#rainDrizzle" x="15" y="65"/>
    <use xlink:href="#rainDrizzle" x="25" y="65"/>
    <use xlink:href="#rainDrizzle" x="35" y="65"/>
    <use xlink:href="#rainDrizzle" x="45" y="65"/>
    <use xlink:href="#whiteCloud" x="10" y="-10"/>
  </svg>
  <figcaption>Drizzle</figcaption>
</figure>

<!-- Thunderstorm -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradGray)"/>
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use xlink:href="#thunderBolt" x="30" y="61" class="lighting animated infinite flash"/>
    <use xlink:href="#whiteCloud" x="7" />
    <use xlink:href="#thunderBolt" x="45" y="56" class="lighting animated infinite flash delay-1s"/>
  </svg>
  <figcaption>Thunderstorm</figcaption>
</figure>

<!-- Snow -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use id="snowFlake1" xlink:href="#snowFlake" x="20" y="55"/>
    <use id="snowFlake2" xlink:href="#snowFlake" x="35" y="65"/>
    <use id="snowFlake3" xlink:href="#snowFlake" x="45" y="60"/>
    <use id="snowFlake4" xlink:href="#snowFlake" x="50" y="65"/>
    <use id="snowFlake5" xlink:href="#snowFlake" x="63" y="65"/>
    <use xlink:href="#whiteCloud" x="10" y="-15"/>
  </svg>
  <figcaption>Snow</figcaption>
</figure>

<!-- Sleet -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="snowFlake1" xlink:href="#snowFlake" x="20" y="55"/>
    <use id="snowFlake2" xlink:href="#snowFlake" x="35" y="65"/>
    <use id="snowFlake3" xlink:href="#snowFlake" x="45" y="60"/>
    <use id="snowFlake4" xlink:href="#snowFlake" x="50" y="65"/>
    <use id="snowFlake5" xlink:href="#snowFlake" x="63" y="65"/>
    <use xlink:href="#rainDrizzle" x="15" y="65"/>
    <use xlink:href="#rainDrizzle" x="25" y="65"/>
    <use xlink:href="#rainDrizzle" x="35" y="65"/>
    <use xlink:href="#rainDrizzle" x="45" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg>
  <figcaption>Sleet</figcaption>
</figure>

<!-- Hail/Ice Pellets -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" x="25" y="10" class="reverse-small-cloud" fill="url(#gradDarkGray)"/>
    <use id="ice4" xlink:href="#icePellet" x="25" y="65"/>
    <use id="ice1" xlink:href="#icePellet" x="35" y="65"/>
    <use id="ice2" xlink:href="#icePellet" x="47" y="65"/>
    <use id="ice3" xlink:href="#icePellet" x="60" y="65"/>
    <use xlink:href="#whiteCloud" x="5" y="-7"/>
  </svg>
  <figcaption>Hail/Ice Pellets</figcaption>
</figure>

<!-- Mist Cloud -->
<figure>
  <svg class="icon" viewbox="0 0 100 100">
    <use xlink:href="#grayCloud" class="small-cloud" fill="url(#gradDarkGray)" x="0" y="20"/>
    <use xlink:href="#grayCloud" x="30" y="30" class="reverse-small-cloud" fill="url(#gradGray)"/>
    <use id="mist" xlink:href="#mist" x="0" y="30"/>
  </svg>
  <figcaption>Mist/Fog</figcaption>
</figure> --}}
  </body>
</html>
