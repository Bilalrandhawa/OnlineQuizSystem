<?php
ob_start();
include ("config1.php");
session_start();
if (!isset($_SESSION["ad_Email"])) {
	header("Location:adminlogin.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Display Data</title>
</head>
<body>

	<table align="center" border="1px" style="width: 1200px; line-height:30px;">
		    <tr>
			<th colspan="11">Registration Form</th>
		    </tr>
		<tr><td colspan="10">
			
<?php
if($_SESSION["ad_Email"]) {
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h1 align="center"> Welcome to </h1><br> <?php  echo $_SESSION["ad_Email"]; ?>.<br> Click here to <a href="adminlogout.php" tite="Logout">Logout <br> 
<?php
$query = "SELECT * FROM `user_profile` " ;
$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
		?>
	<tr><td colspan="11" align="right"><a href="changepassword.php?id=<?php echo $row["user_id"]=$_SESSION["user_id"]; ?>">CHANGE PASSWORD</a></td></tr><br>
    <tr><td colspan="11" align="right"><a href="changeprofile.php?id=<?php echo $row["user_id"]=$_SESSION["user_id"]; ?>">CHANGE PROFILE</a></td></tr>
    <tr><td colspan="11" align="right"><a href="view.php?id=<?php echo $row["user_id"]=$_SESSION["user_id"]; ?>">START QUIZ</a></td></tr>
    <tr><td colspan="11" align="right"><a href="appliedquiz.php">APPLIED QUIZ</a></td></tr>
<?php
}
?></td></tr>
		<tr>
			<th>PROFILE_PIC</th>
			<th>ID</th>
            <th>FIRST NAME</th>
			<th>LAST NAME</th>
		    <th>FATHER NAME</th>
		    <th>AGE</th>
			<th>EDUCATION</th>
			<th>SEX</th>
			<th>ADDRESS</th>
			<th>CONTACT</th>
		</tr>
		<?php
		$query = "SELECT user_id,first_name,last_name,father_name,age,education,sex,address,profile_pic,contact FROM user_profile ";
$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result)){
		?>
		<tr>
          <td>	<img src="../img/<?php echo $row["profile_pic"];?>" width="70px"></td>
			 <td><?php echo $row["user_id"];?></td>  
			<td><?php echo $row["first_name"];?></td>
			<td><?php echo $row["last_name"];?></td>
			<td><?php echo $row["father_name"];?></td>
			<td><?php echo $row["age"];?></td>
			<td><?php echo $row["education"];?></td>
			<td><?php echo $row["sex"];?></td>
			<td><?php echo $row["address"];?></td>
			<td><?php echo $row["contact"];?></td>
			
		</tr>
		<?php
	}
		?>
	</table>
</body>
</html>