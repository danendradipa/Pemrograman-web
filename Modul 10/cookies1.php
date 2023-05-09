<?php 
    $value = 'Dipa';
    $value2 = 'Danendra Dipa';
    setcookie("username", $value);
    setcookie("nama_lengkap", $value2, time()+3600); //expired login 1 jam
    echo "<h2>Ini halaman untuk set cookie</h2>";
    echo "<h2>Klik <a href='cookies2.php'> disini </a>untuk mengecek cookies</h2>";
?>
