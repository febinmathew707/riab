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

	elseif($_SESSION['LogType']!='AD' && $_SESSION['LogType']!='RP')

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

	$_SESSION["mainpage"]="monthlyreport";

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">

       

       

	    <tr>

         <td width="100%" height="300" valign="middle"  align=left>

         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >

  <tr>

     <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"> <br>    	 

	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Monthly Report</b></font>

     </td>

   </tr>

	 <tr>

     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">

     	

     	<table border="0" cellpadding=0 cellspacing=0 style="border-collapse: collapse" bordercolor="#111111" 

		 width="80%">

          <tr>            

           <td height=50>

		

				<select name="cmbCompany" id="cmbCompany" class=combo1 

				 >

				<option value=0>--------------------- All company ------------------</option>

				<?php

					$sql="select * from emp_company" ;

					$result=mysql_query($sql);

					while($row=mysql_fetch_array($result))

					{

						echo "<option value=".$row["company_id"].">".$row["company_name"]."</option>";						

					}

				?>

				</select><br>

			

			</td>

          </tr>

          <tr>            

            <td width="100%" class="txtleft">

            <select name="cmbMonth"  id="cmbMonth" class=combo1 >

     		<option value=0> ---- select month ----- </option>

     		<option value=1> January </option>

     		<option value=2> February </option>

			<option value=3> March </option>

			<option value=4> April </option>

			<option value=5> May </option>

			<option value=6> June </option>

			<option value=7> July </option>

			<option value=8> August </option>

			<option value=9> September </option>

			<option value=10> October </option>

			<option value=11> November </option>

			<option value=12> December</option>

     	</select> &nbsp;

		 <select name="cmbYear" id="cmbYear" class=combo1  

		 >

				<option value=0> Financial Year </option>

				<?php

					$sql="select * from emp_fin_year" ;

					$result=mysql_query($sql);

					while($row=mysql_fetch_array($result))

					{

						echo "<option value=".$row["year"].">".$row["fin_year"]."</option>";						

					}

				?>

				</select>&nbsp;&nbsp;&nbsp;

				

				<select name=cmbStatus id=cmbStatus class=combo1>

				<option value="">Select Status</option>

        		<option value="A" > Accepted </option>

        		<option value="R"> Rejected </option>

        		</select>&nbsp;&nbsp;

				<input type=button value="Show" class=button onclick="listReport()">

			

			</td>

          </tr>

        </table>

        <div id="listRpt"></div>

        &nbsp;</td>

     </tr>

     

   <tr>

     <td width="100%" align="right"  background="images/createaccountbottom.gif" height="35"></td>

   </tr>

	



   

   <div id="re"></div>

   <div id="w"></div>

 </table>



		 </td>

       </tr>        

       

     </table>