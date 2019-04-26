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
?>
<script src="search.js"></script>
<script src="profile.js"></script>
<script src="update.js"></script>
<script src="report.js"></script>
<script src="login.js">	

</script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
<center>
<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">
     	<tr>
         <td width="5%" align="right" height="23" class="txtleft"> <b> Sl#</b>
		 </td>
		 <td width="40%" align="right" height="23" class="txtleft"> <b> Company Name</b>
		 </td>
		 <td width="35%" align="right" height="23" class="txtleft"> <b> Address </b>
		 </td>
		 <td width="10%" align="right" height="23" class="txtleft"> <b> Edit </b>
		 </td>
		 <td width="10%" align="right" height="23" class="txtleft"> <b> Delete  </b>
		 </td>
		 </tr>
     	<?php
     		$strsql="SELECT * FROM  emp_company order by company_name ";
			$i=1;
     		$result=mysql_query($strsql);
     		while($row=mysql_fetch_array($result))
     		{
     			
     		
     	?>
	 <tr >
      <td width="5%" align="right" height="23" class="txtleft">
     <?php echo $i;
     ?>
    </td>
     <td width="40%" align="right" height="23" class="txtleft">
     <?php echo $row["company_name"];
     ?>
    </td>
    <td width="35%" align="right" height="23" class="txtleft">
     <?php echo $row["company_add1"];
     ?>
    </td>
    <td width="10%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:edit('company',".$row["company_id"].")>";
		?><img src="img_new/edit.gif" alt="editcompany" border="0"></a>
    </td>
    <td width="10%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:deleteaccount(".$row["company_id"].")>";
		?><img src="images/delete1.png" alt="deletecompany" border="0"></a>
    </td>
    </tr>
    <?php
    }
    ?>
   </table>
</center>