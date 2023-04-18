<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Seleksi</title>
</head>

<body>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        Pekerjaan
        <select name="job">
            <option value="Mahasiswa">Mahasiswa
            <option value="ABRI">ABRI
            <option value="PNS">PNS
            <option value="Swasta">Swasta
        </select> <br>
        
        <input type="submit" value="ok">
    </form>

    <?php
    if (isset($_POST['job'])) {
        echo $_POST['job'];
    }
    ?>

</body>

</html>