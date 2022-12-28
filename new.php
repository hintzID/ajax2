<!--connect.php-->
<?php

$connect = mysqli_connect('localhost', 'root', '', 'latihanphp');

if(mysqli_connect_error()){
    echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{

}
?>

<!--datamahasiswa.php-->

<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <head>
        <body>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">gender</th>
            <th scope="col">email</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "connect.php";
            $no=1;
            $query=mysqli_query($connect, "SELECT * FROM latihanphp1");
            while ($result=mysqli_fetch_array($query)) {
                ?>
                    <tr id="baris-<?php echo $result['id']; ?>">
                    <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $result['nama']; ?>
                        </td>
                        <td>
                            <?php echo $result['alamat']; ?>
                        </td>
                        <td>
                            <?php echo $result['no hp']; ?>
                        </td>
                        <td>
                            <?php echo $result['gender']; ?>
                        </td>
                        <td>
                            <?php echo $result['email']; ?>
                        </td>
                        <td>
                            <?php echo "<img  src='..\java\img/$result[gambar]' width=50 >";?>
                        </td>
                        <td>
                            <button class="btn-hapus" data-id="<?php echo $result['id']; ?>">Hapus</button>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
   $('.btn-hapus').click(function() {
      // Dapatkan ID data yang akan dihapus
      var id = $(this).data('id');

      // Kirim permintaan penghapusan data ke server
      $.ajax({
         url: 'hapus.php',
         type: 'POST',
         data: {id: id},
         success: function(response) {
            // Tindakan setelah mendapat respons dari server
         }
      });
   });
});
</script>
        </body>
</html>

<!--hapus.php-->

<?php
   // Koneksi ke database
   include 'connect.php';

   // Dapatkan ID data yang akan dihapus dari permintaan AJAX
   $id = $_POST['id'];

   // Hapus data dari database
   $query = mysqli_query($connect, "DELETE FROM latihanphp1 WHERE id='$id'");

   // Cek apakah penghapusan berhasil
   if ($query) {
      // Beri respons jika penghapusan berhasil
      echo "sukses";
   } else {
      // Beri respons jika penghapusan gagal
      echo "gagal";
   }
?>

<!--index.php-->

<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Nama Santri</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    
    <body>
        <br>
        <div class="container">
            <h2 class="alert alert-success text-center">
                Daftar Nama Santri
            </h2>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-input">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"placeholder="Input alamat">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No HP</label>
                                    <input type="text" class="form-control" id="no hp" name="no hp"placeholder="Input no hp">
                                </div>
    
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gender</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"placeholder="Input email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gambar</label>
                                    <input type="text" class="form-control" id="gambar" name="gambar"placeholder="Input gambar">
                                </div>
    
    
    
                                <button type="submit" id="tombol-simpan" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div id="tabeldata">
                    
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    
        <script>
            $(document).ready(function () {
                update();
            });
            $("#tombol-simpan").click(function () {
                //validasi form
                $('#form-input').validate({
                    rules: {
                        nama: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        no_hp: {
                            required: true
                        },
                        gender: {
                            required: true
                        },
                        email: {
                            required: true
                        },
                        gambar: {
                            required: true
                        }
                    },
                    //jika validasi sukses maka lakukan
                    submitHandler: function (form) {
                        $.ajax({
                            type: 'POST',
                            url: "simpan.php",
                            data: $('#form-input').serialize(),
                            success: function () {
                                //setelah simpan data, update data terbaru
                                update()
                            }
                        });
                        //kosongkan form nama dan jurusan
                        document.getElementById("nama").value = "";
                        document.getElementById("alamat").value = "";
                        document.getElementById("no hp").value = "";
                        document.getElementById("gender").value = "";
                        document.getElementById("email").value = "";
                        document.getElementById("gambar").value = "";
                        return false;
                    }
                });
            });
    
            //fungsi tampil data
            function update() {
                $.ajax({
                    url: 'datamahasiswa.php',
                    type: 'get',
                    success: function(data) {
                        $('#tabeldata').html(data);
                    }
                });
            }
        </script>
    </body>
    
    </html>

    <!--simpan.php-->

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

<!-- tolong koreksi agar tombol hapus jQuery berfungsi normal-->