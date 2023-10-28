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
                         <h1 class="app-page-title mb-0">Daily Forecast</h1>
                     </div>
                     <div class="col-auto">
                         <div class="page-utilities">
                             <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                 <div class="col-auto">
                                     <form class="table-search-form row gx-1 align-items-center">
                                         <div class="col-auto">
                                             <input type="text" id="search-orders" name="searchorders"
                                                 class="form-control search-orders" placeholder="Search">
                                         </div>
                                         <div class="col-auto">
                                             <button type="submit" class="btn app-btn-secondary">Search</button>
                                         </div>
                                     </form>

                                 </div><!--//col-->
                                 <div class="col-auto">

                                     <select class="form-select w-auto">
                                         <option selected value="option-1">All</option>
                                         <option value="option-2">This week</option>
                                         <option value="option-3">This month</option>
                                         <option value="option-4">Last 3 months</option>

                                     </select>
                                 </div>
                                 <div class="col-auto">
                                     <a class="btn app-btn-secondary" id="download-button" href="{{ route('addNewDf') }}">
                                         <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd"
                                                 d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                             <path fill-rule="evenodd"
                                                 d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                         </svg>
                                         Add New
                                     </a>
                                 </div>
                             </div><!--//row-->
                         </div><!--//table-utilities-->
                     </div><!--//col-auto-->
                 </div><!--//row-->


                 <nav id="orders-table-tab"
                     class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                     <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                         href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
						 @if (Auth::user()->usertype == 1 || Auth::user()->usertype == 0)

						  <a class="flex-sm-fill text-sm-center nav-link" id="pending-tab" data-bs-toggle="tab"
                         href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>

						 @endif
                     <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                         href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Published</a>
                     <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
                         href="#orders-pending" role="tab" aria-controls="orders-pending"
                         aria-selected="false">Drafted</a>
                     <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
                         href="#orders-cancelled" role="tab" aria-controls="orders-cancelled"
                         aria-selected="false">Deleted</a>
                 </nav>


                 <div class="tab-content" id="orders-table-tab-content">
                     <div class="tab-pane fade show active" id="orders-all" role="tabpanel"
                         aria-labelledby="orders-all-tab">
                         <div class="app-card app-card-orders-table shadow-sm mb-5">
                             <div class="app-card-body">
                                 <div class="table-responsive">
                                     <table class="table app-table-hover mb-0 text-left">
                                         <thead>
                                             <tr>
                                                 <th class="cell">Id</th>
                                                 <th class="cell">Forecast Summary</th>
                                                 <th class="cell">Forcaster</th>
                                                 <th class="cell">Date</th>
                                                 <th class="cell">Status</th>
                                                 <th class="cell">Approved By</th>
                                                 <th class="cell"></th>
                                             </tr>
                                         </thead>
                                         <tbody>
											   
											@if (!empty($dailyforecasts))
													
                                             @foreach ($dailyforecasts as $dailyforecast)
                                                 <tr>
                                                     <td class="cell">{{ $dailyforecast->id }}</td>
                                                     <td class="cell"><span
                                                             class="truncate">{{ $dailyforecast->summary }}</span></td>
                                                     <td class="cell">{{ $dailyforecast->creator }}</td>
                                                     <td class="cell">
                                                         <span>{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('j, M') }}</span><span
                                                             class="note">{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('h:i A') }}</span>
                                                     </td>
                                                     <td class="cell"><span
                                                             class="@if ($dailyforecast->publishType == 'Publish-Forecast') badge bg-success @elseif ($dailyforecast->publishType == 'Draft-Forecast') badge bg-warning  @elseif ($dailyforecast->publishType == 'Pending-Forecast') badge bg-secondary @else badge bg-danger @endif">
                                                             @if ($dailyforecast->publishType == 'Publish-Forecast')
                                                                 {{ 'Published' }}
																@elseif ($dailyforecast->publishType == 'Pending-Forecast')
                                                                 {{ 'Pending' }} 
                                                             @elseif ($dailyforecast->publishType == 'Draft-Forecast')
                                                                 {{ 'Drafted' }}
																 @else
																 {{ 'Deleted' }}
                                                             @endif
                                                         </span>
														</td>
                                                     <td class="cell">
														@if(!empty( $dailyforecast->approvedby))
															{{ $dailyforecast->approvedby }}
														@else
															{{ 'Not Approved Yet' }}
														@endif
														 </td>
                                                     <td class="cell">
                                                         <div class="dropdown">
                                                             <a class="btn-sm app-btn-secondary dropdown-toggle no-toggle-arrow"
                                                                 href="#" data-bs-toggle="dropdown"
                                                                 aria-expanded="false">
                                                                 <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                                     class="bi bi-three-dots-vertical" fill="currentColor"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                     <path fill-rule="evenodd"
                                                                         d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                                 </svg>
                                                             </a>

                                                             <ul class="dropdown-menu">
                                                                 <li><a class="dropdown-item"
                                                                         href="{{ url('admin/viewdailyforecast/' . $dailyforecast->id) }}"><svg
                                                                             width="1em" height="1em"
                                                                             viewBox="0 0 16 16" class="bi bi-eye me-2"
                                                                             fill="currentColor"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                             <path fill-rule="evenodd"
                                                                                 d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                                             <path fill-rule="evenodd"
                                                                                 d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                                         </svg>View Table</a></li>
                                                                 <li><a class="dropdown-item"
                                                                         href="{{ url('admin/viewdailyforecastMap/' . $dailyforecast->id) }}"><svg
                                                                             width="16px" height="16px"
                                                                             viewBox="0 0 24 24" fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                             <path
                                                                                 d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z"
                                                                                 stroke="#000000" stroke-width="2"
                                                                                 stroke-linecap="round"
                                                                                 stroke-linejoin="round" />
                                                                         </svg>View IBF</a></li>
                                                                 <li><a class="dropdown-item"
                                                                         href="{{ url('admin/editdailyforecastTable/' . $dailyforecast->id) }}"><svg
                                                                             width="1em" height="1em"
                                                                             viewBox="0 0 16 16"
                                                                             class="bi bi-download me-2"
                                                                             fill="currentColor"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                             <path fill-rule="evenodd"
                                                                                 d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                             <path fill-rule="evenodd"
                                                                                 d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                         </svg>Edit Forecast</a></li>

                                                                 <li>
                                                                     <hr class="dropdown-divider">
                                                                 </li>
																 @if ($dailyforecast->publishType != 'Delete-Forecast')
                                                                 <li><a idd="{{ $dailyforecast->id }}" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deletemodel" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
						  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg>Delete</a></li>
						@endif
                                                             </ul>
                                                         </div><!--//dropdown-->


                                                     </td>
                                                 </tr>
                                           
                                             @endforeach
  
                    
											@else
													<tr>
														<td>
															<p> No Forecast Available</p>
														</td>
													<tr>
													@endif
                                         </tbody>
                                     </table>
                                 </div><!--//table-responsive-->

                             </div><!--//app-card-body-->
                         </div><!--//app-card-->
                         <nav class="app-pagination">
                             <ul class="pagination justify-content-center">
                                 <li class="page-item disabled">
                                     <a class="page-link" href="#" tabindex="-1"
                                         aria-disabled="true">Previous</a>
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
							
					      {{-- pending --}}
						  <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
							<div class="app-card app-card-orders-table mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
	
										<table class="table mb-0 text-left">
											<thead>
												<tr>
													<th class="cell">Id</th>
													<th class="cell">Forecast Summary</th>
													<th class="cell">Forcaster</th>
													<th class="cell">Date</th>
													<th class="cell">Status</th>
													<th class="cell">Approved By</th>
													<th class="cell"></th> 
												</tr>
											</thead>
											<tbody>
												@if (!empty($dailyforecasts))
													 @foreach ($dailyforecasts as $dailyforecast)
													@if ($dailyforecast->publishType == 'Pending-Forecast')
														<tr>
															<td class="cell">{{ $dailyforecast->id }}</td>
															<td class="cell"><span
																	class="truncate">{{ $dailyforecast->summary }}</span>
															</td>
															<td class="cell">{{ $dailyforecast->creator }}</td>
															<td class="cell">
																<span>{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('j, M') }}</span><span
																	class="note">{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('h:i A') }}</span>
															</td>
															<td class="cell"><span class="badge bg-secondary">
																	{{ 'Pending' }}
																</span></td>
																<td class="cell">
																	@if(!empty( $dailyforecast->approvedby))
																		{{ $dailyforecast->approvedby }}
																	@else
																		{{ 'Not Approved Yet' }}
																	@endif
																	 </td>
															<td class="cell">
																<div class="dropdown">
																	<a class="btn-sm app-btn-secondary dropdown-toggle no-toggle-arrow"
																		href="#" data-bs-toggle="dropdown"
																		aria-expanded="false">
																		<svg width="1em" height="1em"
																			viewBox="0 0 16 16"
																			class="bi bi-three-dots-vertical"
																			fill="currentColor"
																			xmlns="http://www.w3.org/2000/svg">
																			<path fill-rule="evenodd"
																				d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																		</svg>
																	</a>
	
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item"
																				href="{{ url('admin/viewdailyforecast/' . $dailyforecast->id) }}"><svg
																					width="1em" height="1em"
																					viewBox="0 0 16 16"
																					class="bi bi-eye me-2"
																					fill="currentColor"
																					xmlns="http://www.w3.org/2000/svg">
																					<path fill-rule="evenodd"
																						d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
																					<path fill-rule="evenodd"
																						d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
																				</svg>View Table</a></li>
																		<li><a class="dropdown-item"
																				href="{{ url('admin/viewdailyforecastMap/' . $dailyforecast->id) }}"><svg
																					width="16px" height="16px"
																					viewBox="0 0 24 24" fill="none"
																					xmlns="http://www.w3.org/2000/svg">
																					<path
																						d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z"
																						stroke="#000000" stroke-width="2"
																						stroke-linecap="round"
																						stroke-linejoin="round" />
																				</svg>View IBF</a></li>
																		<li><a class="dropdown-item"
																				href="{{ url('admin/editdailyforecastTable/' . $dailyforecast->id) }}"><svg
																					width="1em" height="1em"
																					viewBox="0 0 16 16"
																					class="bi bi-download me-2"
																					fill="currentColor"
																					xmlns="http://www.w3.org/2000/svg">
																					<path fill-rule="evenodd"
																						d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
																					<path fill-rule="evenodd"
																						d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
																				</svg>Edit Forecast</a></li>
	
																		<li>
																			<hr class="dropdown-divider">
																		</li>
																		<li><a class="dropdown-item" idd="{{ $dailyforecast->id }}" href="#" data-bs-toggle="modal" data-bs-target="#approvemodel">
																			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
																				<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
																			  </svg> Approve </a></li>
																	</ul>
																</div><!--//dropdown-->
	
	
															</td>
														</tr>
												
													@endif
	
											
												@endforeach
													@else
														<tr>
														<td>
															<p> No Forecast Available</p>
														</td>
													<tr>
												@endif
												
											</tbody>
										</table>
									</div><!--//table-responsive-->
								</div><!--//app-card-body-->
							</div><!--//app-card-->
						</div>
							
						@endif
                    


                     <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                         <div class="app-card app-card-orders-table mb-5">
                             <div class="app-card-body">
                                 <div class="table-responsive">

                                     <table class="table mb-0 text-left">
                                         <thead>
                                             <tr>
                                                 <th class="cell">Id</th>
                                                 <th class="cell">Forecast Summary</th>
                                                 <th class="cell">Forcaster</th>
                                                 <th class="cell">Date</th>
                                                 <th class="cell">Status</th>
												 <th class="cell">Approved By</th>
                                                 <th class="cell"></th> 
                                             </tr>
                                         </thead>
                                         <tbody>
											
											@if (!empty($dailyforecasts))
												 
											  @foreach ($dailyforecasts as $dailyforecast)
                                                 @if ($dailyforecast->publishType == 'Publish-Forecast')
                                                     <tr>
                                                         <td class="cell">{{ $dailyforecast->id }}</td>
                                                         <td class="cell"><span
                                                                 class="truncate">{{ $dailyforecast->summary }}</span>
                                                         </td>
                                                         <td class="cell">{{ $dailyforecast->creator }}</td>
                                                         <td class="cell">
                                                             <span>{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('j, M') }}</span><span
                                                                 class="note">{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('h:i A') }}</span>
                                                         </td>
                                                         <td class="cell"><span class="badge bg-success">
                                                                 {{ 'Published' }}
                                                             </span></td>
															 <td class="cell">
																@if(!empty( $dailyforecast->approvedby))
																	{{ $dailyforecast->approvedby }}
																@else
																	{{ 'Not Approved Yet' }}
																@endif
																 </td>
                                                         <td class="cell">
                                                             <div class="dropdown">
                                                                 <a class="btn-sm app-btn-secondary dropdown-toggle no-toggle-arrow"
                                                                     href="#" data-bs-toggle="dropdown"
                                                                     aria-expanded="false">
                                                                     <svg width="1em" height="1em"
                                                                         viewBox="0 0 16 16"
                                                                         class="bi bi-three-dots-vertical"
                                                                         fill="currentColor"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                         <path fill-rule="evenodd"
                                                                             d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                                     </svg>
                                                                 </a>

                                                                 <ul class="dropdown-menu">
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/viewdailyforecast/' . $dailyforecast->id) }}"><svg
                                                                                 width="1em" height="1em"
                                                                                 viewBox="0 0 16 16"
                                                                                 class="bi bi-eye me-2"
                                                                                 fill="currentColor"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                                             </svg>View Table</a></li>
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/viewdailyforecastMap/' . $dailyforecast->id) }}"><svg
                                                                                 width="16px" height="16px"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path
                                                                                     d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z"
                                                                                     stroke="#000000" stroke-width="2"
                                                                                     stroke-linecap="round"
                                                                                     stroke-linejoin="round" />
                                                                             </svg>View IBF</a></li>
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/editdailyforecastTable/' . $dailyforecast->id) }}"><svg
                                                                                 width="1em" height="1em"
                                                                                 viewBox="0 0 16 16"
                                                                                 class="bi bi-download me-2"
                                                                                 fill="currentColor"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                             </svg>Edit Forecast</a></li>

                                                                     <li>
                                                                         <hr class="dropdown-divider">
                                                                     </li>
                                                                     {{-- <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
				  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
				</svg>Delete</a></li> --}}
                                                                 </ul>
                                                             </div><!--//dropdown-->


                                                         </td>
                                                     </tr>
                                                 
                                                 @endif

                                                 
                                             @endforeach
                                                @else
											 <tr>
                                                     <td>
                                                         <p> No Forecast Available</p>
                                                     </td>
                                                 <tr>
											 @endif
                                         </tbody>
                                     </table>
                                 </div><!--//table-responsive-->
                             </div><!--//app-card-body-->
                         </div><!--//app-card-->
                     </div><!--//tab-pane-->

                     <div class="tab-pane fade" id="orders-pending" role="tabpanel"
                         aria-labelledby="orders-pending-tab">
                         <div class="app-card app-card-orders-table mb-5">
                             <div class="app-card-body">
                                 <div class="table-responsive">
                                     <table class="table mb-0 text-left">
                                         <thead>
                                             <tr>
                                                 <th class="cell">Id</th>
                                                 <th class="cell">Forecast Summary</th>
                                                 <th class="cell">Forcaster</th>
                                                 <th class="cell">Date</th>
                                                 <th class="cell">Status</th>
												 <th class="cell">Approved By</th>
                                                 <th class="cell"></th> 
                                             </tr>
                                         </thead>
                                         <tbody>
											@if (!empty($dailyforecasts))
										
											@foreach ($dailyforecasts as $dailyforecast)
                                                 @if ($dailyforecast->publishType == 'Draft-Forecast')
                                                     <tr>
                                                         <td class="cell">{{ $dailyforecast->id }}</td>
                                                         <td class="cell"><span
                                                                 class="truncate">{{ $dailyforecast->summary }}</span>
                                                         </td>
                                                         <td class="cell">{{ $dailyforecast->creator }}</td>
                                                         <td class="cell">
                                                             <span>{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('j, M') }}</span><span
                                                                 class="note">{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('h:i A') }}</span>
                                                         </td>
                                                         <td class="cell"><span class="badge bg-warning">
                                                                 {{ 'Drafted' }}
                                                             </span></td>
															 <td class="cell">
																@if(!empty( $dailyforecast->approvedby))
																	{{ $dailyforecast->approvedby }}
																@else
																	{{ 'Not Approved Yet' }}
																@endif
																 </td>
                                                         <td class="cell">
                                                             <div class="dropdown">
                                                                 <a class="btn-sm app-btn-secondary dropdown-toggle no-toggle-arrow"
                                                                     href="#" data-bs-toggle="dropdown"
                                                                     aria-expanded="false">
                                                                     <svg width="1em" height="1em"
                                                                         viewBox="0 0 16 16"
                                                                         class="bi bi-three-dots-vertical"
                                                                         fill="currentColor"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                         <path fill-rule="evenodd"
                                                                             d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                                     </svg>
                                                                 </a>

                                                                 <ul class="dropdown-menu">
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/viewdailyforecast/' . $dailyforecast->id) }}"><svg
                                                                                 width="1em" height="1em"
                                                                                 viewBox="0 0 16 16"
                                                                                 class="bi bi-eye me-2"
                                                                                 fill="currentColor"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                                             </svg>View Table</a></li>
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/viewdailyforecastMap/' . $dailyforecast->id) }}"><svg
                                                                                 width="16px" height="16px"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path
                                                                                     d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z"
                                                                                     stroke="#000000" stroke-width="2"
                                                                                     stroke-linecap="round"
                                                                                     stroke-linejoin="round" />
                                                                             </svg>View IBF</a></li>
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/editdailyforecastTable/' . $dailyforecast->id) }}"><svg
                                                                                 width="1em" height="1em"
                                                                                 viewBox="0 0 16 16"
                                                                                 class="bi bi-download me-2"
                                                                                 fill="currentColor"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                             </svg>Edit Forecast</a></li>

                                                                     <li>
                                                                         <hr class="dropdown-divider">
                                                                     </li>
                                                                     {{-- <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
				  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
				</svg>Delete</a></li> --}}
                                                                 </ul>
                                                             </div><!--//dropdown-->


                                                         </td>
                                                     </tr>
                                                
                                                 @endif

                                          
                                             @endforeach
											 @else
												 <tr>
                                                     <td>
                                                         <p> No Forecast Available</p>
                                                     </td>
                                                 <tr>
											@endif
                                                
                                         </tbody>
                                     </table>
                                 </div><!--//table-responsive-->
                             </div><!--//app-card-body-->
                         </div><!--//app-card-->
                     </div><!--//tab-pane-->
                     <div class="tab-pane fade" id="orders-cancelled" role="tabpanel"
                         aria-labelledby="orders-cancelled-tab">
                         <div class="app-card app-card-orders-table mb-5">
                             <div class="app-card-body">
                                 <div class="table-responsive">
                                     <table class="table mb-0 text-left">
                                         <thead>
                                             <tr>
                                                 <th class="cell">Id</th>
                                                 <th class="cell">Forecast Summary</th>
                                                 <th class="cell">Forcaster</th>
                                                 <th class="cell">Date</th>
                                                 <th class="cell">Status</th>
												  <th class="cell">Approved By</th>
                                                 <th class="cell"></th>
                                             </tr>
                                         </thead>
                                         <tbody>
											@if (!empty($dailyforecasts))
												
											  @foreach ($dailyforecasts as $dailyforecast)
                                                 @if ($dailyforecast->publishType == 'Delete-Forecast')
                                                     <tr>
                                                         <td class="cell">{{ $dailyforecast->id }}</td>
                                                         <td class="cell"><span
                                                                 class="truncate">{{ $dailyforecast->summary }}</span>
                                                         </td>
                                                         <td class="cell">{{ $dailyforecast->creator }}</td>
                                                         <td class="cell">
                                                             <span>{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('j, M') }}</span><span
                                                                 class="note">{{ \Carbon\Carbon::parse($dailyforecast->created_at)->format('h:i A') }}</span>
                                                         </td>
                                                         <td class="cell"><span class="badge bg-danger">
                                                                 {{ 'Deleted' }}
                                                             </span></td>
															 <td class="cell">
																@if(!empty( $dailyforecast->approvedby))
																	{{ $dailyforecast->approvedby }}
																@else
																	{{ 'Not Approved Yet' }}
																@endif
																 </td>
                                                         <td class="cell">
                                                             <div class="dropdown">
                                                                 <a class="btn-sm app-btn-secondary dropdown-toggle no-toggle-arrow"
                                                                     href="#" data-bs-toggle="dropdown"
                                                                     aria-expanded="false">
                                                                     <svg width="1em" height="1em"
                                                                         viewBox="0 0 16 16"
                                                                         class="bi bi-three-dots-vertical"
                                                                         fill="currentColor"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                         <path fill-rule="evenodd"
                                                                             d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                                     </svg>
                                                                 </a>

                                                                 <ul class="dropdown-menu">
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/viewdailyforecast/' . $dailyforecast->id) }}"><svg
                                                                                 width="1em" height="1em"
                                                                                 viewBox="0 0 16 16"
                                                                                 class="bi bi-eye me-2"
                                                                                 fill="currentColor"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                                             </svg>View Table</a></li>
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/viewdailyforecastMap/' . $dailyforecast->id) }}"><svg
                                                                                 width="16px" height="16px"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path
                                                                                     d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z"
                                                                                     stroke="#000000" stroke-width="2"
                                                                                     stroke-linecap="round"
                                                                                     stroke-linejoin="round" />
                                                                             </svg>View IBF</a></li>
                                                                     <li><a class="dropdown-item"
                                                                             href="{{ url('admin/editdailyforecastTable/' . $dailyforecast->id) }}"><svg
                                                                                 width="1em" height="1em"
                                                                                 viewBox="0 0 16 16"
                                                                                 class="bi bi-download me-2"
                                                                                 fill="currentColor"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                                 <path fill-rule="evenodd"
                                                                                     d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                             </svg>Edit Forecast</a></li>

                                                                     <li>
                                                                         <hr class="dropdown-divider">
                                                                     </li>
                                                                     {{-- <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
				  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
				</svg>Delete</a></li> --}}
                                                                 </ul>
                                                             </div><!--//dropdown-->


                                                         </td>
                                                     </tr>
                                                 
                                                 @endif

                                          
                                             @endforeach
											 @else
											  <tr>
                                                     <td>
                                                         <p> No Forecast Available</p>
                                                     </td>
                                                 <tr>
											@endif
                                               
                                         </tbody>
                                     </table>
                                 </div><!--//table-responsive-->
                             </div><!--//app-card-body-->
                         </div><!--//app-card-->
                     </div><!--//tab-pane-->
                 </div><!--//tab-content-->



{{-- model for delete --}}

<div class="modal fade" id="deletemodel" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{route('deleteforecast')}}" method="post">
				@csrf
				<div class="modal-header">
						<h5 class="modal-title" id="modalTitleId"> Delete Forecast </h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
			<div class="modal-body">
				<div class="container-fluid">
					<input type="hidden" name="idd" id="deleteidd" value="">
				<h5>Are You Sure You Want To Delete This Forecast??</h5>
				</div>
			   </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger text-white">Delete</button>
			</div>
            </form>
		</div>
	</div>
</div>




{{-- model for approval --}}

<div class="modal fade" id="approvemodel" tabindex="-1" role="dialog" aria-labelledby="modalTitleIdApp" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{route('approveforecast')}}" method="post">
				@csrf
				<div class="modal-header">
						<h5 class="modal-title" id="modalTitleIdApp"> Approve Forecast </h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
			<div class="modal-body">
				<div class="container-fluid">
					<input type="hidden" name="iddd" id="approveid" value="">
				<h5>Are You Sure You Want To Approve This Forecast??</h5>
				</div>
			   </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary text-white">Approve</button>
			</div>
            </form>
		</div>
	</div>
</div>



             </div><!--//container-fluid-->
         </div><!--//app-content-->
         @include('admin.footer')

     </div><!--//app-wrapper-->


	 @section('script')


	 <script>
		var deletemodel = document.getElementById('deletemodel');
	    var deleteid = document.getElementById('deleteidd');

		deletemodel.addEventListener('show.bs.modal', function (event) {
			  // Button that triggered the modal
			  let button = event.relatedTarget;
			  // Extract info from data-bs-* attributes
			  let recipient = button.getAttribute('idd');
			  deleteid.value = recipient;
			// Use above variables to manipulate the DOM
		});


		// approve forecast
var approvemodel = document.getElementById('approvemodel');
	    var approveid = document.getElementById('approveid');

		approvemodel.addEventListener('show.bs.modal', function (event) {
			  // Button that triggered the modal
			  let button = event.relatedTarget;
			  // Extract info from data-bs-* attributes
			  let recipient = button.getAttribute('idd');
			  approveid.value = recipient;
			// Use above variables to manipulate the DOM
		});




		
	</script>
	
	 @endsection



 @endsection
