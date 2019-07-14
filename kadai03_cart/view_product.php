<?php
	session_start();
	if(!isset($_SESSION["userId"])){
		header("Location: index.html");
	}

	require_once("PDOUser.class.php");
	$db = new Database;
	$records = $db->getProducts();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>商品一覧</title>
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
	<h1>商品一覧</h1>
	<table>
		<?php if(!empty($records)): ?>
			<tr>
				<th>商品名</th>
				<th>単価</th>
				<th>イメージ</th>
				<th>カートへ追加</th>
			</tr>
			<?php foreach($records as $record): ?>
				<tr>
					<td><?= $record["name"]; ?></td>
					<td><?= $record["price"]; ?></td>
					<td><img src='./img/<?= $record["img"]; ?>'></td>
					<td><a href='./add_cart.php?id=<?= $record["id"]; ?>'>カートへ追加</a></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<p>1件も存在しません</p>
		<?php endif; ?>
	</table>

	<p><a href="./view_cart.php">カート確認</a></p>
	<p><a href="./logout.php">ログアウト</a></p>
</body>
</html>