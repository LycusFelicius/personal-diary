<?php
    require_once("config.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $_SESSION["success"] = "1";
    $koneksi = new mysqli($db_host,$db_user,$db_pass,$db_name);
    $id   = $_POST['id'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['title-diary']);
    $tanggal = $_POST['date-diary'];
    $diary = mysqli_real_escape_string($koneksi, $_POST['main-diary']);
    $query="UPDATE diary SET judul='$judul',tanggal='$tanggal',konten='$diary' WHERE id='$id'";
    mysqli_query($koneksi, $query);
    header("location:edit-diary.php");
