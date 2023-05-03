@extends('admin.adminApp')

@section('cafodistrictCss')
    <link rel="stylesheet" href="{{ asset('assets/css/cafodistrict.css') }}">
@endsection


@section('cafodistrictJs')
    <script src="{{ asset('assets/js/cafodistrict.js') }}"></script>
@endsection

@section('adminContent')

<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">


                <div class="container">
                    {{-- info --}}
                    <div class="app-card shadow-sm mb-4 border-left-decoration">
                        <div class="inner">
                            <div class="app-card-body p-4">
                                <div class="row gx-5 gy-3">
                                    <div class="col-12 col-lg-9">
                                        
                                        <div>  <h4 class="text-center">Add Districts</h4>
                                        <p>Enter the name of the District and Select the appropriate zone it fallens within. Thank you!!! </p>
                                        </div>
                                    </div><!--//col--> 
                                </div><!--//row-->
                            </div><!--//app-card-body-->
                            
                        </div><!--//inner-->
                    </div>
                    {{-- <div class="well well-sm" style="margin: 3rem;">
                        <h2 class="text-center">ADD </h2>
                    </div> --}}
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Districts</th>
                                <th>Sector</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                
                        <tbody id="table">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="task">
                                </td>
                                <td>
                                    <select class="form-control" id="priority">
                        <option> Coastal  Zone</option>
                        <option>Forest Zone</option>
                        <option> Northern  Zone</option>
                        <option>Transition Zone</option>
                      </select>
                                </td>
                                <td>
                                    <button type="button" id="add-button" class="btn btn-dark">Add</button>
                                </td>
                            </tr>

                            <tr><td>Accra</td><td> Coastal Zone</td><td><button type="button" id="remove-button" class="btn btn-danger text-white">Remove</button></td></tr>
                            <tr><td>Kumasi</td><td>Forest Zone</td><td><button type="button" id="remove-button" class="btn btn-danger text-white">Remove</button></td></tr>
                        </tbody>
                    </table>
                
                </div>





                
            </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection