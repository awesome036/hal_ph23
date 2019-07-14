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
	
	// ここから継承の話
	echo "<br>";
	
	// classファイルの読み込み
	require_once("./RaceCar.class.php");
	
	// Carクラスの実体（インスタンス）化
	$car = new RaceCar("sports","yellow","56-78");
	$car->drive();
	$car->boostDrive();
	
	// protectedは見えない
	// echo $car->a;


	$car->color = "pink";
	echo $car->getNumber();
	var_dump($car);
