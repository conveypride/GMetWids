@extends('admin.adminApp')

@section('adminContent')
@section('css')
<style>

</style>

@endsection

<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h4>Add A New Warning Forecast</h4>

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between bd-highlight mb-2">
       <div></div>  
       <button type="button" class="btn btn-success text-white" id="inlandnextBtn3rdpage">Save  </button>
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
                     <div class="card-body" style="position: relative; width: 100%;
                     height: 600px;">
              <div id="cafowarningmap"   style="width: 100%;
              height: 100%;"> </div>
          </div>
          <div class="card-footer">
              <small class="text-muted"> </small>
            </div>
            {{-- end of morning map --}}
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
<div class="alert alert-warning alert-dismissible fade show p-2 m-2" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong> Weather Summary Report</strong>  </div>

<div class="form-floating my-3">
    <textarea class="form-control" placeholder="Write your weather here" id="inlandfloatingTextareaSummary" style="height: 150px"></textarea>
    <label for="inlandfloatingTextareaSummary">Weather Summary</label>
    <p id="characterCount">Characters remaining: 310</p>
    <label for="inlandfloatingTextareaSummary">Weather Summary</label>
  </div>


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
</div>
</div>







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


 <script src="{{ asset('assets/js/cafowarning.js') }}"></script>

    @endsection
 
@endsection