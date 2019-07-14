<?php
// // 物（Object）の設計図（class）を作る。
// class className{
// 	// これで白紙の設計図

// 	// classブロック直下に
// 	// 処理は書けない
// 	// echo 2;
// 	// これと一緒
// 	// <html>
// 	// 	<h1>a</h1>
// 	// </html>
// 	// htmlブロック直下には
// 	// headとbodyブロックしか書けない。
// }

// // 設計図をもとに、ものを生成する。
// $myclass = new className();

// class Robot{
// 	// ↑クラス名はアッパーキャメル。

// 	// class直下にかけるのは次の二つ。
// 	// ①属性(プロパティ)=データ≒変数宣言
// 	// ②振舞い(メソッド)=処理≒関数

// 	// ①プロパティ宣言
// 	public $type = "cat";
// 	private $name = "ドラえもん";
// 	private $id = null;
// 	private $bodyColor = null;

// 	// ②メソッド定義
// 	public function getName(){
// 		// 自分は、$thisで表現することが出来る。
// 		return $this->name;
// 	}

// 	public function sayHello(){
// 		// 「$this->」で自メソッドも呼べる。
// 		$this->talk("Hello");
// 	}
// 	public function sayGoodBye(){
// 		$this->talk("Good-Bye");
// 	}
// 	private function talk($message){
// 		echo $message;
// 	}

// 	// アクセス修飾子について
// 	// プロパティとメソッドの
// 	// 公開度合いを制御することが出来る。
// 	// ①public:公の。誰でも触れる
// 	// ②private:自分だけ触れる。
// 	// ③protected:※今はやらない。

// 	// プロパティは原則private！
// 	// メソッドは必要なものだけpublic
// 	// 良い←private,protected,public→悪い

// 	// 【重要】
// 	// オブジェクト指向の3大要素
// 	// の内の一つ、
// 	// 「カプセル化(情報隠蔽)」
// 	// →①情報を隠すことが出来る。
// 	//  ②データと処理をひとくくりで
// 	//   扱うことが出来る。

// 	// コンストラクタ定義
// 	// →インスタンス化（new）のタイミング
// 	// で1度だけ呼び出されるメソッド
// 	// public function __construct(){
// 	// 	// コンストラクタですべきこと
// 	// 	// ->初期化
// 	// 	$this->name="dora";
// 	// 	$this->id=999;
// 	// 	$this->type="dog";
// 	// 	$this->bodyColor="red";
// 	// 	echo "XXX";
// 	// }
// 	public function __construct($name,$id,$type,$bc){
// 		// コンストラクタですべきこと
// 		// ->初期化
// 		$this->name=$name;
// 		$this->id=$id;
// 		$this->type=$type;
// 		$this->bodyColor=$bc;
// 	}
// }

// // Robot生成
// // $r = new Robot();
// $r = new Robot("D","X","cat","blue");
// echo $r->getName();

// // インスタンスは複数生成することが出来る
// $r2 = new Robot("Dorami","X","cat","blue");
// echo $r2->getName();
// // 生成のことを特に、「インスタンス化」と言う。
// // インスタンス＝実体≒オブジェクト

// // 実体から、名前を聞き出す。
// // メソッド呼び出しは「アロー演算子(->)」を用いる。
// // JSだと「ピリオド(.)」 
// // 例）console.log();


// // プロパティにアクセスも可能
// echo $r->type;
// // 注意事項↑$いらない、()いらない
// // ()が必要なのはfunction

// // アクセス可能なので、書き換えも可能
// // →でもやらない
// // $r->id = "2999DC001";
// // echo $r->id;

// echo 1;

// $r->sayHello();
// $r->sayGoodBye();

// /*
// 名称のつけ方について
// 名称のつけ方の代表として、
// 次の二つがある。
// ①キャメルケース
// 	キャメル＝ラクダ
// 	単語と単語をつなぎ、そのつなぎ目を
// 	大文字にする。
// 	MyClassName

// 	①－①アッパーキャメル
// 		MyClassName
// 	②－②ローワーキャメル
// 		myClassName
// ②スネークケース
// 	単語と単語をアンダーバーでつなぎ、
// 	すべて小文字にする。
// 	my_class_name
// */

// /*
// オブジェクト指向の3大要素
// ①カプセル化
// ②継承(インヘリタンス)
// ③多態性(ポリモーフィズム)
// */

// class Gender {
// 	// プロパティ定義
// 	private $name;
// 	private $gender;

// 	// メソッド定義
// 	public function __construct($name, $gender){
// 		$this->name = $name;
// 		$this->gender = $gender;
// 	}
// 	public function outputName(){
// 		$name = $this->name;
// 		$gender = $this->gender;

// 		if($gender == "male"){
// 			$str = "Mr.";
// 		}elseif($gender == "female"){
// 			$str = "Ms.";
// 		}
// 		echo $str.$name;
// 	}
// }

// $name = "aiueo";
// $gender = "female";

// $myClass = new Gender($name, $gender);
// $myClass->outputName();

// echo "<br>";

// function getDegree($hour, $minute){
// 	$minuteDegree = $minute * 6;
// 	$hourDegree = ($hour % 12 + $minute / 60) * 30;
// 	$angle = abs($hourDegree - $minuteDegree);

// 	// if($angle > 180){
// 	// 	$angle = abs($angle - 360);
// 	// }
// 	return $angle;
// }
// echo getDegree(1, 59);

// echo "<br>";
// $i = 0;
// while($i < 100){
// 	$i++;
// 	echo "i = $i\n";
// }
// echo "done!";

// echo "<br>";

 // 値設定
  $h = 120;    // 魔王のHP
  $a = 130;    // 攻撃力
  $b = 0;    // 回復量
  $turn = 0;             // ターン数

  if($h > $a && $a <= $b){
    echo "NO";
    exit;
  }else{
    if($h <= $a){
      $turn = 1;
    }else{
		$atack = $a - $b;
		$turn = ceil(($h -$a) / $atack) + 1;
    }
    
    echo "YES\n" . $turn;
  }