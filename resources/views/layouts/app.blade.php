<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		.navbar-dark{
			background-image: linear-gradient(60deg, #3d3393 0%, #2b76b9 37%, #2cacd1 65%, #35eb93 100%);
			/*background: linear-gradient(to right, #495aff, #1cb5e0);*/
		}
		.margin{
			margin-top: 1%;
		}

		

	</style>
	@include('layouts.includes.head')
	@yield('header')

	@include('layouts.includes.script')
</head>

<body>

	<!-- Main navbar -->
	@include('layouts.includes.navbar') 
	<!-- /main navbar -->

	<!-- Page header -->
	{{-- @include('layouts.includes.breadcrumb') --}}

	<div class="page-content pt-0">
		
		<!-- Main sidebar -->
		 {{--@include('layouts.includes.menu')--}}
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content" >
				@yield('content')
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<!-- Footer -->
	@include('layouts.includes.footer')
	<!-- /footer -->
		
</body>
</html>
