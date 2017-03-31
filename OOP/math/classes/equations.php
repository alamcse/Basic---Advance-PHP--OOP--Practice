<?php

class Equations{
	private $table = 'equations';
	private $category;

	function readEqnCategories(){
		$sql		= "select distinct category from $this->table";
		$stmt 		= DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function setEqnCategories($category){
		$this->category=$category;
	}

	public function readEquations(){
		$sql		= "select * from $this->table where category=?";
		$stmt 		= DB::prepare($sql);
		$stmt->bindParam(1,$this->category);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}
?>