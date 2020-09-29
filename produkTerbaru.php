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
                            <br>
                            <br>
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

<center><h1>Produk Terbaru</h1></center>
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

<font size="2" face="McLaren" >
<div class="table-responsive" style=" padding: 10px 15px 80px 15px;">
    <center>
        <table class="table table-striped .table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th><center></center></th>
                    <th><center></center></th>
                    <th><center>Produk</center></th>
                    <th><center>Gender</center></th>
                    <th><center>Materi Atas</center></th>
                    <th><center>Materi Luar Sol</center></th>
                    <th><center>Label Perawatan</center></th>
                    <th><center>Total Stok</center></th>
                    <th><center>Harga Akhir</center></th>
                </tr>
            </thead>
    </center>
    <br>
<?php
    include './query/selectProduct.php';
    while($row = mysqli_fetch_array($result)) {
        echo    ('<tr>
                    <td><center></center></td>
                    <td><center><img src="' . $row['image_url'] . '" width="200" height="200"><br></center></td>
                    <td><center>' . $row['brand_name'] . ' <br>
                                ' . $row['name'] . '<br>
                                ' . $row['sku'] . '<br>
                                <s>Rp ' . $row['price'] . '</s><br>
                                Rp ' . $row['promo_price'] . '<br>
        ');
            if(!empty($_SESSION['login_ID'])){
                echo('
                    <form action="product.php" method="POST" name="product" id="editForm">
                        <center>
                            <input type="hidden" name="sku" value=' . $row['sku'] . '>
                            <input type="hidden" name="promo_price" value=' . $row['promo_price'] . '>
                            <button class="btn-success btn-lg" type="submit">Beli</button>
                        </center>
                    </form>
                ');
            }

        echo('
                    </center></td>
                    <td><center>' . $row['gender'] . '</center></td>
                    <td><center>' . $row['material_upper'] . '</center></td>
                    <td><center>' . $row['material_outer_sole'] . '</center></td>
                    <td><center>' . $row['care_label'] . '</center></td>
                    <td><center>' . $row['measurements'] . '</center></td>
                    <td><center>' . $row['total_stock'] . '</center></td>
                    <td><center>' . $row['final_price'] . '</center></td>
                </tr>
        ');
    }
    echo $row['name'] ;
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myNoAng = mysqli_real_escape_string($conn,$_POST['NoAng']);
        echo $myNoAng;
        $sql = "DELETE FROM user WHERE NoAng = '$myNoAng'";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            echo'<meta http-equiv="refresh" content="0;url=user.php">';
            mysqli_close($conn);
	    }
        else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            mysqli_close($conn);
	    }
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

</html>
