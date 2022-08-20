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
  var x = document.forms["myForm"]["adminemail"].value;
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
            <input type="text" name="adminemail"/><br><br>
            PASSWORD:<input type="password" name="password"/><br><br>
            <input type="submit" name="submit" value="LOGIN" />
        </form>

        
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