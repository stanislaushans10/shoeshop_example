<!DOCTYPE html>
<?php
    // echo session_status();
    include 'sessionStarter.php';
    include 'sessionChecker.php';
?>
<html>
    <title>Toko Sepatu</title>
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
        <link href="./css/home.css" rel="stylesheet">
        <link href="./css/register.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
        <style type="text/css">

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
<br>
<center>
    <div class="flex-home">
    <div class="container">
        <img src="./images/23_payday_deals.jpg" width="950" height="500" class="image">
            <a href="produkTerlaris.php">
                <div class="overlay">
                    <div class="text">Produk Hero</div>
                </div>
            </a>
    </div>
    <div class="container">
        <img src="./images/1600435252865.jpeg" width="950" height="500" class="image">
            <a href="produkTerbaru.php">
                <div class="overlay">
                    <div class="text">Produk Terbaru</div>
                </div>
            </a>
    </div>
    </div>

    <br>
    <div><a href="product.php" class="btn" style="background-color:#5cddd1; border: 2px solid #000000; padding: 10px 200px;">SHOP NOW</a>
</center>

<!-- <form action="user.php" method="GET">
    <div class="flex-container" style="background-color:#f2f2f2; justify-content: center;">
        <div class="input--style-2" style="padding:2px; border: 2px solid #000000;">
            <input class="input--style-2" type="text" placeholder="   Cari Nama Anggota" name="nama" style="font-style:italic">
        </div>
        <div>&nbsp</div>
        <div class="input--style-2" style="padding:2px; border: 2px solid #000000;">
            <input class="input--style-2" type="number" placeholder="   Cari Nomor Anggota" name="NoAng" style="font-style:italic">
        </div>
        <div>&nbsp</div>
        <center><button type="submit" class="fa fa-search fa-2x" style="background-color:#5cddd1; border: 2px solid #000000; padding: 8px 15px;"></button><center>
    </div>
</form> -->
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
