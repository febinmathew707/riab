<?php
	session_start();
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['Logged']=='No')
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['LogType']!='AD')
	{
		Header("Location: home.php");
		die();
	}
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["mainpage"]="actbudget";
	$company=$_GET["company"];
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 
  <tr>
         <td width="100%"  valign="middle" background="" align=center> 
          <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
 	 <tr>
     <td width="100%" align="center"  background="images/createaccountmiddle.gif" height="30" valign="bottom">     
		<!--<iframe src="listallcompany.php" width="800" height="300" frameborder="0" scrolling="auto"></iframe>-->
		<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">
     	<tr>
		 <td width="40%" align="right" height="23" class="txtleft"> <b> Company</b>
		 </td>	
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Fin Year</b>
		 </td>
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Sales</b>
		 </td>
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Stock</b>
		 </td>
		 <td width="5%" align="right" height="23" class="txtleft"> <b> Edit  </b>
		 </td>				 
		 <td width="5%" align="right" height="23" class="txtleft"> <b> Delete  </b>
		 </td>
		 </tr>
     	<?php
     		if($company>0)
     		{
     			$strsql="SELECT * FROM emp_actual_budget where 
						company_id=".$company." ";
			}
			else
			{
				$strsql="SELECT * FROM emp_actual_budget order by company_id";
			}
     		$result=mysql_query($strsql);
     		while($row=mysql_fetch_array($result))
     		{
     			
     		
     	?>
	 <tr >
     <td width="40%" align="right" height="23" class="txtleft">
     <?php 
	 		$strsql="select * from emp_company where company_id=".$row["company_id"]."";
	 		$resultcom=mysql_query($strsql);
	 		$rowcom=mysql_fetch_assoc($resultcom);
	 		echo $rowcom["company_name"];
     ?>
    </td>
   	<td width="15%" align="right" height="23" class="txtleft">
     <?php 	
	 		$strsql="select * from emp_fin_year where year=".$row["fin_year"]."";
			$resultfin=mysql_query($strsql);
			$rowfin=mysql_fetch_assoc($resultfin); 
	 		echo $rowfin["fin_year"];
     ?>
    </td>
    <td width="15%" align="right" height="23" class="txtleft">
     <?php echo $row["sales"];
     ?>
    </td>
    <td width="15%" align="right" height="23" class="txtleft">
     <?php echo $row["stock"];
     ?>
    </td>
    <td width="5%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:edit('actbudget',".$row["bud_id"].")>";
		?><img src="img_new/edit.gif" alt="editcompany" border="0"></a>
    </td>
    <td width="5%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:del('actbudget',".$row["bud_id"].")>";
		?><img src="images/delete1.png" alt="deletecompany" border="0"></a>
    </td>
    </tr>
    <?php
    }
    ?>
   </table>
</td>
</tr>
</table>
</td>
</tr>
</table>