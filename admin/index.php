<?php
ob_start();
include ("config1.php");
session_start();
if (!isset($_SESSION["ad_Email"])) {
	header("Location:adminloginnew.php");
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<title>MANAGE QUIZES- Dashboard</title>
	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheets/all.css" type="text/css" />	
</head>
<body>
<div id="wrapper">
	<div id="header">
		<h1><a href="dashboard.html">CHANGE PROFILE </a></h1>		
		<a href="javascript:;" id="reveal-nav">
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
		</a>
	</div> <!-- #header -->
	<div id="sidebar">		
		<?php include ("linking.php"); ?>
		</div>
	
	<div id="content">
		<div id="contentHeader">

      <h1>HOME</h1>
   <br><br><br><br><br><br><br><br><br>
   <div class="container">
			
			<div class="grid-17">
				
				<div class="widget widget-plain">
					
					<div class="widget-content">
				
						<h2 class="dashboard_title">
							Weekly REPORT
							<span>For the week of Jun 15 - Jun 22, 2011</span>
						</h2>				
						</div>
						<div class="dashboard_report first activeState">
							<div class="pad">
<?php
								$records = mysqli_query($conn,"SELECT * FROM user_profile");
$rows = mysqli_num_rows($records);
?>
<?php
								$records1 = mysqli_query($conn,"SELECT * FROM subject");
$rows1 = mysqli_num_rows($records1);
?>
<?php
								$records2 = mysqli_query($conn,"SELECT * FROM quiz");
$rows2 = mysqli_num_rows($records2);
?>
<?php
								$records3 = mysqli_query($conn,"SELECT * FROM result");
$rows3 = mysqli_num_rows($records3);
?>


								<span class="value"><?php echo $rows; ?></span> TOTAL USERS
							</div> <!-- .pad -->
						</div>
						
						<div class="dashboard_report defaultState">
							<div class="pad">
								<span class="value"><?php echo $rows1; ?></span> TOTAL SUBJECTS
							</div> <!-- .pad -->
						</div>
						
						<div class="dashboard_report defaultState">
							<div class="pad">
								<span class="value"><?php echo $rows2; ?></span> TOTAL QUESTIONS
							</div> <!-- .pad -->
						</div>
						
						<div class="dashboard_report defaultState last">
							<div class="pad">
								<span class="value"><?php echo $rows3; ?></span> RESULTS AVALIBEL
							</div> <!-- .pad -->
						</div>
						</div> <!-- .widget-content -->
					
				</div> <!-- .widget -->	
<br><br><br><br><br><br><br><br><br>
	<table class="table table-striped table-bordered"  >
		    <tr>
			<th colspan="11"><h1>Registration Form</h1></th>
		    </tr>
		<tr><td colspan="10">
			
<?php
if($_SESSION["ad_Email"]) {
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<thead>
<h1 align="center"> Welcome to </h1><br> <?php  echo "<h1>".$_SESSION["ad_Email"]."</h1>";  ?>.<br> Click here to <a href="adminlogout.php" tite="Logout">Logout</a></thead> <br> 
<?php
$query = "SELECT * FROM `user_profile` " ;
$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
		?>
		<tr><td><a href="appliedquiz.php">APPLIED QUIZ</a></td></tr>
<?php
}
?></td></tr>
<thead>
		<tr>
			<th>PROFILE_PIC</th>
			<th>ID</th>
            <th>FIRST NAME</th>
			<th>LAST NAME</th>
		    <th>FATHER NAME</th>
		    <th>AGE</th>
			<th>EDUCATION</th>
			<th>SEX</th>
			<th>ADDRESS</th>
			<th>CONTACT</th>
		</tr>
	</thead>
		<?php
		$query = "SELECT user_id,first_name,last_name,father_name,age,education,sex,address,profile_pic,contact FROM user_profile ";
$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result)){
		
		?>
		<tr>
          <td>	<img src="../img/<?php echo $row["profile_pic"];?>" width="70px"></td>
			 <td><?php echo $row["user_id"];?></td>  
			<td><?php echo $row["first_name"];?></td>
			<td><?php echo $row["last_name"];?></td>
			<td><?php echo $row["father_name"];?></td>
			<td><?php echo $row["age"];?></td>
			<td><?php echo $row["education"];?></td>
			<td><?php echo $row["sex"];?></td>
			<td><?php echo $row["address"];?></td>
			<td><?php echo $row["contact"];?></td>
			
		</tr>
		<?php
	}
	

		?>
	</table>

</div>	

	

<script src="javascripts/all.js"></script>

</body>
</html>

