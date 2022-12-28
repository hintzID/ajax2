

<?php
   // koneksi ke database
   $connect = mysqli_connect('localhost', 'root', '', 'latihanphp');

   // jika koneksi gagal, tampilkan pesan error
   if(mysqli_connect_error()){
      echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
   }

   // ambil id dari URL
   $id = $_GET['id'];

   // query hapus data
   $query = mysqli_query($connect, "DELETE FROM latihanphp1 WHERE id='$id'");

   // jika query gagal, tampilkan pesan error
   if(!$query){
      echo 'Gagal menghapus data : '.mysqli_error($connect);
   }

   // tutup koneksi ke database
   mysqli_close($connect);
?>