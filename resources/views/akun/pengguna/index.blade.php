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
                        <div class="card " id="profilePict">
                            <div class="card-body bg-indigo-400 text-center card-img-top" style="background-color : white; border-radius:10px;color:black;width:90%">
                                <div class="card-img-actions d-inline-block mb-3">
                                <img class="img-fluid rounded-circle" src="{{url('/')}}/{{$pengguna->profile_picture}}" width="100" height="100" alt="">
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
                                <br><br>
                            </div>
                        </div>
                        <!-- /navigation -->
                        <br>
                        <div class="card" >
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
                                <li class="nav-item"><a href="#grup" class="nav-link" data-toggle="tab">Group</a></li>
                                <li class="nav-item"><a href="#kemampuan" class="nav-link" data-toggle="tab">Kemampuan</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="profile" class="tab-pane fade show active">
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
                                            <button type="submit" class="btn btn-primary">Simpan<i class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div id="grup" class="tab-pane fade">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <tbody>
                                                <tr class="table-active">
                                                    <td colspan="7" class="font-weight-semibold">Dibuat Oleh: <span class="text-primary mb-0 font-weight-bold"> {{$pengguna->display_name}}</span> </td>
                                                    <td class="text-right">
                                                        <span class="badge bg-secondary badge-pill">{{$dibuatAktif + $dibuatInaktif }}</span>
                                                    </td>
                                                </tr>
                                                @foreach($inovasi as $dataInovasi)
                                                    <tr>
                                                        <td class="pr-0" style="width: 45px;">
                                                            <a href="{{ URL::to('/inovasi/'.$dataInovasi->id_inovasi.'' )}}">
                                                                <img src="{{url('/')}}{{$dataInovasi->thumbnail}}" height="30" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ URL::to('/inovasi/'.$dataInovasi->id_inovasi.'' )}} " style="color:black"> <b>{{$dataInovasi->judul}} </b></a>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h6 class="mb-0 font-weight-semibold">{{$dataInovasi->jml_anggota}} anggota</h6>
                                                        </td>
                                                        <td></td>
                                                        <td class="float-left">
                                                            <div class="text-muted font-size-sm">
                                                                @if( $dataInovasi->status == 1)
                                                                    <span class="badge badge-mark bg-grey border-success mr-1"></span>
                                                                    Aktif
                                                                @else
                                                                    <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                                                    Tidak Aktif
                                                                @endif
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
    
    
                                                <tr class="table-active">
                                                        <td colspan="7" class="font-weight-semibold"><span class="text-primary mb-0 font-weight-bold"> {{$pengguna->display_name}}</span> telah bergabung </td>
                                                        <td class="text-right">
                                                            <span class="badge bg-secondary badge-pill">{{$bergabungAktif + $bergabungInaktif }}</span>
                                                        </td>
                                                    </tr>
                                                    @foreach($subscription as $subScription)
                                                        <tr>
                                                            <td class="pr-0" style="width: 45px;">
                                                                <a href="{{ URL::to('/inovasi/'.$subScription->id_inovasi.'' )}}">
                                                                    <img src="{{url('/')}}{{$subScription->thumbnail}}" height="30" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ URL::to('/inovasi/'.$subScription->id_inovasi.'' )}}" style="color:black"> <b>{{$subScription->judul}}</b> </a>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <h6 class="mb-0 font-weight-semibold">{{$subScription->jml_anggota}} anggota</h6>
                                                            </td>
                                                            <td></td>
                                                            <td class="float-left">
                                                                <div class="text-muted font-size-sm">
                                                                    @if( $subScription->status == 1)
                                                                        <span class="badge badge-mark bg-grey border-success mr-1"></span>
                                                                        Aktif
                                                                    @else
                                                                        <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                                                        Tidak Aktif
                                                                    @endif
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
    
                                                
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>

                                <div id="kemampuan" class="tab-pane fade">
                                  <h3>Menu 2</h3>
                                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                </div>
                              </div>
                            
                        </div>
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


		});
	</script>
@endsection
