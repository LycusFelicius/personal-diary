<?php
require_once("auth.php");
require_once("config.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['send-diary'])) {
    $_SESSION["success"] = "1";

    $koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }
    $judul = mysqli_real_escape_string($koneksi, $_POST['title-diary']);
    $tanggal = $_POST['date-diary'];
    $konten = mysqli_real_escape_string($koneksi, $_POST['main-diary']);
    $sql = "INSERT INTO diary (judul, tanggal, konten) 
            VALUES ('$judul', '$tanggal', '$konten')";
    if ($koneksi->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
    header("location:main.php");
}

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

                <p>&larr; <a href="main.php">Halaman Utama</a>

                <h4>Buat diary baru...</h4>

                <form action="" method="POST">

                    <div class="form-group">
                        <label for="name">Judul</label>
                        <input class="form-control" autocomplete="off" type="text" name="title-diary" placeholder="Judul Diary" />
                    </div>

                    <div class="form-group">
                        <label for="username">Tanggal</label>
                        <input class="form-control" autocomplete="off" type="text" name="date-diary" placeholder="(yyyy/mm/dd)" />
                    </div>
                    <label for="username">Diary</label>
                    <textarea class="form-control" style="height: 400px; margin-bottom: 15px;" name="main-diary" placeholder="Apa yang kamu pikirkan?"></textarea>
                    <input type="submit" class="btn btn-success btn-block" name="send-diary" value="Kirim" />

                </form>

            </div>