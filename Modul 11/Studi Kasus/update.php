<?php
    include "koneksi.php";
    $id = $_POST['id']; 
    $nim = $_POST['nim'];   
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id='$id'");
    
    header("location:dashboard.php?pesan=update");
?>