<?php 

 session_start(); ?>

<?php

 	 if(!isset($_SESSION['Logged']))

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

	$_SESSION["profile"]=0;

	$_SESSION["mainpage"]="addblog";



?>

	

	<table border="0" cellpadding="0" cellspacing="0" 

	style="border-collapse: collapse" width="95%" id="AutoNumber3">

        <tr>

			<td valign="top"  width="100%" align="left" height="10">

			<?php

			if(isset($_SESSION["Logged"]))

				{

					echo "<embed src='movies/bloglinks.swf' height=25 width=476>";

		        	

				}

			?>	

			</td>

		</tr>

		<tr>

			<td valign="top"  width="100%" align="right"><img src="images/addissue.gif">

			</td>

		</tr>

		<tr>

        	<td width="100%" valign="top" align="left">

                  <table border="0" cellpadding="0" cellspacing="0" 

				   style="border-collapse: collapse" width="100%" id="AutoNumber3">

				   		

	        		  

					  <tr>

	        			<td width="100%" valign="top" align="left" 

						 height="250" >

							<table border="0" cellpadding="0" cellspacing="0" 

				   			style="border-collapse: collapse" width="100%" height="100%"

							   id="AutoNumber3">

							

							<!--

							<tr>

				        		<td width="1%" valign=top height=30></td>

								<td width="96%" valign="top" align="left" 

								class="leftnormal" height=30>

				                 	Region  &nbsp;

									 &nbsp;&nbsp;&nbsp;:  &nbsp;&nbsp;

									 <select name="cmbTag" id="cmbTag" class="combo">

									 	

									 	<option value="0">-------------- Select Region ------------</option>

									 	<!--

									 	<option value="Asean">Asean</option>

									 	<option value="Saarc">Saarc</option>

									 	<option value="MiddleEast">Middle East</option>

									 	<option value="Global">Global</option>

									 	

									 </select>

									 &nbsp;&nbsp;&nbsp;&nbsp;

									 published To <select name="cmbTo" id="cmbTo" class="combo">

									 

									 <option value="M">Members</option>

									 <option value="P">Publics</option>

									 </select>

								</td>

							</tr>

							-->

							<tr>

				        		<td width="1%" valign=top height=30></td>

								<td width="96%" valign="top" align="left" 

								class="leftnormal" height=30>

				                 	Title  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									 &nbsp;&nbsp;:  &nbsp;&nbsp;

									 <input type="text" name="txtTitle" size=80 id="txtTitle" class="txtbox"> 

									 

								</td>

							</tr>

							

							<tr>

				        		<td width="1%" valign=top height="30"></td>

								<td width="96%" valign="top" align="left" class="programs"

								height="100%">

				                 

									 <textarea rows=12 cols=100 name="txtdesc" id="txtdesc" class="txtbox">

									 </textarea> 

									 

								</td>

							</tr>						

							

							</table>

	                 			      	

						</td>

					  </tr> 

					 

				  </table>    	

			</td>

		</tr>

		

		<tr>

        	<td width="100%" valign="top" align="center">

        		<?php

        		

        		echo "<input type=button value='  Save  ' 

				onclick=saveBlog(0)>&nbsp;

        		<input type='Reset' value='  Clear  '>";

        		?>

			</td>

		</tr>			

    </table>

          

                    