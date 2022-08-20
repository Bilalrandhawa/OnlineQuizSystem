<?php
ob_start();
include ("config1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
    <h2>REGISTRATION FORM</h2>
	<form action="" method="post" enctype="multipart/form-data">
	<label>First Name:</label>
	<input type="text" name="fname"/><br>
	<label>Last Name :</label> 
	<input type="text" name="lname"/><br>
	<label>Father Name :</label>
	<input type="text" name="fathername"/><br>
	<label>AGE :</label>
	<input type="text" name="age"/><br>
	<label for="education">Education :</label>
	<select name="education" id="education">
    <option value="Primary" >PRIMARY</option>
    <option value="Middel" >MIDDEL</option>
    <optgroup label="Matric">
    <option value="Science">Science</option>
    <option value="Arts">Arts</option>
    </optgroup>
    <optgroup label="Inter">
    <option value="FSC">FSC</option>
    <option value="ICS">ICS</option>
    <option value="I.COM">I.COM</option>
    <option value="FA">FA</option>	
    </optgroup>
    </optgroup>
    <optgroup label="Bachlors">
    <option value="BS(SE)">BS(SE)</option>
    <option value="BS(CS)">BS(CS)</option>
    <option value="BS(AI)">BS(AI)</option>
    <option value="BS(IR)">BS(IR)</option>	
    </optgroup>
    <optgroup label="Master">
    <option value="MS(SE)">MS(SE)</option>
    <option value="MS(CS)">MS(CS)</option>
    <option value="MS(AI)">MS(AI)</option>
    <option value="MS(IR)">MS(IR)</option>	
    </optgroup>
  </select><br>
	<label>SEX :</label>
	<input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other<br>
	<label>Address :</label>
	<input type="text" name="address"/><br>
	<label>Picture :</label>
	<input type="file" name="image"/><br>
	<label>Email:</label>
	<input type="text" name="mail"/><br>
	<label>Password:</label>
	<input type="text" name="password"/><br>
	<label>Contact :</label>
	<input type="text" name="number"/><br>
	<input type="submit" name="submit" value="Add Data">
	</form>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
	$user_first_name=$_POST['fname'];
	$user_last_name=$_POST['lname'];
	$user_father_name=$_POST['fathername'];
	$user_age=$_POST['age'];
	$user_education=$_POST['education'];
	$user_gender=$_POST['gender'];
	$user_address=$_POST['address'];
	$mail_id=$_POST['mail'];
	$user_password=$_POST['password'];
	$mobile_number=$_POST['number'];
    $image=$_FILES['image']['name'];
    if (empty($image)) {
   $var1 = "noimage.png";
$add_data="INSERT INTO user_profile (first_name,last_name,father_name,age,education,sex,address,profile_pic,email,password,contact) VALUES ('".$user_first_name."','".$user_last_name."','".$user_father_name."','".$user_age."','".$user_education."','".$user_gender."','".$user_address."','".$var1."','".$mail_id."','".$user_password."','".$mobile_number."')";
	$conn->query($add_data);
       header('Location: index3.php');
	      
    }
    else{
	$target="img/".basename($image);
	$add_data="INSERT INTO user_profile (first_name,last_name,father_name,age,education,sex,address,profile_pic,email,password,contact) VALUES ('".$user_first_name."','".$user_last_name."','".$user_father_name."','".$user_age."','".$user_education."','".$user_gender."','".$user_address."','".$image."','".$mail_id."','".$user_password."','".$mobile_number."')";
	if ($conn->query($add_data) === TRUE) {
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	echo "Image Uploaded Successfully.........."."<br>";
	header('Location: index3.php');
	exit();
}else
	{
		echo "Image uploading Failed Try Again";
    }
}else {
  echo "Error: " . $add_data. "<br>" . $conn->error;
}

$conn->close();
}
          }                
?>