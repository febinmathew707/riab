<?php 

	session_start();

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
<title>MONTHLY REPORT ON OPERATIONS OF PUBLIC SECTOR UNITS</title>
<script src="search.js"></script>
<script src="profile.js"></script>
<script src="login.js">	</script>
<script src="update.js">	</script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
</head>
<body topmargin=0 leftmargin=0>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" align="center" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="950" height="100">
      
      <tr>
        <td width="700" height="33" align="center" colspan="2">
        <table class="black" border="0" cellpadding="5" cellspacing="0" width="100%">						<tbody><tr>
						
						<td valign="top" width="20"><div style="" align="justify">1</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Drugs &amp; Pharmaceuticals Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.ksdp.co.in/" target="_blank">http://www.ksdp.co.in</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">2</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						The Kerala Minerals &amp; Metals Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.kmml.com/" target="_blank">http://www.kmml.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">3</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Travancore Titanium Products Ltd.<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.travancoretitanium.com/" target="_blank">http://www.travancoretitanium.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">4</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"></font><div style="color: rgb(153, 0, 0);" align="justify">
<font face="verdana,geneva" size="1">						Kerala State Industrial Enterprises Ltd<br>
						</font></div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keralarcade.com/ksie.php" target="_blank">http://www.keralarcade.com/ksie.php</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">5</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala Small Industries Development Corporation Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keralasidco.com/" target="_blank">http://www.keralasidco.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">6</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						The Kerala Ceramics Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keralaceramics.com/" target="_blank">http://www.keralaceramics.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">7</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Malabar Cements Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.malabarcements.com/" target="_blank">http://www.malabarcements.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">8</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						The Travancore Cements Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.travcement.com/" target="_blank">http://www.travcement.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">9</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Travancore-Cochin Chemicals Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.tcckerala.com/" target="_blank">http://www.tcckerala.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">10</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala Electrical &amp; Allied Engineering Company Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.kelindia.com/" target="_blank">http://www.kelindia.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">11</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						United Electrical Industries Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.unilecindia.com/" target="_blank">http://www.unilecindia.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">12</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Traco Cable Company Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.tracocable.com/" target="_blank">http://www.tracocable.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">13</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Transformers and Electricals Kerala Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.telk.com/" target="_blank">http://www.telk.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">14</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Electronic Development Corporation Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltron.org/" target="_blank">http://www.keltron.org/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">15</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Keltron Electro Ceramics Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltronelcera.com/" target="_blank">http://www.keltronelcera.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">16</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Keltron Crystals Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltroncomp.com/kxl/index.html" target="_blank">http://www.keltroncomp.com/kxl/index.html</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">17</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Keltron Magnetics Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltroncomp.com/kml/index.html" target="_blank">http://www.keltroncomp.com/kml/index.html</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">18</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Keltron Component Complex Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltroncomp.com/" target="_blank">http://www.keltroncomp.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">19</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Steel Industrials Kerala Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.steelinkerala.com/" target="_blank">http://www.steelinkerala.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">20</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala Automobiles Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.industriesministerkerala.gov.in/www.keralaautomobile.com" target="_blank">www.keralaautomobile.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">21</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Steel and Industrial Forgings Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"></font><div style="" align="justify">
<font face="verdana,geneva" size="1">						<a href="http://www.siflindia.com/" target="_blank">http://www.siflindia.com</a><br>
						</font></div></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">22</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Autokast Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.autokast.com/" target="_blank">http://www.autokast.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">23</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Textile Corporation Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://kstcl.org/" target="_blank">http://kstcl.org</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">24</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala Khadi and Village Industries Board<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.kkvib.org/" target="_blank">http://www.kkvib.org</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">25</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Palmyrah Products Development and workers welfare corporation Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"></font><div style="" align="justify">
<font face="verdana,geneva" size="1">						<a href="http://www.kelpalm.com/" target="_blank">http://www.kelpalm.com</a><br>
						</font></div></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">26</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Forest Industries (Travancore) Ltd.<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.fitkerala.com/" target="_blank">http://www.fitkerala.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">27</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Foam Mattings (India) Ltd.<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.fomil.com/" target="_blank">http://www.fomil.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">28</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Coir Corporation Ltd.<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keracoir.com/" target="_blank">http://www.keracoir.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">29</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Cashew Development Corporation Ltd<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"></font><div style="" align="justify">
<font face="verdana,geneva" size="1">						<a href="http://www.cashewcorporation.com/" target="_blank">http://www.cashewcorporation.com</a><br>
						</font></div></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">30</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Co-Operative Coir Marketing Federation Limited<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.coirfed.com/" target="_blank">http://www.coirfed.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">31</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Cashew Workers Apex Industrial Co-Operative Society Ltd.<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.cashewcapex.com/" target="_blank">http://www.cashewcapex.com</a><br>
						</div></font></td>
						</tr>
						</tbody></table>					<!-------->
					</td>
					<td background="links.php_files/krm_27.jpg">
                    <img src="links.php_files/spacer.gif" width="1" height="1"></td>
				   </tr>
				   <tr>
					<td background="links.php_files/krm_30.jpg" height="18" width="20">
                    <img src="links.php_files/spacer.gif" width="1" height="1"></td>
					<td background="links.php_files/krm_31.jpg">
                    <img src="links.php_files/spacer.gif" width="1" height="1"></td>
					<td background="links.php_files/krm_33.jpg" height="18" width="17">
                    <img src="links.php_files/spacer.gif" width="1" height="1"></td>
				   </tr>
				</tbody></table><br>
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
				  <tbody><tr>
					<td height="37" width="20"><img src="links.php_files/krm_20.jpg" alt="" height="37" width="20"></td>
					<td valign="top" width="100%">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
						  <tbody><tr>
							<td><img src="links.php_files/spacer.gif" height="4"></td>
						  </tr>
						  <tr>
							<td background="links.php_files/krm_24800.jpg" height="33">
							<font style="color: rgb(255, 255, 255); font-size: 12px; font-weight: bold; font-family: Verdana,Arial,Helvetica,sans-serif;">COUNCILS</font></td>
						  </tr>
						</tbody></table>
					</td>
					<td height="37" width="17"><img src="links.php_files/krm_22.jpg" alt="" height="37" width="17"></td>
				  </tr>
				  <tr>
					<td background="links.php_files/krm_26.jpg">
                    <img src="links.php_files/spacer.gif" width="1" height="1"></td>
					<td>
					<!------->
					<table class="black" border="0" cellpadding="5" cellspacing="0" width="802%">						<tbody><tr>
						
						<td valign="top" width="20"><div style="" align="justify">1</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala Council for Historical Research (KCHR)<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keralahistory.ac.in/" target="_blank">http://www.keralahistory.ac.in</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">2</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Council for Science Technology and Environment (KSCSTE)<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.kscste.org/" target="_blank">http://www.kscste.org</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">3</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Kerala State Sports Council<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.sportscouncil.kerala.gov.in/" target="_blank">http://www.sportscouncil.kerala.gov.in</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">4</div></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						Cashew Export Promotion Council of India (CEPCI)<br>
						</div></font></td>
						<td valign="top" width="320">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://cashewindia.nic.in/" target="_blank">http://cashewindia.nic.in</a><br>
						</div></font></td>
						</tr>
						</tbody></table>
    </td>
  </tr>
</table>
		
		</td>
        
      </tr>
      
      
    </table>
    
<div id="w"></div>
<div id="disp"></div>
</body>

</html>