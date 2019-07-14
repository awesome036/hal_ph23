<?php
	session_start();

	if(sha1($_SESSION["token"]) != $_POST["token"]){
		// 直アクセス時
		$_SESSION["msg"] = "不正なリクエストです。";
		header("Location: add_form.php");
		exit;
	}

	if(empty($_POST["id"]) or empty($_POST["password"])){
		// 入力チェック
		$_POST["msg"] = "ID,Passwordを入力してください。";
		require_once("./add_form.php");
		exit;
	}

	// DB操作
	$con = mysqli_connect("mysql", "root", "root") or die("接続失敗");
	mysqli_set_charset($con, "utf8mb4");
	mysqli_select_db($con, "ph23_kadai01");
	$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$sql = "INSERT INTO kadai01_users (id, password) VALUES (?, ?)";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 'ss', $_POST["id"], $password_hash);
	$result = mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($con);

	if($result){
		// INSERT成功
		$_POST["msg"] = "正常に登録されました。";
	}else{
		// INSERT失敗
		$_POST["msg"] = "DB登録でエラーが発生しました。";
	}
	require_once("./add_form.php");
?>