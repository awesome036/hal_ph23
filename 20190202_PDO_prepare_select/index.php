<?php
// プリペアードステートメントの利点
// ①SQLインジェクション対策がなされる（セキュリティ向上）
// ②大量データ更新の時、高速
// 　※何全件とか。（実際に測る必要はある。）
// 【使いどころ】
// ①ユーザー入力値を用いて、DB操作するとき
// ②大量INSERT/UPDATE

// 接続情報
$dsn = "mysql:host=mysql;dbname=ph23;charset=utf8";
$db_user = "root";
$db_password = "root";


// Formから渡ってきたと仮定
$id = "k";
$password = "a";
$img = "a.png";

// DB接続
try {
	$pdo = new PDO($dsn,$db_user,$db_password);

	// エラーモードの変更
	// 黙殺→例外発生モードへ
	$pdo->setAttribute(
			PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION
	);
	// echo "ATTR_ERRMODE = " . PDO::ATTR_ERRMODE . "<br>";
	// echo "ERRMODE_EXCEPTION = " . PDO::ERRMODE_EXCEPTION . "<br>";
	
	// エミュレートモードの変更
	// ※セキュリティの向上
	$pdo->setAttribute(
			PDO::ATTR_EMULATE_PREPARES,
			false
	);

	// プリペアードステートメント版SQL
	$sql = "SELECT * FROM kadai01_users WHERE id = ? OR password = ?";
	// Point
	// 文字列は「'」でくくり、数値系はくくらないといった、
	// 面倒なことは自動でやってくれる


	// プリペアードステートメントの取得
	$ps = $pdo->prepare($sql);

	// プレースホルダ（仮置き場）へ値の設定
	// 「?」の場合、左から1つ目、二つ目と指定する
	$ps->bindValue(1, $id);
	$ps->bindValue(2, $password);

	// 実行
	$ps->execute();

	// 結果取得
	$records = $ps->fetchAll(PDO::FETCH_ASSOC);
	print_r($records);
	
} catch( Exception $e ) {
	echo $e->getMessage();
} finally {
	$pdo = null;
}