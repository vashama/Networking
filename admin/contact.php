<?php
 
// Email address verification
function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
 
if($_POST) 
{
 
    // Enter the email where you want to receive the message
    $emailTo = 'networking.raspberrypi@gmail.com';
 
    $clientEmail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
 
    //$array = array('emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');
 
    if(!isEmail($clientEmail)) {
        $emailMessage = 'Invalid email!';
    }
    if($subject == '') {
        $subjectMessage = 'Empty subject!';
    }
    if($message == '') {
        $messageMessage = 'Empty message!';
    }
    
    if(isEmail($clientEmail) && $subject != '' && $message != '') 
    {
        $subject = $subject . " (comment from " . $clientEmail . ")";
        // Send email
        mail($emailTo, $subject, $message);
        header('Location: monitoring.php');
    }
}
 
?>