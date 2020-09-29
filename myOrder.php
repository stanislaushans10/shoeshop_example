<!DOCTYPE html>
<?php
    // echo session_status();
    include 'sessionStarter.php';
    include 'sessionChecker.php';
?>
<html>
    <title>Pesanan Selesai</title>
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
            table {
              width: 50%;
              counter-reset: row-num - 1;
            }
            table tr {
              counter-increment: row-num;
            }
            table tr td:first-child::before {
                content: counter(row-num) ". ";
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

?>
    <div class="dropdown">
        <button class="btn-lg fas fa-user dropdown-toggle" type="button" data-toggle="dropdown">
        <span class="caret"></span></button>
        <ul class="dropdown-menu" style="padding: 10px;">
            <center>
                <?php
                    if(session_status() == PHP_SESSION_ACTIVE){
                        echo('<font size="5", face="roboto">');
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

<center><h1>Pesanan Selesai</h1></center>
<font size="2" face="McLaren" >
<div class="table-responsive" style=" padding: 10px 15px 80px 15px;">
    <center>
        <table class="table table-striped .table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th><center>#</center></th>
                    <th><center>ID Transaksi</center></th>
                    <th><center>User ID</center></th>
                    <th><center>Harga</center></th>
                    <th><center>Status Pembayaran</center></th>
                    <th><center>Status Penerimaan Barang</center></th>
                    <th><center>Ulasan</center></th>
                </tr>
            </thead>
    </center>
    <br>
<?php
    include './query/selectFinishedOrder.php';
    while($row = mysqli_fetch_array($result)) {
        if(!empty($row[0])){
            if($row['status'] == 1){
                $row['status'] = 'Pembayaran telah diterima dan sedang diproses';
            }
            if($row['status'] == 2){
                $row['status'] = 'Pembayaran telah diterima dan disetujui';
            }
            if($row['isReceived'] == 0){
                $row['isReceived'] = 'Barang belum diterima pelanggan';
            }
            if($row['isReceived'] == 1){
                $row['isReceived'] = 'Barang telah diterima pelanggan';
            }
        }
        echo('
            <tr>
                <td><center></center></td>
                <td><center>' . $row['transactionId'] . '</center></td>
                <td><center>' . $row['userId'] . '</center></td>
                <td><center>' . $row['SUM(harga)'] . '</center></td>
                <td><center>' . $row['status'] . '</center></td>
                <td><center>' . $row['isReceived'] . '</center></td>
        ');
        if($row['MIN(isReviewed)'] == 0){
            echo('
                <td>
                    <div class="dropdown">
                        <center>
                            <form action="ulasan.php" method="GET" name="ulasan" id="ulasan">
                                <input type="hidden" name="transactionId" value='. $row['transactionId'] . '>
                                <button type="submit" class="btn-info btn-lg">Tulis Ulasan</button>
                            </form>
                        </center>
                    </div>
                </td>
            ');
        }
        else{
            echo('
                <td>
                    <div class="dropdown">
                        <center>
                                <p style="font-family:McLaren; font-size:14px">Ulasan telah diberikan</p>
                        </center>
                    </div>
                </td>
            ');
        }
        echo('</tr>');
    }
?>
</div>
</font>
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
</html>
