<?php 


$message="<html><body><font color=black size=4 face=verdana>hello<br>friend
</font><br><img src='images/adv3.gif'</body?</html>";
mail('sajishdaniel@gmail.com', 'Subject',
    $message,
    "To: The Receiver <sajishdaniel@gmail.com>\n" .
    "From: The Sender <sender@some.net>\n" .
    "MIME-Version: 1.0\n" .
    "Content-type: text/html; charset=iso-8859-1"); 
    
   
?>