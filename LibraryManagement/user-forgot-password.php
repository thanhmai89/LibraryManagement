<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['change'])) {
  //code for captach verification
  if ($_POST["vercode"] != $_SESSION["vercode"] or $_SESSION["vercode"] == '') {
    echo "<script>alert('Incorrect verification code');</script>";
  } else {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $newpassword = md5($_POST['newpassword']);
    $sql = "SELECT EmailId FROM tblstudents WHERE EmailId=:email and MobileNumber=:mobile";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
      $con = "update tblstudents set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
      $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
      $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();
      echo "<script>alert('Your Password succesfully changed');</script>";
    } else {
      echo "<script>alert('Email id or Mobile no is invalid');</script>";
    }
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
  <title>Online Library Management System | Password Recovery </title>
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
      if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
        alert("New Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
      }
      return true;
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

      <!--LOGIN PANEL START-->
      <form class="login100-form validate-form" nrole="form" name="chngpwd" method="post" onSubmit="return valid();">
					<span class="login100-form-title">
						Change Password
					</span>
					<div class="panel-heading">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="email" name="email" required autocomplete="off" required placeholder="Registered Email" />
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

            <div class="wrap-input100 validate-input">
							<input class="input100" type="text" type="text" name="mobile" autocomplete="off" placeholder="Mobile" required />
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-mobile" aria-hidden="true"></i>
							</span>
            </div>

            <div class="wrap-input100 validate-input">
							<input class="input100" type="password" name="newpassword" autocomplete="off" placeholder="Password" required />
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
            </div>
            
            <div class="wrap-input100 validate-input">
							<input class="input100" type="password" name="confirmpassword" autocomplete="off" placeholder="Confirm Password" required />
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
							<button class="login100-form-btn" type="submit" name="change" class="btn btn-danger" id="submit">
								Change password
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
  <!-- FOOTER SECTION END-->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS  -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>

</body>

</html>