<?php
// ガガの読み込み
$img = imageCreateFromPng("./img/gaga.png");

// 骨の読み込み
$bone = imageCreateFromPng("./img/bone.png");

// ガガに骨の貼り付け(骨合成)
imageCopy(
	$img,								// コピー先
	$bone,								// コピー元
	14, 110,							// 貼り付け先の x,y
	0, 0,								// コピー元の x,y
	imageSx($bone), imageSy($bone)		// コピー元の　横、縦
);

// リボンの読み込み
$ribbon = imageCreateFromPng("./img/ribbon.png");

// 色の割り当て(透過色)
$bgcolor = imageColorAllocateAlpha($ribbon, 0, 0, 0, 127);

// リボン回転
$ribbon = imageRotate(
	$ribbon,
	20,			// 回転角度
	$bgcolor	// 回転後の隙間の背景色
);

// ガガにリボンの貼り付け(リボン合成)
imageCopy(
	$img,								// コピー先
	$ribbon,							// コピー元
	80, -40,							// 貼り付け先の x,y
	0, 0,								// コピー元の x,y
	imageSx($ribbon), imageSy($ribbon)	// コピー元の　横、縦
);

// 雪の結晶の読み込み
$crystal = imageCreateFromPng("./img/crystal.png");

// 結晶の数
srand();
$num = rand(10, 20);

// ガガに雪化粧の描画
for($i = 0; $i < $num; $i++){
	$size = rand(10, 30);		// 結晶のサイズ
	$degree = rand(0, 360); 	// 回転度数
	$startX = rand(0, imageSx($img));	// 描画位置 x
	$startY = rand(0, imageSy($img));	// 描画位置 y

	// 結晶の回転
	$rotateCrystal = imageRotate(
		$crystal,
		$degree,	// 回転角度
		$bgcolor	// 回転後の隙間の背景色
	);

	// 結晶の描画
	imageCopyResized(
		$img,							// コピー先
		$rotateCrystal,					// コピー元
		$startX, $startY,				// 貼り付け先の x,y
		0, 0,							// コピー元の x,y
		$size, $size,					// 貼り付け先の　横、縦
		imageSx($rotateCrystal), imageSy($rotateCrystal)		// コピー元の　横、縦
	);
}

// HTML出力
header("Content-Type: image/png");
imagePng($img);