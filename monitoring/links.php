<?php 


	session_start();

	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["mainpage"]="links";
?>


    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" 
	width="100%" height="100">
      
      <tr>
        <td width="800" height="33" align="center" colspan="2">
        <table class="black" border="1" cellpadding="5" cellspacing="0" width="600" style="border-collapse: collapse" bordercolor="#E2E0E0">						<tbody><tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">1</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Drugs &amp; Pharmaceuticals Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.ksdp.co.in/" target="_blank">http://www.ksdp.co.in</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">2</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">The Kerala Minerals &amp; Metals Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.kmml.com/" target="_blank">http://www.kmml.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">3</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Travancore Titanium Products Ltd.<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.travancoretitanium.com/" target="_blank">http://www.travancoretitanium.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">4</font></div></td>
						<td valign="top" width="232" align="left">
						<div style="color: rgb(153, 0, 0);" align="justify">
<font face="verdana,geneva" size="1" color="#000000">						Kerala State Industrial Enterprises Ltd<br>
						</font></div></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keralarcade.com/ksie.php" target="_blank">http://www.keralarcade.com/ksie.php</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">5</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala Small Industries Development Corporation Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keralasidco.com/" target="_blank">http://www.keralasidco.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">6</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">The Kerala Ceramics Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keralaceramics.com/" target="_blank">http://www.keralaceramics.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">7</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Malabar Cements Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.malabarcements.com/" target="_blank">http://www.malabarcements.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">8</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">The Travancore Cements Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.travcement.com/" target="_blank">http://www.travcement.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">9</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Travancore-Cochin Chemicals Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.tcckerala.com/" target="_blank">http://www.tcckerala.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">10</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala Electrical &amp; Allied Engineering Company Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.kelindia.com/" target="_blank">http://www.kelindia.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">11</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">United Electrical Industries Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.unilecindia.com/" target="_blank">http://www.unilecindia.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">12</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Traco Cable Company Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.tracocable.com/" target="_blank">http://www.tracocable.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">13</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Transformers and Electricals Kerala Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.telk.com/" target="_blank">http://www.telk.com/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">14</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Electronic Development Corporation Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltron.org/" target="_blank">http://www.keltron.org/</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">15</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Keltron Electro Ceramics Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltronelcera.com/" target="_blank">http://www.keltronelcera.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">16</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Keltron Crystals Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltroncomp.com/kxl/index.html" target="_blank">http://www.keltroncomp.com/kxl/index.html</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">17</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Keltron Magnetics Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltroncomp.com/kml/index.html" target="_blank">http://www.keltroncomp.com/kml/index.html</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">18</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Keltron Component Complex Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keltroncomp.com/" target="_blank">http://www.keltroncomp.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">19</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Steel Industrials Kerala Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.steelinkerala.com/" target="_blank">http://www.steelinkerala.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">20</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala Automobiles Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.industriesministerkerala.gov.in/www.keralaautomobile.com" target="_blank">www.keralaautomobile.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">21</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Steel and Industrial Forgings Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<div style="" align="justify">
<font face="verdana,geneva" size="1">						<a href="http://www.siflindia.com/" target="_blank">http://www.siflindia.com</a><br>
						</font></div></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">22</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Autokast Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.autokast.com/" target="_blank">http://www.autokast.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">23</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Textile Corporation Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://kstcl.org/" target="_blank">http://kstcl.org</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">24</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala Khadi and Village Industries Board<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.kkvib.org/" target="_blank">http://www.kkvib.org</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">25</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Palmyrah Products Development and workers welfare corporation Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<div style="" align="justify">
<font face="verdana,geneva" size="1">						<a href="http://www.kelpalm.com/" target="_blank">http://www.kelpalm.com</a><br>
						</font></div></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">26</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Forest Industries (Travancore) Ltd.<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.fitkerala.com/" target="_blank">http://www.fitkerala.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">27</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Foam Mattings (India) Ltd.<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.fomil.com/" target="_blank">http://www.fomil.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">28</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Coir Corporation Ltd.<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.keracoir.com/" target="_blank">http://www.keracoir.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">29</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Cashew Development Corporation Ltd<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<div style="" align="justify">
<font face="verdana,geneva" size="1">						<a href="http://www.cashewcorporation.com/" target="_blank">http://www.cashewcorporation.com</a><br>
						</font></div></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">30</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Co-Operative Coir Marketing Federation Limited<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.coirfed.com/" target="_blank">http://www.coirfed.com</a><br>
						</div></font></td>
						</tr>
												<tr>
						
						<td valign="top" width="20"><div style="" align="justify">
                          <font face="Verdana" size="1">31</font></div></td>
						<td valign="top" width="232" align="left">
						<font face="verdana,geneva" size="1"><div style="color: rgb(153, 0, 0);" align="justify">
						<font color="#000000">Kerala State Cashew Workers Apex Industrial Co-Operative Society Ltd.<br>
						</font>
						</div></font></td>
						<td valign="top" width="270">
						<font face="verdana,geneva" size="1"><div style="" align="justify">
						<a href="http://www.cashewcapex.com/" target="_blank">http://www.cashewcapex.com</a><br>
						</div></font></td>
						</tr>
						</tbody></table>					<!-------->
					</td>
					<td background="links.php_files/krm_27.jpg">
                    <img src="links.php_files/spacer.gif" width="1" height="1"></td>
				   </tr>
				  
				</tbody></table><br>
								
    
</body>

</html>