<?php session_start();

	include("../connectdb/connect.php");

 	mysql_select_db("soemonit_pentaclt",$con);

	 if(!$con)

	{

		die('Could not connect to server' . mysql_error());

	} 

	$_SESSION["mainpage"]="budget";

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF">    

	    <tr>

         <td width="100%"  valign="middle"  align=center>

         <form name="frmCompany">

         <?php

	 		if(isset($_SESSION["ed_revbud_id"]))

	 		{

				$id=$_SESSION["ed_revbud_id"];

			}

			else

			{

				$id=0;

			}

			//echo $id;

	 	

	 		?>

         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" 

		 id="AutoNumber1" >

  <tr>

     <td width="100%" align="left"   height="39" valign=top>	 

	 <font face=verdana color=black size=2><b> <br>Revised Annual Budget </b></font><br>

	 </td>

   </tr>

	 <tr>

     <td width="100%" align="center"    valign="top" >

     	<table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="100%" 

		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">      

   	<tr>

     <td width="30%" align="right"  class="txtleft" valign=top>

     <font color="#000000">Company</font></td>

     <td width="2%" valign="top">:</td>

     <td width="68%" >

     <select name="cmbCompany" id="cmbCompany"   onchange="dispbudget1('rev')"  class=combo1>   

	 <option value=0 selected> ------------------- select company ---------------- </option>  

    <?php 

    	$strsql="select * from emp_company group by Company_Name";

    	$result=mysql_query($strsql);

    	while($row=mysql_fetch_array($result))

    	{

			echo"<option value='".$row["company_id"]."'>".$row["company_name"]."</option>";

		}

    ?>

    </select>

&nbsp;</td>

   </tr>

   

   

          </table><br>

        <div id="budget" align=left></div><br>

    	<div id="budgetdetails" align=left></div>

     </td>

     </tr>     

      

   <div id="re"></div>

   <div id="w"></div>

 </table>

 <?php

 

   ?>

 </form>

		 </td>

       </tr>       

</table>



<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF">        

      

     </table>