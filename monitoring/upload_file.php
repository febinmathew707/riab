<?php 

 
	session_start();
	if($_SESSION['emp_id']=="")
	{
		Header("Location: profile.php");
		die();
	}	
?>
<?php

	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	include("filesize.php");
	
		$type1=$_GET["type"];
		echo $type1;
		
		//$ar=getDirectorySize(realpath("employee/photo/"));		
		
		$filesize=($_FILES["file"]["size"])/(1024*1024);
		echo "<br> file size is" . $filesize ."<br>";	
		if($filesize>2)
		{
			$_SESSION['errordesc']="The size of the file should not be greater than 2 mb ";
			die("1st");
		}
		//echo $filesize+$foldersize;
		echo realpath("photo");
		if(realpath("photo")=="")
		{
			$_SESSION['photo']="";
			die("2nd");
		}
		//echo realpath("members/".$_SESSION['user_name'])."/".$type1;
		echo is_dir("photo");
		if(!is_dir("photo"))
		{
			if(!mkdir(realpath("photo")))
				{
					$_SESSION['photo']="";
					die("3rd");
				}
		}
		$target=realpath("photo");
		echo $target;
		if ($_FILES["file"]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		    	$_SESSION['errordesc']="Return Code: " . $_FILES["file"]["error"];
		    	die();
		    }
		    else
		    {
				$_SESSION['errordesc']="here";									  	
									if ((($_FILES["file"]["type"] == "image/gif")
									|| ($_FILES["file"]["type"] == "image/jpeg")
									|| ($_FILES["file"]["type"] == "image/gif")
									|| ($_FILES["file"]["type"] == "image/png")
									|| ($_FILES["file"]["type"] == "image/tif")
									|| ($_FILES["file"]["type"] == "image/pjpeg")))
									{
										if ($_SESSION['photo']=="")
										{		      
									      move_uploaded_file($_FILES["file"]["tmp_name"],
									      "photo/".$_SESSION['emp_id'].".". 
										  str_replace(" ","",substr($_FILES["file"]["type"],6)));
									      $_SESSION['photo']="photo/".$_SESSION['emp_id'].".". 
										  str_replace(" ","",substr($_FILES["file"]["type"],6));
									    }
									    else
									    {
											$sql2="SELECT * FROM employee  
											WHERE Auto_No=".$_SESSION['emp_id']."";
							  				$result2=mysql_query($sql2);
							  				while($row2= mysql_fetch_array($result2))
							  					{
												
													$_SESSION['photo']=$row2['Photo'];
												
												}
												
											if(file_exists($_SESSION['photo']))
											{
												
												unlink($_SESSION['photo']);
												
											}
											move_uploaded_file($_FILES["file"]["tmp_name"],
									      		"photo/".$_SESSION['emp_id'].".". 
										  str_replace(" ","",substr($_FILES["file"]["type"],6)));
										  
									      		$_SESSION['photo']="photo/".$_SESSION['emp_id'].".". 
										  str_replace(" ","",substr($_FILES["file"]["type"],6));
											}
									     	    
													$fname="photo/".$_SESSION['emp_id'].".". 
										  			str_replace(" ","",substr($_FILES["file"]["type"],6));
													mysql_query("UPDATE employee SET 	
													Photo='".$fname."' 
													WHERE Auto_No=".$_SESSION['emp_id']."");
													$_SESSION['photo']=$fname;
										$_SESSION['errordesc']= "photo successfully updated";
								}
								else
								{
							$_SESSION['errordesc']= "the type of the file you have chosen is not valid";
									//die();
								}
										
									

}	
	echo "err".$_SESSION['errordesc'];
	

?> 
