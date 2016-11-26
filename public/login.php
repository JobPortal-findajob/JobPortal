
<?php 
include("../includes/database_connection.php");
include("../includes/session.php");
include("../includes/functions.php");
?>
<?php
if(logged_in())
    header("Location : home.php");
?>
<?php
global $error;
if (isset($_POST['submit'])) 
{
    $password = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['password'])));
    $username = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['username'])));
    $hash_password = md5($password);
    $found_user=attempt_login($username,$hash_password,$connection);
    
    if($found_user)
    {
        $user_id=find_user_by_id($username,$connection);
        $name=find_user_by_name($username,$connection);
        $_SESSION['current_user_id']=$user_id;
        $_SESSION['current_name']=$name;
        $_SESSION['current_username']=$username;
        redirect_to("home.php");
    }
    else
    {
        $error="Incorrect user details";
        destroySession();
    }
} 
?> 



<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<meta name="keywords" />
	<link href="css/style1.css" rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<style type="text/css">
		.container {
			padding-right: 15px;
			padding-left: 15px;
			margin-right: auto;
			margin-left: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Welcome to FINDAJOB<span>Please login...</span></h1>
		<div class="login-box">
			<form action="login.php" method="post">
				<input type="text" class="text" name="username" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
				<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
			
			<!-- <div class="remember">
				<a href="#"><p>Remember me</p></a>
				<h4>Forgot your password?<a href="#">Click here.</a></h4>
			</div> -->
			<div class="clear"> </div>
			<div class="btn">
				<input type="submit" name = "submit" value="LOG IN" ></input><br><br>

				<span style="color: grey;">OR</span><br><br>
				<input type="submit" name = "signup" value="SIGN UP" ></input>
			</div>
			<div class="clear"> </div>
			</form>
		</div>
	</div>
	<!-- <div class="container" style="color:white;margin-bottom: -50px;">
		<p>Copyright &copy; 2016. All Rights Reserved | Design by <a href="home.php">findajob.com</a></p>
	</div> -->
</body>
</html>
