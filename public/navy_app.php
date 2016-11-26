<?php
include("../includes/database_connection.php");
include("../includes/functions.php");
include("../includes/session.php");
?>

<?php
$this_job=$_SESSION['sno'];
$error_in_branch = "";
$error_in_height = "";
$error_in_weight = "";
$error_in_pat = "";
$error_in_name = "";
$error_in_minage = "";
$error_in_maxage = "";
$error_in_age = "";
$error_in_vacancies = "";
$error_in_jobtype = "";
$error_in_salary = "";
$errors =  array();
$outputy = "";
$outputn = "";
if(isset($_POST['submit'])){

  $query ="select min_age,max_age,vacancies from `nda` where `sno`= $this_job";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_array($result);

  $query1 ="select branch,pat,height,weight,qualification from `army` where `sno`= $this_job";
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


  if($row['min_age'] < $_POST['age'] ){
    if($row['max_age'] > $_POST['age']){
      $age = (int)$_POST['age'];
    }
    else{
      $error_in_age = "Your Age is Greater than required Age for this Job";
      array_push($errors, $error_in_age);
    }
  }
  else{
    $error_in_age = "Your Age is Less than required Age for this Job";
    array_push($errors, $error_in_age);
  }


  $branch = $row1['branch'];
  $pat = $row1['pat'];
  $wt = $row1['weight'];
  $ht = $row1['height'];
  $qualification = $_POST['qualification'];

  if(valid_num($_POST['salary']) == 1){
    $salary = (int)$_POST['salary'];
  }
  else{
    $error_in_salary = "Only digits allowed";
    array_push($errors, $error_in_salary);
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


  if(empty($errors)){
    $query = "INSERT INTO army_app(sno,name,address,branch,pat,age,height,weight,qualification,des_salary) VALUES('$this_job','$name','$address','$branch','$pat','$age','$height','$weight','$qualification',$salary)";
    $result = mysqli_query($connection,$query);
    if($result){
      $outputy = "Applied successfully";

      $vacancies_avail=$vacancies_avail-1;
      $query="update `nda` set `vacancies`=$vacancies_avail where `sno`=$this_job ";
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
    <p class="head">NAVY FORM</p>
  </div>

  <div class="container" style="color: grey;">
    <form class="form-horizontal" action="navy_app.php" method="post">

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
        <label class="control-label col-sm-2" for="branch">Branch:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="branch" placeholder="Enter Branch" required>
        </div>
      </div>
      
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
        <label class="control-label col-sm-2" for="minage">Age</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="age" placeholder="Enter Your Age" required>
        </div>
      </div>

      <?php 
      echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
      echo $error_in_age; 
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
        echo $error_in_branch; 
        echo "</div>";
      ?>

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

      <?php 
      echo "<div style=\"margin-left: 15%;font-size: 80%;color: red;\">";
      echo $error_in_vacancies; 
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