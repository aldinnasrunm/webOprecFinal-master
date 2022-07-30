<?php
session_start();

include '../dbconnect.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login/login.php");
    exit;
}

include('partial/head.php');

$result = mysqli_query($conn, "SELECT * FROM user ORDER BY userid DESC");
$data   = mysqli_num_rows($result);


//listes from get, and delete data
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $isRegistered = mysqli_query($conn, "SELECT * FROM tb_registrationData WHERE id = $id");
    if(mysqli_num_rows($isRegistered) > 0){
        $delete = mysqli_query($conn, 
        "DELETE user,tb_registrationData FROM user
        INNER JOIN tb_registrationData
        ON user.userid = tb_registrationData.id WHERE user.userid = $id");
    }else{
        $delete = mysqli_query($conn, "DELETE FROM user WHERE userid = $id");
    }
    
    if($delete){
        // header('pages-user.php');
        header("Refresh:0; url=pages-user.php");
    }
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
                    <h1 class="mb-0 fw-bold">Data User Himatif</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if ($data <= 0) : ?>
                <div class="d-flex justify-content-center flex-column">
                    <h1 class="text-center">Tidak Ada data</h1>
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
                        <th scope="col">email</th>
                        <th scope="col">tanggal daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($result as $user) : ?>
                        <div>
                            <tr>
                                <?php
                                    $id = $user['userid'];
                                ?>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $user['nama'] ?></td>
                                <td><?= $user['useremail'] ?></td>
                                <td><?= $user['tgldaftar'] ?></td>
                                <!-- button -->
                                <td><a type="submit" name="btn-deleteData" class="btn btn-danger" href="pages-user.php?del=<?php echo $id; ?>" >Delete</a></td>
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