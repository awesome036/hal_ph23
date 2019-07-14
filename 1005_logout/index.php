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
	</form>
</body>
</html>