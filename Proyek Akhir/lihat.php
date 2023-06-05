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
            <div class="judul">
                <h3> Lihat Data Mahasiswa milik <?php echo $d['nama'] ?> </h3>
            </div>
            <br>
            <br>
            <div class="box">
                <?php
                include("koneksi.php");
                $nim = $_GET['nim'];
                $data = mysqli_query($koneksi, "SELECT * from data_mahasiswa WHERE nim='$nim'") or die('koneksi gagal');
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
                        <tr>
                            <td>Angkatan</td>
                            <td>: <?php echo $d['angkatan'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php echo $d['jeniskelamin'] ?></td>
                        </tr>
                    </table>
                <?php
                } ?>
            </div>
            <a href="datamahasiswa.php" class="btn btn-danger mt-3">Kembali</a>
        </div>
    </div>
