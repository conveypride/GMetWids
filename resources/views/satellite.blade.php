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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/index.css', 'resources/js/app.js'])

    <style>
        * {box-sizing:border-box; font-family: 'Roboto', sans-serif;}

.main-container {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
/* Slideshow container */
.slideshow-container {
  max-width: 450px;
/*   position: relative; */
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.controls {
  position: relative;
  cursor: pointer;
  margin: 4px 2px;
  padding: 10px 20px;
  background-color: #6C63FF;
  color: white;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 16px;
  text-decoration: none;
  border: none;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
}

/* On hover, add a black background color with a little bit see-through */
.controls:hover {
  background-color: #3F3D56;
}

/* Hide Chrome default focus outline when a button is pressed */
.controls:focus {
  outline: none;
}

.controls:focus-visible {
  outline:outline: 3px solid black;
}


/* Caption text */
.text {
  color: black;
  font-size: 18px;
  margin-bottom: 12px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

#myProgress {
  width: 100%;
  background-color: #3F3D56;
}

#myBar {
  width: 0%;
  height: 3px;
  background-color: #6C63FF;
}


.slider-controls {
  width: 100%;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
}

@-webkit-keyframes fade {
  from {opacity: .9}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .9}
  to {opacity: 1}
}
    </style>





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

   <h4 class="fw-bold text-center"> Satellite Imagery</h4>
    <div class="main-container">
      <!-- Slideshow container -->
      <div class="slideshow-container">
        @if (!empty($satelliteforecast))
<div class="mySlidestext">
  @if (isset($satelliteforecast['0']))
       <input type="hidden" id="t1" value="{{ \Carbon\Carbon::parse($satelliteforecast['0']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['0']->time}}">
  @endif
  @if (isset($satelliteforecast['1']))
       <input type="hidden" id="t2" value="{{ \Carbon\Carbon::parse($satelliteforecast['1']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['1']->time}}">
  @endif 
  @if (isset($satelliteforecast['2']))
      <input type="hidden" id="t3" value="{{ \Carbon\Carbon::parse($satelliteforecast['2']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['2']->time}}"> 
  @endif

  @if (isset($satelliteforecast['3']))
      <input type="hidden" id="t4" value="{{ \Carbon\Carbon::parse($satelliteforecast['3']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['3']->time}}">
  @endif
  @if (isset($satelliteforecast['4']))
       <input type="hidden" id="t5" value="{{ \Carbon\Carbon::parse($satelliteforecast['4']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['4']->time}}">
  @endif
  @if (isset($satelliteforecast['5']))
      <input type="hidden" id="t6" value="{{ \Carbon\Carbon::parse($satelliteforecast['5']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['5']->time}}"> 
  @endif
          
  @if (isset($satelliteforecast['6']))
      <input type="hidden" id="t7" value="{{ \Carbon\Carbon::parse($satelliteforecast['6']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['6']->time}}">
  @endif
  @if (isset($satelliteforecast['7']))
       <input type="hidden" id="t8" value="{{ \Carbon\Carbon::parse($satelliteforecast['7']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['7']->time}}">
  @endif
  @if (isset($satelliteforecast['8']))
        <input type="hidden" id="t9" value="{{ \Carbon\Carbon::parse($satelliteforecast['8']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['8']->time}}">
  @endif
  @if (isset($satelliteforecast['9']))
      <input type="hidden" id="t10" value="{{ \Carbon\Carbon::parse($satelliteforecast['9']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['9']->time}}">
  @endif
        
  @if (isset($satelliteforecast['10']))
        <input type="hidden" id="t11" value="{{ \Carbon\Carbon::parse($satelliteforecast['10']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['10']->time}}">
  @endif

  @if (isset($satelliteforecast['11']))
        <input type="hidden" id="t12" value="{{ \Carbon\Carbon::parse($satelliteforecast['11']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['11']->time}}">
  @endif
  @if (isset($satelliteforecast['12']))
       <input type="hidden" id="t13" value="{{ \Carbon\Carbon::parse($satelliteforecast['12']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['12']->time}}">
  @endif
        
  @if (isset($satelliteforecast['13']))
       <input type="hidden" id="t14" value="{{ \Carbon\Carbon::parse($satelliteforecast['13']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['13']->time}}">
  @endif
         
  @if (isset($satelliteforecast['14']))
        <input type="hidden" id="t15" value="{{ \Carbon\Carbon::parse($satelliteforecast['14']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['14']->time}}">
  @endif
        
  @if (isset($satelliteforecast['15']))
      <input type="hidden" id="t16" value="{{ \Carbon\Carbon::parse($satelliteforecast['15']['created_at'])->format('d/m/Y') }} at {{ $satelliteforecast['15']->time}}"> 
  @endif
         
        </div>
       
        @foreach ($satelliteforecast as $satelliteImg)

        
        <div class="mySlides">
          <img  src="{{ asset('assets/images/satellite/' . $satelliteImg->filename) }}"  style="width:40vw;height:50vh" />
        </div>
        @endforeach
 
@else
<div class="mySlides">
  <h3 class="fw-bold text-center"> No Satellite forecast uploaded Yet</h3>
</div>
@endif
       
        <!-- Next and previous buttons -->
        <!--   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
        <div id="myProgress">
          <div id="myBar"></div>
        </div>
      </div>
      <br>
    
      <div class="text" id="slide-number">Caption Three</div>
    
      <!-- The dots/circles -->
      <div class="slider-controls" style="text-align:center">
    
        <div class="controls-container">
          <button class="controls prev" onclick="plusSlides(-1)"><i class="fa fa-backward"></i></button>
          <button class="controls pause" onclick="playPauseHandler()"><i id="play-pause-icon" class="fa fa-pause"></i></button>
          <button class="controls next" onclick="plusSlides(1)"><i class="fa fa-forward"></i></button>
        </div>
      </div>
    </div>


</div>

<script>

var slideIndex = 1;
var playPause = true;
var timerVar;
var scrubberVar;
var intervalDuration = 2000;
var i = 0;
const presentationSize = document.getElementsByClassName("mySlides").length;
const presentationSizetext = document.getElementsByClassName("mySlidestext").length;
const playPauseButtonIcon = document.getElementById("play-pause-icon");
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  clearTimeout(timerVar);
  clearInterval(scrubberVar);
  showSlides((slideIndex += n));
}

function playPauseHandler() {
  playPause = !playPause;
  if (playPause) {
    playPauseButtonIcon.className = "fa fa-pause";
    showSlides(slideIndex);
  } else {
    playPauseButtonIcon.className = "fa fa-play";
    clearTimeout(timerVar);
    clearInterval(scrubberVar);
    document.getElementById("myBar").style.width = "0%";
  }
}

function autoplay() {
  showSlides((slideIndex += 1));
}

function moveScrubber(barFill) {
  if (barFill == 0) {
    clearInterval(scrubberVar);
    barFill = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var progBarInterval = intervalDuration / 100;
    scrubberVar = setInterval(frame, progBarInterval);
    function frame() {
      if (width >= 100 || !playPause) {
        elem.style.width = "0%";
        clearInterval(scrubberVar);
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var slideNumber = document.getElementById("slide-number");

  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }


  if(slideIndex == 1){
var timee =  document.getElementById("t1").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 2){
var timee =  document.getElementById("t2").value;
    slideNumber.innerHTML =  timee;
  }
  else if(slideIndex == 3){
var timee =  document.getElementById("t3").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 4){
var timee =  document.getElementById("t4").value;
    slideNumber.innerHTML =  timee;
  }
  else if(slideIndex == 5){
var timee =  document.getElementById("t5").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 6){
var timee =  document.getElementById("t6").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 7){
var timee =  document.getElementById("t7").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 8){
var timee =  document.getElementById("t8").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 9){
var timee =  document.getElementById("t9").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 10){
var timee =  document.getElementById("t10").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 11){
var timee =  document.getElementById("t11").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 12){
var timee =  document.getElementById("t12").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 13){
var timee =  document.getElementById("t13").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 14){
var timee =  document.getElementById("t14").value;
    slideNumber.innerHTML =  timee;
  }else if(slideIndex == 15){
var timee =  document.getElementById("t15").value;
    slideNumber.innerHTML =  timee;
  }





  // slideNumber.innerHTML = slideIndex + " / " + presentationSize;
  slides[slideIndex - 1].style.display = "block";

  if (playPause) {
    timerVar = setTimeout(autoplay, intervalDuration);
    moveScrubber(0);
  }
}

</script>

</body>

</html>
