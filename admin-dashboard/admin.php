<?php

include '../dbconnect.php';

session_start();

if (!isset($_SESSION['admin'])) {
 header("Location: ../login/login.php");
 exit;
}

$result = mysqli_query($conn, "SELECT * FROM user ORDER BY userid DESC");
$data   = mysqli_num_rows($result);
?>

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
</html>