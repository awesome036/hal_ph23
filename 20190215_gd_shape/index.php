<?php
	// キャンバス作成
	$img = imageCreate(200, 200);

	// 色の割り当て
	// ※最初の割り当て　＝　背景色
	$white = imageColorAllocate($img, 255, 255, 255);

	// 色の割り当て
	$black = imageColorAllocate($img, 0, 0, 0);

	// 直線描画
	imageLine(
		$img, 
		10,10,		// 始点 x,y
		190, 190,	// 終点 x,y
		$black		// 色
	);

	// 矩形描画
	imageRectangle(
		$img, 
		10,10,		// 始点 x,y
		190, 190,	// 終点 x,y
		$black		// 色
	);
	// ※Filledで塗りつぶし
	imageFilledRectangle(
		$img, 
		20,20,		// 始点 x,y
		30, 30,		// 終点 x,y
		$black		// 色
	);

	// 楕円描画
	imageEllipse(
		$img,
		55, 55,	// 中心 x,y
		80, 80,	// 横、縦の長さ
		$black		// 色
	);
	// ※Filledで塗りつぶし
	imageFilledEllipse(
		$img,
		145, 145,	// 中心 x,y
		80, 80,	// 横、縦の長さ
		$black		// 色
	);

	// 多角形描画
	$points = [
		100,10,
		190,100,
		100,190,
		10,100
	];
	imagePolygon(
		$img,
		$points,	// 座標配列
		4,			// 頂点の数
		$black		// 色
	);
	// ※Filled有り

	// HTML出力
	header("Content-Type: image/png");
	imagePng($img);

	// ファイル出力
	imagePng($img, "a.png");
?>