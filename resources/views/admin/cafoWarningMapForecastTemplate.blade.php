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
    border-color:  #292b2c; 
}
table .httr td:nth-child(even) {
    border-color:  #292b2c; 
}
/* table tr th:nth-child(odd) {
    border-color:  #292b2c; 
}
table tr th:nth-child(even) {
    border-color:  #292b2c; 
} */

.horizontal-line {
  border: none; /* Remove the default line */
  border-top: 1px solid #000; /* Add a 1-pixel solid black line */
  margin: 10px 0; /* Adjust margin for spacing if needed */
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
    <div class="col-4">
        <div class="d-flex  flex-column justify-content-start text-white" >
            <div class="fw-bold" style="font-size: 10px">P.O Box LG 87, Accra</div>
            <div class="fw-bold"  style="font-size: 10px">Tel: +233-302-543252/307010019</div>
            <div class="fw-bold"  style="font-size: 10px">Digital Address: GA-485-3581</div>
            <div class="fw-bold"  style="font-size: 10px">Twitter: @GhanaMet</div>
          </div>
    </div>
    <div class="col-4"></div>

    <div class="col-4">
        <div class="d-flex flex-column justify-content-end text-white">
            <div class="fw-bold text-white" style="font-size: 10px; align-self:flex-start">Email: <a class="text-white" href="mailto:kiamo@meteo.gov.gh">kiamo@meteo.gov.gh</a></div>
            <div class="fw-bold "  style="font-size: 10px; align-self:flex-start">Website: <a class="text-white" href="https://www.meteo.gov.gh">www.meteo.gov.gh</a></div>
            {{-- <div class="fw-bold"  style="font-size: 10px; align-self:flex-start"></div> --}}
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
    <div class="col-8 fw-bold text-dark text-center"  style="font-size: 18px; text-decoration:underline;"> 24-HOUR IMPACT-BASED FORECAST FOR GHANA</div>
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





<div class="container-fluid " >

@if ($time == 'Morning')
<div class="row">
    <div class="col-10 mx-0 px-0">
<div class="card-group mx-0 px-0">
    {{-- morning map --}}
    <div class="card"  style="width: 100%;
    height: 450px;">
     <div class="card-body" >
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">MORNING ({{ $morningDate->date }}) </h5>
 
            <div id="morningMap" style="position: relative; width: 100%; height: 95%;"></div>
        </div> 
    </div>
    <div class="card"  style="width: 100%;
    height: 450px;">
    <div class="card-body" >
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">AFTERNOON ({{ $afternoonDate->date }})
        </h5>
            <div id="afternoonMap" style="position: relative; width: 100%; height: 95%;"></div>
   </div> </div>
    <div class="card"  style="width: 100%;
    height: 450px;">
    <div class="card-body">
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">EVENING ({{ $eveningDate->date }})</h5>
        {{-- <p class="card-text"> --}}
            <div id="eveningMap" style="position: relative; width: 100%; height: 95%;"></div>
        {{-- </p> --}}
      </div>
    </div>
</div>
</div>
<div class="col-2 mx-0 px-0">
    <table class="table table-white table-bordere fw-bold text-center" style="height: 450px; font-size: 13px">
        <thead>
    <tr><th scope="col">CAFO</th></tr>
        </thead>
        <tbody>
            <tr> <td scope="row" class="bg-dark text-white">Date</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($addDailyForecast['created_at'])->format('d/m/Y') }}</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Time Issued</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($addDailyForecast['updated_at'])->format('H:i') }} UTC</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Nowcasting Risk</td></tr>
            <tr> <th class="text-center" style="background-color:#ff0000">Take Action</th> </tr> 
         </tr><th class="text-center" style="background-color: #eda411">Be Prepared</th></tr>
         </tr><th  class="text-center" style="background-color: #e9f542">Be Aware</th></tr>
         </tr><th class="text-center" style="background-color: #4ca64c">Low Risk</th></tr>
         </tr><th class="text-center" style="background-color: white">No Risk</th></tr>
        </tbody>
    </table>
</div>
</div>
 
  @elseif ($time == 'Afternoon')
  <div class="row">
    <div class="col-10 mx-0 px-0">
<div class="card-group mx-0 px-0">
 
    <div class="card"  style="width: 100%;
    height: 450px;">
    <div class="card-body" >
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">AFTERNOON ({{ $afternoonDate->date }})
        </h5>
            <div id="afternoonMap" style="position: relative; width: 100%; height: 95%;"></div>
   </div> </div>
    <div class="card"  style="width: 100%;
    height: 450px;">
    <div class="card-body">
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">EVENING ({{ $eveningDate->date }})</h5>
        {{-- <p class="card-text"> --}}
            <div id="eveningMap" style="position: relative; width: 100%; height: 95%;"></div>
        {{-- </p> --}}
      </div>
    </div>
   {{-- morning map --}}
    <div class="card"  style="width: 100%;
    height: 450px;">
     <div class="card-body" >
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">MORNING ({{ $morningDate->date }}) </h5>
 
            <div id="morningMap" style="position: relative; width: 100%; height: 95%;"></div>
        </div> 
    </div>

</div>
</div>
<div class="col-2 mx-0 px-0">
    <table class="table table-white table-bordere fw-bold text-center" style="height: 450px; font-size: 13px">
        <thead>
    <tr><th scope="col">CAFO</th></tr>
        </thead>
        <tbody>
            <tr> <td scope="row" class="bg-dark text-white">Date</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($addDailyForecast['created_at'])->format('d/m/Y') }}</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Time Issued</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($addDailyForecast['updated_at'])->format('H:i') }} UTC</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Nowcasting Risk</td></tr>
            <tr> <th class="text-center" style="background-color:#ff0000">Take Action</th> </tr> 
         </tr><th class="text-center" style="background-color: #eda411">Be Prepared</th></tr>
         </tr><th  class="text-center" style="background-color: #e9f542">Be Aware</th></tr>
         </tr><th class="text-center" style="background-color: #4ca64c">Low Risk</th></tr>
         </tr><th class="text-center" style="background-color: white">No Risk</th></tr>
        </tbody>
    </table>
</div>
</div>

  @else
  <div class="row">
    <div class="col-10 mx-0 px-0">
<div class="card-group mx-0 px-0">
 
   
    <div class="card"  style="width: 100%;
    height: 450px;">
    <div class="card-body">
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">EVENING ({{ $eveningDate->date }})</h5>
        {{-- <p class="card-text"> --}}
            <div id="eveningMap" style="position: relative; width: 100%; height: 95%;"></div>
        {{-- </p> --}}
      </div>
    </div>
   {{-- morning map --}}
    <div class="card"  style="width: 100%;
    height: 450px;">
     <div class="card-body" >
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">MORNING ({{ $morningDate->date }}) </h5>
 
            <div id="morningMap" style="position: relative; width: 100%; height: 95%;"></div>
        </div> 
    </div>
    <div class="card"  style="width: 100%;
    height: 450px;">
    <div class="card-body" >
        <h5 class="card-title fw-bold font-monospace text-center" style="font-size: 15px">AFTERNOON ({{ $afternoonDate->date }})
        </h5>
            <div id="afternoonMap" style="position: relative; width: 100%; height: 95%;"></div>
   </div> 
</div>

</div>
</div>
<div class="col-2 mx-0 px-0">
    <table class="table table-white table-bordere fw-bold text-center" style="height: 450px; font-size: 13px">
        <thead>
    <tr><th scope="col">CAFO</th></tr>
        </thead>
        <tbody>
            <tr> <td scope="row" class="bg-dark text-white">Date</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($addDailyForecast['created_at'])->format('d/m/Y') }}</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Time Issued</td></tr>
            <tr><td scope="row">{{ \Carbon\Carbon::parse($addDailyForecast['updated_at'])->format('H:i') }} UTC</td></tr>
            <tr> <td scope="row" class="bg-dark text-white">Nowcasting Risk</td></tr>
            <tr> <th class="text-center" style="background-color:#ff0000">Take Action</th> </tr> 
         </tr><th class="text-center" style="background-color: #eda411">Be Prepared</th></tr>
         </tr><th  class="text-center" style="background-color: #e9f542">Be Aware</th></tr>
         </tr><th class="text-center" style="background-color: #4ca64c">Low Risk</th></tr>
         </tr><th class="text-center" style="background-color: white">No Risk</th></tr>
        </tbody>
    </table>
</div>
</div>
  @endif

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
            <th class="text-center" style="background-color: #e9f542">G</th>
            <th class="text-center" style="background-color: #eda411">H</th>
            <th class="text-center" style="background-color:#ff0000">I</th>
          
        </thead>
        <tbody>
          <thead class="httr">
            <th>Medium(40% - 60%)</th>
            <th class="text-center" style="background-color: #4ca64c">D</th>
            <th  class="text-center" style="background-color: #e9f542">E</th>
            <th class="text-center" style="background-color: #eda411">F</th>
          </thead>
          <thead class="httr">
            <th>Low(<40%) </th>
            <th class="text-center" style="background-color: #4ca64c">A</th>
            <th class="text-center" style="background-color: #4ca64c">B</th>
            <th  class="text-center" style="background-color: #e9f542">C</th>
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
    </div>
  </div>

<div class="">
    {{-- <label for="legend" class="text-dark fw-bold" style="font-size: 11px">LEGEND</label> --}}
    <table class="table table-bordered text-dark border-dark" id="legend" style="font-size: 10px">
        <tbody style="font-size: 14px">
            <tr class="text-center fw-bold httr" style="background-color:rgb(110, 188, 214)" >
                <td scope="row">Sector</td>
                <td>Minimum Temperature (°C)</td>
                <td>Maximum Temperature (°C)</td>
            </tr>
            @foreach ($temperatureData as $zonetemp)
                <tr class="text-center fw-bold httr">
                <td scope="row">{{ $zonetemp->districtZone}}</td>
                <td>{{ $zonetemp->minTemp}}</td>
                <td>{{ $zonetemp->maxTemp}}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>
<h6 class="m-1 p-1 fw-bold text-danger ">SUMMARY: <span class="fw-light text-dark text-left">
 {{ ucfirst($addDailyForecast['summary']) }} 
 </span> </h6>
{{-- <div class="d-flex justify-content-between py-0 my-0" style="font-size: 10px">
    <div>
<h6 class="text-start fw-bold">
    ISSUED AT {{ \Carbon\Carbon::parse($addDailyForecast['updated_at'])->format('H:i') }} UTC
</h6>  
</div>
    <div  style="float:right; font-size: 13px; text-align:center">
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center">DATE: {{ \Carbon\Carbon::parse($addDailyForecast['created_at'])->format('d/m/Y') }}</h6>
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center">SIGNED</h6>
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center"> {{ Auth::user()->name }}</h6>
<h6 class="text-center fw-bold" style="font-size: 13px; text-align:center">(DUTY FORECASTER)</h6>
    </div>
</div> --}}
 
<div id="polygonElementM" data-polygonM="{{ json_encode($polygonM) }}"    data-markerM="{{ json_encode($markersM)  }}"></div>
<div id="polygonElementA" data-polygonA="{{ json_encode($polygonA) }}"    data-markerA="{{ json_encode($markersA)  }}"></div>
<div id="polygonElementE" data-polygonE="{{ json_encode($polygonE) }}"    data-markerE="{{ json_encode($markersE)  }}"></div>
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
<h6 style="font-size: 15px" class="text-center" style="background-color:rgb(110, 188, 214)">SIGNED: Central Analysis and Forecasting Office CAFO</h6> 
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



<script src="{{ asset('assets/js/generatemap.js') }}"></script>
<script src="{{ asset('assets/js/generateMapPDF.js') }}"></script>


    @endsection
 
@endsection