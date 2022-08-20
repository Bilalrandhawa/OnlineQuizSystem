<?php
ob_start();
include ("config1.php");
$select_query = "SELECT s_id,s_name FROM subject Where s_id='".$_GET['subject_id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["s_id"];
   $newName=$row["s_name"]; 
  }
} else {
  echo "0 results";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post" target="_self">
	<table>
		<tr>
			<td><input type="hidden" name="id" value="<?php echo $newid;  ?>"/></td>
		</tr>
		
		<tr>
			<td>NAME: <input type="text" name="name" value=" <?php echo $newName; ?>"/></td>
		</tr>
		<tr>
		<td><input type="submit" name="submit" value="UPDATE" /></td>
	</tr>
	</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$naam=$_POST['name'];
$id=$_POST['id'];
$update_data="UPDATE subject SET s_name='$naam' Where s_id='$newid'";
mysqli_query($conn,$update_data); 
if ($conn->query($update_data) === TRUE) {
  echo "Record updated successfully";
  header('Location: managequizes.php');
exit();
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>