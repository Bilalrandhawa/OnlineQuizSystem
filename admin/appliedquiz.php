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
      <h1>APPLIED SUBJECTS LIST</h1>
   <br><br><br>
  <table class="table table-striped table-bordered" align="center" >
    <tr><td colspan="10">

</td></tr>
<thead>
   <tr>
    <td colspan="1"><h2 >SERIAL NUMBER:</h2> </td>
    <td colspan="1"><h2 >Applied Subject List:</h2> </td>
    <td colspan="1"><h2 >Applied DATE:</h2> </td>
    <td colspan="1"><h2 >USER NAME:</h2> </td>
  </tr>
  </thead>
   <?php
$ab=1;
$query=mysqli_query($conn,"SELECT email FROM user_profile");
while($row = mysqli_fetch_array($query)){
  $username=$row["email"];
}
$showdata=mysqli_query($conn,"SELECT subject.s_name,subject.s_id,subject.apply_date FROM subject INNER JOIN result WHERE subject.s_id=result.s_id");
while($row = mysqli_fetch_array($showdata)){
  ?>
  <tr>
    <td><?php echo $ab++; ?></td>
    <td><?php echo $row["s_name"]; ?></td>
    <td><?php echo $row["apply_date"]; ?></td>
    <td><?php echo $username; ?></td>
    <td><a  href="details1.php?sub_id=<?php echo $row["s_id"]; ?>">DEATAILS</a></td>
     <td><a  href="mail.php?sub_id=<?php echo $row["s_id"]; ?>" onclick='return checkmail()'>EMAIL RESULT</a></td>
  </tr>

  <?php
}

?>
  </table>
</div>
  </div>
<script src="javascripts/all.js"></script>
</script>
<script src="javascripts/all.js"></script>
<script type="text/javascript">
function checkmail() {
  return confirm('Are you sure you want to sent mail?');
}
</script>
</body>
</html>













