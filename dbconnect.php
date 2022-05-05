<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost","aldin","password","db_oprec");
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    die("Koneksi gagal: " . mysqli_connect_error());
};
?>
