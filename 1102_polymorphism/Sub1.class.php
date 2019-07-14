<?php
	require_once("Super.class.php");
	class Sub1 extends Super{
		// 処理のオーバーライド(override)
		public function nake(){
			echo "sub1";
		}
	}