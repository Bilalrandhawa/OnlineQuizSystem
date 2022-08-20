<?php
ob_start();
include ("config1.php");
$select_query = "SELECT ad_Name,ad_Email FROM admin";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $old_name=$row["ad_Name"];
   $old_email=$row["ad_Email"];
  }
} else {
  echo "0 results";
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
			<h1>PROFILE SETTINGS</h1>
		<br><br><br>
	<form action="" method="post" target="_self" enctype="multipart/form-data">
	<table>
		<!----<tr>
			<td><input type="hidden" name="id" value="<?php #echo $newid;  ?>"/></td>---->
		</tr>
		<tr>
			<td>NAME: <input type="text" name="name1" value=" <?php echo $old_name; ?>"/>
			</td>
		</tr>
		<tr>
			<td>EMAIL NAME: <input type="text" name="name2" value=" <?php echo $old_email; ?>"/>
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="UPDATE" /></td>
	    </tr>
		
	</table>

</form>	
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name1'];
	$EMAIL_name2=$_POST['name2'];
$update_data="UPDATE admin SET ad_Name= '$name',ad_Email= '$EMAIL_name2'";
if ($conn->query($update_data) === TRUE) {
  echo "Record updated successfully";
  header('Location: dashboardnew.php');
exit();
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>	
</div>
	</div>
		
<script src="javascripts/all.js"></script>

</body>
</html>
