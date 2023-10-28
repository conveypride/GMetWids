 
@extends('admin.adminApp')

@section('rainTempCss')
    <link rel="stylesheet" href="{{ asset('assets/css/rainTemp.css') }}">
@endsection


@section('rainTempJs')
    <script src="{{ asset('assets/js/rainTemp.js') }}"></script>
@endsection
@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
       
        <form method="POST" action="{{ route('addrainTempUploadpost') }}" enctype="multipart/form-data">
            @csrf 
       
        <div class="wrapper"> 
          <h1 class="fw-bold ">Upload 5-Days Spatial Rainfall Here </h1>
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

          <div class="box">
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="image5" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div>

        </div>
        <br>
{{-- temperature image upload --}}
<div class="wrapper"> 
  <h1 class="fw-bold ">Upload 5-Days Spatial Temperature Here </h1>
  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" name="imageT1" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>

  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file"  name="imageT2" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>

  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" name="imageT3" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>

  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" name="imageT4" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>

  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" name="imageT5" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>

</div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary text-white" type="button">Upload</button>
          </div>
        </form>
 </div>




	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection
