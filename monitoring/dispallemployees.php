<?php session_start(); 
	$_SESSION["mainpage"]="listemployees";
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#C0C0C0">

	   <tr>
         <td width="100%" height="100" valign="top" background="imghome/body.gif" align=center>         
         <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" height="180" >
           <tr>
             <td width="47%" height="45">&nbsp;</td>
             <td width="53%" height="25">&nbsp;</td>

           </tr>
           <tr>
             <td width="65%" height="141">&nbsp;</td>
             <td width="35%" height="141" align="left" valign="top" class="txtleftwhite">
             
            
<table border="0" cellpadding="0" cellspacing="0"   id="AutoNumber4" height="10">
               <tr>
               	 <td width="520" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite" onclick="hide()">Name</td>
                 <td width="386" height="24" colspan=2><input type="text" name="txtKeyword" 
				 id="txtKeyword" 
				 size="53" class="txtboxgrey"></td>
                 
               </tr>
               <tr>
               	 <td width="20" height="24" class="txtleftwhite">&nbsp;&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Qualification</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbQualification" id="cmbQualification" size="50" 
				 class="txtboxgrey" readonly="readonly">
				 </td>
				 <td width="65" height="24" class="txtleftwhite">
				 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onmouseup="view('quali')" ></td>
               </tr>
               <tr>
               	<td width="20" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Designation</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbDesignation" id="cmbDesignation" size="50" 
				 class="txtboxgrey"></td>
				 <td width="65" height="24" class="txtleftwhite">
				 <input type="image" src="images/arrow.gif" width="18" height="21"
				 onclick="view('desig')"  ></td>
               </tr>
               <?php
			   	if($_SESSION["LogType"]=="AD") 
			   	{
               ?>
               <tr>
                <td width="20" height="25" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Company</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbCompany" id="cmbCompany" size="50" class="txtboxgrey">
				 
				 </td>
				 <td width="65" height="24" class="txtleftwhite" align="left">
                 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onclick="view('company')" ></td>
               </tr>
                <?php
               	}
               	?>
               	
               <tr>
               <td width="500" valign="middle" align="left" colspan=4 height=23>
               <?php
			   	if($_SESSION["LogType"]=="AD") 
			   	{
               ?>
               <table width="500" height=17 cellpadding=0 cellspacing="0" border=0 
			   style="border-collapse: collapse" bordercolor="#111111">
               <tr>
                <td width="300" height="17" class="txtleftwhite"></td>
                 <td width="204" height="17" class="txtleftwhite" valign="top">City</td>
                 <td width="173" height="17" align=left>
				 <input type="text" name="cmbCity" id="cmbCity" size="31" class="txtboxgrey">			 
				 </td>	
				 <td width="26" height="17" align=left>				 
				 <input type="image" src="images/arrow.gif" width="18" height="21" 
				  >
				 </td>			 
				 <td width="170"  class="txtleftwhite" valign="bottom" height="17">
				 
				 <input type="image" src="imghome/button1.gif" onclick="getState('name','',1,1,1)"
				 onmouseover="swap1()" onmouseout="swap()" id="img" width="80" height="30"></td>
               </tr>
               </td>
               </table>
               <?php
               	}
               	else
               	{
               	?>
               	 <table width="500" height=17 cellpadding=0 cellspacing="0" border=0 
			   style="border-collapse: collapse" bordercolor="#111111">	
					<tr>
                <td width="32" height="17" class="txtleftwhite"></td>
                 <td width="94" height="17" class="txtleftwhite" valign="top"></td>
                 <td width="200" height="17" align=right>
				 		<input type="image" src="imghome/button1.gif" onclick="getState('name','',1,1,1)"
				 onmouseover="swap1()" onmouseout="swap()" id="img" width="80" height="30">
				 </td>	
				 <td width="26" height="17" align=left>				 
				 	 
				 </td>			 
				 <td width="170"  class="txtleftwhite" valign="bottom" height="17">
				
				</td>
               </tr>
               
             </table>
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
       <tr>
       	
         <td width="100%" height="46" valign="top" background="" class="txtleft">
         <form action="login.php" method="POST" name="frmlogin"  >
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <font face="Verdana" size="4"><b><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Featured List</b></font>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Show Report" onclick="showReport()" class=button><span id="w"></span> 
		<span id="wait"></span> 
		&nbsp;&nbsp;&nbsp;<?php 
			if($_SESSION["LogType"]=="AD") 
			{
			   		echo "<a href='JavaScript:changePwd()'>Change Password</a>";
			}
		
		?>
		</form>
		</td>
		
		<div id="pwd" style="position: absolute; z-index: 500;left: 180px; width:500; height:150; top:290px;background-image: url('images/bgpwd.gif'); visibility:hidden "></div>
		<div id="captcha" style="position: absolute; z-index: 500;left: 210px; width:400; top:430px; ; ">
		</div>
	<span id="quali" style="position: absolute; z-index: 500;left:648px; width:303; top:227px; height:200 ; overflow:scroll; visibility:hidden; " ></span>
		<span id="desig" style="position: absolute; z-index: 500;left:648px; width:303; top:250px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<span id="company" style="position: absolute; z-index: 500;left:648px; width:303; top:277px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<span id="city" style="position: absolute; z-index: 500;left:0px; width:220; top:358px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<div id="reports" style="position: absolute; z-index: 100;left:70px; width:220; top:375px; height:400 ; width:850; overflow:auto;visibility:hidden;background-color: #FFFFFF" align="left"></div>
		
       </tr>
       <tr onMouseOver="this.bgColor ='#C0C0C0'">
         <td width="100%" height="170" valign="top" background="" align=center >
         <div id="listmembers" ></div>
         </td>
       </tr>   
	   
	   <span id="w1"></span>    
       <tr>
         <td width="100%" height="58" valign="top" background="imghome/bottom.gif" align=right>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       </tr>
       </form>
    </table>