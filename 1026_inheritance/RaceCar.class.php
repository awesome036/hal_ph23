<?php
	class RaceCar extends Car{
		// extendsで親の性質を引き継ぐ
		// レーシングカー独自のメソッド
		public function boostDrive(){
			$this->a = 100;
			$this->number = "11-11";
			echo "時速200km!!";
		}
		
		// メソッドの上書き（オーバーライド）
		// →メソッドを再定義すればOK
		public function drive(){
			echo "100km!!";
		}
	}