@extends('admin.adminApp')

@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h4>Add A New Daily Forecast</h4>
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

 
{{-- table FORECAST TAB --}}
<div class="tab-pane fade " id="tableForecast" role="tabpanel" aria-labelledby="tableForecast-tab">
 
  @if ($forecasttype == 'Morning')
      
 

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
                <div class="col-6">
                    <label for="datetableMorning" class="form-label">Set Date</label>
                    <input type="date" class="form-control required" id="datetableMorning" value="{{ !empty($genMorning)  ? $genMorning->date : '' }}">
                  </div>
                  <div class="col-6">
                    <label for="itdtableMorning" class="form-label">Set ITD Position</label>
                    <input type="number" class="form-control required" id="itdtableMorning" placeholder="e.g: 1" value="{{ !empty($genMorning)  ? $genMorning->itd : '' }}">
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
            <th>Min Temp °C</th>
            <th>Max Temp °C</th>
            <th> Wind (m/s) <small>- E.g; 12SE</small></th>
            <th>Chance of  Occurring</th>
            <th>Humidity</th>
           
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
         
            {{-- 1st row  --}}
            @if (!empty($districts))
            @foreach ($districts as $key => $district) 
            
            @if (!empty($morningtablevalue))
            @if (!empty($missingmorningcities))
 @foreach ($missingmorningcities as $missingmorningcitie)
 @if ($district->districtname == $missingmorningcitie)
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
            {{-- min TEMPERATURE --}}
            <td>
                <div class="form-floating">
                    <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" >
                    <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                  </div>
            </td>
             {{--max temp --}}
            <td> 
              <div class="form-floating">
                <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" >
                <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
              </div>
            </td>
            {{-- WIND --}}
            <td>
                <div class="form-floating">
                    <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" >
                    <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                  </div>
            </td>
            {{-- Chance of  Occurring --}}
            <td>
                <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="null">Select Chance of  Occurring</option>

                    <option value="0% - 10%">0% - 10%</option>
                    <option value="10% - 20%">10% - 20%</option>
                     <option value="20% - 30%">20% - 30%</option>
                    <option value="30% - 40%">30% - 40%</option>
                    <option value="40% - 50%">40% - 50%</option>
                    <option value="50% - 60%">50% - 60%</option>
                    <option value="60% - 70%">60% - 70%</option>
                    <option value="70% - 80%%">70% - 80%</option>
                    <option value="80% - 90%">80% - 90%</option>
                    <option value="90% - 100%">90% - 100%</option>

                  </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
                <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="null">Select Humidity</option>
                    <option value="0% - 10%">0% - 10%</option>
                    <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                    <option value="30% - 40%">30% - 40%</option>
                    <option value="40% - 50%">40% - 50%</option>
                    <option value="50% - 60%">50% - 60%</option>
                    <option value="60% - 70%">60% - 70%</option>
                    <option value="70% - 80%%">70% - 80%</option>
                    <option value="80% - 90%">80% - 90%</option>
                    <option value="90% - 100%">90% - 100%</option>

                  </select>
            </td>
          </tr>
 @endif
 @endforeach

 @endif
            @foreach ($morningtablevalue as $morningtablevalues)
              
              @if ($district->districtname == $morningtablevalues['districts'])
                <tr class="morning" districtnam="{{ $district->districtname }}">
                <td>{{ $district->districtname }}</td> 
                          {{-- morning --}}
                          <td>
                              {{-- weather --}}
                              <select class="form-select form-select-sm weatherdetail required" aria-label="Small select">
                                <option value="{{ $morningtablevalues['weather']  }}">{{ $morningtablevalues['weather']  }} </option>
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
                                  <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" value="{{ $morningtablevalues['min_temp']}}" >
                                  <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                                </div>
                          </td>
                           {{--max temp --}}
                          <td> 
                            <div class="form-floating">
                              <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" value="{{ $morningtablevalues['max_temp']}}">
                              <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                            </div>
                          </td>
                          {{-- WIND --}}
                          <td>
                              <div class="form-floating">
                                  <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" value="{{ $morningtablevalues['wind']}}" >
                                  <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                                </div>
                          </td>
                          {{-- Chance of  Occurring --}}
                          <td>
                              <select class="form-select form-select-sm required" aria-label="Small select">
                                <option value="{{ $morningtablevalues['rain_chance']  }}">{{ $morningtablevalues['rain_chance']  }} </option>
                                  <option value="null">Select Chance of  Occurring</option>
                                  <option value="0% - 10%">0% - 10%</option>
                                  <option value="10% - 20%">10% - 20%</option>
                                   <option value="20% - 30%">20% - 30%</option>
                                  <option value="30% - 40%">30% - 40%</option>
                                  <option value="40% - 50%">40% - 50%</option>
                                  <option value="50% - 60%">50% - 60%</option>
                                  <option value="60% - 70%">60% - 70%</option>
                                  <option value="70% - 80%%">70% - 80%</option>
                                  <option value="80% - 90%">80% - 90%</option>
                                  <option value="90% - 100%">90% - 100%</option>
              
                                </select>
                          </td>
                          {{-- humidity 0% - 100%--}}
                          <td>
                              <select class="form-select form-select-sm required" aria-label="Small select">
                                <option value="{{ $morningtablevalues['humidity']  }}">{{ $morningtablevalues['humidity']  }} </option>
                                  <option value="null">Select Humidity</option>
                                  <option value="0% - 10%">0% - 10%</option>
                                  <option value="10% - 20%">10% - 20%</option>
                                  <option value="20% - 30%">20% - 30%</option>
                                  <option value="30% - 40%">30% - 40%</option>
                                  <option value="40% - 50%">40% - 50%</option>
                                  <option value="50% - 60%">50% - 60%</option>
                                  <option value="60% - 70%">60% - 70%</option>
                                  <option value="70% - 80%%">70% - 80%</option>
                                  <option value="80% - 90%">80% - 90%</option>
                                  <option value="90% - 100%">90% - 100%</option>
              
                                </select>
                          </td>
                        </tr>
               
                @endif
                @endforeach



            @else 
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
                        {{-- min TEMPERATURE --}}
                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" >
                                <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                              </div>
                        </td>
                         {{--max temp --}}
                        <td> 
                          <div class="form-floating">
                            <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" >
                            <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                          </div>
                        </td>
                        {{-- WIND --}}
                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" >
                                <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                              </div>
                        </td>
                        {{-- Chance of  Occurring --}}
                        <td>
                            <select class="form-select form-select-sm required" aria-label="Small select">
                                <option value="null">Select Chance of  Occurring</option>
            
                                <option value="0% - 10%">0% - 10%</option>
                                <option value="10% - 20%">10% - 20%</option>
                                 <option value="20% - 30%">20% - 30%</option>
                                <option value="30% - 40%">30% - 40%</option>
                                <option value="40% - 50%">40% - 50%</option>
                                <option value="50% - 60%">50% - 60%</option>
                                <option value="60% - 70%">60% - 70%</option>
                                <option value="70% - 80%%">70% - 80%</option>
                                <option value="80% - 90%">80% - 90%</option>
                                <option value="90% - 100%">90% - 100%</option>
            
                              </select>
                        </td>
                        {{-- humidity 0% - 100%--}}
                        <td>
                            <select class="form-select form-select-sm required" aria-label="Small select">
                                <option value="null">Select Humidity</option>
                                <option value="0% - 10%">0% - 10%</option>
                                <option value="10% - 20%">10% - 20%</option>
                                <option value="20% - 30%">20% - 30%</option>
                                <option value="30% - 40%">30% - 40%</option>
                                <option value="40% - 50%">40% - 50%</option>
                                <option value="50% - 60%">50% - 60%</option>
                                <option value="60% - 70%">60% - 70%</option>
                                <option value="70% - 80%%">70% - 80%</option>
                                <option value="80% - 90%">80% - 90%</option>
                                <option value="90% - 100%">90% - 100%</option>
            
                              </select>
                        </td>
                      </tr>

            @endif

        
          @endforeach 
          @else
          <tr> <td>No dristricts found</td> </tr>
          @endif
        </tbody>
      </table>
    </div>

<br>
  {{-- afternoon  table --}}
  <div class="table-responsive mt-2">
    <table class="table table-bordered text-center">
        {{-- time of day --}}
        <thead class="thead-dark">
          <tr>
            <th></th>
            <th colspan="7">
                Afternoon
                <div class="row">
                <div class="col-6">
                    <label for="datetableAfternoon" class="form-label">Set Date</label>
                    <input type="date" class="form-control required" id="datetableAfternoon" value="{{ !empty($genAfternoon)  ? $genAfternoon->date : '' }}">
                  </div> 
                  <div class="col-6">
                    <label for="itdtableAfternoon" class="form-label">Set ITD Position</label>
                    <input type="number" class="form-control required" id="itdtableAfternoon" placeholder="e.g: 1" value="{{ !empty($genAfternoon)  ? $genAfternoon->itd : '' }}">
                  </div>
                  {{-- <div class="col-4">
                    <label for="prestableAfternoon" class="form-label">Set Pressure</label>
                    <input type="number" class="form-control required" id="prestableAfternoon" placeholder="e.g: 150">
                  </div> --}}
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
            <th>Min Temp °C</th>
            <th>Max Temp °C</th>
            <th>Wind (m/s) <small>- E.g; 12SE</small> </th>
            <th>Chance of  Occurring</th>
            <th>Humidity</th> 
             
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
            {{-- 1st row  --}}
             @if (!empty($districts))
            @foreach ($districts as $district) 
            @if (!empty($afternoontablevalue))
            @if (!empty($missingafternooncities))
            @foreach ($missingafternooncities as $missingafternooncitie)
            @if ($district->districtname == $missingafternooncitie)

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
            {{--min  TEMPERATURE --}}
            <td>
            <div class="form-floating">
            <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" >
            <label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
            </div>
            </td>
            {{--max temp --}}
            <td> 
            <div class="form-floating">
            <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" >
            <label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
            </div>
            </td>
            {{-- WIND --}}
            <td>
               <div class="form-floating">
                   <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" >
                   <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                 </div>
            </td>
            {{-- Chance of  Occurring --}}
            <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                   <option value="null">Select Chance of  Occurring</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>
            
                 </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                   <option value="null">Select Humidity</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>
            
                 </select>
            </td>
            
            </tr>
            @endif

            @endforeach
@endif

            @foreach ($afternoontablevalue as $afternoontablevalues)
      
            @if ($district->districtname == $afternoontablevalues['districts'])
             
              <tr class="afternoon" districtnam="{{ $district->districtname }}">
           
              <td>{{ $district->districtname }}</td> 
           {{-- Afternoon --}}
           <td>
               {{-- weather --}}
               <select class="form-select form-select-sm required" aria-label="Small select">
                 <option value="{{ $afternoontablevalues['weather'] }}">{{ $afternoontablevalues['weather'] }}</option> 
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
         <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" value="{{ $afternoontablevalues['min_temp'] }}" >
         <label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
       </div>
 </td>
{{--max temp --}}
<td> 
<div class="form-floating">
 <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" value="{{ $afternoontablevalues['min_temp'] }}" >
 <label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
           {{-- WIND --}}
           <td>
               <div class="form-floating">
                   <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" value="{{ $afternoontablevalues['wind'] }}">
                   <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                 </div>
           </td>
           {{-- Chance of  Occurring --}}
           <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                <option value="{{ $afternoontablevalues['rain_chance'] }}">{{ $afternoontablevalues['rain_chance'] }}</option>
                   <option value="null">Select Chance of  Occurring</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>

                 </select>
           </td>
           {{-- humidity 0% - 100%--}}
           <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                <option value="{{ $afternoontablevalues['humidity'] }}">{{ $afternoontablevalues['humidity'] }}</option>
                   <option value="null">Select Humidity</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>

                 </select>
           </td>
            
         </tr>

 
        
            @endif
            
            @endforeach  


        
            @else
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
{{--min  TEMPERATURE --}}
<td>
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" >
<label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
</div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" >
<label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
{{-- WIND --}}
<td>
   <div class="form-floating">
       <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" >
       <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
     </div>
</td>
{{-- Chance of  Occurring --}}
<td>
   <select class="form-select form-select-sm required" aria-label="Small select">
       <option value="null">Select Chance of  Occurring</option>
       <option value="0% - 10%">0% - 10%</option>
       <option value="10% - 20%">10% - 20%</option>
        <option value="20% - 30%">20% - 30%</option>
       <option value="30% - 40%">30% - 40%</option>
       <option value="40% - 50%">40% - 50%</option>
       <option value="50% - 60%">50% - 60%</option>
       <option value="60% - 70%">60% - 70%</option>
       <option value="70% - 80%%">70% - 80%</option>
       <option value="80% - 90%">80% - 90%</option>
       <option value="90% - 100%">90% - 100%</option>

     </select>
</td>
{{-- humidity 0% - 100%--}}
<td>
   <select class="form-select form-select-sm required" aria-label="Small select">
       <option value="null">Select Humidity</option>
       <option value="0% - 10%">0% - 10%</option>
       <option value="10% - 20%">10% - 20%</option>
        <option value="20% - 30%">20% - 30%</option>
       <option value="30% - 40%">30% - 40%</option>
       <option value="40% - 50%">40% - 50%</option>
       <option value="50% - 60%">50% - 60%</option>
       <option value="60% - 70%">60% - 70%</option>
       <option value="70% - 80%%">70% - 80%</option>
       <option value="80% - 90%">80% - 90%</option>
       <option value="90% - 100%">90% - 100%</option>

     </select>
</td>

</tr>
            @endif

          
          @endforeach 
          @else
          <tr> <td>No dristricts found</td> </tr>
          @endif
     
        </tbody>
      </table>
    </div>

    <br>


      {{-- evening  table --}}
      <div class="table-responsive my-2">
        <table class="table table-bordered text-center">
            {{-- time of day --}}
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th colspan="7">
                    Evening
                    <div class="row">
                    <div class="col-6">
                        <label for="datetableEvening" class="form-label">Set Date</label>
                        <input type="date" class="form-control required" id="datetableEvening" value="{{ !empty($genEvening)  ? $genEvening->date : '' }}">
                      </div> 
                      <div class="col-6">
                        <label for="itdtableEvening" class="form-label">Set ITD Position</label>
                        <input type="number" class="form-control required" id="itdtableEvening" placeholder="e.g: 1" value="{{ !empty($genEvening)  ? $genEvening->itd : '' }}">
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
                <th> Wind (m/s) <small>- E.g; 12SE</small></th>
                <th>Chance of  Occurring</th>
                <th>Humidity</th> 
                </tr>
               {{-- end of sub titles --}}
            </thead>
    
            <tbody>
                {{-- 1st row  --}}
                 @if (!empty($districts))
                @foreach ($districts as $district)  
                @if (!empty($eveningtablevalue))
                @if (!empty($missingeveningcities))
                @foreach ($missingeveningcities as $missingeveningcitie)
                @if ($district->districtname == $missingeveningcitie)
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
                   {{--min  TEMPERATURE --}}
          <td>
          <div class="form-floating">
          <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}" >
          <label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
          </div>
          </td>
          {{--max temp --}}
          <td> 
          <div class="form-floating">
          <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}" >
          <label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
          </div>
          </td>
              {{-- WIND --}}
              <td>
                  <div class="form-floating">
                      <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}" >
                      <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                    </div>
              </td>
              {{-- Chance of  Occurring --}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                      <option value="null">Select Chance of  Occurring</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
          
                    </select>
              </td>
              {{-- humidity 0% - 100%--}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                      <option value="null">Select Humidity</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
          
                    </select>
              </td> 
          
            </tr>
                @endif
                @endforeach
@endif

                @foreach ($eveningtablevalue as $eveningtablevalues)
       
 
                @if ($district->districtname == $eveningtablevalues['districts'])
                 
                <tr class="evening" districtnam="{{ $district->districtname }}"> 
                  <td>{{ $district->districtname }}</td> 
                 <td>
                  {{-- weather --}}
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['weather'] }}"> {{ $eveningtablevalues['weather'] }} </option>
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
        <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}"  value="{{ $eveningtablevalues['min_temp'] }}" >
        <label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
      </div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}"  value="{{ $eveningtablevalues['max_temp'] }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
              {{-- WIND --}}
              <td>
                  <div class="form-floating">
                      <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}"  value="{{ $eveningtablevalues['wind'] }}">
                      <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                    </div>
              </td>
              {{-- Chance of  Occurring --}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['rain_chance'] }}"> {{ $eveningtablevalues['rain_chance'] }} </option>
                      <option value="null">Select Chance of  Occurring</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
  
                    </select>
              </td>
              {{-- humidity 0% - 100%--}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['humidity'] }}"> {{ $eveningtablevalues['humidity'] }} </option>
                      <option value="null">Select Humidity</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
  
                    </select>
              </td> 
   
            </tr>

          
                @endif
      
                @endforeach 

                @else
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
         {{--min  TEMPERATURE --}}
<td>
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
</div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
    {{-- WIND --}}
    <td>
        <div class="form-floating">
            <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}" >
            <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
          </div>
    </td>
    {{-- Chance of  Occurring --}}
    <td>
        <select class="form-select form-select-sm required" aria-label="Small select">
            <option value="null">Select Chance of  Occurring</option>
            <option value="0% - 10%">0% - 10%</option>
            <option value="10% - 20%">10% - 20%</option>
             <option value="20% - 30%">20% - 30%</option>
            <option value="30% - 40%">30% - 40%</option>
            <option value="40% - 50%">40% - 50%</option>
            <option value="50% - 60%">50% - 60%</option>
            <option value="60% - 70%">60% - 70%</option>
            <option value="70% - 80%%">70% - 80%</option>
            <option value="80% - 90%">80% - 90%</option>
            <option value="90% - 100%">90% - 100%</option>

          </select>
    </td>
    {{-- humidity 0% - 100%--}}
    <td>
        <select class="form-select form-select-sm required" aria-label="Small select">
            <option value="null">Select Humidity</option>
            <option value="0% - 10%">0% - 10%</option>
            <option value="10% - 20%">10% - 20%</option>
             <option value="20% - 30%">20% - 30%</option>
            <option value="30% - 40%">30% - 40%</option>
            <option value="40% - 50%">40% - 50%</option>
            <option value="50% - 60%">50% - 60%</option>
            <option value="60% - 70%">60% - 70%</option>
            <option value="70% - 80%%">70% - 80%</option>
            <option value="80% - 90%">80% - 90%</option>
            <option value="90% - 100%">90% - 100%</option>

          </select>
    </td> 

  </tr>

    @endif

                 
  @endforeach 
@else
<tr> <td>No dristricts found</td> </tr>
@endif
            </tbody>
          </table>
        </div>

<br>


@elseif ($forecasttype == 'Afternoon')

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
                <div class="col-6">
                    <label for="datetableAfternoon" class="form-label">Set Date</label>
                    <input type="date" class="form-control required" id="datetableAfternoon" value="{{ !empty($genAfternoon)  ? $genAfternoon->date : '' }}">
                  </div> 
                  <div class="col-6">
                    <label for="itdtableAfternoon" class="form-label">Set ITD Position</label>
                    <input type="number" class="form-control required" id="itdtableAfternoon" placeholder="e.g: 1" value="{{ !empty($genAfternoon)  ? $genAfternoon->itd : '' }}">
                  </div>
                  {{-- <div class="col-4">
                    <label for="prestableAfternoon" class="form-label">Set Pressure</label>
                    <input type="number" class="form-control required" id="prestableAfternoon" placeholder="e.g: 150">
                  </div> --}}
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
            <th>Min Temp °C</th>
            <th>Max Temp °C</th>
            <th>Wind (m/s) <small>- E.g; 12SE</small> </th>
            <th>Chance of  Occurring</th>
            <th>Humidity</th> 
             
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
            {{-- 1st row  --}}
             @if (!empty($districts))
            @foreach ($districts as $district) 
            @if (!empty($afternoontablevalue))
            @if (!empty($missingafternooncities))
            @foreach ($missingafternooncities as $missingafternooncitie)
            @if ($district->districtname == $missingafternooncitie)

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
            {{--min  TEMPERATURE --}}
            <td>
            <div class="form-floating">
            <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" >
            <label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
            </div>
            </td>
            {{--max temp --}}
            <td> 
            <div class="form-floating">
            <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" >
            <label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
            </div>
            </td>
            {{-- WIND --}}
            <td>
               <div class="form-floating">
                   <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" >
                   <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                 </div>
            </td>
            {{-- Chance of  Occurring --}}
            <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                   <option value="null">Select Chance of  Occurring</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>
            
                 </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                   <option value="null">Select Humidity</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>
            
                 </select>
            </td>
            
            </tr>
            @endif

            @endforeach

@endif


  @foreach ($afternoontablevalue as $afternoontablevalues)
      
    @if ($district->districtname == $afternoontablevalues['districts'])
            
              <tr class="afternoon" districtnam="{{ $district->districtname }}">
            {{ "yes" }}
              <td>{{ $district->districtname }}</td> 
           {{-- Afternoon --}}
           <td>
               {{-- weather --}}
               <select class="form-select form-select-sm required" aria-label="Small select">
                 <option value="{{ $afternoontablevalues['weather'] }}">{{ $afternoontablevalues['weather'] }}</option> 
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
         <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" value="{{ $afternoontablevalues['min_temp'] }}" >
         <label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
       </div>
 </td>
{{--max temp --}}
<td> 
<div class="form-floating">
 <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" value="{{ $afternoontablevalues['min_temp'] }}" >
 <label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
           {{-- WIND --}}
           <td>
               <div class="form-floating">
                   <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" value="{{ $afternoontablevalues['wind'] }}">
                   <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                 </div>
           </td>
           {{-- Chance of  Occurring --}}
           <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                <option value="{{ $afternoontablevalues['rain_chance'] }}">{{ $afternoontablevalues['rain_chance'] }}</option>
                   <option value="null">Select Chance of  Occurring</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>

                 </select>
           </td>
           {{-- humidity 0% - 100%--}}
           <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                <option value="{{ $afternoontablevalues['humidity'] }}">{{ $afternoontablevalues['humidity'] }}</option>
                   <option value="null">Select Humidity</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>

                 </select>
           </td>
            
         </tr>

        
  
            @endif

            @endforeach       


  
            @else
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
{{--min  TEMPERATURE --}}
<td>
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" >
<label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
</div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" >
<label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
{{-- WIND --}}
<td>
   <div class="form-floating">
       <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" >
       <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
     </div>
</td>
{{-- Chance of  Occurring --}}
<td>
   <select class="form-select form-select-sm required" aria-label="Small select">
       <option value="null">Select Chance of  Occurring</option>
       <option value="0% - 10%">0% - 10%</option>
       <option value="10% - 20%">10% - 20%</option>
        <option value="20% - 30%">20% - 30%</option>
       <option value="30% - 40%">30% - 40%</option>
       <option value="40% - 50%">40% - 50%</option>
       <option value="50% - 60%">50% - 60%</option>
       <option value="60% - 70%">60% - 70%</option>
       <option value="70% - 80%%">70% - 80%</option>
       <option value="80% - 90%">80% - 90%</option>
       <option value="90% - 100%">90% - 100%</option>

     </select>
</td>
{{-- humidity 0% - 100%--}}
<td>
   <select class="form-select form-select-sm required" aria-label="Small select">
       <option value="null">Select Humidity</option>
       <option value="0% - 10%">0% - 10%</option>
       <option value="10% - 20%">10% - 20%</option>
        <option value="20% - 30%">20% - 30%</option>
       <option value="30% - 40%">30% - 40%</option>
       <option value="40% - 50%">40% - 50%</option>
       <option value="50% - 60%">50% - 60%</option>
       <option value="60% - 70%">60% - 70%</option>
       <option value="70% - 80%%">70% - 80%</option>
       <option value="80% - 90%">80% - 90%</option>
       <option value="90% - 100%">90% - 100%</option>

     </select>
</td>

</tr>
            @endif

          
          @endforeach 
          @else
          <tr> <td>No dristricts found</td> </tr>
          @endif
     
        </tbody>
      </table>
    </div>

    <br>

    
      {{-- evening  table --}}
      <div class="table-responsive my-2">
        <table class="table table-bordered text-center">
            {{-- time of day --}}
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th colspan="7">
                    Evening
                    <div class="row">
                    <div class="col-6">
                        <label for="datetableEvening" class="form-label">Set Date</label>
                        <input type="date" class="form-control required" id="datetableEvening" value="{{ !empty($genEvening)  ? $genEvening->date : '' }}">
                      </div> 
                      <div class="col-6">
                        <label for="itdtableEvening" class="form-label">Set ITD Position</label>
                        <input type="number" class="form-control required" id="itdtableEvening" placeholder="e.g: 1" value="{{ !empty($genEvening)  ? $genEvening->itd : '' }}">
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
                <th> Wind (m/s) <small>- E.g; 12SE</small></th>
                <th>Chance of  Occurring</th>
                <th>Humidity</th> 
                </tr>
               {{-- end of sub titles --}}
            </thead>
    
            <tbody>
                {{-- 1st row  --}}
                 @if (!empty($districts))
                @foreach ($districts as $district)  
                @if (!empty($eveningtablevalue))
                @if (!empty($missingeveningcities))
                @foreach ($missingeveningcities as $missingeveningcitie)
                @if ($district->districtname == $missingeveningcitie)
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
                   {{--min  TEMPERATURE --}}
          <td>
          <div class="form-floating">
          <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}" >
          <label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
          </div>
          </td>
          {{--max temp --}}
          <td> 
          <div class="form-floating">
          <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}" >
          <label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
          </div>
          </td>
              {{-- WIND --}}
              <td>
                  <div class="form-floating">
                      <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}" >
                      <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                    </div>
              </td>
              {{-- Chance of  Occurring --}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                      <option value="null">Select Chance of  Occurring</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
          
                    </select>
              </td>
              {{-- humidity 0% - 100%--}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                      <option value="null">Select Humidity</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
          
                    </select>
              </td> 
          
            </tr>
                @endif
                @endforeach
@endif

         @foreach ($eveningtablevalue as $eveningtablevalues)
       
 
                @if ($district->districtname == $eveningtablevalues['districts'])
                 
                <tr class="evening" districtnam="{{ $district->districtname }}"> 
                  <td>{{ $district->districtname }}</td> 
              <td>
                  {{-- weather --}}
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['weather'] }}"> {{ $eveningtablevalues['weather'] }} </option>
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
        <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}"  value="{{ $eveningtablevalues['min_temp'] }}" >
        <label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
      </div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}"  value="{{ $eveningtablevalues['max_temp'] }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
              {{-- WIND --}}
              <td>
                  <div class="form-floating">
                      <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}"  value="{{ $eveningtablevalues['wind'] }}">
                      <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                    </div>
              </td>
              {{-- Chance of  Occurring --}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['rain_chance'] }}"> {{ $eveningtablevalues['rain_chance'] }} </option>
                      <option value="null">Select Chance of  Occurring</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
  
                    </select>
              </td>
              {{-- humidity 0% - 100%--}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['humidity'] }}"> {{ $eveningtablevalues['humidity'] }} </option>
                      <option value="null">Select Humidity</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
  
                    </select>
              </td> 
   
            </tr>

   
                @endif
      
                
            @endforeach 

                @else
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
         {{--min  TEMPERATURE --}}
<td>
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
</div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
    {{-- WIND --}}
    <td>
        <div class="form-floating">
            <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}" >
            <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
          </div>
    </td>
    {{-- Chance of  Occurring --}}
    <td>
        <select class="form-select form-select-sm required" aria-label="Small select">
            <option value="null">Select Chance of  Occurring</option>
            <option value="0% - 10%">0% - 10%</option>
            <option value="10% - 20%">10% - 20%</option>
             <option value="20% - 30%">20% - 30%</option>
            <option value="30% - 40%">30% - 40%</option>
            <option value="40% - 50%">40% - 50%</option>
            <option value="50% - 60%">50% - 60%</option>
            <option value="60% - 70%">60% - 70%</option>
            <option value="70% - 80%%">70% - 80%</option>
            <option value="80% - 90%">80% - 90%</option>
            <option value="90% - 100%">90% - 100%</option>

          </select>
    </td>
    {{-- humidity 0% - 100%--}}
    <td>
        <select class="form-select form-select-sm required" aria-label="Small select">
            <option value="null">Select Humidity</option>
            <option value="0% - 10%">0% - 10%</option>
            <option value="10% - 20%">10% - 20%</option>
             <option value="20% - 30%">20% - 30%</option>
            <option value="30% - 40%">30% - 40%</option>
            <option value="40% - 50%">40% - 50%</option>
            <option value="50% - 60%">50% - 60%</option>
            <option value="60% - 70%">60% - 70%</option>
            <option value="70% - 80%%">70% - 80%</option>
            <option value="80% - 90%">80% - 90%</option>
            <option value="90% - 100%">90% - 100%</option>

          </select>
    </td> 

  </tr>

    @endif

                 
  @endforeach 
@else
<tr> <td>No dristricts found</td> </tr>
@endif
            </tbody>
          </table>
        </div>

<br>
 {{-- morning  table --}}
 <div class="table-responsive">
  <table class="table table-bordered text-center">
      {{-- time of day --}}
      <thead class="thead-dark">
        <tr>
          <th></th>
          <th colspan="7">
              Morning
              <div class="row">
              <div class="col-6">
                  <label for="datetableMorning" class="form-label">Set Date</label>
                  <input type="date" class="form-control required" id="datetableMorning" value="{{ !empty($genMorning)  ? $genMorning->date : '' }}">
                </div>
                <div class="col-6">
                  <label for="itdtableMorning" class="form-label">Set ITD Position</label>
                  <input type="number" class="form-control required" id="itdtableMorning" placeholder="e.g: 1" value="{{ !empty($genMorning)  ? $genMorning->itd : '' }}">
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
          <th>Min Temp °C</th>
          <th>Max Temp °C</th>
          <th> Wind (m/s) <small>- E.g; 12SE</small></th>
          <th>Chance of  Occurring</th>
          <th>Humidity</th>
         
           </tr>
         {{-- end of sub titles --}}
      </thead>

      <tbody>
       
          {{-- 1st row  --}}
          @if (!empty($districts))
          @foreach ($districts as $district) 
          @if (!empty($morningtablevalue))
          @if (!empty($missingmorningcities))
          @foreach ($missingmorningcities as $missingmorningcitie)
          @if ($district->districtname == $missingmorningcitie)
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
                     {{-- min TEMPERATURE --}}
                     <td>
                         <div class="form-floating">
                             <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" >
                             <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                           </div>
                     </td>
                      {{--max temp --}}
                     <td> 
                       <div class="form-floating">
                         <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" >
                         <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                       </div>
                     </td>
                     {{-- WIND --}}
                     <td>
                         <div class="form-floating">
                             <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" >
                             <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                           </div>
                     </td>
                     {{-- Chance of  Occurring --}}
                     <td>
                         <select class="form-select form-select-sm required" aria-label="Small select">
                             <option value="null">Select Chance of  Occurring</option>
         
                             <option value="0% - 10%">0% - 10%</option>
                             <option value="10% - 20%">10% - 20%</option>
                              <option value="20% - 30%">20% - 30%</option>
                             <option value="30% - 40%">30% - 40%</option>
                             <option value="40% - 50%">40% - 50%</option>
                             <option value="50% - 60%">50% - 60%</option>
                             <option value="60% - 70%">60% - 70%</option>
                             <option value="70% - 80%%">70% - 80%</option>
                             <option value="80% - 90%">80% - 90%</option>
                             <option value="90% - 100%">90% - 100%</option>
         
                           </select>
                     </td>
                     {{-- humidity 0% - 100%--}}
                     <td>
                         <select class="form-select form-select-sm required" aria-label="Small select">
                             <option value="null">Select Humidity</option>
                             <option value="0% - 10%">0% - 10%</option>
                             <option value="10% - 20%">10% - 20%</option>
                             <option value="20% - 30%">20% - 30%</option>
                             <option value="30% - 40%">30% - 40%</option>
                             <option value="40% - 50%">40% - 50%</option>
                             <option value="50% - 60%">50% - 60%</option>
                             <option value="60% - 70%">60% - 70%</option>
                             <option value="70% - 80%%">70% - 80%</option>
                             <option value="80% - 90%">80% - 90%</option>
                             <option value="90% - 100%">90% - 100%</option>
         
                           </select>
                     </td>
                   </tr>
          @endif
          @endforeach
         @endif
          @foreach ($morningtablevalue as $morningtablevalues)
           
              @if ($district->districtname == $morningtablevalues['districts'])
              <tr class="morning" districtnam="{{ $district->districtname }}" >
              <td>{{ $district->districtname }}</td> 
                        {{-- morning --}}
                        <td>
                            {{-- weather --}}
                            <select class="form-select form-select-sm weatherdetail required" aria-label="Small select">
                              <option value="{{ $morningtablevalues['weather']  }}">{{ $morningtablevalues['weather']  }} </option>
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
                                <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" value="{{ $morningtablevalues['min_temp']}}" >
                                <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                              </div>
                        </td>
                         {{--max temp --}}
                        <td> 
                          <div class="form-floating">
                            <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" value="{{ $morningtablevalues['max_temp']}}">
                            <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                          </div>
                        </td>
                        {{-- WIND --}}
                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" value="{{ $morningtablevalues['wind']}}" >
                                <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                              </div>
                        </td>
                        {{-- Chance of  Occurring --}}
                        <td>
                            <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="{{ $morningtablevalues['rain_chance']  }}">{{ $morningtablevalues['rain_chance']  }} </option>
                                <option value="null">Select Chance of  Occurring</option>
                                <option value="0% - 10%">0% - 10%</option>
                                <option value="10% - 20%">10% - 20%</option>
                                 <option value="20% - 30%">20% - 30%</option>
                                <option value="30% - 40%">30% - 40%</option>
                                <option value="40% - 50%">40% - 50%</option>
                                <option value="50% - 60%">50% - 60%</option>
                                <option value="60% - 70%">60% - 70%</option>
                                <option value="70% - 80%%">70% - 80%</option>
                                <option value="80% - 90%">80% - 90%</option>
                                <option value="90% - 100%">90% - 100%</option>
            
                              </select>
                        </td>
                        {{-- humidity 0% - 100%--}}
                        <td>
                            <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="{{ $morningtablevalues['humidity']  }}">{{ $morningtablevalues['humidity']  }} </option>
                                <option value="null">Select Humidity</option>
                                <option value="0% - 10%">0% - 10%</option>
                                <option value="10% - 20%">10% - 20%</option>
                                <option value="20% - 30%">20% - 30%</option>
                                <option value="30% - 40%">30% - 40%</option>
                                <option value="40% - 50%">40% - 50%</option>
                                <option value="50% - 60%">50% - 60%</option>
                                <option value="60% - 70%">60% - 70%</option>
                                <option value="70% - 80%%">70% - 80%</option>
                                <option value="80% - 90%">80% - 90%</option>
                                <option value="90% - 100%">90% - 100%</option>
            
                              </select>
                        </td>
                      </tr>

              @endif


     
              @endforeach

          @else 
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
                      {{-- min TEMPERATURE --}}
                      <td>
                          <div class="form-floating">
                              <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" >
                              <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                            </div>
                      </td>
                       {{--max temp --}}
                      <td> 
                        <div class="form-floating">
                          <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" >
                          <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                        </div>
                      </td>
                      {{-- WIND --}}
                      <td>
                          <div class="form-floating">
                              <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" >
                              <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                            </div>
                      </td>
                      {{-- Chance of  Occurring --}}
                      <td>
                          <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="null">Select Chance of  Occurring</option>
          
                              <option value="0% - 10%">0% - 10%</option>
                              <option value="10% - 20%">10% - 20%</option>
                               <option value="20% - 30%">20% - 30%</option>
                              <option value="30% - 40%">30% - 40%</option>
                              <option value="40% - 50%">40% - 50%</option>
                              <option value="50% - 60%">50% - 60%</option>
                              <option value="60% - 70%">60% - 70%</option>
                              <option value="70% - 80%%">70% - 80%</option>
                              <option value="80% - 90%">80% - 90%</option>
                              <option value="90% - 100%">90% - 100%</option>
          
                            </select>
                      </td>
                      {{-- humidity 0% - 100%--}}
                      <td>
                          <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="null">Select Humidity</option>
                              <option value="0% - 10%">0% - 10%</option>
                              <option value="10% - 20%">10% - 20%</option>
                              <option value="20% - 30%">20% - 30%</option>
                              <option value="30% - 40%">30% - 40%</option>
                              <option value="40% - 50%">40% - 50%</option>
                              <option value="50% - 60%">50% - 60%</option>
                              <option value="60% - 70%">60% - 70%</option>
                              <option value="70% - 80%%">70% - 80%</option>
                              <option value="80% - 90%">80% - 90%</option>
                              <option value="90% - 100%">90% - 100%</option>
          
                            </select>
                      </td>
                    </tr>

          @endif

      
        @endforeach 
        @else
        <tr> <td>No dristricts found</td> </tr>
        @endif
      </tbody>
    </table>
  </div>

<br>


    @elseif ($forecasttype == 'Evening')
   

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
                    <div class="col-6">
                        <label for="datetableEvening" class="form-label">Set Date</label>
                        <input type="date" class="form-control required" id="datetableEvening" value="{{ !empty($genEvening)  ? $genEvening->date : '' }}">
                      </div> 
                      <div class="col-6">
                        <label for="itdtableEvening" class="form-label">Set ITD Position</label>
                        <input type="number" class="form-control required" id="itdtableEvening" placeholder="e.g: 1" value="{{ !empty($genEvening)  ? $genEvening->itd : '' }}">
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
                <th> Wind (m/s) <small>- E.g; 12SE</small></th>
                <th>Chance of  Occurring</th>
                <th>Humidity</th> 
                </tr>
               {{-- end of sub titles --}}
            </thead>
    
            <tbody>
                {{-- 1st row  --}}
                 @if (!empty($districts))
                @foreach ($districts as $district)  
                @if (!empty($eveningtablevalue))
                @if (!empty($missingeveningcities))
                @foreach ($missingeveningcities as $missingeveningcitie)
                @if ($district->districtname == $missingeveningcitie)
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
                   {{--min  TEMPERATURE --}}
          <td>
          <div class="form-floating">
          <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}" >
          <label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
          </div>
          </td>
          {{--max temp --}}
          <td> 
          <div class="form-floating">
          <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}" >
          <label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
          </div>
          </td>
              {{-- WIND --}}
              <td>
                  <div class="form-floating">
                      <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}" >
                      <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                    </div>
              </td>
              {{-- Chance of  Occurring --}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                      <option value="null">Select Chance of  Occurring</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
          
                    </select>
              </td>
              {{-- humidity 0% - 100%--}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                      <option value="null">Select Humidity</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
          
                    </select>
              </td> 
          
            </tr>
                @endif
                @endforeach
@endif

                @foreach ($eveningtablevalue as $eveningtablevalues)
       
                @if ($district->districtname == $eveningtablevalues['districts'])
                 
                <tr class="evening" districtnam="{{ $district->districtname }}"> 
                  <td>{{ $district->districtname }}</td> 
              <td>
                  {{-- weather --}}
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['weather'] }}"> {{ $eveningtablevalues['weather'] }} </option>
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
        <input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}"  value="{{ $eveningtablevalues['min_temp'] }}" >
        <label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
      </div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}"  value="{{ $eveningtablevalues['max_temp'] }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
              {{-- WIND --}}
              <td>
                  <div class="form-floating">
                      <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}"  value="{{ $eveningtablevalues['wind'] }}">
                      <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                    </div>
              </td>
              {{-- Chance of  Occurring --}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['rain_chance'] }}"> {{ $eveningtablevalues['rain_chance'] }} </option>
                      <option value="null">Select Chance of  Occurring</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
  
                    </select>
              </td>
              {{-- humidity 0% - 100%--}}
              <td>
                  <select class="form-select form-select-sm required" aria-label="Small select">
                    <option value="{{ $eveningtablevalues['humidity'] }}"> {{ $eveningtablevalues['humidity'] }} </option>
                      <option value="null">Select Humidity</option>
                      <option value="0% - 10%">0% - 10%</option>
                      <option value="10% - 20%">10% - 20%</option>
                       <option value="20% - 30%">20% - 30%</option>
                      <option value="30% - 40%">30% - 40%</option>
                      <option value="40% - 50%">40% - 50%</option>
                      <option value="50% - 60%">50% - 60%</option>
                      <option value="60% - 70%">60% - 70%</option>
                      <option value="70% - 80%%">70% - 80%</option>
                      <option value="80% - 90%">80% - 90%</option>
                      <option value="90% - 100%">90% - 100%</option>
  
                    </select>
              </td> 
   
            </tr>

 
                @endif
      
                @endforeach 


                @else
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
         {{--min  TEMPERATURE --}}
<td>
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
</div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}" >
<label for="{{ $district->districtname }}EfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
    {{-- WIND --}}
    <td>
        <div class="form-floating">
            <input type="text" class="form-control required" id="eveningfloatingInputwind{{ $district->id }}" >
            <label for="eveningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
          </div>
    </td>
    {{-- Chance of  Occurring --}}
    <td>
        <select class="form-select form-select-sm required" aria-label="Small select">
            <option value="null">Select Chance of  Occurring</option>
            <option value="0% - 10%">0% - 10%</option>
            <option value="10% - 20%">10% - 20%</option>
             <option value="20% - 30%">20% - 30%</option>
            <option value="30% - 40%">30% - 40%</option>
            <option value="40% - 50%">40% - 50%</option>
            <option value="50% - 60%">50% - 60%</option>
            <option value="60% - 70%">60% - 70%</option>
            <option value="70% - 80%%">70% - 80%</option>
            <option value="80% - 90%">80% - 90%</option>
            <option value="90% - 100%">90% - 100%</option>

          </select>
    </td>
    {{-- humidity 0% - 100%--}}
    <td>
        <select class="form-select form-select-sm required" aria-label="Small select">
            <option value="null">Select Humidity</option>
            <option value="0% - 10%">0% - 10%</option>
            <option value="10% - 20%">10% - 20%</option>
             <option value="20% - 30%">20% - 30%</option>
            <option value="30% - 40%">30% - 40%</option>
            <option value="40% - 50%">40% - 50%</option>
            <option value="50% - 60%">50% - 60%</option>
            <option value="60% - 70%">60% - 70%</option>
            <option value="70% - 80%%">70% - 80%</option>
            <option value="80% - 90%">80% - 90%</option>
            <option value="90% - 100%">90% - 100%</option>

          </select>
    </td> 

  </tr>

    @endif

                 
  @endforeach 
@else
<tr> <td>No dristricts found</td> </tr>
@endif
            </tbody>
          </table>
        </div>

 {{-- morning  table --}}
 <div class="table-responsive">
  <table class="table table-bordered text-center">
      {{-- time of day --}}
      <thead class="thead-dark">
        <tr>
          <th></th>
          <th colspan="7">
              Morning
              <div class="row">
              <div class="col-6">
                  <label for="datetableMorning" class="form-label">Set Date</label>
                  <input type="date" class="form-control required" id="datetableMorning" value="{{ !empty($genMorning)  ? $genMorning->date : '' }}">
                </div>
                <div class="col-6">
                  <label for="itdtableMorning" class="form-label">Set ITD Position</label>
                  <input type="number" class="form-control required" id="itdtableMorning" placeholder="e.g: 1" value="{{ !empty($genMorning)  ? $genMorning->itd : '' }}">
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
          <th>Min Temp °C</th>
          <th>Max Temp °C</th>
          <th> Wind (m/s) <small>- E.g; 12SE</small></th>
          <th>Chance of  Occurring</th>
          <th>Humidity</th>
         
           </tr>
         {{-- end of sub titles --}}
      </thead>

      <tbody>
       
          {{-- 1st row  --}}
          @if (!empty($districts))
          @foreach ($districts as $district) 
          @if (!empty($morningtablevalue))
          @if (!empty($missingmorningcities))
          @foreach ($missingmorningcities as $missingmorningcitie)
          @if ($district->districtname == $missingmorningcitie)
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
                     {{-- min TEMPERATURE --}}
                     <td>
                         <div class="form-floating">
                             <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" >
                             <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                           </div>
                     </td>
                      {{--max temp --}}
                     <td> 
                       <div class="form-floating">
                         <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" >
                         <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                       </div>
                     </td>
                     {{-- WIND --}}
                     <td>
                         <div class="form-floating">
                             <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" >
                             <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                           </div>
                     </td>
                     {{-- Chance of  Occurring --}}
                     <td>
                         <select class="form-select form-select-sm required" aria-label="Small select">
                             <option value="null">Select Chance of  Occurring</option>
         
                             <option value="0% - 10%">0% - 10%</option>
                             <option value="10% - 20%">10% - 20%</option>
                              <option value="20% - 30%">20% - 30%</option>
                             <option value="30% - 40%">30% - 40%</option>
                             <option value="40% - 50%">40% - 50%</option>
                             <option value="50% - 60%">50% - 60%</option>
                             <option value="60% - 70%">60% - 70%</option>
                             <option value="70% - 80%%">70% - 80%</option>
                             <option value="80% - 90%">80% - 90%</option>
                             <option value="90% - 100%">90% - 100%</option>
         
                           </select>
                     </td>
                     {{-- humidity 0% - 100%--}}
                     <td>
                         <select class="form-select form-select-sm required" aria-label="Small select">
                             <option value="null">Select Humidity</option>
                             <option value="0% - 10%">0% - 10%</option>
                             <option value="10% - 20%">10% - 20%</option>
                             <option value="20% - 30%">20% - 30%</option>
                             <option value="30% - 40%">30% - 40%</option>
                             <option value="40% - 50%">40% - 50%</option>
                             <option value="50% - 60%">50% - 60%</option>
                             <option value="60% - 70%">60% - 70%</option>
                             <option value="70% - 80%%">70% - 80%</option>
                             <option value="80% - 90%">80% - 90%</option>
                             <option value="90% - 100%">90% - 100%</option>
         
                           </select>
                     </td>
                   </tr>
          @endif
          @endforeach
         @endif

          @foreach ($morningtablevalue as $morningtablevalues)
               
             @if ($district->districtname == $morningtablevalues['districts'])
              <tr class="morning" districtnam="{{ $district->districtname }}" >
              <td>{{ $district->districtname }}</td> 
                        {{-- morning --}}
                        <td>
                            {{-- weather --}}
                            <select class="form-select form-select-sm weatherdetail required" aria-label="Small select">
                              <option value="{{ $morningtablevalues['weather']  }}">{{ $morningtablevalues['weather']  }} </option>
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
                                <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" value="{{ $morningtablevalues['min_temp']}}" >
                                <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                              </div>
                        </td>
                         {{--max temp --}}
                        <td> 
                          <div class="form-floating">
                            <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" value="{{ $morningtablevalues['max_temp']}}">
                            <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                          </div>
                        </td>
                        {{-- WIND --}}
                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" value="{{ $morningtablevalues['wind']}}" >
                                <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                              </div>
                        </td>
                        {{-- Chance of  Occurring --}}
                        <td>
                            <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="{{ $morningtablevalues['rain_chance']  }}">{{ $morningtablevalues['rain_chance']  }} </option>
                                <option value="null">Select Chance of  Occurring</option>
                                <option value="0% - 10%">0% - 10%</option>
                                <option value="10% - 20%">10% - 20%</option>
                                 <option value="20% - 30%">20% - 30%</option>
                                <option value="30% - 40%">30% - 40%</option>
                                <option value="40% - 50%">40% - 50%</option>
                                <option value="50% - 60%">50% - 60%</option>
                                <option value="60% - 70%">60% - 70%</option>
                                <option value="70% - 80%%">70% - 80%</option>
                                <option value="80% - 90%">80% - 90%</option>
                                <option value="90% - 100%">90% - 100%</option>
            
                              </select>
                        </td>
                        {{-- humidity 0% - 100%--}}
                        <td>
                            <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="{{ $morningtablevalues['humidity']  }}">{{ $morningtablevalues['humidity']  }} </option>
                                <option value="null">Select Humidity</option>
                                <option value="0% - 10%">0% - 10%</option>
                                <option value="10% - 20%">10% - 20%</option>
                                <option value="20% - 30%">20% - 30%</option>
                                <option value="30% - 40%">30% - 40%</option>
                                <option value="40% - 50%">40% - 50%</option>
                                <option value="50% - 60%">50% - 60%</option>
                                <option value="60% - 70%">60% - 70%</option>
                                <option value="70% - 80%%">70% - 80%</option>
                                <option value="80% - 90%">80% - 90%</option>
                                <option value="90% - 100%">90% - 100%</option>
            
                              </select>
                        </td>
                      </tr>
 
             
              @endif

              @endforeach

          @else 
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
                      {{-- min TEMPERATURE --}}
                      <td>
                          <div class="form-floating">
                              <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}" >
                              <label for="{{ $district->districtname }}MfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
                            </div>
                      </td>
                       {{--max temp --}}
                      <td> 
                        <div class="form-floating">
                          <input type="number" class="form-control required" id="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}" >
                          <label for="{{ $district->districtname }}MfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
                        </div>
                      </td>
                      {{-- WIND --}}
                      <td>
                          <div class="form-floating">
                              <input type="text" class="form-control required" id="morningfloatingInputwind{{ $district->id }}" >
                              <label for="morningfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                            </div>
                      </td>
                      {{-- Chance of  Occurring --}}
                      <td>
                          <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="null">Select Chance of  Occurring</option>
          
                              <option value="0% - 10%">0% - 10%</option>
                              <option value="10% - 20%">10% - 20%</option>
                               <option value="20% - 30%">20% - 30%</option>
                              <option value="30% - 40%">30% - 40%</option>
                              <option value="40% - 50%">40% - 50%</option>
                              <option value="50% - 60%">50% - 60%</option>
                              <option value="60% - 70%">60% - 70%</option>
                              <option value="70% - 80%%">70% - 80%</option>
                              <option value="80% - 90%">80% - 90%</option>
                              <option value="90% - 100%">90% - 100%</option>
          
                            </select>
                      </td>
                      {{-- humidity 0% - 100%--}}
                      <td>
                          <select class="form-select form-select-sm required" aria-label="Small select">
                              <option value="null">Select Humidity</option>
                              <option value="0% - 10%">0% - 10%</option>
                              <option value="10% - 20%">10% - 20%</option>
                              <option value="20% - 30%">20% - 30%</option>
                              <option value="30% - 40%">30% - 40%</option>
                              <option value="40% - 50%">40% - 50%</option>
                              <option value="50% - 60%">50% - 60%</option>
                              <option value="60% - 70%">60% - 70%</option>
                              <option value="70% - 80%%">70% - 80%</option>
                              <option value="80% - 90%">80% - 90%</option>
                              <option value="90% - 100%">90% - 100%</option>
          
                            </select>
                      </td>
                    </tr>

          @endif

      
        @endforeach 
        @else
        <tr> <td>No dristricts found</td> </tr>
        @endif
      </tbody>
    </table>
  </div>

<br>



<br>
  {{-- afternoon  table --}}
  <div class="table-responsive mt-2">
    <table class="table table-bordered text-center">
        {{-- time of day --}}
        <thead class="thead-dark">
          <tr>
            <th></th>
            <th colspan="7">
                Afternoon
                <div class="row">
                <div class="col-6">
                    <label for="datetableAfternoon" class="form-label">Set Date</label>
                    <input type="date" class="form-control required" id="datetableAfternoon" value="{{ !empty($genAfternoon)  ? $genAfternoon->date : '' }}">
                  </div> 
                  <div class="col-6">
                    <label for="itdtableAfternoon" class="form-label">Set ITD Position</label>
                    <input type="number" class="form-control required" id="itdtableAfternoon" placeholder="e.g: 1" value="{{ !empty($genAfternoon)  ? $genAfternoon->itd : '' }}">
                  </div>
                  {{-- <div class="col-4">
                    <label for="prestableAfternoon" class="form-label">Set Pressure</label>
                    <input type="number" class="form-control required" id="prestableAfternoon" placeholder="e.g: 150">
                  </div> --}}
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
            <th>Min Temp °C</th>
            <th>Max Temp °C</th>
            <th>Wind (m/s) <small>- E.g; 12SE</small> </th>
            <th>Chance of  Occurring</th>
            <th>Humidity</th> 
             
             </tr>
           {{-- end of sub titles --}}
        </thead>

        <tbody>
            {{-- 1st row  --}}
             @if (!empty($districts))
            @foreach ($districts as $district) 
            @if (!empty($afternoontablevalue))
            @if (!empty($missingafternooncities))
            @foreach ($missingafternooncities as $missingafternooncitie)
            @if ($district->districtname == $missingafternooncitie)

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
            {{--min  TEMPERATURE --}}
            <td>
            <div class="form-floating">
            <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" >
            <label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
            </div>
            </td>
            {{--max temp --}}
            <td> 
            <div class="form-floating">
            <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" >
            <label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
            </div>
            </td>
            {{-- WIND --}}
            <td>
               <div class="form-floating">
                   <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" >
                   <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                 </div>
            </td>
            {{-- Chance of  Occurring --}}
            <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                   <option value="null">Select Chance of  Occurring</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>
            
                 </select>
            </td>
            {{-- humidity 0% - 100%--}}
            <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                   <option value="null">Select Humidity</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>
            
                 </select>
            </td>
            
            </tr>
            @endif

            @endforeach
@endif


         
            @foreach ($afternoontablevalue as $afternoontablevalues)
          
            @if ($district->districtname == $afternoontablevalues['districts'])
             
              <tr class="afternoon" districtnam="{{ $district->districtname }}">
           
              <td>{{ $district->districtname }}</td> 
           {{-- Afternoon --}}
           <td>
               {{-- weather --}}
               <select class="form-select form-select-sm required" aria-label="Small select">
                 <option value="{{ $afternoontablevalues['weather'] }}">{{ $afternoontablevalues['weather'] }}</option> 
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
         <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" value="{{ $afternoontablevalues['min_temp'] }}" >
         <label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
       </div>
 </td>
{{--max temp --}}
<td> 
<div class="form-floating">
 <input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" value="{{ $afternoontablevalues['min_temp'] }}" >
 <label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
           {{-- WIND --}}
           <td>
               <div class="form-floating">
                   <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" value="{{ $afternoontablevalues['wind'] }}">
                   <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
                 </div>
           </td>
           {{-- Chance of  Occurring --}}
           <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                <option value="{{ $afternoontablevalues['rain_chance'] }}">{{ $afternoontablevalues['rain_chance'] }}</option>
                   <option value="null">Select Chance of  Occurring</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>

                 </select>
           </td>
           {{-- humidity 0% - 100%--}}
           <td>
               <select class="form-select form-select-sm required" aria-label="Small select">
                <option value="{{ $afternoontablevalues['humidity'] }}">{{ $afternoontablevalues['humidity'] }}</option>
                   <option value="null">Select Humidity</option>
                   <option value="0% - 10%">0% - 10%</option>
                   <option value="10% - 20%">10% - 20%</option>
                    <option value="20% - 30%">20% - 30%</option>
                   <option value="30% - 40%">30% - 40%</option>
                   <option value="40% - 50%">40% - 50%</option>
                   <option value="50% - 60%">50% - 60%</option>
                   <option value="60% - 70%">60% - 70%</option>
                   <option value="70% - 80%%">70% - 80%</option>
                   <option value="80% - 90%">80% - 90%</option>
                   <option value="90% - 100%">90% - 100%</option>

                 </select>
           </td>
            
         </tr>

 
            @endif
  
            @endforeach    


            @else
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
{{--min  TEMPERATURE --}}
<td>
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}" >
<label for="{{ $district->districtname }}AfloatingInputtempmin{{ $district->id }}">Min Temperature</label>
</div>
</td>
{{--max temp --}}
<td> 
<div class="form-floating">
<input type="number" class="form-control required" id="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}" >
<label for="{{ $district->districtname }}AfloatingInputtempmax{{ $district->id }}">Max Temperature</label>
</div>
</td>
{{-- WIND --}}
<td>
   <div class="form-floating">
       <input type="text" class="form-control required" id="afternoonfloatingInputwind{{ $district->id }}" >
       <label for="afternoonfloatingInputwind{{ $district->id }}">Wind Dir & Speed</label>
     </div>
</td>
{{-- Chance of  Occurring --}}
<td>
   <select class="form-select form-select-sm required" aria-label="Small select">
       <option value="null">Select Chance of  Occurring</option>
       <option value="0% - 10%">0% - 10%</option>
       <option value="10% - 20%">10% - 20%</option>
        <option value="20% - 30%">20% - 30%</option>
       <option value="30% - 40%">30% - 40%</option>
       <option value="40% - 50%">40% - 50%</option>
       <option value="50% - 60%">50% - 60%</option>
       <option value="60% - 70%">60% - 70%</option>
       <option value="70% - 80%%">70% - 80%</option>
       <option value="80% - 90%">80% - 90%</option>
       <option value="90% - 100%">90% - 100%</option>

     </select>
</td>
{{-- humidity 0% - 100%--}}
<td>
   <select class="form-select form-select-sm required" aria-label="Small select">
       <option value="null">Select Humidity</option>
       <option value="0% - 10%">0% - 10%</option>
       <option value="10% - 20%">10% - 20%</option>
        <option value="20% - 30%">20% - 30%</option>
       <option value="30% - 40%">30% - 40%</option>
       <option value="40% - 50%">40% - 50%</option>
       <option value="50% - 60%">50% - 60%</option>
       <option value="60% - 70%">60% - 70%</option>
       <option value="70% - 80%%">70% - 80%</option>
       <option value="80% - 90%">80% - 90%</option>
       <option value="90% - 100%">90% - 100%</option>

     </select>
</td>

</tr>
            @endif

          
          @endforeach 
          @else
          <tr> <td>No dristricts found</td> </tr>
          @endif
     
        </tbody>
      </table>
    </div>

    <br>



        @endif

        <div class="container  my-2">

          <div class="row">
              <div class="d-flex justify-content-between bd-highlight my-2">
             <div></div>  
             <button type="button" class="btn btn-success text-white" id="nextBtn2ndpage">Save and Continue</button>
        </div>
          </div>
        </div>


   {{--end of table FORECAST TAB --}} 
</div>
{{-- MAP --}}
<div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
  


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
                      <input type="date" class="form-control requiredmapdate" id="dateInput1" value="{{ !empty($genMorning)  ? $genMorning->date : '' }}" >
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
              <div id="mapAdmin1"   style="width: 100%;
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
                  <input type="date" class="form-control requiredmapdate" id="dateInput1af" value="{{ !empty($genAfternoon)  ? $genAfternoon->date : '' }}">
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
          <input type="date" class="form-control requiredmapdate" id="dateInput1ev" value="{{ !empty($genEvening)  ? $genEvening->date : '' }}" >
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
   <br>
   <div class="container my-2">

    <div class="row">
        <div class="d-flex justify-content-between bd-highlight my-2">
       <div> </div>  
       <button type="button" class="btn btn-success text-white" id="nextBtn3rdpage">Save and Continue</button>
  </div>

    </div>
  </div>

<br>
   <div class="row">
    <div class="col-3">
      <div class="card text-white">
<img class="card-img-top" src="{{ asset('images/warning.png') }}"  style="height: 200px;" alt="Title">
</div>
</div>
<div class="col-9">
<div class="card text-white">
<img class="card-img-top" src="{{ asset('images/risk.png') }}" alt="Title">
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
       <button type="button" class="btn btn-success text-white" id="nextBtn4thpage">Save and Continue</button>
  </div>
    </div>
  </div>

    <div class="alert alert-warning alert-dismissible fade show p-2 m-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> Weather Summary Report</strong>  </div>

    <div class="form-floating my-3">
     
        <textarea class="form-control" placeholder="Write your weather here" id="floatingTextareaSummary" style="height: 150px"></textarea>
        <p id="characterCount">Characters remaining: 310</p>
        <label for="floatingTextareaSummary">Weather Summary</label>
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

</div> 
    </div>
  </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 @section('script')
 <script>
  const textarea = document.getElementById('floatingTextareaSummary');
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
