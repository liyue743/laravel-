<?php
	

	$uname = $_POST['uname'];
	$upwd = $_POST['upwd'];
	$sql = 'select * from user';
	$dsn = "mysql:host=localhost;dbname=php205;port=3306";
	$pdo = new PDO($dsn,'root','123456');
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':uname'=>$uname,':upwd'=>$upwd]);
	$res = $stmt->fetch(PDO::FETCH_OBJ);
	if($res){
		echo '登陆成功';
	} else {
		echo '登录失败';
	}