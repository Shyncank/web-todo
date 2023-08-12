<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include('./config/koneksi.php');
if (empty($_SESSION['user_nama'])) {
  header('Location:login.php');
}
$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">
<title>Student Planner</title>

<head>
    <?php include('templates/head.php') ?>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-overlay" onclick="toggleMenuOpen()"></div>

    <button type="button" class="navbar-burger" onclick="toggleMenuOpen()">
        <span class="material-icons">menu</span>
    </button>
    <h1 class="navbar-title">Student Planner</h1>
    <div class="navbar-menu">
        <button type="button">Skils</button>
        <button type="button">Awards</button>
        <button type="button">Projects</button>
    </div>
</nav>
<!-- Navbar End -->

<!-- Sidebar -->
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="header">
                <div class="list-item">
                    <a href="#">
                        <img src="./assets/images/Youtube.svg" alt="" class="icon" />
                        <span class="description-header">Student Planner</span>
                    </a>
                </div>

                <div class="illustration">
                    <img src="./assets/images/Illustration.png" alt="" />
                </div>
            </div>
            <div class="main">
                <div class="list-item">
                    <a href="#">
                        <img src="./assets/images/Analystics.svg" alt="" class="icon" />
                        <span class="description">Planned</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="#">
                        <img src="./assets/images/Category.svg" alt="" class="icon" />
                        <span class="description">Task</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="#">
                        <img src="./assets/images/Team.svg" alt="" class="icon" />
                        <span class="description">Assigned to me</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="#">
                        <img src="./assets/images/Event.svg" alt="" class="icon" />
                        <span class="description">My Day</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="#">
                        <img src="./assets/images/Setting.svg" alt="" class="icon" />
                        <span class="description">Setting</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


        <!-- <div class="main-content">
        <div id="menu-button">
          <input type="checkbox" id="menu-checkbox" />
          <label for="menu-checkbox" id="menu-label">
            <div id="hamburger"></div>
          </label>
        </div>
      </div> -->
    </div>
    <!-- sidebar end -->

    <script src="/js/script.js"></script>
    <!-- js sidebar -->
    <!-- <script type="text/javascript">
    const toggleMenuOpen = ()
    document.body.classList.toggle("open");
  </script> -->
</body>

</html>