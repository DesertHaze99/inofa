<!DOCTYPE html>
<html lang="en">
<head>
	
	
	@include('layouts.includes.head')
	@yield('header')

	@include('layouts.includes.script')
	
	<style>
		.navbar-light{
			border: 2px solid white;
		}
		.margin{
			margin-top: 1%;
		}
		body{
			background-color: #f3f6fc;	
		}

		.activeTab{
			background-color: #2868e3;
			color: white;
			border-radius: 10px;
			width: 65%;
		}

		.innactiveTab{
			color: black;
			border-radius: 10px;
			width: 65%;
		}
		
		.badgeLeft{
			background-color: #2868e3;
			color: white;
			width: 10px;
			border-radius: 10px;
		}
		
		.badgeLeftInnactive{
			background-color: white;
			color: white;
			width: 10px;
			border-radius: 10px;
		}

		.spaceBetween{
			background-color: white;
			width: 50px;
			color: white;
		}

		.row{
			width: 100%;
		}

		table{
			border-radius: 10px;
			background-color: white;
		}
		
		thead{
			background-color: #2868e3;
			color: white;
			border-radius: 10px;
		}
		
		.card .badge{
			border-radius: 10px;
			border: 1px solid white;
		}

		#contentDeep{
			margin-top: 1%;
		}

		.btn-primary{
			background-color: #2868e3;
		}

		.tab-content{
			height: 600px;
			overflow-y: hidden;
		}

		.tab-content::-webkit-scrollbar{
			display: none;
		}

		.bg-myBlue {
			  background-color: #2868e3; 
		}

		.bg-myOrange {
			  background-color: #fbbb6a; 
		}

		.bg-myPink {
			  background-color: #f7a393; 
		}

		.bg-darkBlue {
			  background-color: #004460; 
		}

		.bg-myTeal {
			  background-color: #bce3e6; 
		}

		.myRounded{
			border-radius: 10px;
		}

		#bannerFlag{
			background-color: white;
		}

		#customSidebar{
			height:90vh;
		}



	</style>

</head>

<body>

	<!-- Main navbar -->
	@include('layouts.includes.navbar') 
	<!-- /main navbar -->

	<div class="page-content pt-0">
		<!-- Main sidebar -->
		@include('layouts.includes.menu')
		<!-- /main sidebar -->

		<!-- Main content -->
		<div class="content-wrapper col-md-10">

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
	 {{-- @include('layouts.includes.footer') --}}
	<!-- /footer -->
	
		
</body>
</html>
