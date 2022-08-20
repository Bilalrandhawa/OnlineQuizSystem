<?php
ob_start();
include ("config1.php");
session_start ();
$user_name=$_SESSION["email"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Visited quiz</title>
</head>
<body>
<table align="center" border="1px" style="width: 700px; line-height:30px;">
	<tr>
		<td colspan="1"><h2 >SERIAL NUMBER:</h2> </td>
    <td colspan="1"><h2 >Applied Subject List:</h2> </td>
		<td colspan="1"><h2 >USER NAME:</h2> </td>
		
	</tr>

<?php
$ab=1;
$showdata=mysqli_query($conn,"SELECT subject.s_name,subject.s_id FROM subject INNER JOIN result WHERE subject.s_id=result.s_id");
while($row = mysqli_fetch_array($showdata)){
  ?>
  <tr>
  	<td><?php echo $ab++; ?></td>
  	<td><?php echo $row["s_name"]; ?></td>
  	<td><?php echo $user_name; ?></td>
  	<td><a  href="details.php?subject_id=<?php echo $row["s_id"]; ?>">DEATAILS</a></td>
  </tr>

  <?php
}
?>
</table>
</body>
</html>