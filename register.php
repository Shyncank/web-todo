<?php
session_start();

if (isset($_POST['email'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    include('./config/koneksi.php');
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $data = mysqli_fetch_array($query);

    if (!empty($data['email'])) {
        echo "<script>alert('Email Sudah Dipakai!') </script>";
        echo "<script> window.location = './login.php' </script>";
    } else {
        $queryInsert = "insert into user(nama, alamat, email, password) values('$nama', '$alamat', '$email', '$password')";
        $resInsert = mysqli_query($conn, $queryInsert);
        if ($resInsert) {
            echo "<script>alert('Berhasil Register : Silahkan Login!') </script>";
            echo "<script> window.location = './login.php' </script>";
        } else {
            echo "<script>alert('Gagal Register!') </script>";
            echo "<script> window.location = './register.php' </script>";
        }
    }
}

?>
<html>

<head>
    <?php include('templates/head.php') ?>
    <link rel="stylesheet" href="./assets/css/login.css" />
</head>

<body>
    <div class="login-card">
        <h2>Register</a></h2>
        <h3>Welcome To Study Planner, Create an Account</h3>
        <form class="login-form" action="#" method="post">
            <input type="text" placeholder="Name" name="nama" />
            <input type="text" placeholder="Address" name="alamat" />
            <input type="text" placeholder="Email" name="email" />
            <input type="password" placeholder="Password" name="password" />
            <a href="login.php"> Already have account? </a>
            <button type="submit">Register</a></button>
        </form>
    </div>
</body>

</html>