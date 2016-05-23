<!-- 會員資料更新 -->
<?php 
	session_start();
	require_once("Connect.php");
	$account=$_POST['account'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$username=$_POST['username'];

	if($_SESSION['account'] != null){
		$account=$_SESSION['account'];
		$sql= "UPDATE `users` SET `name`='$name',`email`='$email',`mobile`='$mobile',`username`='$username' where account='$account'";
		// echo $sql;
		mysql_query($sql) or die;
		header("location:main.php");	
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('請重新登入！');";
		echo "window.location.href='HW_GB.php'";
		echo "</script>";
	}
?>