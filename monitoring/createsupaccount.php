<?php session_start();

	include("../connectdb/connect.php");

 	mysql_select_db("soemonit_pentaclt",$con);

	 if(!$con)

	{

		die('Could not connect to server' . mysql_error());

	} 

	$_SESSION["mainpage"]="createmsaccount";

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#ffffff">    

	    <tr>

         <td width="100%" height="300" valign="middle" background="" align=center>

         <form name="frmcreateaccount">

         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" 

		 id="AutoNumber1" height="216">

  <tr>

     <td width="100%" align="left"  background="images/createaccounttop.gif" height="39" valign=bottom>	 

	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Create Officer Account</b></font>

	 </td>

   </tr>

	 <tr>

     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">

     <br>

     	<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" 

		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">

	<tr >

     <td width="51%" align="right" height="23" class="txtright">

     <font color="#000000">Name</font></td>

     <td width="2%" height="23">:</td>

     <td width="47%" height="23" >

    

       <input type="text" name="txtname" size="50" id="txtname" class=txtbox >

     </td>

   </tr>

   <tr >

     <td width="51%" align="right" height="23" class="txtright">

     <font color="#000000">Designation</font></td>

     <td width="2%" height="23">:</td>

     <td width="47%" height="23" >

    

       <input type="text" name="txtdesig" size="35" id="txtdesig" class=txtbox >

     </td>

	 <tr >

     <td width="51%" align="right" height="23" class="txtright">

     <font color="#000000">User Id</font></td>

     <td width="2%" height="23">:</td>

     <td width="47%" height="23" >

    

       <input type="text" name="txtuid" size="35" id="txtuid" class=txtbox >

     </td>

   </tr>

   <tr>

     <td width="51%" align="right" height="23" class="txtright">

     <font color="#000000">Password</font></td>

     <td width="2%" height="23">:</td>

     <td width="47%" height="23">

    

       <input type="password" name="txtpwd" id="txtpwd" size="35" class="txtbox">

&nbsp;</td>

   </tr>   

   

   <tr>

     <td width="51%" height="27" class="txtright">&nbsp;</td>

     <td width="2%" height="27"></td>

     <td width="47%" height="27">

     <?php

	 	echo "<input type=button value='create' onclick=createSup(".$_SESSION["company_id"].",'MS')>";

	 ?>

	 </td>

   </tr>

   </table>

     </td>

     </tr>     

   <tr>

     <td width="100%" align="right"  background="images/createaccountbottom.gif" height="40"></td>

   </tr>   

   <div id="re"></div>

   <div id="w"></div>

 </table>

 </form>

		 </td>

       </tr>       

       

       

     </table>