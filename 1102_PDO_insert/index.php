<?php
	// DSN(Data Source Name)
	$dsn = "mysql:host=mysql;dbname=ph23;charset=utf8";
	$db_user = "root";
	$db_password = "root";

	// DB接続
	$pdo = new PDO($dsn,$db_user,$db_password);

	// DB切断
	$pdo = null;

	echo "OK";