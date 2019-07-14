<?php
session_start();

if(isset($_SESSION["userId"])){
	header("Location: product_view.php");
}

require_once("./PDOUser.class.php");

$id = $_POST["id"];
$password = $_POST["password"];

$db = new Database;
$result = $db->getUser($id, $password);
if($result){
	$_SESSION["userId"] = $result[0]["id"];
	header("Location: view_product.php");
}else{
	header("Location: index.html");
}