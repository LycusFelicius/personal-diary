<?php
require_once("auth.php");
require_once("config.php");

$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);
$id         = $_GET['id'];
$queryf  = mysqli_query($koneksi, "select * from diary where id='$id'");
$row        = mysqli_fetch_array($queryf);

?>
<!DOCTYPE html>
<html lang="en">

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

                <p>&larr; <a href="main.php">Halaman Utama</a> &larr; <a href="edit-diary.php">Edit Diary</a>

                <h4>Buat diary baru...</h4>

                <form action="update_1-diary.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                    <div class="form-group">
                        <label for="name">Judul</label>
                        <input class="form-control" autocomplete="off" type="text" name="title-diary" placeholder="Judul Diary" value="<?php echo $row['judul']; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="username">Tanggal</label>
                        <input class="form-control" autocomplete="off" type="text" name="date-diary" placeholder="(yyyy/mm/dd)" value="<?php echo $row['tanggal']; ?>" />
                    </div>
                    <label for="username">Diary</label>
                    <textarea class="form-control" style="height: 400px; margin-bottom: 15px;" name="main-diary" placeholder="Apa yang kamu pikirkan?"><?php echo $row['konten']; ?></textarea>
                    <input type="submit" class="btn btn-success btn-block" name="send-diary" value="Update" />

                </form>

            </div>