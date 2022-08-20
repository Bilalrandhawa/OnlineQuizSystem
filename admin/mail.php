<?php
ob_start();
include ("config1.php");
$to="muhammad.bilal24345@gmail.com";
$subject="TEST MAIL";
$query = "SELECT id,user_id,r_point,s_id FROM result" ;
$count =1;
$result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_array($result)){ 
  
       $userid=$row["user_id"];
       $resultrecod=$row["r_point"];
       $subjectid=$row["s_id"];
 }  

$message .= '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="20">';
$message .= '<tr style="background: #eee;"><td><strong>USER ID:</strong> </td><td>' . $userid.  '</td></tr>';
$message .= '<tr><td><strong>SUBJECT ID: </strong> </td><td>' . $subjectid . '</td></tr>';
$message .= '<tr><td><strong>TOTAL MARKS:</strong> </td><td>' . $resultrecod . '</td></tr>';
$message .= '</table>';
$message .= '</body></html>';
    
$from="bilal24345@iqraisb.edu.pk";
$header="FROM: $from";
$header='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header= "CC: susan@example.com\r\n";
$header= 'MIME-Version: 1.0' . "\r\n";
if (mail($to,$subject,$message,$header)) {
	echo "MAIL SUCCESSFULLY SENT:";
  header('Location: appliedquiz.php');
}
else{
	"sending failled! try again";
}

?>
 