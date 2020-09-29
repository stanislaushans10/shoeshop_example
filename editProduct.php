<!DOCTYPE html>
<html>
    <title>View Profile </title>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/all.css" rel="stylesheet">
        <link href="./css/dropdown.css" rel="stylesheet">
        <link href="./css/register.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    </head>
    <body>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
    include 'sessionStarter.php';
    include 'sessionChecker.php';
    if($_SESSION['login_Status']!=('admin'))
    {
	       header("location: index.php");
    }
    include './menubar/menubarAdmin.php';

    $MyId = $_GET["id"];
    // echo $NoAng;
    $sql = "SELECT id, brand_id, name, sku, price, description, is_displayed, start_promo, end_promo, promo_price, gender, material_upper, material_outer_sole, care_label, measurements
            FROM  produk
            WHERE id = '$MyId'";
    $result = mysqli_query($conn,$sql);
    $product = mysqli_fetch_array($result);
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
                <input type="button" class="btn-danger btn-lg" value="Logout" onclick="window.location.href='logout.php'" />
            </center>
        </ul>
    </div>
</div>
    <div class="page-wrapper bg-blue p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Produk <?php echo $MyId?></h2>
                    <br>
                    <form method="post">

                        <div class="input-group">
                            <div class="input--style-2"><p>brand_id</p></div>
                            <input class="input--style-2" type="number" placeholder="Masukkan brand_id" name="brandId" value="<?php echo $product[1]; ?>" style="font-style:italic" required>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>name</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan nama" name="nama" style="font-style:italic"  value="<?php echo $product[2]; ?>" required>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>sku</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan sku" name="sku" style="font-style:italic" class="calendar" value="<?php echo $product[3]; ?>" required>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>price</p></div>
                            <input class="input--style-2" type="number" placeholder="Masukkan harga" name="price" style="font-style:italic" value="<?php echo $product[4]; ?>" required>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>description</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan deskripsi" name="description" style="font-style:italic" value="<?php echo $product[5]; ?>" required>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>is_displayed</p></div>
                            <input class="input--style-2" type="number" placeholder="Masukkan is_displayed" name="is_displayed" style="font-style:italic" value="<?php echo $product[6]; ?>" required>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>start_promo</p></div>
                            <input class="input--style-2" type="date" placeholder="Masukkan start_promo" name="start_promo" style="font-style:italic" value="<?php echo $product[7]; ?>">
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>end_promo</p></div>
                            <input class="input--style-2" type="date" placeholder="Masukkan end_promo" name="end_promo" style="font-style:italic" value="<?php echo $product[8]; ?>">
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>promo_price</p></div>
                            <input class="input--style-2" type="number" placeholder="Masukkan promo_price" name="promo_price" style="font-style:italic" value="<?php echo $product[9]; ?>">
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>gender</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan gender" name="gender" style="font-style:italic" value="<?php echo $product[10]; ?>">
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>material_upper</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan material_upper" name="material_upper" style="font-style:italic" value="<?php echo $product[11]; ?>">
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>material_outer_sole</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan material_outer_sole" name="material_outer_sole" style="font-style:italic" value="<?php echo $product[12]; ?>">
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>care_label</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan care_label" name="care_label" style="font-style:italic" value="<?php echo $product[13]; ?>">
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>measurements</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan measurements" name="measurements" style="font-style:italic" value="<?php echo $product[14]; ?>">
                        </div>

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="script/dateofbirth.js"></script>
    <script src="script/tgl1.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>
<?php
    include 'config.php';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $myBrandId = mysqli_real_escape_string($conn,$_POST['brandId']);
        $myNama = mysqli_real_escape_string($conn,$_POST['nama']);
        $mySku = mysqli_real_escape_string($conn,$_POST['sku']);
        $myPrice = mysqli_real_escape_string($conn,$_POST['price']);
        $myDescription = mysqli_real_escape_string($conn,$_POST['description']);
        $myIsDisplayed = mysqli_real_escape_string($conn,$_POST['is_displayed']);
        $myStartPromo = mysqli_real_escape_string($conn,$_POST['start_promo']);
        $myEndPromo = mysqli_real_escape_string($conn,$_POST['end_promo']);
        $myPromoPrice = mysqli_real_escape_string($conn,$_POST['promo_price']);
        $myGender = mysqli_real_escape_string($conn,$_POST['gender']);
        $myMaterialUpper = mysqli_real_escape_string($conn,$_POST['material_upper']);
        $myMaterialOuterSole = mysqli_real_escape_string($conn,$_POST['material_outer_sole']);
        $myCareLabel = mysqli_real_escape_string($conn,$_POST['care_label']);
        $myMeasurements = mysqli_real_escape_string($conn,$_POST['measurements']);

        $sql = "UPDATE produk
                SET brand_id = '$myBrandId', name = '$myNama', sku = '$mySku', price = '$myPrice', description = '$myDescription',
                    is_displayed = '$myIsDisplayed', start_promo = '$myStartPromo', end_promo = '$myEndPromo', promo_price = '$myPromoPrice',
                    gender = '$myGender', material_upper = '$myMaterialUpper', material_outer_sole = '$myMaterialOuterSole', care_label = '$myCareLabel',
                    measurements = '$myMeasurements'
                WHERE id = '$MyId'";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            // echo "New record created successfully !";
            echo'<meta http-equiv="refresh" content="0;url=adminProduct.php">';
            mysqli_close($conn);
	    }
        else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
            mysqli_close($conn);
	    }
    }
?>


</html>
