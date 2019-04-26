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

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF">     

        

	    <tr>

         <td width="100%"  valign="middle"  align=center>

         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >

     <tr>

     <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"> <br>    	 

	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Product Master</b></font>

     </td>

   </tr>

   

	 <tr>

     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">

	 <form name="frmCompany">   

	 	<?php

		 	if(isset($_SESSION["ed_item_id"]))

	 		{

				$id=$_SESSION["ed_item_id"];

			}

			else

			{

				$id=0;

			}

			//echo "id=".$id;

	 		if($id==0)

	 		{

	 		?>

		<br>  	

     	<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" 

		 width="70%">

		 

		 <tr>

            <td width="33%" class="txtleft">Financial Year</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">

				<select name="cmbFinYear" id="cmbFinYear" class=combo1 onchange="JavaScript:dispProduct()"

				onclick="JavaScript:dispProduct()">

				<option value=0>------- Select Financial Year ---------</option>

				<?php

					$sql="select * from emp_fin_year order by year" ;

					$result=mysql_query($sql);

					while($row=mysql_fetch_array($result))

					{

						echo "<option value=".$row["year"].">".$row["fin_year"]."</option>";						

					}

				?>

				</select>

			</td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Item Name</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="40" name="txtName" 

			id="txtName"></td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Installed Capacity</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="40" name="txtInstCapacity" 

			id="txtInstCapacity"></td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Achievable Capacity</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="40" name="txtAchCapacity" 

			id="txtAchCapacity"></td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Unit</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="40" name="txtUnit" 

			id="txtUnit"></td>

          </tr>

          <tr>

            <td width="100%" align=right colspan="3"><input type=button value="update" class=button

			onclick="javascript:updateProduct(0)">&nbsp;

            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          </tr>

        </table>

        <?php

        }

        else

        {

        	$strsql="SELECT * FROM emp_products WHERE item_code=".$_SESSION["ed_item_id"]."";

        	$result=mysql_query($strsql);

        	$row=mysql_fetch_assoc($result);

        	//echo $strsql;

        ?>

        <table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" 

		 width="70%">

		 <tr>

            <td width="33%" class="txtleft">Financial Year</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">

				<select name="cmbFinYear" id="cmbFinYear" class=combo1 onchange="JavaScript:dispProduct()"

				onclick="JavaScript:dispProduct()">

				<option value=0>--- Select Financial Year --------</option>

				<?php

					$sql="select * from emp_fin_year order by year" ;

					$result123=mysql_query($sql);

					while($row123=mysql_fetch_array($result123))

					{

						if($row["fin_year"]==$row123["fin_year"])

						{

							echo "<option value=".$row123["year"]." selected>".$row123["fin_year"]."</option>";		

						}

						else

						{

							echo "<option value=".$row123["year"].">".$row123["fin_year"]."</option>";		

						}				

					}

				?>

				</select>

			</td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Item Name</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

            <?php

				echo"<input type=text class=txtbox size='40' name='txtName' id='txtName' 

				value='".$row["item_name"]."'>"

			?></td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Installed Capacity</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;

            <?php

				echo"<input type=text class=txtbox size=40 name=txtInstCapacity

				id=txtInstCapacity value='".$row["inst_capacity"]."'>";

			?></td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Achievable Capacity</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<?php

				echo"<input type=text class=txtbox size=40 name=txtAchCapacity

				id=txtAchCapacity value='".$row["ach_capacity"]."'>";

			?></td>

          </tr>

          <tr>

            <td width="33%" class="txtleft">Unit</td>

            <td width="2%" class="txtleft">:</td>

            <td width="65%" class="txtleft">&nbsp;<?php

				echo"<input type=text class=txtbox size=40 name=txtUnit

				id=txtUnit value='".$row["unit"]."'>";

			?></td>

          </tr>

          <tr>

          <?php echo"

            <td width='100%' align=right colspan='3'><input type=button value='update' class=button

			onclick=javascript:updateProduct(".$_SESSION["ed_item_id"].")>";

			?>&nbsp;

            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          </tr>

        </table>

        <?php

        }

        ?>

        </form>

        &nbsp;</td>

     </tr>

     <tr>

     <td width="100%" align="left"  background="images/createaccountbottom.gif" height="30" valign="bottom"> 

     </td>

   </tr>

  

   <div id="re"></div>

   <div id="w"></div>

 </table>

		 </td>

       </tr>       

       

     </table>

<div id="pro"></div>     

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 

 

</table>