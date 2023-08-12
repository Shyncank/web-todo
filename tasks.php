<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include('./config/koneksi.php');
if (empty($_SESSION['user_nama'])) {
    header('Location:login.php');
}
$id_user = $_SESSION['id_user'];

if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $today = date('Y-m-d');

    $sql = "insert into todo(id_user, task, tanggal_task) values($id_user, '$task', '$today' ) ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script> alert('Berhasil')  </script>";
        echo "<script> window.location = './tasks.php' </script>";
    } else {

        echo "<script> alert('Gagal')  </script>";
        echo "<script> window.location = './tasks.php' </script>";
    }
}

if (isset($_POST['id_todo_edit'])) {
    $id_todo = $_POST['id_todo_edit'];
    $task = $_POST['task_edit'];

    $sql = "update todo set task='$task' where id_todo = $id_todo ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script> alert('Berhasil Ubah')  </script>";
        echo "<script> window.location = './index.php' </script>";
    } else {

        echo "<script> alert('Gagal Ubah')  </script>";
        echo "<script> window.location = './index.php' </script>";
    }
}

if (isset($_POST['id_todo_important'])) {
    $id_todo = $_POST['id_todo_important'];

    $sql = "update todo set label='important' where id_todo = $id_todo ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script> alert('Berhasil Ubah')  </script>";
        echo "<script> window.location = './index.php' </script>";
    } else {

        echo "<script> alert('Gagal Ubah')  </script>";
        echo "<script> window.location = './index.php' </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<title>Student Planner</title>

<head>
    <?php include('templates/head.php') ?>
    <link rel="stylesheet" href="./assets/css/new.css" />
</head>

<body>
    <div class="wrapper">

        <?php include('templates/sidebar.php') ?>
        <div class="right">
            <?php include('templates/topbar.php') ?>
            <div class="content">
                <div class="content-wrapper">
                    <!-- keterangan waktu -->
                    <div class="date">
                        <h1>All Tasks</h1>
                    </div>
                    <!-- keterangan waktu -->

                    <div class="tasks">
                        <?php
                        $sqlTodo = "select * from todo where id_user=$id_user";
                        $res = mysqli_query($conn, $sqlTodo);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>

                        <!-- keterangan label -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['task'] ?></h5>
                                    <p class="card-text">Tasks - <span class="badge badge-primary"><?= ucfirst($row['label']) ?></span></p>
                                </div>
                            </div>
                            <form action="#" method="post" class="importantForm<?= $row['id_todo'] ?>">
                                <input type="hidden" name="id_todo_important" value="<?= $row['id_todo'] ?>">
                            </form>
                            <!-- keterangan label -->

                            <!-- tombol edit dan hapus -->
                            <div class="modal" tabindex="-1" role="dialog" id="editModal<?= $row['id_todo'] ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Task</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_todo_edit" value="<?= $row['id_todo'] ?>">
                                                <div class="form-group">
                                                    <label for="">Task</label>
                                                    <input type="text" class="form-control" name="task_edit" value="<?= $row['task'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- tombol edit dan hapus -->
                        <?php } ?>
                    </div>

                    <!-- form penginputan task -->
                    <form action="#" method="post" id="taskForm">
                        <div class="input-task">
                            <input id="todoInput" type="text" class="form-control" placeholder="Enter new task....." name="task">
                            <button class="btn btn-success btn-send" style="width: 10%"><i class="fas fa-paper-plane    "></i></button>
                        </div>
                    </form>
                    <!-- form penginputan task -->
                </div>
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btn-send').on('click', function() {
                let todo = $("#todoInput").val()
                if (!todo) {
                    alert('Invalid!')
                    return;
                }
                $("#taskForm").submit()
            })
            $("#todoInput").focus()

            document.onkeydown = function(evt) {
                var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
                if (keyCode == 13) {

                    let todo = $("#todoInput").val()
                    if (!todo) {
                        alert('Invalid!')
                        return;
                    }
                    $("#taskForm").submit()

                }
            }

            $("#taskForm").on('submit', function(e) {})

            $(".btn-important").on('click', function() {
                let id = $(this).attr('data-id')

                $(".importantForm" + id).submit()
            })

        })
    </script>
</body>

</html>