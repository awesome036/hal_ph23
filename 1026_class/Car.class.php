<?php
	class Car{
		// プロパティ定義
		private $type;
		private $color;
		private $number;

		// メソッド定義

		public function __construct($type,$color,$number){
			// コンストラクタは
			// newのタイミングで処理される
			$this->type = $type;
			$this->color = $color;
			$this->number = $number;
		}
		public function drive(){
			echo "走る。。。";
		}
		public function setColor($newColor = "white"){
			// 引数のデフォルト値は
			// 代入式で設定することが出来る
			// 【注意】デフォルト値は
			// 引数が複数存在する場合、
			// 最後に寄せる必要がある。
			$this->color = $newColor;
		}
		public function getColor(){
			return $this->color;
		}
		public function getNumber(){
			return $this->number;
		}

	}