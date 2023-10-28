 
@extends('admin.adminApp')

{{-- @section('generatePDFCss')
    <link rel="stylesheet" href="{{ asset('assets/css/generatePDF.css') }}">
@endsection


@section('generatePDFJs')
    <script src="{{ asset('assets/js/generatePDF.js') }}"></script>
@endsection --}}

@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Add New Users</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
							    <div class="col-auto">
								    
								    <select class="form-select w-auto" >
										  <option selected value="option-1">All</option>
										  <option value="option-2">This week</option>
										  <option value="option-3">This month</option>
										  <option value="option-4">Last 3 months</option>
										  
									</select>
							    </div>
							    <div class="col-auto">						    
								    <a class="btn app-btn-secondary" id="download-button" 
									data-bs-toggle="modal" data-bs-target="#modalId"
									>
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
		  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
		</svg>
									   Create Users
									</a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->

                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">User Id</th>
                                <th class="cell">Name</th>
                                <th class="cell">Email</th>
                                <th class="cell">Department</th>
                                <th class="cell">User Role</th>
                                <th class="cell">Joined On</th>
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                              @if (!empty($users))
                                        
                                   @foreach ($users as $user)
                                  <form action="{{route('updateuser')}}" method="post">
                                @csrf  
                                <tr>
                                      
                                 <td class="cell"> <input  class="form-control" readonly type="text" name="idd" value="{{ $user->id}}"> </td>
                                <td class="cell"> <input class="form-control" type="text" name="name" value=" {{$user->name}}">  </td>
                                <td class="cell"> <input class="form-control" type="email" name="email" value=" {{ $user->email}}">  </td>
                                <td class="cell">
                                    <select class="form-control" name="department" >
                                       
                                       @if (Auth::user()->usertype == 0)
                                       <option  value="{{ $user->department}}"> {{ $user->department}}</option>
                                           <option value="MARINE">MARINE</option>
                                           <option  value="CAFO">CAFO</option>
                                            <option  value="KIAMO">KIAMO</option>
                                       @elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'CAFO' )
                                       <option  value="CAFO">CAFO</option>
                                          @elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'KIAMO' )
                                       <option  value="KIAMO">KIAMO</option>
                                        @elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'MARINE' )
                                       <option  value="MARINE">MARINE</option>
                                       @endif
 
                                          </select>
                                
                                </td>
                                <td class="cell">
                                     <select class="form-control" name="usertype">
                                        
                                    @if ($user->usertype == 0)
                                    <option selected value="0" > {{'Super Admin'}} </option>
                                        @elseif($user->usertype == 1)
                                        <option  selected   value="1">  {{'Supervisor'}} </option>
                                        @elseif($user->usertype == 2)
                                        <option  selected   value="2">{{'Composer'}} </option>
                                    @endif
                                    @if (Auth::user()->usertype == 0)
                                    <option value="0" >Super Admin</option>
                                    @endif
                                       <option  value="1">Supervisor</option>
                                        <option  value="2">Composer</option>
                                      </select>
                                  
                                     </td>
                                <td class="cell"><span>{{ \Carbon\Carbon::parse($user->created_at)->format('j, M') }}</span><span class="note">{{ \Carbon\Carbon::parse($user->created_at)->format('h:i A') }}</span></td>
                                 
                                <td class="cell"> 
                                       <button type="submit" class="text-white btn btn-primary">Save</button>
                                    </td>
                                    
                            </tr>
                                </form> 
                                  @endforeach
                                    @else
                                    <td>No users Available</td>
                                    @endif
                          
                            
                        </tbody>
                    </table>
                </div><!--//table-responsive-->


 
<!-- Modal -->
<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('createUser') }}" method="post">
                @csrf
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Add New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <div class="mb-3">
                      <label for="" class="form-label">Name</label>
                      <input type="text"
                        class="form-control" name="name" aria-describedby="helpId" placeholder="Name">
                      <small id="helpId" class="form-text text-muted">Please Enter Your Name</small>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email"
                          class="form-control" name="email" aria-describedby="helpId1" placeholder="Email">
                        <small id="helpId1" class="form-text text-muted">Please Enter Your Email</small>
                    </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="text"
                          class="form-control" name="password" aria-describedby="helpId2" placeholder="Password">
                        <small id="helpId2" class="form-text text-muted">Please Enter Your Password</small>
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">User Type</label>
                        <select class="form-select form-select-md" name="usertype">
                            @if (Auth::user()->usertype == 0 )
                            <option selected value="0" > {{'Super Admin'}} </option>
                            <option  value="1">Supervisor</option>
                            <option  value="2">Composer</option>

                            @elseif(Auth::user()->usertype == 1)
                             <option  value="1">Supervisor</option>
                            <option  value="2">Composer</option>
                            @endif
                                   
                        </select>
                    </div>

                 <div class="mb-3">
                    <label for="" class="form-label">Department</label>
                    <select class="form-select" name="department" >
                                       
                        @if (Auth::user()->usertype == 0)
                          <option value="MARINE">MARINE</option>
                            <option  value="CAFO">CAFO</option>
                             <option  value="KIAMO">KIAMO</option>
                        @elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'CAFO' )
                        <option  value="CAFO">CAFO</option>
                           @elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'KIAMO' )
                        <option  value="KIAMO">KIAMO</option>
                         @elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'MARINE' )
                        <option  value="MARINE">MARINE</option>
                        @endif

                     </select>
                    
                </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>







@section('script')
<script>
    var modalId = document.getElementById('modalId');

    modalId.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>
@endsection



            </div>
        </div>
  
        @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection