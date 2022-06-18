<?php
session_start();

include '../dbconnect.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login/login.php");
    exit;
}

include('partial/head.php');

$result = mysqli_query($conn, "SELECT * FROM tb_registrationData ORDER BY id DESC");
$data   = mysqli_num_rows($result);

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $delete = mysqli_query($conn, "DELETE FROM tb_registrationData WHERE id = $id");
    if($delete){
        header('pages-location.php');
    }
}

if(isset($_GET['prt'])){
    $id = $_GET['prt'];
    $_SESSION['idPDF'] = $id;
    echo "<script> window.open('../pdf.php', '_blank');</script>";
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
                    <h1 class="mb-0 fw-bold">Registration Data</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="text-center">Data Pendaftar</h1>
            <?php if ($data <= 0) : ?>
                <div class="d-flex justify-content-center flex-column">
                    <h1 class="text-center">Tidak Ada Pendaftar</h1>
                    <a href="./tambah.php" class="btn btn-primary">Tambah Siswa</a>
                </div>
            <?php else : ?>
                <h5>Jumlah <?= $data ?> User</h5>
            <?php endif ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Angkatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($result as $regisData) : ?>
                        <div>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?php 
                                    $id = $regisData['id'];
                                    $query = mysqli_query($conn, "SELECT nama FROM user WHERE userid = $id ");
                                    $nama   = mysqli_fetch_column($query);
                                    echo $nama;
                                ?></td>
                                <td><?= $regisData['nim'] ?></td>
                                <td><?= $regisData['angkatan'] ?></td>
                                <td><a type="submit" name="btn-printData" class="btn btn-primary" href="pages-registerdata.php?prt=<?php echo $id; ?>" >Print</a></td>
                                <td><a type="submit" name="btn-deleteData" class="btn btn-danger" href="pages-registerdata.php?del=<?php echo $id; ?>" >Delete</a></td>
                            </tr>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="container-fluid">

        </div>
        <footer class="footer text-center">
            All Rights Reserved by Flexy Admin. Designed and Developed by <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
</div>
<?php include './partial/js.php' ?>