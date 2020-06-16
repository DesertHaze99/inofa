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
			<a class="col-lg-3 col-md-6 col-sm-6 black" href="{{URL::to('/akun')}}">
				<div id="hover" class="card text-left myRounded" >
					<div  class="card-body hover">
						<div   class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-pengguna" ><i id="badgeIcon" class="pengguna far fa-user"></i></span>
							@if(!empty($jmlPenggunaNew)) <span id="badgeNew" class="badge myBorder badge-flat badge-pill text-primary-600 float-right"><b>+{{$jmlPenggunaNew}}</b></span> @endif
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>{{$jmlPengguna}}</b></span>
							<span class="px-1 font-size-base d-block">Pengguna</span>
						</div>
					</div>
				</div>
			</a>

			<a class="col-lg-3 col-md-6 col-sm-6 black" href="{{URL::to('/group')}}">
				<div id="hover" class="card text-left myRounded" >
					<div class="card-body hover">
						<div  class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-group" ><i id="badgeIcon" class="group far fa-copy"></i></span>
							@if(!empty($jmlGroupNew)) <span id="badgeNew" class="badge myBorder badge-flat badge-pill text-primary-600 float-right"><b>+{{$jmlGroupNew}}</b></span> @endif
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>{{$jmlGroup}}</b></span>
							<span class="px-1 font-size-base d-block">Group</span>
						</div>
					</div>
				</div>
			</a>

			<a class="col-lg-3 col-md-6 col-sm-6 black" href="{{URL::to('/group')}}">
				<div id="hover" class="card text-left myRounded " >
					<div class="card-body hover">
						<div  class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-ide" ><i id="badgeIcon" class="ide far fa-lightbulb"></i></span>
							@if(!empty($jmlGroupNew)) <span id="badgeNew" class="badge myBorder badge-flat badge-pill text-primary-600 float-right"><b>+{{$jmlGroupNew}}</b></span> @endif
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>{{$jmlGroup}}</b></span>
							<span class="px-1 font-size-base d-block">Ide</span>
						</div>
					</div>
				</div>
			</a>

			<a class="col-lg-3 col-md-6 col-sm-6 black" href="{{URL::to('/group')}}">
				<div id="hover" class="card text-left myRounded" >
					<div class="card-body hover">
						<div  class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-diskusi" ><i id="badgeIcon" class="diskusi far fa-comments "></i></span>
							@if(!empty($jmlDiskusiNew)) <span id="badgeNew" class="badge myBorder badge-flat badge-pill text-primary-600 float-right"><b>+{{$jmlDiskusiNew}}</b></span> @endif
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>{{$jmlDiskusi}}</b></span>
							<span class="px-1 font-size-base d-block">Diskusi</span>
						</div>
					</div>
				</div>
			</a>
			
		</div>
		<!-- /Top Banner -->

		<!-- Top Banner -->
		<div class="row bg-white myRounded padding margin  align-content-start ">
			<div class="col-lg-6 col-md-12">
				<div class="chart-body">
					<h4 class="font-weight-bold margin">Lokasi Teratas</h4>
						<!-- #1 -->
						<input type="hidden" name="pertamaLongitude" id="pertamaLongitude" value="{{$wilayah[0]->longitude}}">
						<input type="hidden" name="pertamaLatitude" id="pertamaLatitude" value="{{$wilayah[0]->latitude}}">
						<input type="hidden" name="pertamaPropinsi" id="pertamaPropinsi" value="📍 1. {{$wilayah[0]->propinsi}}">
						<!-- /#1 -->
						<!-- #2 -->
						<input type="hidden" name="keduaLongitude" id="keduaLongitude" value="{{$wilayah[1]->longitude}}">
						<input type="hidden" name="keduaLatitude" id="keduaLatitude" value="{{$wilayah[1]->latitude}}">
						<input type="hidden" name="keduaPropinsi" id="keduaPropinsi" value="📍 2. {{$wilayah[1]->propinsi}}">
						<!-- /#2 -->
						<!-- #3 -->
						<input type="hidden" name="ketigaLongitude" id="ketigaLongitude" value="{{$wilayah[2]->longitude}}">
						<input type="hidden" name="ketigaLatitude" id="ketigaLatitude" value="{{$wilayah[2]->latitude}}">
						<input type="hidden" name="ketigaPropinsi" id="ketigaPropinsi" value="📍 3. {{$wilayah[2]->propinsi}}">
						<!-- /#3 -->
						<!-- #4 -->
						<input type="hidden" name="keempatLongitude" id="keempatLongitude" value="{{$wilayah[3]->longitude}}">
						<input type="hidden" name="keempatLatitude" id="keempatLatitude" value="{{$wilayah[3]->latitude}}">
						<input type="hidden" name="keempatPropinsi" id="keempatPropinsi" value="📍 4. {{$wilayah[3]->propinsi}}">
						<!-- /#4 -->
						<!-- #5 -->
						<input type="hidden" name="kelimaLongitude" id="kelimaLongitude" value="{{$wilayah[4]->longitude}}">
						<input type="hidden" name="kelimaLatitude" id="kelimaLatitude" value="{{$wilayah[4]->latitude}}">
						<input type="hidden" name="kelimaPropinsi" id="kelimaPropinsi" value="📍 5. {{$wilayah[4]->propinsi}}">
						<!-- /#5 -->

					<div class="chart " >
						
						<div class="myRounded" id="myMap" style="height:40vh"></div>

						<script type="text/javascript">

							var Lo1 = document.getElementById('pertamaLongitude').value;
							var La1 = document.getElementById('pertamaLatitude').value;
							var Na1 = document.getElementById('pertamaPropinsi').value;

							var Lo2 = document.getElementById('keduaLongitude').value;
							var La2 = document.getElementById('keduaLatitude').value;
							var Na2 = document.getElementById('keduaPropinsi').value;

							var Lo3 = document.getElementById('ketigaLongitude').value;
							var La3 = document.getElementById('ketigaLatitude').value;
							var Na3 = document.getElementById('ketigaPropinsi').value;

							var Lo4 = document.getElementById('keempatLongitude').value;
							var La4 = document.getElementById('keempatLatitude').value;
							var Na4 = document.getElementById('keempatPropinsi').value;

							var Lo5 = document.getElementById('kelimaLongitude').value;
							var La5 = document.getElementById('kelimaLatitude').value;
							var Na5 = document.getElementById('kelimaPropinsi').value;
							
							function initMap(){

							var locations = [
								[Na1, Lo1, La1, 16],
								[Na2, Lo2, La2, 16],
								[Na3, Lo3, La3, 16],
								[Na4, Lo4, La4, 16],
								[Na5, Lo5, La5, 16]
							];

							var map = new google.maps.Map(document.getElementById('myMap'), {
								zoom: 4,
								streetViewControl: false,
								center: new google.maps.LatLng(-2.9173321, 122.1012383),
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

			<div class="col-lg-6 col-md-12">
				<div class="card-body">
					<?php $i=0 ?>
					@foreach($wilayah as $dataWilayah)
						<div class="row">
							<div class="col-md-9">
								<h6 class="font-weight-bold margin">{{$dataWilayah->propinsi}}</h6>
							</div>
							<div class="col-md-3 float-right text-right">
								<h6 class=" font-weight-bold text-right margin ">{{$dataWilayah->jumlah}} <small class="text-muted">pengguna</small></h6>
							</div>
						</div>

						<div class="progress mb-3" style="height: 0.7rem;">
							<div class="progress-bar rounded-round {{$warna[$i]}}" style="width: {{(100*$dataWilayah->jumlah)/$jmlPengguna}}%"></div>
						</div>

						<?php $i=$i+1 ?>
					@endforeach
					
					
				</div>
				
			</div>
		</div>
		<!-- /Top Banner -->

		<br>
		<div class="row">
			<div class="col-md-12 col-lg-6">
				<div class="card myRounded bg-myBlue">
					<center>
					<div class="card-body">
						<a href="{{URL::to('/ide')}}">
							<div class="row">
								<div class="col-md-5">
									<a href="{{URL::to('/ide')}}" class="d-inline-block">
										<img src="{{URL('/')}}/limitless/Template/global_assets/images/brainstorming.png" alt="" style="width:80%;height:80%">
									</a>
								</div>
								<div class="col-md-7 padding align-items-center justify-content-center rounded p-2">
									<h4 class="py-1 px-3 mb-0 font-weight-bold">Ide terbaru</h4>
									<h6 class="py-1 px-3 mb-0">{{$jmlGroupNew}} ide baru ditemukan hari ini</h6>
								</div>
							</div>
						</a>
					</div>
					</center>
				</div>
				<div class="card myRounded">
					<div class="card-body">
						<h6 class="font-weight-bold margin">Kategori</h6>
						
						@foreach($kategori as $data)
							<h6 class="mb-0 d-flex align-items-baseline justify-content-center ">
								<div class="col-lg-5 col-md-7 col-sm-4">
									<span class="col-lg-4 col-md-4 col-sm-4 py-1 px-3 badge badge-icon" style="background-color: {{$data->warna}}; color:white"><i class="{{$data->kategori_thumbnail}}"></i></span>
									<span class="col-lg-8 col-md-8 col-sm-8 py-2 px-1 py-3 mb-0 font-weight-bold ">{{$data->kategori}}</span>
								</div>
								<div class="col-lg-5 col-md-4 col-sm-7 py-2 px-3">
									<div class="progress mb-3" style="height: 0.7rem;">
										<div class="progress-bar rounded-round bg-darkBlue " style="width: {{100*$data->jumlah/$jmlGroup}}%" ></div>
									</div>
								</div>
								<div class="col-lg-2 col-md-1 col-sm-1">
									<span class="py-2 px-3 mb-0 font-weight-bold ">{{$data->jumlah}}</span>
								</div>
							</h6>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-6">
				<div class="card myRounded">
					<div class="card-body">
						<h6 class="font-weight-bold margin">Pengguna Terbaru</h6>

						@foreach($dataPengguna as $pengguna)
							<h6 onclick="klikPengguna($pengguna->id_pengguna)" class="mb-0 d-flex align-items-center justify-content-center hover" style="border-bottom: 1px solid #E5E5E5">
								<div class="col-lg-2 col-md-2 col-sm-3 py-2 ">
									<center>
									<a href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="d-inline-block">
										<img src="{{$pengguna->profile_picture}}"  style="object-fit: cover;" class="rounded-circle" width="30" height="30"  alt="" >
									</a>
									</center>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-9 py-2 ">
									<h6 class="mb-0 px-1 font-weight-semibold">{{$pengguna->display_name}} </h6>
									<p class="mb-0 "><small class="font-weight-semibold ml-1">{{$pengguna->email}}</small></p>
								</div>
							</h6>
							
						@endforeach
						<br>
						<center> <a href="{{URL::to('/akun')}}" type="button" class="myRounded btn btn-sm btn-outline bg-myBlue text-blue-400 border-blue-400">Selengkapnya</a> </center>
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

			function klikPengguna(){
				setTimeout(function(id){
					window.location.href= '/akun/'+id;
				},10000)
			}

        });

        
	</script>
@endsection
