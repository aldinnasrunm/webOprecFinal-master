<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost","root","","db_oprec");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
};
?>
