<?php
  include("../includes/database_connection.php");
  include("../includes/functions.php");
  include("../includes/session.php");
?>

<?php
  $error_in_company = "";
  $error_in_vacancies = "";
  $error_in_jobtype = "";
  $errors =  array();
  if(isset($_POST['next'])){
    if(valid_name($_POST['company'])==1){
      $company = ($_POST['company']);
    }
    else{
      $error_in_company = "Only letters and white space allowed";
      array_push($errors, $error_in_company);
    }
    
    if(!isset($_POST['jobtype'])){
       $error_in_jobtype = "Please select a jobtype";
       array_push($errors, $error_in_jobtype);
    }
    else{
      $jobtype = $_POST['jobtype'];  
    }

    if(valid_num($_POST['vacancies'])==1){
      $vacancies = (int)$_POST['vacancies'];
    }
    else{
      $error_in_vacancies = "Only digits allowed";
      array_push($errors, $error_in_vacancies);
    }

    if(empty($errors)){
      $_SESSION['company'] = $company;
      $_SESSION['jobtype'] = $jobtype;
      $_SESSION['vacancies'] = $vacancies;
      
      if($jobtype === 'Software Development'){
      	redirect_to("software_form.php");
      }
      else{
      	redirect_to("webdev_form.php");	
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
    <p class="head">IT</p>
  </div>

  <div class="container" style="color: grey;">
    <form class="form-horizontal" action="IT_form.php" method="post">

      <div class="form-group">
        <label class="control-label col-sm-2" for="company">Company:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="company" placeholder="Enter the name of the Company" required>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_company; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="jobtype">Jobtype:</label>
        <div class="col-sm-10">
          <label class="radio-inline"><input type="radio" value="Software Development" name="jobtype">Software Development</label>
          <label class="radio-inline"><input type="radio" value="Web Development" name="jobtype">Web Development</label>
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