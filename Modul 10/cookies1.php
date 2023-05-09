<?php 
    $value = 'ani';
    $value2 = 'Ani Roma';
    setcookie("username", $value);
    setcookie("nama_lengkap", $value2, time()+3600); //expired login 1 jam
    echo "<h2>Ini halaman untuk set cookie</h2>";
    echo "<h2>Klik <a href='cookies2.php'> disini <a/a>untuk mengecek cookies</h2>";
?>
