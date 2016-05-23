<?php 
	session_start();
	unset($_SESSION['account']);
	echo "<script type='text/javascript'>";
	echo "alert('成功登出！');";
	echo "window.location.href='main.php'";
	echo "</script>";
?>