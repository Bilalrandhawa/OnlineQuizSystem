<?php
include ("config1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add QUIZ</title>
</head>
<body>
<form action=" " method="post" target="_self">
	<table>
		<tr>
			<td>QUESTION ID<input type="text" name="id" /></td>
		</tr>
		<tr>
			<td>Question :<input type="text" name="questionn" /></td>
			<td><input type="radio" name="answer" value="A" />A</td>
			<td><input type="radio" name="answer" value="B" />B</td>
			<td><input type="radio" name="answer" value="C" />C</td>
			<td><input type="radio" name="answer" value="D" />D</td>
		</tr>
		<tr>
			<td>SUBJECT NAME:<input type="text" name="name" /></td>
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
$subject_name=$_POST['name'];
$res=$_POST['answer'];
$add_data="INSERT INTO quiz (q_id,q_subject,questions) VALUES ('".$id."','".$subject_name."','".$res."')";

$data=mysqli_query($conn,$add_data); 
if ($data) {
echo "Data inserted into database";	
           }
else {
  echo "Error: " . $data . "<br>" . $conn->error;
     }
                          }
            
?>
</body>
</html>