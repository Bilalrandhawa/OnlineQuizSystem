<?php
include ("config1.php");
$to = 'muhammad.bilal24345@gmail.com';
$subject = 'Marriage Proposal';
$from = 'peterparker@email.com';
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
$message .= '<tr style="background: #eee;"><td><strong>USER ID:</strong> </td><td>' .  $userid.  '</td></tr>';
$message .= '<tr><td><strong>SUBJECT ID: </strong> </td><td>' .  $subjectid . '</td></tr>';
$message .= '<tr><td><strong>TOTAL MARKS:</strong> </td><td>' .  $resultrecod . '</td></tr>';
$message .= '</table>';
$message .= '</body></html>';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
/*
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
$message .= '<p style="color:#080;font-size:18px;">Will you marry me?</p>';
$message .= '</body></html>';
*/

 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>