@extends('layouts.primary')

@section('librariesCSS')
	<!-- Core JS files -->
	<script src="{{ asset('limitless/Template/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/core/main.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js')}}"></script>

	<script src="{{ asset('limitless/Template/layout_1/LTR/default/full/assets/js/app.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/user_pages_profile.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/gallery.js')}}"></script>
	<!-- /theme JS files -->

	<!-- chart js -->
	<script src="{{ asset('limitless/Template/global_assets/js/chart/Chart.js')}}"></script>

@endsection


@section('content')

	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light mb-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Inovasi </span> - Profile Inovasi</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="user_pages_profile_cover.html" class="breadcrumb-item">User pages</a>
							<span class="breadcrumb-item active">Profile cover</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


				<!-- Cover area -->
				<div class="profile-cover">
					<div class="profile-cover-img" style="background-image: url({{url('/')}}/upload/image/thumbnail.jpg)"></div>
					<div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
						<div class="mr-md-3 mb-2 mb-md-0">
							<a href="#" class="profile-thumb">
								<img src="{{url('/')}}{{$inovasi->thumbnail}}" class="border-white rounded-circle" width="48" height="48" alt="">
							</a>
						</div>

						<div class="media-body text-white">
							<h1 class="mb-0">{{$inovasi->judul}}</h1>
							@if( $inovasi->status == 1 )
								<span class="badge bg-success-400 ml-md-auto mr-md-3">Aktif</span>
							@else
								<span class="badge bg-danger-400 ml-md-auto mr-md-3">Tidak Aktif</span>
							@endif
				    		
						</div>

						<div class="ml-md-3 mt-2 mt-md-0">
							<ul class="list-inline list-inline-condensed mb-0">
								<li class="list-inline-item"><a href="#" class="btn btn-light border-transparent"><i class="icon-file-picture mr-2"></i> Cover image</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /cover area -->


				<!-- Profile navigation -->
				<div class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
							<i class="icon-menu7 mr-2"></i>
							Profile navigation
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-second">
						<ul class="nav navbar-nav">
							<li class="nav-item">
								<a href="#activity" class="navbar-nav-link active" data-toggle="tab">
									<i class="icon-menu7 mr-2"></i>
									Chats
								</a>
							</li>
							<li class="nav-item">
								<a href="#schedule" class="navbar-nav-link" data-toggle="tab">
									<i class="icon-calendar3 mr-2"></i>
									Statistic
									<span class="badge badge-pill bg-success position-static ml-auto ml-lg-2">32</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#media" class="navbar-nav-link" data-toggle="tab">
									<i class="icon-images3 mr-2"></i>
									Media
								</a>
							</li>
							<li class="nav-item">
								<a href="#settings" class="navbar-nav-link" data-toggle="tab">
									<i class="icon-cog3 mr-2"></i>
									Group Information
								</a>
							</li>
						</ul>

						
					</div>
				</div>
				<!-- /profile navigation -->

				<br>
			<!-- Content area -->
			<div class="content">

				<!-- Inner container -->
				<div class="d-flex align-items-start flex-column flex-md-row">
					
					<!-- Left content -->
					<div class="tab-content w-100 order-2 order-md-1">
						<div class="tab-pane fade active show" id="activity">
							
							<!-- Messages -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h6 class="card-title">Pembicaraan dalam group</h6>
									<div class="header-elements">
										<div class="list-icons ml-3">
											<div class="list-icons-item dropdown">
												<a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
													<i class="icon-arrow-down12"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
													<a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
													<a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
													<div class="dropdown-divider"></div>
													<a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
													<a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
												</div>
											</div>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<ul class="media-list media-chat media-chat-scrollable mb-3">

											@foreach($chats as $chat)
											
												@if(($chat->created_at != date("Y-m-d H:i:s")) )
													<li class="media content-divider justify-content-center text-muted mx-0">{{$chat->created_at}}</li>
												
												@else
													<li class="media content-divider justify-content-center text-muted mx-0">Today</li>
												@endif
												
												@if($chat->id_pengguna == -1)
													<li class="media content-divider justify-content-center text-muted mx-0">{{$chat->content}}</li>
												@elseif($chat->id_pengguna == $temp)
												
													<li class="media media-chat-item-reverse">
														<div class="media-body">
															<div class="media-chat-item">{{$chat->content}}</div>
															<div class="font-size-sm text-muted mt-2">{{$chat->created_at}}<a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
														</div>

														<div class="ml-3">
															<a href="{{url('/')}}/limitless/Template//global_assets/images/placeholders/placeholder.jpg">
																<img src="{{url('/')}}/{{$chat->profile_picture}}" class="rounded-circle" width="40" height="40" alt="">
															</a>
														</div>
													</li>
												@else

													<li class="media">
														<div class="mr-3">
															<a href="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg">
																<img src="{{url('/')}}/{{url('/')}}{{$chat->profile_picture}}" class="rounded-circle" width="40" height="40" alt="">
															</a>
														</div>

														<div class="media-body">
															<div class="media-chat-item">{{$chat->content}}</div>
															<div class="font-size-sm text-muted mt-2">{{$chat->created_at}}<a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
														</div>
													</li>
												@endif
											
											<?php $temp = $chat->id_pengguna; ?>	
											
											@endforeach
									</ul>
								</div>
							</div>
							<!-- /messages -->
					    </div>


					    <div class="tab-pane fade" id="media">

				    		<!-- Media -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h6 class="card-title">Media</h6>
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
										<div class="chart has-fixed-height" >
											<!-- Video grid -->
											<div class="mb-3 pt-2">
												<h6 class="mb-0 font-weight-semibold">
													All media
												</h6>
												<span class="text-muted d-block">All media that send on this group</span>
											</div>

											<div class="row">
												<div class="col-sm-6 col-lg-3">
													<div class="card">
														<div class="card-img-actions m-1">
															<div class="card-img embed-responsive embed-responsive-16by9">
																<iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://player.vimeo.com/video/126945693?title=0&amp;byline=0&amp;portrait=0" webkitallowfullscreen=""></iframe>
															</div>
														</div>
													</div>
												</div>

												<div class="col-sm-6 col-lg-3">
													<div class="card">
														<div class="card-img-actions m-1">
															<div class="card-img embed-responsive embed-responsive-16by9">
																<iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://player.vimeo.com/video/89546048?title=0&amp;byline=0&amp;portrait=0" webkitallowfullscreen=""></iframe>
															</div>
														</div>
													</div>
												</div>

												<div class="col-sm-6 col-lg-3">
													<div class="card">
														<div class="card-img-actions m-1">
															<div class="card-img embed-responsive embed-responsive-16by9">
																<iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://player.vimeo.com/video/126580704?title=0&amp;byline=0&amp;portrait=0" webkitallowfullscreen=""></iframe>
															</div>
														</div>
													</div>
												</div>

												<div class="col-sm-6 col-lg-3">
													<div class="card">
														<div class="card-img-actions m-1">
															<div class="card-img embed-responsive embed-responsive-16by9">
																<iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="https://player.vimeo.com/video/127790272?title=0&amp;byline=0&amp;portrait=0" webkitallowfullscreen=""></iframe>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Video grid -->
										</div>
									</div>
								</div>
							</div>
							<!-- / Media -->


							<!-- Schedule -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">My schedule</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<div class="my-schedule"></div>
								</div>
							</div>
							<!-- /schedule -->

						</div>
						
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
										<div class="chart has-fixed-height" id="available_hours"></div>
									</div>
								</div>
							</div>
							<!-- /available hours -->


							<!-- Schedule -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">My schedule</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<div class="my-schedule"></div>
								</div>
							</div>
							<!-- /schedule -->

				    	</div>


					    <div class="tab-pane fade" id="settings">

							<!-- Profile info -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Group Information</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Nama Inovasi</label>
													<input type="text" value="{{$inovasi->judul}}" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Maker</label>
													<input type="text" value="{{$inovasi->display_name}}" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Tagline</label>
													<input type="text" value="{{$inovasi->tagline}}" class="form-control">
												</div>
												<div class="col-md-6">
													
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>City</label>
													<input type="text" value="Munich" class="form-control">
												</div>
												<div class="col-md-4">
													<label>State/Province</label>
													<input type="text" value="Bayern" class="form-control">
												</div>
												<div class="col-md-4">
													<label>ZIP code</label>
													<input type="text" value="1031" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Email</label>
													<input type="text" readonly="readonly" value="eugene@kopyov.com" class="form-control">
												</div>
												<div class="col-md-6">
						                            <label>Your country</label>
						                            <select class="form-control form-control-select2" data-fouc>
						                                <option value="germany" selected>Germany</option> 
						                                <option value="france">France</option> 
						                                <option value="spain">Spain</option> 
						                                <option value="netherlands">Netherlands</option> 
						                                <option value="other">...</option> 
						                                <option value="uk">United Kingdom</option> 
						                            </select>
												</div>
											</div>
										</div>

				                        <div class="form-group">
				                        	<div class="row">
				                        		<div class="col-md-6">
													<label>Phone #</label>
													<input type="text" value="+99-99-9999-9999" class="form-control">
													<span class="form-text text-muted">+99-99-9999-9999</span>
				                        		</div>

												<div class="col-md-6">
													<label>Upload profile image</label>
				                                    <input type="file" class="form-input-styled" data-fouc>
				                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
				                        	</div>
				                        </div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->


							<!-- Account settings -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Account settings</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" value="Kopyov" readonly="readonly" class="form-control">
												</div>

												<div class="col-md-6">
													<label>Current password</label>
													<input type="password" value="password" readonly="readonly" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>New password</label>
													<input type="password" placeholder="Enter new password" class="form-control">
												</div>

												<div class="col-md-6">
													<label>Repeat password</label>
													<input type="password" placeholder="Repeat new password" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Profile visibility</label>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" checked data-fouc>
															Visible to everyone
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" data-fouc>
															Visible to friends only
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" data-fouc>
															Visible to my connections only
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" name="visibility" class="form-input-styled" data-fouc>
															Visible to my colleagues only
														</label>
													</div>
												</div>

												<div class="col-md-6">
													<label>Notifications</label>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled" checked data-fouc>
															Password expiration notification
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled" checked data-fouc>
															New message notification
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled" checked data-fouc>
															New task notification
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-input-styled">
															New contact request notification
														</label>
													</div>
												</div>
											</div>
										</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
			                        </form>
								</div>
							</div>
							<!-- /account settings -->

				    	</div>
					</div>
					<!-- /left content -->


					<!-- Right sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-lg-2 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Latest connections -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="card-title font-weight-semibold">Anggota : </span>
									<div class="header-elements">
										<span class="badge bg-success badge-pill">{{$jumlahAnggota}}</span>
			                		</div>
								</div>

								<ul class="media-list media-list-linked my-2">
									@if(!empty($anggota))
										@foreach($anggota as $dataAnggota)
											@if($dataAnggota->status == "anggota")
												<li >
													<a href="#" class="media">
														<div class="mr-3">
															<img src="{{url('/')}}/{{$dataAnggota->profile_picture}}" class="rounded-circle" width="40" height="40" alt="">
														</div>
														<div class="media-body">
															<div class="media-title font-weight-semibold">{{$dataAnggota->display_name}}</div>
															<span class="text-muted font-size-sm">{{$dataAnggota->email}}</span>
														</div>
														<div class="align-self-center ml-3">
															<span class="badge badge-mark bg-success border-success"></span>
														</div>
													</a>
												</li>
											@elseif($dataAnggota->status == "pending")
												<li >
													<a href="#" class="media">
														<div class="mr-3">
															<img src="{{url('/')}}/{{$dataAnggota->profile_picture}}" class="rounded-circle" width="40" height="40" alt="">
														</div>
														<div class="media-body">
															<div class="media-title font-weight-semibold">{{$dataAnggota->display_name}}</div>
															<span class="text-muted font-size-sm">{{$dataAnggota->email}}</span>
														</div>
														<div class="align-self-center ml-3">
															<span class="badge badge-mark bg-success border-warning"></span>
														</div>
													</a>
												</li>												
											@endif
										
										@endforeach
									@else
										<li>
											<a href="#" class="media">
												<div class="mr-3">
													
												</div>
												<div class="media-body">
													<div class="media-title font-weight-semibold">Tidak ada daftar</div>
													<span class="text-muted font-size-sm">0</span>
												</div>
												<div class="align-self-center ml-3">
													<span class="badge badge-mark bg-success border-success"></span>
												</div>
											</a>
										</li>
									@endif
									<li>
										<a href="#" class="media">
											<div class="mr-3">
												
											</div>
											<div class="media-body">
												
						
											</div>
											<div class="align-self-center ml-3">
												<span class="text-muted font-size-sm">Lihat Semua</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<!-- /latest connections -->

							<!-- Balance changes -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="card-title font-weight-semibold">Balance changes</span>
									<div class="header-elements">
										<span><i class="icon-arrow-down22 text-danger"></i> <span class="font-weight-semibold">- 29.4%</span></span>
			                		</div>
								</div>

								<div class="card-body">
									<div class="chart-container">
										<div class="chart has-fixed-height" id="balance_statistics"></div>
									</div>
								</div>
							</div>
							<!-- /balance changes -->

						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /right sidebar component -->

				</div>
				<!-- /inner container -->

			</div>
			<!-- /content area -->


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


@endsection

@section('script')
	<script>
		$(document).ready(function() {

			
		});
	</script>
@endsection
