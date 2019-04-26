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
	elseif($_SESSION['LogType']!='CO')
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
	$_SESSION["mainpage"]="productmaster";
	$finyear=$_GET["finyear"];
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
		 <td width="40%" align="right" height="23" class="txtleft"> <b> Item Name</b>
		 </td>	
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Installed Capacity</b>
		 </td>
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Achievable Capacity</b>
		 </td>
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Unit</b>
		 </td>
		 <td width="5%" align="right" height="23" class="txtleft"> <b> Edit  </b>
		 </td>				 
		 <td width="5%" align="right" height="23" class="txtleft"> <b> Delete  </b>
		 </td>
		 </tr>
     	<?php
     		$strsql="SELECT * FROM  emp_products where fin_year=".$finyear." and company_id=".$_SESSION["company_id"]."
			  order by item_name  ";
     		$result=mysql_query($strsql);
     		while($row=mysql_fetch_array($result))
     		{
     			
     		
     	?>
	 <tr >
     <td width="40%" align="right" height="23" class="txtleft">
     <?php echo $row["item_name"];
     ?>
    </td>
   	<td width="15%" align="right" height="23" class="txtleft">
     <?php echo $row["inst_capacity"];
     ?>
    </td>
    <td width="15%" align="right" height="23" class="txtleft">
     <?php echo $row["ach_capacity"];
     ?>
    </td>
    <td width="15%" align="right" height="23" class="txtleft">
     <?php echo $row["unit"];
     ?>
    </td>
    <td width="5%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:edit('product',".$row["item_code"].")>";
		?><img src="img_new/edit.gif" alt="editcompany" border="0"></a>
    </td>
    <td width="5%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:del('product',".$row["item_code"].")>";
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