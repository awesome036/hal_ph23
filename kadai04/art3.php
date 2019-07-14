<?php
// キティの読み込み
$img = imageCreateFromPng("./img/kitty.png");

// 黒色の設定
$black = imageColorAllocate($img, 0, 0, 0);

// 矩形の描画(おやじ加工)
imageFilledRectangle(
	$img, 
	50, 70,		// 始点 x,y
	150, 80,	// 終点 x,y
	$black		// 色
);

//　虹の始点の設定
$startX = imageSx($img);
$startY = imageSy($img);

// 直径の設定
$r = 140;

// 虹色の設定
$rainbow = [
	[255, 0, 0],		// 赤色
	[255, 165, 0],		// 橙色
	[255, 255, 0],		// 黄色
	[0, 128, 0],		// 緑色
	[0, 255, 255],		// 水色
	[0, 0, 255],		// 青色
	[128, 0, 128]		// 紫色
];

// 虹色円の描画(虹加工)
for($i = 0; $i < count($rainbow); $i++){
	// 色の割り当て
	$color = imageColorAllocate(
		$img,
		$rainbow[$i][0],
		$rainbow[$i][1],
		$rainbow[$i][2]
	);

	// 円描画
	imageFilledEllipse(
		$img,
		$startX, $startY,	// 中心 x,y
		$r, $r,	// 横、縦の長さ
		$color		// 色
	);

	// 直径の調整
	$r -= 20;
}

// HTML出力
header("Content-Type: image/png");
imagePng($img);