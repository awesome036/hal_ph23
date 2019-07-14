<?php
	require_once("PDOUser.class.php");
	$db = new Database;
	$records = $db->getUser($_POST["id"]);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ユーザー情報検索</title>
	<style type="text/css">
		table,th,td {
			border: solid 1px #000;
		}
		img {
			width: 100px;
		}
	</style>
</head>
<body>
	<form action="./index.php" method="post">
		<label for="inputID">ID:</label>
		<input type="text" name="id" id="InputID">
		<input type="submit" value="search">
	</form>
	<hr>
	<table>
		<?php if(!empty($records)): ?>
			<p><?= count($records); ?>件ヒットしました。</p>
			<tr>
				<th>id</th>
				<th>password</th>
				<th>img</th>
			</tr>
			<?php foreach($records as $record): ?>
				<tr>
					<td><?= $record["id"]; ?></td>
					<td><?= $record["password"]; ?></td>
					<td><img src='<?= $record["img"]; ?>'></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<p>1件も存在しません</p>
		<?php endif; ?>
	</table>
</body>
</html>