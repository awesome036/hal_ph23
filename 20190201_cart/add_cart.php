<?php
session_start();

// 本来はissetチェック必要	※今回は割愛
$sid = $_GET["sid"];

$cart = [];
// Point
// 連想配列キー名称=商品IDとする。
// 配列要素値=追加数量とする。

// セッションにカートが存在するかの確認
if(isset($_SESSION["cart"])){
	// あるなら復元
	$cart = $_SESSION["cart"];
}

// 1個追加
$cart[$sid]++;

// セッションに保存
$_SESSION["cart"] =  $cart;


// リダイレクト
header("Location: index.html");