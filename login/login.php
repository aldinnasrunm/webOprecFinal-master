<?php 


require '../dbconnect.php';
session_start();

if (isset($_SESSION['user'])) {
  header("Location: ../user-dashboard/dashboard.php?login=success");
 }


if(isset($_POST['btn-login'])){;
		$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

	// check if username on the database
	$result = mysqli_query($conn, "SELECT * FROM admin WHERE adminemail = '$email'");
	
  // check apakah admin atau bukan
	if(mysqli_num_rows($result) == 0){
		// bukan admin
		$resultUser = mysqli_query($conn, "SELECT * FROM user WHERE useremail = '$email'");
		$user = mysqli_fetch_assoc($resultUser);
    if(mysqli_num_rows($resultUser) == 1){
      if(password_verify($password, $user['userpassword'])){
				$_SESSION['id'] = $user['userid'];
				$_SESSION['user'] = true;
				header("Location: ../user-dashboard/dashboard.php?login=success");
			} else {
				header("Location: login.php?wrong-password");
			}
		} else {
			header("Location: login.php?user-not-found");
		}
	}

		if ($result) {
		$admin = mysqli_fetch_assoc($result);
			if ($password === $admin['adminpassword']) {
				$_SESSION['email'] = $email;
				$_SESSION['admin'] = true;
				header("Location: index.php?login=success");
				header("Location: ../admin-dashboard/admin.php");
				exit;
 			}
		}
} 

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/img/icon/favicon.ico" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/styles-login.css" />
    <title>Sign in & Sign up Form</title>
</head>
<body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="E-mail" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" name="btn-login" value="Login" class="btn solid" />
          </form>
          <?php
if(isset($_POST['btn-daftar'])){
// cek konfirmasi password
echo "<script>console.log('btn-daftar clicked!!' );</script>";
  if($_POST['password'] == $_POST['konfirmasi_password']){
    echo '<script> alert("ok lnjt");</script>';
    //cek apakah email sudah pernah digunakan
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $dateFormat = date('Y-m-d');
    $lihat1 = mysqli_query($conn,"select * from user where useremail='$email'");
    $lihat2 = mysqli_num_rows($lihat1);
    $password = password_hash($password, PASSWORD_DEFAULT);
    echo '<script> alert('.$lihat2.');</script>';
      if($lihat2 < 1){
    //email belum pernah digunakan
        $insert = mysqli_query($conn,"insert into user (nama,useremail,userpassword, tgldaftar) values ('$nama','$email','$password', '$dateFormat')");
        //eksekusi query
          if($insert){
              // echo '<script> alert("ok");</script>';
              echo "<div class='alert alert-success' role='alert'> Registrasi Berhasil, silahkan login.</div>
              <meta http-equiv='refresh' content='2; url= login.phpl'/>  ";
          } else {
              //daftar gagal
              // echo '<script> alert("gagal");</script>';
              echo "<div class='alert alert-warning'>Registrasi gagal, silakan coba lagi.</div>
              <meta http-equiv='refresh' content='2'>";
          }
      } else {
          //jika email sudah pernah digunakan
          // echo '<script> alert("email sdh digunakan");</script>';
          $alert = '<strong><font color="red">Email sudah pernah digunakan!</font></strong>';
          echo '<meta http-equiv="refresh" content="2">';
          }
  } else{
    // echo '<script> alert("password hasrus sama");</script>';
    $alert = '<strong><font color="red">pastikan password sama</font></strong>';
    echo '<meta http-equiv="refresh" content="2" url="registrasi.php">';
    }
};
?>
          <form method="post" class="sign-up-form">
            <h2 class="title">Daftar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nama" placeholder="Nama Lengkap" autofocus required/>
              <p class="help-block text-danger"></p>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="E-mail" required/>
              <p class="help-block text-danger"></p>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required="required"/>
              <p class="help-block text-danger"></p>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required="required"/>
              <p class="help-block text-danger"></p>
            </div>
            <input type="submit" name="btn-daftar" class="btn" value="Daftar" />
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Belum Punya Akun ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Daftar
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah Punya Akun ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              MASUK
            </button>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/app.js"></script>
  </body>
</html>