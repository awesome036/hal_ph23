<?php
session_start();
if(!isset($_SESSION["userId"])){
	header("Location: index.html");
}

$id = $_GET["id"];

$cart = [];

if(isset($_SESSION["cart"])){
	$cart = $_SESSION["cart"];
}

$cart[$id]++;

$_SESSION["cart"] =  $cart;

header("Location: view_product.php");