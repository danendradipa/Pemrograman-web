<?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'") or die();

    header("location:full.php?pesan=hapus");
?>