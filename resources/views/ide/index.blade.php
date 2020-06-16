@extends('layouts.primary')

@section('head')
	<!-- Core JS files -->
	<script src="{{ asset('limitless/Template/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

	<script href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/js/app.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/datatables_basic.js')}}"></script>

	<script src="{{ asset('limitless/Template//global_assets/js/demo_pages/components_modals.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<!-- /theme JS files -->



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

<div class="row">
	<div class="content margin">
		<div class="card-header">
			<h1><b>Ide</b></h1>
		</div>
		<div class="card-body table-responsive col-lg-12 col-md-12 col-sm-12">
			<!-- Basic datatable -->
				<table id="tabelIde" class=" datatable-ajax dataTable no-footer table text-nowrap datatable-basic datatable-column-search-inputs table-hover datatable-highlight" role="grid" aria-describedby="DataTables_Table_2_info">
					<thead>
						<tr>
							<th>Thumbnail</th>
							<th>Judul</th>
							<th>Kota</th>
							<th>Admin</th>
							<th>Kategori</th>
							<th>Lihat</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			<!-- /basic datatable -->
		</div>
	</div>
</div>

<!-- Custom background color -->
@foreach($data as $inovasi)
<div id="modal{{$inovasi->id_inovasi}}" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row">
					<div class="col-md-1">
						<img src="{{$inovasi->profile_picture}}" class="rounded-circle" width="35" height="35"  alt="" >
					</div>
					<div class="col-md-9">
						<h6 class="mb-0 font-weight-semibold">{{$inovasi->judul}}</h6>
						<div class="row px-2">
							<span class="mb-0 font-weight-medium text-primary">{{$inovasi->display_name}}</span> <span class="mb-0 font-weight-medium"> &nbsp | &nbsp </span> <span class="mb-0 font-weight-medium">{{explode("-",explode(" ", $inovasi->created_at)[0])[2]}}-{{explode("-",explode(" ", $inovasi->created_at)[0])[1]}}-{{explode("-",explode(" ", $inovasi->created_at)[0])[0]}}</span>
						</div>
					</div>
					<div class="col-md-2">
						<span class="badge bg-primary ml-md-auto mr-md-3" style="border-radius:5px;">{{$inovasi->kategori}}</span>
					</div>

				</div>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<div class="modal-body">
				<div class="card-body myRounded" style="background-image: url({{url('/')}}/{{$inovasi->thumbnail}}); background-size: cover;height:20vh"></div><br>
				<h6 class="mb-0 font-weight-semibold py-2">
					Tagline : {{$inovasi->tagline}}
				</h6>

				<span class="mb-0 font-weight-medium">
					{{$inovasi->description}}
				</span>
			</div>

			<div class="modal-footer">
				<center>
					<button type="button" class="btn btn-link text-white" data-dismiss="modal">Close</button>
					<a href="{{URL::to('/group/'.$inovasi->id_inovasi)}}" type="button" class="btn bg-myBlue">Buka Group</a>
				</center>
				
			</div>
		</div>
	</div>
</div>
@endforeach
<!-- /custom background color -->


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
			$("#dashboard").hide();
			$("#dashboardInnactive").show();
			$("#dashboardMainButtonActive").hide();
			$("#dashboardMainButtonInnactive").show();

			$("#akun").hide();
			$("#akunInnactive").show();
			$("#akunMainButtonActive").hide();
			$("#akunMainButtonInnactive").show();

			$("#ide").show();
			$("#ideInnactive").hide();
			$("#ideMainButtonActive").show();
			$("#ideMainButtonInnactive").hide();

			$("#group").hide();
			$("#groupInnactive").show();
			$("#groupMainButtonActive").hide();
			$("#groupMainButtonInnactive").show();


            console.log("ready");
            $("#tabelIde").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('ideAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'thumbnail', 'targets' : [0], 'render': function(data){
						return '<img src="'+data+'" class="rounded-circle" width="40" height="40" alt="">'
					}},
                    {data: 'judul', name: 'judul'},
					{data: 'propinsi', name: 'propinsi'},
					{data: 'display_name',name:'display_name'},
					{data: 'kategori', 'targets' : [4], 'render': function(data){
						return '<span class="badge bg-primary ml-md-auto mr-md-3" style="border-radius:5px;">'+data+'</span>'
					}},
					{data: 'id_inovasi', 'targets' : [5], 'render': function(data){
						return '<button type="button" class="btn alpha-slate" data-toggle="modal" data-target="#modal'+data+'" >Detail <i class="primary icon-eye ml-2"></i></button>'
					}},
                ],
                "fixedColumns": true,
            });

        });

        
	</script>
@endsection
