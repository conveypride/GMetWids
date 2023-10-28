 
@extends('admin.adminApp')


@section('adminContent')

@section('seasonalforecastCss')
    <link rel="stylesheet" href="{{ asset('assets/css/seasonalforecast.css') }}">
@endsection


@section('seasonalforecastJs')
    <script src="{{ asset('assets/js/seasonalforecast.js') }}"></script>
@endsection
<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
       
        <form method="POST" action="{{ route('seasonalforecastUploadpost') }}" enctype="multipart/form-data">
            @csrf 
            <h1 class="fw-bold ">Set Seasonal Forecast Dates Here </h1>
<div class="row">
    <div class="col-6">
        <label for="dateend">Start Date</label>
        <input  class="form-control form-control-sm"  type="date" name="datestart" id="datestart">
    </div>
    <div class="col-6">
        <label for="dateend">End Date</label>
        <input class="form-control form-control-sm"  type="date" name="dateend" id="dateend">
    </div>
</div>
         
  <br> 
  <br>


        <h1 class="fw-bold ">Upload Seasonal Forecast Summary Here </h1>

          <div class="form-floating">
            <textarea required="required" class="form-control" placeholder="write sumarry here" id="summary" name="summary" style="height: 100px"></textarea>
            <label for="summary">Summary</label>
          </div>
       
<br> 
<br>
<h1> Upload Sample Seasonal Forecast Images Here</h1>
<div class="wrapper"> 
    
          <div class="box">
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image1" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>
        
          <div class="box">
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file"  name="image2" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>
        
          <div class="box">
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image3" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>

          <div class="box">
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image4" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>
 </div>
        <br>
        <h1> Upload The PDF here</h1>
        <label for="formFile" class="form-label">Upload PDF</label>
        <input class="form-control" type="file" id="formFile" name="pdffile">
        <br>
        <br>
        <br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary text-white" type="button">Upload</button>
          </div>
        </form>
 </div>




	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection
