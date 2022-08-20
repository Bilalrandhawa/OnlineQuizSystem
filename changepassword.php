<?php
ob_start();
include ("config1.php");
if (isset($_GET['id'])) {

$select_query = "SELECT * FROM user_profile Where user_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
   $newid=$row["user_id"];
  }
} else {
  echo "0 results";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>change Password</title>
</head>
<body>
<form method="post" target="_self">
<table>
	<tr>
	<td><input type="hidden" name="id" value="<?php echo $newid;  ?>"/></td>
	</tr>
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
</body>
</html>
<?php
session_start ();
$user=$_SESSION["email"];
if(isset($_POST['submit'])){
$old_password=$_POST['oldpass'];
$new_password=$_POST['newpass'];
$confirm_password=$_POST['confirmpass'];


    $sql=mysqli_query($conn,"SELECT password from user_profile where email='$user'");
   while($row = mysqli_fetch_array($sql)){
    $old_passworddb=$row["password"];
}
    if ($old_password==$old_passworddb) {
    	if ($new_password==$confirm_password) {
    		$update_data="UPDATE user_profile SET password= '$new_password' Where email='$user'AND password='$old_password'";
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