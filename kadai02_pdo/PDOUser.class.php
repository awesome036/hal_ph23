<?php
	class Database{
		const DB_NAME = "ph23";
		const HOST = "mysql";
		const USER = "root";
		const PASS = "root";
		private $pdo;

		public function __construct(){
			$dsn = "mysql:host=".self::HOST.";dbname=".self::DB_NAME.";charset=utf8";
			$user = self::USER;
			$pass = self::PASS;
			
			try{
				$this->pdo = new PDO($dsn,$user,$pass);
				$this->pdo->setAttribute(
						PDO::ATTR_ERRMODE,
						PDO::ERRMODE_EXCEPTION
				);
			}catch( Exception $e ){
				header("Location: error.html");
			}
		}

		public function getUser($id){
			try{
				if(!isset($id)){
					// 全件出力
					$sql = "SELECT * FROM kadai01_users";
				}else{
					// id指定出力
					$sql = "SELECT * FROM kadai01_users WHERE id LIKE '%$id%'";
				}
				$stmt = $this->pdo->query($sql);
				$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $records;
			}catch( Exception $e ){
				header("Location: error.html");
			}finally{
				// DB切断
				$this->pdo = null;
			}
		}
	}