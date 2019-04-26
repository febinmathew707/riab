<?php session_start(); 
	if($_SESSION['Logged']!="Yes")
	{
		Header("Location: adminindex.html");
		die();
	}
	
?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">
<head>

<meta http-equiv="Content-Language" content="en-us">

<script src="event.js">
	
</script>
<script type="text/javascript" src="../student/myprintln.js"></script>
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
echo"<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties=fixed bgcolor=#E4E5E6 
onload=showmain('events') > 
 <table border=0 cellpadding=0 marginwidth=0 marginheight=0 cellspacing=0  style=border-collapse: collapse  width=100% height=100% bgproperties=fixed >";
 ?>
 <tr>
 <td width="100%"  valign=top align=center>
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#E4E5E6" style="border-collapse: collapse"  width="1005" height="628" bgproperties="fixed" >
 <tr>
 <td width=200  valign=top align=center height="100">
 	<img border="0" src="../school/images/logo.png" >
 </td>
 <td width=800  valign=bottom align=center height="100">
 	
 </td>
 </tr>
 
  <tr>
 <td width=100%  valign=top align=left colspan=2>
 	<div id="main"></div>
</td>
 </tr>
 <tr>
 <td width=100%  valign=top align=left colspan=2>
 	<a href="logout.php">Logout</a> 
</td>
 </tr>
  </table>
 </table>
</body>
</html>