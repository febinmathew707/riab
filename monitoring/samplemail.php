<?php
//define the receiver of the email
$to = 'sajishdaniel@gmail.com';
//define the subject of the email
$subject = 'Test HTML email';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: webmaster@example.com\r\nReply-To: sajishdaniel@gmail.com";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
//define the body of the message.
//ob_start(); //Turn on output buffering
?>
hello sdsdfsdfsdf
<?
//copy current buffer contents into $message variable and delete current output buffer

$message = "<font color=black>fsfsdfsdfsd</font>";
//send the email
echo "dfdfd".$message;
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent" : "Mail failed";
?>