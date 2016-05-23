<!-- 會員修改資料 -->
<?php 
	session_start();
	require_once("Connect.php");
	// print_r($_SESSION);
	if($_SESSION['account'] != null){
		$account=$_SESSION["account"];
		$sql= "SELECT `account`, `password`, `name`, `email`, `mobile`, `username` FROM `users` where account='$account'";
		// echo $sql;
		$result=mysql_query($sql) or die;
		$row=mysql_fetch_assoc($result);
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('請重新登入！');";
		echo "window.location.href='main.php'";
		echo "</script>";
	}
?>
<?php require_once('header.html'); ?>
<body>
		<div class="container-fluid">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="main.php"><span class="glyphicon glyphicon-pencil"></span> 留言板</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> 登出</a></li>
		</ul>
		<div class="top"><h2>會員資料</h2></div>
	
		<form name= "form2" id="form2" role="form" class="form-horizontal" method="post" autocomplete="on" action="update_mbr.php" onSubmit="return false">
			<div class="form-group">
				<label for="account" class="col-sm-5 control-label">會員帳號：</label>
				<div class="col-sm-3">
					<label for="account" class="form-control" readonly><?php echo $row['account']?></label>
				</div>
			</div>
			<div class="form-group">
				<label for="org_pw" class="col-sm-5 control-label">密碼：</label>
				<div class="col-sm-3">
					<input type="password" name="org_pw" id="org_pw" class="form-control" readonly value="<?php echo $row['password']?>">
					<label class="">(<a href="modify_pw.php" >修改密碼</a>)</label>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-5 control-label">真實姓名：</label>
				<div class="col-sm-3">
					<input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name'] ?>" >
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-5 control-label">E-mail：</label>
				<div class="col-sm-3">
					<input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="mobile" class="col-sm-5 control-label">手機：</label>
				<div class="col-sm-3">
					<input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $row['mobile'] ?>">
				</div>
			</div>			
			<div class="form-group" >
				<label for="username" class="col-sm-5 control-label">暱稱：</label>
				<div class="col-sm-3">
					<input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username'] ?>">
				</div>
			</div>
			<div class="button">
				<button type="submit" class="btn btn-default" id="sumbit" onclick="check()">儲存</button>&nbsp&nbsp
				<button type="button" class="btn btn-default" id="cancel" onclick="window.location.href='main.php'">取消</button>
			</div>
		</form>
		</div>
		<script type="text/javascript">
			account_ch = /^[a-zA-Z]|\d+$/i;
			phone_ch = /^[09]{2}[0-9]{8}$/;
			name_ch = /^[\u4e00-\u9fa5]+$/;
			email_ch = /^[^\s]+@[^\s]+\.[^\s]+$/;

			function check(){
				if(document.form2.name.value.length==0 || !name_ch.test(document.form2.name.value)){
					alert("請輸入姓名！");
				}else if(document.form2.email.value.length==0){
					alert("請輸入E-mail！");
				}else if(!email_ch.test(document.form2.email.value)){
					alert("E-mail格式錯誤！");
				}else if(document.form2.mobile.value.length==0){
					alert("請輸入手機號碼！");
				}else if(!phone_ch.test(document.form2.mobile.value)){
					alert("手機號碼錯誤！");
				}else if(document.form2.username.value.length==0){
					alert("請輸入暱稱！");
				}else{
					alert("修改成功！");
					form2.submit();
					//window.location.href='main.php';
				}
			}
		</script>
</body>
</html>