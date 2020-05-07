@extends('layouts.app')

@section('librariesCSS')
    <!-- Core JS files -->
	<script src="{{ asset('limitless/Template/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/extensions/rowlink.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/core/main.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js')}}"></script>

	<script src="{{ asset('limitless/Template/layout_1/LTR/default/full/assets/js/app.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/user_pages_profile_tabbed.js')}}"></script>

	<script src="{{ asset('limitless/Template/global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	
	<script src="{{('/')}}/assets/js/app.js"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/components_modals.js')}}"></script>
	<!-- /theme JS files -->

	<!-- chart js -->
	<script src="{{ asset('limitless/Template/global_assets/js/chart/Chart.js')}}"></script>


@endsection


@section('content')

@if ($errors->any())
	<!-- Danger modal -->
	<div id="alertModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h6 class="modal-title">Error !</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<h6 class="font-weight-semibold">Ada masalah : </h6>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /default modal -->
	<script>
		$(function() {
			$('#alertModal').modal('show');
		});	
	</script>

@endif

@if (session('success'))
	<!-- Danger modal -->
	<div id="alertModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title">Success !</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					{{ session('success') }}
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /default modal -->
	<script>
		$(function() {
			$('#alertModal').modal('show');
		});	
	</script>

@endif

@if (session('error'))
	<!-- Danger modal -->
	<div id="alertModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h6 class="modal-title">Error !</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					{{ session('error') }}
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /default modal -->
	<script>
		$(function() {
			$('#alertModal').modal('show');
		});	
	</script>

@endif


<div id="contentDeep" class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
            <!-- Content area -->
			<div class="content">
				<!-- Inner container -->
				<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Navigation -->
							<div class="card" id="profilePict">
								<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{url('/')}}/limitless/Template/global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
									<div class="card-img-actions d-inline-block mb-3">
                                    <img class="img-fluid rounded-circle" src="{{url('/')}}/{{$pengguna->profile_picture}}" width="170" height="170" alt="">
										<div class="card-img-actions-overlay rounded-circle">
											<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
												<i class="icon-plus3"></i>
											</a>
											<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
												<i class="icon-link"></i>
											</a>
										</div>
									</div>

                                <h6 class="font-weight-semibold mb-0">{{$pengguna->display_name}}</h6>
						    		<span class="d-block opacity-75">{{$pengguna->email}}</span>

					    			<div class="list-icons list-icons-extended mt-3">
				                    	<a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a>
				                    	<a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a>
				                    	<a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a>
			                    	</div>
						    	</div>
							</div>
							<!-- /navigation -->


						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /left sidebar component -->


					<!-- Right content -->
					<div class="tab-content w-100 overflow-auto">

							<div class="card">
								<div class="card-header header-elements-inline">
									
									<div class="header-elements">
										<div class="list-icons">
											<a class="list-icons-item" data-action="collapse"></a>
											<a class="list-icons-item" data-action="reload"></a>
											<a class="list-icons-item" data-action="remove"></a>
										</div>
									</div>
								</div>
								
								<div class="card-body">
									<ul class="nav nav-tabs nav-tabs-bottom">
										<li class="nav-item"><a href="#profile" class="nav-link active" data-toggle="tab">Profile</a></li>
										<li class="nav-item"><a href="#group" class="nav-link" data-toggle="tab">Group</a></li>
										<li class="nav-item"><a href="#kemampuan" class="nav-link" data-toggle="tab">Kemampuan</a></li>
									</ul>

									<div class="tab-content">
										<div class="tab-pane fade active show" id="profile">
											<h5 class="card-title"><i class="icon-reading mr-2"></i> Profile information</h5>
											<form action="{{Route('akun.update', $pengguna->id_pengguna)}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
												{{ method_field('PUT') }}
												<div class="row">
													<div class="col-md-6">
														<fieldset>
															
															<div class="form-group">
																<label>Username:</label>
																<input type="text" class="form-control" value="{{$pengguna->display_name}}" name="display_name">
															</div>

															<div class="form-group">
																<label>Website :</label>
																<input type="text" class="form-control" value="{{$pengguna->website}}" name="website">
															</div>
															
															<div class="form-group">
																<label>Short Description:</label>
																<textarea rows="5" cols="5" class="form-control" name="short_desc">{{$pengguna->short_desc}}</textarea>
															</div>
														</fieldset>
													</div>

													<div class="col-md-6">
														<fieldset>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Pendidikan:</label>
																		<input type="text" value="{{$pengguna->pendidikan}}" name="pendidikan" class="form-control">
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Email:</label>
																		<input type="text" value="{{$pengguna->email}}" name="email" class="form-control">
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label>Phone :</label>
																		<input type="text" value="{{$pengguna->no_telp}}" name="no_telp" class="form-control">
																	</div>
																</div>
															</div>
														</fieldset>
													</div>
												</div>

												<div class="text-right">
													<button type="submit" class="btn btn-primary">Update Now <i class="icon-paperplane ml-2"></i></button>
												</div>
											</form>
										</div>

										<div class="tab-pane fade" id="group">
											<h5 class="card-title"><i class="icon-reading mr-2"></i> Group information</h5>
											<form action="{{Route('akun.update', $pengguna->id_pengguna)}}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
												{{ method_field('PUT') }}
												<div class="row">
													<div class="col-md-6">
														<fieldset>
															
															<div class="form-group">
																<label>Username:</label>
																<input type="text" class="form-control" value="{{$pengguna->display_name}}" name="display_name">
															</div>

															<div class="form-group">
																<label>Website :</label>
																<input type="text" class="form-control" value="{{$pengguna->website}}" name="website">
															</div>
															
															<div class="form-group">
																<label>Short Description:</label>
																<textarea rows="5" cols="5" class="form-control" name="short_desc">{{$pengguna->short_desc}}</textarea>
															</div>
														</fieldset>
													</div>

													<div class="col-md-6">
														<fieldset>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Pendidikan:</label>
																		<input type="text" value="{{$pengguna->pendidikan}}" name="pendidikan" class="form-control">
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Email:</label>
																		<input type="text" value="{{$pengguna->email}}" name="email" class="form-control">
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label>Phone :</label>
																		<input type="text" value="{{$pengguna->no_telp}}" name="no_telp" class="form-control">
																	</div>
																</div>
															</div>
														</fieldset>
													</div>
												</div>

												<div class="text-right">
													<button type="submit" class="btn btn-primary">Update Now <i class="icon-paperplane ml-2"></i></button>
												</div>
											</form>
										</div>
									</div>
									
								</div>
							</div>
							<!-- /2 columns form -->


							<!-- Profil map -->
							<div class="card">
								<div class="card-header header-elements-sm-inline">
									<h6 class="card-title">User's location</h6>
									<div class="header-elements">
										<span><i class="icon-history mr-2 text-success"></i> Updated 3 hours ago</span>

										<div class="list-icons ml-3">
					                		<a class="list-icons-item" data-action="reload"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<div class="chart-container">
										<div class="chart has-fixed-height" >
											<div id="map" style="height:400px;"></div>

											<script type="text/javascript">
											function initMap(){

											var locations = [
												['Lokasi Pengguna', $pengguna->longitude, $pengguna->latitude, 5]
											];

											var map = new google.maps.Map(document.getElementById('map'), {
												zoom: 5,
												center: new google.maps.LatLng(-0.8606915, 120.663729),
												mapTypeId: google.maps.MapTypeId.ROADMAP
											});

											var infowindow = new google.maps.InfoWindow();

											var marker, i;

											for (i = 0; i < locations.length; i++) {  
												marker = new google.maps.Marker({
												position: new google.maps.LatLng(locations[i][1], locations[i][2]),
												map: map
												});

												google.maps.event.addListener(marker, 'click', (function(marker, i) {
												return function() {
													infowindow.setContent(locations[i][0]);
													infowindow.open(map, marker);
												}
												})(marker, i));
											}
											}
											</script>
											<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUbRHtu3k_fg3jDGk_qAatE5jA4bC_ndE&callback=initMap" async defer></script>

										</div>
									</div>
								</div>
							</div>
							<!-- /profile map -->





							<!-- Sales stats -->
							<div class="card">
								<div class="card-header header-elements-sm-inline">
									<h6 class="card-title">Weekly statistics</h6>
									<div class="header-elements">
										<span><i class="icon-history mr-2 text-success"></i> Updated 3 hours ago</span>

										<div class="list-icons ml-3">
					                		<a class="list-icons-item" data-action="reload"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<div class="chart-container">
										<div class="chart has-fixed-height" id="weekly_statistics"></div>
									</div>
								</div>
							</div>
							<!-- /sales stats -->

					    <div class="tab-pane fade" id="schedule">

				    		<!-- Available hours -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h6 class="card-title">Available hours</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<div class="chart-container">
										<canvas id="mutuals"></canvas>
									</div>
								</div>
							</div>
							<!-- /available hours -->


							<!-- Schedule -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Friends mutual</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<div class="my-schedule">
										<ul class="media-list media-list-linked">
											<li class="media bg-light font-weight-semibold py-2">All friends</li>
											@foreach($mutual as $dataMutual)
												<li>
													<a href="{{URL::to('/akun/'.$dataMutual->id_pengguna.'')}}" class="media">
														<div class="mr-3"><img src="{{url('/')}}/{{$dataMutual->profile_picture}}" class="rounded-circle" width="40" height="40" alt=""></div>
														<div class="media-body">
															<div class="media-title font-weight-semibold">{{$dataMutual->display_name}}</div>
															<span class="text-muted">{{$dataMutual->rating}}</span>
														</div>
														<div class="align-self-center ml-3 text-nowrap">
															<span class="text-muted">
																<i class="icon-pin-alt font-size-base mr-1"></i>
																Vienna
															</span>
														</div>
													</a>
												</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							<!-- /schedule -->

				    	</div>

					    <div class="tab-pane fade" id="inbox">

							<!-- My inbox -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<h6 class="card-title">My inbox</h6>

									<div class="header-elements">
										<span class="badge bg-blue">25 new today</span>
				                	</div>
								</div>

								<!-- Action toolbar -->
								<div class="bg-light">
									<div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2">
										<div class="text-center d-lg-none w-100">
											<button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-multiple">
												<i class="icon-circle-down2"></i>
											</button>
										</div>

										<div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-multiple">
											<div class="mt-3 mt-lg-0">
												<div class="btn-group">
													<button type="button" class="btn btn-light btn-icon btn-checkbox-all">
														<input type="checkbox" class="form-input-styled" data-fouc>
													</button>

													<button type="button" class="btn btn-light btn-icon dropdown-toggle" data-toggle="dropdown"></button>
													<div class="dropdown-menu">
														<a href="#" class="dropdown-item">Select all</a>
														<a href="#" class="dropdown-item">Select read</a>
														<a href="#" class="dropdown-item">Select unread</a>
														<div class="dropdown-divider"></div>
														<a href="#" class="dropdown-item">Clear selection</a>
													</div>
												</div>

												<div class="btn-group ml-3 mr-lg-3">
													<button type="button" class="btn btn-light"><i class="icon-pencil7"></i> <span class="d-none d-lg-inline-block ml-2">Compose</span></button>
													<button type="button" class="btn btn-light"><i class="icon-bin"></i> <span class="d-none d-lg-inline-block ml-2">Delete</span></button>
							                    	<button type="button" class="btn btn-light"><i class="icon-spam"></i> <span class="d-none d-lg-inline-block ml-2">Spam</span></button>
												</div>
											</div>

											<div class="navbar-text ml-lg-auto"><span class="font-weight-semibold">1-50</span> of <span class="font-weight-semibold">528</span></div>

											<div class="ml-lg-3 mb-3 mb-lg-0">
												<div class="btn-group">
													<button type="button" class="btn btn-light btn-icon disabled"><i class="icon-arrow-left12"></i></button>
							                    	<button type="button" class="btn btn-light btn-icon"><i class="icon-arrow-right13"></i></button>
												</div>

												<div class="btn-group ml-3">
													<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></button>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item">Action</a>
														<a href="#" class="dropdown-item">Another action</a>
														<a href="#" class="dropdown-item">Something else here</a>
														<a href="#" class="dropdown-item">One more line</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /action toolbar -->


								<!-- Table -->
								<div class="table-responsive">
									<table class="table table-inbox">
										<tbody data-link="row" class="rowlink">
											<tr class="unread">
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/brands/spotify.png" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Spotify</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">On Tower-hill, as you go down &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">To the London docks, you may have seen a crippled beggar (or KEDGER, as the sailors say) holding a painted board before him, representing the tragic scene in which he lost his leg</span>
												</td>
												<td class="table-inbox-attachment">
													<i class="icon-attachment text-muted"></i>
												</td>
												<td class="table-inbox-time">
													11:09 pm
												</td>
											</tr>

											<tr class="unread">
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<span class="btn bg-warning-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">James Alexander</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject"><span class="badge bg-success mr-2">Promo</span> There are three whales and three boats &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
												</td>
												<td class="table-inbox-attachment">
													<i class="icon-attachment text-muted"></i>
												</td>
												<td class="table-inbox-time">
													10:21 pm
												</td>
											</tr>

											<tr class="unread">
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-full2 text-warning-300"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Nathan Jacobson</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">Any time these ten years, they tell me, has that man held up &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">That picture, and exhibited that stump to an incredulous world. But the time of his justification has now come. His three whales are as good whales as were ever published in Wapping, at any rate; and his stump</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													8:37 pm
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-full2 text-warning-300"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<span class="btn bg-indigo-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Margo Baker</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">Throughout the Pacific, and also in Nantucket, and New Bedford &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													4:28 am
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/brands/dribbble.png" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Dribbble</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">The whalemen call the numerous little ingenious contrivances &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">They elaborately carve out of the rough material, in their hours of ocean leisure. Some of them have little boxes of dentistical-looking implements</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													Dec 5
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<span class="btn bg-brown-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Hanna Dorman</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">Some of them have little boxes of dentistical-looking implements &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">Specially intended for the skrimshandering business. But, in general, they toil with their jack-knives alone; and, with that almost omnipotent tool of the sailor</span>
												</td>
												<td class="table-inbox-attachment">
													<i class="icon-attachment text-muted"></i>
												</td>
												<td class="table-inbox-time">
													Dec 5
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/brands/twitter.png" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Twitter</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject"><span class="badge bg-indigo-400 mr-2">Order</span> Long exile from Christendom &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">And civilization inevitably restores a man to that condition in which God placed him, i.e. what is called savagery</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													Dec 4
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-full2 text-warning-300"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<span class="btn bg-pink-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Vanessa Aurelius</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">Your true whale-hunter is as much a savage as an Iroquois &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">I myself am a savage, owning no allegiance but to the King of the Cannibals; and ready at any moment to rebel against him. Now, one of the peculiar characteristics of the savage in his domestic hours</span>
												</td>
												<td class="table-inbox-attachment">
													<i class="icon-attachment text-muted"></i>
												</td>
												<td class="table-inbox-time">
													Dec 4
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">William Brenson</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">An ancient Hawaiian war-club or spear-paddle &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">In its full multiplicity and elaboration of carving, is as great a trophy of human perseverance as a Latin lexicon. For, with but a bit of broken sea-shell or a shark's tooth</span>
												</td>
												<td class="table-inbox-attachment">
													<i class="icon-attachment text-muted"></i>
												</td>
												<td class="table-inbox-time">
													Dec 4
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/brands/facebook.png" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Facebook</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">As with the Hawaiian savage, so with the white sailor-savage &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">With the same marvellous patience, and with the same single shark's tooth, of his one poor jack-knife, he will carve you a bit of bone sculpture, not quite as workmanlike</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													Dec 3
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-full2 text-warning-300"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Vicky Barna</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject"><span class="badge bg-pink-400 mr-2">Track</span> Achilles's shield &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">Wooden whales, or whales cut in profile out of the small dark slabs of the noble South Sea war-wood, are frequently met with in the forecastles of American whalers. Some of them are done with much accuracy</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													Dec 2
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/brands/youtube.png" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Youtube</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">At some old gable-roofed country houses &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">You will see brass whales hung by the tail for knockers to the road-side door. When the porter is sleepy, the anvil-headed whale would be best. But these knocking whales are seldom remarkable as faithful essays</span>
												</td>
												<td class="table-inbox-attachment">
													<i class="icon-attachment text-muted"></i>
												</td>
												<td class="table-inbox-time">
													Nov 30
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Tony Gurrano</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">On the spires of some old-fashioned churches &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">You will see sheet-iron whales placed there for weather-cocks; but they are so elevated, and besides that are to all intents and purposes so labelled with "HANDS OFF!" you cannot examine them</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													Nov 28
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-empty3 text-muted"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<span class="btn bg-danger-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Barbara Walden</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">In bony, ribby regions of the earth &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">Where at the base of high broken cliffs masses of rock lie strewn in fantastic groupings upon the plain, you will often discover images as of the petrified forms</span>
												</td>
												<td class="table-inbox-attachment"></td>
												<td class="table-inbox-time">
													Nov 28
												</td>
											</tr>

											<tr>
												<td class="table-inbox-checkbox rowlink-skip">
													<input type="checkbox" class="form-input-styled" data-fouc>
												</td>
												<td class="table-inbox-star rowlink-skip">
													<a href="#">
														<i class="icon-star-full2 text-warning-300"></i>
													</a>
												</td>
												<td class="table-inbox-image">
													<img src="{{url('/')}}/limitless/Template/global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
												</td>
												<td class="table-inbox-name">
													<a href="mail_read.html">
														<div class="letter-icon-title text-default">Amazon</div>
													</a>
												</td>
												<td class="table-inbox-message">
													<div class="table-inbox-subject">Here and there from some lucky point of view &nbsp;-&nbsp;</div>
													<span class="text-muted font-weight-normal">You will catch passing glimpses of the profiles of whales defined along the undulating ridges. But you must be a thorough whaleman, to see these sights; and not only that, but if you wish to return to such a sight again</span>
												</td>
												<td class="table-inbox-attachment">
													<i class="icon-attachment text-muted"></i>
												</td>
												<td class="table-inbox-time">
													Nov 27
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- /table -->

							</div>
							<!-- /my inbox -->

				    	</div>

				    	<div class="tab-pane fade" id="orders">

							<!-- Orders history -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h6 class="card-title">Groups</h6>
									<div class="header-elements">
									<span><i class="icon-arrow-down22 text-danger"></i> <span class="font-weight-semibold">~ @if( ($dibuatAktif + $bergabungAktif + $dibuatInaktif + $bergabungInaktif)== 0) @else { {{ (($dibuatAktif + $bergabungAktif)/($dibuatAktif + $bergabungAktif + $dibuatInaktif + $bergabungInaktif) )*100 }} } @endif %</span></span>
			                		</div>
								</div>

								<div class="card-body">
									<div class="chart-container">
										<div class="row justify-content-md-center">
											<div class="col-md-7">
												<canvas id="groupsChart" style="display: block;" ></canvas>
											</div>
										</div>
										
									</div>
								</div>

								<div class="table-responsive">
									<table class="table text-nowrap">
										<tbody>
											<tr class="table-active">
												<td colspan="7" class="font-weight-semibold">Made by : {{$pengguna->display_name}}</td>
												<td class="text-right">
													<span class="badge bg-secondary badge-pill">{{$dibuatAktif + $dibuatInaktif }}</span>
												</td>
											</tr>
											@foreach($inovasi as $dataInovasi)
												<tr>
													<td class="pr-0" style="width: 45px;">
														<a href="{{ URL::to('/inovasi/'.$dataInovasi->id_inovasi.'' )}}">
															<img src="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
														</a>
													</td>
													<td>
														<a href="{{ URL::to('/inovasi/'.$dataInovasi->id_inovasi.'' )}} " class="font-weight-semibold"> {{$dataInovasi->judul}} </a>
														<div class="text-muted font-size-sm">
															@if( $dataInovasi->status == 1)
																<span class="badge badge-mark bg-grey border-success mr-1"></span>
																Active
															@else
																<span class="badge badge-mark bg-grey border-grey mr-1"></span>
																Inactive
															@endif
															
														</div>
													</td>
													<td>{{$dataInovasi->tagline}}</td>
													<td>
														<h6 class="mb-0 font-weight-semibold">20</h6>
													</td>
													<td class="text-center">
														<div class="list-icons">
															<div class="list-icons-item dropdown">
																<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
																	<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
																	<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
																	<div class="dropdown-divider"></div>
																	<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
											@endforeach


											<tr class="table-active">
												<td colspan="7" class="font-weight-semibold"> {{$pengguna->display_name}} has joined</td>
													<td class="text-right">
														<span class="badge bg-secondary badge-pill">{{$bergabungAktif + $bergabungInaktif }}</span>
													</td>
												</tr>
												@foreach($subscription as $subScription)
													<tr>
														<td class="pr-0" style="width: 45px;">
															<a href="{{ URL::to('/inovasi/'.$subScription->id_inovasi.'' )}}">
																<img src="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
															</a>
														</td>
														<td>
															<a href="{{ URL::to('/inovasi/'.$subScription->id_inovasi.'' )}}" class="font-weight-semibold"> {{$subScription->judul}} </a>
															<div class="text-muted font-size-sm">
																@if( $subScription->status == 1)
																	<span class="badge badge-mark bg-grey border-success mr-1"></span>
																	Active
																@else
																	<span class="badge badge-mark bg-grey border-grey mr-1"></span>
																	Inactive
																@endif
																
															</div>
														</td>
														<td>{{$subScription->tagline}}</td>
														<td>
															<h6 class="mb-0 font-weight-semibold">20</h6>
														</td>
														<td class="text-center">
															<div class="list-icons">
																<div class="list-icons-item dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
																		<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
																		<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
																		<div class="dropdown-divider"></div>
																		<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
																	</div>
																</div>
															</div>
														</td>
													</tr>
												@endforeach

											
										</tbody>
									</table>
									
								</div>
							</div>
							<!-- /orders history -->

				    	</div>
					</div>
					<!-- /right content -->

				</div>
				<!-- /inner container -->

			</div>
			<!-- /content area -->


		</div>
        <!-- /main content -->
</div>


@endsection

@section('script')
	<script>
		$(document).ready(function() {
			$("#dashboard").hide();
			$("#dashboardInnactive").show();
			$("#dashboardMainButtonActive").hide();
			$("#dashboardMainButtonInnactive").show();

			$("#akun").show();
			$("#akunInnactive").hide();
			$("#akunMainButtonActive").show();
			$("#akunMainButtonInnactive").hide();

			$("#ide").hide();
			$("#ideInnactive").show();
			$("#ideMainButtonActive").hide();
			$("#ideMainButtonInnactive").show();

			$("#group").hide();
			$("#groupInnactive").show();
			$("#groupMainButtonActive").hide();
			$("#groupMainButtonInnactive").show();





			var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
			var d = new Date();
			var today = months[d.getMonth()];


			var last = new Date(d.getTime() - (30 * 24 * 60 * 60 * 1000));
			var m1=months[last.getMonth()];
			
			var last = new Date(d.getTime() - (60 * 24 * 60 * 60 * 1000));
			var m2 = months[last.getMonth()];

			var last = new Date(d.getTime() - (90 * 24 * 60 * 60 * 1000));
			var m3 = months[last.getMonth()];

			var last = new Date(d.getTime() - (120 * 24 * 60 * 60 * 1000));
			var m4 = months[last.getMonth()];

			var last = new Date(d.getTime() - (150 * 24 * 60 * 60 * 1000));
			var m5 = months[last.getMonth()];

			var last = new Date(d.getTime() - (180 * 24 * 60 * 60 * 1000));
			var m6 = months[last.getMonth()];


			var ctx = document.getElementById("mutuals").getContext('2d');
			var groupChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [m6, m5, m4, m3, m2 ,m1 , today],
					datasets: [{
						label: 'mutuals',
						data: [1,2,3,4,5,6,7],
						backgroundColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)',
							'rgba(95, 146, 109, 1)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)',
							'rgba(95, 146, 109, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					title: {
					display: true,
					text: "Summary followers by months",
					},
					legend: {
					display: false
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});


			var ctx = document.getElementById("groupsChart").getContext('2d');
			var groupChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["formed and aktive", "formed and inactive", "Join and active", "join and inactive"],
					datasets: [{
						label: 'amount',
						data: [{{$dibuatAktif}}, {{$dibuatInaktif}}, {{$bergabungAktif}}, {{$bergabungInaktif}} ],
						backgroundColor: [
						'rgba(54, 162, 235, 1)',
						'rgba(255, 99, 132, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(255, 159, 64, 1)',
						],
						borderColor: [
						'rgba(54, 162, 235, 1)',
						'rgba(255, 99, 132, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(255, 159, 64, 1)',
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					title: {
						display: true,
						text: "User's group statistics",
					},
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					},
				}
			});



		});
	</script>
@endsection
