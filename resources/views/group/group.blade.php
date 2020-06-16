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
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="card myRounded bg-white " id="profilePict">
                            <div class="card-body myRounded" style="background-image: url({{url('/')}}/upload/image/thumbnail.jpg); background-size: cover;height:15vh"></div>
                            <div class="text-center" style="margin-top:-9vh;">
                                <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2" style="background-image: url({{url('/')}}/{{$inovasi->thumbnail}});background-size: cover;height:13vh;width:13vh" ></a>
                            </div>
                            <div class="card-body text-center " style="margin-top:-3vh;">
                                <h5 class="font-weight-bold">{{$inovasi->judul}}</h5>
                                <small class="font-weight-semibold">{{$inovasi->tagline}}</small><br>
                                <span class="mb-0 font-weight-semibold text-primary margin">{{explode("-",explode(" ", $inovasi->created_at)[0])[2]}} {{explode("-",explode(" ", $inovasi->created_at)[0])[1]}} {{explode("-",explode(" ", $inovasi->created_at)[0])[0]}} </span>
                                <p class="text-muted">
                                   <small>{{ str_split($inovasi->description, 200)[0]}}</small><span>...</span>
                                   
                                </p>
                                <hr>
                            </div>

                            <div class="card-body text-left " style="border-top:transparent;margin-top:-6vh;">
                                <h5 class="font-weight-bold">Anggota</h5>
                                @foreach($anggotaGlance as $pengguna)
                                    <h6 class="mb-0 d-flex align-items-center justify-content-center ">
                                        <div class="col-lg-1 col-md-2 col-sm-2 px-3 ">
                                            <center>
                                            <a href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="d-inline-block">
                                                <img src="{{$pengguna->profile_picture}}"  style="object-fit: cover;" class="rounded-circle" width="30" height="30"  alt="" >
                                            </a>
                                            </center>
                                        </div>
                                        <div class="col-lg-11 col-md-10 col-sm-10  py-1 ">
                                            <h6 class="mb-0 px-1 "><small><b>{{$pengguna->display_name}} </b></small></h6>
                                            <p class="mb-0 text-muted  "><small class="font-weight-semibold ml-1">{{$pengguna->email}}</small></p>
                                        </div>
                                    </h6>
                                @endforeach
                                <br>

                                <div class="float-right text-right" style="margin-left:50px">
                                    <button  type="button" class=" btn btn-outline-primary border-transparent">@if(count($anggota) < 7) @else +{{count($anggota)-7}} lainnya @endif </button> 
                                </div>
                                
                                <br>
                            </div>

                            
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12" >
                        <div class="card" style="overflow:auto">
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
                                    <li class="nav-item"><a href="#obrolan" class="nav-link active" data-toggle="tab">Obrolan</a></li>
                                    <li class="nav-item"><a href="#anggota" class="nav-link" data-toggle="tab">Anggota</a></li>
                                    <li class="nav-item"><a href="#media" class="nav-link" data-toggle="tab">Media</a></li>
                                    <li class="nav-item"><a href="#info" class="nav-link" data-toggle="tab">Group Info</a></li>
                                </ul>
    
                                <div class="tab-content">
                                    <div id="obrolan" class="tab-pane fade show active">
                                        <h6 class="mb-0 d-flex align-items-center justify-content-center ">
                                            <div class="col-lg-1 col-md-2 py-1 px-3 ">
                                                <a href="#" class="d-inline-block">
                                                    <img src="{{url('/')}}/{{$inovasi->thumbnail}}" class="rounded-circle" width="50" height="50"  alt="" >
                                                </a>
                                            </div>
                                            <div class="col-lg-11 col-md-10 px-3 py-1 ">
                                                <h6 class="mb-0 px-1 font-weight-semibold ">{{$inovasi->judul}} </h6>
                                            </div>
                                        </h6>

                                        <ul id="ruangObrolan" class="media-list media-chat media-chat-scrollable mb-3" style="border-top:1px solid grey">
                                            @foreach($chats as $chat)
                                                {{-- @if((explode(" ", $chat->created_at)[0] != date("Y-m-d")))
                                                    <li class="media content-divider justify-content-center text-muted mx-0">{{explode(" ", $chat->created_at)[0]}}</li>
                                                @elseif(explode(" ", $chat->created_at)[0] == date("Y-m-d"))
                                                    <li class="media content-divider justify-content-center text-muted mx-0">Today</li>
                                                @endif --}}
                                                
                                                @if($chat->pengguna_id == -1)
                                                    <li class="media content-divider justify-content-center text-muted mx-0">{{$chat->content}}</li>
                                                    <li class="media content-divider justify-content-center text-muted mx-0">pada {{explode("-",explode(" ", $chat->created_at)[0])[2]}} {{explode("-",explode(" ", $chat->created_at)[0])[1]}} {{explode("-",explode(" ", $chat->created_at)[0])[0]}} </li>
                                                @elseif($chat->pengguna_id == $inovasi->pengguna_id)
                                                
                                                    <li class="media media-chat-item-reverse">
                                                        <div class="media-body">
                                                            @if(!empty($chat->content) && !empty($chat->media))
                                                                <div class="media-chat-item">{{$chat->content}}</div><br>
                                                                <img src="{{url('/')}}/{{$chat->media}}" style="max-height: 15vh;border-radius:5px" alt="">
                                                            @elseif(!empty($chat->content))
                                                                <div class="media-chat-item">{{$chat->content}}</div>
                                                            @else
                                                                <img src="{{url('/')}}/{{$chat->media}}" style="max-height: 15vh;border-radius:5px" alt="">
                                                            @endif
                                                            <div class="font-size-sm text-muted mt-2">{{explode("-",explode(" ", $chat->created_at)[0])[2]}}-{{explode("-",explode(" ", $chat->created_at)[0])[1]}}-{{explode("-",explode(" ", $chat->created_at)[0])[0]}} {{explode(":", explode(" ", $chat->created_at)[1])[0]}}:{{explode(":", explode(" ", $chat->created_at)[1])[1]}}<a href="#"></a></div>
                                                        </div>

                                                        <div class="ml-3">
                                                            <a href="{{url('/')}}/limitless/Template//global_assets/images/placeholders/placeholder.jpg">
                                                                <img src="{{$chat->profile_picture}}" style="object-fit: cover;" class="rounded-circle" width="40" height="40" alt="">
                                                            </a>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="media">
                                                        <div class="mr-3">
                                                            <a href="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg">
                                                                <img src="{{$chat->profile_picture}}"  style="object-fit: cover;" class="rounded-circle" width="40" height="40" alt="">
                                                            </a>
                                                        </div>

                                                        <div class="media-body">
                                                            @if(!empty($chat->content) && !empty($chat->media))
                                                                <div class="media-chat-item">{{$chat->content}}</div><br>
                                                                <img src="{{url('/')}}/{{$chat->media}}" style="max-height: 15vh;border-radius:5px" alt="">
                                                            @elseif(!empty($chat->content))
                                                                <div class="media-chat-item">{{$chat->content}}</div>
                                                            @else
                                                                <img src="{{url('/')}}/{{$chat->media}}" style="max-height: 15vh;border-radius:5px" alt="">
                                                            @endif
                                                            <div class="font-size-sm text-muted mt-2">{{explode("-",explode(" ", $chat->created_at)[0])[2]}}-{{explode("-",explode(" ", $chat->created_at)[0])[1]}}-{{explode("-",explode(" ", $chat->created_at)[0])[0]}} {{explode(":", explode(" ", $chat->created_at)[1])[0]}}:{{explode(":", explode(" ", $chat->created_at)[1])[1]}}<a href="#"></a></div>
                                                        </div>
                                                    </li>
                                                @endif	
                                            @endforeach
                                        </ul>
                                                
                                    </div>
    
                                    <div id="anggota" class="tab-pane fade " >
                                        <div class="table-responsive overflow-auto media-chat-scrollable">
                                            @foreach($anggota as $pengguna)
                                            @if($pengguna->status == "anggota")
                                            <div class="mb-0 row align-items-center justify-content-center " style="border-bottom: 1px solid #E5E5E5">
                                                <div class="col-md-1 py-2 px-3 ">
                                                    <a href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="d-inline-block">
                                                        <img src="{{$pengguna->profile_picture}}" style="object-fit: cover;" class="rounded-circle" width="30" height="30"  alt="" >
                                                    </a>
                                                </div>
                                                <div class="col-md-4 px-3 py-2 ">
                                                    <h6 href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="mb-0 px-1 font-weight-semibold">{{$pengguna->display_name}} </h6>
                                                </div>
                                                <div class="col-md-5 px-3 py-2 ">
                                                    <span class="mb-0 px-1 font-weight-medium">{{$pengguna->email}} </span>
                                                </div>
                                                <div class="col-md-2">
                                                    <a type="button" href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="btn btn-outline-primary border-transparent">
                                                        <b><i class="icon-arrow-right8"></i></b>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            <br><br>
                                            <center><h6 class="">- pending -</h6></center>
                                            @if(empty($anggotaPending[0]))
                                                <div class="mb-0 " >
                                                    <h6 class="mb-0 px-1 text-center text-muted">Tidak ditemukan pengguna dalam status pending...</h6>
                                                </div>
                                            @else
                                                @foreach($anggotaPending as $pengguna)
                                                    <div class="mb-0 row align-items-center justify-content-center " style="border-bottom: 1px solid #E5E5E5">
                                                        <div class="col-md-1 py-2 px-3 ">
                                                            <a href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="d-inline-block">
                                                                <img src="{{$pengguna->profile_picture}}" style="object-fit: cover;" class="rounded-circle" width="30" height="30"  alt="" >
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4 px-3 py-2 ">
                                                            <h6 href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="mb-0 px-1 font-weight-semibold">{{$pengguna->display_name}} </h6>
                                                        </div>
                                                        <div class="col-md-5 px-3 py-2 ">
                                                            <span class="mb-0 px-1 font-weight-medium">{{$pengguna->email}} </span>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a type="button" href="{{URL::to('/akun/'.$pengguna->id_pengguna)}}" class="btn btn-outline-primary border-transparent">
                                                                <b><i class="icon-arrow-right8"></i></b>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach 
                                            @endif
                                        </div>
                                    </div>
    
                                    <div id="media" class="tab-pane fade">
                                      <h5 class="font-weight-bold margin">Media</h5>
                                        <div class="row">
                                        @foreach($chats as $chat)
                                        @if($chat->media)
                                        <div class="col-lg-3 col-md-6 col-sm-6 py-2">
                                            <center>
                                            <img src="{{url('/')}}/{{$chat->media}}" style="max-height: 13vh;border-radius:5px" alt="">
                                            </center>
                                        </div>
                                        @endif
                                        @endforeach
                                        </div>
                                    </div>

                                    <div id="info" class="tab-pane fade">
                                        <h4 class="px-2 font-weight-bold margin">Tagline : {{$inovasi->tagline}}</h4><br>
                                        <p style="text-indent: 50px;" class="text-justify mb-0 px-2 font-weight-medium">{{$inovasi->description}} </p>
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

            var elmnt = document.getElementById("ruangObrolan");
            var y = elmnt.scrollHeight;
            
            elmnt.scrollTop = 99999999999;

		});
	</script>
@endsection

