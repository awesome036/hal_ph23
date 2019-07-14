<?php
	session_start();
	$_SESSION["token"] = sha1(uniqid(rand(), true));
	if(!isset($_POST["msg"])){
		$_POST["msg"] = "";
	}
	if(!isset($_SESSION["msg"])){
		$_SESSION["msg"] = "";
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>新規ユーザ登録</title>
</head>
<body>
	<h1>新規ユーザ登録</h1>
	<form action="./add_db.php" method="post">
		<label for="id">ID:</label>
		<input type="text" name="id" id="id">
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br>
		<input type="submit" name="submit" value="登録">
		<input type="hidden" name="token" value="<?php echo sha1($_SESSION["token"]); ?>">
	</form>
	<?php
		echo $_POST["msg"];
		echo $_SESSION["msg"];
		unset($_SESSION["msg"]);
	?>
	<br>
	<a href="./index.php">戻る</a>
</body>
</html>