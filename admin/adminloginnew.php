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

	<title>QUIZ Admin - Login</title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	
	<link rel="stylesheet" href="stylesheets/reset.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/text.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/buttons.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/theme-default.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="stylesheets/login.css" type="text/css" media="screen" title="no title" />
</head>

<body>

<div id="login">
	<h1>Dashboard</h1>
	<div id="login_panel">
		<form  name="myForm" align="center" onsubmit="return validateForm()" method="post" accept-charset="utf-8">		
			<div class="login_fields">
				<div class="field">
					<label for="adminemail">Email</label>
					<input type="text" name="adminemail" value="" id="adminemail" tabindex="1" placeholder="admin@example.com" />		
				</div>
				
				<div class="field">
					<label for="password">Password</label>
					<input type="password" name="password" value="" id="password" tabindex="2" placeholder="password" />			
				</div>
			</div> <!-- .login_fields -->
			
			<div class="login_actions">
				<button type="submit" class="btn btn-primary" tabindex="3">Login</button>
			</div>
		</form>
	</div> <!-- #login_panel -->		
</div> <!-- #login -->

<script src="javascripts/all.js">
	<script>
function validateForm() {
  var x = document.forms["myForm"]["adminemail"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
}
</script>


</body>
</html>
<?php
session_start();
    $message="";
    if(count($_POST)>0) {
        $result = mysqli_query($conn,"SELECT * FROM admin WHERE
  ad_Email='" . $_POST["adminemail"] . "' and ad_PASSWORD = '". $_POST["password"]."'");
       
        $row=mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"]=$row['id'];
        $_SESSION["ad_Email"] = $row['ad_Email'];
        $_SESSION["ad_PASSWORD"] = $row['ad_PASSWORD'];
        } else {
         $message = "Invalid Username or Password!";
          echo $message;
        }
    }
    if(isset($_SESSION["ad_Email"])) {
    header("Location:index.php");
    }
?>