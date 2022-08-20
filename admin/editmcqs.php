<?php
ob_start();
include ("config1.php");
$select_query = "SELECT q_question,opt1,opt2,opt3,opt4,r_ans FROM quiz Where q_id='".$_GET['Question_id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["q_id"];
   $old_QUESTION=$row["q_question"];
   $old_opt1=$row["opt1"];
   $old_opt2=$row["opt2"];
   $old_opt3=$row["opt3"];
   $old_opt4=$row["opt4"];
   $old_rightkey=$row["r_ans"]; 
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
			<h1>MCQ EDIT</h1>
		<br><br><br>
	<form action="" method="post" target="_self" enctype="multipart/form-data">
	<table>
		<!----<tr>
			<td><input type="hidden" name="id" value="<?php #echo $newid;  ?>"/></td>---->
		</tr>
		<tr>
			<td>QUESTION: <input type="text" name="name1" value=" <?php echo $old_QUESTION; ?>"/>
			</td>
		</tr>
		<tr>
			<td>OPTION 1: <input type="text" name="name2" value=" <?php echo $old_opt1; ?>"/>
			</td>
		</tr>
		<tr>
			<td>OPTION 2: <input type="text" name="name3" value=" <?php echo $old_opt2; ?>"/>
			</td>
		</tr>
		<tr>
			<td>OPTION 3: <input type="text" name="name4" value=" <?php echo $old_opt3; ?>"/>
			</td>
		</tr>
		<tr>
			<td>OPTION 4: <input type="text" name="name5" value=" <?php echo $old_opt4; ?>"/>
			</td>
		</tr>
		<tr>
			<td>RIGHT KEY: <input type="text" name="name6" value=" <?php echo $old_rightkey; ?>"/>
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="UPDATE" /></td>
	    </tr>
		
	</table>

</form>	
<?php
if(isset($_POST['submit'])){
    $new_QUESTION=$_POST['name1'];
	$new_opt1=$_POST['name2'];
	$new_opt2=$_POST['name3'];
	$new_opt3=$_POST['name4'];
	$new_opt4=$_POST['name5'];
	$new_rightkey=$_POST['name6'];
$update_data="UPDATE quiz SET q_question='$new_QUESTION',opt1='$new_opt1',opt2='$new_opt2',opt3='$new_opt3',opt4=$new_opt4',r_ans='$new_rightkey'";
if ($conn->query($update_data) === TRUE) {
  echo "Record updated successfully";
  header('Location: mcqsview.php');
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
