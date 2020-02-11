@extends('layouts.app')

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
<div class="row">
	<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start margin">
		<!-- Sidebar mobile toggler -->
		<div class="sidebar-mobile-toggler text-center">
			<a href="#" class="sidebar-mobile-main-toggle">
				<i class="icon-arrow-left8"></i>
			</a>
			<span class="font-weight-semibold">Main sidebar</span>
			<a href="#" class="sidebar-mobile-expand">
				<i class="icon-screen-full"></i>
				<i class="icon-screen-normal"></i>
			</a>
		</div>
		<!-- /sidebar mobile toggler -->

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="card-body">
				<div class="media">
					<div class="media-body">
						<div class="media-title font-weight-semibold" ><h1 class="mb-0 font-weight-black">Dashboard</h1></div>
						<div class="font-size-xs opacity-50">
							<h3><i class="icon-magazine font-size-sm"></i> inova</h3>
						</div>
					</div>

					<div class="ml-3 align-self-center">
						<a href="#" class="text-white"><i class="icon-cog3"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->

		<!-- Main navigation -->
		<div class="card-body p-0">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<!-- Main -->
				<li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
				<li class="nav-item">
					<a href="{{URL::to('/')}}" class="nav-link active">
						<i class="icon-home4"></i>
						<span>
							Dashboard
							<span class="d-block font-weight-normal opacity-50">The current dashboard status</span>
						</span>
					</a>
				</li>
				<br>
				<li class="nav-item">
					<a href="#" class="nav-link active">
						<i class="icon-eyedropper2"></i>
						<span>
							<span class="d-block font-weight-normal opacity-50">Filters</span>
						</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link"><span>SUHU</span></a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link"><span>Mastah</span></a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link"><span>Profesional</span></a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link"><span>Medium</span></a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link"><span>Reguler</span></a>
				</li>
				
				<br>
								
				<!-- /main -->

				
					
			</ul>
		</div>
		<!-- /main navigation -->
		
	</div>

	<div class="content card margin">
		<div class="card-header">
			<a class="btn btn-primary" href=""><i class="far fa-plus-square mr-2"></i>Tambah merk dagang baru</a>
		</div>
		<div class="card-body">
			<!-- Basic datatable -->
				<table id="tablePengguna" class="table datatable-basic">
					<thead>
						<tr>
							<th>Profile Picture</th>
							<th>Username</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Rating</th>
							{{-- <th class="text-center">Actions</th> --}}
						</tr>
					</thead>
					<tbody>
						{{-- <tr>
							<td>Marth</td>
							<td><a href="#">Enright</a></td>
							<td>Traffic Court Referee</td>
							<td>22 Jun 1972</td>
							<td><span class="badge badge-success">Active</span></td>
							<td class="text-center">
								<div class="list-icons">
									<div class="dropdown">
										<a href="#" class="list-icons-item" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>

										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
											<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
											<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
										</div>
									</div>
								</div>
							</td>
						</tr> --}}
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
            console.log("ready");
            $("#tablePengguna").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('penggunaAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'profile_picture', 'targets' : [0], 'render': function(data){
						return '<img src="'+data+'" class="rounded-circle" width="40" height="40" alt="">'
					}},
                    {data: 'username', name: 'username'},
					{data: 'first_name', name: 'first_name'},
					{data: 'last_name', name: 'last_name'},
					{data: 'email', name: 'email'},
					{data: 'rating',name:'rating'},
					{data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });

        });

        
	</script>
@endsection
