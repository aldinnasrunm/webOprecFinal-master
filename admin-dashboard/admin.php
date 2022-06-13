<?php

include '../dbconnect.php';

session_start();


if (!isset($_SESSION['admin'])) {
 header("Location: ../login/login.php");
 exit;
}

include('../dbconnect.php');

include 'partial/head.php';



$result = mysqli_query($conn, "SELECT * FROM user ORDER BY userid DESC");
$data   = mysqli_num_rows($result);
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





<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
 <div class="container">
    <h1>admin page</h1>
     <h1 class="text-center">Daftar User</h1>
        <?php if ($data <= 0): ?>
        <div class="d-flex justify-content-center flex-column">
            <h1 class="text-center">Tidak Ada Data Siswa</h1>
            <a href="./tambah.php" class="btn btn-primary">Tambah Siswa</a>
        </div>
        <?php else: ?>
           <h5>Jumlah <?=$data ?> User</h5>
        <?php endif ?>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">email</th>
                    <th scope="col">tanggal daftar</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;foreach ($result as $user): ?>
                <div>
                    <tr>
                        <th scope="row"><?=$no++ ?></th>
                        <td><?=$user['nama'] ?></td>
                        <td><?=$user['useremail'] ?></td>
                        <td><?=$user['tgldaftar'] ?></td>
                    </tr>
                </div>
                <?php endforeach; ?>
            </tbody>
    </table>
    <a href="../login/logout.php" class="btn btn-danger">Logout</a>
 </div>
</body>
</html> -->