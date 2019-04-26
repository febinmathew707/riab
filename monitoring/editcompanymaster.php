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

	$_SESSION["mainpage"]="editcompany";

	

?><center>



<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">    

   

	    <tr>

         <td width="100%"  valign="middle" background="" align=center>

         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >

 	 <tr>

    <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"><br>   	 

	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Company Master </b></font>

     </td>

   </tr>

	 <tr>

     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">    

	 <form name="frmCompany" method="POST" >  	

	 	<?php

	 		if(!isset($_SESSION["company_id"]))

	 		{

	 		?>

     	

        <?php

        	}

        	else

        	{

        		$strsql="select * from emp_company where company_id=".$_SESSION["company_id"]."";

        		$result=mysql_query($strsql);

        		$row=mysql_fetch_assoc($result);

        ?>

       			<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" width="70%">

          <tr>

            <td width="33%" class="txtleft">Company Name</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

            <?php

				 echo"<input type=text class=txtbox size=50 name='txtName' id='txtName' 

				 value='" .$row["company_name"]."'></td>";

				?>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Address 1</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

			<?php

				 echo"<input type=text class=txtbox size=50 name='txtAdd1' id='txtAdd1' 

				 value='" .$row["company_add1"]."'></td>";

			?>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Address 2</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

			<?php

				 echo"<input type=text class=txtbox size=50 name='txtAdd2' id='txtAdd2' 

				 value='" .$row["company_add2"]."'></td>";

			?>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Actual Man Power</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

			<?php

				 echo"<input type=text class=txtbox size=50 name='txtManPower' id='txtManPower' 

				 value='" .$row["actual_manpower"]."'></td>";

			?>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Nature of Activity</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

			<?php

				 echo"<input type=text class=txtbox size=50 name='txtActivity' id='txtActivity' 

				 value='" .$row["activity"]."'></td>";

			?>

          </tr>

		  <tr>

            <td width="33%" class="txtleft">Installed Capacity</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

			<?php

				 echo"<input type=text class=txtbox size=50 name='txtInstCapacity' id='txtInstCapacity' 

				 value='".$row["inst_capacity"]."'></td>";

			?>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Unit</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<?php

				 echo"<input type=text class=txtbox size=50 name='txtUnit' id='txtUnit' 

				 value='".$row["unit"]."'></td>";

			?></td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Phone</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

			<?php

				 echo"<input type=text class=txtbox size=50 name='txtPhone' id='txtPhone' 

				 value='".$row["Phone"]."'></td>";

			?>

          </tr>

           <tr>

            <td width="33%" class="txtleft">Email</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

			<?php

				 echo"<input type=text class=txtbox size=50 name='txtEmail' id='txtEmail' 

				 value='".$row["Email"]."'></td>";

			?>

          </tr>

          <tr>

            <td width="100%" align=right colspan="3">

			<?php echo"

			<input type=button value='update' class=button

			onclick='javascript:updateCompany(".$_SESSION["company_id"].")'>&nbsp;";

			?>

            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          </tr>

        </table>

        <?php

        }

        ?>

        </form>

        &nbsp;</td>

     </tr>

	 <td width="100%" align="left"  background="images/createaccountbottom.gif" height="30" valign="bottom">

     </td>     

 </table>

		 </td>

       </tr> 

</table>



 

    

</center>