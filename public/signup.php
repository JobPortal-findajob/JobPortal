<?php
  include("../includes/database_connection.php");
  include("../includes/functions.php");
  include("../includes/session.php");
?>

<?php

 if (isset($_POST['username'])){
 	session_start();
 $username = $_POST['username'];
 $name = $_POST['fname']. " " .$_POST['lname'];;
 $gender=$_POST['Gender'];
 $password = md5($_POST['password']);
 $email = $_POST['email'];
 $dob = $_POST['dob'];
 
 $_SESSION['$username']=$username;
 $_SESSION['$name']=$name;
 $_SESSION['$gender']=$gender;
 $_SESSION['$password']=$password;
 $_SESSION['$email']=$email;
 $_SESSION['$dob']=$dob;

 header("Location: addressform.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- <link href="css/bootstrap.css" rel="stylesheet" /> -->
 <!-- 
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>  -->

<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/signup.css" />
</head>
<body style="background-image:url('images/post.jpg')">
<hr width="60%">
<center><h1 style="color:white">Welcome To FindaJob.com</h1></center>
<hr width="60%">
<!-- NAVIGATION BAR -->
<!--  <div class="navbar navbar-inverse navbar-fixed-top">
       
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">JobPortal</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home-sec">HOME</a></li>
                    <li><a href="#job-search">JOB SEARCH</a></li>
                     <li><a href="#profile">PROFILE</a></li>
                       <li><a href="#contact-us">CONTACT US</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
           
        </div>
    </div> -->
<!-- END NAVIGATION BAR -->
<div class="signup">
<div class="field">
<h1 align=center><b>Registration</b></h1>
<center>
<form name="registration" action="signup.php" method="post">
<pre>
<font face="Segoe UI">
First Name: 	<input type="text" name="fname" placeholder="First Name"><br>
Last Name:	<input type="text" name="lname" placeholder="Last Name"><br>
Gender:		<input type="radio" name="Gender" value="M" style = "width:20px; height:2em;">Male 		<input type="radio" name="Gender" value="F" style = "width:20px; height:2em;">Female<br>
Username:	<input type="text" name="username" placeholder="Username" required /><br>
Email:	 	<input type="email" name="email" placeholder="Email" required /><br>
Password: 	<input type="password" name="password" placeholder="Password" required /><br>
Date Of Birth:	<input type="date" name="dob"><br>
</font>
</pre>
<input type="submit" name="submit" value="Next" />
</form>
</div>
</div>

</body>
</html>