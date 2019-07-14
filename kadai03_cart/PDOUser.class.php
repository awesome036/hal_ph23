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
				$this->pdo->setAttribute(
						PDO::ATTR_EMULATE_PREPARES,
						false
				);
			}catch( Exception $e ){
				header("Location: error.html");
			}
		}

		public function getUser($id, $password){
			try{
				$sql = "SELECT id FROM users WHERE id = :id AND password = :password";
				$ps = $this->pdo->prepare($sql);

				$ps->bindValue(":id", $id);
				$ps->bindValue(":password", $password);

				$ps->execute();
				$records = $ps->fetchAll(PDO::FETCH_ASSOC);
				return $records;
			}catch( Exception $e ){
				header("Location: error.html");
			}finally{
				// DB切断
				$this->pdo = null;
			}
		}

		public function getProducts(){
			try{
				$sql = "SELECT * FROM products";

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

		public function getCartProducts($cart){
			try{
				$sql = "SELECT * FROM products WHERE id = :id";
				$ps = $this->pdo->prepare($sql);

				foreach($cart as $key => $value){
					$ps->bindValue(":id", $key);
					$ps->execute();
					$list = $ps->fetchAll(PDO::FETCH_ASSOC);
				}
				return $list;
			}catch( Exception $e ){
				header("Location: error.html");
			}finally{
				// DB切断
				$this->pdo = null;
			}
		}
	}