 
@extends('admin.adminApp')

@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">5-Days Forecast</h1>
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
								    <a class="btn app-btn-secondary" href="{{ route('addNewFD') }}">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
		  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
		</svg>
									   Add New
									</a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
			    
			    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
					@if (Auth::user()->usertype == 1 || Auth::user()->usertype == 0)
					   <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Pending</a>
				  @endif

				      <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Published</a>
				  {{--   <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Deleted</a> --}}
				</nav>
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Id</th>
												<th class="cell">Department</th>
												<th class="cell">Forcaster</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell"></th>
											</tr>
										</thead>
										
										<tbody>
											@if (!isset($fivedayforecasts))
											<tr><td><p> No Published Forecast Available</p> </td><tr>	
											@else
											
											@foreach ($fivedayforecasts as $fivedayforecast)
											<tr>
												 
												<td class="cell">{{ $fivedayforecast[0]->randomId }}</td>
												<td class="cell">
													{{ $fivedayforecast[0]->department }}
											     </td>
												<td class="cell">{{ $fivedayforecast[0]->forecaster}}</td>
												<td class="cell"><span>{{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('j, M') }}</span><span class="note">{{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('h:i A') }}</span></td>
												<td class="cell">
													@if ($fivedayforecast[0]->status == "Pending")
														<span class="badge bg-secondary">
															{{ 'Pending' }}
													</span>

													@elseif($fivedayforecast[0]->status == 'Approved')
													<span class="badge bg-success">
														{{ 'Published'}}
											     	</span>

													@endif
													</td>
												{{-- <td class="cell">$259.35</td> --}}
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('viewfivedayforecast', ['id' =>  $fivedayforecast[0]->randomId]) }}">View</a></td>
											</tr>
											
											@endforeach	

											@endif
											
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							    </li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								    <a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav><!--//app-pagination-->
						
			        </div><!--//tab-pane-->
					@if (Auth::user()->usertype == 1 || Auth::user()->usertype == 0)
			        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Id</th>
												<th class="cell">Department</th>
												<th class="cell">Forcaster</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell"></th>
											</tr>
										</thead>
										
										<tbody>
											@if (!isset($fivedayforecastPending))
											<tr><td><p> No Pending Forecast Available</p> </td><tr>	
											@else
											
											@foreach ($fivedayforecastPending as $fivedayforecast)
											<tr>
												 
												<td class="cell">{{ $fivedayforecast[0]->randomId }}</td>
												<td class="cell">
													{{ $fivedayforecast[0]->department }}
											     </td>
												<td class="cell">{{ $fivedayforecast[0]->forecaster}}</td>
												<td class="cell"><span>{{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('j, M') }}</span><span class="note">{{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('h:i A') }}</span></td>
												<td class="cell">
													@if ($fivedayforecast[0]->status == "Pending")
														<span class="badge bg-secondary">
															{{ 'Pending' }}
													</span>

													@elseif($fivedayforecast[0]->status == 'Approved')
													<span class="badge bg-success">
														{{ 'Published'}}
											     	</span>

													@endif
													</td>
												{{-- <td class="cell">$259.35</td> --}}
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('viewfivedayforecast', ['id' =>  $fivedayforecast[0]->randomId]) }}">View</a></td>
											</tr>
											
											@endforeach	

											@endif
											
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							    </li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								    <a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav><!--//app-pagination-->
						
			        </div>
			       
					@endif
			         <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Id</th>
												<th class="cell">Department</th>
												<th class="cell">Forcaster</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell"></th>
											</tr>
										</thead>
										
										<tbody>
											@if (!isset($fivedayforecastApproved))
											<tr><td><p> No Published Forecast Available</p> </td><tr>	
											@else
											
											@foreach ($fivedayforecastApproved as $fivedayforecast)
											<tr>
												 
												<td class="cell">{{ $fivedayforecast[0]->randomId }}</td>
												<td class="cell">
													{{ $fivedayforecast[0]->department }}
											     </td>
												<td class="cell">{{ $fivedayforecast[0]->forecaster}}</td>
												<td class="cell"><span>{{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('j, M') }}</span><span class="note">{{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('h:i A') }}</span></td>
												<td class="cell">
													@if ($fivedayforecast[0]->status == "Pending")
														<span class="badge bg-secondary">
															{{ 'Pending' }}
													</span>

													@elseif($fivedayforecast[0]->status == 'Approved')
													<span class="badge bg-success">
														{{ 'Published'}}
											     	</span>

													@endif
													</td>
												{{-- <td class="cell">$259.35</td> --}}
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('viewfivedayforecast', ['id' =>  $fivedayforecast[0]->randomId]) }}">View</a></td>
											</tr>
											
											@endforeach	

											@endif
											
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							    </li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								    <a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav><!--//app-pagination-->
						
			        </div>  

			        {{-- <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Order</th>
												<th class="cell">Product</th>
												<th class="cell">Customer</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell">Total</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td class="cell">#15342</td>
												<td class="cell"><span class="truncate">Justo feugiat neque</span></td>
												<td class="cell">Reina Brooks</td>
												<td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td>
												<td class="cell"><span class="badge bg-danger">Deleted</span></td>
												
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
											</tr>
											
										</tbody>
									</table>
						        </div>
						    </div>	
						</div>
			        </div>
				</div> --}}
				
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection
