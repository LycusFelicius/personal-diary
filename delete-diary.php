<?php
require_once("auth.php");
require_once("config.php");
$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);
$id   = $_GET['id'];
$confirm = "0";
if (isset($_POST['del-diary'])) {
    $confirm = strtolower($_POST['confirm-diary']);
    if ($confirm == "saya yakin untuk menghapus diary ini") {
        $query = "DELETE from diary where id='$id'";
        mysqli_query($koneksi, $query);
        $_SESSION["success"] = "1";
        header("location:edit-diary.php");
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nala's Diary</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <p>&larr; <a href="edit-diary.php">Edit Diary</a>

                <form action="" method="POST">

                    <div class="form-group">
                        <label for="name">Apakah anda yakin ingin menghapus diary ini? ketikkan kata dibawah ini<br><i>Saya yakin untuk menghapus diary ini</i></label>
                        <input class="form-control" autocomplete="off" type="text" name="confirm-diary" placeholder="Confirmation" /><br>
                        <input type="submit" class="btn btn-danger btn-block" name="del-diary" value="Hapus" />
                    </div>