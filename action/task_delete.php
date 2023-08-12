<?php
session_start();
include('../config/koneksi.php');


$id_user = $_SESSION['id_user'];
$id_todo = $_GET['id_todo'];

$sql = "delete from todo where id_todo=$id_todo ";
$res = mysqli_query($conn, $sql);
if ($res) {
    echo "<script> alert('Berhasil')  </script>";
    echo "<script> window.location = '../index.php' </script>";
} else {

    echo "<script> alert('Gagal')  </script>";
    echo "<script> window.location = '../index.php' </script>";
}