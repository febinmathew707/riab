<?php 
 session_start(); ?>
<?php

//$fil="C:/Sunset.jpeg";
 //fopen($_POST["file"],"r");
 //echo $_REQUEST["file"];
 //echo file($_REQUEST["file"])
//$conn = ftp_connect("ftp.servage.net") or die("Could not connect");
 // ftp_login($conn,"wavesatlive","waveSAT123");
//echo realpath("bottom.swf");
//$source=fopen($_POST["file"],"r");
// echo ftp_fput($conn,realpath("student") ."/ss.jpg",$source,FTP_ASCII);
//echo copy(realpath("bottom.swf"),realpath("student") ."/b2.swf");
//
//ftp_chdir($conn,"wavesatlive.com");
//echo (ftp_rawlist($conn,"."));
//echo ftp_get($conn,"c:/ss.swf","bottom.swf",FTP_ASCII);
//ftp_close($conn);
	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	include("filesize.php");
	
		$type=$_GET["type"];
		$id=$_GET["id"];
		echo $type;
		
		
		
		if ($_FILES["file"]["error"] > 0)
		    {
		    //echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		    	switch($type)
				{
					case "news" :
								 
								 if ($id>=1)
										{	
												$strsql="UPDATE ev_videos SET ";
												$strsql=$strsql . "caption='" . str_replace("'","`",
												$_POST["txtHeading"]) . "' , ";
												$strsql=$strsql . "vid_desc= '" . str_replace("'","`",
												$_POST["txtdesc"]) . "' , ";
												$strsql=$strsql . "vid_name= '" . str_replace("'","`",
												$_POST["txtTitle"]) . "' , ";
												$strsql=$strsql . "vid_url= '" . str_replace("'","`",
												"videos/".$_POST["txtFName"]) . "' , ";
												$strsql=$strsql . " category='" . str_replace("'","`",
												$_POST["cmbCategory"]) . "'  ";								
												$strsql=$strsql."WHERE video_id=".$id."";
												if(!mysql_query($strsql))
												{
													echo $strsql;
												}
												echo $strsql;	      
									     }
									else
										{
											 $strsql="INSERT INTO ev_videos(caption,vid_url,vid_desc,img_url,category,
											   vid_name,uid,postdate)VALUES(";											
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["txtHeading"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												"videos/".$_POST["txtFName"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["txtdesc"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												'') . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["cmbCategory"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["txtTitle"]) . "' , ";
												$strsql=$strsql . " " .$_SESSION['admin_id']. " , ";
												$strsql=$strsql . " '" . date("Y-m-d H:i:s"). "' ) ";
												//echo $strsql;
												if(!mysql_query($strsql))
												{
													echo $strsql;
												}
										}
										$_SESSION["page"]="viewevents.php"; 	
								break;
				}
		    }
		    else
		    {
				echo "file type is ".$_FILES["file"]["type"];
				$ar=getDirectorySize(realpath("videos/images"));
				$foldersize=(sizeFormat($ar['size']))/(1024*1024);	
				$filesize=($_FILES["file"]["size"])/(1024*1024);
				echo "<br>hello <br>";
				switch($type)
				{
					case "news" :					  	
									$target=realpath("videos/images");
									if ((($_FILES["file"]["type"] == "image/gif")
									|| ($_FILES["file"]["type"] == "image/jpeg")
									|| ($_FILES["file"]["type"] == "image/gif")
									|| ($_FILES["file"]["type"] == "image/png")
									|| ($_FILES["file"]["type"] == "image/tif")
									|| ($_FILES["file"]["type"] == "image/pjpeg")))
									{
										if ($id>=1)
										{	
											$sql2="SELECT * FROM ev_videos  
											WHERE video_id=".$id."";
							  				$result2=mysql_query($sql2);
							  				while($row2= mysql_fetch_array($result2))
							  					{
												
													$loc=$row2['img_url'];
												
												}
												
											if(file_exists($loc))
											{
												unlink($loc);
											}
											$sql2="DELETE FROM ev_videos  
											WHERE video_id=".$id."";
							  				$result2=mysql_query($sql2);	      
									     } 
										  move_uploaded_file($_FILES["file"]["tmp_name"],
									      $target."/" . str_replace(" ","",$_FILES["file"]["name"]));
										  $fname="videos/images/". 
												   str_replace(" ","",$_FILES["file"]["name"]);
										  
										   $strsql="INSERT INTO ev_videos(caption,vid_url,vid_desc,img_url,category,
											   vid_name,uid,postdate)VALUES(";											
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["txtHeading"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												"videos/".$_POST["txtFName"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["txtdesc"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												$fname) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["cmbCategory"]) . "' , ";
												$strsql=$strsql . " '" . str_replace("'","`",
												$_POST["txtTitle"]) . "' , ";
												$strsql=$strsql . " " .$_SESSION['admin_id']. " , ";
												$strsql=$strsql . " '" . date("Y-m-d H:i:s"). "' ) ";
												echo $strsql;
											if(!mysql_query($strsql))
											{
												echo $strsql;
											}
									    	$_SESSION["page"]="videos";
								}
								else
								{
									echo "the type of the file you have chosen is not valid";
								}
								if ($id>=1)
								{
									$_SESSION["page"]="viewevents.php";
								}
								else
								{
									$_SESSION["page"]="addevents.php";
								}
								break;		
						
											
						
										   
										
				}
			
}
	
	
	

?> 
