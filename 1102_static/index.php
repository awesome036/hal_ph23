<?php
	// static(静的)
	// Pointは、「インスタンスに依存せず、独立して存在する。」
	class MyClass{
		// インスタンス変数
		public $color;

		// staticのキーワードで、
		// 共通領域に確保される。

		// ※クラス変数
		public static $count = 0;

		public function up(){
			// 自クラスのstaticを触るには、
			// self::が使える
			self::$count++;
			// MyClass::$count++;一緒
		}

		public static function a(){
			// static functionから、
			// インスタンス領域（$this）は
			// 触れない
			// $this->color = "red";
			echo "a";
		}

		// 定数定義
		// 慣例として定数名は大文字＆アンダーバー
		const MAX_COUNT = 999;
	}
	MyClass::a();
	echo MyClass::MAX_COUNT;

	// 定数は書き換え不可
	// MyClass::MAX_COUNT = 20;

	// オブジェクト指向対応前の定数定義
	// 同様に、定数は書き換え不可
	define("MIN_COUNT",-999);
	echo MIN_COUNT;

	$m1 = new MyClass();
	$m2 = new MyClass();

	$m1->color = "red";
	$m2->color = "white";

	$m1->up();
	$m1->up();

	echo $m1->color;
	echo $m2->color;

	// staticへのアクセス
	// [書式]クラス名::プロパティ
	echo MyClass::$count;