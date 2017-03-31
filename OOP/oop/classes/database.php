<?php

//include "config.php";

	class DB{

		private static $pdo;
		public static function connection()
				{
					if(!isset(self::$pdo))
						{
							
							try {
									self::$pdo = new PDO('mysql:host=localhost;dbname=oop;','root','');
								} 

							catch (PDOException $e) 
								{
									echo $e->getMessage();
								}
					 	}
					 	return self::$pdo;
				}
	
				public static function prepare($sql){
					return self::connection()->prepare($sql);
				} 

			}

?>