 
@extends('admin.adminApp')

@section('rainTempCss')
    <link rel="stylesheet" href="{{ asset('assets/css/satellite.css') }}">
@endsection


@section('rainTempJs')
    <script src="{{ asset('assets/js/satellite.js') }}"></script>
@endsection
@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
       
        <form method="POST" action="{{ route('uploadSatelliteImgView') }}" enctype="multipart/form-data">
            @csrf 
       
        <div class=" mb-3 row"> 
          <h1 class="fw-bold">Upload Satellite Images Here </h1>
          <div class="box col col-lg-4 col-md-6">
            <h5 class="fw-bold text-center"> 00:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image1" class="image-upload" accept="image/*" />
              </label>
            </div>


          </div>
        
          <div class="box col col-lg-4 col-md-6">
            <h5 class="fw-bold text-center"> 03:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file"  name="image2" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>
        
          <div class="box col col-lg-4 col-md-6">
            <h5 class="fw-bold text-center"> 06:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image3" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>

          <div class="box col col-lg-4 col-md-6">
            <h5 class="fw-bold text-center"> 09:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image4" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>

          <div class="box col col-lg-4 col-md-6">
            <h5 class="fw-bold text-center"> 12:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image5" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>

          <div class="box col col-lg-4 col-md-6">
            <h5 class="fw-bold text-center"> 15:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image6" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>


          <div class="box col col-lg-4 col-md-6">
            <h5 class="fw-bold text-center"> 18:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image7" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>

          <div class="box col col-lg-4 col-md-6 mb-4">
            <h5 class="fw-bold text-center"> 21:00 UTC </h5>
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image8" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>

         


        </div>
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
