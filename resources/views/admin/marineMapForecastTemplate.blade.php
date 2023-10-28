@extends('admin.adminApp')

@section('adminContent')
@section('css')
<style type="text/css">

    body {
background: rgb(204,204,204); 
}
page {
  background: white !important; 
display: block;
margin: 0 auto;
margin-bottom: 0.5cm;
/* box-shadow: 0 0 0.5cm rgba(0,0,0,0.5); */
}
page[size="A4"] {  
width: 21cm;
height: 29.7cm; 
font-family: "Times New Roman", Times, serif;
}

.vertical-text {
    /* Prevent text from wrapping to the next line */
    transform: rotate(270deg);
}


 .httr {
   line-height: 5px!important;
   min-height:5px!important;
   height: 5px!important;
}



/* Apply styles to all vertical lines in the table */
table .httr td:nth-child(odd) {
    border-color:  #e3f11f; 
}
table .httr td:nth-child(even) {
    border-color:  #e3f11f; 
}
table .yio td:nth-child(odd) {
    border-color:  #e3f11f; 
}
table .yio td:nth-child(even) {
    border-color:  #e3f11f; 
}

.horizontal-line {
  border: none; /* Remove the default line */
  border-top: 1px solid #000; /* Add a 1-pixel solid black line */
  margin: 10px 0; /* Adjust margin for spacing if needed */
}

.map-overlay {
font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
position: absolute;
right: 0;
top: 15%;
/* bottom: -40;  */
/* left: 90; */
padding: 10px;
}
 
/* Custom CSS for oval overlay text */
.oval-overlay {
            position: relative;
            width: 70px; /* Adjust the width to your preference */
            height: 70px; /* Adjust the height to your preference */
            border-radius: 50%; /* Makes the overlay circular */
            left: 30%
        }

        .oval-overlay .overlay-text {
            position: absolute;
            top: 40%;
            left: 95%;
            transform: translate(-50%, -50%);
            /* Yellow background color */
            border-radius: 80%; /* Makes the text oval */
            padding: 10px; /* Adjust the padding to your preference */
            font-size: 8px;
            font-weight:bold;
        }



</style>
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


<br>

    <div class="app-wrapper mt-5" style='font-family: "Times New Roman", Times, serif;'>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4" id="downloadS"><button class="btn text-white float-end m-2 p-2" id="download" style="background-color:red">Download PDF</button></div>
        </div>

    <page size="A4" class="pagepape" id="page">
<div class="container-fluid p-2 mt-0 pt-0">
<div class="row" style="background-color: rgb(23, 0, 128); font-size:25px; border-bottom-right-radius: 200px">
    <div class="col-2 pt-2">
        <img class="coatofarms-image" width="50px" src="{{ asset('assets/images/gmet.png') }}" alt="gmetlogo">
        </div>

<div class="col-8">
   <h6 class="fw-bold text-center text-white" style="color: white">GHANA METEOROLOGICAL AGENCY</h6>
   <div class="row">
    <div class="col-6">
        <div class="d-flex  flex-column justify-content-start text-white" >
            <div class="fw-bold" style="font-size: 10px">P.O Box LG 87, Accra</div>
            <div class="fw-bold"  style="font-size: 10px">Tel: +233-302-543252/307010019</div>
            <div class="fw-bold"  style="font-size: 10px">Digital Address: GA-485-3581</div>
          </div>
    </div>

    <div class="col-6">
        <div class="d-flex flex-column justify-content-start text-white">
            <div class="fw-bold text-white" style="font-size: 10px; align-self:flex-start">Email: <a class="text-white" href="mailto:kiamo@meteo.gov.gh">kiamo@meteo.gov.gh</a></div>
            <div class="fw-bold "  style="font-size: 10px; align-self:flex-start">Website: <a class="text-white" href="https://www.meteo.gov.gh">www.meteo.gov.gh</a></div>
            <div class="fw-bold"  style="font-size: 10px; align-self:flex-start">Twitter: @GhanaMet</div>
            <div class="fw-bold"  style="font-size: 10px; align-self:flex-start">Facebook: Ghana Meteorological Agency (GMet)</div>
          </div>
    </div>
</div>
</div>
<div class="col-2  pt-2">
    <img class="coatofarms-image" width="50px" src="{{ asset('assets/images/Coat_of_arms_of_Ghana.png') }}" alt="coatofarmslogo">
</div>
</div>

<div class="row mt-2">
    <div class="col-2"></div>
    <div class="col-8 fw-bold text-dark text-center"  style="font-size: 18px; text-decoration:underline;"> COASTAL & MARITIME FORECAST FOR GHANA</div>
    <div class="col-2"></div>
</div>
{{-- <div class="row">
    <div class="col-4"></div>
    <div class="col-4 fw-bold text-dark"  style="font-size: 15px; text-decoration:underline"> 
        @if($time == 'Morning')
 VALID FROM 6AM {{ \Carbon\Carbon::parse($addDailyForecast['created_at'])->format('d/m/Y') }}

        @elseif($time == 'Afternoon')
        VALID FROM 12PM {{ \Carbon\Carbon::parse($addDailyForecast['created_at'])->format('d/m/Y') }}

        @else 
        VALID FROM 4PM {{ \Carbon\Carbon::parse($addDailyForecast['created_at'])->format('d/m/Y') }}

     @endif
        </div>
    <div class="col-4"></div>
</div> --}}


</div>





<div class="container-fluid">

 
<div class="row">
    <div class="col-10 mx-0 px-0">

    {{-- morning map --}}
    <div class="card"  style="width: 100%;
    height: 350px;">
     <div class="card-body" >
     
                <h5 class="card-title fw-bold  text-center" style="font-size: 15px">IMPACT-BASED FORECAST VALID  </h5>
        <h6 class="text-center"  style="font-size: 12px">0000Z {{ $marinedata->created_at }}</h6>
           
       
       
       
 <div id="marinemapview" style="width: 100%; height: 85%;"> </div>
 <div class="map-overlay top">
    <img  style=" width: 70px; height: 70px;"  src="{{ asset('assets/images/marinecardinalPoint.png') }}" class="img-thumbnail rounded  float-end " alt="img-thumbnail "> 
    </div>
        </div> 
    </div>

</div>
<div class="col-2 mx-0 px-0">
  
    <table class="table table-white table-bordere fw-bold text-center" style="height: 300px; font-size: 11px">
        {{-- <thead>
    <tr><th scope="col"></th></tr>
        </thead> --}}
        <tbody>
            <tr> <td scope="row" class="bg-dark text-white">Date</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($marinedata->created_at)->format('d/m/Y') }}</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Time Issued</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($marinedata->created_at)->format('H:i') }} UTC</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Valid From</td></tr>
            <tr><td scope="row">12: 00 AM</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Nowcasting Risk</td></tr>
            <tr> <th class="text-center" style="background-color:#ff0000">Take Action</th> </tr> 
         </tr><th  class="text-center" style="background-color: #e9f542">Be Aware</th></tr>
         </tr><th class="text-center" style="background-color: #4ca64c">Low Risk</th></tr>
         </tr><th class="text-center" style="background-color: white">No Risk</th></tr>
        </tbody>
    </table>
</div>
</div>

  <div class="row justify-content-center align-items-center  mb-0 pb-0">
    <div class="col">
       {{-- Weather Forecasting Risk Table--}}
       <div class="row">
        <div class="col-1">
          <div class="row" style="min-height: 180px;">
            <div class="col-12 d-flex flex-column justify-content-center fw-bold">
              <p class="text-center fw-bold my-5 mx-2">  <i class="bi bi-arrow-up text-center fw-bold  text-success fs-4" style="min-height: 115px;"></i></p> 
              <p class="text-center fw-bold p-1 vertical-text">Likelihood</p> 
            </div>
        
            <div class="col d-flex flex-column justify-content-center">
              
            </div>
        
          </div>
        </div>
        
        <div class="col">
          <table class="table table-bordered caption-top">
            <caption class="fw-bold text-dark"> Weather Forecasting Risk Table</caption>
        <thead class="httr">
            <th>High(>60%) </th>
            <th class="text-center" style="background-color:#4ca64c">G</th>
            <th class="text-center" style="background-color: #e9f542">H</th>
            <th class="text-center" style="background-color:#ff0000">I</th>
          
        </thead>
        <tbody>
          <thead class="httr">
            <th>Medium(40% - 60%)</th>
            <th class="text-center" style="background-color: #4ca64c">D</th>
            <th  class="text-center" style="background-color: #e9f542">E</th>
            <th class="text-center" style="background-color: #ff0000">F</th>
          </thead>
          <thead class="httr">
            <th>Low(<40%) </th>
            <th class="text-center" style="background-color: #4ca64c">A</th>
            <th class="text-center" style="background-color: #e9f542">B</th>
            <th  class="text-center" style="background-color: #ff0000">C</th>
          </thead>
          <thead class="httr">
            <th></th>
            <th>Low</th>
            <th>Medium</th>
            <th>High</th>
          </thead>
          <thead class="httr">
            <th colspan="4">
              <p class="text-center fw-bold m-0 p-0">  Impact <i class="text-center fw-bold bi bi-arrow-right text-success fs-4" ></i></p>
            </th>
          </thead>
        </tbody>
        </table>
        </div>
            </div>     
    </div>
     {{--================================ ======== --}}
    <div class="col  top-0">
        <ul class="list-group text-center  top-0">
            <li class="list-group-item list-group-item-secondary"> Weather icons</li>
          </ul>

          <ul class="list-group list-group-horizontal-md">
            <li class="list-group-item"><i class="bi bi-cloud-drizzle-fill fs-5"></i>
                Rain</li>
            <li class="list-group-item"> <i class="bi bi-wind fs-5"></i> 
                Wind</li>
            <li class="list-group-item">
                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35"><symbol id="a" viewBox="0 0 342 234"><path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/></symbol><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/></svg>
              Dust
            </li>
            <li class="list-group-item"><i class="bi bi-cloud-hail-fill fs-5"></i>
                Hail</li>
            </ul>
            <div style="align-items:center;">
                <div class="col-8 fw-bold text-dark text-center"  style="font-size: 18px; text-decoration:underline;"> State Of The Sea:</div>
            <div class="oval-overlay" >
                @if ( $marinedata->seaState == "DANGEROUS")
                <img src="{{ asset('assets/images/dangerseas.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
                <div class="overlay-text text-white" style=" background-color: red;">Dangerous</div>
                @elseif ( $marinedata->seaState == "ROUGH")
                <img src="{{ asset('assets/images/roughmap.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
                <div class="overlay-text" style=" background-color: yellow;">Rough</div>
                @elseif ( $marinedata->seaState == "CALM")
                <img src="{{ asset('assets/images/calmsea.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
                <div class="overlay-text text-white" style=" background-color: green;">Calm</div>
                @endif
                 <!-- Replace "Your Text" with your desired text -->
             </div>
</div>
    </div>
  </div>

<div>
    {{-- <label for="legend" class="text-dark fw-bold" style="font-size: 11px">LEGEND</label> --}}
    <table class="table table-bordered text-dark border-dark" id="legend" style="font-size: 10px">
        <tbody style="font-size: 14px; color:black">
            <tr class="text-center fw-bold yio" style="background-color:gold" >
                <td scope="row">Time</td>
                <td>Surface Wind</td>
                <td>Visibity</td>
                <td>Sea Surface Temperature</td>
                <td>Sig. Wave Height</td>
                <td>Tide</td>
                <td>Wave Current</td>

            </tr>
         
                <tr class="text-center fw-bold yio">
                <td scope="row" style="background-color: gold">24 Hours</td>
                <td style="background-color:rgb(247, 247, 164); text-align:center">{{ $marinedata->surfaceWind24hrsMin }}KT MAX {{ $marinedata->surfaceWind24hrsMax }} KT</td>
                <td  style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->visibility24hrsMin }} - {{ $marinedata->visibility24hrsMax }}) km</td>
                <td style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->seaSurfTemp24hrsMin }} - {{ $marinedata->seaSurfTemp24hrsMax }}) °C</td>
                <td style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->sigWaveHeight24hrsMin }} - {{ $marinedata->sigWaveHeight24hrsMax }}) </td>
                 <td style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->tidalwave24hrsMin }} - {{ $marinedata->tidalwave24hrsMax }}) meters </td>
                 <td style="background-color:rgb(247, 247, 164); text-align:center">{{ $marinedata->waveCureent24hrs }}</td>
            </tr> 
            <tr class="text-center fw-bold yio">
                <td scope="row" style="background-color: gold">48 Hours</td>
                <td style="background-color:rgb(247, 247, 164); text-align:center">{{ $marinedata->surfaceWind48hrsMin }}KT MAX {{ $marinedata->surfaceWind48hrsMax }} KT</td>
                <td style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->visibility48hrsMin }} - {{ $marinedata->visibility48hrsMax }}) km</td>
                <td style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->seaSurfTemp48hrsMin }} - {{ $marinedata->seaSurfTemp48hrsMax }}) °C</td>
                <td style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->sigWaveHeight48hrsMin }} - {{ $marinedata->sigWaveHeight48hrsMax }}) </td>
                 <td style="background-color:rgb(247, 247, 164); text-align:center">({{ $marinedata->tidalwave48hrsMin }} - {{ $marinedata->tidalwave48hrsMax }}) meters</td>
                 <td style="background-color:rgb(247, 247, 164); text-align:center">{{ $marinedata->waveCureent48hrs }}</td>
            </tr> 
        </tbody>
    </table>
</div>
<h6 class="m-1 p-1 fw-bold text-dark">WEATHER SUMMARY: <span class="fw-light text-dark text-left">
 {{ ucfirst($marinedata['summary']) }} 
 </span> </h6>
 
 
<div id="marinepolygonElement" data-polygon="{{ json_encode($marinepolygons) }}"    data-marker="{{ json_encode($marinemarkers)  }}"></div>
{{-- images of markers --}}
<div id="icons" rain="{{ asset('assets/images/rain.png') }}"  
hail="{{ asset('assets/images/hail.png') }}" 
dust="{{ asset('assets/images/dust.png') }}" 
wind="{{ asset('assets/images/wind.png') }}" 
A="{{ asset('assets/images/A.png') }}" 
B="{{ asset('assets/images/B.png') }}" 
C="{{ asset('assets/images/C.png') }}" 
D="{{ asset('assets/images/D.png') }}" 
E="{{ asset('assets/images/E.png') }}" 
F="{{ asset('assets/images/F.png') }}" 
G="{{ asset('assets/images/G.png') }}" 
H="{{ asset('assets/images/H.png') }}" 
I="{{ asset('assets/images/I.png') }}" 
></div>


<div class="horizontal-line mt-3"></div>
<div class="row my-0 py-0 ">
    <div class="col-1 fw-bold">
<h6 style="font-size: 10px"></h6>
    </div>
    <div class="col-10 fw-bold" >
<h6 style="font-size: 14px" class="text-center" style="background-color:rgb(110, 188, 214)">SIGNED: Ghana Meteorological Agency, Marine Forecast Office, Accra</h6> 
    </div>
    <div class="col-1 fw-bold float-right" >
<h6 style="font-size: 10px" class="text-end"></h6> 
    </div>

</div>
</div>

 </page> 

    </div>

    @section('script')

    <!-- Include html2canvas library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.0/mapbox-gl.css' rel='stylesheet' />

<link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>



<script src="{{ asset('assets/js/generatemarineMap.js') }}"></script>
<script src="{{ asset('assets/js/generateMapPDF.js') }}"></script>


    @endsection
 
@endsection