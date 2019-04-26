<?php
	
	$eol="\r\n";
	$mime_boundary=md5(time());
						
		    $headers = "To: The Receiver <recipient@some.net>\n" .
    					"From: The Sender <sender@some.net>\n" .
   						 "MIME-Version: 1.0\n" .
    					"Content-type: text/html; charset=iso-8859-1";
			
		$to="sajishdaniel@gmail.com";
		//$message="Hello Mr.Sajish";
		$message="<HTML><BODY><font color=black size=3 face=verdana>Your Account Information in Employee
		 Database of PSU in kerala<br></font><font color=black size=2 face=verdana> 
		 User Id : <br><b>Password : " ;
		$subject="test";
		$mail_sent = mail($to,$subject,$message,$headers);
		echo $mail_sent ? "Mail sent " : "Mail failed".$to; 
	/*
		if(mail('sajishdaniel@gmail.com', 'Subject',
    '<html><body><p>Your <i>message</i> here.</p></body></html>',
    "To: The Receiver <recipient@some.net>\n" .
    "From: The Sender <sender@some.net>\n" .
    "MIME-Version: 1.0\n" .
    "Content-type: text/html; charset=iso-8859-1"))
	{
		echo "success";
	} 
	else
	{
		echo "failed";
	}
	*/
?>