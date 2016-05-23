<!-- 會員登入 -->
<?php
	require_once("Connect.php");
	if(isset($_GET["id"]) && $_GET["id"] != ""){
		$id=$_GET["id"];
		$sql= "SELECT * FROM `message` where id=$id";
		$result=mysql_query($sql) or die;
		$row=mysql_fetch_assoc($result);
		// $sql= "SELECT * FROM `message` where id=".$_GET["id"];
	}
	
	if (isset($_POST['id'])) {
		//echo "123";
		$id=$_POST['id'];
		$username=$_POST['username'];
		$subject=$_POST['subject'];
		$content=$_POST['content'];
		ini_set('date.timezone','Asia/Taipei'); //時區設定
		$renewTime = date("Y-m-d H:i:s" );
		echo $renewTime;
		echo "456";
		$sql_upd="UPDATE `message` SET `username`='$username',`subject`='$subject',`content`='$content', `dateTime`='$renewTime' WHERE id='$id'";
		mysql_query($sql_upd) or die ('Error');
		header("location:main.php");
	}
?>
<?php require_once('header.html'); ?>
	
</head>
<body>
<div class="container-fluid">
	<div class="container-fluid">
	<ul class="nav navbar-nav navbar-right">
		<li><a href="main.php"><span class="glyphicon glyphicon-pencil"></span> 留言板</a></li>
	</ul>
	
		<!-- <p align="center"></p> -->
		<div class="top"><h2>會員登入</h2></div>
		<form name="form1" id="form1" role="form" class="form-horizontal" method="post" action="cklogin.php" onSubmit="return false">
			<div class="form-group" >
				<label for="account" class="col-sm-5 control-label">帳號：</label>
				<div class="col-sm-2">
					<!-- <input type="hidden" name="id" value="<?php echo $id;?>"/> -->
					<input name="account" id="account" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="pw" class="col-sm-5 control-label">密碼：</label>
				<div class="col-sm-2">
					<input name="pw" id="pw" type="password" class="form-control">
				</div>
			</div>
			<p align="center">
				<a href="">忘記密碼</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<a href="signup.php">註冊新帳號</a>
			</p>
			<div class="button">
				<button type="submit" class="btn btn-default" id="sumbit" onclick="checkdata()">登入</button>&nbsp&nbsp&nbsp&nbsp
				<button type="button" class="btn btn-default" id="cancel" onclick="window.history.go(-1);">取消</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
			function checkdata(){
				if(document.form1.account.value.length==0){
					alert("請輸入帳號！");
				}else if(document.form1.pw.value.length==0){
					alert("請輸入密碼！");
				}else{
					form1.submit();
				}
			}   
	</script>
</body>
</html>

