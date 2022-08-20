<?php
ob_start();
include ("config1.php");

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
    <h1><a href="dashboard.html">QUIZ Admin</a></h1>    
    
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
      <h1>CHANGE PASSWORD</h1>
   <br><br><br>
  <form method="post" target="_self">
<table>
    <tr>
  <td>OLD Password: <input type="text" name="oldpass"/><br>
  </td>
    </tr>
    <tr>
  <td>NEW Password: <input type="text" name="newpass"/><br>
  </td>
    </tr>
    <tr>
  <td>CONFIRM Password: <input type="text" name="confirmpass"/><br>
  </td>
    </tr>
  <tr>
  <td><input type="submit" name="submit" value="UPDATE" /></td>
  </tr>
  </table>

</form> 
<?php

session_start ();
$admin_pass=$_SESSION["ad_Email"];
if(isset($_POST['submit'])){
 
$old_password=$_POST['oldpass'];
$new_password=$_POST['newpass'];
$confirm_password=$_POST['confirmpass'];


    $sql=mysqli_query($conn,"SELECT ad_PASSWORD from admin where ad_Email='$admin_pass'");
   while($row = mysqli_fetch_array($sql)){
    $old_passworddb=$row["ad_PASSWORD"];
}
    if ($old_password==$old_passworddb) {
      if ($new_password==$confirm_password) {
        $update_data="UPDATE admin SET ad_PASSWORD= '$new_password' Where ad_Email='$admin_pass'AND ad_PASSWORD='$old_password'";
        $result = $conn->query($update_data);
      echo "SUCCESSfully changed";
      }else
      {
        echo "NEW PASSWORD DOES NOT CHANGED!";
      }
      
    }else
    {
      echo "OLD Password does not match";
    }

}


?>  
</div>
    </div> 
<script src="javascripts/all.js"></script>

</body>
</html>
