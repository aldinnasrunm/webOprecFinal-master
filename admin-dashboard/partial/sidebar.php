<?php 

include '../dbconnect.php';

include 'head.php';

// $id = $_SESSION['id'];

?>

<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			<header class="topbar" data-navbarbg="skin6">
				<nav class="navbar top-navbar navbar-expand-md navbar-light">
					<div class="navbar-header" data-logobg="skin6">
						<!-- ============================================================== -->
						<!-- Logo -->
						<!-- ============================================================== -->
						<a class="navbar-brand" href="../index.php">
							<!-- Logo icon -->
							<b class="logo-icon">
								<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
								<!-- Dark Logo icon -->
								<img
									src="./assets/images/logo-icon.png"
									alt="homepage"
									class="dark-logo"
								/>
								<!-- Light Logo icon -->
								<img
									src="./assets/images/logo-light-icon.png"
									alt="homepage"
									class="light-logo"
								/>
							</b>
							<!--End Logo icon -->
							<!-- Logo text -->
							<span class="logo-text">
								<!-- dark Logo text -->
								<img
									src="./assets/images/logo-text.png"
									alt="homepage"
									class="dark-logo"
								/>
								<!-- Light Logo text -->
								<img
									src="./assets/images/logo-light-text.png"
									class="light-logo"
									alt="homepage"
								/>
							</span>
						</a>
						<!-- ============================================================== -->
						<!-- End Logo -->
						<!-- ============================================================== -->
						<!-- This is for the sidebar toggle which is visible on mobile only -->
						<a
							class="nav-toggler waves-effect waves-light d-block d-md-none"
							href="javascript:void(0)"
							><i class="mdi mdi-menu"></i
						></a>
					</div>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<div
						class="navbar-collapse collapse"
						id="navbarSupportedContent"
						data-navbarbg="skin5"
					>
						<!-- ============================================================== -->
						<!-- toggle and nav items -->
						<!-- ============================================================== -->
						<ul class="navbar-nav float-start me-auto">
							<!-- ============================================================== -->
							<!-- Search -->
							<!-- ============================================================== -->
							
						</ul>
						<!-- ============================================================== -->
						<!-- Right side toggle and nav items -->
						<!-- ============================================================== -->
						
					</div>
				</nav>
			</header>
			<!-- ============================================================== -->
			<!-- End Topbar header -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			<aside class="left-sidebar" data-sidebarbg="skin6">
				<!-- Sidebar scroll-->
				<div class="scroll-sidebar">
					<!-- Sidebar navigation-->
					<nav class="sidebar-nav">
						<ul id="sidebarnav">
							<li class="sidebar-item">
								<a
									class="sidebar-link waves-effect waves-dark sidebar-link"
									href="./dashboard.php"
									aria-expanded="false"
									><i class="mdi mdi-view-dashboard"></i
									><span class="hide-menu">Dashboard Admin</span></a
								>
							</li>
							<li class="sidebar-item">
								<a
									class="sidebar-link waves-effect waves-dark sidebar-link"
									href="./pages-user.php"
									aria-expanded="false"
									><i class="mdi mdi-account-box"></i
									><span class="hide-menu">User Himatif</span></a
								>
							</li>
							<!-- pendaftaran -->
							<li class="sidebar-item">
								<a
									class="sidebar-link waves-effect waves-dark sidebar-link"
									href="./pages-registerdata.php"
									aria-expanded="false"
									><i class="mdi mdi-book-open-page-variant"></i
									><span class="hide-menu">Data pendaftar</span></a
								>
							</li>
							<li class="sidebar-item">
								<a
									class="sidebar-link waves-effect waves-dark sidebar-link text-danger"
									href="../login/logout.php"
									aria-expanded="false"
									><i class="mdi mdi-account-alert"></i
									><span class="hide-menu">Logout</span></a
								>
							</li>
						</ul>
					</nav>
					<!-- End Sidebar navigation -->
				</div>
				<!-- End Sidebar scroll-->
			</aside>
			<!-- ============================================================== -->
			<!-- End Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->