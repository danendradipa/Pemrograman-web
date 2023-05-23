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

    <title>Menampilkan Data Tabel</title>

    <style>
        .container {
            width: 80%;
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
    <div class="container">
        <div class="box">
            <div class="judul">
                <h3> Lihat Data Mahasiswa milik <?php echo $d['nama'] ?> </h3>
            </div>
            <br>
            <br>
            <div class="box">
                <?php
                include("koneksi.php");
                $nim = $_GET['nim'];
                $data = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE nim='$nim'") or die('koneksi gagal');
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <table>
                        <tr>
                            <td>NIM</td>
                            <td>: <?php echo $d['nim'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: <?php echo $d['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>: <?php echo $d['prodi'] ?></td>
                        </tr>
                        <tr></tr>
                    </table>
                <?php
                } ?>
            </div>
            <a href="dashboard.php" class="btn btn-danger mt-3">Kembali</a>
        </div>
    </div>
</body>

</html>