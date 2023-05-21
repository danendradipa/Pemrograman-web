<?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'") or die();

    header("location:dashboard.php?pesan=hapus");
?>