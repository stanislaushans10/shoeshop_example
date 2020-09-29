<html>
<title>Login Page </title>
<head>
	<!-- <meta charset="UTF-8"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action = "" method = "post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Welcome to Toko Sepatu
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter ID">
						<input class="input100" type="text" name="id" placeholder="ID">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <center>
                    <div class="container-login100-form-btn">
                        <!-- <input class="login100-form-btn" type = "submit" value = " Masuk " style="height:50px; width:100px; font-size: 20px" /><br /> -->
                        <button class="login100-form-btn">
							Login
						</button>

                    </div>
                    </center>
				</form>
					<!-- <div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick="window.location.href='register.php';">
							Daftar
						</button>
					</div> -->
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
<?php
	include 'config.php';
	echo session_status();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myId = mysqli_real_escape_string($conn,$_POST['id']);	//input username
      $myPassword = mysqli_real_escape_string($conn,$_POST['password']); //input password

      $sql = "SELECT * FROM user WHERE id = '$myId' AND password = '$myPassword'"; //view all username and password

      $result = mysqli_query($conn,$sql);								//all username and password are stored in variable $result
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);					//collect all line from result
      $count = mysqli_num_rows($result);		  //count number of line



      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) 													// if $count is 1 then username and password correct
	  {
		$sql = "SELECT nama, status FROM user WHERE id = '$myId' AND password = '$myPassword'"; //view all username and password
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$myStatus = $row['status'];
        $myNama = $row['nama'];

		if($myStatus == 'admin')
		{
			session_start();
			$_SESSION['login_ID'] = $myId;						//username input for login
            $_SESSION['login_Nama'] = $myNama;
			$_SESSION['login_Status'] = $myStatus;
			$_SESSION['success'] = "you are now logged in";
			header("location: admin.php");								//logged in and go to Absensi.php
		}
		if($myStatus == 'user')
		{
			session_start();
			$_SESSION['login_ID'] = $myId;
            $_SESSION['login_Nama'] = $myNama;
			$_SESSION['login_Status'] = $myStatus;
			echo $_SESSION['login_ID'];
			echo $_SESSION['login_Nama'];
			$_SESSION['success'] = "you are now logged in";
			header("location: home.php");
		}
      }

	  else
	  {
         $error = "Your Login ID or Password is invalid";
		 echo "<center>";
		 echo '<span style="color:#ff0000">';
		 echo $error;
		 echo '</span>';
		 echo "</center>";
      }
   }
?>
</html>
