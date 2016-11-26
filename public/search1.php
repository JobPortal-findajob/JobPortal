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
	<script type="text/javascript">
		function myFunc(id,web)
		{
			if(id==1)
			window.location.href=web;
		}
	</script>
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
		input[type=submit]{
			background-image: 
		}
		table{
			table-layout: fixed;
		}
		th{
			border-top:1px solid grey;
			border-bottom:1px solid grey; 
			width: 70px;
			text-align: center;
			color: #ce835b;
		}

		td {
			border-right:1px solid grey;
			border-left:1px solid grey; 
			width: 70px;
			text-overflow: hidden;
			text-align: center;
			color: #ce835b;
		}
		input[type=submit]{
			font-family: "Helvetica", sans-serif;
		position: absolute;
		font-size: 1.5em;
		text-transform: uppercase;
		padding: 7px 20px;
		left: 50%;
		width: 200px;
		margin-left: -100px;
		top: 50%;
		border-radius: 10px;
		color: white;
		text-shadow: -1px -1px 1px rgba(0,0,0,0.8);
		border: 5px solid transparent;
		border-bottom-color: rgba(0,0,0,0.35);
		background: red;
		cursor: pointer;
    outline: 0 !important;

		animation: pulse 4s infinite alternate;
		transition: background 0.4s, border 0.2s, margin 0.2s;
		}
		input[type=submit]:hover {
		background: hsla(220, 100%, 60%, 1);
		margin-top: -1px;

		animation: none;
	}
		button{
			-webkit-border-radius: 28;
			-moz-border-radius: 28;
			border-radius: 28px;
			font-family: Georgia;
			color: #ffffff;
			font-size: 12px;
			background-color:#2b2426;
			padding: 10px 20px 10px 20px;
			text-decoration: none;
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
	<div id="home-sec">


		<div class="container"  >
			<div class="row text-center">
				<div  class="col-md-12" >
					<span class="head-main" > Best Job Portal</span>
					<h2 class="head-sub-main">Find A Job Right Now</h2>
					<h3 class="head-last col-md-4 col-md-offset-4  col-sm-2 col-sm-offset-7">We Provide Best Jobs Based On Your Interest</h3>
				</div>
				<div class="col-md-12 col-sm-12">

					<form action="search1.php" method="POST">
						<input type="submit" name="submit" value="Search!">
					</form>
                <!-- <a  href="#job-search">
                 <i class="fa fa-crosshairs fa-5x go-marg"></i> 
             </a> -->
         </div>
     </div>
 </div>
</div>

<div style="background-color:#230a12">  <!--END HOME SECTION--> 
<br><br> 
	<?php
	//print_r($_SESSION)
	if(isset($_SESSION["username"]))
	// echo "user: Hi " . $_SESSION["fname"];
		$user_id = $_SESSION['current_username'];
	if (isset($_POST['submit']))
	{
		
		$db = mysql_connect("localhost",  "root", "") or die ('I cannot connect to the database because: ' . mysql_error());

		$mydb=mysql_select_db("findajob");

		$sql="SELECT * FROM `interests` WHERE username = '$user_id'" ;
		
		$result=mysql_query($sql);
		if($result)
		{
			while($row=mysql_fetch_array($result))
			{
				
				if(is_null($row))
					echo "No Result";
				else
				{
					$inter  =$row['interest'];
					$sql = "SELECT * from `$inter`";
					$result1 = mysql_query($sql);
					if($result1)
					{
						if(strcmp($inter,"IT")==0)
						{
							?>
							<center>
								<p style="font: sans-serif; font-size: 40px; color: white;"> IT Sector Jobs</p>
								<table style="width: 85%;">
									<tr>
										<th>Company </th>
										<th>Job Type </th>
										<th>Vacancies </th>
										<th>Qualification Req. </th>
										<th>Salary</th>
										<th>Min. Internship Req.</th>
										<th>Get IT</th>
									</tr>
								</table>
							</center>
							<?php
						}

						if(strcmp($inter,"Banking")==0)
						{
							?>
							<center>
								<p style="font: sans-serif; font-size: 40px; color: white;"> Banking Jobs</p>
								<table style="width:88%;">
									<tr>
										<th>Job Type</th>
										<th>Languages Req.</th>
										<th>Vacancies</th>
										<th>Qualification</th>
										<th>Salary</th>
										<th>City</th>
										<th>Get IT</th>
									</tr>
								</table>
							</center>
							<?php
						}
						if(strcmp($inter,"NDA")==0)
						{
							?>
							<center>
								<p style="font: sans-serif; font-size: 40px; color: white;"> NDA Jobs</p>
								<table style="width:88%;">
									<tr>
										<th>Job Type</th>
										<th>Minimum PAT</th>
										<th>Vacancies</th>
										<th>Qualification</th>
										<th>Salary</th>
										<th>Get IT</th>
									</tr>
								</table>
							</center>
							<?php
						}
						if(strcmp($inter,"School")==0)
						{
							?>
							<center>
								<p style="font: sans-serif; font-size: 40px; color: white;"> School Jobs</p>
								<table style="width:88%;">
									<tr>
										<th>Name</th>
										<th>qualification</th>
										<th>Job Type</th>
										<th>Vacancies</th>
										<th>Salary</th>
										<th>Get IT</th>
									</tr>
								</table>
							</center>
							<?php
						}
						if(strcmp($inter,"Hospital")==0)
						{
							?>
							<center>
								<p style="font: sans-serif; font-size: 40px; color: white;"> School Jobs</p>
								<table style="width:88%;">
									<tr>
										<th>Hospital Name</th>
										<th>Qualification</th>
										<th>Job Type</th>
										<th>Vacancies</th>
										<th>Salary</th>
										<th>Get IT</th>
									</tr>
								</table>
							</center>
							<?php
						}
						while($row1 = mysql_fetch_array($result1))
						{

							if(is_null($row1))
								echo "No Result";
							else
							{

								if(strcmp($inter, "School") == 0)
								{
									$snos=$row1['sno'];
									$name = $row1['name'];
									$job = $row1['job'];
									$vac = $row1['vacancies'];
									$qual = $row1['qualification'];
									$sal = $row1['salary'];
									?>
									
									<center>
										<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
											<div class="inner_box" style="margin: 15px">

												<table style="width: 100%;">
													<tr>
														<td><?php echo $name; ?></td>
														<td><?php echo $qual; ?></td>
														<td><?php echo $job; ?></td>
														<td><?php echo $vac; ?></td>
														<td><?php echo $sal; ?></td>
														<td><button onclick=" myFunc(<?php if($_SESSION['sno']=$snos)echo "1";?>,'school_app.php')">Apply</button></td>
													</tr>
												</table>
											</div>
										</div>
									</center>
									<?php
								}
								if(strcmp($inter, "Hospital") == 0)
								{
									
									$snoh=$row1['sno'];
									$name = $row1['name'];
									$job = $row1['job'];
									$vac = $row1['vacancies'];
									$qual = $row1['qualification'];
									$sal = $row1['salary'];
									?>
									<center>
										<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: white; font: sans-serif; font-size: 20px; ">
											<div class="inner_box" style="margin: 15px">

												<table style="width: 100%;">
													<tr>
														<td><?php echo $name; ?></td>
														<td><?php echo $qual; ?></td>
														<td><?php echo $job; ?></td>
														<td><?php echo $vac; ?></td>
														<td><?php echo $sal; ?></td>
														<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snoh)echo "1";?>,'hospital_app.php')">Apply</button></td>
													</tr>
												</table>
											</div>
										</div>
									</center>
									<?php
								}
								if(strcmp($inter, "Banking") == 0)
								{
									$snob=$row1['sno'];
									$add = $row1['address'];
									$job = $row1['jobtype'];
									$lang = $row1['languages'];
									$n = $row1['sno'];
									$s = "SELECT * FROM `po` WHERE sno = '$n'";
									$result2 = mysql_query($s);
									if($result2)
									{
										while($row3=mysql_fetch_array($result2))
										{
											if(is_null($row3))
												echo "No Result";
											else
											{

												$vac = $row3['vacancies'];
												$qual = $row3['qualification'];
												$sal = $row3['salary'];
											}
											?>

											<center>
												<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
													<div class="inner_box" style="margin: 15px">

														<table style="width: 100%;">
															<tr>
																<td><?php echo $job; ?></td>
																<td><?php echo $lang; ?></td>
																<td><?php echo $vac; ?></td>
																<td><?php echo $qual; ?></td>
																<td><?php echo $sal; ?></td>
																<td><?php echo $add; ?></td>
																<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snob)echo "1";?>,'po_app.php')">Apply</button></td>
															</tr>
														</table>
													</div>
												</div>
											</center>
											<?php	
										}
									}											
									$s = "SELECT * FROM `clerk` WHERE sno = '$n'";
									$result2 = mysql_query($s);
									if($result2)
									{
										while($row3=mysql_fetch_array($result2))
										{
											if(is_null($row3))
												echo "No Result";
											else
											{
												$vac = $row3['vacancies'];
												$qual = $row3['qualification'];
												$sal = $row3['salary'];
											}
											?>
											<center>
												<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
													<div class="inner_box" style="margin: 15px">

														<table style="width: 100%;">
															<tr>
																<td><?php echo $job; ?></td>
																<td><?php echo $lang; ?></td>
																<td><?php echo $vac; ?></td>
																<td><?php echo $qual; ?></td>
																<td><?php echo $sal; ?></td>
																<td><?php echo $add; ?></td>
																<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snob)echo "1";?>,'clerk_app.php')">Apply</button></td>
															</tr>
														</table>
													</div>
												</div>
											</center>
											<?php
										}
									}
								}
								if(strcmp($inter, "IT") == 0)
								{
									$snoi=$row1['sno'];
									$co = $row1['company'];
									$job = $row1['jobtype'];
									$vac = $row1['vacancies'];
									$n = $row1['sno'];
									$s = "SELECT * FROM `webdev` WHERE sno = '$n'";
									$result2 = mysql_query($s);
									if($result2)
									{
										while($row3=mysql_fetch_array($result2))
										{
											if(is_null($row3))
												echo "No Result";
											else
											{
												$intern = $row3['minprojects'];
												$qual = $row3['qualification'];
												$sal = $row3['salary'];
											}
											?>
											<center>
												<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
													<div class="inner_box" style="margin: 15px">

														<table style="width: 100%;">
															<tr>
																<td><?php echo $co; ?></td>
																<td>Web Dev</td>
																<td><?php echo $vac; ?></td>
																<td><?php echo $qual; ?></td>
																<td><?php echo $sal; ?></td>
																<td><?php echo $intern; ?></td>
																<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snoi)echo "1";?>,'webdev_app.php')">Apply</button></td>
															</tr>
														</table>
													</div>
												</div>
											</center>
											<?php	
										}
									}											
									$s = "SELECT * FROM `software` WHERE sno = '$n'";
									$result2 = mysql_query($s);
									if($result2)
									{
										while($row3=mysql_fetch_array($result2))
										{
											if(is_null($row3))
												echo "No Result";
											else
											{
												$intern = $row3['mininternship'];
												$qual = $row3['qualification'];
												$sal = $row3['salary'];
											}
											?>
											<center>
												<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
													<div class="inner_box" style="margin: 15px">

														<table style="width: 100%;">
															<tr>
																<td><?php echo $co; ?></td>
																<td>Software Dev</td>
																<td><?php echo $vac; ?></td>
																<td><?php echo $qual; ?></td>
																<td><?php echo $sal; ?></td>
																<td><?php echo $intern; ?></td>
																<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snoi)echo "1";?>,'software_app.php')">Apply</button></td>
															</tr>
														</table>
													</div>
												</div>
											</center>
											<?php	
										}
									}
								}	
								if(strcmp($inter, "NDA") == 0)
								{
									$snon=$row1['sno'];
									$job = $row1['jobtype'];
									$vac = $row1['vacancies'];
									$n = $row1['sno'];
									$s = "SELECT * FROM `airforce` WHERE sno = '$n'";
									$result2 = mysql_query($s);
									if($result2)
									{
										while($row3=mysql_fetch_array($result2))
										{
											if(is_null($row3))
												echo "No Result";
											else
											{
												$pat = $row3['pat'];
												$qual = $row3['qualification'];
												$sal = $row3['salary'];
											}
											?>
											<center>
												<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
													<div class="inner_box" style="margin: 15px">
														<table style="width: 100%;">
															<tr>
																<td><?php echo $job; ?></td>
																<td><?php echo $pat; ?></td>
																<td><?php echo $vac; ?></td>
																<td><?php echo $qual; ?></td>
																<td><?php echo $sal; ?></td>
																<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snon)echo "1";?>,'airforce_app.php')">Apply</button></td>
															</tr>
														</table>
													</div>
												</div>
											</center>
											<?php	
										}
									}
									$s = "SELECT * FROM `navy` WHERE sno = '$n'";
									$result2 = mysql_query($s);
									if($result2)
									{
										while($row3=mysql_fetch_array($result2))
										{
											if(is_null($row3))
												echo "No Result";
											else
											{
												$pat = $row3['pat'];
												$qual = $row3['qualification'];
												$sal = $row3['salary'];
											}
											?>
											<center>
												<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
													<div class="inner_box" style="margin: 15px">
														<table style="width: 100%;">
															<tr>
																<td><?php echo $job; ?></td>
																<td><?php echo $pat; ?></td>
																<td><?php echo $vac; ?></td>
																<td><?php echo $qual; ?></td>
																<td><?php echo $sal; ?></td>
																<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snon)echo "1";?>,'navy_app.php')">Apply</button></td>
															</tr>
														</table>
													</div>
												</div>
											</center>
											<?php	
										}
									}											
									$s = "SELECT * FROM `army` WHERE sno = '$n'";
									$result2 = mysql_query($s);
									if($result2)
									{
										while($row3=mysql_fetch_array($result2))
										{
											if(is_null($row3))
												echo "No Result";
											else
											{
												$pat = $row3['pat'];
												$qual = $row3['qualification'];
												$sal = $row3['salary'];
											}
											?>
											<center>
												<div class="outer_box" style="width: 1200px; height: 80px; margin: 10px; border: 3px solid grey;border-radius: 20px; color: black; font: sans-serif; font-size: 20px; ">
													<div class="inner_box" style="margin: 15px">
														<table style="width: 100%;">
															<tr>
																<td><?php echo $job; ?></td>
																<td><?php echo $pat; ?></td>
																<td><?php echo $vac; ?></td>
																<td><?php echo $qual; ?></td>
																<td><?php echo $sal; ?></td>
																<td><button onclick="myFunc(<?php if($_SESSION['sno']=$snon)echo "1";?>,'army_app.php')">Apply</button></td>
															</tr>
														</table>
													</div>
												</div>
											</center>
											<?php	
										}
									}	
								}
							}
						}
					}
				}
			}
		}	
	}
	?>	
</div> 
</body>
</html>

