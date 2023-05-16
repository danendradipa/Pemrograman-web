<!-- Login Page -->
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
        $message = "<span style='color:red'>Username atau Password Salah! Silakan Coba Lagi</span>";
        header("refresh:2; url=login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Studi Kasus Modul 11</title>

    <style>
        body {
            background-color: #616161;
        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card text-bg-dark">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4" name="loginForm" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
                                <h2 class="fw-bold mb-2 text-uppercase ">LOGIN FORM</h2>
                                <p class=" mb-2">Masukkan Username dan Password Anda!</p>
                                <div class="mb-3">
                                    <label for="username" class="form-label ">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Input ur username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                                </div>
                                <?php if (isset($message)) : ?>
                                    <div class="message">
                                        <?= $message ?>
                                    </div>
                                <?php endif; ?>
                                <div class="d-grid mt-4">
                                    <button class="btn btn-primary" name="login" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            const username = document.querySelector('input[name="username"]').value;
            const password = document.querySelector('input[name="password"]').value;

            if (!username || !password) {
                alert('Username dan Password harus diisi!');
                document.forms["loginForm"]["username"].focus()
                return false;
            }
            if (!/^[a-zA-Z]*$/g.test(username) || !/^[a-zA-Z]*$/g.test(pasword)) {
                alert("Username dan Password hanya boleh berisi huruf");
                document.forms["loginForm"]["username"].focus();
                return false;
            }
        }
    </script>

</body>

</html>