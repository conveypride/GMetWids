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

 

 /* tr {
   line-height: 3px!important;
   min-height: 3px!important;
   height: 3px!important;
} */

/* Apply styles to all vertical lines in the table */
table tr td:nth-child(odd) {
    border-color:  #292b2c; 
}
table tr td:nth-child(even) {
    border-color:  #292b2c; 
}
table tr th:nth-child(odd) {
    border-color:  #292b2c; 
}
table tr th:nth-child(even) {
    border-color:  #292b2c; 
}

.horizontal-line {
  border: none; /* Remove the default line */
  border-top: 1px solid #000; /* Add a 1-pixel solid black line */
  margin: 10px 0; /* Adjust margin for spacing if needed */
}

 /* Custom CSS for oval overlay text */
 .oval-overlay {
            position: relative;
            width: 70px; /* Adjust the width to your preference */
            height: 70px; /* Adjust the height to your preference */
            border-radius: 50%; /* Makes the overlay circular */
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
@endsection


<br>

    <div class="app-wrapper mt-5" style='font-family: "Times New Roman", Times, serif;'>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4" id="downloadS"><button class="btn text-white float-end m-2 p-2" id="download" style="background-color:red">Download PDF</button></div>
        </div>

    <page size="A4" class="pagepape" id="page">
<div class="container mx-3 p-2">
<div class="row">
<div class="col-2">
    <img class="coatofarms-image" width="50px" src="{{ asset('assets/images/Coat_of_arms_of_Ghana.png') }}" alt="coatofarmslogo">
</div>
<div class="col-8">
   <h6 class="fw-bold text-center" style="color: rgb(23, 0, 128); font-size:25px">GHANA METEOROLOGICAL AGENCY</h6>
</div>
<div class="col-2">
<img class="coatofarms-image" width="50px" src="{{ asset('assets/images/gmet.png') }}" alt="gmetlogo">
</div>
</div>
<div class="row">
    <div class="col-2">
       
    </div>

    <div class="col-8">
      <div class="d-flex  flex-column justify-content-center">
         <div class="fw-bold"  style="font-size: 10px; align-self:center"><a style="color: blue" href="https://www.meteo.gov.gh">www.meteo.gov.gh</a> / +233-302-543252 / <a  style="color: blue" href="mailto:info@meteo.gov.gh">info@meteo.gov.gh</a>/<a  style="color: blue" href="mailto:kiamo@meteo.gov.gh">kiamo@meteo.gov.gh</a></div>
          <div class="fw-bold text-dark"  style="font-size: 11px; align-self:center">COASTLINE & MARITME FORECAST FOR GHANA</div>
          <div class="fw-bold text-dark"  style="font-size: 14px; align-self:center;text-decoration:underline;color:black">VALID AT {{ \Carbon\Carbon::parse($marineforecast->validAt)->format('H:i d/m/Y') }}</div>
          <div class="fw-bold text-dark"  style="font-size: 11px;align-self:center">(VALID FROM COAST EXTENDING 200NM INTO SEA)</div>
        </div>
  </div>

    <div class="col-2">
        
    </div>
</div>

<div class="row mt-3">
    <div class="col-3"></div>
    <div class="col-6 fw-bold text-dark"  style="font-size: 12px;"> 
   <p class="text-center"><strong class="text-center">The state of the sea will be {{ $marineforecast->seaState }}   @if ( $marineforecast->seaState == "DANGEROUS")
      (3)
      @elseif ( $marineforecast->seaState == "ROUGH")
     (2)
      @elseif ( $marineforecast->seaState == "CALM")
      (1)
      @endif </strong>
   </p>
   <p class="text-center"><strong class="text-center"> <span style="color: red">Warning:</span> MAX WAVE CURRENT RANGE ({{ $marineforecast->minMaxWaveCurrent }}) m/s</strong></p>
   </P>
 </div>
    <div class="col-3">
         <div class="oval-overlay">
            @if ( $marineforecast->seaState == "DANGEROUS")
            <img src="{{ asset('assets/images/dangerseas.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
            <div class="overlay-text text-white" style=" background-color: red;">Dangerous</div>
            @elseif ( $marineforecast->seaState == "ROUGH")
            <img src="{{ asset('assets/images/roughmap.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
            <div class="overlay-text" style=" background-color: yellow;">Rough</div>
            @elseif ( $marineforecast->seaState == "CALM")
            <img src="{{ asset('assets/images/calmsea.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
            <div class="overlay-text text-white" style=" background-color: green;">Calm</div>
            @endif
             <!-- Replace "Your Text" with your desired text -->
         </div>
    </div>

</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4 fw-bold text-dark"  style="font-size: 15px; text-decoration:underline"> 
        {{-- @if($time == 'Morning')
 VALID FROM 6AM {{ \Carbon\Carbon::parse($marineforecast['created_at'])->format('d/m/Y') }}

        @elseif($time == 'Afternoon')
        VALID FROM 12PM {{ \Carbon\Carbon::parse($marineforecast['created_at'])->format('d/m/Y') }}

        @else 
        VALID FROM 4PM {{ \Carbon\Carbon::parse($marineforecast['created_at'])->format('d/m/Y') }}

     @endif
        </div> --}}
    <div class="col-4"></div>
</div>


</div>





<div class="container-fluid mt-0 pt-0 mb-0 pb-0" >

<div class="container my-1 py-1">
    {{-- <label for="legend" class="text-dark fw-bold" style="font-size: 11px">LEGEND</label> --}}
    <table class="table table-bordered text-dark border-dark" id="legend" style="font-size: 10px">
       
        <tbody style="font-size: 11px">
            <tr class="text-center fw-bold text-white" style="background-color:rgb(9, 9, 104)" >
                <td scope="row">PARAMETER</td>
                <td>24 HOURS</td>
                <td>48 HOURS</td>
            </tr>
            <tr class="text-center fw-bold">
                <td scope="row"> SURFACE WIND </td>
                <td>{{ $marineforecast->surfaceWind24hrsMin }}KT MAX {{ $marineforecast->surfaceWind24hrsMax }} KT</td>
                <td>{{ $marineforecast->surfaceWind48hrsMin }}KT MAX {{ $marineforecast->surfaceWind48hrsMax }} KT</td>
            </tr>
            <tr class="text-center fw-bold">
                <td scope="row">VISIBILITY</td>
                <td>({{ $marineforecast->visibility24hrsMin }} - {{ $marineforecast->visibility24hrsMax }}) km</td>
                <td>({{ $marineforecast->visibility48hrsMin }} - {{ $marineforecast->visibility48hrsMax }}) km</td>
            </tr>
            <tr class="text-center fw-bold">
               <td scope="row">SEA SURFACE TEMPERATURE</td>
               <td>({{ $marineforecast->seaSurfTemp24hrsMin }} - {{ $marineforecast->seaSurfTemp24hrsMax }} ) °C</td>
               <td>{{ $marineforecast->seaSurfTemp48hrsMin }} - {{  $marineforecast->seaSurfTemp48hrsMax  }} °C</td>
           </tr>
           <tr class="text-center fw-bold">
            <td scope="row">SIG WAVE HEIGHT</td>
            <td>({{ $marineforecast->sigWaveHeight24hrsMin }} - {{ $marineforecast->sigWaveHeight24hrsMax }} ) </td>
            <td> ({{ $marineforecast->sigWaveHeight48hrsMin }} - {{ $marineforecast->sigWaveHeight48hrsMax }} )</td>
        </tr>
        <tr class="text-center fw-bold">
         <td scope="row">TIDAL WAVE</td>
         <td>({{ $marineforecast->tidalwave24hrsMin }} - {{ $marineforecast->tidalwave24hrsMax }} ) </td>
         <td>({{ $marineforecast->tidalwave48hrsMin }} - {{ $marineforecast->tidalwave48hrsMax }} ) </td>
     </tr>
     <tr class="text-center fw-bold">
      <td scope="row">WAVE CURRENT</td>
      <td>{{ $marineforecast->waveCureent24hrs }}</td>
      <td>{{ $marineforecast->waveCureent48hrs }}</td>
  </tr>
        </tbody>
    </table>
    <h6 class="m-1 p-1 fw-bold text-dark">WEATHER: <span class="fw-light text-dark text-left">{{ ucfirst($marineforecast->summary) }}  </span> </h6>
{{-- </div> --}}

<div class="row">
   <h5>LEGEND:</h5>
   <div class="col">
      <div class="oval-overlay">
         <img src="{{ asset('assets/images/dangerseas.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
         <div class="overlay-text text-white" style=" background-color: red;">Dangerous</div>
      </div>
   </div>
<div class="col">
   <div class="oval-overlay">
         <img src="{{ asset('assets/images/roughmap.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
         <div class="overlay-text" style=" background-color: yellow;">Rough</div>
      </div>
</div>
<div class="col">
   <div class="oval-overlay">
   <img src="{{ asset('assets/images/calmsea.jpg') }}" class="img-thumbnail rounded-circle" alt="img-thumbnail">
   <div class="overlay-text text-white" style=" background-color: green;">Calm</div>
</div>
</div>

</div>


<div class="d-flex justify-content-between py-0 my-0 " style="font-size: 10px">
    <div>
<h6 class="text-start fw-bold">
    ISSUED AT {{ \Carbon\Carbon::parse($marineforecast->created_at)->format('H:i') }} UTC
</h6>  
<h6 class="text-start fw-bold" style=" text-align:left">DATE: {{ \Carbon\Carbon::parse($marineforecast->created_at)->format('d/m/Y') }}</h6>
</div>
    <div  style="float:right;  text-align:center">

<h6 class="text-center fw-bold" style=" text-align:center">SIGNED</h6>
<h6 class="text-center fw-bold" style=" text-align:center"> {{ Auth::user()->name }}</h6>
<h6 class="text-center fw-bold" style=" text-align:center">(DUTY FORECASTER)</h6>
    </div>
</div>
{{-- <div class="horizontal-line"></div> --}}
<div class="row">
    <div class="col">
        <div class="fw-bold"  style="font-size: 10px; align-self:flex-start"><img class="coatofarms-image" width="25px" src="{{ asset('assets/images/twitter.jpg') }}" alt="twitterlogo"> @GhanaMet</div>
    </div>
    <div class="col" style="text-align:center"> <h6  style="color:blue; font-size: 11px">PROVIDED WITH SUPPORT OF EU & AU</h6> </div>
    <div class="col">
        <div class="fw-bold"  style="font-size: 10px; align-self:flex-start"><img class="coatofarms-image" width="17px" src="{{ asset('assets/images/facebook_icon.png') }}" alt="facebooklogo"> Ghana Meteorological Agency (GMet)</div>
    </div>
</div>


<div class="row my-0 py-0">
    <div class="col-1"></div>
    <div class="col-10">
        <img width="700px"  src="{{ asset('assets/images/icon1.png') }}" class="img-fluid" alt="img-thumbnail">
    </div>
    <div class="col-1"></div>
    {{-- <div class="col fw-bold float-right" >
<h6 style="font-size: 10px" class="text-end">MAIN FORECAST OFFICE, ACCRA</h6> 
    </div> --}}
</div>
</div>
</div>

 </page>

    </div>

    @section('script')

    <!-- Include html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js" integrity="sha512-tVYBzEItJit9HXaWTPo8vveXlkK62LbA+wez9IgzjTmFNLMBO1BEYladBw2wnM3YURZSMUyhayPCoLtjGh84NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script> --}}
<!-- Include jsPDF library -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> --}}
   
<script src="{{ asset('assets/js/generatePDF.js') }}"></script>
    @endsection
 
@endsection