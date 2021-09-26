<?php
require_once("auth.php");
require_once("config.php");
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

                <div class="card">
                    <div class="card-body text-left">
                        <h1>Diary Editor</h1>
                        <h4 style="text-align: left;">Control Center</h>
                            <h6 style="text-align: left; margin-bottom: 10px;">Diary Control</h6>
                            <a class="btn btn-primary btn-lg float-left" style="margin-right: 10px;" href="lihat-diary.php">Lihat Diary</a>
                            <a class="btn btn-primary btn-lg float-left" style="margin-right: 10px;" href="baru.php">Buat Diary</a>
                            <a class="btn btn-primary btn-lg float-left disabled" style="margin-right: 10px;" aria-disabled="true" href="edit-diary.php">Edit Diary</a>
                            <br><br><br>
                            <h6 style="text-align: left; margin-bottom: 10px;">Session Control</h6>
                            <a class="btn btn-primary btn-lg float-left" style="margin-right: 10px;" href="main.php">Halaman Utama</a>
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
    </div><br>

    <?php
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $sql = "SELECT * FROM diary ORDER BY tanggal DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) { ?>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 7px;">
                        <div class="card">
                            <div class="card-body text-left float-right">
                                <?php echo "<i><div style='font-size: 20px;'>" . $row["tanggal"] . "</i><br><span class='h4'>" . $row["judul"] . "</span><br><br>" . nl2br(htmlspecialchars($row["konten"])) . "</p></div><br><a class='btn btn-warning' href='update-diary.php?id=$row[id]' onclick='return confirm('Are you sure?');'>Edit</a>
                <a class='btn btn-danger' href='delete-diary.php?id=$row[id]'>Delete</a>"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
<?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>