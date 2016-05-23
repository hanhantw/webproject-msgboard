<?php
	// session_start();
	require_once("Connect.php");
	$id=$_GET["id"];
	$sqldelt= "DELETE FROM `message` where id='$id'";
	$result=mysql_query($sqldelt) or die;
	header("location:main.php");
?>