<?php
session_start();

$_SESSION["id"] = "a";
header("Location: member.php");