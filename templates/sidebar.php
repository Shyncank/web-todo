<div class="sidebar">
    <div class="header">
        <div class="icon">
            <i class="fas fa-user fa-3x    "></i>
        </div>
        <div class="account">
            <h5><?php echo $_SESSION['user_nama'] ?></h5>
            <p> <?php echo $_SESSION['user_email'] ?></p>
        </div>

    </div>
    <div class="main my-5">
        <a href="index.php" class="list-item">
            <div class="list-item">
                <i class="fas fa-sun    "></i>
                <span class="description">My Day</span>
            </div>
        </a>
        <a href="important.php" class="list-item">
            <div class="list-item" href="#">
                <i class="fas fa-star    "></i>
                <span class="description">Important</span>
            </div>
        </a>
        <a href="planned.php" class="list-item">
            <div class="list-item" href="#">
                <i class="fas fa-file-prescription    "></i>
                <span class="description">Planned</span>
            </div>
        </a>
        <a href="tasks.php" class="list-item">
            <div class="list-item" href="#">
                <i class="fas fa-home    "></i>
                <span class="description">Tasks</span>
            </div>
        </a>
    </div>
    <div class="footer">
        <div class="illustration">
            <img src="./assets/images/Illustration.png" alt="" />
        </div>
    </div>
</div>