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
		$sql = "INSERT INTO kadai01_users VALUES('X','X')";

		// SQL実行
		$pdo->query($sql);
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