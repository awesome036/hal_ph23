<?php
	// try-catch
	// →エラー制御構文

	// try{
	// 	// 例外(エラー)が発生しうる処理
	// }catch(){
	// 	// 例外を捕まえた時の処理
	// }
	try{
		echo "aaa";

		// エラーの明示発生
		$e = new Exception("エラーだよ");
		echo "bbb";

		// エラー通知
		throw $e;

		// throw後の処理は実施されない
		echo "ccc";
	}catch(Exception $e){
		echo "ERROR!!";
		echo $e->getMessage();
		echo $e->getFile();
		echo $e->getLine();
		echo $e->getTraceAsString();
	}
	echo "ddd";