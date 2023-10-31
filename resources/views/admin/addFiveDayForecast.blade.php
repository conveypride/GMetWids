@extends('admin.adminApp')

@section('adminContent')


    <br>

    <div class="app-wrapper mt-5">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h4>Add A New 5-Day Forecast</h4>
                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="get-started-tab" data-bs-toggle="tab"
                        href="#get-started" role="tab" aria-controls="get-started" aria-selected="true">Getting
                        Started</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="tableForecast-tab" data-bs-toggle="tab"
                        href="#tableForecast" role="tab" aria-controls="tableForecast" aria-selected="false">Table</a>

                </nav>
                <div class="tab-content" id="orders-table-tab-content">
                    {{-- get Started  FORECAST TAB --}}
                    <div class="tab-pane fade show active" id="get-started" role="tabpanel"
                        aria-labelledby="get-started-tab">
                        <div class="alert alert-primary alert-dismissible fade show p-2 m-2" role="alert">
                            <h3 class="text-center"> <strong> Welcome</strong> </h3>
                        </div>

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
                    <div class="tab-pane fade" id="tableForecast" role="tabpanel" aria-labelledby="tableForecast-tab">

                        @foreach ($districts as $district)
                            <div class="alert alert-info" role="alert">
                                <h4> 5-Day Forecast <strong> {{ $district->districtname }} </strong> </h4>
                            </div>

                          <div class="table-responsive my-2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Day</th>
                                            <th scope="col">Weather Condition</th>
                                            <th scope="col">Min. Temp</th>
                                            <th scope="col">Max. Temperature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($next_five_days as $next_five_day)
                                          
                                     
                                        <tr class="eachrow">
                                            <input type="hidden" value="{{ $district->districtname }}">
                                            <th scope="row">
                                                {{-- date --}}
                                                <input type="date" class="form-control fiverequired" value="{{ $next_five_day }}">
                                            </th>
                                            <td>
                                                {{-- weather condition  --}}
                                                {{-- weather --}}
                                                <select class="form-select form-select-sm fiverequired"
                                                    aria-label="Small select">
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
                                                    <input type="number" class="form-control fiverequired">
                                                    <label>Temperature</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-floating">
                                                    <input type="number" class="form-control fiverequired">
                                                    <label>Temperature</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach


                                         
                                    </tbody>
                                </table>

                            </div>
                        @endforeach
                        {{-- ==================submit============================== --}}
                        <div class="my-3">
                            {{-- Summit /Publish Weather --}}
                            <button type="button" class="btn btn-primary text-white"
                                id="buttonpublish5Day">Publish-Forecast</button>
                            {{-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
      <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu overflow-scroll" style="max-width: 260px; max-height: 160px;">
      <li><a class="dropdown-item " id="publishForecast">Publish-Forecast</a></li>
      <li><a class="dropdown-item " id="publishForecast">Draft-Forecast</a></li>
       </ul>  --}}
                        </div>

                    </div>
                    {{-- end of table FORECAST TAB --}}
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
