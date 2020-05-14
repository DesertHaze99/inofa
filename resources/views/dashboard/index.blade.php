@extends('layouts.primary')

@section('head')
	<!-- Core JS files -->
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/loaders/progressbar.min.js')}}"></script>
	<script href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/js/app.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/components_progress.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets//global_assets/js/demo_pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->

	<style>
		#customSidebar{
			height:120vh;
		}
	</style>
@endsection


@section('content')

@if ($errors->any())
	<div class="box-body col-12 col-md-12 col-lg-12">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Error!</h4>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif

@if (session('success'))
	<div class="box-body">
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Success!</h4>
				{{ session('success') }}
		</div>
	</div>
@endif

@if (session('error'))
	<div class="box-body">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Error!</h4>
				{{ session('error') }}
		</div>
	</div>
@endif

<!-- Dashboard content -->
<div class="row margin">

	<div class="col-xl-12">
		<!-- Top Banner -->
		<div class="row">
			<div class="col-sm-3">
				<div class="card text-left myRounded" >
					<div class="card-body">
						<h6 class="mb-0">
							<span class="badge bg-orange-300 badge-icon"><i class="icon-user"></i></span>
							<span class="badge badge-flat badge-pill border-primary text-primary-600 float-right">+23</span>
							<span class="px-1 font-weight-bold margin d-block">{{$jmlPengguna}}</span>
							<span class="px-1 font-size-base text-muted d-block">Pengguna</span>
						</h6>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card text-left myRounded" >
					<div class="card-body">
						<h6 class="mb-0">
							<span class="badge bg-blue-300 badge-icon"><i class="icon-users4"></i></span>
							<span class="badge badge-flat badge-pill border-primary text-primary-600 float-right">+23</span>
							<span class="px-1 font-weight-bold margin d-block">{{$jmlGroup}}</span>
							<span class="px-1 font-size-base text-muted d-block">Group</span>
						</h6>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card text-left myRounded " >
					<div class="card-body">
						<h6 class="mb-0">
							<span class="badge bg-teal-300 badge-icon"><i class="icon-brain"></i></span>
							<span class="badge badge-flat badge-pill border-primary text-primary-600 float-right">+23</span>
							<span class="px-1 font-weight-bold margin d-block">{{$jmlGroup}}</span>
							<span class="px-1 font-size-base text-muted d-block">Ide</span>
						</h6>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card text-left myRounded" >
					<div class="card-body">
						<h6 class="mb-0">
							<span class="badge bg-violet-300 badge-icon"><i class="icon-bubbles7"></i></span>
							<span class="badge badge-flat badge-pill border-primary text-primary-600 float-right">+23</span>
							<span class="px-1 font-weight-bold margin d-block">{{$jmlDiskusi}}</span>
							<span class="px-1 font-size-base text-muted d-block">Diskusi</span>
						</h6>
					</div>
				</div>
			</div>
			
		</div>
		<!-- /Top Banner -->

		<!-- Top Banner -->
		<div class="row bg-white myRounded padding margin  align-content-start ">
			<div class="col-sm-6">
				<div class="card-body">
					<h4 class="font-weight-bold margin">Lokasi Teratas</h4>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="card-body">
					<div class="row">
						<div class="col-md-9">
							<h6 class="font-weight-bold margin">Yogyakarta</h6>
						</div>
						<div class="col-md-3 float-right text-right">
							<h6 class=" font-weight-bold text-right margin ">999</h6>
						</div>
					</div>

					<div class="progress mb-3" style="height: 0.7rem;">
						<div class="progress-bar rounded-round bg-myBlue" style="width: 90%"></div>
					</div>
					

					
					<div class="row">
						<div class="col-md-9">
							<h6 class="font-weight-bold margin">Jakarta</h6>
						</div>
						<div class="col-md-3 float-right text-right">
							<h6 class=" font-weight-bold text-right margin ">999</h6>
						</div>
					</div>
					<div class="progress mb-3" style="height: 0.7rem;">
						<div class="progress-bar bg-teal rounded-round bg-myOrange " style="width: 70%"></div>
					</div>



					<div class="row">
						<div class="col-md-9">
							<h6 class="font-weight-bold margin">Bandung</h6>
						</div>
						<div class="col-md-3 float-right text-right">
							<h6 class=" font-weight-bold text-right margin ">999</h6>
						</div>
					</div>
					<div class="progress mb-3" style="height: 0.7rem;">
						<div class="progress-bar rounded-round bg-myPink " style="width: 50%"></div>
					</div>

					
					
					<div class="row">
						<div class="col-md-9">
							<h6 class="font-weight-bold margin">Semarang</h6>
						</div>
						<div class="col-md-3 float-right text-right">
							<h6 class=" font-weight-bold text-right margin ">999</h6>
						</div>
					</div>
					<div class="progress mb-3" style="height: 0.7rem;">
						<div class="progress-bar rounded-round bg-darkBlue " style="width: 30%"></div>
					</div>

					
					
					<div class="row">
						<div class="col-md-9">
							<h6 class="font-weight-bold margin">Solo</h6>
						</div>
						<div class="col-md-3 float-right text-right">
							<h6 class=" font-weight-bold text-right margin ">999</h6>
						</div>
					</div>
					<div class="progress mb-3" style="height: 0.7rem;">
						<div class="progress-bar rounded-round bg-myTeal " style="width: 10%"></div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- /Top Banner -->

		<br>
		<div class="row">
			<div class="col-md-6">
				<div class="card myRounded bg-myBlue">
					<div class="card-body">
						<div class="row">
							<div class="col-md-5">
								<a href="#" class="d-inline-block">
									<img src="http://localhost:8000/limitless/Template/global_assets/images/brainstorming.png" alt="" style="width:80%;height:80%">
								</a>
							</div>
							<div class="col-md-7 padding align-items-center justify-content-center rounded p-2">
								<h4 class="py-1 px-3 mb-0 font-weight-bold">Ide terbaru</h4>
								<h6 class="py-1 px-3 mb-0">23 ide baru ditemukan</h6>
							</div>
						</div>
					</div>
					
				</div>
				<div class="card myRounded">
					<div class="card-body">
						<h6 class="font-weight-bold margin">Kategori</h6>
						
						@foreach($kategori as $data)
							<h6 class="mb-0 d-flex align-items-baseline justify-content-center ">
									<div class="col-md-5 ">
										<span class="py-1 px-3 badge bg-teal-300 badge-icon"><i class="icon-brain"></i></span>
										<span class="py-2 px-1 py-3 mb-0 font-weight-bold ">{{$data->kategori}}</span>
									</div>
									<div class="col-md-5 py-2 px-3">
										<div class="progress mb-3" style="height: 0.7rem;">
											<div class="progress-bar rounded-round bg-darkBlue " style="width: 30%"></div>
										</div>
									</div>
									<div class="col-md-2">
										<span class="py-2 px-3 mb-0 font-weight-bold ">999</span>
									</div>
							</h6>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card myRounded">
					<div class="card-body">
						<h6 class="font-weight-bold margin">Pengguna Terbaru</h6>

						@foreach($dataPengguna as $pengguna)
							<h6 class="mb-0 d-flex align-items-center justify-content-center ">
								<div class="col-md-1 py-2 px-3 ">
									<a href="#" class="d-inline-block">
										<img src="{{url('/')}}/{{$pengguna->profile_picture}}" class="rounded-circle" width="30" height="30"  alt="" >
									</a>
								</div>
								<div class="col-md-11 px-3 py-2 ">
									<h6 class="mb-0 px-1 font-weight-semibold">{{$pengguna->display_name}} </h6>
									<p class="mb-0 text-muted  "><small class="font-weight-semibold ml-1">{{$pengguna->email}}</small></p>
								</div>
							</h6>
						@endforeach
						<br>
						<center> <button type="button" class="myRounded btn btn-sm btn-outline bg-myBlue text-blue-400 border-blue-400">Selengkapnya</button> </center>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
<!-- /dashboard content -->


@endsection


@section('librariesJS')
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/uploaders/dropzone.min.js') }}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/uploader_dropzone.js') }}"></script>
@endsection

@section('script')
	<script>
		$(document).ready(function() {
			$("#dashboard").show();
			$("#dashboardInnactive").hide();
			$("#dashboardMainButtonActive").show();
			$("#dashboardMainButtonInnactive").hide();

			$("#akun").hide();
			$("#akunInnactive").show();
			$("#akunMainButtonActive").hide();
			$("#akunMainButtonInnactive").show();

			$("#ide").hide();
			$("#ideInnactive").show();
			$("#ideMainButtonActive").hide();
			$("#ideMainButtonInnactive").show();

			$("#group").hide();
			$("#groupInnactive").show();
			$("#groupMainButtonActive").hide();
			$("#groupMainButtonInnactive").show();

        });

        
	</script>
@endsection
