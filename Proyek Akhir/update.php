<?php
    include "koneksi.php";
    $id = $_POST['id']; 
    $nim = $_POST['nim'];   
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $jeniskelamin = $_POST['jeniskelamin'];

    mysqli_query($koneksi, "UPDATE data_mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi', angkatan='$angkatan', jeniskelamin= '$jeniskelamin' WHERE id='$id'");
    
    header("location:datamahasiswa.php?pesan=update");
?>