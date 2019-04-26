<?php 
 session_start(); ?>
<?php
 	include("../connectdb/connect.php");		
		
				$_SESSION["company_id"]=0;
				$_SESSION['mainpage']="companymaster";	
								
			$_SESSION['Logged']="Yes";
			$_SESSION['LogType']="AD";
			$_SESSION['user_name']="guest";
			Header("Location: start.php");
			
	
 ?>