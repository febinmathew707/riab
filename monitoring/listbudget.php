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

	elseif($_SESSION['LogType']!='RP')

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

	$_SESSION["mainpage"]="budget";

	$company=$_GET["company"];

	//$finyear=$_GET["finyear"];

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 

  <tr>

         <td width="100%"  valign="middle" background="" align=left> 

          <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" >

 	 <tr>

     <td width="100%" align="center"  background="images/createaccountmiddle.gif" height="30" valign="bottom">     

		<!--<iframe src="listallcompany.php" width="800" height="300" frameborder="0" scrolling="auto"></iframe>-->

		<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="100%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">

     	<tr>

		 <td width="50%" align="right" height="23" class="txtleft"> <b> Company</b>

		 </td>	

		 <td width="15%" align="right" height="23" class="txtleft"> <b> Fin Year</b>

		 </td>		 

		 <td width="15%" align="right" height="23" class="txtleft"> <b> Date</b>

		 </td>

		 <td width="20%" align="right" height="23" class="txtleft"> <b>   </b>

		 </td>				 

		 

		 </tr>

     	<?php

     		if($company==0)

     		{

     			$strsql="SELECT * FROM emp_reversed_budget ";

			}

			else if($company>0 )

			{

				$strsql="SELECT * FROM emp_reversed_budget where company_id=".$company." order by fin_year,bud_rev_id 

				desc";

			}

			

			//echo $strsql;

     		$result=mysql_query($strsql);

     		while($row=mysql_fetch_array($result))

     		{

     			

     		

     	?>

	 <tr >

     <td width="50%" align="right" height="23" class="txtleft">

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

     <?php echo date("d-m-Y",strtotime($row["edate"]));

     ?>

    </td>

    <td width="20%" align="right" height="23" class="txtright">

    	<?php 

    		echo "<a href=JavaScript:budDetails(".$row["bud_rev_id"].")>";

		?>View Details >> </a>

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