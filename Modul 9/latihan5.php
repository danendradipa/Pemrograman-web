<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Check Box</title>
</head>

<body>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        Jenis Kelamin
        <input type="checkbox" name="hobby[]" value="Membaca" />Membaca
        <input type="checkbox" name="hobby[]" value="Olahraga" />Olahraga
        <input type="checkbox" name="hobby[]" value="Menyanyi" />Menyanyi <br>

        <input type="submit" value="ok">
    </form>

    <?php
    // Ekstraksi nilai
    if (isset($_POST['hobby'])) {
        foreach ($_POST['hobby'] as $key => $val) {
            echo $key . ' -> ' . $val . '<br>';
        }
    }
    ?>

</body>

</html>