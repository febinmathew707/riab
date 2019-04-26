<?php 

// set up basic connection
$ftp_server="ftp.servage.net";
$conn_id = ftp_connect("ftp.servage.net",2121); 
if ((!$conn_id))
{
	echo "failed <br>";
}
// login with username and password
$ftp_user_name="vidoes";
$ftp_user_pass="wavesatlive";
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

// check connection
if ((!$conn_id) || (!$login_result)) { 
        echo "FTP connection has failed!";
        echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
        exit; 
    } else {
        echo "Connected to $ftp_server, for user $ftp_user_name";
    }

// upload the file
$source_file="D:/Web/wavesat/source/student/members/tom/video/v9omar.flv";
$destination_file="v9omar.flv";
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

// check upload status
if (!$upload) { 
        echo "FTP upload has failed!";
    } else {
        echo "Uploaded $source_file to $ftp_server as $destination_file";
    }

// close the FTP stream 
ftp_close($conn_id); 
?>
