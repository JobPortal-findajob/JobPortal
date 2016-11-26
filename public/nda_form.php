<?php
  include("../includes/database_connection.php");
  include("../includes/functions.php");
  include("../includes/session.php");
?>

<?php
  $error_in_minage = "";
  $error_in_maxage = "";
  $error_in_age = "";
  $error_in_vacancies = "";
  $error_in_jobtype = "";
  $errors =  array();
  if(isset($_POST['next'])){    
    if(valid_num($_POST['minage'])==1){
      $minage = (int)$_POST['minage'];
    }
    else{
      $error_in_minage = "Only digits allowed";
      array_push($errors, $error_in_minage);
    }
    if(valid_num($_POST['maxage'])==1){
      $maxage = (int)$_POST['maxage'];
    }
    else{
      $error_in_maxage = "Only digits allowed";
      array_push($errors, $error_in_maxage);
    }

    if($_POST['minage']>=$_POST['maxage']){
       $error_in_age = "Maximum age can't be less than minimum age";
       array_push($errors, $error_in_age);
    }

    //Validating vacancies
    if(valid_num($_POST['vacancies'])==1){
      $vacancies = (int)$_POST['vacancies'];
    }
    else{
      $error_in_vacancies = "Only digits allowed";
      array_push($errors, $error_in_vacancies);
    }

    if(!isset($_POST['jobtype'])){
       $error_in_jobtype = "Please select a jobtype";
       array_push($errors, $error_in_jobtype);
    }
    else{
      $jobtype = $_POST['jobtype'];  
    }

    if(empty($errors)){
      $_SESSION['minage'] = $minage;
      $_SESSION['maxage'] = $maxage;
      $_SESSION['jobtype'] = $jobtype;
      $_SESSION['vacancies'] = $vacancies;

      if($jobtype === 'Airforce'){
        redirect_to("airforce_form.php");
      }
      else if($jobtype === 'Army'){
        redirect_to("army_form.php"); 
      }
      else{
        redirect_to("navy_form.php");
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
    <p class="head">NDA</p>
  </div>

  <div class="container" style="color: grey;">
    <form class="form-horizontal" action="nda_form.php" method="post">

      <div class="form-group">
        <label class="control-label col-sm-2" for="minage">Minimum Age:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="minage" placeholder="Enter minimum age required" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_minage; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="maxage">Maximum Age:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="maxage" placeholder="Enter maximum age required" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_maxage; 
        echo "</div>";
      ?>
      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_age; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="jobtype">Jobtype:</label>
        <div class="col-sm-10">
          <label class="radio-inline"><input type="radio" value="Airforce" name="jobtype">Airforce</label>
          <label class="radio-inline"><input type="radio" value="Army" name="jobtype">Army</label>
          <label class="radio-inline"><input type="radio" value="Navy" name="jobtype">Navy</label>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_jobtype; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="vacancies">Vacancies:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="vacancies" placeholder="Enter the number of vacancies" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_vacancies; 
        echo "</div>";
      ?>
      
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary" name="next">Next</button>
        </div>
      </div>
    </form>
  </div>

<?php
  include("footer.php");
?>