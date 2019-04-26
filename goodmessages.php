<?php
session_start();
if(isset($_SESSION['login']))
	$uid=$_SESSION['login'];
else
	$uid="";
require_once('php/DBCon.php');
$conn=new DBCon();
$message_id_arr=array();
$con=$conn->connect('anonypus');
if($con)
{
	//echo "connection established";
	$totcount=50;
	if(!isset($_GET["page"]))
	{	
		$result=$conn->select("SELECT * FROM tbllovemessages limit 0,$totcount");
		$page=1;
	}
	else
		{
			if($_GET["page"]>=1)
				$page=$_GET["page"];
			else
				$page=1;
			$start=(($page-1)*$totcount);
			$result=$conn->select("SELECT * FROM tbllovemessages limit $start,$totcount");
			//echo "SELECT * FROM tbllovemessages limit $start,$totcount";			
		}
	if($uid!="")
	{
		$result_fav=$conn->select("select messageid from favorites where userid=".$uid." and msg_type='L'");
		while($messageid=mysql_fetch_array($result_fav))
		{
			$message_id_arr[]=$messageid['messageid'];
		}
	}
}

$td_id=1;
sort($message_id_arr);
//print_r($message_id_arr);
$messageid_count=0;
?>
<!DOCTYPE html>
<html>
   <head>
   		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Website name</title>
      <link rel="stylesheet" href="css/common.css" type="text/css" />
      <script src="js/jquery-1.10.1.min.js"></script>
		<script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/custom.js"></script>
      <!--<link rel="stylesheet" href="css/responsive.css" type="text/css" />-->
       <script>
 		$(document).ready(function() {
			resize();
		});
		
	
function resize()
{
	var left=$("#gudrt").offset().left;
			var width=$(window).width()-$("#gudrt").offset().left; 
			margin=$(window).width()*0.02;
			width -= margin			
			$("#div-tbl-sent").css('marginLeft', left);
			$("#div-tbl-sent").css('width', width);
}
	 </script>
    
  </head>
   <body bottommargin="0" topmargin="0" marginwidth="0" marginheight="0">
   	<div class="wrapper">
      <?php include('header.php'); ?>
      <!--Header ends here-->
      	<div id="menu-right">
        <ul id="ul-menu-right">        	
			<a href="evilmessages.php"><li id="menu-li-evil">HATE</li></a>
            <a href="index.php"><li id="menu-li-custom">CUSTOM</li></a>
        </ul>
        </div>    
      <section id="content">
      	<!--<div id="container">-->
      	<div id="gudrt" >
	        <span>LOVE</span>
        </div>
        <div id="div-tbl-sent">
        <input type="hidden" id="uid" value="<?php echo $uid; ?>" />
        	<table id="msgtbl" border="0">
            	<?php
					while($row=mysql_fetch_array($result))
					{		
				?>
        	<form name="gudmsgfrm" id="gudmsgfrm" class="gudmsgfrm" method="get" action="send1.php">             
        		<tr> 
        			<td class="msgno"><?php echo $row['sentno']; ?></td>
                    <input type="hidden" id="msgno<?php echo $td_id; ?>" value="<?php echo $row['id'] ?>" />
        			 <?php if($uid==""){ ?>
                    <td <?php  if($uid==""){ echo "onclick='loginError()'"; } else{ echo "onclick='changeStar(this.id)'"; } 
					echo "id='".$td_id."'";?> align="center" valign="middle">
                    <?php
					if($row['favorite']==0){ echo "<img src='images/star_03.png' style='margin-top:15px'>"; } else { echo "<img src='images/yellowstar_03.png' style='margin-top:15px'>"; }?>
                    </td>
                    <?php }
					else
					{
						//echo $message_id_arr[$messageid_count];
					 ?>
                     <td <?php if($row['id']!=$message_id_arr[$messageid_count]){ echo "class='msg-grey-star' id='".$td_id."'"; } else { $messageid_count++; echo "class='msg-yellow-star' id='".$td_id."'"; } if($uid==""){ echo "onclick='loginError()'"; } else{ echo "onclick='changeStar(this.id)'"; }?> ></td>
                     <?php } ?>
        			<td class="txtmsg">
						<?php echo $row['message']; ?>
                        <input type="hidden" name="text-custom-msg" value="<?php echo $row['message']; ?>" />
                        <input type="hidden" name="page" value="good" />
                    </td>
        			<td class="btnmsg"><input type="submit" value="SEND" id="submit" /></td>
        		</tr>
            </form>              
                <?php
				$td_id++;
					}
				?>   
                <tr>
                <td colspan="3" align="left">
                	 <?php
					 if($page>1)
					  {
						  $pageno=$page-1;
						  echo "<a href='goodmessages.php?page=$pageno'><input type='button' id='submit' value='BACK' /></a>";
					  }
				?>
                </td> 
                <td align="left">
               
                <?php
					  $result=$conn->select("SELECT count(*) FROM tbllovemessages");
					  $row=mysql_fetch_row($result);
					  echo $row;
					  if($row[0]>($page*$totcount))
						  {
							  $pageno=$page+1;
							  echo "<a href='goodmessages.php?page=$pageno'><input type='button' id='submit' value='NEXT' /></a>";
						  }					 
					  ?>
                </td>                                                                                                                  
        	</table><br>

            
        </div>	             
      </section><!--Content ends here--> 
     <?php include('footer.php'); ?>
    </div><!--Wrapper ends here-->
   </body>
</html>

<script type="text/javascript">
var changeStar=function(id)
{
	var classname=$('#'+id).attr('class');
	var uid=$('#uid').val();
	var msgNo=$('#msgno'+id).val();
	if(classname=="msg-grey-star")
	{
		$('#'+id).attr('class','msg-yellow-star');
		var data="uid="+uid+"&msgno="+msgNo+"&favstat=0&msgtype=L";
		//alert(data)
		
			$.ajax({
				 url:"php/fav.php",
				 //type:"POST",
				 data:data,							 
				 success:function(html)
				 {	
				// alert(html);
				 }
			});
	}
	else
	{
		$('#'+id).attr('class','msg-grey-star');
		var data="uid="+uid+"&msgno="+msgNo+"&favstat=1&msgtype=H";
		//alert(data)
		
			$.ajax({
				 url:"php/fav.php",
				 //type:"POST",
				 data:data,							 
				 success:function(html)
				 {	
				 //alert(html);
				 }
			});
	}
}
var loginError=function()
{
	alert("Login to save favorites")
}


function send1(r)
{
	var data=r;
	alert(data);
	window.location.href="send1.php?text-custom-msg="+data;
}

</script>