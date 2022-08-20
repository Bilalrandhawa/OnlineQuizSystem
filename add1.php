<?php

include ("config1.php");
$select_query = "SELECT s_id FROM subject Where s_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $store=$row["s_id"];
   echo $store;
   exit();
  }
} else {
  echo "0 results";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Questions</title>
</head>
<body>
<form action="" method="post" target="_self">
<table>
	<tr>
		<td>News Titel:<input type="text" name="tname" /></td>
	</tr>
	
		<td><input type="hidden" name="id1" value="<?php echo $_GET['id']; ?>" /><td>
	
	
	<tr>
		<td>News Description:<br><textarea id="review" name="review" rows="20" cols="50"/></textarea></td>
	</tr>
	<tr>
		<td><input type="submit" name="submit" value="ADD DATA"  /></td>
	</tr>
</table>
</form>
<br/>
<hr/>
</body>
</html>
<?php

error_reporting(1);
if(isset($_POST['submit'])){
$naam=addslashes($_POST['tname']);
$date=date("Y/m/d");
$Description=addslashes($_POST['review']);


$newid=$_POST['id1'];
$duplicate=mysqli_query($conn,"Select * From news where n_titel='$naam'");
if (mysqli_num_rows($duplicate)>0) {
  echo "its a duplicate recyord Enter a Unique record";
}
else {

$add_data="INSERT INTO news (n_titel,n_date,cid,n_discription) VALUES ('".$naam."','".$date."','".$store."','".$Description."')";

$data=mysqli_query($conn,$add_data); 
if ($data) 
{
echo "Data inserted into database";	
header('Location: nview.php?id='.$newid);

exit;
}
else {
  echo "Error: " . $data . "<br>" . $conn->error;
     }
 }
}
 
?>