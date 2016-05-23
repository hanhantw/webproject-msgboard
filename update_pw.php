<!-- 更新密碼 -->
<?php
	session_start();
	require_once("Connect.php");
	// echo 123; 
	// return;
	if($_SESSION['account'] != null){
		$password=$_POST['new_pw'];
		$account=$_SESSION['account'];

		$sql="UPDATE `users` SET `password`='$password' where account='$account'";
		// echo $sql;
		mysql_query($sql) or die;
		header("location:main.php");	
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('請重新登入！');";
		echo "window.location.href='main.php'";
		echo "</script>";
	}
?>