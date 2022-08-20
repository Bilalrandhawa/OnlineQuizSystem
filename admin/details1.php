<?php
ob_start();
include ("config1.php");
session_start();
if (!isset($_SESSION["ad_Email"])) {
  header("Location:adminloginnew.php");
}
  
  if (isset($_GET['sub_id'])) {
$select_query = "SELECT * FROM quiz Where s_id='".$_GET['sub_id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["s_id"];

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
      <h1>QUIZ DETAILS</h1>
   <br><br><br>
  <table class="table table-striped table-bordered" align="center" >
    <?php 
$sql = "SELECT q_id,q_question,s_id,opt1,opt2,opt3,opt4,optiona,r_ans FROM quiz where s_id=$newid ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td>
  
  <label><?php echo $row["q_id"]. ": " .$row["q_question"]."<br>";"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
  <ol>
<li><?php echo $row["opt1"]; ?></li>
<li><?php echo $row["opt2"]; ?></li>
<li><?php echo $row["opt3"];?></li>
<li><?php echo $row["opt4"]; ?></li>
</ol>
  </label>
  <h3>USER_ANSWER:</h3><?php echo $row["optiona"]; ?>
  <h3 style="background-color: red">RIGHT_ANSWER:</h3><?php echo  $row["r_ans"]; ?>
  <?php
}
} 
?>
    </td>

  </tr>

   
  </table>
</div>
  </div>
<script src="javascripts/all.js"></script>
</script>
</body>
</html>