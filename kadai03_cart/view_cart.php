<?php
	session_start();
	if(!isset($_SESSION["userId"])){
		header("Location: index.html");
	}

	// カートチェック用
	$check = false;

	if(!empty($_SESSION["cart"])){
		$check = true;
		$cost = 0;
		require_once("PDOUser.class.php");
		$db = new Database;
		$records = $db->getCartProducts($_SESSION["cart"]);
		foreach($records as $record){
			$cost += $record["price"] * $_SESSION["cart"][$record["id"]];
		}
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>カート確認</title>
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
	<h1>カート確認</h1>
	<?php if($check): ?>
		<table>
			<tr>
				<th>商品名</th>
				<th>単価</th>
				<th>イメージ</th>
				<th>購入数量</th>
				<th>削除</th>
			</tr>
			<?php foreach($records as $record): ?>
				<tr>
					<td><?= $record["name"]; ?></td>
					<td><?= $record["price"]; ?></td>
					<td><img src='./img/<?= $record["img"]; ?>'></td>
					<td><?= $_SESSION["cart"][$record["id"]]; ?></td>
					<td><a href='./remove_cart.php?id=<?= $record["id"]; ?>'>削除</a></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<p>合計：<?= $cost; ?></p>
	<?php else: ?>
		<p>カートには1件も追加されていません。</p>
	<?php endif; ?>

	<a href="./view_product.php">戻る</a>
	<a href="./logout.php">ログアウト</a>
	
</body>
</html>