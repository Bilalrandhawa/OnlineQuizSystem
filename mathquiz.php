<?php
ob_start();
include ("config1.php");
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");

}
if (isset($_GET['id'])) {
$select_query = "SELECT s_id,s_name FROM subject Where s_id='".$_GET['id']."'";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $newid=$row["s_id"];
   $newName=$row["s_name"];

  }
} 
else 
{
  echo "0 results";
}
}
$duplic=mysqli_query($conn,"Select * From result where s_id=$newid" );
if (mysqli_num_rows($duplic)>0) {
echo "<h1>QUIZ USER ALREADY ATTEMPTED</h1>"; 
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Quiztime</title>
</head>
<body>
<table align="center" border="1px" style="width: 1000px; line-height:30px;">
	<form action="" method="post" >
<tr><td><h2 align="center">QUIZ</h2></td></tr>
<?php 
$sql = "SELECT q_id,q_question,s_id,opt1,opt2,opt3,opt4 FROM quiz where s_id=$newid ";
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
  </label>
  <?php
}
} 
?>
<tr><td><input type="submit" name="submit" value="submit" onclick="teraFunction()"></td></tr>
</td>
</tr>
</form>
</tabel>
<script>
function teraFunction() {
  alert("The quiz was submitted");
}
</script>
</body>
</html>
<?php 
	 if (isset($_POST['submit'])) {
	 	$point=0;
    $apply_tareekh=date(" jS \of F Y ");
    $apply_query=mysqli_query($conn,"INSERT INTO subject (apply_date) VALUES ('".$apply_tareekh."')");
foreach($_POST as $key => $data)
{ 
      $abc=$data;
      $update_question="UPDATE quiz SET optiona='$abc' WHERE q_id='$key'";
      $res1=mysqli_query($conn,$update_question);
$sql="SELECT * FROM quiz where r_ans='$abc'";
	$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res)) {
	$point=$point+1; 
}
}

$store_point="INSERT INTO result (r_point,user_id,s_id) VALUES ('".$point."','".$_GET['id1']."','".$_GET['id']."')  ";
$data=mysqli_query($conn,$store_point); 
if ($data) 
{
echo "Data inserted into database";	
header('Location:result.php?id='.$_GET['id1']);
}
else {
  echo "Error: " . $data . "<br>" . $conn->error;
     }
} 	
	 	
	 
?>
