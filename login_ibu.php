<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>LOGIN</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/floating-labels.css" rel="stylesheet">
</head>

<body>

    <form class="form-signin" action="cek_login_ibu.php" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">HALAMAN LOGIN PEMANTAUAN TUMBUH KEMBANG BALITA</h1>
            <p>SISTEM INFORMASI PENCATATAN DATA BALITA POSYANDU ANGGREK 1 DESA TAMBAK</p>
        </div>
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<script>alert('Username dan Password tidak sesuai')</script>";
            }
        }
        ?>
        <div class="form-label-group">
            <input type="text" maxlength="16" class="form-control" name="NIK_ibu" placeholder="Masukkan NIK Ibu" required autofocus>
            <label>Masukkan NIK Ibu </label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password " required>
            <label>Masukkan Password </label>
        </div>



        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Created By Alvian Ganeswara</p>
    </form>
</body>

</html>