<?php 
	session_start();
	//echo "ssfsd".$_SESSION['Logged'];
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
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
		
	
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script src="search.js"></script>
<script src="profile.js"></script>
<script src="login.js">	

</script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
<title>:: Employee Database - Kerala :: </title>
<style type="text/css">
<!--
A:link { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #7E1505; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #7E1505; TEXT-DECORATION: none; font-weight: normal }
-->
</style>
</head>

<?php
echo"
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties=fixed bgcolor=#FFFFFF 
onload=subsearch('name','',1,1,1,'First_Name','".$_SESSION["LogType"]."')  onkeydown=visible(event)> ";
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%"  bgcolor="#FFFFFF">
  <tr>
    <td width="100%" align="center" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="1000" bgcolor="#DDDDD8">
      <tr>
        <td width="100%" background="img_new/head.gif" height="115" class=txtleft valign="bottom">
	
		</td>
      </tr>
      <tr>
        <td width="100%" height="180" background="img_new/mainbg.gif" align="left" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" height="187" >
        	 <tr>
            <td width="100%" height="20" colspan="2" class=txtleft></td>
          </tr>
			 <?php
	   		if($_SESSION["LogType"]=="AD") 
	   		{
       ?>
          
           <?php
       		}
       		else if($_SESSION["LogType"]=="EM" || $_SESSION["LogType"]=="CO")
       		{
		?>
          
          <?php		
			}
       	?>
       	<span id="main">
          <tr>
            <td width="52%" height="100">&nbsp;</td>
            <td width="48%" height="165" align="left" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="95%" height="129">
            <tr>
                <td width="102%" height="45" colspan="4">&nbsp;</td>
              </tr>

              <tr>
                <td width="6%" height="26">&nbsp;</td>
                <td width="23%" class="txtleftwhite" height="26">Name</td>
                <td width="73%" height="26" colspan="2">
	   <span id="main">
	            <input type="text" name="txtKeyword" 
				 id="txtKeyword" 
				 size="53" class="txtboxgrey"></span></td>
              </tr>
              <tr>
                <td width="6%" height="22">&nbsp;</td>
                <td width="23%" class="txtleftwhite" height="22">Qualifictiaon</td>
                <td width="58%" height="22">
	   <span id="main0">
				 <input type="text" name="cmbQualification" id="cmbQualification" size="50" 
				 class="txtboxgrey" readonly="readonly"></span></td>
                <td width="15%" height="22">
	   <span id="main3">
				 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onmouseup="view('quali')" ></span></td>
              </tr>
              <tr>
                <td width="6%" height="21">&nbsp;</td>
                <td width="23%" class="txtleftwhite" height="21">Designation</td>
                <td width="58%" height="21">
	   <span id="main1">
				 <input type="text" name="cmbDesignation" id="cmbDesignation" size="50" 
				 class="txtboxgrey"></span></td>
                <td width="15%" height="21">
	   <span id="main4">
				 <input type="image" src="images/arrow.gif" width="18" height="21"
				 onclick="view('desig')"  ></span></td>
              </tr>
               <?php
			   	if($_SESSION["LogType"]=="AD") 
			   	{
               ?>
              <tr>
                <td width="6%" height="25">&nbsp;</td>
                <td width="23%" class="txtleftwhite" height="25">Company</td>
                <td width="58%" height="25">
	   <span id="main2">
				 <input type="text" name="cmbCompany" id="cmbCompany" size="50" class="txtboxgrey"></span></td>
                <td width="15%" height="25">
	   <span id="main5">
                 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onclick="view('company')" ></span></td>
              </tr>
               <?php
               	}
               	?>
              <tr>
                <td width="6%" height="19">&nbsp;</td>
                <td width="23%" class="txtleftwhite" height="19">
				 <?php
			   	if($_SESSION["LogType"]=="AD") 
			   	{
               ?>City
			   <?php
               	}
               	?>
			   </td>
                <td width="73%" height="19" colspan="2">
	   <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="101%" height="23">
         <tr>
           <td width="66%" height="23">
	   <span id="main6">
	   			 <?php
			   	if($_SESSION["LogType"]=="AD") 
			   	{
               ?>
				 <input type="text" name="cmbCity" id="cmbCity" size="42" class="txtboxgrey"></span></td>
           <td width="7%" height="23">
         
           <?php
               	}
               	?>
	   <span id="main7">
	   			 <?php
			   	if($_SESSION["LogType"]=="AD") 
			   	{
               ?>
				 <input type="image" src="images/arrow.gif" width="18" height="21" 
				  >
				  <?php
               	}
               	?></span></td>
           <td width="28%" height="23">
	   <span id="main8">
				 
				 <input type="image" src="imghome/button1.gif" onclick="getState('name','',1,1,1)"
				 onmouseover="swap1()" onmouseout="swap()" id="img" width="80" height="30"></span></td>
         </tr>
       </table>
                </td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td width="100%" height="128">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="1000" >
          <tr>
            <td width="183" height="441" background="img_new/side.gif" valign="top">
             <?php
			   	if($_SESSION["LogType"]=="AD") 
			   	{
               ?>
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
						<a href="createaccount.php" style="text-decoration:none">
						<font face=verdana color=#282800 size=2> Create Company Account</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#BDBDB5" height="25">
					<a href="listaccount.php" style="text-decoration:none">
						<font face=verdana color=white size=2> List Created Accounts</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
						
						<font face=verdana color=#282800 size=2> List Featured Employees</font>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#BDBDB5" height="25">
					<a href="companymaster.php" style="text-decoration:none">
						<font face=verdana color=white size=2> Company Master</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
						<a href="finyear.php" style="text-decoration:none">
						<font face=verdana color=#282800 size=2> Add Financial Year</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#BDBDB5" height="25">
					<a href="listmonthlyreport.php" style="text-decoration:none">
						<font face=verdana color=white size=2> Monthly Report</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
						<a href="logout.php" style="text-decoration:none">
						<font face=verdana color=#282800 size=2> Log Out</font></a>
				</td>
              </tr>
            </table>
            <?php
            }
            else
            {
			?>
				<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
						<a href="JavaScript:disp1('Create Password')" style="text-decoration:none">
						<font face=verdana color=#282800 size=2> Create Password</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#BDBDB5" height="25">
					<a href="JavaScript:disp1('Send Password')" style="text-decoration:none">
						<font face=verdana color=white size=2> Send Password</font></a>
				</td>
              </tr>
              
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
					<a href="turnover.php" style="text-decoration:none">
						<font face=verdana color=#282800 size=2> Add turnover</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#BDBDB5" height="25">
					<a href="productmaster.php" style="text-decoration:none">
						<font face=verdana color=white size=2> Product Master</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
					<a href="addprofile.php" style="text-decoration:none">
						<font face=verdana color=#282800 size=2> Add New Member</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#BDBDB5" height="25">
					<a href="listmonthlyreport.php" style="text-decoration:none">
						<font face=verdana color=white size=2> Monthly Report</font></a>
				</td>
              </tr>
              <tr>
                <td width="100%" align=center valign=middle bgcolor="#EEEEED" height=25>
						<a href="logout.php" style="text-decoration:none">
						<font face=verdana color=#282800 size=2> Log Out</font></a>
				</td>
              </tr>
            </table>
			<?php
			}
            ?>
            </td>
            <td width="817" height="441" bgcolor="#FFFFFF" align="right" valign="top">&nbsp;&nbsp;&nbsp;
            <input type="button" value="Show Report" onclick="showReport()" class=button><span id="w"></span> 
		<span id="wait"></span> <br>
			
				<div id="pwd" style="position: absolute; z-index: 500;left: 180px; width:500; height:150; top:290px;background-image: url('images/bgpwd.gif'); visibility:hidden "></div>
		<div id="captcha" style="position: absolute; z-index: 500;left: 210px; width:400; top:430px; ; ">
		</div>
	<span id="quali" style="position: absolute; z-index: 500;left:635px; width:303; top:230px; height:200 ; overflow:scroll; visibility:hidden; " ></span>
		<span id="desig" style="position: absolute; z-index: 500;left:635px; width:303; top:255px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<span id="company" style="position: absolute; z-index: 500;left:635px; width:303; top:275px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<span id="city" style="position: absolute; z-index: 500;left:0px; width:220; top:358px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<div id="report" style="position: absolute; z-index: 100;left:190px; width:180; top:310px; height:400 ; width:800; overflow:auto;visibility:hidden;background-color: #FFFFFF" align="left"></div>
			<div id="listmembers" ></div>
			<br>
			<span id="w1"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<br>
			</td>
          </tr>
          <tr>
		  <td colspan="2" height="10" valign=top bgcolor=white><img src="imghome/copyright.gif" width="815" height="24">
		  </td>
		  </tr>
        </table>
        </td>
      </tr>
       
    </table>
    </td>
  </tr>
</table>

</body>

</html>