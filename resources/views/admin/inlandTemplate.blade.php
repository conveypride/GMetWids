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

 

 tr  {
   line-height: 3px!important;
   min-height: 3px!important;
   height: 3px!important;
}




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
<div class="container p-2">
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
    <div class="col-6">
        <div class="d-flex  flex-column justify-content-start">
            <div class="fw-bold" style="font-size: 12px">P.O Box LG 87, Accra</div>
            <div class="fw-bold"  style="font-size: 12px">Tel/Fax: +233-302-543252</div>
            <div class="fw-bold"  style="font-size: 12px">Tel: +233-0302-776171 ext. 3267/2534/3244</div>
            <div class="fw-bold"  style="font-size: 12px">Digital Address: GA-485-3581</div>
          </div>
    </div>

    <div class="col-6">
        <div class="d-flex flex-column justify-content-end">
            <div class="fw-bold" style="font-size: 12px; align-self:flex-end">Email: <a href="mailto:kiamo@meteo.gov.gh">kiamo@meteo.gov.gh</a></div>
            <div class="fw-bold"  style="font-size: 12px; align-self:flex-end">Website: <a href="https://www.meteo.gov.gh">www.meteo.gov.gh</a></div>
            <div class="fw-bold"  style="font-size: 12px; align-self:flex-end"><img class="coatofarms-image" width="25px" src="{{ asset('assets/images/twitter.jpg') }}" alt="twitterlogo"> @GhanaMet</div>
            <div class="fw-bold"  style="font-size: 12px; align-self:flex-end"><img class="coatofarms-image" width="17px" src="{{ asset('assets/images/facebook_icon.png') }}" alt="facebooklogo"> Ghana Meteorological Agency (GMet)</div>
          </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 fw-bold text-dark text-center"  style="font-size: 13px; text-decoration:underline;"> 12-HOUR INLAND WATER FORECAST FOR GHANA</div>
    <div class="col-3"></div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 fw-bold text-dark text-center"  style="font-size: 15px; text-decoration:underline"> 
        @if($time == 'Morning')
 VALID FROM 6AM {{ \Carbon\Carbon::parse($inlandforecast['created_at'])->format('d/m/Y') }}

        @elseif($time == 'Afternoon')
        VALID FROM 12PM {{ \Carbon\Carbon::parse($inlandforecast['created_at'])->format('d/m/Y') }}

        @else 
        VALID FROM 4PM {{ \Carbon\Carbon::parse($inlandforecast['created_at'])->format('d/m/Y') }}

     @endif
        </div>
    <div class="col-3"></div>
</div>
<h6 class="m-1 p-1 fw-bold text-danger">SUMMARY: <span class="fw-light text-dark text-left">{{ ucfirst($inlandforecast['summary']) }}  </span> </h6>

</div>

@php
function extractWindSpeed($input) {
        preg_match('/\/(\d+)KT/', $input, $matches);
        return isset($matches[1]) ? intval($matches[1]) : 0;
    }

    function findHighestWindSpeed( $input1,$input2,$input3) {
    // Define a helper function to extract the numeric value between "/" and "KT"
    

    // Extract wind speeds from each input
    $speed1 = extractWindSpeed(Str::upper($input1));
    $speed2 = extractWindSpeed(Str::upper($input2));
    $speed3 = extractWindSpeed(Str::upper($input3));

    // Find the maximum wind speed
    $maxSpeed = max($speed1, $speed2, $speed3);

    // Determine which input variable has the highest wind speed
    if ($maxSpeed === $speed1) {
        return $input1;
    } elseif ($maxSpeed === $speed2) {
        return $input2;
    } else {
        return $input3;
    }
}
@endphp



<div class="container-fluid mt-0 pt-0 mb-0 pb-0" >
@if ($time == 'Morning')
  <table class="table table-bordered border-dark fw-bold" >
        <tr class="text-center">
          <th rowspan="2">CITIES</th>
          <th colspan="6" class="text-center">WEATHER BRIEF</th>
        </tr>
        <tr class="text-center"  >
            <th scope="col" style="font-size: 12px">MORNING ({{ $inlandmorningGen->date }})</th>
            <th scope="col" style="font-size: 12px" >AFTERNOON ({{ $inlandafternoonGen->date }})</th>
            <th scope="col" style="font-size: 12px" >EVENING ({{ $inlandeveningGen->date }})</th>
            <th scope="col" style="font-size: 12px"> DOMINANT WIND (DIRECTION/SPEED) </th>
        </tr>
        <tbody>
            @foreach($morning as $key => $value)
            <tr class="trr text-center"  style="font-size: 12px">
                <th scope="row">{{ $value->districts }}</th>
                <td>
                    @if ( $value->weather == 'SUNNY')
                  {{ 'SUNNY' }} 
                 @elseif( $value->weather == '-TSRA')
                 {{ 'SLT TSRA' }}                
                 @elseif( $value->weather == 'TSRA')
                 {{ 'MOD TSRA' }}  
                 @elseif( $value->weather == '+TSRA')
                 {{ 'HVY TSRA' }}  
                 @elseif( $value->weather == '-RAINDAY')
                 {{ 'SLT RAIN' }}  
                @elseif( $value->weather == '-RAINNIGHT')
                {{ 'SLT RAIN' }}  
                 @elseif( $value->weather == 'RAINDAY')
                 {{ 'MOD RAIN' }}  
                  @elseif( $value->weather == 'RAINNIGHT')
                  {{ 'MOD RAIN' }}  
                 @elseif( $value->weather == '+RAINDAY')
                {{ 'HVY RAIN' }}  
                @elseif( $value->weather == '+RAINNIGHT')
                {{ 'HVY RAIN' }}  
                 @elseif( $value->weather == '-DRIZZLEDAY')
                 {{ 'SLT DRIZZLE' }}  
                @elseif( $value->weather == '-DRIZZLENIGHT')
                {{ 'SLT DRIZZLE' }}  
                 @elseif( $value->weather == 'DRIZZLEDAY')
                 {{ 'MOD DRIZZLE' }}  
                @elseif( $value->weather == 'DRIZZLENIGHT')
                {{ 'MOD DRIZZLE' }}  
                @elseif( $value->weather == '+DRIZZLEDAY')
                {{ 'HVY DRIZZLE' }}  
                @elseif( $value->weather == '+DRIZZLENIGHT')
                {{ 'HVY DRIZZLE' }}  
                 @elseif( $value->weather == 'HAIL')
                 {{ 'HAIL' }}  
                 @elseif( $value->weather == 'MIST')
                 {{ 'MIST' }}  
                 @elseif( $value->weather == 'FOG') 
                 {{ 'FOG' }}  
                 @elseif( $value->weather == 'HAZE') 
                 {{ 'HAZE' }}  
                 @elseif( $value->weather == 'SUNNY BREAKS')
                 {{'SUNNY BK\'S' }}  
                  @elseif( $value->weather == 'SUNNY INTERVALS')
                  {{'SUNNY INT' }}  
                 @elseif( $value->weather == 'FEW CLOUDS')
                 {{'FEW CLOUDS' }}  
                 @elseif( $value->weather == 'PARTLY CLOUDY(DAY)')
                 {{'P\'CLOUDY' }}  
                 @elseif( $value->weather == 'PARTLY CLOUDY(NIGHT)')
                 {{'P\'CLOUDY' }}  
                 @elseif( $value->weather == 'CLOUDY')
                 {{'CLOUDY' }}  
                 @elseif( $value->weather == 'CLEAR NIGHT')
                 {{'CLEAR NIGHT' }}  
@endif
 </td> 
  <td>  
                @if (  $afternoon[$key]->weather == 'SUNNY')
                {{ 'SUNNY' }}  

               @elseif(  $afternoon[$key]->weather == '-TSRA')
               {{ 'SLT TSRA' }}                
               @elseif(  $afternoon[$key]->weather == 'TSRA')
               {{ 'MOD TSRA' }} 
               @elseif(  $afternoon[$key]->weather == '+TSRA')
               {{ 'HVY TSRA' }} 
               @elseif(  $afternoon[$key]->weather == '-RAINDAY')
               {{ 'SLT RAIN' }} 
              @elseif(  $afternoon[$key]->weather == '-RAINNIGHT')
              {{ 'SLT RAIN' }} 
               @elseif(  $afternoon[$key]->weather == 'RAINDAY')
               {{ 'MOD RAIN' }} 
                @elseif(  $afternoon[$key]->weather == 'RAINNIGHT')
                {{ 'MOD RAIN' }} 
               @elseif(  $afternoon[$key]->weather == '+RAINDAY')
              {{ 'HVY RAIN' }} 
              @elseif(  $afternoon[$key]->weather == '+RAINNIGHT')
              {{ 'HVY RAIN' }} 
               @elseif(  $afternoon[$key]->weather == '-DRIZZLEDAY')
               {{ 'SLT DRIZZLE' }}  
              @elseif(  $afternoon[$key]->weather == '-DRIZZLENIGHT')
              {{ 'SLT DRIZZLE' }} 
               @elseif(  $afternoon[$key]->weather == 'DRIZZLEDAY')
               {{ 'MOD DRIZZLE' }} 
              @elseif(  $afternoon[$key]->weather == 'DRIZZLENIGHT')
              {{ 'MOD DRIZZLE' }} 
              @elseif(  $afternoon[$key]->weather == '+DRIZZLEDAY')
              {{ 'HVY DRIZZLE' }} 
              @elseif(  $afternoon[$key]->weather == '+DRIZZLENIGHT')
              {{ 'HVY DRIZZLE' }} 
               @elseif(  $afternoon[$key]->weather == 'HAIL')
               {{ 'HAIL' }} 
               @elseif(  $afternoon[$key]->weather == 'MIST')
               {{ 'MIST' }} 
               @elseif(  $afternoon[$key]->weather == 'FOG') 
               {{ 'FOG' }} 
               @elseif(  $afternoon[$key]->weather == 'HAZE') 
               {{ 'HAZE' }} 
               @elseif(  $afternoon[$key]->weather == 'SUNNY BREAKS')
               {{'SUNNY BK\'S' }} 
                @elseif(  $afternoon[$key]->weather == 'SUNNY INTERVALS')
                {{'SUNNY INT' }} 
               @elseif(  $afternoon[$key]->weather == 'FEW CLOUDS')
               {{'FEW CLOUDS' }} 
               @elseif(  $afternoon[$key]->weather == 'PARTLY CLOUDY(DAY)')
               {{'P\'CLOUDY' }} 
               @elseif(  $afternoon[$key]->weather == 'PARTLY CLOUDY(NIGHT)')
               {{'P\'CLOUDY' }} 
               @elseif(  $afternoon[$key]->weather == 'CLOUDY')
               {{'CLOUDY' }} 
               @elseif(  $afternoon[$key]->weather == 'CLEAR NIGHT')
               {{'CLEAR NIGHT' }}  
@endif
</td>  
                 
        <td>      @if (  $evening[$key]->weather == 'SUNNY')
                {{ 'SUNNY' }} 
               @elseif(  $evening[$key]->weather == '-TSRA')
               {{ 'SLT TSRA' }}                
               @elseif(  $evening[$key]->weather == 'TSRA')
               {{ 'MOD TSRA' }} 
               @elseif(  $evening[$key]->weather == '+TSRA')
               {{ 'HVY TSRA' }} 
               @elseif(  $evening[$key]->weather == '-RAINDAY')
               {{ 'SLT RAIN' }} 
              @elseif(  $evening[$key]->weather == '-RAINNIGHT')
              {{ 'SLT RAIN' }} 
               @elseif(  $evening[$key]->weather == 'RAINDAY')
               {{ 'MOD RAIN' }} 
                @elseif(  $evening[$key]->weather == 'RAINNIGHT')
                {{ 'MOD RAIN' }} 
               @elseif(  $evening[$key]->weather == '+RAINDAY')
              {{ 'HVY RAIN' }} 
              @elseif(  $evening[$key]->weather == '+RAINNIGHT')
              {{ 'HVY RAIN' }} 
               @elseif(  $evening[$key]->weather == '-DRIZZLEDAY')
               {{ 'SLT DRIZZLE' }}  
              @elseif(  $evening[$key]->weather == '-DRIZZLENIGHT')
              {{ 'SLT DRIZZLE' }} 
               @elseif(  $evening[$key]->weather == 'DRIZZLEDAY')
               {{ 'MOD DRIZZLE' }} 
              @elseif(  $evening[$key]->weather == 'DRIZZLENIGHT')
              {{ 'MOD DRIZZLE' }} 
              @elseif(  $evening[$key]->weather == '+DRIZZLEDAY')
              {{ 'HVY DRIZZLE' }} 
              @elseif(  $evening[$key]->weather == '+DRIZZLENIGHT')
              {{ 'HVY DRIZZLE' }} 
               @elseif(  $evening[$key]->weather == 'HAIL')
               {{ 'HAIL' }} 
               @elseif(  $evening[$key]->weather == 'MIST')
               {{ 'MIST' }} 
               @elseif(  $evening[$key]->weather == 'FOG') 
               {{ 'FOG' }} 
               @elseif(  $evening[$key]->weather == 'HAZE') 
               {{ 'HAZE' }} 
               @elseif(  $evening[$key]->weather == 'SUNNY BREAKS')
               {{'SUNNY BK\'S' }} 
                @elseif(  $evening[$key]->weather == 'SUNNY INTERVALS')
                {{'SUNNY INT' }} 
               @elseif(  $evening[$key]->weather == 'FEW CLOUDS')
               {{'FEW CLOUDS' }} 
               @elseif(  $evening[$key]->weather == 'PARTLY CLOUDY(DAY)')
               {{'P\'CLOUDY' }} 
               @elseif(  $evening[$key]->weather == 'PARTLY CLOUDY(NIGHT)')
               {{'P\'CLOUDY' }} 
               @elseif(  $evening[$key]->weather == 'CLOUDY')
               {{'CLOUDY' }} 
               @elseif( $evening[$key]->weather == 'CLEAR NIGHT')
               {{'CLEAR NIGHT' }} 
@endif
</td>          

@php
  

$highestSpeed = findHighestWindSpeed($value->wind,  $afternoon[$key]->wind, $evening[$key]->wind );

@endphp

                <td>{{ $highestSpeed }}</td>
            </tr>
            @endforeach
    </tbody>
      </table>

      @elseif ($time == 'Afternoon')
      <table class="table table-bordered border-dark fw-bold">
        <tr class="trr text-center">
          <th rowspan="2">CITIES</th>
          <th colspan="6" class="text-center">WEATHER BRIEF</th>
        </tr>
        <tr class="trr text-center">
            <th scope="col" style="font-size: 12px">AFTERNOON ({{ $inlandafternoonGen->date }})</th>
            <th scope="col" style="font-size: 12px">EVENING ({{ $inlandeveningGen->date }})</th>
            <th scope="col" style="font-size: 12px">MORNING ({{ $inlandmorningGen->date }})</th>
            <th scope="col" style="font-size: 12px"> DOMINANT WIND (DIRECTION/SPEED) </th>
        </tr>
        <tbody>
            @foreach($afternoon as $key => $value)
            <tr class="trr text-center"  style="font-size: 12px">
                <th scope="row">{{ $value->districts }}</th>
                <td>
                    @if ( $value->weather == 'SUNNY')
                  {{ 'SUNNY' }}  
                 @elseif( $value->weather == '-TSRA')
                 {{ 'SLT TSRA' }}                
                 @elseif( $value->weather == 'TSRA')
                 {{ 'MOD TSRA' }}  
                 @elseif( $value->weather == '+TSRA')
                 {{ 'HVY TSRA' }}  
                 @elseif( $value->weather == '-RAINDAY')
                 {{ 'SLT RAIN' }}  
                @elseif( $value->weather == '-RAINNIGHT')
                {{ 'SLT RAIN' }}  
                 @elseif( $value->weather == 'RAINDAY')
                 {{ 'MOD RAIN' }}  
                  @elseif( $value->weather == 'RAINNIGHT')
                  {{ 'MOD RAIN' }}  
                 @elseif( $value->weather == '+RAINDAY')
                {{ 'HVY RAIN' }}  
                @elseif( $value->weather == '+RAINNIGHT')
                {{ 'HVY RAIN' }}  
                 @elseif( $value->weather == '-DRIZZLEDAY')
                 {{ 'SLT DRIZZLE' }}  
                @elseif( $value->weather == '-DRIZZLENIGHT')
                {{ 'SLT DRIZZLE' }}  
                 @elseif( $value->weather == 'DRIZZLEDAY')
                 {{ 'MOD DRIZZLE' }}  
                @elseif( $value->weather == 'DRIZZLENIGHT')
                {{ 'MOD DRIZZLE' }}  
                @elseif( $value->weather == '+DRIZZLEDAY')
                {{ 'HVY DRIZZLE' }}  
                @elseif( $value->weather == '+DRIZZLENIGHT')
                {{ 'HVY DRIZZLE' }}  
                 @elseif( $value->weather == 'HAIL')
                 {{ 'HAIL' }}  
                 @elseif( $value->weather == 'MIST')
                 {{ 'MIST' }}  
                 @elseif( $value->weather == 'FOG') 
                 {{ 'FOG' }}  
                 @elseif( $value->weather == 'HAZE') 
                 {{ 'HAZE' }}  
                 @elseif( $value->weather == 'SUNNY BREAKS')
                 {{'SUNNY BK\'S' }}  
                  @elseif( $value->weather == 'SUNNY INTERVALS')
                  {{'SUNNY INT' }}  
                 @elseif( $value->weather == 'FEW CLOUDS')
                 {{'FEW CLOUDS' }}  
                 @elseif( $value->weather == 'PARTLY CLOUDY(DAY)')
                 {{'P\'CLOUDY' }}  
                 @elseif( $value->weather == 'PARTLY CLOUDY(NIGHT)')
                 {{'P\'CLOUDY' }}  
                 @elseif( $value->weather == 'CLOUDY')
                 {{'CLOUDY' }}  
                 @elseif( $value->weather == 'CLEAR NIGHT')
                 {{'CLEAR NIGHT' }}  
@endif
 </td>
                <td>  
                @if (  $evening[$key]->weather == 'SUNNY')
                {{ 'SUNNY' }}  

               @elseif(  $evening[$key]->weather == '-TSRA')
               {{ 'SLT TSRA' }}                
               @elseif(  $evening[$key]->weather == 'TSRA')
               {{ 'MOD TSRA' }} 
               @elseif(  $evening[$key]->weather == '+TSRA')
               {{ 'HVY TSRA' }} 
               @elseif(  $evening[$key]->weather == '-RAINDAY')
               {{ 'SLT RAIN' }} 
              @elseif(  $evening[$key]->weather == '-RAINNIGHT')
              {{ 'SLT RAIN' }} 
               @elseif(  $evening[$key]->weather == 'RAINDAY')
               {{ 'MOD RAIN' }} 
                @elseif(  $evening[$key]->weather == 'RAINNIGHT')
                {{ 'MOD RAIN' }} 
               @elseif(  $evening[$key]->weather == '+RAINDAY')
              {{ 'HVY RAIN' }} 
              @elseif(  $evening[$key]->weather == '+RAINNIGHT')
              {{ 'HVY RAIN' }} 
               @elseif(  $evening[$key]->weather == '-DRIZZLEDAY')
               {{ 'SLT DRIZZLE' }}  
              @elseif(  $evening[$key]->weather == '-DRIZZLENIGHT')
              {{ 'SLT DRIZZLE' }} 
               @elseif(  $evening[$key]->weather == 'DRIZZLEDAY')
               {{ 'MOD DRIZZLE' }} 
              @elseif(  $evening[$key]->weather == 'DRIZZLENIGHT')
              {{ 'MOD DRIZZLE' }} 
              @elseif(  $evening[$key]->weather == '+DRIZZLEDAY')
              {{ 'HVY DRIZZLE' }} 
              @elseif(  $evening[$key]->weather == '+DRIZZLENIGHT')
              {{ 'HVY DRIZZLE' }} 
               @elseif(  $evening[$key]->weather == 'HAIL')
               {{ 'HAIL' }} 
               @elseif(  $evening[$key]->weather == 'MIST')
               {{ 'MIST' }} 
               @elseif(  $evening[$key]->weather == 'FOG') 
               {{ 'FOG' }} 
               @elseif(  $evening[$key]->weather == 'HAZE') 
               {{ 'HAZE' }} 
               @elseif(  $evening[$key]->weather == 'SUNNY BREAKS')
               {{'SUNNY BK\'S' }} 
                @elseif(  $evening[$key]->weather == 'SUNNY INTERVALS')
                {{'SUNNY INT' }} 
               @elseif(  $evening[$key]->weather == 'FEW CLOUDS')
               {{'FEW CLOUDS' }} 
               @elseif(  $evening[$key]->weather == 'PARTLY CLOUDY(DAY)')
               {{'P\'CLOUDY' }} 
               @elseif(  $evening[$key]->weather == 'PARTLY CLOUDY(NIGHT)')
               {{'P\'CLOUDY' }} 
               @elseif(  $evening[$key]->weather == 'CLOUDY')
               {{'CLOUDY' }} 
               @elseif(  $evening[$key]->weather == 'CLEAR NIGHT')
               {{'CLEAR NIGHT' }}  
@endif
</td>  
            
        <td>      @if (  $morning[$key]->weather == 'SUNNY')
                {{ 'SUNNY' }} 
               @elseif(  $morning[$key]->weather == '-TSRA')
               {{ 'SLT TSRA' }}   
                       
               @elseif(  $morning[$key]->weather == 'TSRA')
               {{ 'MOD TSRA' }} 
           
               @elseif(  $morning[$key]->weather == '+TSRA')
               {{ 'HVY TSRA' }} 
           
               @elseif(  $morning[$key]->weather == '-RAINDAY')
               {{ 'SLT RAIN' }} 
            
              @elseif(  $morning[$key]->weather == '-RAINNIGHT')
              {{ 'SLT RAIN' }} 
               @elseif(  $morning[$key]->weather == 'RAINDAY')
               {{ 'MOD RAIN' }} 
           
                @elseif(  $morning[$key]->weather == 'RAINNIGHT')
                {{ 'MOD RAIN' }} 
               @elseif(  $morning[$key]->weather == '+RAINDAY')
              {{ 'HVY RAIN' }} 
              @elseif(  $morning[$key]->weather == '+RAINNIGHT')
              {{ 'HVY RAIN' }} 
               @elseif(  $morning[$key]->weather == '-DRIZZLEDAY')
               {{ 'SLT DRIZZLE' }}  
           
              @elseif(  $morning[$key]->weather == '-DRIZZLENIGHT')
              {{ 'SLT DRIZZLE' }} 
               @elseif(  $morning[$key]->weather == 'DRIZZLEDAY')
               {{ 'MOD DRIZZLE' }} 
           
              @elseif(  $morning[$key]->weather == 'DRIZZLENIGHT')
              {{ 'MOD DRIZZLE' }} 
              @elseif(  $morning[$key]->weather == '+DRIZZLEDAY')
              {{ 'HVY DRIZZLE' }} 
              @elseif(  $morning[$key]->weather == '+DRIZZLENIGHT')
              {{ 'HVY DRIZZLE' }} 
               @elseif(  $morning[$key]->weather == 'HAIL')
               {{ 'HAIL' }} 
            
               @elseif(  $morning[$key]->weather == 'MIST')
               {{ 'MIST' }} 
          
               @elseif(  $morning[$key]->weather == 'FOG') 
               {{ 'FOG' }} 
           
               @elseif(  $morning[$key]->weather == 'HAZE') 
               {{ 'HAZE' }} 
           
               @elseif(  $morning[$key]->weather == 'SUNNY BREAKS')
               {{'SUNNY BK\'S' }} 
           
                @elseif(  $morning[$key]->weather == 'SUNNY INTERVALS')
                {{'SUNNY INT' }} 
               @elseif(  $morning[$key]->weather == 'FEW CLOUDS')
               {{'FEW CLOUDS' }} 
           
               @elseif(  $morning[$key]->weather == 'PARTLY CLOUDY(DAY)')
               {{'P\'CLOUDY' }} 
            
               @elseif(  $morning[$key]->weather == 'PARTLY CLOUDY(NIGHT)')
               {{'P\'CLOUDY' }} 
           
               @elseif(  $morning[$key]->weather == 'CLOUDY')
               {{'CLOUDY' }} 
           
               @elseif( $morning[$key]->weather == 'CLEAR NIGHT')
               {{'CLEAR NIGHT' }} 
           
@endif
</td>          
              
                @php
               
             
             $highestSpeed = findHighestWindSpeed($value->wind, $morning[$key]->wind, $evening[$key]->wind );
             
             @endphp
             
                             <td >{{ $highestSpeed }}</td>

            </tr>
            @endforeach
    </tbody>
      </table>
  @else
  
  <table class="table table-bordered border-dark fw-bold">
    <tr class="trr text-center">
      <th rowspan="2">CITIES</th>
      <th colspan="6" class="text-center">WEATHER BRIEF</th>
    </tr>
    <tr class="trr text-center"> 
        <th scope="col" style="font-size: 12px;" >EVENING ({{ $inlandeveningGen->date }})</th>
        <th scope="col" style="font-size: 12px;">MORNING ({{ $inlandmorningGen->date }})</th>
        <th scope="col" style="font-size: 12px;">AFTERNOON ({{ $inlandafternoonGen->date }})</th>
        <th scope="col" style="font-size: 12px;"> DOMINANT WIND (DIRECTION/SPEED) </th>
    </tr>
    <tbody>
        @foreach($evening as $key => $value)
        <tr class="trr text-center"  style="font-size: 12px">
            <th scope="row">{{ $value->districts }}</th>
            <td>
                @if ( $value->weather == 'SUNNY')
              {{ 'SUNNY' }} 
             @elseif( $value->weather == '-TSRA')
             {{ 'SLT TSRA' }}              
             @elseif( $value->weather == 'TSRA')
             {{ 'MOD TSRA' }} 
             @elseif( $value->weather == '+TSRA')
             {{ 'HVY TSRA' }} 
             @elseif( $value->weather == '-RAINDAY')
             {{ 'SLT RAIN' }} 
            @elseif( $value->weather == '-RAINNIGHT')
            {{ 'SLT RAIN' }} 
             @elseif( $value->weather == 'RAINDAY')
             {{ 'MOD RAIN' }} 
              @elseif( $value->weather == 'RAINNIGHT')
              {{ 'MOD RAIN' }}  
             @elseif( $value->weather == '+RAINDAY')
            {{ 'HVY RAIN' }} 
            @elseif( $value->weather == '+RAINNIGHT')
            {{ 'HVY RAIN' }}  
             @elseif( $value->weather == '-DRIZZLEDAY')
             {{ 'SLT DRIZZLE' }}  
            @elseif( $value->weather == '-DRIZZLENIGHT')
            {{ 'SLT DRIZZLE' }} 
             @elseif( $value->weather == 'DRIZZLEDAY')
             {{ 'MOD DRIZZLE' }} 
            @elseif( $value->weather == 'DRIZZLENIGHT')
            {{ 'MOD DRIZZLE' }}  
            @elseif( $value->weather == '+DRIZZLEDAY')
            {{ 'HVY DRIZZLE' }}  
            @elseif( $value->weather == '+DRIZZLENIGHT')
            {{ 'HVY DRIZZLE' }} 
             @elseif( $value->weather == 'HAIL')
             {{ 'HAIL' }}  
             @elseif( $value->weather == 'MIST')
             {{ 'MIST' }}  
             @elseif( $value->weather == 'FOG') 
             {{ 'FOG' }}  
             @elseif( $value->weather == 'HAZE') 
             {{ 'HAZE' }} 
             @elseif( $value->weather == 'SUNNY BREAKS')
             {{'SUNNY BK\'S' }} 
              @elseif( $value->weather == 'SUNNY INTERVALS')
              {{'SUNNY INT' }} 
             @elseif( $value->weather == 'FEW CLOUDS')
             {{'FEW CLOUDS' }}  
             @elseif( $value->weather == 'PARTLY CLOUDY(DAY)')
             {{'P\'CLOUDY' }} 
             @elseif( $value->weather == 'PARTLY CLOUDY(NIGHT)')
             {{'P\'CLOUDY' }}  
             @elseif( $value->weather == 'CLOUDY')
             {{'CLOUDY' }}  
             @elseif( $value->weather == 'CLEAR NIGHT')
             {{'CLEAR NIGHT' }} 
@endif
</td>
         
            <td>  
            @if (  $morning[$key]->weather == 'SUNNY')
            {{ 'SUNNY' }} 

           @elseif(  $morning[$key]->weather == '-TSRA')
           {{ 'SLT TSRA' }}       
           @elseif(  $morning[$key]->weather == 'TSRA')
           {{ 'MOD TSRA' }} 
           @elseif(  $morning[$key]->weather == '+TSRA')
           {{ 'HVY TSRA' }} 
           @elseif(  $morning[$key]->weather == '-RAINDAY')
           {{ 'SLT RAIN' }} 
          @elseif(  $morning[$key]->weather == '-RAINNIGHT')
          {{ 'SLT RAIN' }} 
           @elseif(  $morning[$key]->weather == 'RAINDAY')
           {{ 'MOD RAIN' }} 
            @elseif(  $morning[$key]->weather == 'RAINNIGHT')
            {{ 'MOD RAIN' }}
           @elseif(  $morning[$key]->weather == '+RAINDAY')
          {{ 'HVY RAIN' }} 
          @elseif(  $morning[$key]->weather == '+RAINNIGHT')
          {{ 'HVY RAIN' }} 
           @elseif(  $morning[$key]->weather == '-DRIZZLEDAY')
           {{ 'SLT DRIZZLE' }}  
          @elseif(  $morning[$key]->weather == '-DRIZZLENIGHT')
          {{ 'SLT DRIZZLE' }} 
           @elseif(  $morning[$key]->weather == 'DRIZZLEDAY')
           {{ 'MOD DRIZZLE' }} 
          @elseif(  $morning[$key]->weather == 'DRIZZLENIGHT')
          {{ 'MOD DRIZZLE' }} 
          @elseif(  $morning[$key]->weather == '+DRIZZLEDAY')
          {{ 'HVY DRIZZLE' }} 
          @elseif(  $morning[$key]->weather == '+DRIZZLENIGHT')
          {{ 'HVY DRIZZLE' }} 
           @elseif(  $morning[$key]->weather == 'HAIL')
           {{ 'HAIL' }} 
           @elseif(  $morning[$key]->weather == 'MIST')
           {{ 'MIST' }} 
           @elseif(  $morning[$key]->weather == 'FOG') 
           {{ 'FOG' }} 
           @elseif(  $morning[$key]->weather == 'HAZE') 
           {{ 'HAZE' }} 
           @elseif(  $morning[$key]->weather == 'SUNNY BREAKS')
           {{'SUNNY BK\'S' }} 
            @elseif(  $morning[$key]->weather == 'SUNNY INTERVALS')
            {{'SUNNY INT' }}
           @elseif(  $morning[$key]->weather == 'FEW CLOUDS')
           {{'FEW CLOUDS' }} 
           @elseif(  $morning[$key]->weather == 'PARTLY CLOUDY(DAY)')
           {{'P\'CLOUDY' }}
           @elseif(  $morning[$key]->weather == 'PARTLY CLOUDY(NIGHT)')
           {{'P\'CLOUDY' }} 
           @elseif(  $morning[$key]->weather == 'CLOUDY')
           {{'CLOUDY' }}
           @elseif(  $morning[$key]->weather == 'CLEAR NIGHT')
           {{'CLEAR NIGHT' }} 
@endif
</td>  
   
    <td>      @if (  $afternoon[$key]->weather == 'SUNNY')
            {{ 'SUNNY' }}
           @elseif(  $afternoon[$key]->weather == '-TSRA')
           {{ 'SLT TSRA' }}                
           @elseif(  $afternoon[$key]->weather == 'TSRA')
           {{ 'MOD TSRA' }} 
           @elseif(  $afternoon[$key]->weather == '+TSRA')
           {{ 'HVY TSRA' }} 
           @elseif(  $afternoon[$key]->weather == '-RAINDAY')
           {{ 'SLT RAIN' }} 
          @elseif(  $afternoon[$key]->weather == '-RAINNIGHT')
          {{ 'SLT RAIN' }} 
           @elseif(  $afternoon[$key]->weather == 'RAINDAY')
           {{ 'MOD RAIN' }} 
            @elseif(  $afternoon[$key]->weather == 'RAINNIGHT')
            {{ 'MOD RAIN' }}
           @elseif(  $afternoon[$key]->weather == '+RAINDAY')
          {{ 'HVY RAIN' }} 
          @elseif(  $afternoon[$key]->weather == '+RAINNIGHT')
          {{ 'HVY RAIN' }} 
           @elseif(  $afternoon[$key]->weather == '-DRIZZLEDAY')
           {{ 'SLT DRIZZLE' }}  
          @elseif(  $afternoon[$key]->weather == '-DRIZZLENIGHT')
          {{ 'SLT DRIZZLE' }} 
           @elseif(  $afternoon[$key]->weather == 'DRIZZLEDAY')
           {{ 'MOD DRIZZLE' }} 
          @elseif(  $afternoon[$key]->weather == 'DRIZZLENIGHT')
          {{ 'MOD DRIZZLE' }} 
          @elseif(  $afternoon[$key]->weather == '+DRIZZLEDAY')
          {{ 'HVY DRIZZLE' }} 
          @elseif(  $afternoon[$key]->weather == '+DRIZZLENIGHT')
          {{ 'HVY DRIZZLE' }} 
           @elseif(  $afternoon[$key]->weather == 'HAIL')
           {{ 'HAIL' }} 
           @elseif(  $afternoon[$key]->weather == 'MIST')
           {{ 'MIST' }} 
           @elseif(  $afternoon[$key]->weather == 'FOG') 
           {{ 'FOG' }} 
           @elseif(  $afternoon[$key]->weather == 'HAZE') 
           {{ 'HAZE' }} 
           @elseif(  $afternoon[$key]->weather == 'SUNNY BREAKS')
           {{'SUNNY BK\'S' }} 
            @elseif(  $afternoon[$key]->weather == 'SUNNY INTERVALS')
            {{'SUNNY INT' }} 
           @elseif(  $afternoon[$key]->weather == 'FEW CLOUDS')
           {{'FEW CLOUDS' }} 
           @elseif(  $afternoon[$key]->weather == 'PARTLY CLOUDY(DAY)')
           {{'P\'CLOUDY' }} 
           @elseif(  $afternoon[$key]->weather == 'PARTLY CLOUDY(NIGHT)')
           {{'P\'CLOUDY' }} 
           @elseif(  $afternoon[$key]->weather == 'CLOUDY')
           {{'CLOUDY' }} 
           @elseif( $afternoon[$key]->weather == 'CLEAR NIGHT')
           {{'CLEAR NIGHT' }} 
@endif
</td>          
         
            @php
           
         
         $highestSpeed = findHighestWindSpeed($value->wind, $morning[$key]->wind, $afternoon[$key]->wind );
         
         @endphp
         
                         <td >{{ $highestSpeed }}</td>


        </tr>
        @endforeach
</tbody>
</table>
  @endif

<h6 class="fw-bold text-center text-dark my-0 py-0" style="font-size: 11px">
    &checkmark; LEGEND:
</h6>

<div class="container my-0 py-0">
    {{-- <label for="legend" class="text-dark fw-bold" style="font-size: 11px">LEGEND</label> --}}
    <table class="table table-bordered text-dark border-dark" id="legend" style="font-size: 10px">
       
        <tbody style="font-size: 11px">
            <tr class="trr text-center fw-bold" >
                <td scope="row">% - PROBABILITY OF OCCURRENCE</td>
                <td>P'CLOUDY - PARTLY CLOUDY</td>
                <td>P'RDS - PERIODS</td>
            </tr>
            <tr class="trr text-center fw-bold">
                <td scope="row">TSRA -THUNDERSTORMS/RAIN</td>
                <td>INT - INTERVALS</td>
                <td>SL'T - SLIGHT</td>
            </tr>
            <tr class="trr text-center fw-bold">
                <td scope="row">BK'S - BREAKS</td>
                <td>HVY - Heavy</td>
                <td>MOD - MODERATE</td>
            </tr>
            
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between py-0 my-0" style="font-size: 10px">
    <div>
<h6 class="text-start fw-bold">
    ISSUED AT {{ \Carbon\Carbon::parse($inlandforecast['updated_at'])->format('H:i') }} UTC
</h6>  
</div>
    <div  style="float:right; font-size: 13px; text-align:center">
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center">DATE: {{ \Carbon\Carbon::parse($inlandforecast['created_at'])->format('d/m/Y') }}</h6>
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center">SIGNED</h6>
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center"> {{ Str::upper(Auth::user()->name)  }}</h6>
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center">(DUTY FORECASTER)</h6>
    </div>
</div>
<div class="horizontal-line"></div>
<div class="row my-0 py-0">
    <div class="col fw-bold">
<h6 style="font-size: 10px">GHANA METEOROLOGICAL AGENCY, FORECAST DIVISION</h6>
    </div>
    <div class="col fw-bold float-right" >
<h6 style="font-size: 10px" class="text-end">MAIN FORECAST OFFICE, ACCRA</h6> 
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