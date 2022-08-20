<?php
ob_start();
include("config1.php");

if (isset($_GET['id'])) {
	
$select_query = "SELECT q_id,q_subject FROM q_manager Where q_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["q_id"];
   $newsubject=$row["q_subject"]; 
  }
} 
else {
  echo "0 results";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>QUIZ</title>
</head>
<body>
<table align="center" border="1px" style="width: 700px; line-height:30px;">
	
	<tr>
		<th colspan="10"><h2>QUIZ-BOX</h2></th>
	</tr>

	<th colspan="6" align="right"><a href="addquiz.php?id=<?php echo  $newid; ?>" target="_self"> Add</a>
	</th>
</tr>
<tr>
        <th>ID: </th>
		<th>QUIZ NUMBER: </th>
		<th>SUBJECT</th>
		<th>QUESTION ID: </th>
		<th>QUESTION : </th>
		<th>KEYS: </th>
		<?php
$query = "SELECT id,q_id,questions,question_id,q_keys FROM quiz ";
$count =1;
$result = mysqli_query($conn,$query);
if ($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)){ 
	?>
	<tr>
	
		<td><?php echo  $count++; ?></td>
		<td><?php if (!empty($newid)) {
		echo  "$newid";
		} ?></td>
		<td><?php if (!empty($newid)) {
		echo  "$newsubject";
		} ?></td>
		<td><?php echo  $row["question_id"]; ?></td>
		
		<td><?php echo  $row["questions"]; ?></td>
		<td><?php echo  $row["q_keys"]; ?></td>
	<td>
		<a href="delete1.php?id=<?php echo  $row["id"]; ?>&id1=<?php echo  $newid; ?>" target="_self" onclick='return checkdelete()'> Delete</a>   |    
		<a href="edit1.php?id=<?php echo  $row["id"]; ?>&id1=<?php echo  $newid; ?>" target="_self"> Edit</a> |

	</td>
</tr>
	
	<?php
}

} 

?>

</table>

<script type="text/javascript">
function checkdelete() {
	return confirm('Are you sure you want to delete');
}
</script>

</body>
</html>
