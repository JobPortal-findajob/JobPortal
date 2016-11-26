<?php
  include("../includes/database_connection.php");
  include("../includes/functions.php");
  include("../includes/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>FINDAJOB</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
    <!--<link href="assets/css/prettyPhoto.css" rel="stylesheet" />-->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>   
    <link rel="stylesheet" type="text/css" href="">
    <style type="text/css">
    	html{
    		position: relative;
    	}

    	.bottom{
    		position: absolute;
    		bottom: 0;
    		background-color:#E91C1C;
    		width: 100%;
    		color:#fff;
    		padding:20px 50px 20px 50px;
    		text-align:right;
    	}
    	.bottom a{
    		color: white;
    	}
    	.bottom a:hover{
    		color: black;
    	}
    </style>
</head>
<body >
         <!-- NAV SECTION -->
         <div class="navbar navbar-inverse navbar-fixed-top">
       
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">findajob</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="search1.php">JOB SEARCH</a></li>
                     <li><a href="profile.php">PROFILE</a></li>
                       <li><a href="postajob.php ">POST A JOB</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
           
        </div>
    </div>
     <!--END NAV SECTION -->
    
   

    <!--SERVICES SECTION-->    
    <section  id="job-search">
        <div class="container">
            <div class="row " style="margin-bottom:10%">
            <center>
             <a href="search1.php"><img src="images/get.png" style="width:35%;border-radius: 30%; border: 5px solid red;margin-right: 50px;"></a>
             <a href="postajob.php"><img src="images/post.png" style="width:35%;border-radius: 30%; border: 5px solid red;"><br></a>
             <h2 style="float: left; margin-left: 280px;";>Get A Job</h2>
             <h2 style="float: right;margin-right: 280px;">Post A Job</h2>
             <br>
             </center>
          </div>
        </div>
    </section>
    <!--END SERVICES SECTION-->
  
  

    <!--FOOTER SECTION -->
    <div class="bottom" >
        2016 <a href="home.php">www.findajob.com</a> | All Rights Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->
</body>
</html>
