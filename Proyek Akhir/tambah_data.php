<?php
include("koneksi.php");
include 'assets/layout/header.php';

if (isset($_POST['tambah_data'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $jeniskelamin = $_POST['jeniskelamin'];

    $query = mysqli_query($koneksi, "SELECT * from data_mahasiswa WHERE nim = '$nim'");
    $cek=mysqli_num_rows($query);

    if ($cek==0) {
        mysqli_query($koneksi, "INSERT INTO data_mahasiswa (nama, nim, prodi, angkatan, jeniskelamin) VALUES ('$nama', '$nim', '$prodi', '$angkatan', '$jeniskelamin')");
        header("location: datamahasiswa.php");
    } else {
        $alert="<div class='alert alert-danger alert-dismissible fade show '> NIM Sudah dipakai</div>";
        header("refresh:3; url=tambah_data.php");
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
    }
}
?>

<!-- Tambah Data -->
<div class="container mt-5 pt-5">
    <div class="box">
        <h2>Tambah Data Mahasiswa</h2>
        <hr>
        <?php echo @$alert?>
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
                <select class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                    <option selected disabled hidden>Select One</option>
                    <option>Teknologi Informasi</option>
                    <option>Pendidikan Teknik Informatika</option>
                    <option>Pendidikan Teknik Elektronika</option>
                    <option>Teknik Elektronika</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="angkatan">Angkatan</label>
                <input name="angkatan" class="form-control" id="angkatan" required></input>
            </div>
            <div class="form-group mb-3">
                <label for="jeniskelamin">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" id="jeniskelamin" name="jeniskelamin">
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="flex">
                <button class="btn btn-primary" type="submit" name="tambah_data">
                    Tambah
                </button>
                <a href="datamahasiswa.php" class="btn btn-danger">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>