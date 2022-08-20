<?php
ob_start();
include ("config1.php");
$id=$_GET['subject_id'];
$delete_data="DELETE FROM quiz WHERE s_id='$id' ";
mysqli_query($conn,$delete_data); 
if ($conn->query($delete_data) === TRUE) {
  echo "Record Deleted successfully";
  header('Location: mcqsview.php');
exit;
} 

$conn->close();

?>
