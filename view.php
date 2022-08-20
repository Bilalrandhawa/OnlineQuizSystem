<?php
ob_start();
include ("config1.php");
if (isset($_GET['id'])) {
$select_query = "SELECT user_id FROM user_profile Where user_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["user_id"];

  }
} 
else 
{
  echo "0 results";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>view page</title>
</head>
<body>
<table align="center" border="1px" style="width: 300px; line-height:30px;">
	<tr>
		<th colspan="7"><h2>Subjects</h2></th>
	</tr>
	<tr>
		<td>ID: </td>
		<td>Subject Name: </td>
	</tr>
<?php 
$query = "SELECT * FROM subject" ;
$count =1;
$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result)){ 
	?>
	<tr>
		<td><?php echo  $count++; ?></td>
		<td><?php echo  $row["s_name"];?></td>
	<td><a href="mathquiz.php?id=<?php echo  $row["s_id"]; ?>&id1=<?php echo  $newid; ?>" target="_self" > Start QUIZ</a></td>
	</tr>

<?php 
}  
?>
</table>
</body>
</html>