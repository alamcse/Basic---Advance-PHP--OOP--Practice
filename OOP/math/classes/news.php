<?php

class News{
	private $table = 'news';
	private $news_id;

	public function readAllNews(){
		$sql		= "select * from $this->table limit 10";
		$stmt 		= DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}


	public function setNewsId($post_id){
		$this->post_id=$post_id;

	}

	public function readOneNews(){
		$sql		= "select * from $this->table where id=?";
		$stmt 		= DB::prepare($sql);
		$stmt->bindParam(1,$this->post_id);
		$stmt->execute();
		return $stmt->fetchAll();

	}

}




?>