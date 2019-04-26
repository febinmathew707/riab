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

	$_SESSION["mainpage"]="finyear";

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">       

       

	    <tr>

         <td width="100%"  valign="middle" background="" align=center>

         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >

  <tr>

     <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"><br>    	 

	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Financial Year Creation</b></font>

     </td>

   </tr>

	 <tr>

     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">

     	<form name="frmCompany" method="POST">

     	<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" width="70%">

          <tr>

            <td width="33%" class="txtleft">Fin Year</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtName" 

			id="txtName"></td>

          </tr>

          <tr>

            <td width="100%" align=right colspan="3"><input type=button value="update" class=button

			onclick="javascript:updateFinyear(1)">&nbsp;

            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          </tr>

        </table>

        </form>

        &nbsp;</td>

     </tr>  

   <div id="re"></div>

   <div id="w"></div>

 </table>



		 </td>

       </tr>   

     </table>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 

  <tr>

         <td width="100%"  valign="middle" background="" align=center> 

          <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >

 	 <tr>

     <td width="100%" align="center"  background="images/createaccountmiddle.gif" height="30" valign="bottom">     

		<!--<iframe src="listallcompany.php" width="800" height="300" frameborder="0" scrolling="auto"></iframe>-->

		<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">

     	<tr>

		 <td width="80%" align="right" height="23" class="txtleft"> <b> Financial Year</b>

		 </td>

		 <td width="20%" align="right" height="23" class="txtleft"> <b> Delete  </b>

		 </td>

		 </tr>

     	<?php

     		$strsql="SELECT * FROM  emp_fin_year order by year desc ";

     		$result=mysql_query($strsql);

     		while($row=mysql_fetch_array($result))

     		{    			

     		

     	?>

	 <tr >

     <td width="80%" align="right" height="23" class="txtleft">

     <?php echo $row["fin_year"];

     ?>

    </td>    

    <td width="10%" align="right" height="23" class="txtright">

    	<?php 

    		echo "<a href=JavaScript:del('finyear',".$row["year"].")>";

		?><img src="images/delete1.png" alt="deletefinyear" border="0"></a>

    </td>

    </tr>

    <?php

    }

    ?>

   </table>

</td>

</tr>

 <tr>

     <td width="100%" align="left"  background="images/createaccountbottom.gif" height="30" valign="bottom">

     </td>

   </tr>

</table>

</td>

</tr>



</table>