<?php 
	$request = mysql_connect("localhost", "root", "sonia2927") or die("db error");
	mysql_query("set names utf8");
	mysql_select_db("guestbook");
?>