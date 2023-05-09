<?php 
    session_start();
    if (isset($_SESSION['login'])) { 
        echo "<h1>Selamat datang, ". $_SESSION['login'] ."</h1>";
        echo "<h2>Ini adalah HOME kamu.</h2>";
        echo "<h2>Klik <a href='logout.php'>disini</a> untuk logout (keluar)</h2>";
    }
    else {
        //session tidak muncul karena belum login atau belum berhasil login
        die ("Anda belum login! Pastikan Login terlebih dahulu <a href='studikasus.php'> disini</a>");
    }
?>