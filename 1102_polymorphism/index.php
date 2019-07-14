<?php
	require_once("Sub1.class.php");
	require_once("Sub2.class.php");
	
	// インスタンス化
	$s1 = new Sub1();
	$s1->nake();

	$s2 = new Sub2();
	$s2->nake();
	
	// 多態性
	$s = null;
	if(time()%2 == 1){
		$s = new sub1();
	}else{
		$s = new sub2();
	}
	// 同一のメッセージで異なる処理が実行される
	$s->nake();