<?php

include ("config1.php");
if (isset($_GET['id'])) {


$select_query = "SELECT s_id FROM subject Where s_id='".$_GET['id']."'";
$result = $conn->query($select_query);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
   $store=$row["s_id"];
  }
} else {
  echo "0 results";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add data</title>
</head>
<body>
<form action=" " method="post" target="_self">
	<table>
		<tr>
	<td><input type="hidden"name="id1"value="<?php echo $_GET['id'];?>"></td>
		</tr>
		<tr>
			<td> ID<input type="text" name="id" /></td>
		</tr>
		<tr>
			<td>Questions :<input type="text" name="questionn" /></td>
			
		</tr>
		<tr>
		<td><input type="submit" name="submit" value="ADD" /></td>
	    </tr>
	</table>
</form>
</body>
</html>

<?php

if(isset($_POST['submit'])){
$newid=$_POST['id1'];
$Question_id=$_POST['id'];
$Question=$_POST['questionn'];

$add_data="INSERT INTO quiz (q_id,q_question,s_id) VALUES ('".$Question_id."','".$Question."','".$store."')";

$data=mysqli_query($conn,$add_data); 
if ($data) {
echo "Data inserted into database";
header('Location:view.php?id='.$newid);	
exit();
           }
else {
  echo "Error: " . $data . "<br>" . $conn->error;
     }
                          }
            
?>
