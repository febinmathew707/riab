<?php 

 session_start(); ?>

<?php

	if(!isset($_SESSION['Logged']))

	{

		Header("Location: home.php");

		die();

	}

 	include("../connectdb/connect.php");

	/// GET ALL PASSED VALUES IN VARIABLES

 	mysql_select_db("soemonit_pentaclt",$con);

	if(!$con)

	{

		die('Could not connect to server' . mysql_error());

	}

	$blid=$_GET["blid"];

	

	$title=$_GET["title"];

	$desc=$_GET["desc"];

	//$category=$_GET["category"];

	$tag="Asean";

	$to=$_GET["to"];

	try

	{

		

		$r=mysql_query("SET AUTOCOMMIT=0");

		$r=mysql_query("START TRANSACTION");

				

				//$$$$$$$$$$$$$$$$$$$ IF EDIT DELETE FIRST @@@@@@@@@@@@@@@@@@@@@@@@@@@@

				if($blid!=0)

				{

						if(!mysql_query("DELETE FROM blogs WHERE bl_id=".$blid.""))

							{

								$r=mysql_query("ROLLBACK");

								die("Sorry,Your Record couldn't be updated");

							}

				}

			//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ SAVE CURRENT COURSE &&&&&&&&&&&&&&&&&&&&&&&&		

					

						$strsql="INSERT INTO blogs(user_id,title,post_date,publishto,tag,description)VALUES(";

						$strsql=$strsql . " ".$_SESSION['mem_id'].", ";

						$strsql=$strsql . " '" . str_replace("'","`",$title). "' , ";

						$strsql=$strsql . " '" . date("Y-m-d H:i:s"). "' , ";

						$strsql=$strsql . " '" . str_replace("'","`",$to). "' , ";

						$strsql=$strsql . " '" . str_replace("'","`",$tag). "' , ";

						$strsql=$strsql . " '" . trim(str_replace("'","`",$desc)). "' ) ";

						//echo $strsql;

						if(!mysql_query($strsql))

						{

							$r=mysql_query("ROLLBACK");

							die("Sorry,Your request couldn't be completed");

						}

					

				

					$r=mysql_query("COMMIT");

					echo "BLOG SUCCESSFULLY POSTED";

		}



	catch (Exception $e)

	{

    	$r=mysql_query("ROLLBACK");

		echo 'Caught exception: ',  $e->getMessage(), "/n";

	}

		

?>