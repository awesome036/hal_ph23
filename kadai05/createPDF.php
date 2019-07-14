<?php
require_once("./tcpdf/tcpdf.php");

// 日付設定
date_default_timezone_set('Asia/Tokyo');
$date = date("Y/m/d");

// POSTされた値を変数に格納
$zipcode = "〒".$_POST["zipcode"];
$address = $_POST["address"];
$name = $_POST["name"];
$pname = $_POST["pname"];
$price = $_POST["price"];
$amount = $_POST["amount"];

// 合計金額と消費税計算
$i = 0;
$sum = 0;
$sumAll;
$count = 0;
$tax = 0;
for($i = 0; $i < 5; $i++){
	$sum += (intval($price[$i]) * intval($amount[$i]));
	if(!empty($pname[$i])){
		$count++;
	}
}
$tax = number_format($sum * 0.08);
$sumAll = number_format($sum * 1.08);
$sum = number_format($sum);

// TCPDF生成
$tcpdf = new TCPDF();
$tcpdf->SetFontSubsetting(false); // フォントの埋め込みをする
$tcpdf->SetFont('ipag', '', 14);
$tcpdf->SetPrintHeader(false);
$tcpdf->AddPage();				// ページ追加

// メタ情報の追加
$tcpdf->SetAuthor("クロサワオサム");
$tcpdf->SetTitle("課題05");
$tcpdf->SetSubject("領収書");

// ロゴ画像出力
$file = "./images/hal.png";
$tcpdf->Image($file, 175, 18, 25, 25);

// 文字書き込み
$tcpdf->Write($h, $date, $link, $fill, "R", true);	// 日付出力
$tcpdf->Write($h, $zipcode, $link, $fill, $align, true);	// 郵便番号出力
$tcpdf->Write($h, $address, $link, $fill, $align, true);	// 住所出力
$tcpdf->setFontSize(24);
$tcpdf->Write($h, $name, $link, $fill, $align, false);	// 氏名出力
$tcpdf->setFontSize(14);
$tcpdf->Write(14, " 様", $link, $fill, $align, true);
$tcpdf->setX(130);
$tcpdf->Write($h, "〒160-0023", $link, $fill, $align, true);
$tcpdf->setX(130);
$tcpdf->Write($h, "東京都新宿区西新宿1-7-3", $link, $fill, $align, true);
$tcpdf->setX(130);
$tcpdf->Write($h, "TEL:03-3344-XXXX", $link, $fill, $align, true);
$tcpdf->setX(130);
$tcpdf->Write($h, "FAX:03-3344-XXXX", $link, $fill, $align, true);
$tcpdf->setY($tcpdf->getY() + 15);
$tcpdf->Write($h, "下記の通り、領収いたしました。", $link, $fill, $align, true);
$tcpdf->Ln();
$tcpdf->Write($h, "合計金額", $link, $fill, $align, false);
$tcpdf->Write($h, $sumAll." 円", $link, $fill, "C", true);
$tcpdf->WriteHTML("<hr>");

// HTML書き込み
$css =<<<EOS
<style>
	td {
		border: solid 1px #000;
	}
	th {
		text-align: center;
		background-color: #000;
		border-solid: solid 1px #000;
		color: #fff;
		font-weight: bold;
	}
	tr .alignCenter {
		text-align: center;
	}
	tr .alignRight {
		text-align: right;
	}
</style>
EOS;

$data ="";
for($i = 0; $i < $count; $i++){
	$str_price = number_format($price[$i]);
	$str_amount = number_format($amount[$i]);
	$str_cost = number_format($price[$i] * $amount[$i]);
	$data .= "<tr>";
	$data .= "<td>{$pname[$i]}</td>";
	$data .= "<td class=".'"alignRight"'.">{$str_price}</td>";
	$data .= "<td class=".'"alignRight"'.">{$str_amount}</td>";
	$data .= "<td class=".'"alignRight"'.">{$str_cost}</td>";
	$data .= "</tr>";
}

$table1 = <<<EOS
<table cellpadding="5">
	<tr>
		<th>内容</th>
		<th>単価</th>
		<th>数量</th>
		<th>金額</th>
	</tr>
	$data
</table>
EOS;
$tcpdf->WriteHTML($css.$table1);
$tcpdf->Ln();

$tcpdf->SetX(100);
$table2 = <<<EOS
<table cellpadding="5">
	<tr>
		<th>小計</th>
		<td class="alignRight">{$sum}</td>
	</tr>
	<tr>
		<th>消費税</th>
		<td class="alignRight">{$tax}</td>
	</tr>
</table>
EOS;
$tcpdf->WriteHTML($css.$table2);
$tcpdf->Ln();

$tcpdf->MultiCell($w, 20, "備考", 1, "L");

// フッター出力
$tcpdf->SetFooterMargin(15);

$tcpdf->Output("kadai05.pdf");		// PDF出力