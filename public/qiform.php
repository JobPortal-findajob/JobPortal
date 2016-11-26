<?php
include("../includes/database_connection.php");
include("../includes/functions.php");
include("../includes/session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link rel="stylesheet" href="css/signup.css" />
</head>
<body style="background-image:url('images/post.jpg')">
	<?php

	if (isset($_POST['Interests'])){
		$qualification= $_POST['Qualification'];
 	//$Interests= $_POST['Interests'];
 	//$date=date();

		$username= $_SESSION['$username'];
		$name= $_SESSION['$name'];
		$gender= $_SESSION['$gender'];
		$password= $_SESSION['$password'];
		$email= $_SESSION['$email'];
		$dob= $_SESSION['$dob'];
		$street=$_SESSION['$Street'];
		$City= $_SESSION['$City'];
		$State= $_SESSION['$State'];
		$PIN= $_SESSION['$PIN'];

		$age=18;

		$query = "INSERT INTO `user_details`(`user_id`, `name`, `email`, `password`, `username`, `qualification`, `birthday`, `street`, `city`, `PIN`, `state`, `age`, `gender`) VALUES (0,'$name','$email','$password','$username','$qualification','$dob','$street','$City','PIN','$State','$age','$gender')";
		$result = mysqli_query($connection,$query);
		echo "$result";
		if($result){
			if(!empty($_POST['Interests'])){
// Loop to store and display values of individual checked checkbox.
				foreach($_POST['Interests'] as $selected){
					$query = "INSERT INTO `Interests`(`username`, `interest`) VALUES ('$username','$selected')";
					$result = mysqli_query($connection,$query);
				}
			}
			Echo "User Registred";
			header("location:login.php");
		}
		else{echo "User Not Registred";
	}
}
?>
<div class="signup">
	<div class="text">
		<h1 align=center><b>Interests Form</b></h1>
		<form name="registration" action="qiform.php" method="post">
			<center>
				<pre>
					<font face="Segoe UI">
						Qualification:	 <select type="dropdown" name="Qualification">
						<option value="10" name="10">10th Pass</option>
						<option value="12" name="12">12th Pass</option>
						<option value="UG" name="UG">UnderGraduate</option>
						<option value="PG" name="PG">PostGraduate</option>
					</select><br>
					Interests:	<input type="checkbox" name="Interests[]" value="School"/>School
							<input type="checkbox" name="Interests[]" value="Hospital"/>Hospital
							<input type="checkbox" name="Interests[]" value="IT"/>IT Sector
							<input type="checkbox" name="Interests[]" value="Banking"/>Banking
							<input type="checkbox" name="Interests[]" value="NDA"/>NDA
				</font>
			</pre>
			<input type="submit" name="submit" value="Next" />
		</form>
	</div>
</div>

</body>
</html>