<!-- 取得貼文內容 -->
<?php
	session_start();
	require_once("Connect.php");
	if(isset($_GET["id"]) && $_GET["id"] != ""){
	$id=$_GET["id"];
	$sql= "SELECT users.account, users.username, message.id, message.subject, message.content, message.dateTime FROM users INNER JOIN message on users.account= message.account where id=$id";
	$result=mysql_query($sql) or die;
	$row=mysql_fetch_assoc($result);
	// $sql= "SELECT * FROM `message` where id=".$_GET["id"];
	}
?>
<!--  -->

<?php require_once('header.html'); ?>

<body>
	<div class="container-fluid">
		<p align="center"></p>
		<div class="top"><h2>留言板</h2></div>
		<form name= "form1" id="form1" role="form" class="form-horizontal" method="post" action="update_msg.php" onSubmit="return false">
			<div class="form-group" >
				<label for="username" class="col-sm-4 control-label">暱稱：</label>
				<div class="col-sm-4">
					<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<label for=""><?php echo $row['username']; ?></label>
				</div>
			</div>
			<div class="form-group">
				<label for="subject" class="col-sm-4 control-label">留言主旨：</label>
				<div class="col-sm-4">
					<input type="text" name="subject" id="subject" class="form-control" value="<?php echo $row['subject']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="content" class="col-sm-4 control-label">留言內容：</label>
				<div class="col-sm-4">
					<textarea name="content" id="content" class="form-control" rows=5><?php echo $row['content'];?></textarea>
				</div>
			</div>
			<div class="button">
				<button type="submit" class="btn btn-default" id="sumbit" onclick="check()">確定</button>
				<button type="button" class="btn btn-default" id="cancel" onclick="window.history.go(-1);">取消</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		function check(){
			 // console.log("123"); //檢查是否有進入程式 			
			if (document.form1.subject.value.length==0){
				alert("主旨不可空白!");
				//	return false;
			}else if(document.form1.content.value.length==0){
				alert("內容不可空白!");
				//return false;
			}else{
				alert("更新成功");
				form1.submit();
			}
		}
	</script>
</body>
</html>

