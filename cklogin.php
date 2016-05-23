<?php 
	session_start();

	require_once("Connect.php");
	$account=$_POST["account"];
	$pw=$_POST["pw"];
	$sql_ck="SELECT * FROM `users` WHERE `account`='$account' AND `password`='$pw'";
	$result=mysql_query($sql_ck) or die;
	//帳密錯誤
	if(mysql_num_rows($result)==0){
		mysql_free_result($result); //釋放$result的記憶體
		echo "<script type='text/javascript'>";
		echo "alert('帳號密碼錯誤，請重新輸入！');";
		echo "history.back();" . "</script>";
	}else {	
		//帳密正確
		$_SESSION['account']=$account;
		// unset($view);
		// unset($layout);
		// echo $account;
		// print_r($_SESSION);
		// return;
		echo "<script type='text/javascript'>";
		echo "alert('登入成功！');";
		// $result = mysql_query($sql) or die("error");
		// $row = mysql_fetch_assoc($result);
		echo "window.location.href='main.php'";
		echo "</script>";
		// return;
		// header("location:main.php");


	}
?>