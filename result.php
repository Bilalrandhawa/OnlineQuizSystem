<?php
ob_start();
include("config1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>final</title>
</head>
<body>
	<table align="center" border="1px" style="width: 500px; line-height:30px;">
  <tr>
    <th colspan="7"><h2>Result Card</h2></th>
  </tr>
  <tr>
    <td>SERIAL NUMBER: </td>
    <td>USER ID: </td>
    <td>MARKS: </td>
  </tr>
<?php 
$query = "SELECT user_id,r_point FROM result" ;
$count =1;
$result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_array($result)){ 
  ?>
  <tr>
    <td><?php echo  $count++; ?></td>
    <td><?php echo $row["user_id"] ?></td>
    <td><?php echo  $row["r_point"];?></td>
    
  </tr>

<?php
 }  
?>

</body>
</html>