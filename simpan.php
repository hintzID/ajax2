

<?php 

include('connect.php');

$nama       = $_POST['nama'];
$alamat   = $_POST['alamat'];
$no_hp   = $_POST['no_hp'];
$gender  = $_POST['gender'];
$email  = $_POST['email'];
$gambar   = $_POST['gambar'];
    
$insert = mysqli_query($connect, "INSERT INTO `latihanphp1`(`id`, `nama`, `alamat`, `no hp`, `gender`, `email`, `gambar`) VALUES ('$no','$nama','$alamat','$no_hp','$gender','$email','$gambar')");

?>
