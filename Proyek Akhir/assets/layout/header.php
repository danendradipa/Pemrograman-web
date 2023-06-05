<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- CSS Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Manajemen Data Mahasiswa</title>

    <style>
        body {
            background-color: #F5EFE7;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .box {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 20px;
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            opacity: 0;
            ;
            transition: all 0.2s;
        }

        .nav-link:hover::after {
            content: '';
            opacity: 1;
            height: 2px;
            width: 100%;
            background-color: greenyellow;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .nav-link:hover::after {
            content: '';
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm navbar-dark fixed-top pt-3 pb-3 mb-5" style="background-color: #213555;">
        <div class="container">
            <img src="assets/img/uny.png" alt="" width="45px">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="nav-link" href="datamahasiswa.php">Data Mahasiswa</a>
                    </li>
                </ul>
                <form action="" method="post" onsubmit="return confirmLogout()">
                    <button class="btn btn-danger" type="submit" name="logout">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <script>
        function confirmLogout() {
            return confirm("Apakah anda yakin ingin logout?");
        }

        function confirmUpdate() {
            return confirm("Apakah anda yakin ingin mengubah data?");
        }

        function confirmDelete() {
            return confirm("Apakah anda yakin ingin menghapus data?");
        }

        function confirmInsert() {
            return confirm("Apakah anda yakin ingin menambahkan data?");
        }
    </script>

</html>