<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>Login - Manajemen Data Mahasiswa</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F5EFE7;
        }

        .box-area {
            width: 900px;
            position: relative;
            overflow: hidden;
        }

        .left-box {
            background-color: #4F709C;
            padding: 40px 0 40px 0;
            z-index: 3;
        }

        .login-box {
            padding: 80px 50px 80px 40px;
            position: absolute;
            top: 0;
            right: 0;
            transition: .5s ease-in-out;
        }

        .regis-box {
            padding: 40px 50px 40px 40px;
            position: absolute;
            top: 0;
            right: -450px;
            transition: .5s ease-in-out;
        }

        .login-box .header-text {
            font-family: 'Poppins', sans-serif;

        }

        .password-container {
            position: relative;
        }

        .bi-eye-fill {
            position: absolute;
            top: 40px;
            right: 10px;
            cursor: pointer;
        }

        .bi-eye-slash-fill {
            position: absolute;
            top: 40px;
            right: 10px;
            cursor: pointer;
            color: red;
        }

        ::placeholder {
            font-size: 12.8px;
        }
    </style>
</head>

<body>

    <!-- Main Container -->
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <!-- Login Container -->
        <div class="row border rounded-5 bg-white p-3 shadow box-area">

            <!-- Left Box -->
            <div class="col-sm-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="left-image mb-3">
                    <img src="assets/img/gambar.png" alt="gambar hero" style="width: 375px;">
                </div>
            </div>

            <!-- login Box -->
            <?php
            include('koneksi.php');
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) == 1) {
                    $data = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $data['username'];
                    header("location: dashboard.php");
                } else {
                    $message = "<span style='color:red; font-size: 14px'>Username atau Password Salah! Silakan Coba Lagi</span>";
                    header("refresh:2; url=login.php");
                }
            }
            ?>
            <div class="col-sm-6 login-box" id="logSwitch">
                <div class="row align-items-center">
                    <div class="header-text mb-2">
                        <h2 class="fw-bold fs-1 mb-3">Log In</h2>
                    </div>
                    <form action="" name="loginForm" method="post" onsubmit="return validateLogForm()">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3 password-container">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                            <i class="bi bi-eye-fill toggle" onclick="showMyFunction()"></i>
                        </div>
                        <?php if (isset($message)) : ?>
                            <div class="message mb-2">
                                <?= $message ?>
                            </div>
                        <?php endif; ?>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" name="login" type="submit">Login</button>
                        </div>
                        <div class="row text-center">
                            <small>Belum punya akun? <a href="#" class="logSwitch" onclick="logSwitch()">Buat akun</a></small>
                        </div>
                    </form>
                </div>
            </div>

            <!-- register box -->
            <?php include("koneksi.php");
            if (isset($_POST['buat_akun'])) {
                $username = $_POST['regUsername'];
                $email = $_POST['regEmail'];
                $password = $_POST['regPassword'];

                $query = mysqli_query($koneksi, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
            }
            ?>
            <div class="col-sm-6 regis-box" id="regSwitch">
                <div class="row align-items-center">
                    <div class="header-text mb-2">
                        <h2 class="fw-bold fs-1 mb-3">Registrasi Akun</h2>
                    </div>
                    <form action="" name="regForm" method="post" onsubmit="return validateRegForm()">
                        <div class="mb-3">
                            <label for="regUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="regUsername" name="regUsername" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="regEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="email@address.com">
                        </div>
                        <div class="mb-3 password-container">
                            <label for="regPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="*******">
                            <i class="bi bi-eye-fill tombol" onclick="showMyFunction2()"></i>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" name="buat_akun" type="submit">Buat Akun</button>
                        </div>
                        <div class="row text-center">
                            <small>Sudah punya akun? <a href="#" class="regSwitch" onclick="regSwitch()">Login</a></small>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Hide And Show Password In Login Form -->
    <script>
        const toggle = document.querySelector(".toggle")

        function showMyFunction() {
            var x = document.getElementById("password");
            if (x.type == "password") {
                x.type = "text";
                toggle.classList.replace("bi-eye-fill", "bi-eye-slash-fill");
            } else {
                x.type = "password"
                toggle.classList.replace("bi-eye-slash-fill", "bi-eye-fill");
            }
        }
    </script>

    <!-- Hide And Show Password In Regiser Form -->
    <script>
        const tombol = document.querySelector(".tombol")

        function showMyFunction2() {
            var z = document.getElementById("regPassword");
            if (z.type == "password") {
                z.type = "text";
                tombol.classList.replace("bi-eye-fill", "bi-eye-slash-fill");
            } else {
                z.type = "password"
                tombol.classList.replace("bi-eye-slash-fill", "bi-eye-fill");
            }
        }
    </script>

    <!-- Transition  -->
    <script>
        var a = document.getElementById('logSwitch');
        var b = document.getElementById('regSwitch');


        function logSwitch() {
            a.style.right = "450px";
            a.style.top = "0px";
            b.style.right = "0px";
            b.style.top = "0px";
        }

        function regSwitch() {
            a.style.right = "0px";
            a.style.top = "0px";
            b.style.right = "-450px";
            b.style.top = "0px";
        }
    </script>

    <!-- Log Form Validate -->
    <script>
        function validateLogForm() {
            const usernameForm = document.querySelector('input[name="username"]').value;
            const passwordForm = document.querySelector('input[name="password"]').value;

            if (!usernameForm || !passwordForm) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Login',
                    text: 'Semua data harus diisi!',
                })
                document.forms["loginForm"]["username"].focus()
                return false;
            }
        }
    </script>

    <!-- Regis Form Validate -->
    <script>
        function validateRegForm() {
            const usernameReg = document.querySelector('input[name="regUsername"]').value;
            const emailReg = document.querySelector('input[name="regEmail"]').value;
            const passwordReg = document.querySelector('input[name="regPassword"]').value;

            if (!usernameReg || !passwordReg || !emailReg) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Registrasi',
                    text: 'Semua data harus diisi!',
                })
                document.forms["regForm"]["regUsername"].focus()
                return false;
            }
            else {
                Swal.fire({
                    icon: 'success',
                    title: 'Registrasi Sukses',
                    text: 'Silahkan Login',
                    timer:3000
                })
            }
        }
    </script>

</body>

</html>