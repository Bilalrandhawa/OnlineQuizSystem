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

	<title>QUIZ Admin - Dashboard</title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	<link rel="stylesheet" href="stylesheets/all.css" type="text/css" />
	
	<!--[if gte IE 9]>
	<link rel="stylesheet" href="stylesheets/ie9.css" type="text/css" />
	<![endif]-->
	
	<!--[if gte IE 8]>
	<link rel="stylesheet" href="stylesheets/ie8.css" type="text/css" />
	<![endif]-->
	
</head>

<body>


<div id="wrapper">
	
	<div id="header">
		<h1><a href="dashboardnew.php">QUIZ Admin</a></h1>		
		
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
			<h1>QUIZ ADMIN Dashboard</h1>
		</div> <!-- #contentHeader -->	
		
		<div class="container">
			
			
			<div class="grid-17">
				
				<div class="widget widget-plain">
					
					<div class="widget-content">
				
						<h2 class="dashboard_title">
							Weekly Sales Stats
							<span>For the week of Jun 15 - Jun 22, 2011</span>
						</h2>				
						
						<div class="dashboard_report first activeState">
							<div class="pad">
								<span class="value">786</span> Completed Sales
							</div> <!-- .pad -->
						</div>
						
						<div class="dashboard_report defaultState">
							<div class="pad">
								<span class="value">347</span> Pending Sales
							</div> <!-- .pad -->
						</div>
						
						<div class="dashboard_report defaultState">
							<div class="pad">
								<span class="value">118</span> Returned Items
							</div> <!-- .pad -->
						</div>
						
						<div class="dashboard_report defaultState last">
							<div class="pad">
								<span class="value">45</span> Chargebacks
							</div> <!-- .pad -->
						</div>
						
					</div> <!-- .widget-content -->
					
				</div> <!-- .widget -->
				
				
				
			<div class="grid-7">
				
				
				
	<div id="topNav">
		 <ul>
		 	<li>
		 		<a href="#menuProfile" class="menu">John Doe</a>
		 		
		 		<div id="menuProfile" class="menu-container menu-dropdown">
					<div class="menu-content">
						<ul class="">
							<li><a href="javascript:;">Edit </a></li>
							<li><a href="javascript:;">Edit Settings</a></li>
							<li><a href="javascript:;">Suspend Account</a></li>
						</ul>
					</div>
				</div>
	 		</li>
		 	<ul>
		 	<li><a href="adminlogout.php">Logout</a></li>
		 </ul>
	</div> <!-- #topNav -->
	
<script src="javascripts/all.js"></script>

</body>
</html>