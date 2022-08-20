<?php
ob_start();
include ("config1.php");
$select_query = "SELECT q_id,q_subject FROM q_manager Where q_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["q_id"];
   $newsubject=$row["q_subject"];
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
			<td>Subject Name: <input type="text" name="name1" value=" <?php echo $newsubject; ?>"/></td>
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
$sub_name=$_POST['name1'];
$id=$_POST['id'];

$update_data="UPDATE q_manager SET q_subject='$sub_name' Where q_id='$newid'" ;

if ($conn->query($update_data) === TRUE) {
  echo "Record updated successfully";
  header('Location: manager.php');
exit;
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>