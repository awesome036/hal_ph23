<?php
    // 自分の得意な言語で
	// Let's チャレンジ！！
	define("STDIN", fopen("STDIN.txt", "r"));
    $num = fgets(STDIN);    // 石が置かれた回数
    
    // 初期化
    $black = 0;
    $white = 0;
    $msg = "";
    $board = array();
    $board[4][4] = "W";
    $board[5][5] = "W";
    $board[5][4] = "B";
    $board[4][5] = "B";
    
    function searchUp($board, $mine, $seak, $x, $y){
        $checkY = $y - 1;
        $check = $board[$x][$checkY];
        while($check == $seak){
            $checkY -= 1;
            $check = $board[$x][$checkY];
        }
        if($board[$x][$checkY] == $mine){
            for($i = $checkY + 1; $i < $y; $i++){
                $board[$x][$i] = $mine;
            }    
        }
        return $board;
    }
    
    function searchDown($board, $mine, $seak, $x, $y){
        $checkY = $y + 1;
        $check = $board[$x][$checkY];
        while($check == $seak){
            $checkY += 1;
            $check = $board[$x][$checkY];
        }
        if($board[$x][$checkY] == $mine){
            for($i = $checkY - 1; $i > $y; $i--){
                $board[$x][$i] = $mine;
            }    
        }
        return $board;
    }
    
    function searchRight($board, $mine, $seak, $x, $y){
        $checkX = $x + 1;
        $check = $board[$checkX][$y];
        while($check == $seak){
            $checkX += 1;
            $check = $board[$checkX][$y];
        }
        if($board[$checkX][$y] == $mine){
            for($i = $checkX - 1; $i > $x; $i--){
                $board[$i][$y] = $mine;
            }    
        }
        return $board;
    }
    
    function searchLeft($board, $mine, $seak, $x, $y){
        $checkX = $x - 1;
        $check = $board[$checkX][$y];
        while($check == $seak){
            $checkX -= 1;
            $check = $board[$checkX][$y];
        }
        if($board[$checkX][$y] == $mine){
            for($i = $checkX + 1; $i < $x; $i++){
                $board[$i][$y] = $mine;
            }
        }
        return $board;
    }
    
    function searchUpRight($board, $mine, $seak, $x, $y){
        $checkX = $x + 1;
        $checkY = $y - 1;
        $check = $board[$checkX][$checkY];
        while($check == $seak){
            $checkX += 1;
            $checkY -= 1;
            $check = $board[$checkX][$checkY];
        }
        if($board[$checkX][$checkY] == $mine){
            $checkX -= 1;
            $checkY += 1;
            do{
                $board[$checkX][$checkY] = $mine;
                $checkX -= 1;
                $checkY += 1;
            }while($board[$checkX][$checkY] == $seak);
        }
        return $board;
    }
    
    function searchUpLeft($board, $mine, $seak, $x, $y){
        $checkX = $x - 1;
        $checkY = $y - 1;
        $check = $board[$checkX][$checkY];
        while($check == $seak){
            $checkX -= 1;
            $checkY -= 1;
            $check = $board[$checkX][$checkY];
        }
        if($board[$checkX][$checkY] == $mine){
            $checkX += 1;
            $checkY += 1;
            do{
                $board[$checkX][$checkY] = $mine;
                $checkX += 1;
                $checkY += 1;
            }while($board[$checkX][$checkY] == $seak);
        }
        return $board;
    }
    
    function searchDownRight($board, $mine, $seak, $x, $y){
        $checkX = $x + 1;
        $checkY = $y + 1;
        $check = $board[$checkX][$checkY];
        while($check == $seak){
            $checkX += 1;
            $checkY += 1;
            $check = $board[$checkX][$checkY];
        }
        if($board[$checkX][$checkY] == $mine){
            $checkX -= 1;
            $checkY -= 1;
            do{
                $board[$checkX][$checkY] = $mine;
                $checkX -= 1;
                $checkY -= 1;
            }while($board[$checkX][$checkY] == $seak);
        }
        return $board;
    }
    
    function searchDownLeft($board, $mine, $seak, $x, $y){
        $checkX = $x - 1;
        $checkY = $y + 1;
        $check = $board[$checkX][$checkY];
        while($check == $seak){
            $checkX -= 1;
            $checkY += 1;
            $check = $board[$checkX][$checkY];
        }
        if($board[$checkX][$checkY] == $mine){
            $checkX += 1;
            $checkY -= 1;
            do{
                $board[$checkX][$checkY] = $mine;
                $checkX += 1;
                $checkY -= 1;
            }while($board[$checkX][$checkY] == $seak);
        }
        return $board;
    }
    
    // 
    for($i = 0; $i < $num; $i++){
        $work = explode(" ", fgets(STDIN));
        
        $mine = $work[0];
        $x = intval($work[1]);
        $y = intval($work[2]);
        $board[$x][$y] = $mine;
        
        // 反転対象の石色判定
        if($mine == "B"){
            $seak = "W";
        }else{
            $seak = "B";
        }
        
        if($x > 2 && $x < 7 && $y > 2 && $y < 7){
            $board = searchUp($board, $mine, $seak, $x, $y);
            $board = searchUpRight($board, $mine, $seak, $x, $y);
            $board = searchRight($board, $mine, $seak, $x, $y);
            $board = searchDownRight($board, $mine, $seak, $x, $y);
            $board = searchDown($board, $mine, $seak, $x, $y);
            $board = searchDownLeft($board, $mine, $seak, $x, $y);
            $board = searchLeft($board, $mine, $seak, $x, $y);
            $board = searchUpLeft($board, $mine, $seak, $x, $y);
        }elseif($x > 0 && $x < 3 && $y > 0 && $y < 3){
            $board = searchRight($board, $mine, $seak, $x, $y);
            $board = searchDownRight($board, $mine, $seak, $x, $y);
            $board = searchDown($board, $mine, $seak, $x, $y);
        }elseif($x > 6 && $x < 9 && $y > 0 && $y < 3){
            $board = searchDown($board, $mine, $seak, $x, $y);
            $board = searchDownLeft($board, $mine, $seak, $x, $y);
            $board = searchLeft($board, $mine, $seak, $x, $y);
        }elseif($x > 6 && $x < 9 && $y > 6 && $y < 9){
            $board = searchLeft($board, $mine, $seak, $x, $y);
            $board = searchUpLeft($board, $mine, $seak, $x, $y);
            $board = searchUp($board, $mine, $seak, $x, $y);
        }elseif($x > 0 && $x < 2 && $y > 6 && $y < 9){
            $board = searchUp($board, $mine, $seak, $x, $y);
            $board = searchUpRight($board, $mine, $seak, $x, $y);
            $board = searchRight($board, $mine, $seak, $x, $y);
        }elseif($x > 2 && $x < 7 && $y > 0 && $y < 3){
            $board = searchRight($board, $mine, $seak, $x, $y);
            $board = searchDownRight($board, $mine, $seak, $x, $y);
            $board = searchDown($board, $mine, $seak, $x, $y);
            $board = searchDownLeft($board, $mine, $seak, $x, $y);
            $board = searchLeft($board, $mine, $seak, $x, $y);
        }elseif($x > 6 && $x < 9 && $y > 2 && $y < 7){
            $board = searchUp($board, $mine, $seak, $x, $y);
            $board = searchDown($board, $mine, $seak, $x, $y);
            $board = searchDownLeft($board, $mine, $seak, $x, $y);
            $board = searchLeft($board, $mine, $seak, $x, $y);
            $board = searchUpLeft($board, $mine, $seak, $x, $y);
        }elseif($x > 2 && $x < 7 && $y > 6 && $y < 9){
            $board = searchUp($board, $mine, $seak, $x, $y);
            $board = searchUpRight($board, $mine, $seak, $x, $y);
            $board = searchRight($board, $mine, $seak, $x, $y);
            $board = searchLeft($board, $mine, $seak, $x, $y);
            $board = searchUpLeft($board, $mine, $seak, $x, $y);
        }elseif($x > 0 && $x < 3 && $y > 2 && $y < 7){
            $board = searchUp($board, $mine, $seak, $x, $y);
            $board = searchUpRight($board, $mine, $seak, $x, $y);
            $board = searchRight($board, $mine, $seak, $x, $y);
            $board = searchDownRight($board, $mine, $seak, $x, $y);
            $board = searchDown($board, $mine, $seak, $x, $y);
        }
    }
    
    // 黒石・白石集計
    for($j = 1; $j <= 8; $j++){
        for($k = 1; $k <= 8; $k++){
            if($board[$k][$j] == "W"){
                $white += 1;
            }elseif($board[$k][$j] == "B"){
                $black += 1;
            }
        }
    }
    if($white < 10){
        $white = "0".$white;
    }
    if($black < 10){
        $black = "0".$black;
    }
    
    
    // 勝敗判定
    if($white > $black){
        $msg = "The white won!";
    }elseif($white < $black){
        $msg = "The black won!";
    }else{
        $msg = "Draw!";
    }
    
    echo "{$black}-{$white} {$msg}";
    
?>