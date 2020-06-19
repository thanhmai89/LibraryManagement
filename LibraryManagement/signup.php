<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['signup'])) {
  //Code for student ID
  $count_my_page = ("studentid.txt");
  $hits = file($count_my_page);
  $hits[0]++;
  $fp = fopen($count_my_page, "w");
  fputs($fp, "$hits[0]");
  fclose($fp);
  $StudentId = $hits[0];
  $fname = $_POST['fullanme'];
  $mobileno = $_POST['mobileno'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $status = 1;
  $sql = "INSERT INTO  tblstudents(StudentId,FullName,MobileNumber,EmailId,Password,Status) VALUES(:StudentId,:fname,:mobileno,:email,:password,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':StudentId', $StudentId, PDO::PARAM_STR);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo '<script>alert("Your Registration successfull and your student id is  "+"' . $StudentId . '") 
          window.location.replace("index.php")</script>';
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Online Library Management System | Student Signup</title>
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="assets/img/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <script type="text/javascript">
    function valid() {
      if (document.signup.password.value != document.signup.confirmpassword.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.signup.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
  <script>
    function checkAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'emailid=' + $("#emailid").val(),
        type: "POST",
        success: function(data) {
          $("#user-availability-status").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {}
      });
    }
  </script>

</head>

<body>
  <!------MENU SECTION START-->
  <?php include('includes/header.php'); ?>
  <!-- MENU SECTION END-->
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/img/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" name="signup" method="post" onSubmit="return valid();">
					<span class="login100-form-title">
						Student Register
					</span>
					<div class="panel-heading">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" type="text" name="fullanme" autocomplete="off" placeholder="Full Name" required />
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" type="text" name="mobileno" maxlength="10" autocomplete="off" placeholder="Mobile" required />
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-mobile" aria-hidden="true"></i>
							</span>
            </div>
            
            <div class="wrap-input100 validate-input">
              <input class="input100" type="email" name="email" id="emailid" onBlur="checkAvailability()" autocomplete="off" placeholder="Email" required />
              <span id="user-availability-status" style="font-size:12px;"></span>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
            </div>
            
            <div class="wrap-input100 validate-input">
							<input class="input100" type="password" name="password" autocomplete="off" placeholder="Password" required />
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
            </div>
            
            <div class="wrap-input100 validate-input">
							<input class="input100" type="password" name="confirmpassword" autocomplete="off" placeholder="Confirm password" required />
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
            </div>
            
            <div class="wrap-input100 validate-input">
              <input class="input100" type="text" name="vercode" maxlength="5" autocomplete="off" placeholder="Verification Code" required  />&nbsp;<br><img src="captcha.php">
              <span class="focus-input100"></span>
            </div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit" name="signup" class="btn btn-danger" id="submit">
								Register
							</button>
            </div>

						<div class="text-center p-t-136">
							<a class="txt2" href="index.php">
								Login
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
				</form>
			</div>
		</div>
	</div>
  <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php'); ?>
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>
</body>

</html>