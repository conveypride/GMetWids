 
@extends('admin.adminApp')

@section('adminContent')


<br>

    <div class="app-wrapper mt-5">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Warning Forecast</h1>
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
								    <a class="btn app-btn-secondary" href="{{ route('addwarningforecast') }}">
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
											{{-- @if (!isset($fivedayforecasts))
											<tr><td><p> No Published Forecast Available</p> </td><tr>	
											@else
											
											@foreach ($fivedayforecasts as $fivedayforecast) --}}
											<tr>
												 
												<td class="cell">
                                                    {{-- {{ $fivedayforecast[0]->randomId }} --}}
                                                id
                                                </td>
												<td class="cell">
													{{-- {{ $fivedayforecast[0]->department }} --}}
                                                    cafo
											     </td>
												<td class="cell">
                                                    {{-- {{ $fivedayforecast[0]->forecaster}} --}}
                                                forecaster
                                                </td>
												<td class="cell"><span>
                                                    {{-- {{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('j, M') }} --}}
                                                date
                                                </span><span class="note">
                                                    {{-- {{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('h:i A') }} --}}
                                                time
                                                </span></td>
												<td class="cell">
													{{-- @if ($fivedayforecast[0]->status == "Pending")
														<span class="badge bg-secondary">
															{{ 'Pending' }}
													</span>

													@elseif($fivedayforecast[0]->status == 'Approved')
													<span class="badge bg-success">
														{{ 'Published'}}
											     	</span>

													@endif --}}

                                                    <span class="badge bg-success">
														{{ 'All'}}
											     	</span>
													</td>
												{{-- <td class="cell">$259.35</td> --}}
{{-- <td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('viewfivedayforecast', ['id' =>  $fivedayforecast[0]->randomId]) }} " >View</a></td> --}}
                                                
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#" >View</a></td>
											</tr>
											
											
 
											
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
					
                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                      {{-- pending --}}
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
                                        {{-- @if (!isset($fivedayforecasts))
                                        <tr><td><p> No Published Forecast Available</p> </td><tr>	
                                        @else
                                        
                                        @foreach ($fivedayforecasts as $fivedayforecast) --}}
                                        <tr>
                                             
                                            <td class="cell">
                                                {{-- {{ $fivedayforecast[0]->randomId }} --}}
                                            id
                                            </td>
                                            <td class="cell">
                                                {{-- {{ $fivedayforecast[0]->department }} --}}
                                                cafo
                                             </td>
                                            <td class="cell">
                                                {{-- {{ $fivedayforecast[0]->forecaster}} --}}
                                            forecaster
                                            </td>
                                            <td class="cell"><span>
                                                {{-- {{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('j, M') }} --}}
                                            date
                                            </span><span class="note">
                                                {{-- {{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('h:i A') }} --}}
                                            time
                                            </span></td>
                                            <td class="cell">
                                                {{-- @if ($fivedayforecast[0]->status == "Pending")
                                                    <span class="badge bg-secondary">
                                                        {{ 'Pending' }}
                                                </span>

                                                @elseif($fivedayforecast[0]->status == 'Approved')
                                                <span class="badge bg-success">
                                                    {{ 'Published'}}
                                                 </span>

                                                @endif --}}

                                                <span class="badge bg-success">
                                                    {{ 'Pending'}}
                                                 </span>
                                                </td>
                                            {{-- <td class="cell">$259.35</td> --}}
{{-- <td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('viewfivedayforecast', ['id' =>  $fivedayforecast[0]->randomId]) }} " >View</a></td> --}}
                                            
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#" >View</a></td>
                                        </tr>
                                        
                                        

                                        
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

                    <div class="tab-pane fade" id="orders-pending" role="tabpanel"
                    aria-labelledby="orders-pending-tab">
                 {{-- Pulished --}}

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
                                    {{-- @if (!isset($fivedayforecasts))
                                    <tr><td><p> No Published Forecast Available</p> </td><tr>	
                                    @else
                                    
                                    @foreach ($fivedayforecasts as $fivedayforecast) --}}
                                    <tr>
                                         
                                        <td class="cell">
                                            {{-- {{ $fivedayforecast[0]->randomId }} --}}
                                        id
                                        </td>
                                        <td class="cell">
                                            {{-- {{ $fivedayforecast[0]->department }} --}}
                                            cafo
                                         </td>
                                        <td class="cell">
                                            {{-- {{ $fivedayforecast[0]->forecaster}} --}}
                                        forecaster
                                        </td>
                                        <td class="cell"><span>
                                            {{-- {{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('j, M') }} --}}
                                        date
                                        </span><span class="note">
                                            {{-- {{ \Carbon\Carbon::parse($fivedayforecast[0]->created_at)->format('h:i A') }} --}}
                                        time
                                        </span></td>
                                        <td class="cell">
                                            {{-- @if ($fivedayforecast[0]->status == "Pending")
                                                <span class="badge bg-secondary">
                                                    {{ 'Pending' }}
                                            </span>

                                            @elseif($fivedayforecast[0]->status == 'Approved')
                                            <span class="badge bg-success">
                                                {{ 'Published'}}
                                             </span>

                                            @endif --}}

                                            <span class="badge bg-success">
                                                {{ 'Published'}}
                                             </span>
                                            </td>
                                        {{-- <td class="cell">$259.35</td> --}}
{{-- <td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('viewfivedayforecast', ['id' =>  $fivedayforecast[0]->randomId]) }} " >View</a></td> --}}
                                        
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#" >View</a></td>
                                    </tr>
                                    
                                    

                                    
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
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    @include('admin.footer') 
	    
    </div><!--//app-wrapper-->    					

 
    @endsection
