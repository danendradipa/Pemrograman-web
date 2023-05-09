<?php 
    session_start();
    if (isset($_SESSION['login'])) {
        unset ($_SESSION);
        session_destroy();
        echo "<h1>Kamu berhasil logout.</h1>";
        echo "<h2>Klik <a href='studikasus.php'>disini</a> untuk login lagi. <br>Kamu tidak bisa masuk ke <a href='beranda.php'>HOME(Beranda)</a> lagi</h2>";
    }