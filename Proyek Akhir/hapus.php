<?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    mysqli_query($koneksi, "DELETE FROM data_mahasiswa WHERE nim='$nim'") or die();

    header("location:datamahasiswa.php?pesan=hapus");
?>