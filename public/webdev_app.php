<?php
include("../includes/database_connection.php");
include("../includes/functions.php");
include("../includes/session.php");
?>

<?php
$this_job=$_SESSION['sno'];
$error_in_projects = "";
$error_in_name = "";
$error_in_vacancies = "";
$error_in_salary = "";
$errors =  array();
$outputy = "";
$outputn = "";
if(isset($_POST['submit'])){

  $query ="select company,vacancies from `it` where `sno`= $this_job";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_array($result);

  $query1 ="select miniprojects,qualification,salary from `webdev` where `sno`= $this_job";
  $result1 = mysqli_query($connection,$query1);
  $row1 = mysqli_fetch_array($result1);

  $vacancies_avail = $row['vacancies'];
  if($vacancies_avail >= 1){

   if(valid_name($_POST['name']) == 1){
    $name = ($_POST['name']);
  }
  else{
    $error_in_name = "Only letters and white space allowed";
    array_push($errors, $error_in_name);
  }
  $address = $_POST['address'];

  $qualification = $_POST['qualification'];


  if(valid_num($_POST['projects'])==1){
      $projects = (int)$_POST['projects'];
    }
    else{
      $error_in_projects = "Only digits allowed";
      array_push($errors, $error_in_projects);
    }
  if(valid_num($_POST['salary']) == 1){
    $salary = (int)$_POST['salary'];
  }
  else{
    $error_in_salary = "Only digits allowed";
    array_push($errors, $error_in_salary);
  }

  if(empty($errors)){
    $query = "INSERT INTO webdev_app(sno,name,address,miniprojects,qualification,des_salary) VALUES('$this_job','$name','$address','$projects','$qualification',$salary)";
    $result = mysqli_query($connection,$query);
    if($result){
      $outputy = "Applied successfully";

      $vacancies_avail=$vacancies_avail-1;
      $query="update `it` set `vacancies`=$vacancies_avail where `sno`=$this_job ";
      $result = mysqli_query($connection,$query);
    }
    else{
      $outputn = "Sorry ! Form could not be submitted"; 
    }
  }
}
else{
  $error_in_vacancies = "Not Enough vacancies Available";
  array_push($errors, $error_in_vacancies);
}


}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>FORM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header " >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand " href="home.php">findajob.com  </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="home.php">home</a></li>
          <li><a href="login.php">jobs</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <p class="head">WEBDEVELOPMENT APPLICATION FORM</p>
  </div>

  <div class="container" style="color: grey;">
    <form class="form-horizontal" action="webdev_app.php" method="post">

      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" placeholder="Enter Your name" required>
        </div>
      </div>

      <?php 
      echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
      echo $error_in_name; 
      echo "</div>";
      ?>
      
      <div class="form-group">
        <label class="control-label col-sm-2" for="address">Address:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="address" placeholder="Enter Your address" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label ">Your Qualification:</label>
        <div class="col-sm-10">
          <select class="form-control input-sm" name="qualification" required>
            <option value="10">10th Pass</option>
            <option value="12">12th Pass</option>
            <option value="UG">UnderGraduate</option>
            <option value="PG">PostGraduate</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projects">Projects:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="projects" placeholder="Enter the minimum number of projects required" required>
        </div>
      </div>
      
      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_projects; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="salary">Desired Salary(INR):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="salary" placeholder="How Much You Desire From This Job" required>
        </div>
      </div>

      <?php 
      echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
      echo $error_in_salary; 
      echo "</div>";
      ?>
      

      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="submit" class="btn btn-primary">Apply Now</button>
        </div>
      </div>

      <?php 
      echo "<div style=\"margin-left: 15%;font-size: 120%;color: #00FF00;\">";
      echo $outputy; 
      echo "</div>";
      ?>
      <?php 
      echo "<div style=\"margin-left: 15%;font-size: 120%;color: red;\">";
      echo $outputn; 
      echo "</div>";
      ?>

    </form>
  </div>

  <?php
  include("footer.php");
  ?>