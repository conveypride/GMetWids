@extends('admin.adminApp')

@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h4>Edit Daily Forecast</h4>
                  <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    {{-- <a class="flex-sm-fill text-sm-center nav-link active" id="get-started-tab" data-bs-toggle="tab" href="#get-started" role="tab" aria-controls="get-started" aria-selected="true">Getting Started</a> --}}
 <a class="flex-sm-fill text-sm-center nav-link active"  id="tableForecast-tab" data-bs-toggle="tab" href="#tableForecast" role="tab" aria-controls="tableForecast"  aria-selected="true">Table</a>

				    <a class="flex-sm-fill text-sm-center nav-link" id="map-tab" data-bs-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>

                    <a class="flex-sm-fill text-sm-center nav-link" id="weatherSummary-tab" data-bs-toggle="tab" href="#weatherSummary" role="tab" aria-controls="weatherSummary" aria-selected="false">Summary</a>
				    {{-- <a class="flex-sm-fill text-sm-center nav-link" id="weatherWarning-tab" data-bs-toggle="tab" href="#weatherWarning" role="tab" aria-controls="weatherWarning" aria-selected="false">Weather-Warning</a> --}}
				    </nav>
                <div class="tab-content" id="orders-table-tab-content">
{{-- table FORECAST TAB --}}
<div class="tab-pane fade show active" id="tableForecast" role="tabpanel" aria-labelledby="tableForecast-tab">
  <div class="container">
    <div class="row">
        <div class="d-flex justify-content-between bd-highlight mb-2">
       <div></div>  
       <button type="button" class="btn btn-info text-white" id="nextbtntomap">Next</button>
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
                <div class="col-4">
                    <label for="datetableMorning" class="form-label">Set Date</label>
                    <input type="date" class="form-control required datetable" id="datetableMorning" value="{{ $genMorning->date }}">
                  </div>
                  <div class="col-4">
                    <label for="itdtableMorning" class="form-label">Set ITD Position</label>
                    <input type="number" class="form-control required itdtable" id="itdtableMorning" value="{{ $genMorning->itd }}">
                  </div>

                  <div class="col-4">
                    <label for="prestableMorning" class="form-label">Action</label>
                  <a  class=" form-control btn btn-primary text-white saveme" role="button" href="#"
                  forecastid = "{{ $forecastid }}"
                    tableid = "{{ $genMorning->id }}" 
                    forecastTime = "{{ "Morning"  }}" >Save</a>
                  </div>
                
                </div>
                </th>
            </tr>
           {{-- time of day --}}
        </thead>

        {{-- sub titles --}}
        <thead class="thead-light">
          <tr>
            <th>Action</th>
            <th>Cities</th> 
            <th>Weather</th>
            <th>Min Temp °C</th>
            <th>Max Temp °C</th>
            <th> Wind (m/s)</th>
            <th>Chance of  Occurring</th>
            <th>Humidity</th>
           
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
          
            {{-- 1st row  --}}
            @if (!empty($morning))
            @foreach ($morning as $mornings) 
          <tr class="morning" districtnam="{{ $mornings->districts }}" >
            <td> <a  forecastid = "{{ $forecastid }}"
                tableid = "{{ $mornings->id }}" 
                forecastTime = "{{ "Morning"  }}" 
                 class="btn btn-primary text-white saveus" href="#" role="button">Save</a></td>
  <td>{{ $mornings->districts }}</td> 
            {{-- morning --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm weatherdetail required weatherr" aria-label="Small select">
                     <option selected value="{{ $mornings->weather }}">{{ $mornings->weather }}</option>
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
            {{-- min TEMPERATURE --}}
            <td>
                <div class="form-floating">
                    <input type="number" class="form-control required mintempp" id="{{ $mornings->districts }}MfloatingInputtempmin{{ $mornings->id }}"  value="{{  $mornings->min_temp }}">
                    <label for="{{ $mornings->districts }}MfloatingInputtempmin{{ $mornings->id }}">Min Temperature</label>
                  </div>
            </td>
             {{--max temp --}}
            <td> 
              <div class="form-floating">
                <input type="number" class="form-control required maxtempp" id="{{ $mornings->districts }}MfloatingInputtempmax{{ $mornings->id }}" value="{{  $mornings->max_temp }}">
                <label for="{{ $mornings->districts }}MfloatingInputtempmax{{ $mornings->id }}">Max Temperature</label>
              </div>
            </td>
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control required windval" id="morningfloatingInputwind{{ $mornings->id }}"  value="{{ $mornings->wind }}">
                    <label for="morningfloatingInputwind{{ $mornings->id }}">Wind diecton & speed</label>
                  </div>
            </td>
            {{-- Chance of  Occurring --}}
            <td>
                <select class="form-select form-select-sm required rainChance" aria-label="Small select">
                    <option value="null">Select Chance of  Occurring</option>
                    <option selected value="{{ $mornings->rain_chance }}">{{ $mornings->rain_chance }}</option>
                    <option value="0%">0%</option>
                    <option value="10%">10%</option> <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    <option value="40%">40%</option>
                    <option value="60%">60%</option>
                    <option value="70%">70%</option>
                    <option value="80%">80%</option>
                    <option value="90%">90%</option>
                    <option value="100%">100%</option>

                  </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
                <select class="form-select form-select-sm required humidity" aria-label="Small select">
                    <option value="null">Select Humidity</option>
                    <option selected value="{{ $mornings->humidity }}">{{ $mornings->humidity }}</option>
                    <option value="0%">0%</option>
                    <option value="10%">10%</option> <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    <option value="40%">40%</option>
                    <option value="60%">60%</option>
                    <option value="70%">70%</option>
                    <option value="80%">80%</option>
                    <option value="90%">90%</option>
                    <option value="100%">100%</option>
                  </select>
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
                <div class="col-4">
                    <label for="datetableAfternoon" class="form-label">Set Date</label>
                    <input type="date" class="form-control required datetable" id="datetableAfternoon" value="{{ $genAfternoon->date }}">
                  </div> 
                  <div class="col-4">
                    <label for="itdtableAfternoon" class="form-label">Set ITD Position</label>
                    <input type="number" class="form-control required itdtable" id="itdtableAfternoon" value="{{ $genAfternoon->itd }}">
                  </div>
                  <div class="col-4">
                    <label for="prestableAfternoon" class="form-label">Set Pressure</label>
                    <a  id="prestableAfternoon" class=" form-control btn btn-primary text-white saveme" href="#" role="button"
                    forecastid = "{{ $forecastid }}"
                      tableid = "{{ $genAfternoon->id }}" 
                      forecastTime = "{{ "Afternoon"  }}" >Save</a>
                  </div>
                </div>
                </th>
            </tr>
           {{-- time of day --}}
        </thead>

        {{-- sub titles --}}
        <thead class="thead-light">
          <tr>
            <th>Action</th>
            <th>Cities</th>
            {{-- Afternoon section --}}
            <th>Weather</th>
            <th>Min Temp °C</th>
            <th>Max Temp °C</th>
            <th>Wind (m/s)</th>
            <th>Chance of  Occurring</th>
            <th>Humidity</th> 
             
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
            {{-- 1st row  --}}
             @if (!empty($afternoon))
            @foreach ($afternoon as $afternoons) 
          <tr class="afternoon" districtnam="{{ $afternoons->districts }}">
           <td> 
            <a 
            forecastid = "{{ $forecastid }}"
            tableid = "{{ $afternoons->id }}" 
            forecastTime = "{{ "Afternoon"  }}"
            class="btn btn-primary text-white saveus" 
            href="#"
            role="button">Save</a>
        </td>
  <td>{{ $afternoons->districts }}</td> 
            {{-- Afternoon --}}
            <td>
                {{-- weather --}}
                <select class="form-select form-select-sm required weatherr" aria-label="Small select">
                    <option selected value="{{ $afternoons->weather }}">{{ $afternoons->weather }}</option>
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
             {{--min  TEMPERATURE --}}
    <td>
      <div class="form-floating">
          <input type="number" class="form-control required mintempp" id="{{ $afternoons->districts }}AfloatingInputtempmin{{ $afternoons->id }}"   value="{{  $afternoons->min_temp }}">
          <label for="{{ $afternoons->districts }}AfloatingInputtempmin{{ $afternoons->id }}">Min Temperature</label>
        </div>
  </td>
{{--max temp --}}
<td> 
<div class="form-floating">
  <input type="number" class="form-control required maxtempp" id="{{ $afternoons->districts }}AfloatingInputtempmax{{ $afternoons->id }}"  value="{{  $afternoons->max_temp }}">
  <label for="{{ $afternoons->districts }}AfloatingInputtempmax{{ $afternoons->id }}">Max Temperature</label>
</div>
</td>
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control required windval" id="afternoonfloatingInputwind{{ $afternoons->id }}" value="{{  $afternoons->wind }}">
                    <label for="afternoonfloatingInputwind{{ $afternoons->id }}">Wind diecton & speed</label>
                  </div>
            </td>
            {{-- Chance of  Occurring --}}
            <td>
                <select class="form-select form-select-sm required rainChance" aria-label="Small select">
                    <option selected value="{{ $afternoons->rain_chance }}">{{ $afternoons->rain_chance }}</option>
                    <option value="null">Select Chance of  Occurring</option>
                    <option value="0%">0%</option>
                    <option value="10%">10%</option> <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    <option value="40%">40%</option>
                    <option value="60%">60%</option>
                    <option value="70%">70%</option>
                    <option value="80%">80%</option>
                    <option value="90%">90%</option>
                    <option value="100%">100%</option>
                  </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
                <select class="form-select form-select-sm required humidity" aria-label="Small select">
                    <option selected value="{{ $afternoons->humidity }}">{{ $afternoons->humidity }}</option>
                    <option value="null">Select Humidity</option>
                    <option value="0%">0%</option>
                    <option value="10%">10%</option> <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    <option value="40%">40%</option>
                    <option value="60%">60%</option>
                    <option value="70%">70%</option>
                    <option value="80%">80%</option>
                    <option value="90%">90%</option>
                    <option value="100%">100%</option>
                  </select>
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
                    <div class="col-4">
                        <label for="datetableEvening" class="form-label">Set Date</label>
                        <input type="date" class="form-control required datetable" id="datetableEvening"  value="{{ $genEvening->date }}">
                      </div> 
                      <div class="col-4">
                        <label for="itdtableEvening" class="form-label">Set ITD Position</label>
                        <input type="number" class="form-control required itdtable" id="itdtableEvening"  value="{{ $genEvening->itd }}">
                      </div>
                      <div class="col-4">
                        <label for="prestableEvening" class="form-label">Set Pressure</label>
                      <a  id="prestableEvening" class="form-control btn btn-primary text-white saveme" href="#" role="button"  forecastid = "{{ $forecastid }}"
                      tableid = "{{ $genEvening->id }}" 
                      forecastTime = "{{ "Evening"  }}" >Save</a>
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
                <th>Min Temp °C</th>
                <th>Max Temp °C</th>
                <th> Wind (m/s)</th>
                <th>Chance of  Occurring</th>
                <th>Humidity</th> 
                </tr>
               {{-- end of sub titles --}}
            </thead>
    
            <tbody>
                {{-- 1st row  --}}
                 @if (!empty($evening))
                @foreach ($evening as $evenings)  
                 <tr class="evening" districtnam="{{ $evenings->districts }}"> 
                    <td> <a  forecastid = "{{ $forecastid }}"
                        tableid = "{{ $evenings->id }}" 
                        forecastTime = "{{ "Evening"  }}" 
                         class="btn btn-primary text-white saveus" href="#" role="button">Save</a></td>
      <td>{{ $evenings->districts }}</td> 
                <td>
                    {{-- weather --}}
                    <select class="form-select form-select-sm required weatherr" aria-label="Small select">
                        <option selected value="{{ $evenings->weather }}">{{ $evenings->weather }}</option>
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
                     {{--min  TEMPERATURE --}}
    <td>
      <div class="form-floating">
          <input type="number" class="form-control required mintempp" id="{{ $evenings->districts }}EfloatingInputtempmin{{ $evenings->id }}" value="{{ $evenings->min_temp  }}">
          <label for="{{ $evenings->districts }}EfloatingInputtempmin{{ $evenings->id }}">Min Temperature</label>
        </div>
  </td>
{{--max temp --}}
<td> 
<div class="form-floating">
  <input type="number" class="form-control required maxtempp" id="{{ $evenings->districts }}EfloatingInputtempmax{{ $evenings->id }}" value="{{ $evenings->max_temp  }}">
  <label for="{{ $evenings->districts }}EfloatingInputtempmax{{ $evenings->id }}">Max Temperature</label>
</div>
</td>
                {{-- WIND --}}
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control required windval" id="eveningfloatingInputwind{{ $evenings->id }}" value="{{ $evenings->wind }}">
                        <label for="eveningfloatingInputwind{{ $evenings->id }}">Wind diecton & speed</label>
                      </div>
                </td>
                {{-- Chance of  Occurring --}}
                <td>
                    <select class="form-select form-select-sm required rainChance" aria-label="Small select">
                        <option selected value="{{ $evenings->rain_chance }}">{{ $evenings->rain_chance }}</option>
                        <option value="null">Select Chance of  Occurring</option>
                        <option value="0%">0%</option>
                    <option value="10%">10%</option> <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    <option value="40%">40%</option>
                    <option value="60%">60%</option>
                    <option value="70%">70%</option>
                    <option value="80%">80%</option>
                    <option value="90%">90%</option>
                    <option value="100%">100%</option>
                      </select>
                </td>
                {{-- humidity 0% - 100%--}}
                <td>
                    <select class="form-select form-select-sm required humidity" aria-label="Small select">
                        <option selected value="{{ $evenings->humidity }}">{{ $evenings->humidity }}</option>
                        <option value="null">Select Humidity</option>
                        <option value="0%">0%</option>
                    <option value="10%">10%</option> <option value="20%">20%</option>
                    <option value="30%">30%</option>
                    <option value="40%">40%</option>
                    <option value="60%">60%</option>
                    <option value="70%">70%</option>
                    <option value="80%">80%</option>
                    <option value="90%">90%</option>
                    <option value="100%">100%</option>
                      </select>
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
       <button type="button" class="btn btn-info text-white" id="nextpageSummary"> Save </button>
  </div>
    </div>
  </div>

<input type="hidden" id="forid"  value="{{ $forecastid}}">
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
      <div class="card" style="width: 100%;
      height: 750px;">
          
              <div class="d-grid gap-2 p-2">
                  <div class="alert alert-warning fade show p-2 m-2" role="alert">
                      <strong class="fs-3"> Morning Map</strong>  </div>
                  <div class="mb-3">
                      <label for="datemapp1" class="form-label">Set Date</label>
                      <input type="date" class="form-control requiredmapdate" id="datemapp1" value="@if (!empty($polygonDatemorning->morningDate))
                      {{$polygonDatemorning->morningDate }} @endif">
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
                     <div class="card-body">
              <div id="mapEdit" style="position: relative; width: 100%; height: 95%;"> </div>
          </div>
          <div class="card-footer">
              <small class="text-muted">Morning (6:00am - 11:59am)</small>
            </div>
            {{-- end of morning map --}}
      </div>
      {{-- afternoon map --}}
         <div class="card" style="width: 100%;
         height: 750px;"> 
          <div class="d-grid gap-2 p-2">
              <div class="alert alert-warning fade show p-2 m-2" role="alert">
                  <strong class="fs-3">Afternoon Map</strong>  </div>
              <div class="mb-3">
                  <label for="datemapp1af" class="form-label">Set Date</label>
                  <input type="date" class="form-control requiredmapdate" id="datemapp1af" value="@if (!empty($polygonDateafternoon->afternoonDate))
                  {{$polygonDateafternoon->afternoonDate }} @endif">
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
                 <div class="card-body">
          <div id="mapEditaf"  style="position: relative; width: 100%; height: 95%;"> </div>
      </div>
      <div class="card-footer">
          <small class="text-muted">Afternoon (12:00pm - 5:59pm)</small>
        </div>
      {{-- end of  afternoon  map --}}   
  </div>

{{-- evening map --}}
<div class="card" style="width: 100%;
height: 750px;"> 
  <div class="d-grid gap-2 p-2">
      <div class="alert alert-warning fade show p-2 m-2" role="alert">
          <strong class="fs-3">Evening Map</strong>  </div>
      <div class="mb-3">
          <label for="datemapp1ev" class="form-label">Set Date</label>
          <input type="date" class="form-control requiredmapdate" id="datemapp1ev" value="@if (!empty($polygonDateevening->eveningDate))
            {{$polygonDateevening->eveningDate}} @endif">
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
         <div class="card-body" >
  <div id="mapEditev"   style="position: relative; width: 100%; height: 95%;"> </div>
</div>
<div class="card-footer">
  <small class="text-muted">Evening (6:00pm - 11:59pm)</small>
</div>
{{-- end of  evening  map --}}   
</div>
      
   </div>
   <br>
   <div class="row">
    <div class="col-3">
      <div class="card text-white">
<img class="card-img-top" src="{{ asset('images/warning.png') }}"  style="height: 150px;" alt="Title">
</div>
</div>
<div class="col-9">
<div class="card text-white">
<img class="card-img-top" src="{{ asset('images/risk.png') }}"  style="height: 150px;" alt="Title">
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
       <button type="button" class="btn btn-success text-white" id="finalbtn">Save</button>
  </div>
    </div>
  </div>

    <div class="alert alert-warning alert-dismissible fade show p-2 m-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> Weather Summary Report</strong>  </div>

    <div class="form-floating my-3">
     
        <textarea class="form-control" placeholder="Write your weather here" id="summarytext" style="height: 150px"></textarea>
        <p id="characterCount">Characters remaining: 310</p>
        <label for="summarytext">Weather Summary</label>
      </div>
 </div>

 {{--  WeatherWarning --}}
{{-- <div class="tab-pane fade " id="weatherWarning" role="tabpanel" aria-labelledby="weatherWarning-tab">
  <div class="container">
    <div class="row">
        <div class="d-flex justify-content-between bd-highlight mb-2">
       <div></div>  
     
      <div>
      <button type="button" class="btn btn-primary text-white " id="buttonpublish" typeofSubmit="Publish-Forecast">Publish-Forecast</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu overflow-scroll" style="max-width: 260px; max-height: 160px;">
        <li><a class="dropdown-item publ" id="Publish-Forecast">Publish-Forecast</a></li>
        <li><a class="dropdown-item publ" id="Draft-Forecast">Draft-Forecast</a></li>
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
</div>  --}}
    </div>
  </div>  <!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 @section('script')
 <script>
  const textarea = document.getElementById('summarytext');
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


    <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Add a click event listener to elements with the "saveme" class
    var saveusButton = document.querySelectorAll(".saveme");
    
    saveusButton.forEach(function (button) {
      button.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default link behavior

        // Find the parent element with the "row" class to scope the search for inputs
        var parentRow = button.closest(".row");

        // Get the values of the "date" and "itd" inputs within the same parent row
        var dateValue = parentRow.querySelector(".datetable").value;
        var itdValue = parentRow.querySelector(".itdtable").value;
        var thisguy = this;
        var forecastid = thisguy.getAttribute('forecastid');
        var tableid = thisguy.getAttribute('tableid');
        var forecastTime = thisguy.getAttribute('forecastTime');
// Get the CSRF token value from the meta tag
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


thisguy.innerHTML = '<div class="spinner-border text-white" role="status"><span class="visually-hidden">Loading...</span></div>';
        // Create a data object to send with the AJAX request
        var data = {
          date: dateValue,
          itd: itdValue,
          forecastid: forecastid,
          tableid:tableid,
          forecastTime: forecastTime
        };

        // Send an AJAX POST request to your Laravel route
        fetch('/admin/editgentablevalue', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken 
          },
          body: JSON.stringify(data)
        })
        .then(response => {
          // Handle the response from your Laravel route here
          if (response.ok) {
            thisguy.innerHTML = '<span>Successful</span>';
            // Request was successful, you can handle the success case here
            console.log('Data sent successfully');
            return response.json();
          } else {
            // Request failed, you can handle the error case here
            console.error('Failed to send data');
          }
        })
        .then(data  => {
    // Access the JSON data
    // Output: The JSON data sent from Laravel
    console.log(JSON.stringify(data));
    // Now, you can work with the data in your JavaScript code
  })
        .catch(error => {
          console.error('Error:', error);
        });
      });
    });
  });
</script>


<script>
    // Get all elements with the class "saveus"
var saveusButtons = document.querySelectorAll('.saveus');

// Loop through each "saveus" button and attach a click event listener
saveusButtons.forEach(function(button) {
  button.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default behavior of the anchor tag

    // Find the parent <tr> element of the clicked button
    var parentRow = button.closest('tr');

    // Get the values of the input fields and select elements within the parent <tr>
    var forecastId = button.getAttribute('forecastid');
    var tableId = button.getAttribute('tableid');
    var forecastTime = button.getAttribute('forecastTime');
    var weather = parentRow.querySelector('.weatherr').value;
    var minTemperature = parentRow.querySelector('.mintempp').value;
    var maxTemperature = parentRow.querySelector('.maxtempp').value;
    var wind = parentRow.querySelector('.windval').value;
    var rainChance = parentRow.querySelector('.rainChance').value;
    var humidity = parentRow.querySelector('.humidity').value;
var thisus = this;
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Now you have all the values, you can use them as needed
console.log('Forecast ID:', forecastId);
    console.log('Table ID:', tableId);
    console.log('Forecast Time:', forecastTime);
    console.log('Weather:', weather);
    console.log('Min Temperature:', minTemperature);
    console.log('Max Temperature:', maxTemperature);
    console.log('Wind:', wind);
    console.log('Rain Chance:', rainChance);
    console.log('Humidity:', humidity);
thisus.innerHTML = '<div class="spinner-border text-white" role="status"><span class="visually-hidden">Loading...</span></div>';

 // Create a data object to send with the AJAX request
 var data = {
forecastId: forecastId,
tableId: tableId,
forecastTime: forecastTime,
weather: weather,
minTemperature: minTemperature,
maxTemperature: maxTemperature,
wind: wind,
rainChance: rainChance,
humidity: humidity
        };

        // Send an AJAX POST request to your Laravel route
        fetch('/admin/edittablevalue', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken 
          },
          body: JSON.stringify(data)
        })
        .then(response => {
          // Handle the response from your Laravel route here
          if (response.ok) {
            thisus.innerHTML = '<span>Successful</span>';
            // Request was successful, you can handle the success case here
            console.log('Data sent successfully');
            return response.json();
          } else {
            // Request failed, you can handle the error case here
            console.error('Failed to send data');
          }
        })
        .then(data  => {
    // Access the JSON data
    // Output: The JSON data sent from Laravel
    console.log(JSON.stringify(data));
    // Now, you can work with the data in your JavaScript code
  }).catch(error => {
          console.error('Error:', error);
        });

 
  });
});

</script>




<script>

// Initialize an empty array to store the grouped values
const morningValues = [];
const afternoonValues = [];
const eveningValues = [];
const masterContainer = [];
// =================table page next button for addnew daily forecast==========
var nextBtn2 = document.getElementById('nextbtntomap');
nextBtn2.addEventListener('click', function(e) {
   
  var activeNav = document.querySelector('#orders-table-tab .nav-link.active');
  var nextNav = activeNav.nextElementSibling;
 
function validatetableForm() {
    // Get all required input and select elements
    let requiredElements = document.querySelectorAll('.required');
  
    // Loop through each required element
    for (let i = 0; i < requiredElements.length; i++) {
      let element = requiredElements[i];
  
      // Check if the element is an input or select
      if (element.tagName === 'INPUT' || element.tagName === 'SELECT') {
        // Check if the element has a value or selected option
        if (element.value === 'null' || element.value === '' ) {
             // If the element is empty, add the "required-error" class to highlight it
        element.classList.add('required-error');
          // If the element is empty, show an error message and prevent form submission
          alert('Error: You\'ve not filled all the fields, please do so to continue, Thank you!!');
          return false;
        }else{
            // If the element is not empty, remove the "required-error" class if it was previously added
        element.classList.remove('required-error');
        }
      }
    }
  
    // If all required inputs and selects have a value or selected option, allow form submission
    return true;
  }
  
  

 
var allfieldsfilled = validatetableForm();

if(allfieldsfilled == true){
  activeNav.classList.remove('active');
  nextNav.classList.add('active');
  nextNav.classList.remove('disabled');

  var activeTab = document.querySelector(activeNav.getAttribute('href'));
  var nextTab = document.querySelector(nextNav.getAttribute('href'));

  activeTab.classList.remove('show', 'active');
  nextTab.classList.add('show', 'active');

} 
});

</script>


<script src="{{ asset('assets/js/editmap.js') }}"></script>


 @endsection
    @endsection
