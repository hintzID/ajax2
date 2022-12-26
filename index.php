

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