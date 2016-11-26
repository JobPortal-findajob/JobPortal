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
         <div class="navbar navbar-inverse navbar-fixed-top" >
       
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
                       <li><a href="postajob.php">POST A JOB</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
           
        </div>
    </div>
     <!--END NAV SECTION -->
    
    <!--HOME SECTION-->
    <div id="home-sec" style="background-image: url('images/post.jpg'); " >

   
    <div class="container"  >
        <div class="row text-center">
            <div  class="col-md-12" >
                <span class="head-main" style="color: red">Post A Job</span>
                <h2 class="head-sub-main" style="color: white">Right Now</h2>
                <h3 class="head-last col-md-4 col-md-offset-4  col-sm-6 col-sm-offset-3" style="color: pink">Choose Any Of The Following Job Types</h3>
         
                 
            </div>
            <div class="col-md-12 col-sm-12">
               <form method="POST" accept="search1.php">
                <a  href="#job">
                 <i class="fa fa-crosshairs fa-5x go-marg"></i> 
                    </a>
                 </form>
            </div>
        </div>
    </div>
         </div>
    
    <!--END HOME SECTION-->  

    <!--SERVICES SECTION-->    
    <section  id="job"  style="background-color: lightgrey">
        <div class="container">
            <div class="row " style="margin-bottom:10%">
            <center>
            <table >
             <tr>
             <td><a href="hospital_form.php"><img src="images/hospital.png" style="width:200px; height:200px;border-radius: 30%; border: 5px solid red;"><figcaption style="font-size:20px;text-align: center;">Hospital</figcaption></a></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td><a href="nda_form.php"><img src="images/nda.png" style="width:200px; height:200px;border-radius: 30%; border: 5px solid red;"><figcaption style="font-size:20px;text-align: center;">NDA</figcaption></td></a><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td><a href="banking_form.php"><img src="images/bank.png" style="width:200px ; height:200px ;border-radius: 30%; border: 5px solid red;"><figcaption style="font-size:20px;text-align: center;">Bank</figcaption></td></a><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
             <td><a href="IT_form.php"><img src="images/IT.png" style="width:200px ; height:200px ;border-radius: 30%; border: 5px solid red;"><figcaption style="font-size:20px;text-align: center;">IT</figcaption></td></a><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>  
             <td><a href="school_form.php"><img src="images/school.png" style="width:200px ;height:200px;border-radius: 30%; border: 5px solid red;"><figcaption style="font-size:20px;text-align: center;"  >School</figcaption></a></td></tr>
             </table>
            <!--  <h2 style="float: left; margin-left: 280px;";>Get A Job</h2>
             <h2 style="float: right;margin-right: 280px;">Post A Job</h2> -->
             <br>
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
