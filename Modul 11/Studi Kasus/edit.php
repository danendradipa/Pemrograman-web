<?php
include("koneksi.php");
$nim = $_GET['nim'];
$data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die('koneksi gagal');
$no = 1;
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Data Mahasiswa</title>

    <style>
        .container {
            width: 50%;
            margin: auto;
        }

        .box {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="box">
            <h3>Edit Data Mahasiswa milik <?php echo $d['nama'] ?> </h3>
            <?php
            include "koneksi.php";
            $nim = $_GET['nim'];
            $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die();
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <form action="update.php" method="post" onsubmit="return confirmUpdate()">
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <div class="form-group mb-2">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $d['nim'] ?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $d['nama'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="prodi">Program Studi</label>
                        <input name="prodi" class="form-control" id="prodi" value="<?php echo $d['prodi'] ?>" required></input>
                    </div>
                    <div class="flex">
                        <button class="btn btn-primary" type="submit">
                            Konfirmasi
                        </button>
                        <a href="dashboard.php" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        function confirmUpdate() {
            return confirm("Apakah anda yakin ingin mengubah data?");
        }
    </script>
</body>

</html>