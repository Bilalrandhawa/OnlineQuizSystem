<?php
ob_start();
include ("config1.php");
$select_query = "SELECT * FROM user_profile Where user_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["user_id"];
   $first_wala=$row["first_name"];
   $last_wala=$row["last_name"];
   $father_jan=$row["father_name"];
   $user_age=$row["age"];
   $user_address=$row["address"];
   $user_picture=$row["profile_pic"];

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
<form action="" method="post" target="_self" enctype="multipart/form-data">
	<table>
		<tr>
			<td><input type="hidden" name="id" value="<?php echo $newid;  ?>"/></td>
		</tr>
		<tr>
			<td>FIRST NAME: <input type="text" name="name1" value=" <?php echo $first_wala; ?>"/>
			</td>
		</tr>
		<tr>
			<td>LAST NAME: <input type="text" name="name2" value=" <?php echo $last_wala; ?>"/>
			</td>
		</tr>
		<tr>
        <tr>
			<td>FATHER NAME: <input type="text" name="name3" value=" <?php echo $father_jan; ?>"/>
			</td>
		</tr>
        <tr>
			<td>Age: <input type="text" name="name4" value=" <?php echo $user_age; ?>"/>
			</td>
		</tr>
		<tr>
			<td>Address: <input type="text" name="name5" value=" <?php echo $user_address ?>"/>
			</td>
		</tr>
		<tr>
			<td>OLD IMAGE:<img src="img/<?php echo $user_picture;?>" width="100px"></td>
		</tr>
	    <tr>
			<td>CHANGE PICTURE: <input type="file" name="image" id="image"/td>
		</tr>

		<td><input type="submit" name="submit" value="UPDATE" /></td>
	    </tr>
	</table>

</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $fname1=$_POST['name1'];
	$lname2=$_POST['name2'];
	$father_name3=$_POST['name3'];
	$age_abc=$_POST['name4'];
    $address_pata=$_POST['name5'];
    $image=$_FILES['image']['name'];
    $target="img/".basename($image);
$update_data="UPDATE user_profile SET first_name= '$fname1',last_name= '$lname2',father_name= '$father_name3',age= '$age_abc',address= '$address_pata',profile_pic= '$image' Where user_id='$newid'";
if ($conn->query($update_data) === TRUE) {
move_uploaded_file($_FILES['image']['tmp_name'], $target);
unlink("img/$user_picture");
  echo "Record updated successfully";
  header('Location: index3.php');
exit();
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>