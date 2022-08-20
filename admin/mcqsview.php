<?php
ob_start();
include ("config1.php");
if (isset($_GET['subject_id'])) {
$select_query = "SELECT s_id,s_name FROM subject Where s_id='".$_GET['subject_id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["s_id"];
   $newName=$row["s_name"];
  }
} 
else 
{
  echo "0 results";
}
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
      <h1>ADD MCQS</h1>
   <br><br><br>
   
	<table class="table table-striped table-bordered" align="center">
	<form action="" method="post" >
<tr><td><h2 align="center">QUIZ</h2></td>
</tr>
<tr><td align="right"><a href="addmcqs.php?subject_id=<?php echo $newid ?>">ADD</a></td></tr>
<?php 
$sql = "SELECT q_id,q_question,s_id,opt1,opt2,opt3,opt4 FROM quiz where s_id=$newid ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td>
	
  <label><tr><td><?php echo $row["q_id"]. ": " .$row["q_question"];"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="deletemcqs.php?subject_id=<?php echo $newid ?> " onclick='return checkdelete()' >DELETE</a> |<a href="editmcqs.php?Question_id=<?php echo $row["q_id"]; ?>">EDIT</a>
  <ol>
<li><?php echo $row["opt1"]; ?></li>
<li><?php echo $row["opt2"]; ?></li>
<li><?php echo $row["opt3"];?></li>
<li><?php echo $row["opt4"]; ?></li>
</ol>
</td>
</tr>
  </label>
  <?php
}
} 
?>
</td>
</tr>
</form>
</tabel>
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




















<!DOCTYPE html>
<html>
<head>
	
	<title>Quiztime</title>
</head>
<body>

</body>
</html>