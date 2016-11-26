<?php
  include("../includes/database_connection.php");
  include("../includes/functions.php");
  include("../includes/session.php");
?>

<?php
  $error_in_projects = "";
  $error_in_salary = "";
  $errors =  array();
  $outputy = "";
  $outputn = "";
  if(isset($_POST['submit'])){

    if(isset($_SESSION['company'])){
      $company = $_SESSION['company'] ;
    }
    else{
      $outputn = "Please fill out the IT form first.";
      array_push($errors, $outputn);
    }
    if(isset($_SESSION['jobtype'])){
      $jobtype = $_SESSION['jobtype'];
    }
    else{
      $outputn = "Please fill out the IT form first.";
      array_push($errors, $outputn);
    }

    if($jobtype == "Software Development"){
      $outputn = "Wrong Form !! Please fill the Software Development form";
      array_push($errors, $outputn);
    }

    if(isset($_SESSION['vacancies'])){
      $vacancies = $_SESSION['vacancies'];
    }
    else{
      $outputn = "Please fill out the IT form first.";
      array_push($errors, $outputn);
    }

    $qualification = $_POST['qualification'];
    if(valid_num($_POST['projects'])==1){
      $projects = (int)$_POST['projects'];
    }
    else{
      $error_in_projects = "Only digits allowed";
      array_push($errors, $error_in_projects);
    }
    if(valid_num($_POST['salary'])==1){
      $salary = (int)$_POST['salary'];
    }
    else{
      $error_in_salary = "Only digits allowed";
      array_push($errors, $error_in_salary);
    }

    if(empty($errors)){
      $query1 = "INSERT INTO it(company,jobtype,vacancies) VALUES('$company','$jobtype',$vacancies)";
      $result1 = mysqli_query($connection,$query1);
      $id = find_id('it',$connection);

      $query2 = "INSERT INTO webdev(sno,minprojects,qualification,salary) VALUES($id,$projects,'$qualification',$salary)";
      
      $result2 = mysqli_query($connection,$query2);
      if($result1 && $result2){
        $outputy = "Form successfully submitted";
      }
      else{
        $outputn = "Sorry ! Form could not be submitted"; 
      }
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
    <p class="head">IT - WEB DEVELOPMENT</p>
  </div>

  <div class="container" style="color: grey;">
    <form class="form-horizontal" action="webdev_form.php" method="post">
    
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
        <label class="col-sm-2 control-label ">Qualification:</label>
        <div class="col-sm-10">
          <select class="form-control input-sm" name="qualification">
            <option value="10" name="10">10th Pass</option>
            <option value="12" name="12">12th Pass</option>
            <option value="UG" name="UG">UnderGraduate</option>
            <option value="PG" name="PG">PostGraduate</option>
          </select>
        </div>
      </div>

       <div class="form-group">
        <label class="control-label col-sm-2" for="salary">Salary(INR):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="salary" placeholder="Enter salary to be provided" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_salary; 
        echo "</div>";
      ?>

      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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