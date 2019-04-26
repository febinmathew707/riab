<?php session_start(); 
?>
<table height=100% width=90% border=0 bgcolor=#343434 cellpadding=4>
<tr>
	<td height=100% width=100% valign=top align=right >
		<input type="image" src="images/close.gif" onclick="cleardiv('send')">
	</td>
</tr>
<tr>
	<td height=100% width=100% valign=top align=left class=txtleft>		
	<?php
		$id=$_SESSION["video_id"]*14522;
	  echo "Email Id  <input type=text name='txtemail' id='txtemail' class=txtboxblack size=70 maxlength=99 
	  onkeydown=mail1(event,'http://www.wavesatlive.com/event/home.php?path=".$id."')>";
	  ?>
	 </td>
</tr>
<tr>
	<td height=100% width=100% valign=top align=right bgcolor=black class=txtcenter>
	type email id and press 'Enter'</td>
</tr>
</table>