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
      <h1>ADD SUBJECTS</h1>
   <br><br><br>
	<form action=" " method="post" target="_self">
	<table>
		<tr>
			<td>subject NAME<input type="text" name="name" /></td>
		</tr>
		
		<tr>
		<td><input type="submit" name="submit" value="ADD Subject" /></td>
	    </tr>
	</table>
</form>
<?php
if(isset($_POST['submit'])){
$S_name=$_POST['name'];
$add_data="INSERT INTO subject (s_name) VALUES ('".$S_name."')";

$data=mysqli_query($conn,$add_data); 
if ($data) {
echo "Data inserted into database";	
header('Location: managequizes.php');
exit();
           }
else {
  echo "Error: " . $data . "<br>" . $conn->error;
     }
                          }
            
?>
</div>
	</div>
<script src="javascripts/all.js"></script>

</body>
</html>







