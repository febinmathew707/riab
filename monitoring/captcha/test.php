<?php 
 session_start();
	
?>
<html> 
	<head> 
	<title>Captcha Test!</title> 
	</head> 
	<body>
	
	          <img src="captcha.php" >: 
	         <?php
			 		echo "ss" . $_SESSION['captcha_session'];
					?>  
	</body> 
	</html> 