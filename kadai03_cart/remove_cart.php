<?php
session_start();
if(!isset($_SESSION["userId"])){
	header("Location: index.html");
}

$id = $_GET["id"];
unset($_SESSION["cart"][$id]);

header("Location: view_cart.php");