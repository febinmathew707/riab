<?php 
 session_start(); ?>
<?php
//$_SESSION['st_id']="";
session_destroy();

session_unset();
Header("Location: ../admin/index.html");
?>