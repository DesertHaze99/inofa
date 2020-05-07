<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start" id="customSidebar">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		<span class="font-weight-semibold">Menu Utama</span>
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">
		<div class="card card-sidebar-mobile">

			<!-- Header -->
			<div class="card-header header-elements-inline">
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
					</div>
				</div>
			</div>

			
			<!-- Main navigation -->
			<div class="card-body p-0">
				<ul class="nav nav-sidebar" data-nav-type="accordion">

					<!-- Main -->
					<li class="nav-item" id="optionMenu">
						<div class="row">
							<div id="dashboard" class="badgeLeft">
								<h1></h1>
							</div>
							<div id="dashboardInnactive" class="badgeLeftInnactive">
								<h1></h1>
							</div>
							<div class="spaceBetween">
								<h1></h1>
							</div>
							<a id="dashboardMainButtonActive" href="{{URL::to('/')}}" class="nav-link activeTab float-right">
								<i class="icon-home2"></i>
								<span>
									Dashboard
								</span>
							</a>
							<a id="dashboardMainButtonInnactive" href="{{URL::to('/')}}" class="nav-link innactiveTab float-right">
								<i class="icon-home2"></i>
								<span>
									Dashboard
								</span>
							</a>
						</div>
					</li>

					<li class="nav-item" id="optionMenu">
						<div class="row">
							<div id="akun" class="badgeLeft">
								<h1></h1>
							</div>
							<div id="akunInnactive" class="badgeLeftInnactive">
								<h1></h1>
							</div>
							<div class="spaceBetween">
								<h1></h1>
							</div>
							<a id="akunMainButtonActive" href="{{URL::to('/akun')}}" class="nav-link activeTab float-right">
								<i class="icon-user"></i>
								<span>
									Akun
								</span>
							</a>
							<a id="akunMainButtonInnactive" href="{{URL::to('/akun')}}" class="nav-link innactiveTab float-right">
								<i class="icon-user"></i>
								<span>
									Akun
								</span>
							</a>
						</div>
					</li>

					<li class="nav-item" id="optionMenu">
						<div class="row">
							<div id="ide" class="badgeLeft">
								<h1></h1>
							</div>
							<div id="ideInnactive" class="badgeLeftInnactive">
								<h1></h1>
							</div>
							<div class="spaceBetween">
								<h1></h1>
							</div>
							<a id="ideMainButtonActive" href="{{URL::to('/ide')}}" class="nav-link activeTab float-right">
								<i class="icon-brain"></i>
								<span>
									Ide
								</span>
							</a>
							<a id="ideMainButtonInnactive" href="{{URL::to('/ide')}}" class="nav-link innactiveTab float-right">
								<i class="icon-brain"></i>
								<span>
									Ide
								</span>
							</a>
						</div>
					</li>
					
					<li class="nav-item" id="optionMenu">
						<div class="row">
							<div id="group" class="badgeLeft">
								<h1></h1>
							</div>
							<div id="groupInnactive" class="badgeLeftInnactive">
								<h1></h1>
							</div>
							<div class="spaceBetween">
								<h1></h1>
							</div>
							<a id="groupMainButtonActive" href="{{URL::to('/group')}}" class="nav-link activeTab float-right">
								<i class="icon-users4"></i>
								<span>
									Group
								</span>
							</a>
							<a id="groupMainButtonInnactive" href="{{URL::to('/group')}}" class="nav-link innactiveTab float-right">
								<i class="icon-users4"></i>
								<span>
									Group
								</span>
							</a>
						</div>
					</li>	
					<!-- /main -->
				</ul>
			</div>
			<!-- /main navigation -->

		</div>
	</div>
	<!-- /sidebar content -->
	
</div>
<!-- /main sidebar -->