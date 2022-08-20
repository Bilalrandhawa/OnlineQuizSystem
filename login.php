<?php
ob_start();
include ("config1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<script>
function validateForm() {
  var x = document.forms["myForm"]["useremail"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
}
</script>
</head>
<body>

		<form  name="myForm" align="center" method="post" onsubmit="return validateForm()">
			<h2>LOGIN</h2>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; E-Mail:
			<input type="text" name="useremail"/><br><br>
			PASSWORD:<input type="password" name="password"/><br><br>
			<input type="submit" name="submit" value="LOGIN" /><br><br>
			FOR SIGN UP: <a href="user.php">SIGN UP</a>
		</form>

		
</script>
</body>
</html>
<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $result = mysqli_query($conn,"SELECT * FROM user_profile WHERE
	email='" . $_POST["useremail"] . "' and password = '". $_POST["password"]."'");
        $row=mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["user_id"]=$row['user_id'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["password"] = $row['password'];
        } else {
         $message = "Invalid Username or Password!";
          echo $message;
        }
    }
    if(isset($_SESSION["email"])) {
    header("Location:index3.php");
    }
?>