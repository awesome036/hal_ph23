<?php
	// DSN(Data Source Name)
	$dsn = "mysql:host=mysql;dbname=ph23;charset=utf8";
	$db_user = "root";
	$db_password = "root";

	try{
		// DB接続
		$pdo = new PDO($dsn,$db_user,$db_password);

		// エラーモードの変更
		// 黙殺→例外発生モードへ
		$pdo->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
		);

		// SQL文作成
		$sql = "SELECT * FROM kadai01_users";

		// SQL実行
		// SELECTの場合、戻り値として
		// 結果配列制御用のステートメントが
		// 返却される。
		$stmt = $pdo->query($sql);

		// データ量が少ないとき
		$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($records as $record){
			echo $record["id"]."<br>";
		}

		// // データ量が多いとき
		// // 取得された行数分回す
		// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		// 	print_r($row);
		// 	echo "<br>";
		// }

		// fetchの動作モード切替
		// PDO::FETCH_ASSOC→連想配列
		// PDO::FETCH_NUM→添え字
		// PDO::FETCH_BOTH→両方
		// 指定なし→両方
	}catch( Exception $e ){
		// エラー対応処理
		// エラーログを取る
		// エラーページへリダイレクト
		// header("Location: error.php");

		// 簡易エラー処理
		echo $e->getMessage();	// エラーメッセージ出力
	}finally{
		// 例外の発生有無にかかわらず処理される部分
		// 省略可能

		// DB切断
		$pdo = null;
	}


	echo "OK";