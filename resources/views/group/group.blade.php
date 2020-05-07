@extends('layouts.app')

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
                <div class="row">
                    <div class="col-md-3">
                        <div class="card myRounded bg-white " id="profilePict">
                            <div class="card-body myRounded" style="background-image: url({{url('/')}}/upload/image/thumbnail.jpg); background-size: cover;height:15vh"></div>
                            <div class="text-center" style="margin-top:-9vh;">
                                <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2" style="background-image: url({{url('/')}}{{$inovasi->thumbnail}});background-size: cover;height:13vh;width:13vh" ></a>
                            </div>
                            <div class="card-body text-center " style="margin-top:-3vh;">
                                <h5 class="font-weight-bold">{{$inovasi->judul}}</h5>
                                <span class="mb-0 font-weight-semibold text-primary margin">{{$inovasi->created_at}}</span>
                                <p class="text-muted">
                                   <small>Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum </small> 
                                </p>
                                <hr>
                            </div>

                            <div class="card-body text-left " style="border-top:transparent;margin-top:-6vh;">
                                <h5 class="font-weight-bold">Anggota</h5>
                                @foreach($anggota as $pengguna)
                                    <h6 class="mb-0 d-flex align-items-center justify-content-center ">
                                        <div class="col-md-1 py-2 px-3 ">
                                            <a href="#" class="d-inline-block">
                                                <img src="{{url('/')}}/{{$pengguna->profile_picture}}" class="rounded-circle" width="30" height="30"  alt="" >
                                            </a>
                                        </div>
                                        <div class="col-md-11 px-3 py-1 ">
                                            <h6 class="mb-0 px-1 "><small><b>{{$pengguna->display_name}} </b></small></h6>
                                            <p class="mb-0 text-muted  "><small class="font-weight-semibold ml-1">{{$pengguna->email}}</small></p>
                                        </div>
                                    </h6>
                                @endforeach
                                <br>

                                <div class="float-right text-right" style="margin-left:50px">
                                    <button type="button" class=" btn btn-sm btn btn-outline-primary border-transparent">Semua Anggota <i class="icon-arrow-right8 mr-3"></i> </button>
                                </div>
                                
                                <br>
                            </div>

                            
                        </div>
                    </div>
                    <div class="col-md-9">
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
                                    <li class="nav-item"><a href="#obrolan" class="nav-link active" data-toggle="tab">Obrolan</a></li>
                                    <li class="nav-item"><a href="#anggota" class="nav-link" data-toggle="tab">Anggota</a></li>
                                    <li class="nav-item"><a href="#media" class="nav-link" data-toggle="tab">Media</a></li>
                                    <li class="nav-item"><a href="#info" class="nav-link" data-toggle="tab">Group Info</a></li>
                                </ul>
    
                                <div class="tab-content">
                                    <div id="obrolan" class="tab-pane fade show active">
                                        <h6 class="mb-0 d-flex align-items-center justify-content-center ">
                                            <div class="col-md-1 py-1 px-3 ">
                                                <a href="#" class="d-inline-block">
                                                    <img src="{{url('/')}}{{$inovasi->thumbnail}}" class="rounded-circle" width="50" height="50"  alt="" >
                                                </a>
                                            </div>
                                            <div class="col-md-11 px-3 py-1 ">
                                                <h6 class="mb-0 px-1 font-weight-semibold ">{{$inovasi->judul}} </h6>
                                            </div>
                                        </h6>

                                        <ul class="media-list media-chat media-chat-scrollable mb-3" style="border-top:1px solid grey">
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
                                                            <div class="font-size-sm text-muted mt-2">{{$chat->created_at}}<a href="#"></a></div>
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
                                                            <div class="font-size-sm text-muted mt-2">{{$chat->created_at}}<a href="#"></a></div>
                                                        </div>
                                                    </li>
                                                @endif
                                            
                                            <?php $temp = $chat->id_pengguna; ?>	
                                            
                                            @endforeach
                                        </ul>
                                                
                                    </div>
    
                                    <div id="anggota" class="tab-pane fade">
                                        <div class="table-responsive">
                                            dvesgweg
                                        </div>
                                    </div>
    
                                    <div id="media" class="tab-pane fade">
                                      <h3>Menu 2</h3>
                                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>

                                    <div id="info" class="tab-pane fade">
                                        <h3>Menu 2</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                      </div>
                                  </div>
                                
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Left sidebar component -->


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

			$("#akun").hide();
			$("#akunInnactive").show();
			$("#akunMainButtonActive").hide();
			$("#akunMainButtonInnactive").show();

			$("#ide").hide();
			$("#ideInnactive").show();
			$("#ideMainButtonActive").hide();
			$("#ideMainButtonInnactive").show();

			$("#group").show();
			$("#groupInnactive").hide();
			$("#groupMainButtonActive").show();
			$("#groupMainButtonInnactive").hide();

		});
	</script>
@endsection
