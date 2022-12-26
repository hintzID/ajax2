

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
        </tr>
    </thead>
    <tbody>
        <?php
            include "connect.php";
            $no=1;
            $query=mysqli_query($connect, "SELECT * FROM latihanphp1");
            while ($result=mysqli_fetch_array($query)) {
                ?>
                    <tr>
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
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>
