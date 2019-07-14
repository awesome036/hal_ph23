<?php
const X = 200;	// キャンバスサイズ x
const Y = 200;	// キャンバスサイズ y

// キャンバス作成
$img = imageCreate(X, Y);

// 背景色割り当て
$white = imageColorAllocate($img, 255, 255, 255);

// ランダムな矩形描画(複数個出力される)
for($i = 0; $i < 10; $i++){
	// ランダムな色の割り当て(ランダムに色が変わる)
	srand();
	$r = rand(0, 255);
	$g = rand(0, 255);
	$b = rand(0, 255);
	$randColor = imageColorAllocate($img, $r, $g, $b);

	// ランダムな始点と終点(ランダムに大きさが変わる)
	$startX = rand(0, X);
	$startY = rand(0, Y);
	$lastX = rand(0, X);
	$lastY = rand(0, Y);

	// 矩形の描画
	imageFilledRectangle(
		$img, 
		$startX,$startY,		// 始点 x,y
		$lastX,$lastY,			// 終点 x,y
		$randColor				// 色
	);
}

// HTML出力
header("Content-Type: image/png");
imagePng($img);