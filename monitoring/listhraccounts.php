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

	$_SESSION["mainpage"]="listhraccount";

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">       

       

	    <tr>

         <td width="100%" height="300" valign="middle" align=center>

         

         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >

  <tr>

     <td width="100%" align="left"  background="images/createaccounttop.gif" height="39" valign=bottom>	 

	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b>List Created Accounts</b></font>

	 </td>

   </tr>

	 <tr>

     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif"><br>

     <form name="frmcreateaccount">

     	<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">

     	<tr>

		 <td width="40%" align="right" height="23" class="txtleft"> <b> User Name</b>

		 </td>

		 <td width="40%" align="right" height="23" class="txtleft"> <b> Company </b>

		 </td>

		 <td width="20%" align="right" height="23" class="txtleft"> <b> Delete Account</b>

		 </td>

		 </tr>

     	<?php

     		$strsql="SELECT * FROM  emp_user_setting where UTYPE='HR' and company_id=".$_SESSION["company_id"]."";

     		$result=mysql_query($strsql);

     		while($row=mysql_fetch_array($result))

     		{

     			$strsql1="SELECT UNAME FROM emp_user where id=".$row["ID"]."";

     			$result1=mysql_query($strsql1);

     			$row1=mysql_fetch_row($result1);

     		

     	?>

	 <tr >

     <td width="40%" align="right" height="23" class="txtleft">

     <?php echo $row1[0];

     ?>

    </td>

    <td width="40%" align="right" height="23" class="txtleft">

     <?php echo $row["COMPANY"];

     ?>

    </td>

    <td width="20%" align="right" height="23" class="txtright">

    	<?php 

    		echo "<a href=JavaScript:deleteaccount(".$row["ID"].")>";

		?><img src="images/delete1.png" alt="deleteaccount" border="0"></a>

    </td>

    </tr>

    <?php

    }

    ?>

   </table>

   </form>

     </td>

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