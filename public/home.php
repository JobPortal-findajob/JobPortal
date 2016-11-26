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
                <li><a href="postajob.php">POST A JOB</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>

    </div>
</div>
<!--END NAV SECTION -->

<!--HOME SECTION-->
<div id="home-sec" style="background-image: url('images/BG.jpg'); " >


    <div class="container"  >
        <div class="row text-center">
            <div  class="col-md-12" >
                <span class="head-main" > &nbsp Job Portal &nbsp </span>
                <h2 class="head-sub-main">One job Portal For Everything</h2>
                <h3 class="head-last col-md-4 col-md-offset-4  col-sm-6 col-sm-offset-3">Get In The Race</h3>


            </div>
            <div class="col-md-12 col-sm-12">
             <form method="POST" accept="search1.php">
                <a  href="getpost.php">
                   <i class="fa fa-crosshairs fa-5x go-marg"></i> 
                   <center><h3 style="color:white">Click Here To Start</h3></center>
               </a>
           </form>
       </div>
   </div>
</div>
</div>

<!--END HOME SECTION-->  

<!--SERVICES SECTION-->    
<section  id="job-search">
    <div class="container">
        <div class="row ">
            <h1 >  <i class="fa fa-crosshairs "></i> Why you Should Join Us</h1>

            <div align="center" style="margin-top:5px;">
                <h4>India, the second largest populated country after China, and about 60 to 65 percent of the country’s population is in the age group of 20- 30 years, clearly stating the high demand of new jobs and providing rise to the significance of various job portals. Job Portals are the meeting points for the recruiters and the job seekers where each goals at meeting their respective requirements. Recruiters  fill their job openings with the right candidate who has the right qualification and ability to handle the responsibilities efficiently. On the one hand, the job seekers try to find a job where they can apply their knowledge and grow as a professional.</h4>
            </div>
        </div>
        </div>



        <!--CONTACT SECTION-->
<center>
        <section  id="logout" >
            <div class="container">

                <div class="row g-pad-bottom">
                  <h1 >  <i class="fa fa-crosshairs"></i> Contact Info  </h1>


                  <div class="col-md-12 ">
                    <h2>Feel Free To Contact Us</h2>

                    <p>
                       <strong> Address: </strong> &nbsp;MHA, VIT UNIVERSITY Chennai Campus, Vandaloor-Kelambakkam Rd.  
                       <br />
                                
                   </p>
                   <form action="home.php" method="post">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit Request</button>

                            </div>
                        </div>
                    </div>
                </form>
                 <br> <br>
            </div>
            
     </div>
 </div>
</section>
</center>
<!--END CONTACT SECTION-->

<!--FOOTER SECTION -->
<div class="bottom" >
    2016 <a href="home.php">www.findajob.com</a> | All Rights Reserved  

</div>
<!-- END FOOTER SECTION -->
</body>
</html>
