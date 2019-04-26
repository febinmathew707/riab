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
	$_SESSION["mainpage"]="increloss"; 
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">      
        
	    <tr>
         <td width="100%" height="300" valign="middle"  align=center>
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
     <tr>
     <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"> <br>    	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Export to Excel</b></font>
     </td>
   </tr>
	 <tr>
     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">
     	<br>
     	<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" 
		 width="70%">
		 <!--
          <tr>
            <td width="33%" class="txtright1">From</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">
				<select name="cmbFMonth"  id="cmbFMonth" class=combo1 >
     		<option value=0>  select month  </option>
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
     		</select>
     		&nbsp;&nbsp;
     		<select name="cmbFYear" id="cmbFYear" class=combo1 >
				<option value=0>  select year </option>
				<?php
					/*
					$sql="select * from emp_fin_year order by year" ;
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result))
					{
						echo "<option value=".$row["year"].">".$row["year"]."</option>";						
						$last=$row["year"];					
					}
					$last=$last+1;
					echo "<option value=".$last.">".$last."</option>";*/
				?>
				</select>
			</td>
          </tr>
          -->
          
          <tr>
            <td width="10%" class="txtright1">Up To</td>
            <td width="2%" class="txtleft">:</td>
            <td width="88%" class="txtleft">
				<select name="cmbTMonth"  id="cmbTMonth" class=combo1 >
     		<option value=0>  ---- select month ----  </option>
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
     		</select>
     		&nbsp;&nbsp;
     		<select name="cmbTYear" id="cmbTYear" class=combo1 >
				<option value=0>  select year </option>				
				<?php
				
					$sql="select * from emp_fin_year order by year" ;
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result))
					{
						echo "<option value=".$row["fin_year"].">".$row["fin_year"]."</option>";	
						$last=$row["year"];								
					}
					$last=$last+1;
					//echo "<option value=".$last.">".$last."</option>";
					
				?>
				</select>&nbsp;&nbsp;<input type=button value="show" class=button
			onclick="javascript:secondvariable('excel.php')">
			</td>
          </tr>          
          <tr>
            <td width="100%" align=center colspan="3"> </td>
          </tr>
        </table>
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