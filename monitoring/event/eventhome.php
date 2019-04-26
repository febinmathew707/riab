<?php 
 session_start(); 
	if($_SESSION['Logged']!="Yes")
	{
		Header("Location: adminindex.html");
		die();
	}
	
?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">
<head>

<meta http-equiv="Content-Language" content="en-us">

<script src="adminoptions.js">
	
</script>

<link href="../styleSheet/admin.css" type=text/css rel=stylesheet>
<title>:: WAVE SAT  :: </title>
</head>
<?php
if($_SESSION["errordesc"]!="")
{
	?>
	<script>
			alert(<?php echo" '" .$_SESSION["errordesc"]."' "; ?>)
	</script>
<?php
}
echo"<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties=fixed bgcolor=#FFFFFF 
onload=display('".$_SESSION["page"]."' > 
 <table border=0 cellpadding=0 marginwidth=0 marginheight=0 cellspacing=0 bgcolor=#FFFFFF style=border-collapse: collapse  width=100% height=100% bgproperties=fixed )>";
 ?>
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#E3E4E5" width="100%"  bgproperties="fixed" >
 <tr>
 
 <td width=175 height=516 valign=top align=left>
  
<embed src='movies/eventTree.swf' width=170 height=450 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>                  	

</td>
 <td width=830 height=516 valign=top align=left >
 <div id="sub"></div>
 &nbsp;</td>
 </tr>
  </table>
 
</body>
</html>