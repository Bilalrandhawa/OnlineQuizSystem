<?php
include("config1.php");
if (isset($_GET['id'])) {
$select_query = "SELECT user_id,first_name FROM user_profile Where user_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["user_id"];
   $newname=$row["first_name"];
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
	<title></title>
</head>
<body>
	<table align="center" border="1px" style="width: 500px; line-height:30px;">
  <tr>
    <th colspan="7"><h2>Result Card</h2></th>
  </tr>
  <tr>
    <td>SERIAL NUMBER: </td>
    <td>USER ID: </td>
    <td>USER NAME: </td>
    <td>MARKS: </td>
  </tr>
<?php 
$query = "SELECT * FROM result where user_id=$newid" ;
$count =1;
$result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_array($result)){ 
  ?>
  <tr>
    <td><?php echo  $count++; ?></td>
    <td><?php if (!empty($newid)) {
    echo  "$newid";
    } ?></td>
    <td><?php if (!empty($newid)) {
    echo  "$newname";
    } ?></td>
    <td><?php echo  $row["r_point"];?></td>
    
  </tr>

<?php
 }  
?>

</body>
</html>