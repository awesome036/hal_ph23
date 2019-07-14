<?php
	// classファイルの読み込み
	require_once("./Car.class.php");

	// Carクラスの実体（インスタンス）化
	$car = new Car("sports","yellow","56-78");
	$car->drive();

	$car->setColor("black");
	echo $car->getColor();

	$car->setColor();
	echo $car->getColor();

	echo $car->getNumber();