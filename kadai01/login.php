<?php
	session_start();
	if(sha1($_SESSION["token"]) != $_POST["token"]){
		// 直アクセス時
		$_SESSION["msg"] = "不正なリクエストです。";
		header("Location: index.php");
		exit;
	}

	if(empty($_POST["id"]) or empty($_POST["password"])){
		// 入力チェック
		$_POST["err_msg"] = "ID,Passwordを入力してください。";
		require_once("./index.php");
		exit;
	}

	// DB操作
	$con = mysqli_connect("mysql", "root", "root") or die("接続失敗");
	mysqli_set_charset($con, "utf8mb4");
	mysqli_select_db($con, "ph23_kadai01");
	$sql = "SELECT id, password FROM kadai01_users WHERE id = ?";
	$stmt = mysqli_prepare($con, $sql);
	mysqli_stmt_bind_param($stmt, 's', $_POST["id"]);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_array($result);
	mysqli_stmt_close($stmt);
	mysqli_close($con);

	// パスワードハッシュのチェック
	if ($row && password_verify($_POST["password"], $row["password"])) {
		$_SESSION["id"] = $row["id"];
		header("Location: ./member.php");
		exit;
	} else {
		$_POST["err_msg"] = "ID、またはパスワードが不正です。";
		require_once("./index.php");
	}
?>