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
    include 'session.php';
    if($_SESSION['login_Status']!=('admin' OR 'user'))
    {
	       header("location: index.php");
    }
    include './query/menubarQuery.php';
    include './menubar/menubar.php';
    // $NoAng = $_POST["user"];
    // echo $NoAng;
    $sql = "SELECT nama, NoKTP, TglLahir, Tgl1, NoBag, NIK, note  FROM  user WHERE NoAng = '$NoAng'";
    $result = mysqli_query($conn,$sql);
    $profile = mysqli_fetch_array($result);
    // echo $profile[0];echo('<br>');
    // echo $profile[1];echo('<br>');
    // echo $profile[2];echo('<br>');
    // echo $profile[3];echo('<br>');
    // echo $profile[4];echo('<br>');
    // echo $profile[5];echo('<br>');
    // echo $profile[6];echo('<br>');
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
                    <h2 class="title">Profile</h2>
                    <h6 style="color:green; font-style: italic;"> This is view only form, to modify these values, press edit profile at the bottom of this page. </h6>
                    <br>
                    <form method="post">

                        <div class="input-group">
                            <div class="input--style-2"><p>Nomor Anggota</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan No Anggota" name="NoAng" value="<?php echo $NoAng; ?>"style="font-style:italic" disabled >
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>Nama</p></div>
                            <input class="input--style-2" type="text" placeholder="Masukkan Nama" name="nama" value="<?php echo $profile[0]; ?>"style="font-style:italic" disabled >
                        </div>

                        <input type="hidden" name="status">

                        <div class="input-group">
                            <div class="input--style-2"><p>Nomor KTP</p></div>
                            <input class="input--style-2" type="number" placeholder="Masukkan Nomor KTP" name="NoKTP" value="<?php echo $profile[1]; ?>" style="font-style:italic" disabled>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>Tanggal Lahir</p></div>
                            <input class="input--style-2" id="dateofbirth" type="date" name="TglLahir" style="font-style:italic" class="calendar" value="<?php echo $profile[2]; ?>" disabled>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>Tanggal 1</p></div>
                            <input class="input--style-2" id="date1" type="date" name="Tgl1" style="font-style:italic" class="calendar" value="<?php echo $profile[3]; ?>" disabled>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>Nomor Bagian</p></div>
                            <input class="input--style-2" type="number" placeholder="Masukkan Nomor Bagian" name="NoBag" style="font-style:italic" value="<?php echo $profile[4]; ?>" disabled>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>NIK</p></div>
                            <input class="input--style-2" type="number" placeholder="Masukkan NIK" name="NIK" style="font-style:italic" value="<?php echo $profile[5]; ?>" disabled>
                        </div>

                        <div class="input-group">
                            <div class="input--style-2"><p>Notes</p></div>
                            <input class="input--style-2" type="text" placeholder="[No Notes]" name="note" style="font-style:italic" value="<?php echo $profile[6]; ?>" disabled>
                        </div>

                        <input type="hidden" name="ModifyOn">
                        <input type="hidden" name="ModifyBy">

                        <!-- <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div> -->
                    </form>
                        <div class="p-t-30">
                            <!-- <form action="editProfile.php" method="post" name="NoAng">
                                    <input type="hidden" name="user" value="<?php echo $NoAng; ?>">
                                    <button class="btn-warning btn-lg" type="submit" style="padding-left:200px; padding-right:200px">Edit Profile</button>
                            </form> -->
                            <input type="button" class="btn-warning btn-lg" value="Edit Profile" onclick="window.location.href='editProfile.php'" />
                        </div>
                </div>
            </div>
        </div>
    </div>


</html>
