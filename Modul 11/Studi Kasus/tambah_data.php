<?php include("koneksi.php");

if (isset($_POST['tambah_data'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, prodi) VALUES ('$nama', '$nim', '$prodi')");

    if ($query) {
        header("location: dashboard.php");
    } else {
        echo "Gagal tambah data";
    }
}
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
            <h2>Tambah Data Mahasiswa</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return confirmInsert()">
                <div class="form-group mb-2">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" required>
                </div>
                <div class="form-group mb-2">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group mb-3">
                    <label for="prodi">Program Studi</label>
                    <input name="prodi" class="form-control" id="prodi" required></input>
                </div>
                <div class="flex">
                    <button class="btn btn-primary" type="submit" name="tambah_data">
                        Tambah
                    </button>
                    <a href="dashboard.php" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function confirmInsert() {
            return confirm("Apakah anda yakin ingin menambahkan data?");
        }
    </script>
</body>

</html>