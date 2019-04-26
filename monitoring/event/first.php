<tr>
   <td  align="center" valign="top" background="images/middle.png" >
   		<table  width=92% cellpadding="1" cellspacing="1" border=0 bordercolor="#FFFFFF"  >
			<tr>
			<td width=50% valign=top class="txtlefthead"> Featured Videos - All</td>
			<td width=50% valign=bottom class="txtleft">
				Category 	<select name="cmbCategory" id="cmbCategory" class=comboblack 
				onchange="filt('cat',this.value)">
    					<option value=''> All Categories  </option>
    					<option value='Albums'> Albums </option>
						<option value='Event'> Events </option>
						<option value='Stage Show'> Stage Shows  </option>
						<option value='Tv Program'> Tv Programs </option>
	  			</select>&nbsp;&nbsp;
			</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
       <td width="958" height="287" align="center" valign="top" background="images/middle.png" >
       
       	<table width=940 cellpadding="1" cellspacing="1" border=0 >
			<tr>
			
			<td width="600" align="left" valign="top" >
			<div id="list" align="left" width="860">
				
			</div>
			</td>
			<td width="394" align="left" valign="top">
				<table width=100% cellpadding="1" cellspacing="1" border=0 bordercolor="#FFFFFF"  >
				<tr><td width="100%" align="center" valign="top" class=txtlefthead>
						What does we do						
				</td>
				</tr>
				<tr><td width="100%" align="center" valign="top" class=txtjustify>
					In fast moving modern life events like wedding, naming ceremony, convocation, anniversary, birth day party,-provide both entertainment and relaxation. Wave Sat video stream them for enjoyment at a wider circle, worldwide, any time, at the click of a mouse. 						
				</td>
				</tr>
				
				<tr><td width="100%" align="left" valign="middle" class="normaltextleft"><b>
					<div id="al">Most Viewed Albums<input type="image" src="images/arrow.gif" onclick="expand('albums')"></div>
					<div id="albums"  ></div>
					<div id="ev">Most Viewed Events<input type="image" src="images/arrow.gif" onclick="expand('events')"></div>
					<div id="events" ></div>
					<div id="st">Most Viewed Stage Shows<input type="image" src="images/arrow.gif" onclick="expand('stage')"></div>
					<div id="stage" ></div>
					<div id="tvp">Most Viewed Tv Programs<input type="image" src="images/arrow.gif" onclick="expand('tv')"></div>
					<div id="tv" ></div>
					</b>
				</td>
				</tr>
				
				<tr><td width="100%" align="center" valign="middle"  background="images/top10.gif" height=300>
					
					<iframe src="displist1.php" height=230 width=250 scrolling=auto frameborder=0></iframe>
				</td>
				</tr>
				</table>
			</td>
			</tr>
		</table>
       	</div>
       	
       </td>
     </tr>