<?php //session_start();
 	include("../connectdb/connect.php");
	
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	function listStudent()
	{
		$_SESSION["reload"]=0;
		$searchby=$_GET["stype"]; // name city etc
		$orderby=$_GET["orderby"];
		
		if(isset($_SESSION["cltype"]))
		{
			$clicktype=$_SESSION["cltype"];
		}
		else
		{
			$clicktype="";
		}
		
		if(isset($_SESSION["curval"]))
		{
			$currentval=$_SESSION["curval"];
		}
		else
		{
			$currentval=1;
		}
		if(isset($_SESSION["fval"]))
		{
			$firstval=$_SESSION["fval"];
		}
		else
		{
			$firstval=1;
		}
		if(isset($_SESSION["lval"]))
		{
			$lastval=$_SESSION["lval"];
		}
		else
		{
			$lastval=10;
		}
		if(isset($_SESSION["keyword"]))
		{
			$keyword=$_SESSION["keyword"];
		}
		else
		{
			$keyword="";
		}
		if(isset($_SESSION["s_city"]))
		{
			$city=$_SESSION["s_city"];
		}
		else
		{
			$city="";
		}
		if(isset($_SESSION["quali"]))
		{
			$quali=str_replace("|","&",$_SESSION["quali"]);
		}
		else
		{
			$quali="";
		}
		if(isset($_SESSION["desig"]))
		{
			$desig=str_replace("|","&",$_SESSION["desig"]);
		}
		else
		{
			$desig="";
		}
		if(isset($_SESSION["company"]))
		{
			$company=str_replace("|","&",$_SESSION["company"]);
		}
		else
		{
			$company="";
		}
		
		
		if ($currentval>1)
		{	
			$startno=($currentval*10)-9;		
		}
		else
		{
			$startno=1;
			$firstval=1;
			$lastval=10;
		}
		$endno=$startno+9;
		$beginno=$startno;
		$cond="";
	//	echo "school=".$school;
		$flg=0;
		$sql="SELECT * FROM employee ";
			
			if ($keyword!="" )
			{
				$flg=1;
				if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where First_Name like '%".$keyword."%'"; 
					$cond=$cond . " where First_Name like '%".$keyword."%'"; 
				}
				else
				{
					$sql=$sql . " and First_Name like '%".$keyword."%'"; 
					$cond=$cond . " and First_Name like '%".$keyword."%'"; 
				}
			}
			//echo("<br> LENGHT=".$quali);
			if (strlen($city)>0 && $city!="All")
			{
				$flg=1;
				if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where City='".$city."' "; 
					$cond=$cond . " where City='".$city."' "; 
				}
				else
				{
					$sql=$sql . " and City='".$city."' "; 
					$cond=$cond . " and City='".$city."' "; 
				}
			}
			if (strlen($quali)>0 && $quali!="All")
			{
				$flg=1;
				if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where Qualification='".$quali."' "; 
					$cond=$cond . " where Qualification='".$quali."' "; 
				}
				else
				{
					$sql=$sql . " and Qualification='".$quali."' "; 
					$cond=$cond . " and Qualification='".$quali."' "; 
				}
			}
			if ($desig!="" && $desig!="All")
			{
				$flg=1;
				if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where Designation='".$desig."' "; 
					$cond=$cond . " where Designation='".$desig."' "; 
				}
				else
				{
					$sql=$sql . " and Designation='".$desig."' "; 
					$cond=$cond . " and Designation='".$desig."' "; 
				}
			}
			if ($company!="" && $company!="All")
			{
				$flg=1;
				if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where company_name='".$company."' "; 
					$cond=$cond . " where company_name='".$company."' "; 
				}
				else
				{
					$sql=$sql . " and company_name='".$company."' "; 
					$cond=$cond . " and company_name='".$company."' ";
				}
			}
				$orderby="First_Name";
				$sql=$sql." order by ". $orderby." desc" ;
				$cond=$cond." order by ". $orderby." desc" ;
			$_SESSION["cond"]=$cond;
			//echo $_SESSION["company"];
			//echo $sql;
		$result=mysql_query($sql);
		$totrows=mysql_num_rows($result);
		//echo $totrows;
		if ($totrows<=0 )
		{
			echo "<font color=black size=4> <b>&nbsp;&nbsp;&nbsp;
			<br><br><center>no matching records !!</center> </b></font>";
			die();
		}
		//	$tot_record=(($row[0]/4)%10);
			if(($totrows/10)>(intval(($totrows/10))))
			{
				$tot_record=intval(($totrows/10))+1;
			}
			else
			{
				$tot_record=intval(($totrows/10));
			}
		
		
	?>
	

			
		    <!-- ******************************LIST STUDENTS HERE ******************* -->
			<center>		  
			<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse"
			bordercolor="#111111" width="90%" id="AutoNumber3" >
			 <?php
		  		
              	
			  		
			  		//while($row=mysql_fetch_array($result))
			  		
			  		$record=$startno-1;
			  		//echo $record;
			  		mysql_data_seek($result,$record);
			  		
			  		if((mysql_num_rows($result)-$record)>20)
			  		{
						$cnt=10;
					}
					else
					{
						$cnt=(mysql_num_rows($result)-$record)/2;
					}
					if($cnt>0 && $cnt<1)
					{
						$cnt=1;
					}
			  		for($i=1;$i<=$cnt;$i++)
			  		{ 
					  $row=mysql_fetch_assoc($result);
			
					  	?>
			           	<tr>
			             <td width="50%" align="center" background="imghome/membersback.gif" height="154"
						 valign=top>
			             <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse"
						  bordercolor="#111111" width="100%" id="AutoNumber4" height="138">
			               <tr>
			                 <td width="38%" align="center" valign="middle">
							 	<?php
							 		if($row["Photo"]!="")
							 		{
										echo " &nbsp;&nbsp;<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   style='text-decoration: none	'><img src='".$row["Photo"]."' 
							   width=85 height=78></a>";
										
									}
									else
									{
										if(strtoupper(substr($row["Sex"],0,1))=="F")
										{
										echo "<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   				style='text-decoration: none	'>
											<img src='imghome/women.png' border=0></a>";
										}
										else if(strtoupper(substr($row["Sex"],0,1))=="M")
										{
										echo "<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   				style='text-decoration: none	'>
											   <img src='imghome/man.png' border=0></a>";
										}
										else 
										{
										echo "<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   				style='text-decoration: none	'>
											   <img src='imghome/man.png' border=0> </a>";
										}
										
									}
							 	?>
							 </td>
			                 <td width="62%" class="txtleft">
							 	<?php
							 		echo "<b>".$row["First_Name"]."</b><br>";
							 		echo $row["Qualification"]."<br>";
							 		echo $row["Designation"]."<br>";
							 		echo $row["Company_Name"];
							 	?>
							 </td>
			               </tr>
			             </table>
			             </td>
			             
			             <td width="50%" align="center" height="154" background="imghome/membersback.gif"
						 valign=top>
						  <?php
			               		$row=mysql_fetch_assoc($result);
			               		$i=$i+1;
			               		if($i>$cnt)
			               		{
									//die();
								}
			               	?>
			             <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
						  collapse"
						  bordercolor="#111111" width="100%" id="AutoNumber5" height="138">
			               <tr>
			              
			                 <td width="38%" align="center" valign="middle">
			                 
							 	<?php
							 		if($row["Photo"]!="")
							 		{
							echo " &nbsp;&nbsp;<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   style='text-decoration: none	'><img src='".$row["Photo"]."' 
							   width=85 height=78></a>";
										
									}
									else
									{
										if(strtoupper(substr($row["Sex"],0,1))=="F")
										{
										echo "<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   				style='text-decoration: none	'>
											<img src='imghome/women.png' border=0></a>";
										}
										else if(strtoupper(substr($row["Sex"],0,1))=="M")
										{
										echo "<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   				style='text-decoration: none	'>
											   <img src='imghome/man.png' border=0></a>";
										}
										else 
										{
										echo "<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   				style='text-decoration: none	'>
											   <img src='imghome/man.png' border=0> </a>";
										}
										
									}
							 	?>
							 </td>
			                 <td width="62%" class="txtleft">
							 	<?php
							 		echo "<b>" . $row["First_Name"]. "</b><br>";
							 		echo $row["Qualification"]."<br>";
							 		echo $row["Designation"]."<br>";
							 		echo $row["Company_Name"];
							 	?>
							 </td>
			               </tr>
			             </table>
			             </td>
			           </tr>
			           
			           <?php
			           }
			           ?>
			           
			           <tr>
              	<td width="100%" valign="top" colspan="4" align="center"  class=txtleft> <br>
              		<table width=100% cellpadding="1" cellspacing="1" border=0 
								bordercolor="black" style="border-collapse: collapse" 
								background="imghome/nosbg.gif" height=45>
								<tr>
		                  			
              		<?php 
              				
							if ($tot_record>=1)
              				{
								
									$i=$firstval;
									if(($firstval+9)>10)
									{
										$lastvalpre=$firstval-1;
										$tmpcurrent1=$firstval-1;
										$firstvalpre=$firstval-10;
										echo  " <td  height=15% valign=middle  colspan=2 
									  class=txtcenter>										  <a href=javascript:getState('".$searchby."','P','".$firstvalpre."','".$lastvalpre."','".$tmpcurrent1."')style='text-decoration: none'>
										 << <a >Previous </a>
										</label></td>";
									}
									if($lastval>$tot_record)
									{
										$lastval=$tot_record;
									}
									while($i<=$lastval)
									{
										//echo $i . " &nbsp; " ;
										if($i==$currentval)	
										{
										echo  " <td  height=15% valign=middle  colspan=2 
									  class=txtcenter  bordercolor=black>			  
	<a href=javascript:getState('".$searchby."','M','".$firstval."','".$lastval."','".$i."')
	style='text-decoration: none'>
										 <font color=black>" .$i." </font> 
										</label></td>";
										$i=$i+1;
										}
										else
										{
												echo  " <td  height=15% valign=middle  colspan=2 
									  class=txtcenter>			  
	<a href=javascript:getState('".$searchby."','M','".$firstval."','".$lastval."','".$i."')
	style='text-decoration: none'>
										 " .$i." </font> 
										</label></td>";
										$i=$i+1;
										}
									}
									if ($i<$tot_record)
									{
									/*	echo  " <label  onClick=getState(".$searchby.",'P',
										".$firstval.",".$lastval.",".$lastval.")> 	Next >> </label> 
										&nbsp; " ; */
										
										if(($lastval+10)<=$tot_record)
										{
											$firstval=$lastval+1;
											
											$tmpcurrent=$lastval+1;
											$lastval=$lastval+10;
										}
										else
										{
											$firstval=$lastval+1;
											$tmpcurrent=$lastval+1;
											$lastval=$tot_record;
										}
										echo  " <td  height=15% valign=middle  colspan=2 
									  class=txtcenter><label
										  
	onClick=getState('".$searchby."','N','".$firstval."','".$lastval."','".$tmpcurrent."')>
										 Next >>   
										</label></td>";
									}
							
								
							}
              		?>
              		</td>
              	</tr>
          		</table>
              		
              	</td>
              	</tr>
         </table>
 
		    
			</center>    
		 
<?php 

} 
listStudent();
?>