@extends('admin.adminApp')

@section('adminContent')

@section('inlandforecasteCss')
    <link rel="stylesheet" href="{{ asset('assets/css/addinlandForecast.css') }}">
@endsection


@section('inlandforecasteJs')
    <script src="{{ asset('assets/js/addinlandForecast.js') }}"></script>
@endsection


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h4>Add A New Inland Forecast</h4>
                  <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="get-started-tab" data-bs-toggle="tab" href="#get-started" role="tab" aria-controls="get-started" aria-selected="true">Getting Started</a>
 <a class="flex-sm-fill text-sm-center nav-link "  id="tableForecast-tab" data-bs-toggle="tab" href="#tableForecast" role="tab" aria-controls="tableForecast" aria-selected="false">Table</a>
 
				    <a class="flex-sm-fill text-sm-center nav-link disabled" id="map-tab" data-bs-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>

				   
                    <a class="flex-sm-fill text-sm-center nav-link disabled" id="weatherSummary-tab" data-bs-toggle="tab" href="#weatherSummary" role="tab" aria-controls="weatherSummary" aria-selected="false">Summary</a>
				    <a class="flex-sm-fill text-sm-center nav-link disabled" id="weatherWarning-tab" data-bs-toggle="tab" href="#weatherWarning" role="tab" aria-controls="weatherWarning" aria-selected="false">Weather-Warning</a>
				    </nav>
                <div class="tab-content" id="orders-table-tab-content">
                  {{-- get Started  FORECAST TAB --}}
<div class="tab-pane fade show active" id="get-started" role="tabpanel" aria-labelledby="get-started-tab">

    <div class="alert alert-white alert-dismissible fade show p-2 m-2" role="alert">
        <h3 class="text-center"> <strong> Welcome Inland Forecater</strong> </h3> </div>
        {{-- wave animation --}}
         <div class="container" >
            
 <div class="wavess back" style="background-color: skyblue;">
     <svg viewBox="0 24 150 28">
       <defs>
         <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
       </defs>
       <use xlink:href="#gentle-wave" x="48" y="5"></use>
       <use xlink:href="#gentle-wave" x="48" y="7"></use>
     </svg>
   </div>
   <div class="boats">
     <div class="sail1"></div>
     <div class="sail2"></div>
     <div class="hull"></div>
   </div>
   <div class="wavess front">
     <svg viewBox="0 24 150 28">
       <defs>
         <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
       </defs>
       <use xlink:href="#gentle-wave" x="48" y="0"></use>
       <use xlink:href="#gentle-wave" x="48" y="3"></use>
     </svg>
   </div>
           </div>
           


      {{-- end of get Started  FORECAST TAB --}}
</div> 

 
{{-- table FORECAST TAB --}}
<div class="tab-pane fade " id="tableForecast" role="tabpanel" aria-labelledby="tableForecast-tab">
  <div class="container">
    {{-- <div class="alert alert-danger alert-dismissible fade show p-2 m-2" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <h4><strong> Error: </strong></h4>
      <p class="tableerror"> </p>
    </div> --}}
    <div class="row">
        <div class="d-flex justify-content-between bd-highlight mb-2">
       <div></div>  
       <button type="button" class="btn btn-success text-white" id="inlandnextBtn2ndpage">Save and Continue</button>
  </div>
    </div>
  </div>
    {{-- morning forecast table --}}
    <div class="table-responsive">
    <table class="table table-bordered text-center">
        {{-- time of day --}}
        <thead class="thead-dark">
          <tr>
            <th></th>
            <th colspan="7">
                Morning
                <div class="row">
                <div class="col">
                    <label for="inlandDatetableMorning" class="form-label">Set Date</label>
                    <input type="date" class="form-control required" id="inlandDatetableMorning">
                  </div>
                  <div class="col">
                    <label for="minTemptableMorning" class="form-label">Set Min. Temp</label>
                    <input type="number" class="form-control required" id="minTemptableMorning" placeholder="e.g: 21">
                  </div>
                   <div class="col">
                    <label for="maxTemptableMorning" class="form-label">Set Max. Temp</label>
                    <input type="number" class="form-control required" id="maxTemptableMorning" placeholder="e.g: 35">
                  </div>
                   
                </div>
                </th>
            </tr>
           {{-- time of day --}}
        </thead>

        {{-- sub titles --}}
        <thead class="thead-light">
          <tr>
            <th>Cities</th>
            {{-- morning section --}}
            <th>Weather</th>
            <th> Wind (KT)</th>
           
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
          
            {{-- 1st row  --}}
            @if (!empty($districts))
            @foreach ($districts as $district) 
          <tr class="morning" districtnam="{{ $district->districtname }}" >
  <td>{{ $district->districtname }}</td> 
            {{-- morning --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm weatherdetail required" aria-label="Small select">
                    <option value="null">Select Weather</option>
                    <option value="-TSRA">SLIGHT TSRA(-)</option>
                     <option value="TSRA">MODERATE TSRA</option>
                    <option value="+TSRA">HEAVY TSRA(+)</option>
                    <option value="-RAINDAY">SLIGHT RAIN(DAY)</option>
                    {{-- <option value="-RAINNIGHT">SLIGHT RAIN(NIGHT)</option> --}}
                     <option value="RAINDAY">MODERATE RAIN(DAY)</option>
                     {{-- <option value="RAINNIGHT">MODERATE RAIN(NIGHT)</option> --}}
                     <option value="+RAINDAY">HEAVY RAIN(DAY)</option>
                     {{-- <option value="+RAINNIGHT">HEAVY RAIN(NIGHT)</option> --}}
                    <option value="-DRIZZLEDAY">SLIGHT DRIZZLE(DAY)</option>
                    {{-- <option value="-DRIZZLENIGHT">SLIGHT DRIZZLE(NIGHT)</option> --}}
                    <option value="DRIZZLEDAY">MODERATE DRIZZLE(DAY)</option>
                    {{-- <option value="DRIZZLENIGHT">MODERATE DRIZZLE(NIGHT)</option> --}}
                    <option value="+DRIZZLEDAY">HEAVY DRIZZLE(DAY)</option>
                    {{-- <option value="+DRIZZLENIGHT">HEAVY DRIZZLE(NIGHT)</option> --}}
                    
                    <option value="HAIL">HAIL</option>
                    <option value="MIST">MIST</option>
                    <option value="FOG">FOG</option>
                    <option value="HAZE">HAZE</option>
                    <option value="SUNNY">SUNNY</option>
                    <option value="SUNNY BREAKS">SUNNY BREAKS</option>
                    <option value="SUNNY INTERVALS">SUNNY INTERVALS</option>
                    <option value="FEW CLOUDS">FEW CLOUDS</option>
                    <option value="PARTLY CLOUDY(DAY)">PARTLY CLOUDY(DAY)</option>
                    {{-- <option value="PARTLY CLOUDY(NIGHT)">PARTLY CLOUDY(NIGHT)</option> --}}
                    <option value="CLOUDY">CLOUDY</option>
                    {{-- <option value="CLEAR NIGHT">CLEAR NIGHT</option> --}}
                  </select>
            </td>
            
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" placeholder="SW/10KT" >
                    <label for="morningfloatingInputwind{{ $district->id }}">Wind diecton & speed</label>
                  </div>
            </td>
           
          </tr>
          @endforeach 
          @else
          <tr> <td>No dristricts found</td> </tr>
          @endif
        </tbody>
      </table>
    </div>

<br>
  {{-- afternoon forecast table --}}
  <div class="table-responsive mt-2">
    <table class="table table-bordered text-center">
        {{-- time of day --}}
        <thead class="thead-dark">
          <tr>
            <th></th>
            <th colspan="7">
                Afternoon
                <div class="row">
                <div class="col">
                    <label for="inlandDatetableAfternoon" class="form-label">Set Date</label>
                    <input type="date" class="form-control required" id="inlandDatetableAfternoon">
                  </div> 
                  <div class="col">
                    <label for="minTemptableAfternoon" class="form-label">Set Min. Temp</label>
                    <input type="number" class="form-control required" id="minTemptableAfternoon" placeholder="e.g: 21">
                  </div>
                   <div class="col">
                    <label for="maxTemptableAfternoon" class="form-label">Set Max. Temp</label>
                    <input type="number" class="form-control required" id="maxTemptableAfternoon" placeholder="e.g: 35">
                  </div>
                  
                </div>
                </th>
            </tr>
           {{-- time of day --}}
        </thead>

        {{-- sub titles --}}
        <thead class="thead-light">
          <tr>
            <th>Cities</th>
            {{-- Afternoon section --}}
            <th>Weather</th>
            <th> Wind (KT)</th>
             
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
            {{-- 1st row  --}}
             @if (!empty($districts))
            @foreach ($districts as $district) 
          <tr class="afternoon" districtnam="{{ $district->districtname }}">
           
  <td>{{ $district->districtname }}</td> 
            {{-- Afternoon --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="null">Select Weather</option> 
                    <option value="-TSRA">SLIGHT TSRA(-)</option>
                     <option value="TSRA">MODERATE TSRA</option>
                    <option value="+TSRA">HEAVY TSRA(+)</option>
                    <option value="-RAINDAY">SLIGHT RAIN(DAY)</option>
                    {{-- <option value="-RAINNIGHT">SLIGHT RAIN(NIGHT)</option> --}}
                    <option value="RAINDAY">MODERATE RAIN(DAY)</option>
                    {{-- <option value="RAINNIGHT">MODERATE RAIN(NIGHT)</option> --}}
                    <option value="+RAINDAY">HEAVY RAIN(DAY)</option>
                    {{-- <option value="+RAINNIGHT">HEAVY RAIN(NIGHT)</option> --}}
                    <option value="-DRIZZLEDAY">SLIGHT DRIZZLE(DAY)</option>
                    {{-- <option value="-DRIZZLENIGHT">SLIGHT DRIZZLE(NIGHT)</option> --}}
                    <option value="DRIZZLEDAY">MODERATE DRIZZLE(DAY)</option>
                    {{-- <option value="DRIZZLENIGHT">MODERATE DRIZZLE(NIGHT)</option> --}}
                     <option value="+DRIZZLEDAY">HEAVY DRIZZLE(DAY)</option>
                     {{-- <option value="+DRIZZLENIGHT">HEAVY DRIZZLE(NIGHT)</option> --}}
                     
                    <option value="HAIL">HAIL</option>
                    <option value="MIST">MIST</option>
                    <option value="FOG">FOG</option>
                    <option value="HAZE">HAZE</option>
                    <option value="SUNNY">SUNNY</option>
                    <option value="SUNNY BREAKS">SUNNY BREAKS</option>
                    <option value="SUNNY INTERVALS">SUNNY INTERVALS</option>
                    <option value="FEW CLOUDS">FEW CLOUDS</option>
                    <option value="PARTLY CLOUDY(DAY)">PARTLY CLOUDY(DAY)</option>
                    {{-- <option value="PARTLY CLOUDY(NIGHT)">PARTLY CLOUDY(NIGHT)</option> --}}
                    <option value="CLOUDY">CLOUDY</option>
                    {{-- <option value="CLEAR NIGHT">CLEAR NIGHT</option> --}}
                  </select>
            </td>
              
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" placeholder="SW/10KT">
                    <label for="afternoonfloatingInputwind{{ $district->id }}">Wind diecton & speed</label>
                  </div>
            </td>
             
          </tr>
          @endforeach 
          @else
          <tr> <td>No dristricts found</td> </tr>
          @endif
     
        </tbody>
      </table>
    </div>

    <br>
      {{-- evening forecast table --}}
      <div class="table-responsive my-2">
        <table class="table table-bordered text-center">
            {{-- time of day --}}
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th colspan="7">
                    Evening
                    <div class="row">
                    <div class="col">
                        <label for="inlandDatetableEvening" class="form-label">Set Date</label>
                        <input type="date" class="form-control required" id="inlandDatetableEvening">
                      </div> 
                      <div class="col">
                        <label for="minTemptableEvening" class="form-label">Set Min. Temp</label>
                        <input type="number" class="form-control required" id="minTemptableEvening" placeholder="e.g: 21">
                      </div>
                       <div class="col">
                        <label for="maxTemptableEvening" class="form-label">Set Max. Temp</label>
                        <input type="number" class="form-control required" id="maxTemptableEvening" placeholder="e.g: 35">
                      </div>
                    </div>
                </th>
                </tr>
               {{-- time of day --}}
            </thead>
    
            {{-- sub titles --}}
            <thead class="thead-light">
              <tr>
                <th>Cities</th>
                {{-- evening section --}}
                <th>Weather</th>
                <th> Wind (KT)</th>
                </tr>
               {{-- end of sub titles --}}
            </thead>
    
            <tbody>
                {{-- 1st row  --}}
                 @if (!empty($districts))
                @foreach ($districts as $district)  
                 <tr class="evening" districtnam="{{ $district->districtname }}"> 
      <td>{{ $district->districtname }}</td> 
                <td>
                    {{-- weather --}}
                    <select class="form-select form-select-sm required" aria-label="Small select">
                      <option value="null">Select Weather</option>
                      <option value="-TSRA">SLIGHT TSRA(-)</option>
                       <option value="TSRA">MODERATE TSRA</option>
                      <option value="+TSRA">HEAVY TSRA(+)</option>
                      {{-- <option value="-RAINDAY">SLIGHT RAIN(DAY)</option> --}}
                      <option value="-RAINNIGHT">SLIGHT RAIN(NIGHT)</option>
                      {{-- <option value="RAINDAY">MODERATE RAIN(DAY)</option> --}}
                      <option value="RAINNIGHT">MODERATE RAIN(NIGHT)</option>
                       {{-- <option value="+RAINDAY">HEAVY RAIN(DAY)</option> --}}
                       <option value="+RAINNIGHT">HEAVY RAIN(NIGHT)</option>
                      {{-- <option value="-DRIZZLEDAY">SLIGHT DRIZZLE(DAY)</option> --}}
                      <option value="-DRIZZLENIGHT">SLIGHT DRIZZLE(NIGHT)</option>
                      {{-- <option value="DRIZZLEDAY">MODERATE DRIZZLE(DAY)</option> --}}
                       <option value="DRIZZLENIGHT">MODERATE DRIZZLE(NIGHT)</option>
                       {{-- <option value="+DRIZZLEDAY">HEAVY DRIZZLE(DAY)</option> --}}
                       <option value="+DRIZZLENIGHT">HEAVY DRIZZLE(NIGHT)</option>
                       
                      <option value="HAIL">HAIL</option>
                      <option value="MIST">MIST</option>
                      <option value="FOG">FOG</option>
                      <option value="HAZE">HAZE</option>
                      {{-- <option value="SUNNY">SUNNY</option> --}}
                      {{-- <option value="SUNNY BREAKS">SUNNY BREAKS</option> --}}
                      {{-- <option value="SUNNY INTERVALS">SUNNY INTERVALS</option> --}}
                      {{-- <option value="FEW CLOUDS">FEW CLOUDS</option> --}}
                      {{-- <option value="PARTLY CLOUDY(DAY)">PARTLY CLOUDY(DAY)</option> --}}
                      <option value="PARTLY CLOUDY(NIGHT)">PARTLY CLOUDY(NIGHT)</option>
                      <option value="CLOUDY">CLOUDY</option>
                       <option value="CLEAR NIGHT">CLEAR NIGHT</option>
                      </select>
                </td>
                 
                {{-- WIND --}}
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}" placeholder="SW/10KT">
                        <label for="eveningfloatingInputwind{{ $district->id }}">Wind diecton & speed</label>
                      </div>
                </td>
               
              </tr>
  @endforeach 
@else
<tr> <td>No dristricts found</td> </tr>
@endif
            </tbody>
          </table>
        </div>
   {{--end of table FORECAST TAB --}} 
</div>
{{-- MAP --}}
<div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
  <div class="container">
    <div class="row">
        <div class="d-flex justify-content-between bd-highlight mb-2">
       <div></div>  
       <button type="button" class="btn btn-success text-white" id="inlandnextBtn3rdpage">Save and Continue</button>
  </div>
    </div>
  </div>


  <div class="alert alert-primary alert-dismissible fade show p-2 m-2" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong> Welcome  to the the Daily Forecast Upload Page</strong>

      <hr>
          To get started, there are few things you should know:
     <h5> <strong>How to use:
      </strong></h5>
    
     <p> <strong>On the left side of the map you'll see the some icons:</strong> </p>
     <p> 1. The first icon is used for drawing shapes.</p>
      <p> 2. The second icon is used for deleting shapes.</p>
      <p> <strong>At the top side of the map you'll see the some colour buttons:</strong> </p>
      <p>1. The color of the shape you're drawing can be selected using those buttons </p>
      <p>2. You add labels to the map or delete them using the add Rain and delete obiject buttons respectively.</p>
    </div>
   <div class="card-group">
      {{-- morning map --}}
      <div class="card">
          <div class="d-grid gap-2 p-2">
                  <div class="alert alert-warning fade show p-2 m-2" role="alert">
                      <strong class="fs-3"> Morning Map</strong>  </div>
                  <div class="mb-3">
                      <label for="inlanddateInput1" class="form-label">Set Date</label>
                      <input type="date" class="form-control inlandrequiredmapdate" id="inlanddateInput1" >
                    </div>
                  
                </div>
          
                    {{-- <div class="btn-group-vertical" role="group" aria-label="Vertical button group"> --}}
                      <div class="m-2 ">
                      <div class="btn-group">
                          <button type="button" class="btn btn-primary text-white" id="inlandbutton1" typeofIcon="addRain">Add Rain</button>
                          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu overflow-scroll" style="max-width: 260px; max-height: 160px;">
                            <li><a class="dropdown-item svgicon"  id="addRain">Add Rain</a></li>
                            <li><a class="dropdown-item svgicon" id="addWind">Add Wind </a></li>
                            <li><a class="dropdown-item svgicon" id="addDust">Add Dust </a></li>
                            <li><a class="dropdown-item svgicon" id="addHail">Add Hail  </a></li>
                            <li><a class="dropdown-item svgicon" id="addA">Add A </a></li>
                            <li><a class="dropdown-item svgicon" id="addB">Add B </a></li>
                            <li><a class="dropdown-item svgicon" id="addC">Add C </a></li>
                            <li><a class="dropdown-item svgicon" id="addD">Add D </a></li>
                            <li><a class="dropdown-item svgicon" id="addE">Add E </a></li>
                            <li><a class="dropdown-item svgicon" id="addF">Add F </a></li>
                            <li><a class="dropdown-item svgicon" id="addG">Add G </a></li>
                            <li><a class="dropdown-item svgicon" id="addH">Add H </a></li>
                            <li><a class="dropdown-item svgicon" id="addI">Add I </a></li>
          
                          </ul> 
                           <button type="button" class="btn btn-danger text-white mx-2" id="inlandbutton2" >Delete Object</button>
                        </div>
                        <br> 
                      <button type="button" class="btn btn-sm m-2 text-dark"  id="yellow-color">Yellow</button> 
                      <button type="button" class="btn btn-sm m-2 text-white" id="red-color">Red</button>
                      <button type="button" class="btn btn-sm m-2 text-white" id="green-color">Green</button>
                      <button type="button" class="btn btn-sm m-2 text-white" id="orange-color">Orange</button>
                      
                       </div>
                    {{-- </div> --}}
                     <div class="card-body" style="position: relative; width: 300px;
                     height: 300px;">
              <div id="inlandmapAdmin1"   style="width: 100%;
              height: 100%;"> </div>
          </div>
          <div class="card-footer">
              <small class="text-muted">Morning (6:00am - 11:59am)</small>
            </div>
            {{-- end of morning map --}}
      </div>
      {{-- afternoon map --}}
         <div class="card"> 
          <div class="d-grid gap-2 p-2">
              <div class="alert alert-warning fade show p-2 m-2" role="alert">
                  <strong class="fs-3">Afternoon Map</strong>  </div>
              <div class="mb-3">
                  <label for="inlanddateInput1af" class="form-label">Set Date</label>
                  <input type="date" class="form-control inlandrequiredmapdate" id="inlanddateInput1af">
                </div>
              
            </div>
      
                {{-- <div class="btn-group-vertical" role="group" aria-label="Vertical button group"> --}}
                  <div class="m-2 ">
                  <div class="btn-group">
                      <button type="button" class="btn btn-primary text-white" id="inlandbutton1af" typeofIcon="addRainaf">Add Rain</button>
                      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu overflow-scroll" style="max-width: 260px; max-height: 160px;">
                        <li><a class="dropdown-item svgiconaf"  id="addRainaf">Add Rain</a></li>
                        <li><a class="dropdown-item svgiconaf" id="addWindaf">Add Wind </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addDustaf">Add Dust </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addHailaf">Add Hail  </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addAaf">Add A </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addBaf">Add B </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addCaf">Add C </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addDaf">Add D </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addEaf">Add E </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addFaf">Add F </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addGaf">Add G </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addHaf">Add H </a></li>
                        <li><a class="dropdown-item svgiconaf" id="addIaf">Add I </a></li>
      
                      </ul> 
                       <button type="button" class="btn btn-danger text-white mx-2" id="inlandbutton2af" >Delete Object</button>
                    </div>
                    <br> 
                  <button type="button" class="btn btn-sm m-2 text-dark"  id="yellow-coloraf">Yellow</button> 
                  <button type="button" class="btn btn-sm m-2 text-white" id="red-coloraf">Red</button>
                  <button type="button" class="btn btn-sm m-2 text-white" id="green-coloraf">Green</button>
                  <button type="button" class="btn btn-sm m-2 text-white" id="orange-coloraf">Orange</button>
                  
                   </div>
                {{-- </div> --}}
                 <div class="card-body" style="position: relative; width: 300px;
                 height: 300px;">
          <div id="inlandmapAdmin1af"   style="width: 100%;
          height: 100%;"> </div>
      </div>
      <div class="card-footer">
          <small class="text-muted">Afternoon (12:00pm - 5:59pm)</small>
        </div>
      {{-- end of  afternoon  map --}}   
  </div>

{{-- evening map --}}
<div class="card"> 
  <div class="d-grid gap-2 p-2">
      <div class="alert alert-warning fade show p-2 m-2" role="alert">
          <strong class="fs-3">Evening Map</strong>  </div>
      <div class="mb-3">
          <label for="inlanddateInput1ev" class="form-label">Set Date</label>
          <input type="date" class="form-control inlandrequiredmapdate" id="inlanddateInput1ev">
        </div>
      
    </div>

        {{-- <div class="btn-group-vertical" role="group" aria-label="Vertical button group"> --}}
          <div class="m-2 ">
          <div class="btn-group">
              <button type="button" class="btn btn-primary text-white" id="inlandbutton1ev" typeofIcon="addRainev">Add Rain</button>
              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu overflow-scroll" style="max-width: 260px; max-height: 160px;">
                <li><a class="dropdown-item svgiconev"  id="addRainev">Add Rain</a></li>
                <li><a class="dropdown-item svgiconev" id="addWindev">Add Wind </a></li>
                <li><a class="dropdown-item svgiconev" id="addDustev">Add Dust </a></li>
                <li><a class="dropdown-item svgiconev" id="addHailev">Add Hail  </a></li>
                <li><a class="dropdown-item svgiconev" id="addAev">Add A </a></li>
                <li><a class="dropdown-item svgiconev" id="addBev">Add B </a></li>
                <li><a class="dropdown-item svgiconev" id="addCev">Add C </a></li>
                <li><a class="dropdown-item svgiconev" id="addDev">Add D </a></li>
                <li><a class="dropdown-item svgiconev" id="addEev">Add E </a></li>
                <li><a class="dropdown-item svgiconev" id="addFev">Add F </a></li>
                <li><a class="dropdown-item svgiconev" id="addGev">Add G </a></li>
                <li><a class="dropdown-item svgiconev" id="addHev">Add H </a></li>
                <li><a class="dropdown-item svgiconev" id="addIev">Add I </a></li>

              </ul> 
               <button type="button" class="btn btn-danger text-white mx-2" id="inlandbutton2ev" >Delete Object</button>
            </div>
            <br> 
          <button type="button" class="btn btn-sm m-2 text-dark"  id="yellow-colorev">Yellow</button> 
          <button type="button" class="btn btn-sm m-2 text-white" id="red-colorev">Red</button>
          <button type="button" class="btn btn-sm m-2 text-white" id="green-colorev">Green</button>
          <button type="button" class="btn btn-sm m-2 text-white" id="orange-colorev">Orange</button>
          
           </div>
        {{-- </div> --}}
         <div class="card-body" style="position: relative; width: 300px;
         height: 300px;">
  <div id="inlandmapAdmin1ev"   style="width: 100%;
  height: 100%;"> </div>
</div>
<div class="card-footer">
  <small class="text-muted">Evening (6:00pm - 11:59pm)</small>
</div>
{{-- end of  evening  map --}}   
</div>
      
   </div>
<br>
<table class="table table-bordered text-dark border-dark" id="legend" style="font-size: 10px">
  <tbody style="font-size: 15px">
      <tr class="text-center fw-bold httr" style="background-color:gold" >
          <td scope="row">Time</td>
          <td>Surface Wind</td>
          <td>Visiblity</td>
          <td>Temperature</td>
      </tr>
     <tr class="text-center fw-bold httr" >
          <td  style="background-color:gold" scope="row">24 Hours</td>
          <td  style="background-color:rgb(247, 247, 164); text-align:center">
            <input class="inlandrequiredmapdate form-control" type="text" name="i24hoursurfacewind" id="i24hoursurfacewind" placeholder="e.g: SW 05 Max 18kt"> </td>
          <td  style="background-color:rgb(247, 247, 164); text-align:center"><input class="inlandrequiredmapdate form-control"  type="text" name="i24hourvisibility" id="i24hourvisibility" placeholder="e.g: (6 - 10) km"> </td>
          <td  style="background-color:rgb(247, 247, 164); text-align:center"><input class="inlandrequiredmapdate form-control"  type="text" name="i24hourtemp" id="i24hourtemp" placeholder="e.g:(24 - 30)"></td>
      </tr>
      <tr class="text-center fw-bold httr">
          <td  style="background-color:gold" scope="row">48 Hours</td>
          <td  style="background-color:rgb(247, 247, 164); text-align:center"> <input class="inlandrequiredmapdate form-control"  type="text" name="i48hoursurfacewind" id="i48hoursurfacewind" placeholder="e.g: SW 05 Max 18kt"></td>
          <td  style="background-color:rgb(247, 247, 164); text-align:center"><input class="inlandrequiredmapdate form-control"  type="text" name="i48hourvisibility" id="i48hourvisibility" placeholder="e.g: (6 - 10) km"></td>
          <td  style="background-color:rgb(247, 247, 164); text-align:center"><input class="inlandrequiredmapdate form-control"  type="text" name="i48hourtemp" id="i48hourtemp" placeholder="e.g:(24 - 30)"></td>
      </tr>
</tbody>
</table>

   <br>
   <div class="row">
    <div class="col-3">
      <div class="card">
        <table class="table table-white table-bordere fw-bold text-center" style="height: 300px; font-size: 11px">
       <tbody>
           <tr> <td scope="row" class="bg-dark text-white">Nowcasting Risk</td></tr>
            <tr> <th class="text-center" style="background-color:#ff0000">Take Action</th> </tr> 
           </tr><th  class="text-center" style="background-color: #e9f542">Be Aware</th></tr>
           </tr><th class="text-center" style="background-color: #4ca64c">Low Risk</th></tr>
           </tr><th class="text-center" style="background-color: white">No Risk</th></tr>
          </tbody>
      </table>
</div>
</div>
<div class="col-9">
<div class="card">
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
    <br>
</div>
{{-- Weather Summary --}}
 <div class="tab-pane fade" id="weatherSummary" role="tabpanel" aria-labelledby="weatherSummary-tab">
  <div class="container">
    <div class="row">
        <div class="d-flex justify-content-between bd-highlight mb-2">
       <div></div>  
       <button type="button" class="btn btn-success text-white" id="inlandnextBtn4thpage">Save and Continue</button>
  </div>
    </div>
  </div>

    <div class="alert alert-warning alert-dismissible fade show p-2 m-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> Weather Summary Report</strong>  </div>

    <div class="form-floating my-3">
        <textarea class="form-control" placeholder="Write your weather here" id="inlandfloatingTextareaSummary" style="height: 150px"></textarea>
        <label for="inlandfloatingTextareaSummary">Weather Summary</label>
        <p id="characterCount">Characters remaining: 310</p>
        <label for="inlandfloatingTextareaSummary">Weather Summary</label>
      </div>
 </div>

 {{--  WeatherWarning --}}
<div class="tab-pane fade " id="weatherWarning" role="tabpanel" aria-labelledby="weatherWarning-tab">
  <div class="container">
    <div class="row">
        <div class="d-flex justify-content-between bd-highlight mb-2">
       <div></div>  
      {{-- Summit /Publish Weather --}}
      <div>
      <button type="button" class="btn btn-primary text-white " id="inlandbuttonpublish" typeofSubmit="Publish-Forecast">Publish-Forecast</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu overflow-scroll" style="max-width: 260px; max-height: 160px;">
        <li><a class="dropdown-item inlandpubl" id="Publish-Forecast">Publish-Forecast</a></li>
        <li><a class="dropdown-item inlandpubl" id="Draft-Forecast">Draft-Forecast</a></li>
         </ul> </div>
  </div>
    </div>
  </div>

    <div class="alert alert-danger alert-dismissible fade show p-2 m-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> Weather Warning Forecast</strong>  </div>
        <div id="date-field" style="display: none;">
        <label for="schedule-date">Schedule Date:</label>
        <input type="datetime-local" id="schedule-date" class="form-control" >
        </div>
        <br>
    <select class="form-select form-select-sm my-2" aria-label="Small select" id="warningtype">
        <option value="null">Select Warning Type</option>
        <option value="Low Risk"> Low Risk</option>
        <option value="Be Aware"> Be Aware </option>
        <option value="Be Prepared"> Be Prepared</option>
        <option value="Take Action"> Take Action </option>
      </select>

    <div class="form-floating my-3">
        <textarea class="form-control" placeholder="Write your weather warning here" id="textareaweatherwarning" style="height: 150px"></textarea>
        <label for="textareaweatherwarning">Weather Warning Advice</label>
      </div>

</div> 
    </div>
  </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					
    @section('script')
    <script>
     const textarea = document.getElementById('inlandfloatingTextareaSummary');
     const characterCount = document.getElementById('characterCount');
     const maxCharacters = 310;
   
     textarea.addEventListener('input', function () {
       const currentText = textarea.value;
       const remainingCharacters = maxCharacters - currentText.length;
   
       if (remainingCharacters < 0) {
         textarea.value = currentText.slice(0, maxCharacters); // Truncate text if exceeded
         characterCount.textContent = 'Maximum character limit reached';
         alert('Maximum character limit reached');
       } else {
         characterCount.textContent = `Characters remaining: ${remainingCharacters}`;
       }
     });
     </script>
    @endsection
 
    @endsection
