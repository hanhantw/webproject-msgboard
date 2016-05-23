<?php
	session_start();
	// 讀取資料庫資料
	$records_per_page=10;
	// 如果使用者有指定頁面則顯示指定頁面
	if(isset($_GET["page"]))
		$page=$_GET["page"];
	else
		$page=1;
	// 資料連結、取資料
	//$link= require("Connect.php");
	//$link = include("Connect.php");
	require_once("Connect.php");
	// $sql_join="SELECT users.username, message.tile, message.content FROM users INNER JOIN message on users.account= message.account";
	// $result=mysql_query($sql_join) or die("error");
	// unset($view);
	// unset($layout);
	// echo "<pre>";
	// print_r(mysql_fetch_assoc($result));
	// echo."123";
	// echo "</pre>";
	// return;

	$sql="SELECT users.account, users.username, message.id, message.subject, message.content, message.dateTime FROM users INNER JOIN message ON users.account= message.account ORDER BY datetime DESC";
	// $result=execute_sql("guestbook", $sql, $link) or die("error");
	$result=mysql_query($sql) or die("error");
	$total_records=mysql_num_rows($result);
	$total_pages=ceil($total_records / $records_per_page);
	$started_record=$records_per_page * ($page - 1);
	//將記錄指標移至本頁第一筆記錄的序號
	mysql_data_seek($result, $started_record);
?>

<?php require_once('header.html'); ?>
	<body>
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-right">
			<?php 
				if ($_SESSION['account'] != null){
			?>
					<li><a href="member.php"><span class="glyphicon glyphicon-user"></span> 會員專區</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> 登出</a></li>
			<?php  
				}else{				
			?>	
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
					<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> 註冊</a></li>
			<?php
				}
			?>
				
			</ul>
			<!-- <p style="text-align: center;" class="col-md-6">ggg</p> -->
			<div class="top"><h2>留言板</h2></div>
				<table class='table'>
				<?php
					$account = $_SESSION['account'];
					//顯示記錄
					$j = 1;
					while ($row = mysql_fetch_assoc($result) and $j <= $records_per_page) {

						echo "<tr><td>暱稱：" . $row["username"] . "<br>";						
						echo "主旨：" . $row["subject"] . "<br>";
						echo "時間：" . $row["dateTime"] . "<br>";
						echo "內文：" . $row["content"] ."<br>";
						
						if($account == $row["account"]){
							// echo $_SESSION['account']. " ";
							// echo $row["account"];
							echo "<a href='modify_msg.php?id=". $row['id'] . "'>編輯</a>&nbsp&nbsp";
							// echo "<a href='javascript:confirmDelete('delete.php?id=" . $row['id'] . "')'>Delete</a>";
							echo "<a href='javascript:confirmDelete(\'delete.php?id=" . $row['id'] . "\"  onclick=\"return confirm('確定要刪除嗎？')\">刪除</a>";
							// echo "<a href='delete.php?id=" . $row['id'] . "'onclick='return confirm" . "('確定要刪除嗎？')'>刪除</a>";
						}
							
						echo "</td></tr>";
						$j++;

					}
				?>
				</table>
				
				<!-- 產生Page Menu-->
				<div class='text-center'>
					<ul class='pagination'>
					<?php
						if ($page > 1){
							echo "<li><a href='main.php?page=". ($page - 1) . "'>上一頁</a></li> ";
						}
						
						for ($i = 1; $i <= $total_pages; $i++){
							if ($i == $page){
							echo "<li class=active><a>$i</a></li>";
							}else{
							echo "<li><a href='main.php?page=$i'>$i</a></li>";
							}
						}
						
						if ($page < $total_pages){
							echo "<li><a href='main.php?page=". ($page + 1) . "'>下一頁</a></li> ";
						}
					//釋放記憶體空間
					mysql_free_result($result);
					//mysql_close(require("Connect.php"));													
			?>	
					</ul>
				</div>

		<?php 
			if($_SESSION['account'] != null){
				$account=$_SESSION["account"];
				$sql= "SELECT `username` FROM `users` where account='$account'";
				// echo $sql;
				$result=mysql_query($sql) or die;
				$row=mysql_fetch_assoc($result);
			echo ""; 
		?>		
		<div class="top"><h2>我要留言</h2></div>
		<form name= "form1" id="form1" role="form" class="form-horizontal" align="center" method="post" autocomplete="on" action="post.php" onSubmit="return false">
				<div class="form-group" >
					<label for="username" class="col-sm-5 control-label" >暱稱：</label>
					<div class="col-sm-3">
						<input type="hidden" name="account" value="<?php echo $_SESSION['account'] ;?>"/>
						<!-- <?php echo $_SESSION['account'] ?> -->
						<input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']; ?>" readonly />
					</div>
				</div>
				<div class="form-group">
					<label for="subject" class="col-sm-5 control-label">留言主旨：</label>
					<div class="col-sm-3">
						<input type="text" name="subject" class="form-control" id="subject" />
					</div>
				</div>
				<div class="form-group">
					<label for="content" class="col-sm-5 control-label">留言內容：</label>
					<div class="col-sm-3">
						<textarea name="content" id="content" class="form-control" rows=5></textarea>
					</div>
				</div>
				<div class="button">
					<button type="submit" class="btn btn-default" id="sumbit" onclick="check()">送出</button>
					<button type="reset" class="btn btn-default">清除</button>
				</div>
		</form>
		<?php }?>	
		
	
		<script type="text/javascript">	
			function check(){
				if(document.form1.username.value.length==0){
					alert("請填寫暱稱");
				}else if (document.form1.subject.value.length==0){
					alert("請填入主旨");
				}else if(document.form1.content.value.length==0){
					alert("內容不可空白!");
				}else{
					alert("謝謝您的意見！");
					form1.submit();
				}
			}
		</script>
		<script>
			function confirmDelete(delUrl) {
			  if (confirm("確定刪除？")) {
			    document.location = delUrl;
			  }
			}
		</script>
	</body>
</html>