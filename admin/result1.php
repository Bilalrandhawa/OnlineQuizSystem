<?php
include("config1.php");
if (isset($_GET['sub_id'])) {
$select_query = "SELECT * FROM result Where s_id='".$_GET['sub_id']."'";
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
      <h1>RESULT CARD</h1>
   <br><br><br>
  <table class="table table-striped table-bordered">
<thead >
    <tr>
    <th>SERIAL NUMBER: </th>
    <th>USER ID: </th>
    <th>MARKS: </th>
    <th>SUBJECT ID: </th>
  </tr>
  </thead>
    <?php 
$query = "SELECT id,user_id,r_point,s_id FROM result Where s_id=$newid" ;
$count =1;
$result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_array($result)){ 
  ?>
  <tr>
    <td><?php echo  $count++; ?></td>
   <td><?php echo  $row["user_id"];?></td>
    <td><?php echo  $row["r_point"];?></td>
    <td><?php echo  $row["s_id"];?></td>
  </tr>
<?php
 }  
?>
  </table>
</div>
  </div>
<script src="javascripts/all.js"></script>
</body>
</html>
