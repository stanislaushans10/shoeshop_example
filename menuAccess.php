<!DOCTYPE html>
<html>
    <title>Edit Menu Access </title>
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
    include 'session.php';
    if($_SESSION['login_Status']!=('admin'))
    {
	       header("location: index.php");
    }
    include './query/menubarQuery.php';
    include './menubar/menubar.php';

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
</div>
<font size="2" face="McLaren" >
<div class="table-responsive" style=" padding: 10px 15px 80px 15px;">
    <center>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th><center>#</center></th>
                    <th><center>Nomor Anggota</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Menu 1</center></th>
                    <th><center>Menu 1.1</center></th>
                    <th><center>Menu 1.1.1</center></th>
                    <th><center>Menu 1.1.2</center></th>
                    <th><center>Menu 1.2</center></th>
                    <th><center>Menu 1.2.1</center></th>
                    <th><center>Menu 1.2.2</center></th>
                    <th><center>Menu 2</center></th>
                    <th><center>Menu 2.1</center></th>
                    <th><center>Menu 2.2</center></th>
                    <th><center>Menu 3</center></th>
                    <th><center>Menu 3.1</center></th>
                    <th><center>Menu 3.2</center></th>
                    <th><center>Edit</center></th>
                </tr>
            </thead>
    </center>
    <br>
<?php
    include './query/selectMenuAccess.php';
    while($row = mysqli_fetch_array($result)) {
        echo    '<tr>
                    <td><center></center></td>
                    <td><center>' . $row['NoAng'] . '</center></td>
                    <td><center>' . $row['nama'] . '</center></td>
                    <td><center>' . $row['menu1'] . '</center></td>
                    <td><center>' . $row['menu11'] . '</center></td>
                    <td><center>' . $row['menu111'] . '</center></td>
                    <td><center>' . $row['menu112'] . '</center></td>
                    <td><center>' . $row['menu12'] . '</center></td>
                    <td><center>' . $row['menu121'] . '</center></td>
                    <td><center>' . $row['menu122'] . '</center></td>
                    <td><center>' . $row['menu2'] . '</center></td>
                    <td><center>' . $row['menu21'] . '</center></td>
                    <td><center>' . $row['menu22'] . '</center></td>
                    <td><center>' . $row['menu3'] . '</center></td>
                    <td><center>' . $row['menu31'] . '</center></td>
                    <td><center>' . $row['menu32'] . '</center></td>
                    <td>
                        <form action="editMenuAccess.php" method="GET" name="NoAng" id="editForm">
                            <center>
                                <input type="hidden" name="NoAng" value=' . $row['NoAng'] . '>
                                <button class="fa fa-pen" type="submit"></button>
                            </center>
                        </form>
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
