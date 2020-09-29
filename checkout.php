<!DOCTYPE html>
<?php
    // echo session_status();
    include 'sessionStarter.php';
    include 'sessionChecker.php';
    $date = date("Y-m-d");
    $time = date("h-i-sa");
    $myTrfImage = $ID . $nama . $date . $time ;
?>
<html>
    <title>Checkout </title>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=McLaren' rel='stylesheet'>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/all.css" rel="stylesheet">
        <link href="./css/dropdown.css" rel="stylesheet">
        <link href="./css/register.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
        <style type="text/css">

        #inp {
          text-align: center;
          margin: auto;
          margin: 20px;
        }
</style>
    </head>
    <body>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <script>
            $(document).ready(function(){
              $('.dropdown-submenu a.test').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
              });
            });
        </script>

    </body>

<?php
    include 'config.php';
    include './menubar/menubar.php';
    $sql = "SELECT SUM(harga), MIN(id)
            FROM cart
            WHERE userId = $ID AND status ='0'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
?>
    <div class="dropdown">
        <button class="btn-lg fas fa-user dropdown-toggle" type="button" data-toggle="dropdown">
        <span class="caret"></span></button>
        <ul class="dropdown-menu" style="padding: 10px;">
            <center>
                    <?php
                        if(session_status() == PHP_SESSION_ACTIVE){
                            echo('<font size="5", face="roboto">');
                            echo $ID;
                            echo $nama;
                            echo('</font>');
                            echo('
                                <br><br>
                                <button id="btnCart" class="fas fa-shopping-cart fa-3x"></button>
                                <br><br>
                                <button id="btnLogout" class="btn-warning btn-lg">Logout</button>
                            ');
                        }
                        else{
                            echo('<font size="2", face="roboto">');
                            echo "Anda belum login, silahkan login atau daftar";
                            echo('</font>');
                            echo('
                                <br>
                                <br>
                                <button id="btnLogin" class="btn-info btn-lg">Login</button>
                                <br>
                                <br>
                                <button id="btnRegister" class="btn-success btn-lg">Daftar</button>
                            ');
                        }
                    ?>
            </center>
        </ul>
    </div>
</div>
</div>

<font size="3" face="McLaren" >
    <center>
        <h1>Informasi Pembayaran</h1><br>
        <p>Silahkan melakukan pembayaran via transfer ke nomor rekening 123456789 atas nama HANS</p>
        <p>Setelah pembayaran selesai silahkan upload bukti pembayaran pada halaman ini</p>
        <p>Format nama file : trf_<?php echo $ID;
                                        echo $nama;
                                        echo $row[1];
                                    ?>.png</p>
    </center>

    <?php

        echo('
            <center>
                <br>
                <p>Total Pembayaran : </p>
        ');
        echo 'Rp ';
        echo $row[0];
        echo('
            <br><br>
            <button id="btnRincian" class="btn-info btn-lg">Rincian</button>
                <form method="POST" enctype="multipart/form-data">
                  <input id="inp" type="file" id="mytrf" name="trf" required>
                  <button type="submit" class="btn-success btn-lg">confirm</button>
                </form>
            </center>
        ');
    ?>
</font>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $myTrfImage = $ID . $nama . $row[1];
        echo $myTrfImage;
        $sql = "UPDATE cart SET trfImage = '$myTrfImage' WHERE userId = $ID AND transactionId IS NULL";
        $result = mysqli_query($conn,$sql);
        $target_Path = "images/trf/";
        $target_Path = $target_Path.basename( $_FILES['trf']['name'] );
        move_uploaded_file( $_FILES['trf']['tmp_name'], $target_Path );
        echo'<meta http-equiv="refresh" content="0;url=checkoutConfirmation.php">';
    }
?>

<script>
    var btn = document.getElementById('btnLogin');
    var btn2 = document.getElementById('btnRegister');
    btn.addEventListener('click', function() {
        document.location.href = 'login.php';
    });
    btn2.addEventListener('click', function() {
        document.location.href = 'register.php';
    });
</script>
<script>
    var btn = document.getElementById('btnLogout');
    btn.addEventListener('click', function() {
        document.location.href = 'logout.php';
    });
</script>
<script>
    var btn = document.getElementById('btnCart');
    btn.addEventListener('click', function() {
        document.location.href = 'cart.php';
    });
</script>
<script>
    var btn = document.getElementById('btnRincian');
    btn.addEventListener('click', function() {
        document.location.href = 'cart.php';
    });
</script>

</html>
