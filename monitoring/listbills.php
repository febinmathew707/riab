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

	$_SESSION["mainpage"]="listbill";

?>

<div id="turnover">

   

	 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 

  <tr>

         <td width="100%"  valign="middle"  align=center> 

          <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >

          <tr>

      <td width="100%" align="left"  background="images/createaccounttop.gif" height="39" valign=bottom>	 

	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b>List Bills</b></font>

	 </td>

   </tr>

 	 <tr>

     <td width="100%" align="center"  background="images/createaccountmiddle.gif" height="30" valign="bottom">     

		<!--<iframe src="listallcompany.php" width="800" height="300" frameborder="0" scrolling="auto"></iframe>-->

		<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">

     	

     	<?php

     		$strsql="SELECT * FROM  emp_company_bill order by bill_date desc ";

     		$result=mysql_query($strsql);

     		while($row=mysql_fetch_array($result))

     		{

     			

     		

     	?>

	 <tr >

     <td width="55%" align="right" height="23" class="txtleft">

     <?php echo date("d-M-Y",strtotime($row["Bill_Date"]));

     ?>

    </td>

    <td width="15%" align="right" height="23" class="txtleft">

     <?php echo "<a href='monthlybill.php?id=".$row["Auto_No"]."'>View Bill</a>";

     ?>

    </td>

    <td width="15%" align="right" height="23" class="txtleft">

    <font color=black>

     <?php if($row["Status"]=="N")

     		{

				echo "Not Paid";

			}

			else if($row["Status"]=="P")

			{

				echo "Paid";

			}

			else if($row["Status"]=="H")

			{

				echo "Partially Paid";

			}

     ?>

     </font>

    </td>

   

    </tr>

    <?php

    }

    ?>

   </table>

</td>

</tr>

<tr>

     <td width="100%" align="right"  background="images/createaccountbottom.gif" height="35"></td>

   </tr>

</table>

</td>

</tr>

 <tr>

         <td width="100%" height="58" valign="top"  align=right>

         <span id="w1"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

       </tr>

</table>	  