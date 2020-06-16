@extends('layouts.primary')

@section('librariesCSS')
    <script href="{{ asset('limitless/Template/global_assets/js/plugins/extensions/rowlink.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/core/main.min.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js') }}"></script>

	<script href="{{ asset('limitless/Template/layout_1/LTR/default/full/assets/js/app.js') }}"></script>
	<script href="{{ asset('limitless/Template/global_assets/js/demo_pages/user_pages_profile_tabbed.js') }}"></script>
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

<div id="contentDeep" class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Inner container -->
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-12 card d-flex justify-content-center myRounded" id="profilePict">
                            <center>
                            <div class="margin px-2 card-body bg-indigo-400 text-center card-img-top" style="background-color : white; border-radius:10px;color:black;width:100%">
                                <div class="card-img-actions d-inline-block mb-3">
                                <img class="rounded-circle" style="object-fit: cover;" src="{{$pengguna->profile_picture}}" width="100" height="100" alt="">
                                    <div class="card-img-actions-overlay rounded-circle">
                                        <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                            <i class="icon-mobile"></i>
                                        </a>
                                    </div>
                                </div>

                                <h6 class="font-weight-semibold mb-0 py-1">{{$pengguna->display_name}}</h6>
                                <span class="mb-0 font-weight-semibold myBlue py-1">📍 {{$pengguna->propinsi}}</span>
                                <span class="d-block opacity-75 py-1">{{$pengguna->email}}</span>
                                <br>
                                @if($pengguna->status == 1)
                                    <div class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#banned" class="btn btn-sm btn-danger">Nonaktifkan Pengguna<i class="icon-lock2 ml-2"></i></button>
                                    </div>
                                @elseif($pengguna->status == 0)
                                    <div class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#unBanned"  class="btn btn-sm btn-warning">Aktifkan Pengguna<i class="icon-unlocked2 ml-2"></i></button>
                                    </div>
                                @endif
                            </div>
                            </center>
                            <input type="hidden" name="longitude" id="longitude" value="{{$pengguna->longitude}}">
                            <input type="hidden" name="latitude" id="latitude" value="{{$pengguna->latitude}}">
                            <input id="namaUser"  type="hidden" name="namaUser" value="📍{{$pengguna->propinsi}}">
                        </div>
                        <div class="chart col-lg-12 col-md-6 col-sm-12 card myRounded" style="background-color: transparent;border:transparent">
                            <div class="myRounded" id="myMap" style="height:41vh"></div>
                            <script type="text/javascript">
                                var longitude = document.getElementById('longitude').value;
                                var latitude = document.getElementById('latitude').value;
                                var nama = document.getElementById('namaUser').value;

                                function initMap(){

                                var locations = [
                                    [nama, longitude, latitude, 16]
                                ];

                                var map = new google.maps.Map(document.getElementById('myMap'), {
                                    zoom: 13,
                                    streetViewControl: false,
                                    mapTypeControl:false,
                                    center: new google.maps.LatLng(longitude, latitude),
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
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a href="#profile" class="nav-link active" data-toggle="tab">Profil</a></li>
                                <li class="nav-item"><a href="#grup" class="nav-link" data-toggle="tab">Grup</a></li>
                                <li class="nav-item"><a href="#kemampuan" class="nav-link" data-toggle="tab">Kemampuan</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="profile" class="tab-pane fade show active">
                                    <h5 class="card-title"><i class="icon-reading mr-2"></i> Informasi Pengguna</h5>
                                    <form action="{{Route('akun.update', $pengguna->id_pengguna)}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset>
                                                    
                                                    <div class="form-group">
                                                        <label>Nama Pengguna:</label>
                                                        <input  type="text" class=" form-control" value="{{$pengguna->display_name}}" name="display_name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Website :</label>
                                                        <input type="text" class="form-control" value="{{$pengguna->website}}" name="website">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Deskripsi:</label>
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
                                                                <select class="form-control" id="pendidikan" name="pendidikan">
                                                                    @foreach($pendidikan as $dataPendidikan)
                                                                        <option name="pendidikan" value="{{$dataPendidikan->id_pendidikan}}" @if($pengguna->pendidikan == $dataPendidikan->id_pendidikan) selected @endif >{{$dataPendidikan->pendidikan}}</option>
                                                                    @endforeach
                                                                    
                                                                  </select>
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
                                                                <label>Nomor Telepon :</label>
                                                                <input type="text" value="{{$pengguna->no_telp}}" name="no_telp" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Simpan<i class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div id="grup" class="tab-pane fade">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap" style="width: 100%">
                                            <tbody>
                                                <tr class="table-active">
                                                    <td colspan="5" class="font-weight-semibold">Dibuat Oleh: <span class="text-primary mb-0 font-weight-bold"> {{$pengguna->display_name}}</span> </td>
                                                    <td class="text-right">
                                                        <span class="badge bg-secondary badge-pill">{{$dibuatAktif + $dibuatInaktif }} ditemukan</span>
                                                    </td>
                                                </tr>
                                                @if(!empty($inovasi[0]))
                                                    @foreach($inovasi as $dataInovasi)
                                                        <tr >
                                                            <td class="pr-0" style="width: 45px;">
                                                                <a href="{{ URL::to('/group/'.$dataInovasi->id_inovasi.'')}}">
                                                                    <img src="{{url('/')}}/{{$dataInovasi->thumbnail}}"class="rounded-circle" width="35" height="35" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ URL::to('/group/'.$dataInovasi->id_inovasi.'' )}} " style="color:black"> <b>{{$dataInovasi->judul}} </b></a>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <h6 class="mb-0 font-weight-semibold">{{$dataInovasi->jml_anggota}} anggota</h6>
                                                            </td>
                                                            <td></td>
                                                            <td class="float-left">
                                                                <div class="text-muted font-size-sm py-2">
                                                                    @if( $dataInovasi->status == 1)
                                                                        <span class=" badge badge-mark bg-success border-success mr-1"></span>
                                                                        Aktif
                                                                    @else
                                                                        <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                                                        Tidak Aktif
                                                                    @endif
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                <tr >
                                                    <td>
                                                        <a href="#" style="color:black"> <b>Tidak ada inovasi </b></a>
                                                    </td>
                                                </tr>
                                                @endif
    
    
                                                <tr class="table-active">
                                                        <td colspan="5" class="font-weight-semibold"><span class="text-primary mb-0 font-weight-bold"> {{$pengguna->display_name}}</span> telah bergabung </td>
                                                        <td class="text-right">
                                                            <span class="badge bg-secondary badge-pill">{{$bergabungAktif + $bergabungInaktif }} ditemukan</span>
                                                        </td>
                                                    </tr>
                                                    @if(!empty($subscription[0]))
                                                        @foreach($subscription as $subScription)
                                                            <tr>
                                                                <td class="pr-0" style="width: 45px;">
                                                                    <a href="{{ URL::to('/group/'.$subScription->id_inovasi.'' )}}">
                                                                        <img class="rounded-circle" width="35" height="35" src="{{url('/')}}/{{$subScription->thumbnail}}"alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ URL::to('/group/'.$subScription->id_inovasi.'' )}}" style="color:black"> <b>{{$subScription->judul}}</b> </a>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <h6 class="mb-0 font-weight-semibold">{{$subScription->jml_anggota}} anggota</h6>
                                                                </td>
                                                                <td></td>
                                                                <td class="float-left">
                                                                    <div class="text-muted font-size-sm">
                                                                        @if( $subScription->status == 1)
                                                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                                                            Aktif
                                                                        @else
                                                                            <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                                                            Tidak Aktif
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                    <tr >
                                                        <td>
                                                            <a href="#" style="color:black"> <b>Tidak ada inovasi </b></a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>

                                <div id="kemampuan" class="tab-pane fade">
                                    @foreach($kemampuan as $dataKemampuan)
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-1 col-md-2 col-sm-3" >
                                                    <img class="rounded-circle" src="{{$dataKemampuan->kemampuan_thumbnail}}" width="40" height="40" alt="" style="background-color: indigo;">
                                                </div>
                                                <div class="col-lg-11 col-md-10 col-sm-9">
                                                    <h5 class="mb-0 font-weight-bold py-1">{{$dataKemampuan->kemampuan}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /inner container -->
        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>


<div id="banned" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="mb-0">Apakah Anda yakin ingin menonaktifkan pengguna?</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('akun.destroy', $pengguna->id_pengguna)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}

                    <input  type="hidden" class=" form-control" value="0" name="status">

                    <button type="submit" class="btn btn-sm btn-danger">Lanjutkan</button>
                </form>
            </div>
		</div>
	</div>
</div>

<div id="unBanned" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="mb-0">Apakah Anda yakin ingin mengaktifkan pengguna?</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('akun.destroy', $pengguna->id_pengguna)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}

                    <input  type="hidden" class=" form-control" value="1" name="status">
                    <button type="submit" class="btn btn-sm btn-warning">Lanjutkan</button>
                </form>
            </div>
		</div>
	</div>
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


		});
	</script>
@endsection
