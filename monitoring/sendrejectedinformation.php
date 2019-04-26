<?php 

class sendmail
{
	public function sendEmail($to,$msg,$subject)
	{		
		
		$random_hash = md5(date('r', time()));
		
		$headers = "To: The Receiver ". $to."\n" .
		    "From: The Sender <info@soemonit_soemonit_pentaclt.com>\n" .
		    "MIME-Version: 1.0\n" .
		    "Content-type: text/html; charset=iso-8859-1";
		
		$message="<HTML><BODY><font color=black size=3 face=verdana>".$msg."<br></font><font color=black size=2 
		face=verdana> ";
		$mail_sent = @mail( $to, $subject, $message, $headers );
		//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
		echo $mail_sent ? "Mail sent" : "Mail failed";
	}
}
?>