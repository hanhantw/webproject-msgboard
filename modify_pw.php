<!-- 修改密碼-->
<?php 
	session_start();
	require_once("Connect.php");
	if($_SESSION['account'] != null){
		$password=$_POST['org_pw'];
		$account = $_SESSION['account'];
		$sql= "SELECT `password` FROM `users` where account='$account'";
		$result=mysql_query($sql) or die;
		$row=mysql_fetch_assoc($result);
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('請重新登入！');";
		echo "window.location.href='HW_GB.php'";
		echo "</script>";
	}
?>
<!DOCTYPE html>
<html>
	<?php require_once('header.html'); ?>
	<body>
		<div class="container-fluid">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="member.php"><span class="glyphicon glyphicon-user"></span> 會員專區</a></li>
			<li><a href="HW_GB.php"><span class="glyphicon glyphicon-log-out"></span> 登出</a></li>
		</ul>
		<div class="top"><h2>修改密碼</h2></div>
	
		<form name= "form3" id="form3" role="form" class="form-horizontal" align="center" method="post" autocomplete="on" action="update_pw.php" onSubmit="return false">
			<div class="form-group">
				<label for="org_pw" class="col-sm-5 control-label">舊密碼：</label>
				<div class="col-sm-3">
					<input type="password" name="org_pw" id="org_pw" class="form-control" placeholder="請輸入舊有密碼" >					
				</div>
			</div>
			<div class="form-group">
				<label for="new_pw" class="col-sm-5 control-label">新密碼：</label>
				<div class="col-sm-3">
					<input type="password" name="new_pw" id="new_pw" class="form-control" placeholder="六~十五個字元" size="15">
				</div>
			</div>
			<div class="form-group">
				<label for="ch_pw" class="col-sm-5 control-label">再次確認新密碼：</label>
				<div class="col-sm-3">
					<input type="password" name="ch_pw" id="ch_pw" class="form-control" placeholder="請再次輸入新密碼" size="15">
				</div>
			</div>
			<div class="button">
				<button type="submit" class="btn btn-default" id="sumbit" onclick="check()">儲存</button>&nbsp&nbsp
				<button type="button" class="btn btn-default" id="cancel" onclick="window.location.href='member.php'">取消</button>
			</div>
		</form>
		</div>	
		<script type="text/javascript">
			var dbpw ='<?php echo $row['password'];?>';
			function check(){
				if(document.form3.org_pw.value.length==0){
					alert("請輸入舊密碼！");
				}else if(document.form3.org_pw.value != dbpw ){
					alert("舊密碼錯誤！");
					$("#org_pw").val('');
					$("#org_pw").focus();
					// 按下確認後清除原先輸入
				}else if(document.form3.new_pw.value.length==0){
					alert("請輸入新密碼！");
				}else if(document.form3.ch_pw.value.length==0){
					alert("請再次輸入新密碼！");
				}else if(document.form3.ch_pw.value != document.form3.new_pw.value){
					alert("與新密碼不符，請再次確認！");
				}else if(document.form3.org_pw.value == document.form3.new_pw.value){
					alert("新密碼與舊密碼相同，請重新輸入！")
				}else{
					alert("修改成功！");
					form3.submit();
				}
			}
		</script>
	</body>
</html>