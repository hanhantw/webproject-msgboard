<?php
	session_start();
	require_once("Connect.php");
	if (isset($_POST['id'])) {
		$id=$_POST['id'];
		$account=$_SESSION['account'];
		$subject=$_POST['subject'];
		$content=$_POST['content'];
		ini_set('date.timezone','Asia/Taipei'); //時區設定
		$renewTime = date("Y-m-d H:i:s" );
		echo $renewTime;
		$sql_upd="UPDATE `message` SET `account`='$account',`subject`='$subject',`content`='$content', `dateTime`='$renewTime' WHERE id='$id'";
		mysql_query($sql_upd) or die ('Error');
		header("location:main.php");
	}
?>