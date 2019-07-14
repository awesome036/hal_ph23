<?php
	// PNG画像の読み込み
	$img = imageCreateFromPng("./kitty.png");
	$img2 = imageCreateFromPng("./crystal.png");

	// イメージ画像のコピー　※一部コピーも可
	imageCopy(
		$img,		// 貼り付け先
		$img2,		// コピー元
		50,30,		// 貼り付け先の x,y
		50,50,		// コピー元の x,y
		120,120		// 横、縦
	);

	// 色の割り当て(透過色)
	$bgcolor = imageColorAllocateAlpha($img, 0, 0, 0, 127);

	// 色の割り当て(文字色)
	$red = imageColorAllocate($img, 255, 0, 0);

	// 回転前サイズ
	// echo imageSx($img);
	// echo ",";
	// echo imageSy($img);
	// echo "<br>";

	// 画像回転
	// ※破壊的な関数ではないので、
	// 戻り値を受け取る必要がある。
	// 破壊的な関数・・・引数の値を壊す
	$img = imageRotate(
		$img,
		-20,		// 回転角度
		$bgcolor	// 回転後の隙間の背景色
	);

	// 回転後サイズ
	// echo imageSx($img);
	// echo ",";
	// echo imageSy($img);
	// echo "<br>";

	// 英字限定文字列出力
	imageString(
		$img,
		5,			// 文字サイズ（１～５）
		10,10,		// x,y
		"ABC",		// 内容
		$red		// 色
	);

	// TrueTypeフォント（全角）出力
	imageTTFText(
		$img,
		20,			// 文字サイズ（pt）
		0,			// 角度
		30,30,		// x,y
		$red,
		'/var/www/html/practice/ph23/20190215_gd_image/font/HuiFont29.ttf',
		'あいう'
	);

	// 高画質キャンバスの作成
	$img2 = imageCreateTrueColor(400, 400);

	// 画像サイズ変更
	imageCopyResized(
		$img2,							// コピー先
		$img,							// コピー元
		0,0,							// 貼り付け先の x,y
		0,0,							// コピー元の x,y
		400,400,						// 貼り付け先の　横、縦
		imageSx($img),imageSy($img)		// コピー元の　横、縦
	);

	// HTML出力
	header("Content-Type: image/png");
	imagePng($img2);
?>