<?php
// ボケての読み込み
$img = imageCreateFromPng("./img/bokete.png");

//　吹き出しの読み込み
$fukidashi = imageCreateFromPng("./img/fukidashi.png");

// 黒色の設定
$black = imageColorAllocate($img, 0, 0, 0);

// 文字列の設定(配列)
$str = "あたたけえ";
$str = preg_split("//u", $str);

// 文字の始点と終点
$startX = 50;
$startY = 10;

// 文字サイズ
$fontSize = 20;

// 吹き出しに文字の描画(縦書きのボケ出力)
for($i = 0; $i < count($str); $i++){
	// TrueTypeフォント（全角）出力
	imageTTFText(
		$fukidashi,
		$fontSize,			// 文字サイズ（pt）
		0,					// 角度
		$startX,$startY,	// x,y
		$black,
		'/var/www/html/practice/ph23/kadai04/font/HuiFont29.ttf',
		$str[$i]
	);

	// 文字位置の調整
	$startY += ($fontSize + 5);
}

// 吹き出しをボケてに張り付け(吹き出し合成)
imageCopy(
	$img,										// コピー先
	$fukidashi,									// コピー元
	80, 10,										// 貼り付け先の x,y
	0, 0,										// コピー元の x,y
	imageSx($fukidashi), imageSy($fukidashi)		// コピー元の　横、縦
);

// HTML出力
header("Content-Type: image/png");
imagePng($img);