<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP</title>
</head>

<body>

    <!-- Memisahkan kode php dan dokumen html -->

    <h2>1. Program PHP</h2>

    <?php
        echo 'Kode PHP di sini';
        // ...
        ?>
        <p> Dokumen HTML </p>
        <?php
        echo 'Kode PHP di sini';
        // ...
    ?>

    <!-- Shortcut kode php di dalam html -->
    <p> Kode<?php echo "PHP"; ?> di HTML</p>


    <h2>2. Variabel</h2>

    <!-- variabel diidentifikasikan melalui karakter dollar ($) -->
    <?php
        // Deklarasi dan inisialisasi
        $bil = 3;
        echo $bil;
        echo '<br/>';
    ?>

    <!-- fungsi var_dump() atau print_r() untuk memudahkan pemeriksaan variabel. -->
    <?php
        // Deklarasi dan inisialisasi
        $bil = 3;
        // Dumping informasi mengenai variabel
        var_dump($bil);
        echo '<br/>';
        print_r($bil);
        echo '<br/>';
    ?>

    <?php
        $bil = 3;
        // Output: int(3)
        var_dump($bil);
        echo '<br/>';

        // Output: string(0) ""
        $var = "";
        var_dump($var);
        echo '<br/>';

        // Output: NULL
        $var = null;
        var_dump($var);
    ?>

    <h2>3. Tipe Data dan Casting</h2>

    <!-- Menguji tipe data dengan is_ -->
    <?php
        $bil = 3;
        var_dump(is_int($bil));
        // Output: bool(true)
        echo '<br/>';
        $var = "";
        var_dump(is_string($var));
        // Output: bool(true)
        echo '<br/>';
    ?>

    <!-- Casting -->
    <?php
        $str = '123abc';
        // Casting nilai vaiabel $str ke integer
        $bil = (int) $str; // $bil = 123
        echo gettype($str);
        // Output: string
        echo '<br/>';
        echo gettype($bil);
        // Output: integer
    ?>

    <h2>4. Pernyataan Seleksi</h2>

    <!-- Pernyataan if -->
    <?php
        $a = 10;
        $b = 5;
        if ($a > $b) {
        echo 'a lebih besar dari b';
        }
        echo '<br/>';
    ?>
    

    <!-- Pernyataan if-else -->
    <?php
        $a = 10;
        $b = 5;
        if ($a < $b) {
        echo 'a lebih besar dari b';
        } else {
        echo 'a TIDAK lebih besar dari b';
        }
        echo '<br/>';
    ?>

    <!-- Pernyataan if-elseif -->
    <?php
        $a = 10;
        $b = 11;
        if ($a > $b) {
        echo 'a lebih besar dari b';
        } elseif ($a == $b) {
        echo 'a sama dengan b';
        } else {
        echo 'a kurang dari b';
        }
        echo '<br/>';
    ?>

    <!-- Pernyataan switch -->
    <?php
        $i = 0;
        if ($i == 0) {
        echo "i equals 0";
        } elseif ($i == 1) {
        echo "i equals 1";
        } elseif ($i == 2) {
        echo "i equals 2";
        }
        echo '<br/>';
        // Ekuivalen, dengan pendekatan switch
        switch ($i) {
        case 0:
        echo "i equals 0";
        break;
        case 1:
        echo "i equals 1";
        break;
        case 2:
        echo "i equals 2";
        break;
        }
    ?>

    <h2>5. Pengulangan</h2>

    <!-- Pengulangan while -->
    <?php
        $i = 0;
        while ($i < 10) {
        echo $i;
        // Inkremen counter
        $i++;
        }
        echo '<br/>';
    ?>

    <!-- Pengulangan do-while -->
    <?php
        $i = 0;
        do {
        echo $i;
        // Inkremen counter
        $i++;
        } while ($i < 10);
        echo '<br/>';
    ?>

    <!-- Pengulangan for -->
    <?php
        for ($i = 0; $i < 10; $i++) {
        echo $i;
        }
        echo '<br/>';
    ?>

    <!-- Pengulangan foreach -->
    <?php
        $arr = array(1, 2, 3, 4);
        foreach ($arr as $value) {
        echo $value;
        }
        echo '<br/>';
    ?>

    <h2>6. Fungsi dan Prosedur</h2>

    <!-- Definisi fungsi/prosedur -->
    <?php
        // Contoh prosedur
        function do_print() {
        // Mencetak informasi timestamp
        echo time();
        }
        // Memanggil prosedur
        do_print();
        echo '<br />';
        // Contoh fungsi penjumlahan
        function jumlah($a, $b) {
        return ($a + $b);
        }
        echo jumlah(2, 3);
        // Output: 5
        echo '<br />';
    ?>

    <!-- Argumen fungsi/prosedur -->
    <?php
        /**
        * Mencetak string
        * $teks nilai string
        * $bold adalah argumen opsional
        */
        function print_teks($teks, $bold = true) {
        echo $bold ? '<b>' .$teks. '</b>' : $teks;
        }
        print_teks('Indonesiaku');
        // Mencetak dengan huruf tebal
        echo '<br />';
        print_teks('Indonesiaku', false);
        // Mencetak dengan huruf reguler
    ?>


</body>

</html>