<?php
const X = 200;	// キャンバスサイズ x
const Y = 200;	// キャンバスサイズ y

// キャンバスの作成
$imgCanvas = imageCreateTrueColor(X, Y);

// paulの貼り付け
$img = imageCreateFromPng("./img/paul.png");
imageCopyResampled(
	$imgCanvas,						// コピー先
	$img,							// コピー元
	0, 0,							// 貼り付け先の x,y
	0, 0,							// コピー元の x,y
	100, 100,						// 貼り付け先の　横、縦
	imageSx($img),imageSy($img)		// コピー元の　横、縦
);

// lennonの貼り付け
$img = imageCreateFromPng("./img/lennon.png");
imageCopyResampled(
	$imgCanvas,						// コピー先
	$img,							// コピー元
	100, 0,							// 貼り付け先の x,y
	0, 0,							// コピー元の x,y
	100, 100,						// 貼り付け先の　横、縦
	imageSx($img),imageSy($img)		// コピー元の　横、縦
);

// georgeの貼り付け
$img = imageCreateFromPng("./img/george.png");
imageCopyResampled(
	$imgCanvas,						// コピー先
	$img,							// コピー元
	0, 100,							// 貼り付け先の x,y
	0, 0,							// コピー元の x,y
	100, 100,						// 貼り付け先の　横、縦
	imageSx($img),imageSy($img)		// コピー元の　横、縦
);

// ringoの貼り付け
$img = imageCreateFromPng("./img/ringo.png");
imageCopyResampled(
	$imgCanvas,						// コピー先
	$img,							// コピー元
	100, 100,						// 貼り付け先の x,y
	0, 0,							// コピー元の x,y
	100, 100,						// 貼り付け先の　横、縦
	imageSx($img),imageSy($img)		// コピー元の　横、縦
);

// HTML出力
header("Content-Type: image/png");
imagePng($imgCanvas);