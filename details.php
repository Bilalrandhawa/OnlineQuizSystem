<?php
include ("config1.php");
if (isset($_GET['subject_id'])) {
$select_query = "SELECT * FROM quiz Where s_id='".$_GET['subject_id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["s_id"];

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
	<title>final display</title>
</head>
<body>
<table align="center" border="1px" style="width: 1200px; line-height:30px;">
	<tr><td><h2 align="center" >QUIZ</h2></td></tr>
<?php 
$sql = "SELECT q_id,q_question,s_id,opt1,opt2,opt3,opt4,optiona,r_ans FROM quiz where s_id=$newid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td>
	
  <label><?php echo $row["q_id"]. ": " .$row["q_question"]."<br>";"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
<input type="radio" name="<?php echo $row["q_id"];?>" value="<?php echo $row["opt1"];?>"><?php echo $row["opt1"]; ?>
<input type="radio" name="<?php echo $row["q_id"];?>" value="<?php echo $row["opt2"];?>"><?php echo $row["opt2"]; ?>
<input type="radio" name="<?php echo $row["q_id"];?>" value="<?php echo $row["opt3"];?>"><?php echo $row["opt3"];?>
<input type="radio" name="<?php echo $row["q_id"];?>" value="<?php echo $row["opt4"]; ?>"><?php echo $row["opt4"]; ?>
  </label><br>
  <h3>USER_ANSWER:</h3><?php echo $row["optiona"]; ?>
  <h3 style="background-color: green">RIGHT_ANSWER:</h3><?php echo  $row["r_ans"]; ?>
  <?php
}
} 
?>
		</td>

	</tr>
</table>
</body>
</html>

