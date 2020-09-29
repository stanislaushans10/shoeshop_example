<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registrasi Anggota</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/register.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-body">
                    <h2 class="title">Registrasi Anggota</h2>
                    <form method="post">
                        <div class="input-group">
                            <div class="input--style-2"><p>Nama</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan Nama" name="nama" style="font-style:italic" required >
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>Password</p></div>
                            <input class="input--style-2" type="password" placeholder="Masukkan Password" name="password" style="font-style:italic" required>
                        </div>

                        <input type="hidden" name="status">

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="script/dateofbirth.js"></script>
    <script src="script/tgl1.js"></script>
    <!-- <script src="script/coba.js"></script> -->
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<?php
    include 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myNama = mysqli_real_escape_string($conn,$_POST['nama']);	//input username
        $myPassword = mysqli_real_escape_string($conn,$_POST['password']); //input password

        $sql = "INSERT INTO user (nama, password, status)
                VALUES ('$myNama', '$myPassword', 'user')";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            // echo "New record created successfully !";
            echo'<meta http-equiv="refresh" content="0;url=registerConfirmation.php">';
            mysqli_close($conn);
	    }
        else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            mysqli_close($conn);
	    }
    }
?>

</html>
<!-- end document-->
