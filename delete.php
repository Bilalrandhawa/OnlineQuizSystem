<?php
ob_start();
include "config1.php";
$id=$_GET['id'];
$delete_data="DELETE FROM q_manager WHERE q_id='$id' ";
mysqli_query($conn,$delete_data); 
if ($conn->query($delete_data) === TRUE) {
  echo "Record Deleted successfully";
  header('Location: manager.php');
exit;
} 

$conn->close();

?>
