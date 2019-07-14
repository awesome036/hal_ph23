<?php
	session_start();
	$_SESSION["token"] = session_id();
	if(!isset($_POST["err_msg"])){
		$_POST["err_msg"] = "";
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
	<title>ログインページ</title>
</head>
<body>
	<h1>ログイン</h1>
	<form action="./login.php" method="post">
		<label for="id">ID:</label>
		<input type="text" name="id" id="id">
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br>
		<input type="submit" name="submit" value="ログイン">
		<input type="hidden" name="token" value="<?php echo sha1($_SESSION["token"]); ?>">
	</form>
	<?php
		echo $_POST["err_msg"];
		echo $_SESSION["msg"];
		unset($_SESSION["msg"]);
	?>
	<br>
	<a href="./add_form.php">新規ユーザ登録</a>
</body>
</html>