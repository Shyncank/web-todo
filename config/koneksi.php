<?php

$hostname   = "localhost";
$username   = "root";
$pw         = "";
$dbname     = "studentplanner";

$conn = mysqli_connect($hostname, $username, $pw, $dbname);
if (!$conn) {
    return "koneksi error";
}