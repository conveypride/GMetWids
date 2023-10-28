@extends('admin.adminApp')

@section('adminContent')

@section('marineforecasteCss')
    <link rel="stylesheet" href="{{ asset('assets/css/addmarineforecaste.css') }}">
@endsection


@section('marineforecasteJs')
    <script src="{{ asset('assets/js/addmarineforecaste.js') }}"></script>
@endsection


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h4>Add A New Marine Forecast</h4>
                  <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="get-started-tab" data-bs-toggle="tab" href="#get-started" role="tab" aria-controls="get-started" aria-selected="true">Getting Started</a>
 <a class="flex-sm-fill text-sm-center nav-link "  id="tableForecastM-tab" data-bs-toggle="tab" href="#tableForecastM" role="tab" aria-controls="tableForecastM" aria-selected="false">Table</a>

				    </nav>
                <div class="tab-content" id="orders-table-tab-content" >
                  {{-- get Started  FORECAST TAB --}}
<div class="tab-pane fade show active" id="get-started" role="tabpanel" aria-labelledby="get-started-tab" >


 <div class="alert alert-white alert-dismissible fade show p-2 m-2" role="alert">
       <h3 class="text-center"> <strong> Welcome Marine Forecaster</strong> </h3> </div>
       {{-- wave animation --}}
        <div class="container" >
           
<div class="waves back" style="background-color: skyblue;">
    <svg viewBox="0 24 150 28">
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
      </defs>
      <use xlink:href="#gentle-wave" x="48" y="5"></use>
      <use xlink:href="#gentle-wave" x="48" y="7"></use>
    </svg>
  </div>
  <div class="boat">
    <div class="sail1"></div>
    <div class="sail2"></div>
    <div class="hull"></div>
  </div>
  <div class="waves front">
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
<div class="tab-pane fade " id="tableForecastM" role="tabpanel" aria-labelledby="tableForecastM-tab">

    {{--marine  forecast table --}}
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                <th colspan="5">
                    <div class="row">
                      <div class="col">
                          <label for="dateCM" class="form-label">Valid At</label>
                          <input type="datetime-local" id="validAt" class="form-control required" id="dateCM">
                        </div>
                        <div class="col">
                          <label for="maxWaveCurrentRange" class="form-label">Min - Max Wave-Current-Range(m/s)</label>
                          <input type="text" class="form-control required" id="maxWaveCurrentRange" placeholder="e.g: 0.9 - 1.0">
                        </div>
                        <div class="col">
                          <label for="seaState24hr" class="form-label">Sea State</label>
                          <select class="form-select form-select-sm required" id="seaState" aria-label="Small select" >
                              <option value="null">Select Sea State</option>
                              <option value="calm"> Calm</option>
                              <option value="rough"> Rough</option>
                              <option value="dangerous">Dangerous </option>
                            </select>
                           </div>
                      </div>
                      </th>
                  </tr>
               
              </thead>

            <tr>
              <th>Parameters</th>
              <th colspan="2">24 Hours</th>
              <th colspan="2">48 Hours</th>
            </tr>
            <tr> 
                <th>Min-Max</th>
                <td>Min</td>
                <td>Max</td>
                <td>Min</td>
                <td>Max</td>
              </tr>
            <tr> 
              <th>Surface Wind(Kt)</th>
              <td><input class="form-control form-control-sm required" id="surfaceWind24hrsMin" type="text" placeholder="e.g: SW 10"  ></td>
              <td><input class="form-control form-control-sm required" id="surfaceWind24hrsMax" type="text" placeholder="e.g:SW 15"  ></td>
              <td><input class="form-control form-control-sm required" id="surfaceWind48hrsMin" type="text" placeholder="e.g: SW 10"  ></td>
              <td><input class="form-control form-control-sm required" id="surfaceWind48hrsMax" type="text" placeholder="e.g: SW 15"  ></td>
            </tr>
            <tr>
            <th>Visibilty(km)</th>
              <td><input class="form-control form-control-sm required" id="visibility24hrsMin" type="number" placeholder="e.g: 5"  ></td>
              <td><input class="form-control form-control-sm required" id="visibility24hrsMax" type="number" placeholder="e.g: 10"  ></td>
              <td><input class="form-control form-control-sm required" id="visibility48hrsMin" type="number" placeholder="e.g: 5"  ></td>
              <td><input class="form-control form-control-sm required" id="visibility48hrsMax" type="number" placeholder="e.g: 10"  ></td>
            </tr>
            <tr>
            <th>Sea Surface Temp.(°C)</th>
              <td><input class="form-control form-control-sm required" id="seaSurfTemp24hrsMin" type="number" placeholder="e.g: 23"  ></td>
              <td><input class="form-control form-control-sm required" id="seaSurfTemp24hrsMax" type="number" placeholder="e.g: 33"  ></td>
              <td><input class="form-control form-control-sm required" id="seaSurfTemp48hrsMin" type="number" placeholder="e.g: 21"  ></td>
              <td><input class="form-control form-control-sm required" id="seaSurfTemp48hrsMax" type="number" placeholder="e.g: 31"  ></td>
            </tr>
            <th>Sig.Wave Height(m)</th>
            <td><input class="form-control form-control-sm required" id="sigWaveHeight24hrsMin" type="number" placeholder="e.g: 1.4"  ></td>
            <td><input class="form-control form-control-sm required" id="sigWaveHeight24hrsMax" type="number" placeholder="e.g: 1.8"  ></td>
            <td><input class="form-control form-control-sm required" id="sigWaveHeight48hrsMin" type="number" placeholder="e.g: 1.5"  ></td>
            <td><input class="form-control form-control-sm required" id="sigWaveHeight48hrsMax" type="number" placeholder="e.g: 1.9"  ></td>
          </tr>

          <th>Tidal Wave(m)</th>
          <td><input class="form-control form-control-sm required" id="tidalwave24hrsMin" type="number" placeholder="e.g: 0.64"  ></td>
          <td><input class="form-control form-control-sm required" id="tidalwave24hrsMax" type="number" placeholder="e.g: 1.64"  ></td>
          <td><input class="form-control form-control-sm required" id="tidalwave48hrsMin" type="number" placeholder="e.g: 0.44"  ></td>
          <td><input class="form-control form-control-sm required" id="tidalwave48hrsMax" type="number" placeholder="e.g: 1.63"  ></td>
        </tr>
        
        <th>Wave Current(m/s)</th>
        <td colspan="2"><input class="form-control form-control-sm required" id="waveCureent24hrs" type="text" placeholder="e.g: E 0.73"  ></td>
        <td colspan="2"><input class="form-control form-control-sm required" id="waveCureent48hrs" type="text" placeholder="e.g: 0.92NE"  ></td>
       
      </tr>
</table>
    </div>
<br>


<div class="card">
  <div class="d-grid gap-2 p-2">
      <div class="alert alert-success fade show p-2 m-2" role="alert">
          <strong class="fs-3"> Marine Map</strong>  </div>
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
           <div class="container-fluid">
        {{-- <div class="col">.</div>  --}}
            <div>
         <div class="card-body">
  <div id="marineMapAdmin"  style="width: 70vw;
  height: 300px;"> </div>
</div>
</div> 
{{-- <div class="col">.</div> --}}
</div>


</div>
<br>
 
<div class="form-floating my-3">
    <textarea class="form-control required" placeholder="Write your weather here" id="summaryMarine" style="height: 150px"></textarea>
    <label for="floatingTextareaSummary">Weather Summary</label>
  </div> 

  <div class="container">
   <button type="button" class="btn btn-success text-white" id="nextBtn2ndpageM">Publish</button>
 </div>

   {{--end of table FORECAST TAB --}} 
</div>



    </div>
  </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection
