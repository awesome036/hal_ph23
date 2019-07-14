<?php
// 始点終点の設定
$startX = 0;
$startY = 0;
$lastX = 200;	// キャンバスサイズ x
$lastY = 200;	// キャンバスサイズ y

// キャンバス作成
$img = imageCreate($lastX, $lastY);

// 基準色の割り当て
srand();
$r = rand(0, 155);
$g = rand(0, 155);
$b = rand(0, 155);

// グラデーション矩形の描画(繰り返し構造を用いたグラデーション)
while($startX <= 100){
	// 描画色の設定
	$color = imageColorAllocate($img, $r, $g, $b);

	// 矩形の描画
	imageFilledRectangle(
		$img, 
		$startX,$startY,		// 始点 x,y
		$lastX,$lastY,			// 終点 x,y
		$color					// 色
	);

	// パラメータの調整（色とサイズ変更）
	$r += 1;
	$g += 1;
	$b += 1;
	$startX += 1;
	$startY += 1;
	$lastX -= 1;
	$lastY -= 1;
}

// HTML出力
header("Content-Type: image/png");
imagePng($img);