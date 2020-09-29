<!DOCTYPE html>
<?php
    // echo session_status();
    // include 'session.php';
    include 'sessionStarter.php';
    include 'sessionChecker.php';
    if($_SESSION['login_Status']!=('admin'))
    {
	       header("location: login.php");
    }
?>
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
    include 'config.php';
    // include 'session.php';

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
                <input type="button" class="btn-danger btn-lg" value="Logout" onclick="window.location.href='logout.php'" />
            </center>
        </ul>
    </div>
</div>
</div>
<p><center>This is Admin Dashboard, select menubar for more</center></p>



</html>
