<?php session_start(); 
	if($_SESSION['Logged']=="No")
	{
		Header("Location: adminindex.php");
		die();
	}
?>

<html>
<head>


<meta http-equiv="Content-Language" content="en-us">



</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties="fixed"   > 

<?php
 	 $_SESSION["page"]="viewallnews";
	 include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$from=$_GET["fYear"]."-".$_GET["fMonth"]."-".$_GET["fDay"];
	$to=$_GET["tYear"]."-".$_GET["tMonth"]."-".$_GET["tDay"];
	$all=$_GET["all"];
	//echo $to;
	//$_SESSION["page"]="programs";
	if ($all=="true")
	{
	 	$sql="select * from ev_videos where uid=".$_SESSION['admin_id']." order by postdate desc"	;
	}
	else
	{
		$sql="select * from ev_videos where postdate>='".$from."' and  
		postdate<='".$to."' and uid=".$_SESSION['admin_id']." order by postdate desc"	;
	}
	//echo $sql;

?>
	<div id="show"></div>
	<table border="0" cellpadding="0" cellspacing="0" 
	style="border-collapse: collapse" width="95%" id="AutoNumber3" height=465>
        
		<tr>
        	<td width="100%" valign="top" align="center">
        		 <form name="frmnewstudent">
                  <table border="0" cellpadding="0" cellspacing="0" 
				   style="border-collapse: collapse" width="97%" id="AutoNumber3">
				   	
	        		  <tr>
	        			<td width="100%" valign="top" align="right" >
	        				<input type="button" value="Delete Selected" onclick="delSelEvents()">
	        			</td>
	        		  </tr>
					  <tr>
	        			<td width="100%" valign="top" align="center" >
	        			<?php
	        				$result=mysql_query($sql);
							if (mysql_num_rows($result)<=0)
							{
								echo "no events found";
								die();
							}
						?>
	        			<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#C2C4C5" width="100%" id="AutoNumber4" bgcolor="white">
	        			<tr>
                        <td width="10%" class="normaltext"><b>Id</b></td>
                        <td width="60%" class="normaltext" align="center"><b>advertisement caption</b></td>
                        <td width="10%" class="normaltext"></td>
                        <td width="10%" class="normaltext"></td>
                        <td width="10%" class="normaltext"></td>
                        </tr>
	        			<?php
	        			 
					   	 while($row=mysql_fetch_array($result))
					   	 {
						  
						  echo"
						    
				            <tr>
                            <td class='normaltext'>".$row["video_id"]."</td>
                            <td class='normaltext' align='center'>".$row["caption"]."</td>
                            <td class='normaltext'>
							<a href=JavaScript:link(".$row["video_id"].",'EditEvent')>edit</a></td>
                            <td class='normaltext'>
							<a href=JavaScript:link(".$row["video_id"].",'DeleteEvent')>delete</a></td>
							<td><input type=checkbox name=".$row["video_id"]." 
							onclick=assign(this.name,this.checked)></td>
                          </tr>";
                          
                          }
                          ?>
                        </table>
						</td>
						</tr>
						
					</table>
	                </form> 			      	
						</td>
					  </tr> 
					  
					  	
				  </table>    	
			</td>
		</tr>
	
			
    </table>