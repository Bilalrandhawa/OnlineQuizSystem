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
		<h1><a href="dashboard.html">MANAGE SUBJECTS </a></h1>		
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
      <h1>manage quizes</h1>
   <br><br><br>
	<table class="table table-striped table-bordered" align="center" >
		<tr><td colspan="10">

</td></tr>
<thead>
		<tr>
			<th>ID</th>
            <th>Subject NAME</th>
            <td colspan="2" align="center"><a href="addsubject.php" target="_self" > ADD</a></td>
	</tr>
		</tr>
	</thead>
		<?php
		$count=1;
		$query = "SELECT * FROM subject ";
$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result)){
		?>
		<tr>
			<td><?php echo $count++;?></td>  
			<td><?php echo $row["s_name"];?></td>
			 <td><a href="deletesubject.php?subject_id=<?php echo $row["s_id"]; ?>" target="_self" onclick='return checkdelete()' > DELETE </a></td>
	    <td><a href="updatesubject.php?subject_id=<?php echo $row["s_id"]; ?>" target="_self" > EDIT </a></td>
	    <td><a href="mcqsview.php?subject_id=<?php echo $row["s_id"]; ?>" target="_self" > VIEW </a></td>	
		</tr>
		<?php
	}
		?>
	</table>
</div>
	</div>
<script src="javascripts/all.js"></script>
<script type="text/javascript">
function checkdelete() {
	return confirm('Are you sure you want to delete');
}
</script>
</body>
</html>
