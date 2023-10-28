@extends('admin.adminApp')

@section('adminContent')

@section('marineforecasteCss')
    <link rel="stylesheet" href="{{ asset('assets/css/addmarineforecaste.css') }}">
@endsection


@section('marineforecasteJs')
    <script src="{{ asset('assets/js/editmarinemap.js') }}"></script>
@endsection


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h4>Edit Marine Forecast</h4>
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
        <form action="{{ route('editmarineTable') }}" method="post">
            @csrf
            <input required  type="hidden" id="iddd" name="iddd" value="{{ $marineforecast->id }}">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                <th colspan="5">
                    
                    <div class="row">
                      <div class="col">
                          <label for="dateCM" class="form-label">Valid At</label>
                          <input required type="datetime-local" id="validAt" name="dateCM" class="form-control required" id="dateCM" value="{{ $marineforecast->validAt }}">
                        </div>
                        <div class="col">
                          <label for="maxWaveCurrentRange" class="form-label">Min - Max Wave-Current-Range(m/s)</label>
                          <input required type="text" class="form-control required" name="maxWaveCurrentRange" id="maxWaveCurrentRange" placeholder="e.g: 0.9 - 1.0" value="{{ $marineforecast->minMaxWaveCurrent }}">
                        </div>
                        <div class="col">
                          <label for="seaState24hr" class="form-label">Sea State</label>
                          <select class="form-select form-select-sm required" name="seaState" id="seaState" aria-label="Small select" >
                              <option value="{{ $marineforecast->seaState }}">{{ $marineforecast->seaState }}</option>
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
              <td><input required class="form-control form-control-sm required" name="surfaceWind24hrsMin" id="surfaceWind24hrsMin" type="text" placeholder="e.g: SW 10" value="{{  $marineforecast->surfaceWind24hrsMin}}" ></td>
              <td><input required class="form-control form-control-sm required" name="surfaceWind24hrsMax" id="surfaceWind24hrsMax" type="text" placeholder="e.g:SW 15"  value="{{  $marineforecast->surfaceWind24hrsMax}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="surfaceWind48hrsMin" id="surfaceWind48hrsMin" type="text" placeholder="e.g: SW 10"  value="{{  $marineforecast->surfaceWind48hrsMin}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="surfaceWind48hrsMax" id="surfaceWind48hrsMax" type="text" placeholder="e.g: SW 15"  value="{{  $marineforecast->surfaceWind48hrsMax}}"   ></td>
            </tr>
            <tr>
            <th>Visibilty(km)</th>
              <td><input required class="form-control form-control-sm required" name="visibility24hrsMin" id="visibility24hrsMin" type="number" placeholder="e.g: 5"  value="{{  $marineforecast->visibility24hrsMin}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="visibility24hrsMax" id="visibility24hrsMax" type="number" placeholder="e.g: 10"  value="{{  $marineforecast->visibility24hrsMax}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="visibility48hrsMin" id="visibility48hrsMin" type="number" placeholder="e.g: 5"  value="{{  $marineforecast->visibility48hrsMin}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="visibility48hrsMax" id="visibility48hrsMax" type="number" placeholder="e.g: 10"  value="{{  $marineforecast->visibility48hrsMax}}"  ></td>
            </tr>
            <tr>
            <th>Sea Surface Temp.(°C)</th>
              <td><input required class="form-control form-control-sm required" name="seaSurfTemp24hrsMin" id="seaSurfTemp24hrsMin" type="number" placeholder="e.g: 23"  value="{{  $marineforecast->seaSurfTemp24hrsMin}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="seaSurfTemp24hrsMax" id="seaSurfTemp24hrsMax" type="number" placeholder="e.g: 33"  value="{{  $marineforecast->seaSurfTemp24hrsMax}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="seaSurfTemp48hrsMin" id="seaSurfTemp48hrsMin" type="number" placeholder="e.g: 21"  value="{{  $marineforecast->seaSurfTemp48hrsMin}}"  ></td>
              <td><input required class="form-control form-control-sm required" name="seaSurfTemp48hrsMax" id="seaSurfTemp48hrsMax" type="number" placeholder="e.g: 31"  value="{{  $marineforecast->seaSurfTemp48hrsMax}}"  ></td>
            </tr>
            <th>Sig.Wave Height(m)</th>
            <td><input required class="form-control form-control-sm required" name="sigWaveHeight24hrsMin" id="sigWaveHeight24hrsMin" type="number" placeholder="e.g: 1.4"  value="{{  $marineforecast->sigWaveHeight24hrsMin}}"  ></td>
            <td><input required class="form-control form-control-sm required" name="sigWaveHeight24hrsMax" id="sigWaveHeight24hrsMax" type="number" placeholder="e.g: 1.8"  value="{{  $marineforecast->sigWaveHeight24hrsMax}}"  ></td>
            <td><input required class="form-control form-control-sm required" name="sigWaveHeight48hrsMin" id="sigWaveHeight48hrsMin" type="number" placeholder="e.g: 1.5"  value="{{  $marineforecast->sigWaveHeight48hrsMin}}"  ></td>
            <td><input required class="form-control form-control-sm required" name="sigWaveHeight48hrsMax" id="sigWaveHeight48hrsMax" type="number" placeholder="e.g: 1.9"  value="{{  $marineforecast->sigWaveHeight48hrsMax}}"  ></td>
          </tr>

          <th>Tidal Wave(m)</th>
          <td><input required class="form-control form-control-sm required" name="tidalwave24hrsMin" id="tidalwave24hrsMin" type="number" placeholder="e.g: 0.64"  value="{{  $marineforecast->tidalwave24hrsMin}}"  ></td>
          <td><input required class="form-control form-control-sm required" name="tidalwave24hrsMax" id="tidalwave24hrsMax" type="number" placeholder="e.g: 1.64"  value="{{  $marineforecast->tidalwave24hrsMax}}"  ></td>
          <td><input required class="form-control form-control-sm required" name="tidalwave48hrsMin" id="tidalwave48hrsMin" type="number" placeholder="e.g: 0.44"  value="{{  $marineforecast->tidalwave48hrsMin}}"  ></td>
          <td><input required class="form-control form-control-sm required" name="tidalwave48hrsMax" id="tidalwave48hrsMax" type="number" placeholder="e.g: 1.63"  value="{{  $marineforecast->tidalwave48hrsMax}}"  ></td>
        </tr>
        
        <th>Wave Current(m/s)</th>
        <td colspan="2"><input required class="form-control form-control-sm required" name="waveCureent24hrs" id="waveCureent24hrs" type="text" placeholder="e.g: E 0.73"  value="{{  $marineforecast->waveCureent24hrs}}"  ></td>
        <td colspan="2"><input required class="form-control form-control-sm required" name="waveCureent48hrs" id="waveCureent48hrs" type="text" placeholder="e.g: 0.92NE"  value="{{  $marineforecast->waveCureent48hrs}}"  ></td>
       
      </tr>
</table>
<br>
 
<div class="form-floating my-3">
    <textarea class="form-control required" placeholder="Write your weather here" name="summaryMarine" id="summaryMarine" style="height: 150px">{{ $marineforecast->summary }}</textarea>
    <label for="floatingTextareaSummary">Weather Summary</label>
  </div> 

    <div class="d-grid gap-2">
      <button type="submit"  class="btn btn-primary text-white">Update</button>
    </div>
  
</form>

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
            <div class="card">
         <div class="card-body">
  <div id="marineMapAdminEdit"  style="width: 70vw;
  height: 300px;"> </div>
</div>
<a name="mapupdate" id="mapupdate" class="btn btn-primary text-white" href="#" role="button">Update Map</a>
</div> 
{{-- <div class="col">.</div> --}}
</div>


</div>


  
   {{--end of table FORECAST TAB --}} 
</div>



    </div>
  </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection
