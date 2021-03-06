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

//check apakah sudah pernah mendaftar
$registered =mysqli_query($conn, "SELECT * FROM tb_registrationData WHERE id = '$id'" );
//jika belum pernah mendaftar maka munculkan form
if(!mysqli_num_rows($registered) > 0){

    $textReplaced = '<form method="POST" class="mx-4" id="form-registraion">
    <div class="form-group ">
        <label for="form-nim">NIM</label>
        <input type="text" class="form-control" id="NIM" name="nim" placeholder="L200XXXXX">
    </div>
    <div class="form-group ">
        <label for="form-angkatan">Angkatan</label>
        <select class="form-control" name="angkatan" id="form-angkatan">
            <option>2022</option>
            <option>2021</option>
        </select>
    </div>
    <div class="form-group ">
        <label for="form-asalSekolah">Asal Sekolah</label>
        <textarea class="form-control" name="asalSekolah" id="form-asalSekolah" rows="1"></textarea>
    </div>
    <div class="form-group ">
        <label for="form-organisasi">Pengalaman Organisasi</label>
        <textarea class="form-control" name="organisasi" id="form-organisasi" rows="3"></textarea>
    </div>
    <div class="form-group ">
        <label for="form-motivasi">Motivasi mengikuti HIMATIF</label>
        <textarea class="form-control" name="motivasi" id="form-motivasi" rows="3"></textarea>
    </div>
    <input class="btn btn-primary " name="btn-submit" type="submit" value="Submit">
</form>';

}else{

    $textReplaced = '<div class="registered d-flex flex-column justify-content-center p-4">
    <i class="mdi mdi-checkbox-marked-circle-outline fs-4 mx-auto mdi-48px"></i>
    <h1 class="mx-auto">kamu sudah mendaftar</h1>
    <br>
    <form method="POST" class="mx-4" id="form-cetak">
    <input class="btn btn-primary " name="btn-cetak" type="submit" value="Cetak Bukti">
    </form>
    </div>
    ';
    
}


if(isset($_POST['btn-submit'])){
    $nim = mysqli_real_escape_string($conn,$_POST['nim']);
    $angkatan = mysqli_real_escape_string($conn,$_POST['angkatan']);
    $organisasi = mysqli_real_escape_string($conn,$_POST['organisasi']);
    $asalSekolah = mysqli_real_escape_string($conn,$_POST['asalSekolah']);
    $motivasi = mysqli_real_escape_string($conn,$_POST['motivasi']);

    $result = mysqli_query($conn, "INSERT into tb_registrationData VALUE('$id', '$nim', '$angkatan', '$organisasi', '$asalSekolah', '$motivasi')");

    if($result){
        header('Location: ./pages-registration.php');  
    }

}

if(isset($_POST['btn-cetak'])){
    $_SESSION['idPDF'] = $id;
    echo "<script> window.open('../pdf.php', '_blank'); </script>";
}

?>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <?php
    include "partial/sidebar.php"
    ?>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="./pages-registration.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registration</li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Registration</h1>
                </div>
            </div>
        </div>
        <!-- untuk menampilkan di dalam htmlnya -->
        <?php echo $textReplaced; ?>

        <div class="container-fluid">

        </div>
        <footer class="footer text-center">
            All Rights Reserved by Flexy Admin. Designed and Developed by <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
</div>
<?php include './partial/js.php' ?>