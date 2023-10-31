@extends('admin.adminApp')

@section('adminContent')


    <br>

    <div class="app-wrapper mt-5">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h4>Edit 5-Day Forecast</h4>
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="get-started-tab" data-bs-toggle="tab"
                        href="#get-started" role="tab" aria-controls="get-started" aria-selected="true">Edit Table</a>
                 
                </nav>
                <div class="tab-content" id="orders-table-tab-content">
                  
                    @foreach ($fivedayforecasts as $fivedayforecast)
                    <div class="alert alert-info" role="alert">
                        <h4> 5-Day Forecast <strong> {{ $fivedayforecast[0]->district}} </strong> </h4>
                    </div>

                  <div class="table-responsive my-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Weather Condition</th>
                                    <th scope="col">Min. Temp</th>
                                    <th scope="col">Max. Temp</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($fivedayforecast as $fivedayforec)
                                  
                             
                                <tr class="eachrow">
                                    <form action="{{route('editfivedaysforecast')}}" method="post">
                                        @csrf
                                    <input name="district" type="hidden" value="{{ $fivedayforec->district }}">

                                    <input name="id" type="hidden" value="{{ $fivedayforec->id }}">
                                    <th scope="row">
                                        {{-- date --}}
                                        <input name="date" type="date" class="form-control fiverequired" value="{{ $fivedayforec->date }}">
                                    </th>
                                    <td>
                                        {{-- weather condition  --}}
                                        {{-- weather --}}
                                        <select name="weather" class="form-select form-select-sm fiverequired"
                                            aria-label="Small select">
                                            <option selected value="{{ $fivedayforec->weather }}"> {{  $fivedayforec->weather}} </option>
                                            <option value="null">Select Weather</option>
                                            <option value="-TSRA">SLIGHT TSRA(-)</option>
                                            <option value="TSRA">MODERATE TSRA</option>
                                            <option value="+TSRA">HEAVY TSRA(+)</option>
                                            <option value="-RAINDAY">SLIGHT RAIN(DAY)</option>
                                            <option value="-RAINNIGHT">SLIGHT RAIN(NIGHT)</option>
                                            <option value="RAINDAY">MODERATE RAIN(DAY)</option>
                                            <option value="RAINNIGHT">MODERATE RAIN(NIGHT)</option>
                                            <option value="+RAINDAY">HEAVY RAIN(DAY)</option>
                                            <option value="+RAINNIGHT">HEAVY RAIN(NIGHT)</option>
                                            <option value="-DRIZZLEDAY">SLIGHT DRIZZLE(DAY)</option>
                                            <option value="-DRIZZLENIGHT">SLIGHT DRIZZLE(NIGHT)</option>
                                            <option value="DRIZZLEDAY">MODERATE DRIZZLE(DAY)</option>
                                            <option value="DRIZZLENIGHT">MODERATE DRIZZLE(NIGHT)</option>
                                            <option value="+DRIZZLEDAY">HEAVY DRIZZLE(DAY)</option>
                                            <option value="+DRIZZLENIGHT">HEAVY DRIZZLE(NIGHT)</option>
                                            <option value="HAIL">HAIL</option>
                                            <option value="MIST">MIST</option>
                                            <option value="FOG">FOG</option>
                                            <option value="HAZE">HAZE</option>
                                            <option value="SUNNY">SUNNY</option>
                                            <option value="SUNNY BREAKS">SUNNY BREAKS</option>
                                            <option value="SUNNY INTERVALS">SUNNY INTERVALS</option>
                                            <option value="FEW CLOUDS">FEW CLOUDS</option>
                                            <option value="PARTLY CLOUDY(DAY)">PARTLY CLOUDY(DAY)</option>
                                            <option value="PARTLY CLOUDY(NIGHT)">PARTLY CLOUDY(NIGHT)</option>
                                            <option value="CLOUDY">CLOUDY</option>
                                            <option value="CLEAR NIGHT">CLEAR NIGHT</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input name="mintemp" type="number" class="form-control fiverequired" value="{{ $fivedayforec->min_temp }}">
                                            <label>Temperature</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input name="maxtemp"  type="number" class="form-control fiverequired" value="{{ $fivedayforec->max_temp }}">
                                            <label>Temperature</label>
                                        </div>
                                    </td>
                                    <td> 
                                        <button type="submit" class="btn btn-primary text-white">Save</button>
                                      </td>



                                </form>
                                </tr>
                                @endforeach


                                 
                            </tbody>
                        </table>

                    </div>
                @endforeach
                {{-- ==================submit============================== --}}
       
          
           
                <div class="my-3">
                     @if ($status1 == 'Pending')
                    {{-- Approve Weather --}}
                    @if (Auth::user()->usertype == 1 || Auth::user()->usertype == 0)
              
           <form action="{{route('approvefivedaysforecast', ['id' => $idd ])}}" method="post">
                @csrf
                    <button type="submit" style="float: right" class="btn btn-primary text-white"
                        >Approve-Forecast</button>
             </form>
            
               @endif

 @elseif ($status1 == 'Approved')
           <div class="alert alert-success" role="alert">
            <h5 class="text-center">Forecast Status: <strong>Approved</strong></h5> 
           </div>
           
              @endif
                </div>


                    
                </div>
            </div>
        </div><!--//container-fluid-->
    </div><!--//app-content-->
    @include('admin.footer')

    </div><!--//app-wrapper-->
@section('fivedayForecastJs')
    <script src="{{ asset('assets/js/addfivedayForecast.js') }}"></script>
@endsection

@endsection
