<?php
include("../includes/database_connection.php");
include("../includes/functions.php");
include("../includes/session.php");
$current_user=$_SESSION['current_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <style type="text/css">
    table{
      width: 40%;
    }
  </style>
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
        <a class="navbar-brand " href="home.php">findajob.com -    <a class="navbar-brand " href="profile.php">  <span class="a1"> MY PROFILE </span></a> </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="home.php">home</a></li>
          <li><a href="getpost.php">jobs</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid bg-1 text-center">
    <h3 class="margin">
      Welcome To FindaJob
    </h3>
    <img src="images/t2.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
    <h3><?php echo $_SESSION['current_name'] ?></h3>
  </div>

  <div class="container-fluid bg-2 text-center">
    <h3 class="margin">My Profile</h3>
    <p> 
      <?php 
      $sql="select * from `user_details` where username='$current_user'";
      $result = mysqli_query($connection,$sql);
      $row= mysqli_fetch_array($result);
      ?>
      <table align="center" border="2px">
        <tr><td>Name:</td><td><?php echo $row['name']; ?></td></td>
          <tr><td>Username:</td><td><?php echo $row['username']; ?></td></td>
            <tr><td>Email:</td><td><?php echo $row['email']; ?></td></td>
              <tr><td>Date Of Birth:</td><td><?php echo $row['birthday']; ?></td></td>
                <tr><td>Age:</td><td><?php echo $row['age']; ?></td></td>
                  <tr><td>Qualification:</td><td><?php echo $row['qualification']; ?></td></td>
                    <tr><td>Address:</td><td><?php echo $row['street'].",".$row['city'].$row['state']."<br>".$row['PIN']; ?></td></td>

                    </table>
                    <!--  <span class="glyphicon glyphicon-search"></span> Search -->
                  </p>
                </div>

                <div class="container-fluid bg-3 text-center">
                  <h3 class="margin">My Interests</h3><br>
                  <div class="row">
                    <div class="col-sm-12">
                      <p>
                        <?php 
                        $sql="select * from `interests` where username='$current_user'";
                        $result = mysqli_query($connection,$sql);

                        while ($row=mysqli_fetch_array($result)) {
                          ?>
                          <table align="center" border="2px">
                            <tr><td><?php echo $row['interest']; ?></td></td>

                                <?php
                              }
                              ?>
                            </table>
                          </p>

                        </div>
                      </div>
                    </div>

                    <?php
                    include("footer.php");
                    ?>




