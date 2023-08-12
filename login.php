<?php
session_start();

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  include('./config/koneksi.php');
  $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
  $data = mysqli_fetch_array($query);
  if (!empty($data['email'])) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['user_email'] = $email;
    $_SESSION['user_password'] = $password;
    $_SESSION['user_nama'] = $data['nama'];
    $_SESSION['user_alamat'] = $data['alamat'];


    echo "<script>alert('Berhasil Login!') </script>";
    echo "<script> window.location = './index.php' </script>";
  } else {
    echo "<script>alert('Email/Password Anda salah !')</script>";
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
    <h2>Login</a></h2>
    <h3>Welcome To Study Planner</h3>
    <form class="login-form" action="#" method="post">
      <input type="text" placeholder="Email" name="email" />
      <input type="password" placeholder="Password" name="password" />
      <button type="submit">LOGIN</a></button>
      <a href="register.php" style="text-align: center;">Don't have account yet? Register Now!</a>
    </form>
  </div>
</body>

</html>