<div class="navbar navbar-expand-md navbar-dark">
	<div class="navbar-brand wmin-200" style="margin-left:5%">
		<a href="{{URL::to('/')}}" class="d-inline-block">
			<img src="{{ asset('limitless/Template/global_assets/images/logo_light.png')}}" alt="" style="width:10%;height:10%">
		</a>
		
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		

		<span class="badge bg-success-400 ml-md-auto mr-md-3">Active</span>

		<ul class="navbar-nav">

			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="{{url('/')}}/limitless/Template/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
					<span>Victoria</span>
				</a>
				
				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
					<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
</div>