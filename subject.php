<?php
ob_start();
include ("config1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add subject</title>
</head>
<body>
<form action=" " method="post" target="_self">
	<table>
		
		<tr>
			<td>subject ID<input type="text" name="id" /></td>
		</tr>
		<tr>
			<td>subject NAME<input type="text" name="name" /></td>
		</tr>
		
		<tr>
		<td><input type="submit" name="submit" value="ADD Subject" /></td>
	    </tr>
	</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$S_id=$_POST['id'];
$S_name=$_POST['name'];
$add_data="INSERT INTO subject (s_id,s_name) VALUES ('".$S_id."','".$S_name."')";

$data=mysqli_query($conn,$add_data); 
if ($data) {
echo "Data inserted into database";	
header('Location: view.php');
exit();
           }
else {
  echo "Error: " . $data . "<br>" . $conn->error;
     }
                          }
            
?>