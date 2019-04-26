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
	$_SESSION["mainpage"]="fvariablelist";
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber1"  bordercolor="#C4E5F9">
   <tr>
     <td width="100%" valign=top align=center  >    
     <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">       
	    <tr>
         <td width="100%" height="300" valign="middle"  align=center>
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="98%" id="AutoNumber1" >
     <tr>
     <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"> <br>    	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Variable List 1</b></font>
     </td>
   </tr>
	 <tr>
     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">
     	<br>
     	<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" 
		 width="100%">
          <tr>
            <td width="20%" class="txtright1"></td>
            <td width="80%" class="txtleft">
			Select Month : <select name="cmbMonth"  id="cmbMonth" class=combo1 >
     		<option value=0>  </option>
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
     		&nbsp;&nbsp;&nbsp; Select Year : 
     		<select name="cmbYear" id="cmbYear" class=combo1 >
				<option value=0>  </option>
				<?php
					$sql="select * from emp_fin_year order by year" ;
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result))
					{
						echo "<option value=".$row["year"].">".$row["fin_year"]."</option>";						
					}
				?>
				</select> &nbsp;
				<input type=button value="show" class=button onclick="javascript:ManuFactReview()">
			</td>
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
     </td>
   </tr>
   
 </table>