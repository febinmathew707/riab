<?php session_start();
	$_SESSION["page"]="stream";
?>
<table width="100%" border=0><tr>
<td width="80%" valign="top" align=right height="50"></td></tr>
<tr>
<td width="80%" valign="top" align=left></td></tr>
<!--
<tr>
<td width="80%" valign="top" align=center><!--
<select id='cmbSelect' name='cmbSelect' class=combo1 onchange="dispStream(this.value)"><!--
<option value="kso">-------------------------  KSO WORKSITE -------------------------</option> <!--
</td></tr> -->
</table>
<div align=center><img src="images/title.gif"></div><br>
<div align=left><a href="JavaScript:disp('liststream')"><img src="images/back.gif" border=0></a></div><br>
<span id="stream"><iframe src="stream.html" width="700" height="500" scrolling="no" frameborder="0"></iframe></span> 