<!-- 會員註冊 -->
<?php
	session_start();
	require_once("Connect.php");
	$account=$_POST["account"];
	$pw=$_POST["pw"];	
	$name=$_POST["name"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$gender=$_POST["gender"];
	$username=$_POST["username"];

	$sql=mysql_query("SELECT * FROM `users` WHERE account='$account'");

	if(mysql_num_rows($sql) != 0){
		echo "<script type='text/javascript'>";
		echo "alert('此會員帳號已有人使用');";
		echo "history.back()";
		echo "</script>";
	}else{
		mysql_query("INSERT INTO `users`(`account`, `password`, `name`, `email`, `mobile`, `gender`, `username`) VALUES ('$account', '$pw','$name','$email','$mobile','$gender','$username')");
		$_SESSION['account']=$account;
		header("location:main.php");
	}
?>