@extends('layouts.primary')

@section('head')
	<!-- Core JS files -->
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{ asset('limitless/Template/global_assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script src="assets/js/app.js"></script>
	<script src="{{ asset('limitless/Template/global_assets//global_assets/js/demo_pages/datatables_basic.js')}}"></script>
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
			<h1><b>Group</b></h1>
		</div>
		<div class="card-body">
			<!-- Basic datatable -->
				<table id="tabelIde" class=" datatable-ajax dataTable no-footer table text-nowrap datatable-basic datatable-column-search-inputs table-hover datatable-highlight" role="grid" aria-describedby="DataTables_Table_2_info">
					<thead>
						<tr>
							<th>Thumbnail</th>
							<th>Nama Group</th>
							<th>Kota</th>
							<th>Admin</th>
							<th>Jumlah Anggota</th>
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

			$("#ide").hide();
			$("#ideInnactive").show();
			$("#ideMainButtonActive").hide();
			$("#ideMainButtonInnactive").show();

			$("#group").show();
			$("#groupInnactive").hide();
			$("#groupMainButtonActive").show();
			$("#groupMainButtonInnactive").hide();


            console.log("ready");
            $("#tabelIde").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('groupAjax') }}",
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
					{data: 'jml_anggota', 'targets' : [4], 'render': function(data){
						return '<h6 class="mb-0 px-1">'+data+'</h6>'
					}},
					{data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });

        });

        
	</script>
@endsection
