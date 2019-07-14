<?php
// isset存在確認
if(isset($a)){
	echo "a";
}else{
	echo "b";
}

$a = "";
if(isset($a)){
	echo "a";
}else{
	echo "b";
}

$b = null;
$c = 1;

if(isset($a,$b,$c)){
	echo "a";
}else{
	echo "b";
}