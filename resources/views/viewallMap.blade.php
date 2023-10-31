<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'GmetWids') }}</title>
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
  
     <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
     <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/index.css', 'resources/js/app.js', 'resources/js/viewallMap.js'])

</head>

<body >
    <nav class="navbar nav-fixed navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('welcome') }}">GMet Wids</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse show" id="navbarDark">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('welcome') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('viewAllmap') }}">Maps</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li> --}}
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

          
<br>
<div class="container">
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  <strong> Weather Summary:</strong>
  @if(!empty($addDailyForecast->summary))
     {{-- The variable is not empty --}}
    {{ $addDailyForecast->summary}}
@else
     {{-- The variable is empty --}}
     {{ "No Summary Available" }}
@endif
</div>
<br>

<div class="row justify-content-center align-items-center g-2">
  <div class="col">
     {{-- Weather Forecasting Risk Table--}}
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

          
  </div>
   {{--================================ ======== --}}
  <div class="col">
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
  
  </div>

  {{-- <div class="col">Column</div> --}}
</div>


 
<br>
<div class="card-group">
    {{-- morning map --}}
    <div class="card"  style="width: 100%;
    height: 80vh;">
     <div class="card-body"  style="width: 100%;
     height: 70vh;">
        <h5 class="card-title fw-bold font-monospace text-center">Morning Map
           <div class="card-footer">
        <small class="text-muted text-center">Morning (6:00am - 11:59am)</small>
      </div>
        </h5>
        <p class="card-text">
            <div id="mapall1" style="position: relative; width: 100%; height: 100%;"></div>
        </p>
      </div>
     
    </div>
    <div class="card"  style="width: 100%;
    height: 80vh;">
    <div class="card-body"  style="width: 100%;
    height: 70vh;">
        <h5 class="card-title fw-bold font-monospace text-center">Afternoon Map
           <div class="card-footer">
        <small class="text-muted text-center">Afternoon (12:00pm - 5:59pm)</small>
      </div>
        </h5>
        <p class="card-text">
            <div id="mapall2" style="position: relative; width: 100%; height: 100%;"></div>
        </p>
      </div>
     
    </div>
    <div class="card"  style="width: 100%;
    height: 80vh;">
    <div class="card-body"  style="width: 100%;
    height: 70vh;">
        <h5 class="card-title fw-bold font-monospace text-center">Evening Map
           <div class="card-footer">
        <small class="text-muted text-center">Evening (6:00pm - 11:59pm)</small>
      </div>
        </h5>
        <p class="card-text">
            <div id="mapall3" style="position: relative; width: 100%; height: 100%;"></div>
        </p>
      </div>
     
    </div>
  </div>

  <br>
  <br>
  <br>
  <div id="polygonElementM" data-polygonM="{{ json_encode($polygonM) }}"    data-markerM="{{ json_encode($markersM)  }}"></div>
  <div id="polygonElementA" data-polygonA="{{ json_encode($polygonA) }}"    data-markerA="{{ json_encode($markersA)  }}"></div>
  <div id="polygonElementE" data-polygonE="{{ json_encode($polygonE) }}"    data-markerE="{{ json_encode($markersE)  }}"></div>
</div>
</body>

</html>
