<!DOCTYPE html>
<html>
    <title>Toko Sepatu | Admin</title>
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
    include 'sessionStarter.php';
    include 'sessionChecker.php';
    if($_SESSION['login_Status']!=('admin'))
    {
	       header("location: login.php");
    }
    include './menubar/menubarAdmin.php';
?>
    <div class="dropdown">
        <button class="btn-lg fas fa-user dropdown-toggle" type="button" data-toggle="dropdown">
        <span class="caret"></span></button>
        <ul class="dropdown-menu" style="padding: 10px;">
            <center>
                <font size="5", face="roboto">
                    <?php echo $nama ?>
                </font>
                <br>
                <br>
                <input type="button" class="btn-info btn-lg" value="Profile" onclick="window.location.href='profile.php'" />
                <br>
                <br>
                <input type="button" class="btn-danger btn-lg" value="Logout" onclick="window.location.href='adminLogin.php'" />
            </center>
        </ul>
    </div>
</div>
</div>

<center><h1>Product Catalog</h1></center>
<form action="product.php" method="GET">
    <div class="flex-container" style="background-color:#f2f2f2; justify-content: center;">
        <div class="input--style-2" style="padding:2px; border: 2px solid #000000;">
            <input class="input--style-2" type="number" placeholder="   Filter Ukuran" name="ukuran" style="font-style:italic">
        </div>
        <div>&nbsp</div>
        <div class="input--style-2" style="padding:2px; border: 2px solid #000000;">
            <input class="input--style-2" type="text" placeholder="   Filter Merek" name="merek" style="font-style:italic">
        </div>
        <!-- <div>&nbsp</div>
        <div class="input--style-2" style="padding:2px; border: 2px solid #000000;">
            <input class="input--style-2" type="text" placeholder="   Filter Warna" name="warna" style="font-style:italic">
        </div> -->
        <!-- <div>&nbsp</div>
        <div class="input--style-2" style="padding:2px; border: 2px solid #000000;">
            <input class="input--style-2" type="number" placeholder="   Filter Harga Minimal" name="hargaMin" style="font-style:italic">
        </div> -->
        <!-- <div>&nbsp</div>
        <div class="input--style-2" style="padding:2px; border: 2px solid #000000;">
            <input class="input--style-2" type="number" placeholder="   Filter Harga Maksimal" name="hargaMax" style="font-style:italic">
        </div>
        <div>&nbsp</div> -->
        <center><button type="submit" class="fa fa-search fa-2x" style="background-color:#5cddd1; border: 2px solid #000000; padding: 8px 15px;"></button><center>
    </div>
</form>

<font size="2" face="McLaren" >
<div class="table-responsive" style=" padding: 10px 15px 80px 15px;">
    <center>
        <table class="table table-striped .table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th><center></center></th>
                    <th><center></center></th>
                    <th><center>Produk</center></th>
                    <!-- <th><center>Warna</center></th> -->
                    <th><center>Gender</center></th>
                    <th><center>Materi Atas</center></th>
                    <th><center>Materi Luar Sol</center></th>
                    <th><center>Label Perawatan</center></th>
                    <th><center>Ukuran</center></th>
                    <th><center>Total Stok</center></th>
                    <th><center>Harga Akhir</center></th>
                </tr>
            </thead>
    </center>
    <br>
<?php
    if(isset($_GET['ukuran'], $_GET['merek']))
    {
        $searchUkuran = $_GET['ukuran'];
        $searchMerek = $_GET['merek'];
        // $searchHargaMin = $_GET['hargaMin'];
        // $searchHargaMax = $_GET['hargaMax'];
        $sql = "SELECT *
                FROM produk
                WHERE   measurements like '%$searchUkuran%' AND
                        brand_name like '%$searchMerek%' AND
                        -- promo_price > $searchHargaMin AND
                        total_stock > 0
                ";
        $result = mysqli_query($conn,$sql);
    }
    else{
        $sql = "SELECT *  FROM produk WHERE total_stock > 0";
        $result = mysqli_query($conn,$sql);
    }
    while($row = mysqli_fetch_array($result)) {
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
                    <td><center>' . $row['measurements'] . '</center></td>
                    <td><center>' . $row['total_stock'] . '</center></td>
                    <td><center>' . $row['final_price'] . '</center></td>
                    <td>
                        <form action="editProduct.php" method="GET" name="id" id="editForm">
                            <center>
                                <input type="hidden" name="id" value=' . $row['id'] . '>
                                <button class="fa fa-pen" type="submit"></button>
                            </center>
                        </form>
                    </td>
                    <td>
                    <div class="dropdown">
                        <center>
                            <button class="btn-lg fas fa-trash dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                                <ul class="dropdown-menu" style="padding: 10px; min-width: 100px;">
                                    <form method="POST" name="NoAng" id="deleteForm">
                                        <center><p>Delete this product ?</p></center>
                                        <input type="hidden" name="id" value='. $row['id'] . '>
                                        <button type="submit" class="btn-danger btn-lg">Delete</button>
                                    </form>
                                </ul>
                        </center>
                    </div>
                    </td>
                </tr>';
                // include './modal/deleteConfirmation.php';

    }
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

</html>
