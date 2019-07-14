<?php
// ランダムに画像読み込み
srand();
$num = rand(1, 3);
$src = "./img/option2-{$num}.jpg";
$img = imageCreateFromJpeg($src);

// リサイズ後の縦横サイズ設定
const LENGTH = 200;			// 画像リサイズ後の最大幅
$width = imageSx($img);
$height = imageSy($img);
if($width < $height){
	// 縦長の画像の場合
	$modWidth = round(LENGTH / $height * $width);
	$modHeight = LENGTH;
}elseif($height < $width){
	// 横長の画像の場合
	$modWidth = LENGTH;
	$modHeight = round(LENGTH / $width * $height);
}else{
	// 正方形の場合
	$modWidth = LENGTH;
	$modHeight = LENGTH;
}

// キャンバスの作成
$imgCanvas = imageCreateTrueColor($modWidth, $modHeight);

imageCopyResampled(
	$imgCanvas,						// コピー先
	$img,							// コピー元
	0, 0,							// 貼り付け先の x,y
	0, 0,							// コピー元の x,y
	$modWidth, $modHeight,			// 貼り付け先の　横、縦
	$width, $height					// コピー元の　横、縦
);

// HTML出力
header("Content-Type: image/jpeg");
imageJpeg($imgCanvas);