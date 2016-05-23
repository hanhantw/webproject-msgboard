<!-- 加入會員 -->
<?php require_once('header.html'); ?>

<body>
		<div class="container-fluid">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="main.php"><span class="glyphicon glyphicon-pencil"></span> 留言板</a></li>
			<li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> 登入</a></li>
		</ul>
		<div class="top"><h2>註冊新會員</h2></div>
	
		<form name= "form2" id="form2" role="form" class="form-horizontal" align="center" method="post" autocomplete="on" action="register.php" onSubmit="return false">
			<div class="form-group">
				<label for="account" class="col-sm-5 control-label">會員帳號：</label>
				<div class="col-sm-3">
					<input type="text" name="account" id="account" class="form-control" placeholder="四~十五個字元" size="15">
				</div>
			</div>
			<div class="form-group">
				<label for="pw" class="col-sm-5 control-label">密碼：</label>
				<div class="col-sm-3">
					<input type="password" name="pw" id="pw" class="form-control" placeholder="六~十五個字元" size="15">
				</div>
			</div>
			<div class="form-group">
				<label for="ch_pw" class="col-sm-5 control-label">再次確認密碼：</label>
				<div class="col-sm-3">
					<input type="password" name="ch_pw" id="ch_pw" class="form-control" placeholder="請再次輸入密碼" size="15">
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-5 control-label">真實姓名：</label>
				<div class="col-sm-3">
					<input type="text" name="name" id="name" class="form-control" placeholder="僅限中文" size="8">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-5 control-label">E-mail：</label>
				<div class="col-sm-3">
					<input type="text" name="email" class="form-control" id="email" size="30">
				</div>
			</div>
			<div class="form-group">
				<label for="mobile" class="col-sm-5 control-label">手機：</label>
				<div class="col-sm-3">
					<input type="text" name="mobile" class="form-control" id="mobile" placeholder="手機號碼的格式為：09XXXXXXXX" size="10">
				</div>
			</div>
			<div class="form-group">
				<label for="gender" class="col-sm-5 control-label">性別：</label>
				<div class="col-sm-3" >
					<div class="col-sm-6" align="center">
						<input type="radio" name="gender" class="radio-inline" id="gender" value="男">男
					</div>
					<div class="col-sm-5" align="center">
						<input type="radio" name="gender" class="radio-inline" id="gender" value="女">女
					</div>
				</div>
			</div>			
			<div class="form-group" >
				<label for="username" class="col-sm-5 control-label">暱稱：</label>
				<div class="col-sm-3">
					<input type="text" name="username" id="username" class="form-control" placeholder="你想讓別人怎麼稱呼你?">
				</div>
			</div>
			<div class="button">
				<button type="submit" class="btn btn-default" id="sumbit" onclick="check()">加入會員</button>&nbsp&nbsp
				<button type="reset" class="btn btn-default">重新填寫</button>
			</div>
		</form>
		</div>
		<script type="text/javascript">
			account_ch=/^[a-zA-Z]|\d+$/i;
			pw_ch=/^(?=.*[a-zA-Z0-9]).{6,15}$/;
			phone_ch = /^[09]{2}[0-9]{8}$/;
			name_ch = /^[\u4e00-\u9fa5]+$/;
			email_ch = /^[^\s]+@[^\s]+\.[^\s]+$/;

			function check(){
				if(document.form2.account.value.length==0){
					alert("請輸入會員帳號！");
				}else if(document.form2.account.value.length < 4 || !account_ch.test(document.form2.account.value)){
					alert("此帳號不符合規定！");
				}else if(document.form2.pw.value.length < 4 || !pw_ch.test(document.form2.pw.value)){
					alert("密碼不符合規定！")
				}else if(document.form2.pw.value.length==0){
					alert("請輸入密碼！");
				}else if(document.form2.ch_pw.value.length==0){
					alert("請再次輸入密碼！");
				}else if(document.form2.ch_pw.value != document.form2.pw.value){
					alert("與密碼不符，請再次確認！");
				}else if(document.form2.name.value.length==0 || !name_ch.test(document.form2.name.value)){
					alert("請輸入真實姓名！");
				}else if(document.form2.email.value.length==0){
					alert("請輸入E-mail！");
				}else if(!email_ch.test(document.form2.email.value)){
					alert("E-mail格式錯誤！");
				}else if(document.form2.mobile.value.length==0){
					alert("請輸入手機號碼！");
				}else if(!phone_ch.test(document.form2.mobile.value)){
					alert("手機號碼錯誤！");
				}else if(document.form2.gender.value == ""){
					alert("請選擇性別！");
				}else if(document.form2.username.value.length==0){
					alert("請輸入暱稱！");
				}else{
					alert("註冊成功！");
					form2.submit();
				}
			}
		</script>
</body>
</html>