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
	<form action=" " method="post" target="_self">
	<table>
		
			<tr><td>QUESTION<input type="text" name="sawal" /></td></tr>
			<tr><td>OPTION:1<input type="text" name="p1" /></td></tr>
			<tr><td>OPTION:2<input type="text" name="p2" /></td></tr>
			<tr><td>OPTION:3<input type="text" name="p3" /></td></tr>
			<tr><td>OPTION:4<input type="text" name="p4" /></td></tr>
			<tr><td>RIGHT ANSWER<input type="text" name="rightkey" /></td></tr>
		    <tr>
		<td><input type="submit" name="submit" value="ADD" /></td>
	    </tr>
	</table>
</form>

<?php 
if(isset($_POST['submit'])){
$QUESTION_sub=$_POST['sawal'];
$QUESTION_op1=$_POST['p1'];
$QUESTION_op2=$_POST['p2'];
$QUESTION_op3=$_POST['p3'];
$QUESTION_op4=$_POST['p4'];
$R_answer=$_POST['rightkey'];
$datab="&nbsp;";

$add_data="INSERT INTO quiz (q_question,s_id,opt1,opt2,opt3,opt4,r_ans,optiona) VALUES ('".$QUESTION_sub."','".$newid."','".$QUESTION_op1."','".$QUESTION_op2."','".$QUESTION_op3."','".$QUESTION_op4."','".$R_answer."','".$datab."')";
$data=mysqli_query($conn,$add_data); 
if ($data) {
echo "Data inserted into database";	
header('Location:mcqsview.php?subject_id='.$newid);
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

