<?php session_start(); 
	if($_SESSION['Logged']=="No")
	{
		Header("Location: ../adminindex.php");
		die();
	}
	include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION['page']="Add Events";
	$sql="select * from ev_videos where video_id=".$_GET["id"]."";
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result);
?>
<table width=100% cellpadding=0 cellspacing=0 border="=0">
	<tr>
		<td valign=top align=center width=100% >
			<?php echo "
			<form action='upload_file.php?type=news&id=".$_GET["id"]."' method='POST'   	
			onsubmit='return saveNews()' id='frmnews'   name='frmnews' enctype='multipart/form-data'>";
			?>	
				<br><br>
				<table border=0 height=75 width=473 >
				<tr>
					<td valign=top  width=100% align=center>
						<b><font face="verdana" size="2">Edit Event</font></b> &nbsp;
						
					</td>
				</tr>
				<tr>
					<td valign=top align=left width=100% class='normaltext'>
						Caption &nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo"
							<input type='text' name='txtHeading' id='txtHeading' size=45 value='".$row[1]."'>";
						?>
					</td>
				</tr>
				<tr>
					<td valign=top align=left width=100% class='normaltext'>
						Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo"
						<input type='text' name='txtTitle' id='txtTitle' size=45 value='".$row[12]."'>";
						?>
					</td>
				</tr>
				<tr>
					<td valign=top align=left width=100% class='normaltext'>
						File Name &nbsp;
						<?php echo"
						<input type='text' name='txtFName' id='txtFName' size=45 value='".substr($row[2],7)."'>";
						?><br>
						Note*** (File Name should be same as the name of the file which have been uploaded.
						eg.(if the file name is 'video1.flv' then you enter the filename as 'video1.flv')
					</td>
				</tr>
				<tr>
					<td valign=top align=left width=100% class='normaltext'>
						Category &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select name="cmbCategory" id="cmbCategory">
							<?php
								echo "<option value='".$row[11]."' selected>".$row[11]."</option>";
							?>
							<option value='Albums'>Album</option>
							<option value='Events'>Event</option>
							<option value='Stage Shows'>Stage Show</option>
							<option value='Show Reels'>Show Reel</option>
							<option value='Tv Programs'>Tv Program</option>
						</select>
					</td>
				</tr>
				<tr>
					<td valign=top  width=100% class='normaltext'>
						Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<textarea name=txtdesc id=txtdesc cols=50 rows=10>
						<?php
							echo $row[4];
						?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td valign=middle align=left width=100% class='normaltext'>
						select image &nbsp; <input type='file' name='file' size=40 id='file' >&nbsp;
						<br>
					</td>
				</tr>
				<tr>
					<td valign=middle align=left width=100% class='normaltext'>
						<input type='submit' value='Upload' >
					</td>
				</tr>
				
				</table>
				<iframe id='upload_target_album'name='upload_target_album' src=''
				 style='width:0;height:0;border:0px solid #fff;'onload='newsSaved()'></iframe>
			</form>
		</td>
	</tr>
</table>