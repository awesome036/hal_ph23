<?php
	session_start();

	if(!isset($_SESSION["id"])){
		// 直アクセス時
		$_POST["err_msg"] = "ログインしてください。";
		require_once("./index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>メンバーページ</title>
</head>
<body>
	<h1>メンバーページ</h1>
	<a href="./index.php">戻る</a>&nbsp;
	<a href="./logout.php">ログアウト</a>
</body>
</html>