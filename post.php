<?php 
	session_start();
	require_once("Connect.php");
	if($_SESSION['account'] != null){
		$account=$_SESSION["account"];
		$sql= "SELECT `username` FROM `users` where account='$account'";
		// echo $sql;
		$result=mysql_query($sql) or die;
		$row=mysql_fetch_assoc($result);

		$author=$row["username"];
		$subject=$_POST["subject"];
		$content=$_POST["content"];
		$currentTime= date("Y-m-d H:i:s", time()+28800);

		mysql_query("INSERT INTO `message`(`id`, `account`, `subject`, `content`, `dateTime`) VALUES ('', '$account', '$subject', '$content', '$currentTime')");
		header("location:main.php");
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('請重新登入！');";
		echo "window.location.href='main.php'";
		echo "</script>";	
	}	
?>