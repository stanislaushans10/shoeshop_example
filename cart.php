<!DOCTYPE html>
<?php
    // echo session_status();
    include 'sessionStarter.php';
    include 'sessionChecker.php';
?>
<html>
    <title>Cart </title>
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

<center><h1>My Cart</h1></center>
<font size="2" face="McLaren" >
    <div class="table-responsive" style=" padding: 10px 15px 80px 15px;">
        <center>
            <table class="table table-striped .table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th><center>#</center></th>
                        <th><center>Produk</center></th>
                        <!-- <th><center>Warna</center></th> -->
                        <th><center>Gender</center></th>
                        <th><center>Materi Atas</center></th>
                        <th><center>Materi Luar Sol</center></th>
                        <th><center>Label Perawatan</center></th>

                    </tr>
                </thead>
        </center>
        <br>
    <?php
        $sql = "SELECT cart.id, produk.image_url, produk.brand_name, produk.name, produk.sku, produk.price, produk.promo_price, produk.gender, produk.material_upper,
                produk.material_outer_sole, produk.care_label
                FROM produk INNER JOIN cart ON produk.sku = cart.sku WHERE userId = $ID AND status = 0";
        $result = mysqli_query($conn,$sql);
        $checker = 0;
        // $row = mysqli_fetch_array($result);
        // echo $row[0];
        while($row = mysqli_fetch_array($result)) {
            $checker = 1;
            echo    '<tr>
                        <td><center></center></td>
                        <td><center><img src="' . $row['image_url'] . '" width="200" height="200"><br></center></td>
                        <td><center>' . $row['brand_name'] . ' <br>
                                    ' . $row['name'] . '<br>
                                    ' . $row['sku'] . '<br>
                                    <s>Rp ' . $row['price'] . '</s><br>
                                    Rp ' . $row['promo_price'] . '<br>
                        </center></td>
                        <td><center>' . $row['gender'] . '</center></td>
                        <td><center>' . $row['material_upper'] . '</center></td>
                        <td><center>' . $row['material_outer_sole'] . '</center></td>
                        <td><center>' . $row['care_label'] . '</center></td>
                        <td>
                            <div class="dropdown">
                                <center>
                                    <button class="btn-lg fas fa-trash dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span></button>
                                        <ul class="dropdown-menu" style="padding: 10px; min-width: 100px;">
                                            <form method="POST" name="NoAng" id="deleteForm">
                                                <center><p>Hapus produk ini ?</p></center>
                                                <input type="hidden" name="id" value='. $row['id'] . '>
                                                <button type="submit" class="btn-danger btn-lg">Delete</button>
                                            </form>
                                        </ul>
                                </center>
                            </div>
                        </td>
                    </tr>';

        }
        if($checker == 1){
            echo('<div><a href="checkout.php" class="btn" style="background-color:#665cdd; border: 2px solid #000000; padding: 10px 200px; margin: 50px;"><font size="4px" face="McLaren">Confirm and Checkout</font></a>');
        };

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $myId = mysqli_real_escape_string($conn,$_POST['id']);
            echo $myId;
            $sql = "DELETE FROM cart WHERE id = $myId";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                echo'<meta http-equiv="refresh" content="0;url=cart.php">';
                mysqli_close($conn);
    	    }
            else {
                echo "Error: " . $sql . " " . mysqli_error($conn);
                mysqli_close($conn);
    	    }
        }
    ?>
</font>
<?php

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

</html>
