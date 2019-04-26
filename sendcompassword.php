<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	include("../transform.php");
 	include("mailsend.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$trans=new transform();
	//$mail=new sendmail();			
	$subject = 'Company Account Details From RIAB';	
	$random_hash = md5(date('r', time()));
	$strsql="SELECT * FROM emp_user_setting where sendpwd='N' and UTYPE='CO'";
	$result=mysql_query($strsql);
	$send=1;				
	while($row=mysql_fetch_array($result))
	{
		$strsql="SELECT * FROM emp_company WHERE company_id=".$row["COMPANY_ID"]."";
		
		$resultcom=mysql_query($strsql);
		$pr=1;
		$rowcom=mysql_fetch_assoc($resultcom);
		if($rowcom["Email"]!="")
		{
			//echo $rowcom["Email"];
			//$mail->sendEmail($row["Email"],$trans->retrieve($row["Pwd"]));
			$to = $rowcom["Email"];
			$strsql="SELECT * FROM emp_user where Id=".$row["ID"]."";
			$resultuser=mysql_query($strsql);
			$rowuser=mysql_fetch_assoc($resultuser);			
			/*
			$headers  = "From: pentagon <pentagoninfotech@yahoo.com>\r\n" .
    		$headers .= "Reply-To: ".$to."\r\n";
    		$headers .= "Return-Path: pentagoninfotech@yahoo.com\r\n";    		
    		$headers .= "X-Mailer: Drupal\n";
    		$headers .= 'MIME-Version: 1.0' . "\n";  
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";  		
    		$headers .= "X-Priority: ".$pr."\n"; 
			$headers .= "X-MSmail-Priority: High\n"; 
			*/
			$headers .= "Reply-To: pentagoninfotech.com <pentagoninfotech@yahoo.com>\r\n"; 
    		$headers .= "Return-Path: pentagoninfotech.com <pentagoninfotech@yahoo.com>\r\n"; 
   			$headers .= "From: pentagoninfotech.com <pentagoninfotech@yahoo.com>\r\n"; 
    		$headers .= "Organization: pentagoninfotech.com\r\n"; 
    		$headers .= "Content-type: text/html; charset=iso-8859-1\n";   
	
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "X-Mailer: php";
	
			ini_set('sendmail_path', '/usr/sbin/sendmail -t');
			ini_set('sendmail_from', 'yoursite@yoursite.com');



			/*
			$headers = "To: The Receiver <".$to.">\n" .
    					"From: The Sender <pentagoninfotech@yahoo.com>\n" .
   						 "MIME-Version: 1.0\n" .
    					"Content-type: text/html; charset=iso-8859-1"; */
	    	
	    	$message="<HTML><BODY><font color=black size=3 face=verdana>Company Account Details From RIAB
	 		<br></font><font color=black size=2 face=verdana><b> 
	 		User Id : " . $rowuser["UNAME"] ."<br>Password : " . $trans->retrieve($row["UDESC"])."</b></font></BODY></HTML>";
	 		$pr=$pr+1;
			
	 		//echo $message;
			if(!mail( $to, $subject, $message, $headers ))
			{
				$send=0;
			}
			//echo $mail_sent ? "Mail sent" : "Mail failed";			
			//mysql_query("UPDATE emp_user_setting SET sendpwd='Y' WHERE ID=".$row["ID"]."");
		}
	}
	if($send==1)
	{
		echo "Company account information Successfully sent";
	}
	else
	{
		echo "Sorry your request couldn't be completed,plz try later";
	}
	?>