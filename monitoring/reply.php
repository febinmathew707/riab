<?php session_start(); ?>
<?php
 	
	 include("../connectdb/connect.php");
	
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["profile"]=0;
	$_SESSION["page"]="forum";
	$fbid=$_GET["id"];

?>
	
	<table border="0" cellpadding="0" cellspacing="0" 
	style="border-collapse: collapse" width="95%" id="AutoNumber3">
        <tr>
			<td valign="top"  width="100%" align="left" height="10">
			<?php
			
			?>	
			</td>
		</tr>
		
		<tr>
        	<td width="100%" valign="top" align="left">
                  <table border="0" cellpadding="0" cellspacing="0" 
				   style="border-collapse: collapse" width="100%" id="AutoNumber3">
				   		
	        		  
					  <tr>
	        			<td width="100%" valign="top" align="left" 
						  >
							<table border="0" cellpadding="0" cellspacing="0" 
				   			style="border-collapse: collapse" width="100%" height="100%"
							   id="AutoNumber3">
							
							
							<tr>
				        		<td width="4%" valign=top height="30"></td>
								<td width="96%" valign="top" align="left" class="programs"
								height="100%">
								<?php
									$strsql="select * from emp_feedback where fbid=".$fbid."";
									$result=mysql_query($strsql);
									$row=mysql_fetch_assoc($result);
								?>
								</td>
							</tr>
							<tr>
				        		<td width="4%" valign=top  class=txtleft>  </td>
								<td width="96%" valign="top" align="left" class="leftnormal"
								> To :
								<?php
										echo"<input type=text name='txtTo' id='txtTo' value=".$row["email"].">";
								?>
								
								</td>
							</tr>
							<tr>
				        		<td width="4%" valign=top height="30"></td>
								<td width="96%" valign="top" align="left" class="programs"
								height="100%">
				                 
								<textarea rows=12 cols=100 name="txtdesc" id="txtdesc" class="txtbox"></textarea> 
									 
								</td>
							</tr>
							
							
							</table>
	                 			      	
						</td>
					  </tr> 
					 
				  </table>    	
			</td>
		</tr>
		<tr>
        	<td width="100%" valign="top" align="center" height=1>
        		
			</td>
		</tr>
		<tr>
        	<td width="100%" valign="top" align="center">
        		<?php
        		
        		echo "<input type=button value='  Send  ' 
				onclick=sendmail()>&nbsp;
        		<input type='Reset' value='  Clear  '>";
        		?>
			</td>
		</tr>			
    </table>
          
                    