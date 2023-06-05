<?php
include "koneksi.php";
include 'assets/layout/header.php';
if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h2 class="pt-5 mt-5 text-center mb-5">GRAFIK DATA MAHASISWA DPTEI</h2>
    <div class="d-flex justify-content-center">
        <div class="graf-1 pt-5 ms-3">
            <div style="width:500px; height: 500px" ;>
                <canvas id="chart"></canvas>
            </div>
        <script>
            var ctx = document.getElementById('chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Teknologi Informasi', 'Pendidikan Teknik Informatika', 'Pendidikan Teknik Elektronika', 'Teknik Elektronika'],
                    datasets: [{
                        label: 'Data',
                        data: [
                            <?php
                            $ti = mysqli_query($koneksi, "SELECT * from data_mahasiswa where prodi= 'Teknologi Informasi'");
                            echo mysqli_num_rows($ti);
                            ?>,

                            <?php
                            $pti = mysqli_query($koneksi, "SELECT * from data_mahasiswa where prodi= 'Pendidikan Teknik Informatika'");
                            echo mysqli_num_rows($pti);
                            ?>,

                            <?php
                            $pte = mysqli_query($koneksi, "SELECT * from data_mahasiswa where prodi= 'Pendidikan Teknik Elektronika'");
                            echo mysqli_num_rows($pte);
                            ?>,

                            <?php
                            $te = mysqli_query($koneksi, "SELECT * from data_mahasiswa where prodi= 'Teknik Elektronika'");
                            echo mysqli_num_rows($te);
                            ?>,

                        ],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(124,252,0)'

                        ],
                        borderWidth: 1
                    }]
                },
            });
        </script>
        </div>

        <div class="graf-2 ms-3">
            <div style="width:300px; height: 300px" ;>
                <canvas id="chart2"></canvas>
            </div>
        
        <script>
            var ctx2 = document.getElementById('chart2').getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{
                        label: 'Data',
                        data: [
                            <?php
                            $cewe = mysqli_query($koneksi, "SELECT * from data_mahasiswa where jeniskelamin= 'Laki-Laki'");
                            echo mysqli_num_rows($ti);
                            ?>,

                            <?php
                            $cowo = mysqli_query($koneksi, "SELECT * from data_mahasiswa where jeniskelamin= 'Perempuan'");
                            echo mysqli_num_rows($pti);
                            ?>,
                        ],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                        ],
                        borderWidth: 1
                    }]
                },
            });
        </script>
        </div>
    </div>
</body>

</html>