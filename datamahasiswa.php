<head>

</head>
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
                            <!-- Tambahkan tombol Hapus -->
                            <button class="btn-hapus" data-id="<?php echo $result['id']; ?>">Hapus</button>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<script>
 $(document).ready(function(){
      $("button.btn-hapus").click(function(){
         var id = $(this).attr("data-id");
        
            $.ajax({
               url: 'hapus.php',
               type: 'get',
               data: 'id=' + id,
               success: function(data){
                  update();
               }
            });
         
         return false;
      });
   });
</script>
</body>