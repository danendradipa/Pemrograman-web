<?php
include("koneksi.php");
include 'assets/layout/header.php';
$nim = $_GET['nim'];
$data = mysqli_query($koneksi, "SELECT * from data_mahasiswa WHERE nim='$nim'") or die('koneksi gagal');
$no = 1;
$d = mysqli_fetch_array($data);

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}
?>

    <!-- Data Mahasiswa -->
    <div class="container mt-5 pt-5">
        <div class="box">
            <h3>Edit Data Mahasiswa milik <?php echo $d['nama'] ?> </h3>
            <?php
            include "koneksi.php";
            $nim = $_GET['nim'];
            $data = mysqli_query($koneksi, "SELECT * from data_mahasiswa WHERE nim='$nim'") or die();
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
                        <select class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                            <option <?php if ($d['prodi'] == 'Teknologi Informasi') echo 'selected'; ?>>Teknologi Informasi</option>
                            <option <?php if ($d['prodi'] == 'Pendidikan Teknik Informatika') echo 'selected'; ?>>Pendidikan Teknik Informatika</option>
                            <option <?php if ($d['prodi'] == 'Pendidikan Teknik Elektronika') echo 'selected'; ?>>Pendidikan Teknik Elektronika</option>
                            <option <?php if ($d['prodi'] == 'Teknik Elektronika') echo 'selected'; ?>>Teknik Elektronika</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="angkatan">Angkatan</label>
                        <input name="angkatan" class="form-control" id="angkatan" value="<?php echo $d['angkatan'] ?>" required></input>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                            <option <?php if ($d['jeniskelamin'] == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                            <option <?php if ($d['jeniskelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="flex">
                        <button class="btn btn-primary" type="submit">
                            Konfirmasi
                        </button>
                        <a href="datamahasiswa.php" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
