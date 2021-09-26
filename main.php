<?php require_once("auth.php");
if (!isset($_SESSION)) {
    session_start();
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
            <div class="col-md-4">

                <div class="card">
                    <div class="card-body text-center">
                        <h5>Login sebagai</h5>
                        <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                        <p><?php echo $_SESSION["user"]["email"] ?></p>


                    </div>
                </div>

            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Control Center</h3><br>
                        <h6 style="text-align: left; margin-bottom: 10px;">Diary Control</h6>
                        <a class="btn btn-primary btn-lg float-left" style="margin-right: 10px;" href="lihat-diary.php">Lihat Diary</a>
                        <a class="btn btn-primary btn-lg float-left" style="margin-right: 10px;" href="baru.php">Buat Diary</a>
                        <a class="btn btn-primary btn-lg float-left" style="margin-right: 10px;" href="edit-diary.php">Edit Diary</a>
                        <br><br><br>
                        <h6 style="text-align: left; margin-bottom: 10px;">Session Control</h6>
                        <a class="btn btn-primary btn-lg float-left disabled" style="margin-right: 10px;" aria-disabled="true" href="main.php">Halaman Utama</a>
                        <a class="btn btn-success btn-lg float-left" style="margin-right: 10px;" href="register.php">Daftarkan User Baru</a>
                        <a class="btn btn-danger btn-lg float-left" style="margin-right: 10px;" href="logout.php">Logout</a>
                    </div>
                </div>



                <?php
                if (isset($_SESSION["success"])) { ?>
                    <div class="alert alert-primary col-md-14 float-center" style="margin-top: 12px;" role="alert">
                        Tindakan berhasil dilakukan!
                    </div>
                <?php
                    unset($_SESSION["success"]);
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>