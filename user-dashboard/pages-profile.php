<?php 
session_start();


include '../dbconnect.php';


if (!isset($_SESSION['user'])) {
 header("Location: ../index.php");
 exit;
}
include('partial/head.php');

$id = $_SESSION['id'];

if (isset($_POST['submit-update'])) {
 $nama   = $_POST['nama'];
 $email = $_POST['email'];
 $no_hp = $_POST['no_hp'];
 echo "<script>console.log('".$no_hp."')</script>";
 $alamat = $_POST['alamat'];
 $result = mysqli_query($conn, "UPDATE user SET nama = '$nama', useremail = '$email', no_hp = '$no_hp', alamat='$alamat' WHERE userid = '$id'");
 if ($result) {
  header("Location: ./dashboard.php?edit=success");
 } else {
  echo "<script>alert('gagal edit data')</script>";
  echo mysqli_error($conn);
 }
}


$dataUser = mysqli_query($conn, "SELECT * FROM user WHERE userid = '$id'");


?>




    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
                              <li class="breadcrumb-item"><a href="./pages-profile.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Profile</h1> 
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <?php foreach ($dataUser as $user):?>
                            <div class="card-body">
                                <center class="m-t-30"> <img src="./assets/images/users/5.jpg"
                                        class="rounded-circle" width="150" />
                                </center>
                            </div>                        
                        </div>
                        <div class="card-body"> 
                                    <small class="text-muted">Nama Lengkap</small>
                                    <h6><?= $user['nama']?></h6> 
                                    <small class="text-muted">Email</small>
                                    <h6><?= $user['useremail']?></h6> 
                                    <small class="text-muted p-t-30 db">Nomor HP</small>
                                    <h6><?= $user['no_hp']?></h6> 
                                    <small class="text-muted p-t-30 db">Alamat</small>
                                    <h6><?= $user['alamat']?></h6>
                        </div>
					</div>
                            <?php endforeach; ?>
               
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Nama Lengkap</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan Doe"
                                                class="form-control form-control-line"
                                                value="<?= $user['nama']?>" name="nama">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com"
                                                class="form-control form-control-line" name="email"
                                                value="<?= $user['useremail']?>"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Nomor HP</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890" name="no_hp"
                                            value="<?= $user['no_hp']?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Alamat</label>
                                        <div class="col-md-12">
                                            <textarea rows="5"class="form-control form-control-line" name="alamat"><?= $user['alamat']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white" name="submit-update">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Flexy Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
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