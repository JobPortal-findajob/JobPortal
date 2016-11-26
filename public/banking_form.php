<?php
  include("../includes/database_connection.php");
  include("../includes/functions.php");
  include("../includes/session.php");
?>

<?php
  $error_in_name = "";
  $error_in_languages = "";
  $error_in_jobtype = "";
  $errors =  array();
  if(isset($_POST['next'])){
    if(valid_name($_POST['name'])==1){
      $name = ($_POST['name']);
    }
    else{
      $error_in_name = "Only letters and white space allowed";
      array_push($errors, $error_in_name);
    }
    $address = $_POST['address'];
  
    if(!isset($_POST['jobtype'])){
       $error_in_jobtype = "Please select a jobtype";
       array_push($errors, $error_in_jobtype);
    }
    else{
      $jobtype = $_POST['jobtype'];  
    }

    if(!empty($_POST['languages'])){
      $languages = implode(",", $_POST['languages']);
    }
    else{
      $error_in_languages = "Please select some language";
      array_push($errors, $error_in_languages);
    }


    if(empty($errors)){
      $_SESSION['name'] = $name;
      $_SESSION['address'] = $address;
      $_SESSION['jobtype'] = $jobtype;
      $_SESSION['languages'] = $languages;

      if($jobtype === 'PO'){
        redirect_to("PO_form.php");
      }
      else{
        redirect_to("clerk_form.php"); 
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
    <p class="head">BANKING</p>
  </div>

  <div class="container" style="color: grey;">
    <form class="form-horizontal" action="banking_form.php" method="post">

      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" placeholder="Enter name of the bank" required>
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
          <input type="text" class="form-control" name="address" placeholder="Enter address of the bank" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label ">Languages:</label>
        <div class="col-sm-10">
          <label class="checkbox-inline"><input type="checkbox" name="languages[]" value="Hindi">Hindi</label>
          <label class="checkbox-inline"><input type="checkbox" name="languages[]" value="English">English</label>
          <label class="checkbox-inline"><input type="checkbox" name="languages[]" value="French">French</label>
          <label class="checkbox-inline"><input type="checkbox" name="languages[]" value="Spanish">Spanish</label>
          <label class="checkbox-inline"><input type="checkbox" name="languages[]" value="German">German</label>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_languages; 
        echo "</div>";
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="jobtype">Jobtype:</label>
        <div class="col-sm-10">
        <label class="radio-inline"><input type="radio" name="jobtype" value="PO">PO</label>
          <label class="radio-inline"><input type="radio" name="jobtype" value="Clerk">Clerk</label>
        </div>
      </div>

      <?php 
        echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
        echo $error_in_jobtype; 
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