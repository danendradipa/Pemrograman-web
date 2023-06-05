<?php
include 'assets/layout/header.php';
if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}
?>

<!-- Data Mahasiswa -->
<div class="container mt-5 pt-5 pt-5">
    <div class="box">
        <h2 class="text-center mb-5">Data Mahasiswa</h2>
        <div class="box">
            <a href="tambah_data.php" class="btn btn-primary mb-3">Tambah Data</a>
            </form>
            <table class="table table-striped mt-3" id="data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Angkatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include("koneksi.php");
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * from data_mahasiswa");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nim']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['prodi']; ?></td>
                            <td><?php echo $d['angkatan']; ?></td>
                            <td><?php echo $d['jeniskelamin']; ?></td>
                            <td>
                                <a class="btn btn-success" href="lihat.php?nim=<?php echo $d['nim']; ?>">Lihat</a>
                                <a class="btn btn-warning" href="edit.php?nim=<?php echo $d['nim']; ?>">Edit</a>
                                <a class="btn btn-danger" href="hapus.php?nim=<?php echo $d['nim']; ?>" onclick="return confirmDelete()">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Javascript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#data').DataTable();
    });

    function confirmLogout() {
        return confirm("Apakah anda yakin ingin logout?");
    }

    function confirmDelete() {
        return confirm("Apakah anda yakin ingin menghapus data?");
        }

</script>

