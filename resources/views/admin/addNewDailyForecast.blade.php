@extends('admin.adminApp')

@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h4>Add A New Daily Forecast</h4>
                  <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="get-started-tab" data-bs-toggle="tab" href="#get-started" role="tab" aria-controls="get-started" aria-selected="true">Getting Started</a>

				    <a class="flex-sm-fill text-sm-center nav-link" id="map-tab" data-bs-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>

				    <a class="flex-sm-fill text-sm-center nav-link"  id="tableForecast-tab" data-bs-toggle="tab" href="#tableForecast" role="tab" aria-controls="tableForecast" aria-selected="false">Table</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="weatherSummary-tab" data-bs-toggle="tab" href="#weatherSummary" role="tab" aria-controls="weatherSummary" aria-selected="false">Summary</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="weatherWarning-tab" data-bs-toggle="tab" href="#weatherWarning" role="tab" aria-controls="weatherWarning" aria-selected="false">Weather-Warning</a>
				   

				</nav>
                <div class="tab-content" id="orders-table-tab-content">
                  {{-- get Started  FORECAST TAB --}}
<div class="tab-pane fade show active" id="get-started" role="tabpanel" aria-labelledby="get-started-tab">
 <div class="alert alert-primary alert-dismissible fade show p-2 m-2" role="alert">
       <h3 class="text-center"> <strong> Welcome</strong> </h3> </div>
       
        <div class="containerx">
            <div id="cloudx">
              <span class="shadowx"></span>
              <div class="rainx">
                <div class="dropx d1x"></div>
                <div class="dropx d2x"></div>
                <div class="dropx d3x"></div>
                <div class="dropx d4x"></div>
                <div class="dropx d5x"></div>
                <div class="dropx d6x"></div>
                <div class="dropx d7x"></div>
                <div class="dropx d8x"></div>
                <div class="dropx d9x"></div>
                <div class="dropx d10x"></div>
                <div class="dropx d11x"></div>
                <div class="dropx d12x"></div>
                <div class="dropx d13x"></div>
                <div class="dropx d14x"></div>
                <div class="dropx d15x"></div>
              </div>
            </div>
          </div>
          
          
      {{-- end of get Started  FORECAST TAB --}}
</div> 

 {{-- MAP --}}
 <div class="tab-pane fade " id="map" role="tabpanel" aria-labelledby="map-tab">
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
                        <label for="dateInput1" class="form-label">Set Date</label>
                        <input type="date" class="form-control" id="dateInput1">
                      </div>
                    
                  </div>
            
                      {{-- <div class="btn-group-vertical" role="group" aria-label="Vertical button group"> --}}
                        <div class="m-2 ">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary text-white" id="button1" typeofIcon="addRain">Add Rain</button>
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
                             <button type="button" class="btn btn-danger text-white mx-2" id="button2" >Delete Object</button>
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
                <div id="mapAdmin1"   style="
               
                width: 100%;
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
                    <label for="dateInput1af" class="form-label">Set Date</label>
                    <input type="date" class="form-control" id="dateInput1af">
                  </div>
                
              </div>
        
                  {{-- <div class="btn-group-vertical" role="group" aria-label="Vertical button group"> --}}
                    <div class="m-2 ">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary text-white" id="button1af" typeofIcon="addRainaf">Add Rain</button>
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
                         <button type="button" class="btn btn-danger text-white mx-2" id="button2af" >Delete Object</button>
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
            <div id="mapAdmin1af"   style="
           
            width: 100%;
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
            <label for="dateInput1ev" class="form-label">Set Date</label>
            <input type="date" class="form-control" id="dateInput1ev">
          </div>
        
      </div>

          {{-- <div class="btn-group-vertical" role="group" aria-label="Vertical button group"> --}}
            <div class="m-2 ">
            <div class="btn-group">
                <button type="button" class="btn btn-primary text-white" id="button1ev" typeofIcon="addRainev">Add Rain</button>
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
                 <button type="button" class="btn btn-danger text-white mx-2" id="button2ev" >Delete Object</button>
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
    <div id="mapAdmin1ev"   style="
   
    width: 100%;
    height: 100%;"> </div>
</div>
<div class="card-footer">
    <small class="text-muted">Evening (6:00pm - 11:59pm)</small>
  </div>
{{-- end of  evening  map --}}   
</div>
        
     </div>
    
      
</div>
{{-- table FORECAST TAB --}}
<div class="tab-pane fade" id="tableForecast" role="tabpanel" aria-labelledby="tableForecast-tab">
    {{-- morning forecast table --}}
    <div class="table-responsive">
    <table class="table table-bordered text-center">
        {{-- time of day --}}
        <thead class="thead-dark">
          <tr>
            <th></th>
            <th colspan="7">
                Morning
                <div class="mb-3">
                    <label for="datetableMorning" class="form-label">Set Date</label>
                    <input type="date" class="form-control" id="datetableMorning">
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
            <th>Temp °C</th>
            <th> Wind (m/s)</th>
            <th>Chance of Rain</th>
            <th>Humidity</th>
            <th>ITD</th>
            <th>Pressure</th>
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
            {{-- 1st row  --}}
          <tr>
            <td>Accra</td>
            {{-- morning --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Weather</option>
                    <option value="1">CLOUDY</option>
                    <option value="2">TSRA</option>
                    <option value="3">HAZE</option>
                  </select>
            </td>
            {{-- TEMPERATURE --}}
            <td>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInputtemp" >
                    <label for="floatingInputtemp">Temperature</label>
                  </div>
            </td>
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputwind" >
                    <label for="floatingInputwind">Wind diecton & speed</label>
                  </div>
            </td>
            {{-- CHANCE OF RAIN --}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- ITD POSITION --}}
            <td> 
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputitd" >
                    <label for="floatingInputitd">ITD Position</label>
                  </div>
            </td>
{{-- PRESSURE --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputpre" >
                    <label for="floatingInputpre">Pressure</label>
                  </div>
            </td> 
          </tr>
          {{-- 2nd row --}}
          <tr>
            <td>Kumasi</td>
            {{-- morning --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Weather</option>
                    <option value="1">CLOUDY</option>
                    <option value="2">TSRA</option>
                    <option value="3">HAZE</option>
                  </select>
            </td>
            {{-- TEMPERATURE --}}
            <td>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInputtemp" >
                    <label for="floatingInputtemp">Temperature</label>
                  </div>
            </td>
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputwind" >
                    <label for="floatingInputwind">Wind diecton & speed</label>
                  </div>
            </td>
            {{-- CHANCE OF RAIN --}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- ITD POSITION --}}
            <td> 
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputitd" >
                    <label for="floatingInputitd">ITD Position</label>
                  </div>
            </td>
{{-- PRESSURE --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputpre" >
                    <label for="floatingInputpre">Pressure</label>
                  </div>
            </td> 
          </tr>
{{-- 3rd row --}}
<tr>
    <td>Tema</td>
    {{-- morning --}}
    <td>
        {{-- weather --}}
        <select class="form-select form-select-sm" aria-label="Small select">
            <option selected="">Select Weather</option>
            <option value="1">CLOUDY</option>
            <option value="2">TSRA</option>
            <option value="3">HAZE</option>
          </select>
    </td>
    {{-- TEMPERATURE --}}
    <td>
        <div class="form-floating">
            <input type="number" class="form-control" id="floatingInputtemp" >
            <label for="floatingInputtemp">Temperature</label>
          </div>
    </td>
    {{-- WIND --}}
    <td>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputwind" >
            <label for="floatingInputwind">Wind diecton & speed</label>
          </div>
    </td>
    {{-- CHANCE OF RAIN --}}
    <td>
        <select class="form-select form-select-sm" aria-label="Small select">
            <option selected="">Select Chance of Rain</option>
            <option value="1"> &lt;40% </option>
            <option value="2"> 40% - 60%</option>
            <option value="3"> &gt;60% </option>
          </select>
    </td>
    {{-- humidity 0% - 100%--}}
    <td>
        <select class="form-select form-select-sm" aria-label="Small select">
            <option selected="">Select Chance of Rain</option>
            <option value="1"> &lt;40% </option>
            <option value="2"> 40% - 60%</option>
            <option value="3"> &gt;60% </option>
          </select>
    </td>
    {{-- ITD POSITION --}}
    <td> 
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputitd" >
            <label for="floatingInputitd">ITD Position</label>
          </div>
    </td>
{{-- PRESSURE --}}
    <td>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputpre" >
            <label for="floatingInputpre">Pressure</label>
          </div>
    </td> 
  </tr>
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
                <div class="mb-3">
                    <label for="datetableAfternoon" class="form-label">Set Date</label>
                    <input type="date" class="form-control" id="datetableAfternoon">
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
            <th>Temp °C</th>
            <th> Wind (m/s)</th>
            <th>Chance of Rain</th>
            <th>Humidity</th>
            <th>ITD</th>
            <th>Pressure</th>
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
            {{-- 1st row  --}}
          <tr>
            <td>Accra</td>
            {{-- Afternoon --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Weather</option>
                    <option value="1">CLOUDY</option>
                    <option value="2">TSRA</option>
                    <option value="3">HAZE</option>
                  </select>
            </td>
            {{-- TEMPERATURE --}}
            <td>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInputtemp" >
                    <label for="floatingInputtemp">Temperature</label>
                  </div>
            </td>
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputwind" >
                    <label for="floatingInputwind">Wind diecton & speed</label>
                  </div>
            </td>
            {{-- CHANCE OF RAIN --}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- ITD POSITION --}}
            <td> 
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputitd" >
                    <label for="floatingInputitd">ITD Position</label>
                  </div>
            </td>
{{-- PRESSURE --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputpre" >
                    <label for="floatingInputpre">Pressure</label>
                  </div>
            </td> 
          </tr>
          {{-- 2nd row --}}
          <tr>
            <td>Kumasi</td>
            {{-- Afternoon --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Weather</option>
                    <option value="1">CLOUDY</option>
                    <option value="2">TSRA</option>
                    <option value="3">HAZE</option>
                  </select>
            </td>
            {{-- TEMPERATURE --}}
            <td>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInputtemp" >
                    <label for="floatingInputtemp">Temperature</label>
                  </div>
            </td>
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputwind" >
                    <label for="floatingInputwind">Wind diecton & speed</label>
                  </div>
            </td>
            {{-- CHANCE OF RAIN --}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
                <select class="form-select form-select-sm" aria-label="Small select">
                    <option selected="">Select Chance of Rain</option>
                    <option value="1"> &lt;40% </option>
                    <option value="2"> 40% - 60%</option>
                    <option value="3"> &gt;60% </option>
                  </select>
            </td>
            {{-- ITD POSITION --}}
            <td> 
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputitd" >
                    <label for="floatingInputitd">ITD Position</label>
                  </div>
            </td>
{{-- PRESSURE --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputpre" >
                    <label for="floatingInputpre">Pressure</label>
                  </div>
            </td> 
          </tr>
{{-- 3rd row --}}
<tr>
    <td>Tema</td>
    {{-- Afternoon --}}
    <td>
        {{-- weather --}}
        <select class="form-select form-select-sm" aria-label="Small select">
            <option selected="">Select Weather</option>
            <option value="1">CLOUDY</option>
            <option value="2">TSRA</option>
            <option value="3">HAZE</option>
          </select>
    </td>
    {{-- TEMPERATURE --}}
    <td>
        <div class="form-floating">
            <input type="number" class="form-control" id="floatingInputtemp" >
            <label for="floatingInputtemp">Temperature</label>
          </div>
    </td>
    {{-- WIND --}}
    <td>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputwind" >
            <label for="floatingInputwind">Wind diecton & speed</label>
          </div>
    </td>
    {{-- CHANCE OF RAIN --}}
    <td>
        <select class="form-select form-select-sm" aria-label="Small select">
            <option selected="">Select Chance of Rain</option>
            <option value="1"> &lt;40% </option>
            <option value="2"> 40% - 60%</option>
            <option value="3"> &gt;60% </option>
          </select>
    </td>
    {{-- humidity 0% - 100%--}}
    <td>
        <select class="form-select form-select-sm" aria-label="Small select">
            <option selected="">Select Chance of Rain</option>
            <option value="1"> &lt;40% </option>
            <option value="2"> 40% - 60%</option>
            <option value="3"> &gt;60% </option>
          </select>
    </td>
    {{-- ITD POSITION --}}
    <td> 
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputitd" >
            <label for="floatingInputitd">ITD Position</label>
          </div>
    </td>
{{-- PRESSURE --}}
    <td>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputpre" >
            <label for="floatingInputpre">Pressure</label>
          </div>
    </td> 
  </tr>
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
                    <div class="mb-3">
                        <label for="datetableEvening" class="form-label">Set Date</label>
                        <input type="date" class="form-control" id="datetableEvening">
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
                <th>Temp °C</th>
                <th> Wind (m/s)</th>
                <th>Chance of Rain</th>
                <th>Humidity</th>
                <th>ITD</th>
                <th>Pressure</th>
                 </tr>
               {{-- end of sub titles --}}
            </thead>
    
            <tbody>
                {{-- 1st row  --}}
              <tr>
                <td>Accra</td>
                {{-- evening --}}
                <td>
                    {{-- weather --}}
                    <select class="form-select form-select-sm" aria-label="Small select">
                        <option selected="">Select Weather</option>
                        <option value="1">CLOUDY</option>
                        <option value="2">TSRA</option>
                        <option value="3">HAZE</option>
                      </select>
                </td>
                {{-- TEMPERATURE --}}
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputtemp" >
                        <label for="floatingInputtemp">Temperature</label>
                      </div>
                </td>
                {{-- WIND --}}
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputwind" >
                        <label for="floatingInputwind">Wind diecton & speed</label>
                      </div>
                </td>
                {{-- CHANCE OF RAIN --}}
                <td>
                    <select class="form-select form-select-sm" aria-label="Small select">
                        <option selected="">Select Chance of Rain</option>
                        <option value="1"> &lt;40% </option>
                        <option value="2"> 40% - 60%</option>
                        <option value="3"> &gt;60% </option>
                      </select>
                </td>
                {{-- humidity 0% - 100%--}}
                <td>
                    <select class="form-select form-select-sm" aria-label="Small select">
                        <option selected="">Select Chance of Rain</option>
                        <option value="1"> &lt;40% </option>
                        <option value="2"> 40% - 60%</option>
                        <option value="3"> &gt;60% </option>
                      </select>
                </td>
                {{-- ITD POSITION --}}
                <td> 
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputitd" >
                        <label for="floatingInputitd">ITD Position</label>
                      </div>
                </td>
    {{-- PRESSURE --}}
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputpre" >
                        <label for="floatingInputpre">Pressure</label>
                      </div>
                </td> 
              </tr>
              {{-- 2nd row --}}
              <tr>
                <td>Kumasi</td>
                {{-- evening --}}
                <td>
                    {{-- weather --}}
                    <select class="form-select form-select-sm" aria-label="Small select">
                        <option selected="">Select Weather</option>
                        <option value="1">CLOUDY</option>
                        <option value="2">TSRA</option>
                        <option value="3">HAZE</option>
                      </select>
                </td>
                {{-- TEMPERATURE --}}
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputtemp" >
                        <label for="floatingInputtemp">Temperature</label>
                      </div>
                </td>
                {{-- WIND --}}
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputwind" >
                        <label for="floatingInputwind">Wind diecton & speed</label>
                      </div>
                </td>
                {{-- CHANCE OF RAIN --}}
                <td>
                    <select class="form-select form-select-sm" aria-label="Small select">
                        <option selected="">Select Chance of Rain</option>
                        <option value="1"> &lt;40% </option>
                        <option value="2"> 40% - 60%</option>
                        <option value="3"> &gt;60% </option>
                      </select>
                </td>
                {{-- humidity 0% - 100%--}}
                <td>
                    <select class="form-select form-select-sm" aria-label="Small select">
                        <option selected="">Select Chance of Rain</option>
                        <option value="1"> &lt;40% </option>
                        <option value="2"> 40% - 60%</option>
                        <option value="3"> &gt;60% </option>
                      </select>
                </td>
                {{-- ITD POSITION --}}
                <td> 
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputitd" >
                        <label for="floatingInputitd">ITD Position</label>
                      </div>
                </td>
    {{-- PRESSURE --}}
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputpre" >
                        <label for="floatingInputpre">Pressure</label>
                      </div>
                </td> 
              </tr>
    {{-- 3rd row --}}
    <tr>
        <td>Tema</td>
        {{-- evening --}}
        <td>
            {{-- weather --}}
            <select class="form-select form-select-sm" aria-label="Small select">
                <option selected="">Select Weather</option>
                <option value="1">CLOUDY</option>
                <option value="2">TSRA</option>
                <option value="3">HAZE</option>
              </select>
        </td>
        {{-- TEMPERATURE --}}
        <td>
            <div class="form-floating">
                <input type="number" class="form-control" id="floatingInputtemp" >
                <label for="floatingInputtemp">Temperature</label>
              </div>
        </td>
        {{-- WIND --}}
        <td>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputwind" >
                <label for="floatingInputwind">Wind diecton & speed</label>
              </div>
        </td>
        {{-- CHANCE OF RAIN --}}
        <td>
            <select class="form-select form-select-sm" aria-label="Small select">
                <option selected="">Select Chance of Rain</option>
                <option value="1"> &lt;40% </option>
                <option value="2"> 40% - 60%</option>
                <option value="3"> &gt;60% </option>
              </select>
        </td>
        {{-- humidity 0% - 100%--}}
        <td>
            <select class="form-select form-select-sm" aria-label="Small select">
                <option selected="">Select Chance of Rain</option>
                <option value="1"> &lt;40% </option>
                <option value="2"> 40% - 60%</option>
                <option value="3"> &gt;60% </option>
              </select>
        </td>
        {{-- ITD POSITION --}}
        <td> 
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputitd" >
                <label for="floatingInputitd">ITD Position</label>
              </div>
        </td>
    {{-- PRESSURE --}}
        <td>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputpre" >
                <label for="floatingInputpre">Pressure</label>
              </div>
        </td> 
      </tr>
            </tbody>
          </table>
        </div>
   {{--end of table FORECAST TAB --}} 
</div>
{{-- Weather Summary --}}
 <div class="tab-pane fade" id="weatherSummary" role="tabpanel" aria-labelledby="weatherSummary-tab">
    <div class="alert alert-warning alert-dismissible fade show p-2 m-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> Weather Summary Report</strong>  </div>

    <div class="form-floating my-3">
        <textarea class="form-control" placeholder="Write your weather here" id="floatingTextarea" style="height: 150px"></textarea>
        <label for="floatingTextarea">Weather Summary</label>
      </div>
 </div>

 {{--  WeatherWarning --}}
<div class="tab-pane fade" id="weatherWarning" role="tabpanel" aria-labelledby="weatherWarning-tab">
    <div class="alert alert-danger alert-dismissible fade show p-2 m-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> Weather Warning Forecast</strong>  </div>

    <select class="form-select form-select-sm my-2" aria-label="Small select">
        <option selected="">Select Warning Type</option>
        <option value="1"> Low Risk</option>
        <option value="1"> Be Aware </option>
        <option value="2"> Be Prepared</option>
        <option value="3"> Take Action </option>
      </select>

    <div class="form-floating my-3">
        <textarea class="form-control" placeholder="Write your weather warning here" id="textareaweatherwarning" style="height: 150px"></textarea>
        <label for="textareaweatherwarning">Weather Warning</label>
      </div>

      {{-- Summit /Publish Weather --}}
      <button type="button" class="btn btn-primary text-white " id="buttonpublish">Publish-Forecast</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu overflow-scroll" style="max-width: 260px; max-height: 160px;">
        <li><a class="dropdown-item " id="publishForecast">Publish-Forecast</a></li>
        <li><a class="dropdown-item " id="publishForecast">Draft-Forecast</a></li>
         </ul> 
</div> 
    </div>
  </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection
