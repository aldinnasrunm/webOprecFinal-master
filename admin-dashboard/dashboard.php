<?php 
session_start();

if (!isset($_SESSION['user'])) {
 header("Location: ../index.php");
 exit;
}

include('../dbconnect.php');

include 'partial/head.php';

$userid = $_SESSION['id'];

$result = mysqli_query($conn, "SELECT * FROM user WHERE userid = '$userid'");


?>

		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div
			id="main-wrapper"
			data-layout="vertical"
			data-navbarbg="skin5"
			data-sidebartype="full"
			data-sidebar-position="absolute"
			data-header-position="absolute"
			data-boxed-layout="full"
		>

		<?php 
		
		include "partial/sidebar.php"
		
		?>
        
			<!-- ============================================================== -->
			<!-- Page wrapper  -->
			<!-- ============================================================== -->
			<div class="page-wrapper">
				<!-- ============================================================== -->
				<!-- Bread crumb and right sidebar toggle -->
				<!-- ============================================================== -->
				<div class="page-breadcrumb">
					<div class="row align-items-center">
						<div class="col-6">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 d-flex align-items-center">
									<li class="breadcrumb-item">
										<a href="./dashboard.php" class="link"
											><i class="mdi mdi-home-outline fs-4"></i
										></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Dashboard
									</li>
								</ol>
							</nav>
							<h1 class="mb-0 fw-bold">Dashboard</h1>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- End Bread crumb and right sidebar toggle -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Container fluid  -->
				<!-- ============================================================== -->
				<div class="container-fluid">
					<div class="d-flex flex-wrap">
						<div class="card text-dark bg-warning mb-3" style="max-width: 18rem; margin-right: 30px;">
						<div class="card-header">Pengumuman</div>
						<div class="card-body">
							<h5 class="card-title">Comming Soon</h5>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					</div>
				
					<div class="row">
						<div class="col-lg-4 col-xlg-3 col-md-5">
            
				</div>
				<!-- ============================================================== -->
				<!-- End Container fluid  -->
				<!-- ============================================================== -->
				
			</div>
			<!-- ============================================================== -->
			<!-- End Page wrapper  -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->
<?php include './partial/js.php'?>