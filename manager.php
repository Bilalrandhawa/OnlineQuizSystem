<?php
include ("config1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
</head>
<body>

	<table align="center" border="1px" style="width: 500px; line-height:30px;">
		<tr>
			<th colspan="7">QUIZ Management System</th>
		</tr>
		<tr><td colspan="5" align="right"><a href="addmanager.php" target="_self"/> ADD</a></td>
		</tr>
		<tr>
			<td>ID </td>
			<td >Subject NAME</td>
			
			
		</tr>
	<?php
		$query = "SELECT q_id,q_subject FROM q_manager" ;
$count=1;
$result = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($result)){
		?>
		<tr>    
			<td><?php echo $count++;?></td>
			<td><?php echo $row["q_subject"];?></td>
			
			<td>
			<a href="delete.php?id=<?php echo $row["q_id"]; ?>" onclick='return checkdelete()'>DELETE|</a>
		    <a href="edit.php?id=<?php echo $row["q_id"] ?>">EDIT|</a>
	        <a href="nview.php?id=<?php echo $row["q_id"] ?>">VIEW(<?php 
$abx=$row["q_id"];
$count_record="SELECT COUNT(*) FROM quiz WHERE q_id=$abx;";
$result1 = mysqli_query($conn,$count_record);
$row1 = mysqli_fetch_array($result1);
echo $row1[0].")" ;

 ?></a>
	       </td>
			
		</tr>
		<?php
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

     
    