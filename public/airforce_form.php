<?php
  include("../includes/database_connection.php");
  include("../includes/functions.php");
  include("../includes/session.php");
?>

<?php
  $error_in_branch = "";
  $error_in_height = "";
  $error_in_weight = "";
  $error_in_age = "";
  $error_in_vacancies = "";
  $error_in_qualification = "";
  $error_in_salary = "";
  $error_in_pat = "";
  $errors =  array();
  $outputy = "";
  $outputn = "";
  if(isset($_POST['submit'])){

    //Check whether previous form is filled or not
    if(isset($_SESSION['minage'])){
      $minage = $_SESSION['minage'];
    }
    else{
      $outputn = "Please fill out the NDA form first.";
      array_push($errors, $outputn);
    }

    if(isset($_SESSION['maxage'])){
      $maxage = $_SESSION['maxage'];
    }
    else{
      $outputn = "Please fill out the NDA form first.";
      array_push($errors, $outputn);
    }

    if(isset($_SESSION['vacancies'])){
      $vacancies = $_SESSION['vacancies'];
    }
    else{
      $outputn = "Please fill out the NDA form first.";
      array_push($errors, $outputn);
    }
    if(isset($_SESSION['jobtype'])){
      $jobtype = $_SESSION['jobtype'];
    }
    else{
      $outputn = "Please fill out the NDA form first.";
      array_push($errors, $outputn);
    }

    if($jobtype !== "Airforce"){
      $outputn = "Wrong Form !! Please fill the $jobtype form";
      array_push($errors, $outputn);
    }
  
    //Validate the current form
     if(valid_name($_POST['branch'])==1){
      $branch = ($_POST['branch']);
    }
    else{
      $error_in_branch = "Only letters and white space allowed";
      array_push($errors, $error_in_branch);
    }

    if(valid_num($_POST['pat'])==1){
      $pat = (int)$_POST['pat'];
    }
    else{
      $error_in_pat = "Only digits allowed";
      array_push($errors, $error_in_pat);
    }

    if(valid_num($_POST['height'])==1){
      $height = (int)$_POST['height'];
    }
    else{
      $error_in_height = "Only digits allowed";
      array_push($errors, $error_in_height);
    }

    if($_POST['height']!=0){
      $height = (int)$_POST['height'];
    }
    else{
      $error_in_height = "Height can't be null";
      array_push($errors, $error_in_height);
    }

    if(valid_num($_POST['weight'])==1){
      $weight = (int)$_POST['weight'];
    }
    else{
      $error_in_weight = "Only digits allowed";
      array_push($errors, $error_in_weight);
    }

    if($_POST['weight']!=0){
      $weight = (int)$_POST['weight'];
    }
    else{
      $error_in_weight = "Weight can't be null";
      array_push($errors, $error_in_weight);
    }

    $qualification = $_POST['qualification'];
    
    if(valid_num($_POST['salary'])==1){
      $salary = (int)$_POST['salary'];
    }
    else{
      $error_in_salary = "Only digits allowed";
      array_push($errors, $error_in_salary);
    }

    if(empty($errors)){
      $query1 = "INSERT INTO nda(jobtype,min_age,max_age,vacancies) VALUES('$jobtype',$minage,$maxage,$vacancies)";
      $result1 = mysqli_query($connection,$query1);
      $id = find_id('nda',$connection);
      $query2 = "INSERT INTO airforce(sno,branch,pat,height,weight,qualification,salary) VALUES($id,'$branch',$pat,$height,$weight,'$qualification',$salary)";
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
    <p class="head">NDA - AIRFORCE</p>
  </div>

  <div class="container" style="color: grey;">
    <form class="form-horizontal" action="airforce_form.php" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="branch">Branch:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="branch" placeholder="Enter Branch" required>
        </div>
      </div>
      
      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_branch; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="PAT">PAT Score:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="pat" placeholder="Enter minimum Physical Assessment Test score required" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_pat; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="height">Height(in cm):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="height" placeholder="Enter minimum height required" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_height; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="weight">Weight(in Kg):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="weight" placeholder="Enter minimum weight required" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_weight; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="col-sm-2 control-label ">Qualification:</label>
        <div class="col-sm-10">
          <select class="form-control input-sm" name="qualification">
            <option value="10" >10th Pass</option>
            <option value="12" >12th Pass</option>
            <option value="UG" >UnderGraduate</option>
            <option value="PG" >PostGraduate</option>
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